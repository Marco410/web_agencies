<?php

namespace App\Http\Services;

use App\Marcas;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

use Intervention\Image\Facades\Image;

class BrandService
{

    public $validationsService;

    public function __construct()
    {
        $this->validationsService = new ValidationsService();
    }

    public function create($request)
    {

        $marca = $request->all();

        $linkMarcaFinal = $this->validationsService->validateMarcaLink($request->link);

        $this->imagenNameOriginal = $this->getMarcaName($request);
        $newMarca = new Marcas();
        $newMarca->nombre = $marca['marca'];
        $newMarca->descripcion = $marca['descripcion'];
        $newMarca->link = $linkMarcaFinal;
        $newMarca->imagen = $this->imagenNameOriginal;
        $newMarca->save();
        return 1;
    }

    public function update($request)
    {
        $marca = $request->all();

        $brand = Marcas::find($marca['id']);
        if($brand->link != $marca['link']){
            $linkMarcaFinal = $this->validationsService->validateMarcaLink($request->link);
        }else{
            $linkMarcaFinal = $brand->link;
        }

        $updateMarca = Marcas::find($marca['id']);

        /* if($this->imageFinally = $this->getMarcaName($request)){
            $updateMarca->imagen = $this->imageFinally;
        }; */

        if ($request->hasFile('imagen')) {
            $updateMarca->imagen = $this->getMarcaName($request);
        }
        
        $updateMarca->nombre = $marca['name'];
        $updateMarca->link = $linkMarcaFinal;
        $updateMarca->descripcion = $marca['description'];
        $updateMarca->save();

        return 1;
    }

    public function getMarcaName($request)
    {

        if ($request->hasFile('imagen')) {
            $file = $request->file('imagen');
            $name = $file->getClientOriginalName();
            $nameResult = $this->generateNameFile($name);

           /*  request()->file("imagen")->storeAs('public', 'marcas/' . $nameResult); */

           $ruta = storage_path() . '/app/public/marcas/'.$nameResult;

            Image::make($request->file('imagen'))
                ->resize(768,449)->save($ruta);

            return $nameResult;
        } else {
            return null;
        }
    }

    public function generateNameFile($value)
    {
        $link = html_entity_decode($value);
        $link = $this->deleteAccents($link);
        $link = strtolower($link); //paso todo a minisculas
        $link = preg_replace("/[^ A-Za-z0-9_.-]/", '', $link); //quito los caracteres que no sean letras o numeros
        $link = str_replace(' ', '-', $link);

        return $link;
    }

    public function deleteAccents($cadena)
    {
        $originales = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿ';
        $modificadas = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuyyby';
        $cadena = utf8_decode($cadena);
        $cadena = strtr($cadena, utf8_decode($originales), $modificadas);
        return utf8_encode($cadena);
    }
}
