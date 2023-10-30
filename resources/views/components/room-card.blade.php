<div class="col mb-4" data-name="{{ $room->name }}" data-city="{{ $room->establishment->city }}" data-occupancy="{{ $room->occupancy }}" data-address="{{ strtolower(trim($room->address)) }}"
    data-establishment="{{ $room->establishment->id }}" data-establishment-name="{{ $room->establishment->name }}" data-price="{{ $room->price }}" data-capacity=" {{ $room->occupancy }}" data-establishment-type="{{ strtolower($room->establishment_type) }}"
    data-groups='@json($room->groups)' >
    <div class="card">
        <a href="{{ route('room.show', ['id' => $room->id]) }}">
            @if(strlen($room->photo) > 0)
                <img class="card-img-top" src="{{ asset('assets/img/uploaded/' . $room->photo) }}" alt="{{ $room->photo }}">
            @else
                <img class="card-img-top" src="{{ asset('assets/img/about/default_room.jpg') }}" alt="">
            @endif
        </a>
        <div class="card-body">
            <div class="clearfix mb-3"> <span class="float-start badge rounded-pill bg-dark px-2">{{ $room->price }}&euro;</span> <span class="float-end small text-muted">{{ $room->establishment->city }}</span> </div>            
            <h5 class="card-title">{{ $room->name }} <span class="float-end badge rounded-pill bg-dark py-1 px-3">{{ $room->occupancy }} <i class="fa fa-user "></i></span></h5>
            <div class="cart-text">{{ $room->description }}</div>
            <div class="d-grid gap-2 my-4"> <a href="{{ route('room.show', ['id' => $room->id]) }}" class="btn btn-success">Book</a> </div>
        </div>
    </div>
</div>