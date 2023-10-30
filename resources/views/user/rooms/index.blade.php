<x-app>

    <h1>Llistat de habitacions per a poder administrars</h1>
    <a href="/user/" class="btn btn-primary">Administració</a>
    <a href="{{ route('user.create') }}" class="btn btn-primary">Nova habitació</a>
    <table class="table table-light">
        <thead>
        <tr>
            <th></th>
            <th>Nom</th>
            <th>Descripció</th>
            <th>Adreça</th>
            <th>Foto</th>
            <th>Ocupants</th>
            <th>Preu</th>
            <th>Comentaris</th>
            <th> </th>
            <th> </th>
        </tr>
        </thead>
        <tbody>           
        @foreach($data as $room)
            <tr>
                <td></td>
                <td>{{$room->name}}</td>
                <td>{{$room->description}}</td>
                <td>{{$room->address}}</td>
                <td>{{$room->photo}}</td>
                <td>{{$room->occupancy}}</td>
                <td>{{$room->price}}</td>
                <td>{{$room->comments}}</td>
                <td>
                    <a href="#">Edit</a>
                </td>
                <td>
                    <a href="#">Delete</a>
                </td>
            </tr>
        @endforeach 
        </tbody>
    </table>

</x-app>