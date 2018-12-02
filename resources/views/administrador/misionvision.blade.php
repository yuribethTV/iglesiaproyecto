@extends('administrador.escritorio')

@section('content')
@csrf
<form action="{{url('/listamisionvision')}}" method="post">



<div class="panel panel-default">
  <div class="panel-heading">Misión</div>
  <div class="panel-body">
    <p>     Ministerio de Dios enfocado a la predicación de la Palabra de Dios, 
    a restauración de la familia y a la capacitación a pastores y líderes.</p>

</div>

<div class="panel panel-default">
    <div class="panel-heading">Visión</div>
  <div class="panel-body">
    <p>     Ser una congregación fraterna que enseña  y vive el evangelio de Jesucristo,
     manifestado en la conversión, restauración y formación de individuos y familiares.</p>
  </div>
 
  

      @endsection