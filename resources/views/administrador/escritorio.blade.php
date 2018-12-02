<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iglesia Oasis de Luz</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap.min.css') }}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="{{ URL::asset('/bootstrap/css/bootstrap-theme.min.css') }}" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('/css/escritorio.css') }}">
    
</head>
<body>

 <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
 


                <a href="{{url('/inicio')}}"> <img src="{{ URL::asset('/imagenes/logo.png') }}" width="200px" /></a>

            </div>

            <ul class="list-unstyled components">
                <p> {{ Auth::user()->name }}</p>
                <li class="active">
                    <a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Contabilidad</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu1">
                        <li>
                            <a href="{{url('/listaingresos')}}">Ingresos</a>
                        </li>
                        <li>
                            <a href="{{url('/listagastos')}}">Gastos</a>
                        </li>

                    
                        <li>
                            <a href="{{url('/listacuentasporcobrar')}}">Cuentas por cobrar</a>
                        </li>    
                        <li>
                            <a class="texto" href="{{url('/listacuentasporpagar')}}">Cuentas por pagar</a>
                        </li>
                        
                        
                    </ul>
                </li>


                <li>
                <li class="active">
                    <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Miembros</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu2">
                        <li>
                            <a href="{{url('/listaninos')}}">Niños</a>
                        </li>
                        <li>
                            <a href="{{url('/listajovenes')}}">Jovenes</a>
                        </li>
                        <li>
                            <a href="{{url('/listaadultos')}}">Adultos</a>
                        </li>
                    </ul>
                </li>
                <li>


                    <a href="{{url('/listamisionvision')}}">Misión y visión</a>
                </li>
               
                <li>
                <a  href="{{ url('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                </li>
                
            </ul>
            
            <p style = color:white;> &copy;Yuribeth Torres, Danny Dinarte 2018</p> 
        </nav>
        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Menu</span>
                    </button>
                    

                </div>
            </nav>

           
            @yield('content') 
            
         </div>
    </div>
  
  </main>

  
  <script
  src="{{ URL::asset('/js/jquery/jquery-3.3.1.min.js') }}"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
 <!-- Latest compiled and minified JavaScript -->
<script src="{{ URL::asset('/bootstrap/js/bootstrap.min.js') }}" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>


</body>
</html>
