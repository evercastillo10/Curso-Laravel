@extends("themes.$theme.layout")
@section('scripts')
<script src="{{asset("assets/pages/scripts/admin/usuarios/index.js")}}"></script>
@endsection
@section('titulo')
    Usuario
@endsection
@section('contenido')
<div class="row">
    <div class="col-lg-12">
        @include('includes.mensaje')
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Usuario</h3>
              <div class="box-tools pull-right">
                <a href="{{route('crear.usuario')}}" class="btn btn-block btn-success btn-sm">
                    <i class="fa fa-fw fa-plus-circle"></i>Nuevo Usuario
                </a>
            </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover table-bordered table-striped" id="tabla-data" >
                    <thead>
                        <tr>
                            <th>Usuario</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th class="width70"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($usuario as $usuarios)
                        <tr>
                            <td>{{$usuarios -> usuario}}</td>
                            <td>{{$usuarios -> nombre}}</td>
                            <td>{{$usuarios -> email}}</td>
                            <td>
                                @foreach ($usuarios->roles as $rol)
                                    {{ $loop->last ? $rol->nombre : $rol->nombre . ', '}}
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route("editar.usuario", ['id'=> $usuarios->id])}}" class="btn-accion-tabla tooltipsC" title="Editar | {{$usuarios->nombre}}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{route("eliminar.usuario", ['id'=>$usuarios->id])}}" class="d-inline form-eliminar"  method="post">
                                      @csrf @method("delete")
                                      <button type="submit" class="btn-accion-tabla eliminar tooltipsC" title="Eliminar | {{$usuarios->nombre}}"><i class="fa fa-fw fa-trash text-danger"></i></button>
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
