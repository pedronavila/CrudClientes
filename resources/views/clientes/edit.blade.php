@extends('layouts.app')
@section('title', 'Editar cliente')

@section('content')

<div class="container col-md-4 vertical-center">
    <h1>Editar cliente</h1>

    <form action="{{ url('/clientes/'.$cliente->getRFC()) }}"  method="post" autocomplete="off">
        {{csrf_field()}}
        {{method_field('PUT')}}
        @include('clientes.form', ['tipo'=>'edit'])
    </form>

</div>
@endsection