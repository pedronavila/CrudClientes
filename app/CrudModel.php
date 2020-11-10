<?php

namespace App;

use App\ClientesDao;

class CrudModel {

    private $clientesDao;

    function __construct()
    {
        $this->clientesDao = new ClientesDao();
    }

    public function consultarClientes(){
        return $this->clientesDao->consultarClientes();
    }

    public function eliminarCliente($RFC){
        return $this->clientesDao->eliminarCliente($RFC);
    }

    public function guardarCliente($cliente){
        return $this->clientesDao->guardarCliente($cliente);
    }
    
    public function consultarCliente($RFC){
        return $this->clientesDao->consultarCliente($RFC);
    }

    public function modificarCliente($cliente, $RFC){
        return $this->clientesDao->modificarCliente($cliente, $RFC);
    }

}