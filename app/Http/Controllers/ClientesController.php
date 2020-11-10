<?php

namespace App\Http\Controllers;

use App\CrudModel;
use App\Cliente;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\LengthAwarePaginator;
use stdClass;

class ClientesController extends Controller
{   
    private $crudModel;

    function __construct()
    {
        $this->crudModel = new CrudModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $datos = $this->crudModel->consultarClientes();

        $paginator['clientes'] = $this->getPaginador($request, $datos, 5);
        
        return view('clientes.index', $paginator);
    }
   
    private function getPaginador(Request $request, $clientes, $paginas)
    {
        $total = count($clientes);
        $paginaActual = $request->page ?? 1; // Obtiene el número de página
        $offset = ($paginaActual - 1) * $paginas; // Cuantos items seran skipeados
        $items = array_slice($clientes, $offset, $paginas);//Se corta el array solo con los datos a mostrar

        return new LengthAwarePaginator($items, $total, $paginas, $paginaActual, [
            'path' => $request->url()]);
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

        $cliente = new Cliente($request->RFC, $request->Nombre, $request->Edad,$request->idCiudad);

        try{
            if( $this->crudModel->guardarCliente($cliente) == 1){
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
        $cliente = $this->crudModel->consultarCliente($RFC);

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
            $cliente = new Cliente($request->RFC, $request->Nombre, $request->Edad,$request->idCiudad);
        
            if( $this->crudModel->modificarCliente($cliente, $RFC)){
                $result->tipo = "alertSuccess";
                $result->mensaje = "Cliente modificado existosamente";
            }else{
                $result->tipo = "alertError";
                $result->mensaje = "Ocurrió un error al modificar cliente";
            }
        }catch(Exception $e){
            var_dump($e);
            die();
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
            if( $this->crudModel->eliminarCliente($RFC) == 1){
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
