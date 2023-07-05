<x-app>
    <h1>Llistat d'habitacions per a poder administrar</h1>
    <a href="{{ route('admin.index') }}" class="btn btn-primary"><i class="fa fa-hammer"></i> Administració</a>
    <a href="{{ route('room.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nou apartament</a>
    @foreach($users as $user)
        <div>User: {{ $user->name }}</div>
        <table class="table table-light">
            <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Hotel</th>
                <th>Ciutat</th>
                <th>Adreça</th>
                <th>Capacitat</th>
                <th>Preu</th>
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->rooms as $room)
                <tr>
                    <td></td>
                    <td>{{$room->name}}</td>
                    <td>{{$room->description}}</td>
                    <td>{{$room->establishment->name}}</td>
                    <td>{{$room->establishment->city}}</td>
                    <td>{{$room->establishment->address}}</td>
                    <td>{{$room->occupancy}}</td>
                    <td>{{$room->price}}</td>
                    <td>
                        <a href="{{ route('room.show', ['id' => $room->id]) }}">Detalls</a>
                    </td>
                    <td>
                        <a href="{{ route('room.edit', ['id' => $room->id]) }}">Editar</a>
                    </td>
                    <td>
                        <a class="btn_delete" href="{{ route('room.delete', ['id' => $room->id]) }}">Borrar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endforeach
</x-app>
