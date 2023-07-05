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
                <div class="col mb-4">
                    <div class="card">
                        <a href="{{ route('room.show', ['id' => $room->id]) }}">
                        @if(strlen($room->photo) > 0)
                            <img class="card-img-top" src="{{ asset('assets/img/uploaded/' . $room->photo) }}" alt="{{ $room->photo }}">
                        @else
                            <img class="card-img-top" src="{{ asset('assets/img/about/default_room.jpg') }}" alt="">
                        @endif
                        </a>
                        <div class="card-body">
                            <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-dark">{{ $room->price }}&euro;</span> <span class="float-end small text-muted">{{ $room->establishment->city }}</span> </div>
                            <h5 class="card-title">{{ $room->name }}</h5>
                            <div class="cart-text">{{ $room->description }}</div>
                            <div class="d-grid gap-2 my-4"> <a href="{{ route('room.show', ['id' => $room->id]) }}" class="btn btn-success">Book now</a> </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app>