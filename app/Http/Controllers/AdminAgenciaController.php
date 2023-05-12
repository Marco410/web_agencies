<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Estados;
use App\Marcas;
use App\Municipios;
use App\Fotos;
use App\Reviews;
use App\SolicitudAgency;
use App\Agencias;
use App\ClaimAgency;
use App\UserAgency;
use App\AgencyHorario;
use App\AgencyQr;
use App\Cita;
use App\Contrato;
use App\Personal;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;



class AdminAgenciaController extends Controller
{
    public function index()
    {
        return view('admin.agency.index');
    }

    public function add()
    {
        $estados = Estados::all();
        $marcas = Marcas::where('active',1)->get();
        return view('admin.agency.agency-add',compact('estados','marcas'));
    }

    public function agencias_show()
    {
        $agencias = Agencias::where('activo' , 1 )->with('marca')->get();

        return response(json_encode($agencias), 200)->header('Content-type', 'text/plain');
    }


    public function getMunicipios(Request $request)
    {
        $estado_id = $request->input("estado");
        $municipios = Estados::find($estado_id);
        $municipios_id = $municipios->municipios->all();

        return response(json_encode($municipios_id), 200)->header('Content-type', 'text/plain');
    }

    public function getMarcas(Request $request)
    {
        $marcas = Marcas::where('active',1)->get();

        return response(json_encode($marcas), 200)->header('Content-type', 'text/plain');
    }

    public function getEstados(Request $request)
    {
        $estados = Estados::all();

        return response(json_encode($estados), 200)->header('Content-type', 'text/plain');
    }

    //Crud Edit
    public function edit($id)
    {
        $agencia = Agencias::find($id);
        $estados = Estados::all();
        $marca =  $agencia->marca->first();
        $marcas = Marcas::where('active',1)->get();

        // $marca = Agencias::query()->with('marca')->find($id);

        return view('admin.edit-agencia', ['agencias' => $agencia, 'marca' => $marca, 'marcas' => $marcas, 'estados' => $estados, 'id' => $id]);
    }

    public function edit_save(Request $request)
    {

        $id = $request->input('id');
        $agencia = $request->input('agencia');
        $mar = $request->input('marca');
        $pais = $request->input('pais');
        $estado_id = $request->input('estado');
        $ciudad_id = $request->input('ciudad');
        $cp = $request->input('cp');
        $calle = $request->input('calle');
        $colonia = $request->input('colonia');
        $tel = $request->input('tel');


        $estado = Estados::find($estado_id);
        $municipio = Municipios::find($ciudad_id);
        $agencia_db = Agencias::find($id);
        $marca =  $agencia_db->marca->first();


        $agencia_db->nombre = $agencia;
        $marca->pivot->marca_id = $mar;
        $agencia_db->pais = $pais;
        $agencia_db->estado = $estado->estado;
        $agencia_db->ciudad = $municipio->municipio;
        $agencia_db->cp = $cp;
        $agencia_db->calle = $calle;
        $agencia_db->colonia = $colonia;
        $agencia_db->telefono = $tel;

        $agencia_db->save();
        $marca->pivot->save();
        return redirect()->route('agencia')->with('status', 'Actualizado con éxito');
        // return Redirect::back()->back()->withErrors(['Encuesta enviada con exito, Puede proceder a contestar otra encuesta', 'The Message']);;
    }

    public function delete_temp(Request $request)
    {
        $agencia_id = $request->input("id");

        $agencia = Agencias::find($agencia_id);
        $agencia->activo = 0;
        $agencia->save();
        return response(json_encode($agencia), 200)->header('Content-type', 'text/plain');
    }

    public function recover(Request $request)
    {
        $agencia_id = $request->input("id");

        $agencia = Agencias::find($agencia_id);
        $agencia->activo = 1;
        $agencia->save();
        return response(json_encode($agencia), 200)->header('Content-type', 'text/plain');
    }

    public function destroy(Request $request)
    {
        $agencia_id = $request->input("id");

        $horario = AgencyHorario::where('agencia_id',$agencia_id)->delete();
        $qr = AgencyQr::where('agencia_id',$agencia_id)->delete();
        $cita = Cita::where('agencia_id',$agencia_id)->delete();
        $claim = ClaimAgency::where('agencia_id',$agencia_id)->delete();
        $contrato = Contrato::where('agencia_id',$agencia_id)->delete();
        $fotos = Fotos::where('agencia_id',$agencia_id)->delete();
        $personal = Personal::where('agencia_id',$agencia_id)->delete();
        $reviews = Reviews::where('agencia_id',$agencia_id)->delete();
        $user = UserAgency::where('agencia_id',$agencia_id)->delete();

        DB::table('agencia_has_marca')->where('agencia_id',$agencia_id)->delete();

        $agencia = Agencias::find($agencia_id);
        $agencia->delete();
    }

