@extends('administrador.escritorio')

@section('content')

@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/modificarcuentasporpagar') }}">

  @csrf
 <input type="hidden" value="{{$cuentasporpagar->id}}" name="id"> 
  <div class="form-group">
    <label for="exampleInputEmail1">Proveedores</label>
    <input name='proveedores' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$cuentasporpagar->proveedores}}">
                                @if ($errors->has('proveedores'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('proveedores') }}</strong>
                                    </span>
                                @endif
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Número de factura</label>
    <input name='numerodefactura' type="text" class="form-control" id="exampleInputPassword1" value="{{$cuentasporpagar->numerodefactura}}">
    @if ($errors->has('numerodefactura'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numerodefactura') }}</strong>
                                    </span>
          @endif
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1">Monto original</label>
    <input name='montooriginal' type="numeric" class="form-control" id="exampleInputPassword1" value="{{$cuentasporpagar->montooriginal}}">
    @if ($errors->has('montooriginal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('montooriginal') }}</strong>
                                    </span>
                                @endif
  </div>

 <div class="form-group">
    <label for="exampleInputPassword1">Fecha de factura</label>
    <input name='fechadefactura' type="numeric" class="form-control" id="exampleInputPassword1" value="{{$cuentasporpagar->fechadefactura}}">
    @if ($errors->has('fechadefactura'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechadefactura') }}</strong>
                                    </span>
                                @endif
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Concepto</label>
    <input name='concepto' type="text" class="form-control" id="exampleInputPassword1" value="{{$cuentasporpagar->concepto}}">
    @if ($errors->has('concepto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('concepto') }}</strong>
                                    </span>
                                @endif
  </div>

    <div class="form-group">
    <label for="exampleInputPassword1">Fecha de vencimiento</label>
    <input name='fechadevencimiento' type="date" class="form-control" id="exampleInputPassword1" value="{{$cuentasporpagar->fechadevencimiento}}">
    @if ($errors->has('fechadevencimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechadevencimiento') }}</strong>
                                    </span>
                                @endif
  </div>


  <button type="submit" class="btn btn-primary">Modificar</button>

 
</form>






@endsection