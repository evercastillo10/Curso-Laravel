<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('titulo','Biblioteca') | Test </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/bootstrap/dist/css/bootstrap.min.css")}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/font-awesome/css/font-awesome.min.css")}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset("assets/$theme/bower_components/Ionicons/css/ionicons.min.css")}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/AdminLTE.min.css")}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset("assets/$theme/dist/css/skins/_all-skins.min.css")}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    @yield("styles")

    <!--      custom      -->
    <link rel="stylesheet" href="{{asset("assets/css/custom.css")}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition skin-blue layout sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            {{-- inicio header --}}
            @include("themes/$theme/header")
            {{-- fin header --}}
            {{-- inicio aside --}}
            @include("themes/$theme/aside")
            {{-- fin aside --}}
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content">
                    @yield('contenido')
                </section>
            </div>
             <!-- Inicio Footer -->
             @include("themes/$theme/footer")
        <!-- Fin Fotter -->
        <!-- Inicio de ventana modal para login con mas de un rol -->
            @if (session()->get("roles") && count(session()->get("roles")) > 1 )
            @csrf
                <div class="modal fade" id="modal-seleccionar-rol" data-rol-set="{{empty(session()->get("rol_id")) ? 'NO' : 'SI'}}" tabindex="-1" data-backdrop="static" data-keyboard="false">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Roles de usuario</h4>
                            </div>
                            <div class="modal-body">
                                <p>Cuentas con mas de un rol en la plataforma, a continuacion seleccione cual de ellos desea usar</p>
                                @foreach (session()->get("roles") as $key => $rol)
                                    <li>
                                        <a href="#" class="asignar-rol" data-rolid="{{$rol['id']}}" data-rolnombre="{{$rol["nombre"]}}">
                                            {{$rol["nombre"]}}
                                        </a>
                                    </li>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </div>
        <script src="{{asset("assets/$theme/bower_components/jquery/dist/jquery.min.js")}}"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset("assets/$theme/bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
        <!-- SlimScroll -->
        <script src="{{asset("assets/$theme/bower_components/jquery-slimscroll/jquery.slimscroll.min.js")}}"></script>
        <!-- FastClick -->
        <script src="{{asset("assets/$theme/bower_components/fastclick/lib/fastclick.js")}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset("assets/$theme/dist/js/adminlte.min.js")}}"></script>
        <!-- AdminLTE for demo purposes -->
        {{-- <script src="{{asset("assets/$theme/dist/js/demo.js")}}"></script> --}}
        @yield('scriptsPlugins')
        <script src="{{asset("assets/js/jquery-validation/jquery.validate.min.js")}}"></script>
        <script src="{{asset("assets/js/jquery-validation/localization/messages_es.min.js")}}"></script>
        <script src="{{asset("assets/js/scripts.js")}}"></script>
        <script src="{{asset("assets/js/funciones.js")}}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        @yield('scripts')
    </body>
</html>
