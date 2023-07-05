<x-app>
    <h1>Dashboard de l'usuari</h1>

    <a href="{{ route('user.rooms') }}" class="btn btn-primary">Administració d'habitacions</a>
    <a href="{{ route('user.create') }}" class="btn btn-secondary">Nova habitació</a>

</x-app>