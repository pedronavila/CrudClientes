<?php

namespace App;
use App\Cliente;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientesDao
{
    function __construct()
    {
    }

    public function consultarClientes(){
        $clientes = [];
        $results = DB::select('SELECT * FROM clientes');
        foreach ($results as $registro) {
            $clientes[] = new Cliente($registro->RFC, $registro->nombre, $registro->edad,$registro->idciudad);
        }
        
        return $clientes;
    }

    public function guardarCliente($cliente){
        $result = DB::insert('INSERT INTO clientes VALUES (?,?,?,?)', 
        [$cliente->getRFC(), $cliente->getNombre(), $cliente->getEdad(), $cliente->getIdCiudad()]);
        
        return $result;
    }

    public function eliminarCliente($RFC){
        $result = DB::delete('DELETE clientes WHERE rfc = ?', [$RFC]);

        return $result;
    }

    public function modificarCliente($cliente, $RFC){
        $result = DB::update('UPDATE clientes SET RFC = ?, nombre = ?, edad = ?, idciudad = ? WHERE RFC = ?', 
        [$cliente->getRFC(), $cliente->getNombre(), $cliente->getEdad(), $cliente->getIdCiudad(), $RFC]);

        return $result;
    }

    public function consultarCliente($RFC){
        $result = DB::select('SELECT * FROM clientes WHERE RFC = ?', [$RFC])[0];
        
        $cliente = new Cliente($result->RFC, $result->nombre, $result->edad,$result->idciudad);
      
        return $cliente;
    }

    
   
}
