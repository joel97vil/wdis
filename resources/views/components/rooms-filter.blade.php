<div class="c-rooms-filter">
    <div class="c-rooms-filter__title">Filtres:</div>
    <div class="c-rooms-filter__title fw-bold">Establiment:</div>
    <div class="btn-group btn-group-toggle" data-toogle="buttons">
        @foreach(getEstablishments() as $establishment)
            <x-checkbox
                id="e_{{ $establishment->id }}"
                name="shuffle-filter"
                value="e_{{ $establishment->id }}"
                :label="$establishment->name"
            />
        @endforeach
    </div>
    <div class="c-rooms-filter__title fw-bold mt-2">Serveis:</div>
    <div class="btn-group btn-group-toggle" data-toogle="buttons">
        @foreach(getServices() as $service)
            <x-checkbox
                id="s_{{ $service->id }}"
                name="shuffle-filter"
                value="s_{{ $service->id }}"
                :label="$service->name"
            />
        @endforeach
    </div>
</div>
