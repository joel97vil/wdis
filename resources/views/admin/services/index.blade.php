<x-app>
    <h1>Llistat d'habitacions per a poder administrar</h1>
    <a href="{{ route('admin.index') }}" class="btn btn-primary"><i class="fa fa-hammer"></i> Administració</a>
    <a href="{{ route('service.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nou Servei</a>
        <table class="table table-light">
            <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th> </th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td></td>
                    <td>{{$service->name}}</td>
                    <td>
                    <a href="{{ route('service.edit', ['id' => $service->id]) }}">Editar</a>
                    </td>
                    <td>
                        <a class="btn_delete" href="{{ route('service.delete', ['id' => $service->id]) }}">Borrar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
</x-app>
