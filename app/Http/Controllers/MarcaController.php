<?php

namespace App\Http\Controllers;

use App\Http\Services\BrandService;
use App\Marcas;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class MarcaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit($id)
    {
        //
        $marca = Marcas::find($id);
        return view('admin.marcas.edit-brand' ,['marca' => $marca] );
    }


    public function update_store(Request $request , BrandService $brandService )
    {

        $resultSaveMarca = $brandService->update($request);
        return redirect()->route('marcas')->with('status','Marca actualizada con éxito');
    }

    public function delete(Request $request)
    {
        $id = $request->input("id");
        $marcas = Marcas::find($id);
        $marcas->active = 0;
        $marcas->save();

        return response(json_encode($marcas), 200)->header('Content-type', 'text/plain');
    }


    public function destroy(Request $request)
    {
        $id = $request->input("id");
        $marcas = Marcas::find($id);
        $marcas->delete();

        return response(json_encode($marcas), 200)->header('Content-type', 'text/plain');
    }

    public function recover(Request $request)
    {
        $id = $request->input("id");
        $marcas = Marcas::find($id);
        $marcas->active = 1;
        $marcas->save();

        return response(json_encode($marcas), 200)->header('Content-type', 'text/plain');
    }

}
