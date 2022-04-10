<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Models\Cotizacions;
use App\Mail\MailTo;

class CotizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cotizacion = Cotizacions::all();
        return $cotizacion;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function sendEmail(Request $request)
    {
        $detalle = [
            "title" => "Cotizacion del cliente ".$request->nombre,
            "body" => "El cliente ".$request->nombre." con el numero de celular: ".$request->celular.
            " Ha cotizado el modelo: ".$request->modelo." En la ciudad: ".$request->ciudad.", 
            correo de contacto: ".$request->email,
        ];

        Mail::to(["adolfovalvid@gmail.com", "sheldoncttbs@gmail.com", "wtsimypants@gmail.com"])->send(new MailTo($detalle));
        return response()->json([
            "Cotizacion realizada" => "Cotizacion agregada."
        ], 200);
    }
    /*
        Enviar emails
    */
    public function store(Request $request)
    {
        if(count($request->all())<=0){
            return response()->json([
                "errors" => "Request is empty"
            ], 422);
        }
        
        $reglas = [
            "modelo" => ["required"],
            "nombre" => ["required"],
            "email" => ["required", "email:rfc,dns"],
            "celular" => ["required"],
            "departamento" => ["required"],
            "ciudad" => ["required"],
        ];

        $mensajes = [
            "required" => "El campo :attribute es requerido"
        ];

        $validator = Validator::make($request->all(), $reglas, $mensajes);

        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()->all()
            ], 422);
        }

        $cotizacion = new Cotizacions();
        $cotizacion->modelo = $request->modelo;
        $cotizacion->nombre = $request->nombre;
        $cotizacion->email = $request->email;
        $cotizacion->celular = $request->celular;
        $cotizacion->departamento = $request->departamento;
        $cotizacion->ciudad = $request->ciudad;
        $cotizacion->created_at = now();

        $cotizacion->save();
        return response()->json([
            "success" => "Cotizacion agregada."
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
