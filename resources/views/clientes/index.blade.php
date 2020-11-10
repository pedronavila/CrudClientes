@extends('layouts.app')
@section('title', 'Lista de clientes')

@section('content')
<div class="container">

<h1>Lista de clientes</h1>

@if(Session::has('alertSuccess')) 
    <div class="alert alert-success" role="alert">
        {{ Session::get('alertSuccess') }}
    </div>
@endif

@if(Session::has('alertError')) 
    <div class="alert alert-danger" role="alert">
        {{ Session::get('alertError') }}
    </div>
@endif

<a href="{{ url('clientes/create') }}" class="btn btn-success">Agregar Cliente</a>
<br><br>

<table class="table table-light table-hover">
    <thead class="thead-light">
        <tr>
        <th>#</th>
            <th>RFC</th>
            <th>Nombre</th>
            <th>Edad</th>
            <th>idCiudad</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach($clientes as $cliente)
                <tr>
                <td>{{$loop->iteration + $clientes->firstItem() - 1}}</td>
                <td>{{$cliente->getRFC()}}</td>
                <td>{{$cliente->getNombre()}}</td>
                <td>{{$cliente->getEdad()}}</td>
                <td>{{$cliente->getIdCiudad()}}</td>
                <td >
                    <a class="btn btn-warning" href="{{'clientes/'.$cliente->getRFC().'/edit'}}">Editar</a>
                    <form action="{{ url('/clientes/'.$cliente->getRFC()) }}" style="display:inline" method="post">
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                        <button class="btn btn-danger" type="submit" onclick="return confirm('¿Desea borrarlo?')";>Borrar</button>
                    </form>
            
            </td>
        </tr>
        @endforeach
    </tbody>
    
</table>
{{$clientes->links()}}
</div>
@endsection