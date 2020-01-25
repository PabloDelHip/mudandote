@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
           {{-- Mensaje de error --}}
            @if(Session::get('message'))
              <div class="alert alert-danger">
                {{ Session::get('message')  }}
              </div>
            @endif
            <div class="card">
                <div class="card-header">Datos de cotizacion</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('nuevo_presupuesto')}}">
                      {{ csrf_field() }}
                      <div class="form-group">
                          <label for="exampleFormControlInput1">Fecha Probable del Servicio</label>
                          <input type="date" class="form-control" name="FechaProbServ">
                          {!! $errors->first('FechaProbServ','<small class="form-text text-muted">:message</small>') !!}
                      </div>
                      <div class="form-group">
                          <label>Mensaje</label>
                          <textarea class="form-control" name="mensaje" rows="3"></textarea>
                          {!! $errors->first('mensaje','<small class="form-text text-muted">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <label>Folio Cliente</label>
                        <input name="FolioCliente" type="numeric" class="form-control">
                        {!! $errors->first('FolioCliente','<small class="form-text text-muted">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Dirección Origen</label>
                        <input name="DireccionOrigen" type="text" class="form-control" id="exampleFormControlInput1">
                        {!! $errors->first('DireccionOrigen','<small class="form-text text-muted">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Nombre quien recibe</label>
                        <input name="NombreQuienRecibe" type="text" class="form-control" id="exampleFormControlInput1">
                        {!! $errors->first('NombreQuienRecibe','<small class="form-text text-muted">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Dirección destino</label>
                        <input name="DireccionDestino" type="text" class="form-control" id="exampleFormControlInput1">
                        {!! $errors->first('DireccionDestino','<small class="form-text text-muted">:message</small>') !!}
                      </div>
                      <div class="form-group">
                        <select name="TipoMud" class="form-control" id="exampleFormControlSelect1">
                          <option value="">Tipo mudanza</option>
                          <option value="L">Local</option>
                          <option value="F">Foraneo</option>
                        </select>
                        {!! $errors->first('TipoMud','<small class="form-text text-muted">:message</small>') !!}

                      </div>
                      <div class="form-group">
                        <input type="submit" value="Guardar Datos" class="btn btn-primary">
                      </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection