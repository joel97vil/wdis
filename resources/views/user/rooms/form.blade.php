<x-app>
    <h1 >Formulari alta d'una habitació</h1>
    <form class="c-form" action="{{ route('room.store') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="name" class="font-weight-bold">Room name</label>
                    <input class="form-control c-input" id="name" aria-label="Room name" name="name" type="text" value="" />
                </div>
                <div class="col-6">
                    <label for="establishment">Establishment</label>
                    <select class="form-control c-input c-select" name="establishment" aria-label="Establishment" id="establishment">
                        @foreach(getEstablishments() as $establishment)
                            <option value="{{ $establishment->id }}">{{ $establishment->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="address">Direction</label>
                    <input class="form-control c-input" name="address" type="text" aria-label="Direction" id="address" value=""/>
                </div>
                <div class="col-3">
                    <label for="photo">Room imatge</label>
                    <input type="file" class="form-control-file c-input" id="photo" name="photo" aria-label="Room image">
                </div>
                <div class="col-3">
                    @if(strlen($room->photo) > 0)
                        <img class="fluid img-thumbnail" src="{{ asset('assets/img/uploaded/' . $room->photo) }}" alt="{{ $room->photo }}" style="max-width: 170px; max-height: 170px;">
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label for="occupancy">Occupancy</label>
                    <input class="form-control c-input" name="occupancy" id="occupancy" aria-label="Occupancy" type="number" value="" />
                </div>
                <div class="col-3">
                    <label for="price">Price</label>
                    <input class="form-control c-input" name="price" type="text" id="price" aria-label="Price" value="" />
                </div>
                <div class="col-6">
                    <?php
                    $services_id = [];
                    foreach($room->services as $srv)
                    {
                        array_push($services_id, $srv->service_id);
                    }
                    ?>
                    <label for="services">Serveis</label>
                    <select class="select2 form-control c-input" name="services[]" id="services" multiple="multiple">
                        @foreach(getServices() as $service)
                            <option value="{{ $service->id }}" {{ in_array($service->id, $services_id) ? "selected" : "" }} >{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="description">Description</label>
                    <textarea class="form-control c-input" name="description" id="description" aria-label="Description" cols="55" rows="5"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label for="comments">Comments</label>
                    <textarea class="form-control c-input" name="comments" id="comments" aria-label="Comments" cols="55" rows="5"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <label class="form-check-label"><input type="checkbox" required="required"> I accept all the <a href="{{ route('termes') }}" target="_blank">terms and conditions</a> of this website</label>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-12">
                    <button aria-label="Guardar" class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                    @if(auth()->user()->role == 800)
                        <a href="{{ route('admin.rooms') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                    @else
                        <a href="{{ route('landing') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Back</a>
                    @endif
                </div>
            </div>
            
        </div>
    </form>
</x-app>
