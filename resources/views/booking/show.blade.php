<x-app>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    <span>Reserva a nom de: <b>{{$booking->user->name}}</b></span> <br />
                </h2>
            </div>
            <br />
            <div class="col-6">
                @if(strlen($booking->room->photo) > 0)
                <img class="fluid img-thumbnail" src="{{ asset('assets/img/uploaded/' . $booking->room->photo) }}" alt="{{ $booking->room->photo }}">
                @else
                <img class="fluid img-thumbnail" src="{{ asset('assets/img/about/default_room.jpg') }}" alt="">
                @endif
                <p><span class="badge rounded-pill bg-dark">Llogater: {{ $booking->room->user->name }} </span> (<a href="mailto:{{ $booking->room->user->username }}">{{ $booking->room->user->username }}</a>)</p>
            </div>
            <div class="col-6">
                <h2>
                    <b>{{$booking->room->name}}</b> <span>{{ $booking->room->establishment->name }}</span>
                    @if(auth()->user() != null && (auth()->user()->role == 800 || auth()->user()->id == $booking->user_id) && $booking->initial_date >= date('Y-m-d'))
                        <a href="{{ route('booking.destroy', ['id' => $booking->id]) }}" class="btn btn-danger cancel-booking"><i class="fa fa-edit"></i> Anul·lar</a>
                    @endif
                </h2>
                <hr />
                <div>
                    <h6><b>Preu total:</b> <span>{{ $booking->total_price }} €</span></h6>
                    <h6><b>Dates:</b> <span>Des de {{ $booking->initial_date }} fins a {{ $booking->final_date }}</span></h6>
                    <br />
                    <h6><b>Localitat:</b> <span>{{$booking->room->establishment->postal_code }} -</span> <span>{{$booking->room->establishment->city }}</span></h6>
                    <h6><b>Adreça:</b> <span>{{$booking->room->establishment->address }},</span> <span>{{$booking->room->address}}</span></h6>
                    <h6><b>Núm. d'ocupants:</b> <span>{{ $booking->people_amount }} persones</span></h6>
                    <h6><b>Descripció:</b> <span>{{$booking->room->description}}</span></h6>
                    @if($booking->room->services != null && count($booking->room->services) > 0)
                    <h6 style="display:inline;"><b>Serveis:</b></h6>
                    <p style="display:inline;">
                        @foreach($booking->room->services as $rhs)
                            <span class="badge rounded-pill bg-info">{{$rhs->service->name}}</span> 
                        @endforeach
                    </p>
                    <h6><b></b></h6>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app> 