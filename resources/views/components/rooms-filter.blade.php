<div class="c-rooms-filter">
    <div><h3>Find what you're looking for, searching by</h3></div>

    <div class="c-rooms-filter__title fw-bold">Words:</div>
    <div>
        <input class="form-control shuffle-filter" id="general-filter" type="text" placeholder="Barcelona, Mountain, Hostel, Cheap, Portugal" />
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
        <select class="form-control shuffle-filter" id="establishment-filter">
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
</div>
