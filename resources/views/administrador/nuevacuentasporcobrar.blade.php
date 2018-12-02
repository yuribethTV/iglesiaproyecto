@extends('administrador.escritorio')

@section('content')
@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/nuevacuentasporcobrar') }}">

  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Fecha</label>
    <input name='fecha' type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="fecha">
    
    
    @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
          @endif


  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Deudor</label>
    <input name='deudor' type="text" class="form-control" id="exampleInputPassword1" placeholder="deudor">
  </div>

@if ($errors->has('deudor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deudor') }}</strong>
                                    </span>
          @endif


 <div class="form-group">
    <label for="exampleInputPassword1">Concepto</label>
    <input name='concepto' type="numeric" class="form-control" id="exampleInputPassword1" placeholder="concepto">
  </div>

@if ($errors->has('concepto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('concepto') }}</strong>
                                    </span>
          @endif


 <div class="form-group">
    <label for="exampleInputPassword1">Monto</label>
    <input name='monto' type="numeric" class="form-control" id="exampleInputPassword1" placeholder="monto">
  </div>

@if ($errors->has('monto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('monto') }}</strong>
                                    </span>
          @endif

 <div class="form-group">
    <label for="exampleInputEmail1">Abono</label>
    <input name='abono' type="numeric" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="abono">
    
    
    @if ($errors->has('abono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('abono') }}</strong>
                                    </span>
          @endif

 <div class="form-group">
    <label for="exampleInputPassword1">Fecha de abono</label>
    <input name='fechadeabono' type="date" class="form-control" id="exampleInputPassword1" placeholder="fechadeabono">
  </div>

@if ($errors->has('fechadeabono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechadeabono') }}</strong>
                                    </span>
          @endif

<div class="form-group">
    <label for="exampleInputPassword1">Monto total</label>
    <input name='montototal' type="numeric" class="form-control" id="exampleInputPassword1" placeholder="montototal">
  </div>

@if ($errors->has('montototal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('montototal') }}</strong>
                                    </span>
          @endif


  <button type="submit" class="btn btn-info">Crear</button>

 
</form>



@endsection