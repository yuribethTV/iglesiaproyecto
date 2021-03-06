@extends('administrador.escritorio')

@section('content')

@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/modificaradultos') }}">

  @csrf
 <input type="hidden" value="{{$adultos->id}}" name="id"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Cedula</label>
    <input name='cedula' type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$adultos->cedula}}">
                                @if ($errors->has('cedula'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cedula') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Nombre</label>
    <input name='nombre' type="text" class="form-control" id="exampleInputPassword1" value="{{$adultos->nombre}}">
    @if ($errors->has('nombre'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
          @endif
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1">Teléfono</label>
    <input name='telefono' type="string" class="form-control" id="exampleInputPassword1" value="{{$adultos->telefono}}">
    @if ($errors->has('telefono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Fecha de nacimiento</label>
    <input name='fechanacimiento' type="string" class="form-control" id="exampleInputPassword1" value="{{$adultos->fechanacimiento}}">
    @if ($errors->has('fechanacimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechanacimiento') }}</strong>
                                    </span>
                                @endif
  </div>

  <button type="submit" class="btn btn-primary">Modificar</button>

 
</form>






@endsection