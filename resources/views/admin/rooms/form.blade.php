<x-app>
    @vite(['resources/js/room.js'])
    <div class="col-9 m-auto text-justify">
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
    </div>

    <div class="col-9 m-auto text-justify">
        <form action="{{ $room->id !== null ? route('room.update') : route('room.store') }}" enctype="multipart/form-data" method="post">
            @csrf
            <input name="id" type="hidden" value="{{ $room->id }}">

            <div class="form-group jumbotron">
                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label for="name">Nom Habitació</label>
                        <input class="form-control c-input" id="name" aria-label="Nom Habitació" name="name" type="text" value="{{ $room->name }}" />
                    </div>
                    <div class="col">
                        <label for="establishment">Establiment</label>
                        <select class="form-control c-input c-select" name="establishment" aria-label="Establiment" id="establishment">
                            @foreach(getEstablishments() as $establishment)
                                <option value="{{ $establishment->id }}" {{ $establishment->id === $room->establishment_id ? 'selected' : '' }}>{{ $establishment->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label for="address">Adreça</label>
                        <input class="form-control c-input" name="address" type="text" aria-label="Adreça" id="address" value="{{ $room->address }}"/>
                    </div>
                    <div class="col">
                        <label for="photo">Imatge de l'habitació</label>
                        <input type="file" class="form-control-file c-input" id="photo" name="photo" aria-label="Imatge de l'habitació">
                    </div>
                    <div class="col">
                        @if(strlen($room->photo) > 0)
                            <img class="fluid img-thumbnail" src="{{ asset('assets/img/uploaded/' . $room->photo) }}" alt="{{ $room->photo }}" style="max-width: 170px; max-height: 170px;">
                        @endif
                    </div>
                </div>
                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label for="occupancy">Capacitat</label>
                        <input class="form-control c-input" name="occupancy" id="occupancy" aria-label="Capacitat" type="number" value="{{ $room->occupancy }}" />
                    </div>
                    <div class="col">
                        <label for="price">Preu</label>
                        <input class="form-control c-input" name="price" type="text" id="price" aria-label="Preu" value="{{ $room->price }}" />
                    </div>
                    <div class="col">
                        <?php
                        $services_id = [];
                        foreach($room->roomServices as $srv)
                        {
                            array_push($services_id, $srv->service_id);
                        }
                        ?>
                        <label for="services">Serveis</label>
                        <select class="select2 form-control c-input select2" name="services[]" id="services" multiple="multiple">
                            @foreach(getServices() as $service)
                                <option value="{{ $service->id }}" {{ in_array($service->id, $services_id) ? "selected" : "" }} >{{ $service->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label for="description">Descripció</label>
                        <textarea class="form-control c-input" name="description" id="description" aria-label="Descripció" cols="55" rows="5">{{ $room->description }}</textarea>
                    </div>
                </div>

                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label for="comments">Comentaris</label>
                        <textarea class="form-control c-input" name="comments" id="comments" aria-label="Comentaris" cols="55" rows="5">{{ $room->comments }}</textarea>
                    </div>
                </div>

                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label class="form-check-label"><input type="checkbox" required="required"> Accepto els <a href="{{ route('termes') }}" target="_blank">termes i condicions</a> d'aquest lloc web</label>
                    </div>
                </div>

                <br />

                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <button aria-label="Guardar" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                        @if(auth()->user()->role == 800)
                            <a href="{{ route('admin.rooms') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Enrere</a>
                        @else
                            <a href="{{ route('landing') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Enrere</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app>
