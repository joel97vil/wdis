<x-app>
    <div class="container-fluid bg-trasparent my-6 p-3" style="position: relative;">
        <button class="btn btn-warning" type="button" data-toggle="collapse" data-target="#collapse-filters" aria-expanded="false" aria-controls="collapse-filters">
            Filters
        </button>
        <div class="collapse" id="collapse-filters">
            <x-rooms-filter />
        </div>
        <div id="rooms-list" class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-bg-6 g-4">
            @foreach($rooms as $room)
                <x-room-card :room="$room" />
            @endforeach
        </div>
    </div>
</x-app>
