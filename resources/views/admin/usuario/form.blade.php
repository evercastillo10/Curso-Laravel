<div class="form-group">
    <label for="nombre" class="col-lg-3 control-label requerido">Nombre</label>
    <div class="col-lg-8">
        <input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre', $data->nombre ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="usuario" class="col-lg-3 control-label requerido">Usuario</label>
    <div class="col-lg-8">
        <input type="text" name="usuario" id="usuario" class="form-control" value="{{old('usuario', $data->usuario ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="email" class="col-lg-3 control-label requerido">E-Mail</label>
    <div class="col-lg-8">
        <input type="email" name="email" id="email" class="form-control" value="{{old('email', $data->email ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="password" class="col-lg-3 control-label requerido">Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="password" id="password" class="form-control" value="{{old('password', $data->password ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="re_password" class="col-lg-3 control-label requerido">Repita Contraseña</label>
    <div class="col-lg-8">
        <input type="password" name="re_password" id="re_password" class="form-control" value="{{old('re_password', $data->re_password ?? '')}}" required/>
    </div>
</div>
<div class="form-group">
    <label for="rol_id" class="col-lg-3 control-label requerido">Rol</label>
    <div class="col-lg-8">
        <select name="rol_id" id="rol_id" class="form-control" required>
            <option value="">Seleccione el rol</option>
            @foreach($rols as $id => $nombre)
                <option value="{{$id}}" {{old("rol_id", $data->roles[0]->id ?? "") == $id ? "selected" : ""}}>{{$nombre}}</option>
            @endforeach
        </select>
    </div>
</div>
