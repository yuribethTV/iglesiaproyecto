@extends('administrador.escritorio')

@section('content')
<a href="{{url('/crearcuentasporcobrar')}}" class="btn btn-info">Crear cuentas por cobrar
</a>
<form action="{{url('/cuentasporcobrardeudor')}}" method="post">
@csrf
<input type="text" name="deudor" >
                 @if ($errors->has('deudor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('deudor') }}</strong>
                                    </span>
          @endif

<input type="submit" class="btn btn-info" value="Consultar">
</form>




<table class='table'>
    <th> Fecha</th>
     <th> Deudor</th>
     <th> Concepto</th>
     <th> Monto</th>
     <th> Abono</th>
     <th> Fecha de abono</th>
     <th> Monto total </th>
     
     <th> Acciones</th>

@if(isset($cuentasporcobrar))
@foreach ($cuentasporcobrar as $i)


   <tr>
   <td>  {{ $i->fecha}} </td>
   <td>  {{ $i->deudor}} </td>
   <td>  {{ $i->concepto}} </td>
   <td>  {{ $i->monto}} </td>
   <td>  {{ $i->abono}} </td>
   <td>  {{ $i->fechadeabono}} </td>
   <td>  {{ $i->montototal}} </td>
   
   <td> <a href="{{ url('/modificarcuentasporcobrar')}}/{{$i->id}}" class="btn btn-xs btn-info"> Editar <span class="glyphicon glyphicon-pencil"> </span> </a>  
    <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="confirmarEliminar({{$i->id}});"> Borrar <span class="glyphicon glyphicon-trash"> </span>  
   </a> </td>
   
   </tr>




@endforeach
@endif

</table>
@if(count($cuentasporcobrar)==0)
<p>No hay datos que mostrar</p>
@endif
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmacion de borrar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Desea confimar la eliminacion del elemento selecionado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form id="formularioeliminar"  method="post" action="{{url('/borrarcuentasporcobrar') }}">
        @csrf
        <input type="hidden" id="idconfimar" name="id" value="0">
        <button type="submit" class="btn btn-primary">Confirmar eliminar</button>
        </form>
        
      </div>
    </div>
  </div>
</div>

<script>

function confirmarEliminar(id){
   $("#idconfimar").attr('value',id);
}
</script>
@endsection
