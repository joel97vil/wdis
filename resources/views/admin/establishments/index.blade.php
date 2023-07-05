<x-app>
    <h1>Llistat de edificis per a poder administrar</h1>
    <a href="/admin/" class="btn btn-primary"><i class="fa fa-hammer"></i> Administració</a>
    <a href="{{ route('establishment.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nou edifici</a>
    <table class="table table-light">
        <thead>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Tipus</th>
            <th>Ciutat</th>
            <th>Adreça</th>
            <th> </th>
            <th> </th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $establishment)
            <tr>
                <td></td>
                <td>{{$establishment->name}}</td>
                <td>{{$establishment->establishment_type}}</td>
                <td>{{$establishment->city}}</td>
                <td>{{$establishment->address}}</td>
                <td>
                    <a href="{{ route('establishment.edit', ['id' => $establishment->id]) }}">Editar</a>
                </td>
                <td>
                    <a class="btn_delete" href="{{ route('establishment.delete', ['id' => $establishment->id]) }}">Borrar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</x-app>