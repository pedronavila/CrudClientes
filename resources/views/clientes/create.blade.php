@extends('layouts.app')
@section('title', 'Editar cliente')

@section('content')


<div class="container col-md-4 vertical-center">

    <h1>Agregar cliente</h1>

    <form action="{{url('/clientes')}}" method="post" class="form-horizontal" autocomplete="off">
        {{csrf_field()}}
        @include('clientes.form', ['tipo' => 'create'])
    </form>

</div>
@endsection