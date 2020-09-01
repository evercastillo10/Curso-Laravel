@extends("themes.$theme.layout")
@section('titulo')
    Permisos
@endsection
@section("scripts")
<script src="{{asset("assets/pages/scripts/admin/permisos/crear.js")}}" type="text/javascript"></script>
@endsection

@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.form-error')
        @include('includes.mensaje')
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Crear Permisos</h3>
                <div class="box-tools pull-right">
                    <a href="{{route('permiso')}}" class="btn btn-block btn-info btn-sm">
                        <i class="fa fa-fw fa-reply-all"></i>Volver al listado
                    </a>
                </div>
            </div>
            <form action="{{route('permiso.guardar')}}" id="form-general" class="form-horizontal" autocomplete="off" method="post">
                @csrf
                <div class="box-body">
                    @include('admin.permiso.form')
                </div>
                <div class="box-footer">
                    <div class="col-lg-9"></div>
                    <div class="col-lg-3">
                        @include('includes.boton-form-crear')
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
