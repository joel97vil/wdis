<x-app>
    <?php
    if (isset($readonly))
    {
        $readonly = "readonly";
    } else {
        $readonly = null;
    }
    ?>
    <h1>Formulari d'edició de establishment</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="c-form" action="{{ $establishment->id !== null ? route('establishment.update') : route('establishment.store') }}" enctype="multipart/form-data" method="post">

        @csrf
        <input name="id" id="id" type="hidden" value="{{ $establishment->id }}">

        <div class="form-group">
            <div class="row">
                <div class="col-4">
                    <label for="name">Nom del edifici</label>
                    <input class="form-control c-input" name="name" id="name" aria-label="Nom del edifici" type="text" value="{{$establishment->name}}" {{$readonly}} />
                </div>
                <div class="col-4">
                    <label for="description">Descripció</label>
                    <input class="form-control c-input" name="description" id="description" aria-label="Descripció" type="text" value="{{$establishment->description}}" {{$readonly}} />
                </div>
                <div class="col-4">
                    <label for="address">Adreça</label>
                    <input class="form-control c-input" name="address" id="address" aria-label="Adreça" type="text" value="{{$establishment->address}}" {{$readonly}} />
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label for="image">Imàtge</label>
                    <input class="form-control c-input" name="image" id="image" type="text" aria-label="Imàtge" value="{{$establishment->image}}" {{$readonly}} />
                </div>
                <div class="col-4">
                    <label for="city">Població</label>
                    <input class="form-control c-input" name="city" id="city" type="text" aria-label="Població" value="{{$establishment->city}}" {{$readonly}}/>
                </div>
                <div class="col-2">
                    <label for="postal_code">Codi postal</label>
                    <input class="form-control c-input" name="postal_code" id="postal_code" type="text" aria-label="Codi postal" value="{{$establishment->postal_code}}" {{$readonly}} />
                </div>
                <div class="col-2">
                    <label for="establishment_type">Tipus d'establiment</label>
                    <select class="form-control c-input c-select" name="establishment_type" id="establishment_type">
                            <!-- TODO: Remove these hardcoded options -->
                            <option value="HOTEL" {{ $establishment->establishment_type === "HOTEL" ? 'selected' : '' }}>Hotel</option>
                            <option value="APARTAMENT" {{ $establishment->establishment_type === "APARTAMENT" ? 'selected' : '' }}>Apartament</option>
                    </select>
                </div>
            </div>

            @if($readonly == null)
            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
            @endif

            <a href="{{ route('admin.establishments') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Enrere</a>
        </div>
    </form>
</x-app>
