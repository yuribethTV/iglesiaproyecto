@extends('administrador.escritorio')

@section('content')

<table class='table'>
    <th> Acción</th>
     <th> Tabla</th>
     <th> Usuario</th>
     <th> Fecha de creación</th>
     <th> Fecha de modificación</th>
     

@if(isset($logs))
@foreach ($logs as $log)


   <tr>
   <td>  {{ $log->accion}} </td>
   <td>  {{ $log->tabla}} </td>
   <td>  {{ $log->user->name }} </td>
   <td>  {{ $log->created_at}} </td>
   <td>  {{ $log->updated_at}} </td>
     
   </tr>
@endforeach

@endif
</table>


@endsection