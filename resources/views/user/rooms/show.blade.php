<x-app>
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-6">
                @if(strlen($room->photo) > 0)
                <img class="fluid img-thumbnail" src="{{ asset('assets/img/uploaded/' . $room->photo) }}" alt="{{ $room->photo }}">
                @else
                <img class="fluid img-thumbnail" src="{{ asset('assets/img/about/default_room.jpg') }}" alt="">
                @endif
                <p><span class="badge rounded-pill bg-dark">Llogater: {{ $room->user->name }} </span> (<a href="mailto:{{ $room->user->username }}">{{ $room->user->username }}</a>)</p>
            </div>
            <div class="col-6">
                <h2>
                    <b>{{$room->name}}</b> <span>{{ $room->establishment->name }}</span>
                    @if(auth()->user() != null && (auth()->user()->role == 800 || auth()->user()->id == $room->user_id))
                        <a href="{{ route('room.edit', ['id' => $room->id]) }}" class="btn btn-primary"><i class="fa fa-edit"></i> Edita</a>
                    @endif
                </h2>
                <h4><b>{{$room->price}}€</b> <span>/ dia</span></h4>
                <hr />
                <div>
                    <h6><b>Localitat:</b> <span>{{$room->establishment->postal_code }} -</span> <span>{{$room->establishment->city }}</span></h6>
                    <h6><b>Adreça:</b> <span>{{$room->establishment->address }},</span> <span>{{$room->address}}</span></h6>
                    <h6><b>Capacitat:</b> <span>{{$room->occupancy}} persones</span></h6>
                    <h6><b>Descripció:</b> <span>{{$room->description}}</span></h6>
                    @if($room->services != null && count($room->services) > 0)
                    <h6 style="display:inline;"><b>Serveis:</b></h6>
                    <p style="display:inline;">
                        @foreach($room->services as $rhs)
                            <span class="badge rounded-pill bg-info">{{$rhs->service->name}}</span> 
                        @endforeach
                    </p>
                    @endif
                    <h6><b>Comentaris:</b> <span>{{$room->comments}}</span></h6>
                    <br />
                    @if(auth()->user() != null)
                        <button id="book" class="btn btn-primary btn-block">Reserva</button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary btn-block">Reserva</a>
                    @endif
                </div>
            </div>
            <div id="div-form" class="col-12" style="display:none;">
                <hr />
                <form action="{{ route('booking.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12"><p><b>Detalls de la teva reserva</b></p></div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <label for="people_amount">Número d'ocupants.</label>
                            <input id="people_amount" name="people_amount" type="number" class="form-control" placeholder="(màx. {{ $room->occupancy }})" min="1" max="{{ $room->occupancy }}"/>
                        </div>
                        <div class="col-5">
                            <label for="initial_date">Data inicial</label>
                            <input type="text" name="initial_date" id="initial_date" class="form-control" />
                        </div>
                        <div class="col-5">
                            <label for="final_date" id="final_date_label" style="display:none;">Data final</label>
                            <input type="text" name="final_date" id="final_date" class="form-control" style="display:none;"/>  
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-12">
                            <label class="form-check-label"><input type="checkbox" required="required"> Accepto els <a href="{{ route('termes') }}" target="_blank">termes i condicions</a> d'aquest lloc web</label>
                        </div>
                    </div>
                    <br />
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" id="btn_book" class="btn btn-success btn-block" disabled>Fes la reserva</button>
                        </div>
                    </div>
                    <input id="room_id" name="room_id" type="hidden" value="{{ $room->id }}" />
                    <input id="total_price" name="total_price" type="hidden" value="{{ $room->price }}" />
                </form>
            </div>
        </div>
    </div>
</x-app> 