    public function relation_agency_brand()
    {
        $agencia_id = 627;
        $fin = 630;
        $marca_id = 7;

        for ($i = $agencia_id; $i <= $fin; $i++) {

            DB::table('agencia_has_marca')->insert([
                'agencia_id' => $i,
                'marca_id' => $marca_id
            ]);
        }

        return 1;
    }
    public function agencies_claim()
    {
        $claims = ClaimAgency::with(['agencia', 'user'])->get();
        return view('admin.agency.agencies-claim', compact('claims'));
    }

    public function agencies_claim_update($claim)
    {

        $claim = ClaimAgency::where('id', $claim)->with(['agencia', 'user'])->first();

        return view('admin.agency.agency-claim-update', compact('claim'));
    }

    public function agencies_claim_store(Request $request)
    {

        $status = $request->status;
        $user_id = $request->user_id;
        $agencia_id = $request->agencia_id;
        $msj = "";

        ClaimAgency::where('id', $request->claim_id)->update([
            'status' => $request->status
        ]);

        if ($status == "Aceptada") {
            UserAgency::create([
                'user_id' => $user_id,
                'agencia_id' => $agencia_id,
            ]);

            $msj = "Se asigno la agencia al usuario";
        } else if ($status == "No Aceptada") {
            $msj = "No se acepto la solicitud del usuario.";

            $userAgency = UserAgency::where('user_id', $user_id)->where('agencia_id', $agencia_id)->get();
            if ($userAgency) {
                UserAgency::where('user_id', $user_id)->where('agencia_id', $agencia_id)->delete();
            }
        } else {
            $msj = "Se quedo pendiente la solicitud";
            $userAgency = UserAgency::where('user_id', $user_id)->where('agencia_id', $agencia_id)->get();
            if ($userAgency) {
                UserAgency::where('user_id', $user_id)->where('agencia_id', $agencia_id)->delete();
            }
        }

        return redirect()->route('admin.agencies.claim')->with('status', 'Se actualizo correctamente. ' . $msj);
    }

    public function store(Request $request)
    {
        request()->validate([
            'lat' => 'required',
            'lng' => 'required',
            'place_id' => 'required',
            'marca' => 'required',
        ],[
            'marca.required' => 'Selecciona la marca de la agencia.',
            'lat.required' => 'Debe de tener longitud',
            'lng.required' => 'Debe de tener latitud.',
            'place_id.required' => 'Debe de tener un place ID.',
        ]);
        $nombre = $request->nombre;
        $marca_id = $request->marca;
        $direccion = $request->direccion;
        $calle = $request->calle;
        $colonia = $request->colonia;
        $ciudad = $request->ciudad;
        $estado = $request->estado;
        $pais = $request->pais;
        $cp = $request->cp;
        $telefono = $request->telefono;
        $lat = $request->lat;
        $lng = $request->lng;
        $horario = $request->horario_input;
        $place_id = $request->place_id;
        $rating = $request->rating;
        if(isset($_POST['fotos'])){
            $fotos = $_POST['fotos'];
        }
        if(isset($_POST['review'])){
            $review = $_POST['review'];
        }

        $agencia = Agencias::create([
            'nombre' => $nombre,
            'direccion' => $direccion,
            'calle' => $calle,
            'colonia' => $colonia,
            'ciudad' => $ciudad,
            'estado' => $estado,
            'pais' => $pais,
            'cp' => $cp,
            'telefono' => $telefono,
            'lat' => $lat,
            'lng' => $lng,
            'horario' => $horario,
            'place_id' => $place_id,
            'rating' => $rating
        ]);

        DB::table('agencia_has_marca')->insert([
            'agencia_id' => $agencia->id,
            'marca_id' => $marca_id
        ]);

        if(isset($_POST['fotos'])){
            for ($k = 0; $k < count($fotos); $k++) {
                Fotos::create([
                 'agencia_id' => $agencia->id,
                 'foto_url' => $fotos[$k]
                ]);
             }
     
        }
        if(isset($_POST['review'])){
            for ($l = 0; $l < count($review); $l++) {
                Reviews::create([
                 'agencia_id' => $agencia->id,
                 'autor' => $_POST["autor_review"][$l],
                 'autor_url' => $_POST["autor_url"][$l],
                 'foto_url' => $_POST["foto_url"][$l],
                 'rating' => $_POST["rating_review"][$l],
                 'text' => $review[$l],
                 'time' => $_POST["time"][$l]
                ]);
             }
        }

        //Esto se hace cuando un admin acepta la solicitud
        if($request->solicitud){
            $solicitud = SolicitudAgency::where('id',$request->solicitud)->update([
                'agencia_add' => 1
            ]);

            $solicitud = SolicitudAgency::where('id',$request->solicitud)->first();

            UserAgency::create([
                'user_id' => $solicitud->user_id,
                'agencia_id' => $agencia->id,
            ]);
        }

        return redirect()->route('agencia.detalles',$agencia->id)->with('status_claim', 'Se agrego la agencia correctamente.');
    }

