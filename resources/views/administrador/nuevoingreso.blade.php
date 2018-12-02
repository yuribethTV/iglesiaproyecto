@extends('administrador.escritorio')

@section('content')
@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/nuevoingreso') }}">

  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <input name='descripcion' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Descripción">
    
    
    @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
          @endif


  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Monto</label>
    <input name='monto' type="text" class="form-control" id="exampleInputPassword1" placeholder="Monto">
  </div>

@if ($errors->has('monto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('monto') }}</strong>
                                    </span>
          @endif





 <div class="form-group">
    <label for="exampleInputPassword1">Fecha</label>
    <input name='fecha' type="date" class="form-control" id="exampleInputPassword1" placeholder="Fecha">
  </div>

@if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
          @endif





  <button type="submit" class="btn btn-info">Crear</button>

 
</form>



@endsection