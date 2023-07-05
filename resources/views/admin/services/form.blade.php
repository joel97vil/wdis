<x-app>
<h1>Formulari d'edició d'una habitació</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="c-form" action="{{ $service->id !== null ? route('service.update') : route('service.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <input name="id" type="hidden" value="{{ $service->id }}">

        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="name">Nom Servei</label>
                    <input class="form-control c-input" id="name" aria-label="Nom Servei" name="name" type="text" value="{{ $service->name }}" />
                </div>

            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
            
            <a href="{{ route('admin.services') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Enrere</a>
        </div>
    </form>
</x-app>
