<div class="form-group">
    <label for="RFC" class="control-label">{{'RFC'}}</label>
    <input type="text" class="form-control" name="RFC" id="RFC" 
    value="{{isset($cliente) ? $cliente->getRFC() : ''}}">
</div>

<div class="form-group">
    <label for="Nombre" class="control-label">{{'Nombre'}}</label>
    <input type="text" class="form-control" name="Nombre" id="Nombre"
    value="{{isset($cliente) ? $cliente->getNombre(): ''}}">
</div>
    
<div class="form-group">
    <label for="Edad" class="control-label">{{'Edad'}}</label>
    <input type="text" class="form-control" name="Edad" id="Edad"
    value="{{isset($cliente) ? $cliente->getEdad() : ''}}">
</div>
    
<div class="form-group">
    <label for="idCiudad" class="control-label">{{'idCiudad'}}</label>
    <input type="text" class="form-control" name="idCiudad" id="idCiudad"
    value="{{isset($cliente) ? $cliente->getIdCiudad() : ''}}">
</div>
    

<input type="submit" id="btnGuardar" class="btn btn-success" value="{{ $tipo == 'edit' ? 'Modificar' : 'Agregar' }}">

<a class="btn btn-primary" href="{{ url('clientes') }}">Regresar</a>
