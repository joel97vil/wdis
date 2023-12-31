<div class="c-rooms-filter mb-4 mt-4 p-4 jumbotron" style="background-color: #f1f1f1;">
    <div><h3>Find what you're looking for, searching by</h3></div>

    <div class="c-rooms-filter__title fw-bold">Words:</div>
    <div>
        <input class="form-control shuffle-filter" id="general-filter" type="text" placeholder="Barcelona, Mountain, Hostel, Cheap, Portugal" value="{{ $searchTxt }}" />
    </div>

    <div class="c-rooms-filter__title fw-bold mt-2">Establishment type:</div>
    <div class="btn-group btn-group-toggle" data-toogle="buttons">
        <x-checkbox id="tp_1" name="shuffle-filter" value="tp_HOTEL" label="Hotel" />
        <x-checkbox id="tp_2" name="shuffle-filter" value="tp_APARTMENT" label="Apartment" />
    </div>

    <div class="c-rooms-filter__title fw-bold">Establishment:</div>
    <!--<div class="btn-group btn-group-toggle" data-toogle="buttons">
        @foreach(getEstablishments() as $establishment)
            <x-checkbox
                id="e_{{ $establishment->id }}"
                name="shuffle-filter"
                value="e_{{ $establishment->id }}"
                :label="$establishment->name"
            />
        @endforeach
    </div>-->
    <div>
        <select class="shuffle-filter select2 select2-search__field" id="establishment-filter">
            <option id="e_0" value="" selected> - </option>
            @foreach(getEstablishments() as $establishment)
                <option id="e_{{ $establishment->id }}" value="e_{{ $establishment->id }}">
                    {{ $establishment->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="c-rooms-filter__title fw-bold mt-2">Services:</div>
    <div class="btn-group btn-group-toggle" data-toogle="buttons">
        @foreach(getServices() as $service)
            <x-checkbox id="s_{{ $service->id }}" name="shuffle-filter" value="s_{{ $service->id }}" :label="$service->name" />
        @endforeach
    </div>

    <div class="c-rooms-filter__title fw-bold mt-2">Occupancy:</div>

    <div class="c-rooms-filter__title fw-bold mt-2">Price:</div>

    <div class="c-rooms-filter__title fw-bold mt-2">Available dates:
            <label for="initial_date" id="initial_date_label" style="display:none;">Initial date:</label>
            <input type="text" name="initial_date" id="initial_date" class="form-control" style="display:none;"/>  
            <label for="final_date" id="final_date_label" style="display:none;">Final date:</label>
            <input type="text" name="final_date" id="final_date" class="form-control" style="display:none;"/>  
    </div>
</div>
