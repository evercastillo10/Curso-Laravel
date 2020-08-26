@extends("themes.$theme.layout")
@section('titulo')
    Sistemas Menus
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/menu/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Crear Menu</h3>
            </div>
            <form class="form-horizontal" action="{{route('guardar.menu')}}" id="form-general" method="POST" autocomplete="off">
                @csrf
                <div class="box-body">
                    @include('admin.menu.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-3"></div>
                    <div class="col-lg-6">
                    @include('includes.boton-form-crear')
                </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
