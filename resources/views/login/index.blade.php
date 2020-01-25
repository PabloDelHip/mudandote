@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center d-flex" style="height: 100vh;">
        <div class="col-md-6">
            {{-- Mensaje de error --}}
            @if(Session::get('message'))
                <div class="alert alert-danger">
                    {{ Session::get('message')  }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">Iniciar Sesion</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login')}}">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <label for="exampleInputEmail1">Usuario</label>
                            <input type="text" name="usuario" value="{{ old('usuario') }}" class="form-control {{ $errors->has('usuario') ? 'is-invalid' : '' }}" id="exampleInputEmail1" placeholder="Ingresar usuario">
                            {!! $errors->first('usuario','<small class="form-text text-muted">:message</small>') !!}
                        </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" name="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="exampleInputPassword1" placeholder="Contraseña">
                            {!! $errors->first('password','<small class="form-text text-muted">:message</small>') !!}
                        </div>
                        <hr>
                        <div class="form-group">
                            <select class="form-control {{ $errors->has('plaza') ? 'is-invalid' : '' }}" name="plaza">
                              <option value="">Seleccionar Plaza</option>
                              @foreach ($plazas as $plaza)
                                <option @if(old('plaza') == $plaza->Clave) selected @endif value="{{$plaza->Clave}}">{{$plaza->Nombre_Plaza}}</option>
                              @endforeach
                            </select>
                            {!! $errors->first('plaza','<small class="form-text text-muted">:message</small>') !!}
                          </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection