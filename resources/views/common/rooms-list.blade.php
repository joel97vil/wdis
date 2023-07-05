<x-app>
    <main>
        <div class="container-fluid bg-trasparent my-4 p-3" style="position: relative;">
            <x-rooms-filter />
            <div id="rooms-list" class="row row-cols-1 row-cols-sm-1 row-cols-md-4 row-cols-bg-6 g-4">
                @foreach($rooms as $room)
                    <div
                        class="col mb-4"
                        data-establishment="{{ $room->establishment->id }}"
                        data-price="{{ $room->price }}"
                        data-groups='@json($room->groups)'
                    >
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
                                <div class="d-grid gap-2 my-4"> <a href="{{ route('room.show', ['id' => $room->id]) }}" class="btn btn-success">Reserva</a> </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </main>
</x-app>
