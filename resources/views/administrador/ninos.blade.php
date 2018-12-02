@extends('administrador.escritorio')

@section('content')
@if(Auth::user()->rol==1)
<a href="{{url('/crearmiembroninos')}}" class="btn btn-info">Crear miembro
</a>
@endif
@csrf
<table class='table'>
    <th> Cedula</th>
     <th> Nombre</th>
     <th> Telefono</th>
     <th> Fecha de nacimiento</th>
     <th> Acciones</th>
    

@if(isset($ninos))
@foreach ($ninos as $i)


   <tr>
   <td>  {{ $i->cedula}} </td>
   <td>  {{ $i->nombre}} </td>
   <td>  {{ $i->telefono}} </td>
   <td>  {{ $i->fechanacimiento}} </td>
   <td> <a href="{{ url('/modificarninos')}}/{{$i->id}}" class="btn btn-xs btn-info"> Editar <span class="glyphicon glyphicon-pencil"> </span> </a>  
   
   <td> <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="confirmarEliminar({{$i->id}});"> Borrar <span class="glyphicon glyphicon-trash"> </span>  
   </a> 
   </tr>




@endforeach
@endif


</table>


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Desea confimar la eliminacion del elemento selecionado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form id="formularioeliminar"  method="post" action="{{url('/borrarninos') }}">
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