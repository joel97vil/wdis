<x-app>
    <main>
        <div class="container-fluid bg-trasparent my-12 p-3" style="position: relative;">
            <div class="d-flex justify-content-center">
                <h2>Find what you're looking for!</h2>
            </div>
            <form class="form-inline justify-content-around" action="{{ route('rooms-list') }}">
                <div class="form-group input-group-lg">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Barcelona, Mountain, Hostel, Cheap, Portugal"/>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-lg btn-warning">Find</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
            <div class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-bg-6 g-4">
                @foreach($rooms as $room)
                    <x-room-card :room="$room" />
                @endforeach
            </div>
        </div>
    </main>
</x-app>