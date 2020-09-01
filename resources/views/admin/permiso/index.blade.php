@extends("themes.$theme.layout")
@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/permisos/index.js")}}"></script>
@endsection
@section('titulo')
    Permisos
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Permisos</h3>
              <div class="box-tools pull-right">
                <a href="{{route('crear.permiso')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i>Nuevo Permiso
                </a>
            </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered table-striped" id="tabla-data" >
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Slug</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($permisos as $permiso)
                        <tr>
                            <td>{{$permiso -> id}}</td>
                            <td>{{$permiso -> nombre}}</td>
                            <td>{{$permiso -> slug}}</td>
                            <td>
                                <a href="{{route("editar.permiso", ['id'=> $permiso->id])}}" class="btn-accion-tabla tooltipsC" title="Editar | {{$permiso->nombre}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route("eliminar.permiso", ['id'=>$permiso->id])}}" class="d-inline form-eliminar"  method="post">
                                      @csrf @method("delete")
                                      <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar | {{$permiso->nombre}}"><i class="fa fa-fw fa-trash text-danger"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
@endsection
