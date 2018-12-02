@extends('administrador.escritorio')

@section('content')
<a href="{{url('/creargastos')}}" class="btn btn-info">Crear Gasto
</a>
<form action="{{url('/gastosfecha')}}" method="post">
@csrf
<input type="date" name="fechainicio" >
@if ($errors->has('fechainicio'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechainicio') }}</strong>
                                    </span>
          @endif
<input type="date" name="fechafinal" >
@if ($errors->has('fechafinal'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechafinal') }}</strong>
                                    </span>
          @endif
<input type="submit" class="btn btn-info" value="Consultar">
</form>
<table class='table'>
    <th> Descripcion</th>
     <th> Monto</th>
     <th> Fecha</th>
     
     
     <th> Acciones</th>

@if(isset($gastos))
@foreach ($gastos as $i)


   <tr>
   <td>  {{ $i->descripcion}} </td>
   <td>  {{ $i->monto}} </td>
   <td>  {{ $i->fecha}} </td>
   
   <td> <a href="{{ url('/modificargastos')}}/{{$i->id}}" class="btn btn-xs btn-info"> Editar <span class="glyphicon glyphicon-pencil"> </span> </a>  
   <td> <a type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="confirmarEliminar({{$i->id}});"> Borrar <span class="glyphicon glyphicon-trash"> </span>  
   </a> 
   
   </tr>
@endforeach
@endif


</table>
</table>
@if(count($gastos)==0)
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
        <form id="formularioeliminar"  method="post" action="{{url('/borrargastos') }}">
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

