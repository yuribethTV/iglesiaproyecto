@extends('administrador.escritorio')

@section('content')
@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/nuevomiembrojovenes') }}">

  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Cédula</label>
<input name='cedula' type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cédula">   
    @if ($errors->has('cedula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
          @endif


  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre</label>
    <input name='nombre' type="text" class="form-control" id="exampleInputPassword1" placeholder="nombre">
  </div>

@if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
          @endif





 <div class="form-group">
    <label for="exampleInputPassword1">Teléfono</label>
    <input name='telefono' type="string" class="form-control" id="exampleInputPassword1" placeholder="telefono">
  </div>

@if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
          @endif




<div class="form-group">
    <label for="exampleInputPassword1">Fecha de nacimiento</label>
    <input name='fechanacimiento' type="date" class="form-control" id="exampleInputPassword1" placeholder="fechanacimiento">
  </div>

@if ($errors->has('fechanacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechanacimiento') }}</strong>
                                    </span>
          @endif





  <button type="submit" class="btn btn-info">Crear</button>

 
</form>



@endsection