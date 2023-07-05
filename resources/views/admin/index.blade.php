<x-app>
    <h1>Dashboard de l'administrador</h1>
    <hr />
    <div class="row">
        <div class="col-3">
            <a href="{{ route('admin.users') }}" class="btn btn-primary btn-block btn-lg"><i class="fa fa-user"></i> Administració d'usuaris</a>
        </div>
        <div class="col-3">
            <a href="{{ route('admin.establishments') }}" class="btn btn-success btn-block btn-lg"><i class="fa fa-buliding"></i> Administració d'edificis</a>
        </div>
        <div class="col-3">
            <a href="{{ route('admin.rooms') }}" class="btn btn-warning btn-block btn-lg"><i class="fa fa-house"></i> Administració d'habitacions</a>
        </div>
        <div class="col-3">
            <a href="{{ route('admin.services') }}" class="btn btn-danger btn-block btn-lg"><i class="fa fa-house"></i> Administració de serveis</a>
        </div>
    </div>
</x-app>
