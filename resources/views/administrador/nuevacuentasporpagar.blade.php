@extends('administrador.escritorio')

@section('content')
@if(session()->has('message'))
                      <div class="alert alert-success">
                          {{ session()->get('message') }}
                      </div>
                  @endif

<form method='post' action="{{url('/nuevacuentasporpagar') }}">

  @csrf

  <div class="form-group">
    <label for="exampleInputEmail1">Proveedores</label>
    <input name='proveedores' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="proveedores">
    
    
    @if ($errors->has('proveedores'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('proveedores') }}</strong>
                                    </span>
          @endif


  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Numero de factura</label>
    <input name='numerodefactura' type="text" class="form-control" id="exampleInputPassword1" placeholder="numerodefactura">
  </div>

@if ($errors->has('numerodefactura'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('numerodefactura') }}</strong>
                                    </span>
          @endif





 <div class="form-group">
    <label for="exampleInputPassword1">Monto original</label>
    <input name='montooriginal' type="numeric" class="form-control" id="exampleInputPassword1" placeholder="montooriginal">
  </div>

@if ($errors->has('montooriginal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('montooriginal') }}</strong>
                                    </span>
          @endif


 <div class="form-group">
    <label for="exampleInputPassword1">Fecha de factura</label>
    <input name='fechadefactura' type="date" class="form-control" id="exampleInputPassword1" placeholder="fechadefactura">
  </div>

@if ($errors->has('fechadefactura'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechadefactura') }}</strong>
                                    </span>
          @endif

 <div class="form-group">
    <label for="exampleInputEmail1">Concepto</label>
    <input name='concepto' type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="concepto">
    
    
    @if ($errors->has('concepto'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('concepto') }}</strong>
                                    </span>
          @endif

 <div class="form-group">
    <label for="exampleInputPassword1">Fecha de vencimiento</label>
    <input name='fechadevencimiento' type="date" class="form-control" id="exampleInputPassword1" placeholder="fechadevencimiento">
  </div>

@if ($errors->has('fechadevencimiento'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechadevencimiento') }}</strong>
                                    </span>
          @endif


  <button type="submit" class="btn btn-info">Crear</button>

 
</form>



@endsection