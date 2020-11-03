<?php

namespace App\Http\Controllers;

use App\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use stdClass;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['clientes'] = Cliente::paginate(5);
        return view('clientes.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = new stdClass();

        $cliente = new Cliente();
        $cliente->RFC = $request->RFC;
        $cliente->nombre = $request->Nombre;
        $cliente->edad = $request->Edad;
        $cliente->idciudad = $request->idCiudad;
        
        try{
            if( $cliente->save()){
                $result->tipo = "alertSuccess";
                $result->mensaje = "Cliente registrado existosamente";
            }else{
                $result->tipo = "alertError";
                $result->mensaje = "Ocurrió un error al guardar cliente";
            }
        }catch(Exception $e){
            $result->tipo = "alertError";
            $result->mensaje = "Ocurrió un error al guardar cliente";
        }
        
        return redirect('clientes')->with( $result->tipo, $result->mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit($RFC)
    {
        $cliente = Cliente::findOrFail($RFC);
        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $RFC)
    {
        $result = new stdClass();

        try{
            $cliente = Cliente::findOrFail($RFC);

            $cliente->RFC = $request->RFC;
            $cliente->nombre = $request->Nombre;
            $cliente->edad = $request->Edad;
            $cliente->idciudad = $request->idCiudad;
        
            if( $cliente->save()){
                $result->tipo = "alertSuccess";
                $result->mensaje = "Cliente modificado existosamente";
            }else{
                $result->tipo = "alertError";
                $result->mensaje = "Ocurrió un error al modificar cliente";
            }
        }catch(Exception $e){
            $result->tipo = "alertError";
            $result->mensaje = "Ocurrió un error al modificar cliente";
        }

        return redirect('clientes')->with( $result->tipo, $result->mensaje);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cliente  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($RFC)
    {
        $result = new stdClass();
        try{
            if( Cliente::destroy($RFC)){
                $result->tipo = "alertSuccess";
                $result->mensaje = "Cliente eliminado existosamente";
            }else{
                $result->tipo = "alertError";
                $result->mensaje = "Ocurrió un error al eliminar cliente";
            }
        }catch(Exception $e){
            $result->tipo = "alertError";
            $result->mensaje = "Ocurrió un error al eliminar cliente";
        }

        return redirect('clientes')->with( $result->tipo, $result->mensaje);;
    }
}
