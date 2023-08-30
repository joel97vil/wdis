<x-app>
    <div class="container-fluid bg-trasparent my-6 p-3" style="position: relative;">
        <button class="btn btn-warning btn-lg" type="button" data-toggle="collapse" data-target="#collapse-filters" aria-expanded="false" aria-controls="collapse-filters">
            Filters
        </button>
        <div class="collapse" id="collapse-filters">
            <x-rooms-filter :searchTxt="$searchTxt" />
        </div>
        <div id="rooms-list" class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-lg-6 g-4">
            @foreach($rooms as $room)
                <x-room-card :room="$room" />
            @endforeach
        </div>
        <div class="row row-cols-1">
            <div class="col d-flex justify-content-center">
                <p>You still didn't find what you're looking for?</p>
            </div>
            <div class="col d-flex justify-content-center">
                <button class="btn btn-warning" type="button" id="load-more">Load more</button>
            </div>
        </div>
    </div>
</x-app>