    //funcion para obtener los datos de Google Place
    public function get_info()
    {
        $lenght = 5; //tamaño del codigo de la agencia AN00001 solo 0
        $array = [];
        $agencia = "";
        for ($i = 2301; $i <= 2350; $i++) {
            $no = "";
            $calle = "";
            $colonia = "";
            $ciudad = "";
            $estado = "";
            $pais = "";
            $cp = "";
            $j = str_pad($i, $lenght, "0", STR_PAD_LEFT);
            $path = storage_path('app/public/api/upload/archivo/json/AN' . $j . '_reviews.json');
            $meta_data = file_get_contents($path);
            $meta_data = json_decode($meta_data, true);

            if (isset($meta_data['result']['name'])) {
                $nombre =  $meta_data['result']['name'];
            } else {
                $nombre = "0";
            }
            if (isset($meta_data['result']['formatted_address'])) {
                $direccion = $meta_data['result']['formatted_address'];

                foreach ($meta_data['result']['address_components'] as $key => $address) {

                    foreach ($address["types"] as $key => $type) {

                        switch ($type) {
                            case ("street_number"):
                                $no = $address['long_name'];
                                break;
                            case ("route"):
                                $calle = $address['long_name'];
                                break;
                            case ("sublocality_level_1"):
                                $colonia = $address['long_name'];
                                break;
                            case ("locality"):
                                $ciudad =  $address['long_name'];
                                break;
                            case ("administrative_area_level_1"):
                                $estado = $address['long_name'];
                                break;
                            case ("country"):
                                $pais = $address['long_name'];
                                break;
                            case ("postal_code"):
                                $cp = $address['long_name'];
                                break;
                        }
                    }
                }
            } else {
                $direccion =  "0";
            }
            if (isset($meta_data['result']['international_phone_number'])) {
                $tel = $meta_data['result']['international_phone_number'];
            } else {
                $tel = "0";
            }
            if (isset($meta_data['result']['opening_hours'])) {
                $horario = "";
                for ($k = 0; $k < count($meta_data["result"]["opening_hours"]["weekday_text"]); $k++) {
                    $horario .= "<span>" . $meta_data["result"]["opening_hours"]["weekday_text"][$k] . "</span><br>";
                }
            } else {
                $horario = "0";
            }
            if (isset($meta_data['result']['geometry'])) {
                $lat =  $meta_data['result']['geometry']['location']['lat'];
                $lng = $meta_data['result']['geometry']['location']['lng'];
            } else {
                $lat = "0";
                $lng = "0";
            }
            if (isset($meta_data['result']['place_id'])) {
                $place_id =  $meta_data['result']['place_id'];
            } else {
                $place_id =   "0";
            }
            if (isset($meta_data['result']['rating'])) {
                $rating =  $meta_data['result']['rating'];
            } else {
                $rating =  "0";
            }

            $agencia = Agencias::create([
                'nombre' => $nombre,
                'direccion' => $direccion,
                'calle' => $calle . " " . $no,
                'colonia' => $colonia,
                'ciudad' => $ciudad,
                'estado' => $estado,
                'pais' => $pais,
                'cp' => $cp,
                'telefono' => $tel,
                'lat' => $lat,
                'lng' => $lng,
                'horario' => $horario,
                'place_id' => $place_id,
                'rating' => $rating
            ]);


            if (isset($meta_data['result']['reviews'])) {
                foreach ($meta_data['result']['reviews'] as $key => $review) {

                    DB::table('agencia_has_reviews')->insert([
                        'agencia_id' => $agencia->id,
                        'autor' => $review["author_name"],
                        'autor_url' => $review["author_url"],
                        'foto_url' => $review["profile_photo_url"],
                        'rating' => $review["rating"],
                        'text' => $review["text"],
                        'time' => $review["time"]
                    ]);
                }
            } else {
                $reviews = "0";
            }

            if (isset($meta_data['result']['photos'])) {
                foreach ($meta_data['result']['photos'] as $key => $fotos) {

                    DB::table('agencia_has_fotos')->insert([
                        'agencia_id' => $agencia->id,
                        'html' => $fotos["html_attributions"][0],
                        'foto_ref' => $fotos["photo_reference"]
                    ]);
                }
            } else {
                $fotos = "0";
            }
        }
    }
}
