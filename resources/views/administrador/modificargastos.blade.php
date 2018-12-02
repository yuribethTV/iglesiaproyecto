@extends('administrador.escritorio')

@section('content')

@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/modificargastos') }}">

  @csrf
 <input type="hidden" value="{{$gastos->id}}" name="id"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Descripcion</label>
    <input name='descripcion' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$gastos->descripcion}}">
                                @if ($errors->has('descripcion'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Monto</label>
    <input name='monto' type="text" class="form-control" id="exampleInputPassword1" value="{{$gastos->monto}}">
    @if ($errors->has('monto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('monto') }}</strong>
                                    </span>
          @endif
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1">Fecha</label>
    <input name='fecha' type="date" class="form-control" id="exampleInputPassword1" value="{{$gastos->fecha}}">
    @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
  </div>


  <button type="submit" class="btn btn-primary">Modificar</button>

 
</form>






@endsection