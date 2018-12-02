@extends('administrador.escritorio')

@section('content')

@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/modificarcuentasporcobrar') }}">

  @csrf
 <input type="hidden" value="{{$cuentasporcobrar->id}}" name="id"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Fecha</label>
    <input name='fecha' type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$cuentasporcobrar->fecha}}">
                                @if ($errors->has('fecha'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fecha') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Deudor</label>
    <input name='deudor' type="text" class="form-control" id="exampleInputPassword1" value="{{$cuentasporcobrar->deudor}}">
    @if ($errors->has('deudor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deudor') }}</strong>
                                    </span>
          @endif
  </div>


 <div class="form-group">
    <label for="exampleInputPassword1">Concepto</label>
    <input name='concepto' type="text" class="form-control" id="exampleInputPassword1" value="{{$cuentasporcobrar->concepto}}">
    @if ($errors->has('concepto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('concepto') }}</strong>
                                    </span>
                                @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Monto</label>
    <input name='monto' type="numeric" class="form-control" id="exampleInputPassword1" value="{{$cuentasporcobrar->monto}}">
    @if ($errors->has('monto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('monto') }}</strong>
                                    </span>
                                @endif
  </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Abono</label>
    <input name='abono' type="numeric" class="form-control" id="exampleInputPassword1" value="{{$cuentasporcobrar->abono}}">
    @if ($errors->has('abono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('abono') }}</strong>
                                    </span>
                                @endif
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Fecha de abono</label>
    <input name='fechadeabono' type="date" class="form-control" id="exampleInputPassword1" value="{{$cuentasporcobrar->fechadeabono}}">
    @if ($errors->has('fechadeabono'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechadeabono') }}</strong>
                                    </span>
                                @endif
  </div>


 <div class="form-group">
    <label for="exampleInputPassword1">Monto total</label>
    <input name='montototal' type="numeric" class="form-control" id="exampleInputPassword1" value="{{$cuentasporcobrar->montototal}}">
    @if ($errors->has('montototal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('montototal') }}</strong>
                                    </span>
                                @endif
  </div>


  <button type="submit" class="btn btn-primary">Modificar</button>

 
</form>






@endsection