@if($omvs->isEmpty())
    <tr>
        <td colspan="4" class="text-center">No hay organizaciones</td>
    </tr>
@else
    @foreach ($omvs as $index => $omv)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $omv->nombre_comercial }}</td>
            <td>{{ $omv->estatus }}</td>
            <td>
                <button class="btn btn-warning btn-sm">Editar</button>
                <button class="btn btn-danger btn-sm">Eliminar</button>
            </td>
        </tr>
    @endforeach
@endif
