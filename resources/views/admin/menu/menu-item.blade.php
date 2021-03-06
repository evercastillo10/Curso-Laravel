
@if ($item["submenu"] == [])
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}} ">
        <a href="{{route('editar.menu',['id' => $item["id"]])}}" class="tooltipsC" title="Editar {{"$item[nombre]"}}">{{$item["nombre"] ." | ". " | Url "}}<i class="fa fa-arrow-right"></i>{{" "}}{{  $item["url"]." | "." | "}} Icono <i class="fa fa-arrow-right"> </i> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <a href="{{route('eliminar.menu', ['id' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar menu {{$item["nombre"]}}"><i class="text-danger fa fa-trash-o"></i></a>
    </div>
</li>
@else
<li class="dd-item dd3-item" data-id="{{$item["id"]}}">
    <div class="dd-handle dd3-handle"></div>
    <div class="dd3-content {{$item["url"] == "javascript:;" ? "font-weight-bold" : ""}}">
        <a href="{{route('editar.menu',['id' => $item["id"]])}}" class="tooltipsC" title="Editar {{"$item[nombre]"}}" >{{ $item["nombre"] ." | ". " | Url"}} <i class="fa fa-arrow-right"></i>{{" "}}{{ $item["url"]." | "." | "}} Icono <i class="fa fa-arrzow-right"> </i> <i style="font-size:20px;" class="fa fa-fw {{isset($item["icono"]) ? $item["icono"] : ""}}"></i></a>
        <a href="{{route('eliminar.menu', ['id' => $item["id"]])}}" class="eliminar-menu pull-right tooltipsC" title="Eliminar menu {{$item["nombre"]}}"><i class="text-danger fa fa-trash-o"></i></a>
    </div>
    <ol class="dd-list">
        @foreach ($item["submenu"] as $submenu)
        @include("admin.menu.menu-item",[ "item" => $submenu])
        @endforeach
    </ol>
</li>
@endif
