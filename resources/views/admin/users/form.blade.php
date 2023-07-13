<x-app>
    <?php
    if (isset($readonly))
    {
        $readonly = "readonly";
    } else {
        $readonly = null;
    }
    ?>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-9 m-auto text-justify">
        <h1>Formulari d'edició d'usuaris</h1>
        <br />
        @if((auth()->user()->role == 800 || auth()->user()->role == 700) && $user->id != null)
            <a href="#user-rooms" class="btn btn-primary" id="btn-rooms">Les meves habitacions</a>
        @endif
        @if($user->id != null)
        <a href="#user-bookings" class="btn btn-secondary" id="btn-bookings">Reserves realitzades</a>
        @endif
        @if((auth()->user()->role == 800 || auth()->user()->role == 700) && $user->id != null)
            <a href="#user-booking-requests" class="btn btn-primary" id="btn-requests">Reserves rebudes</a>
        @endif
        <hr />
    </div>

    <div class="col-9 m-auto text-justify">
        <form action="{{ $user->id !== null ? route('users.update') : route('users.store') }}" method="post">

            @csrf
            <input name="id" id="id" type="hidden" value="{{ $user->id }}">

            <div class="form-group jumbotron">
                <div class="row row-cols-3 row-cols-sm-1 row-cols-md-3 row-cols-bg-4 px-4">
                    <div class="col">
                        <label for="username">Nom d'usuari</label>
                        <input class="form-control c-input" name="username" id="username" aria-label="Nom d'usuari" type="text" value="{{$user->username}}" {{$readonly}} />
                    </div>
                    <div class="col">
                        <label for="password">Contrassenya</label>
                        <input class="form-control c-input" name="password" id="password" aria-label="Contrassenya" type="password" {{$readonly}} />
                    </div>
                    <div class="col">
                        <label for="role">Rol</label>
                        <select class="form-control c-input c-select" name="role" id="role" {{$readonly}}>
                            <option value="800" <?= $user->role == 800 ? 'selected' : '' ?>>Administrador</option>
                            <option value="700" <?= $user->role == 700 ? 'selected' : '' ?>>Llogater</option>
                            <option value="600" <?= $user->role == 600 || $user->role == null ? 'selected' : '' ?>>Client</option>
                        </select>
                    </div>
                    <!--<div class="col-4" style="visibility:collapse;">
                        <label for="confirm_password">Repeteix la contrassenya</label>
                        <input class="form-control" name="confirm_password" id="confirm_password" aria-label="Repeteix la contrassenya" type="password" {{$readonly}} />
                    </div>-->
                </div>
                <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2 px-4">
                    <div class="col">
                        <label for="name">Nom complet</label>
                        <input class="form-control c-input" name="name" id="name" type="text" aria-label="Nom complet" value="{{$user->name}}" {{$readonly}} />
                    </div>
                    <div class="col">
                        <label for="nif">NIF/NIE/CIF</label>
                        <input class="form-control c-input" name="nif" id="nif" type="text" aria-label="NIF/NIE/CIF" value="{{$user->nif}}" {{$readonly}} />
                    </div>
                    <div class="col-4">
                        <!-- TODO: Incloure foto i adjuntable de foto -->
                    </div>
                </div>
                <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2 px-4">
                    <div class="col">
                        <label for="city">Població</label>
                        <input class="form-control c-input" name="city" id="city" type="text" aria-label="Població" value="{{$user->city}}" {{$readonly}}/>
                    </div>
                    <div class="col">
                        <label for="postal_code">Codi postal</label>
                        <input class="form-control c-input" name="postal_code" id="postal_code" type="text" aria-label="Codi postal" value="{{$user->postal_code}}" {{$readonly}} />
                    </div>
                    <div class="col">
                        <label for="address">Adreça</label>
                        <input class="form-control c-input" name="address" id="address" type="text" aria-label="Adreça" value="{{$user->address}}" {{$readonly}} />
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2 px-4">
                    <div class="col">
                        @if($readonly == null)
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                        @endif
                        
                        @if(auth()->user()->role == 800)
                            <a href="{{ route('admin.users') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Enrere</a>
                        @else
                            <a href="{{ route('landing') }}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Enrere</a>
                        @endif
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if((auth()->user()->role == 800 || auth()->user()->role == 700) && $user != null)
    <div class="col-9 m-auto text-justify" id="user-rooms" style="display:none;">
    <a href="{{ route('room.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Nova habitació</a>
    <h2>Les meves habitacions</h2>
        <table class="table table-light">
            <thead>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Descripció</th>
                <th>Hotel</th>
                <th>Ciutat</th>
                <th>Adreça</th>
                <th>Capacitat</th>
                <th>Preu</th>
                <th> </th>
                <th> </th>
                <th> </th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->rooms as $room)
                <tr>
                    <td></td>
                    <td>{{$room->name}}</td>
                    <td>{{$room->description}}</td>
                    <td>{{$room->establishment->name}}</td>
                    <td>{{$room->establishment->city}}</td>
                    <td>{{$room->establishment->address}}</td>
                    <td>{{$room->occupancy}}</td>
                    <td>{{$room->price}}</td>
                    <td>
                        <a href="{{ route('room.show', ['id' => $room->id]) }}">Detalls</a>
                    </td>
                    <td>
                        <a href="{{ route('room.edit', ['id' => $room->id]) }}">Editar</a>
                    </td>
                    <td>
                        <a class="btn_delete" href="{{ route('room.delete', ['id' => $room->id]) }}">Borrar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if($user->id != null)
    <div class="col-9 m-auto text-justify" id="user-bookings" style="display:none;">
        <h2>Reserves realitzades</h2>
        <table class="table table-light">
            <thead>
            <tr>
                <th></th>
                <th>Habitació</th>
                <th>Data</th>
                <th>Persones</th>
                <th>Preu</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($user->bookings()->whereNull('deleted_at')->orderBy('initial_date', 'desc')->get() as $booking)
                <tr>
                    <td></td>
                    <td>{{$booking->room->name}} - {{$booking->room->establishment->name}}</td>
                    <td>De {{ $booking->initial_date }} a {{ $booking->final_date }}</td>
                    <td>{{$booking->people_amount}}</td>
                    <td>{{$booking->total_price}} €</td>
                    <td><a href="{{ route('booking.show', ['id' => $booking->id]) }}">Detalls</a></td>
                    <td>
                        @if($booking->initial_date >= date('Y-m-d'))
                        <a href="{{ route('booking.destroy', ['id' => $booking->id]) }}" class="cancel-booking">Anular</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif

    @if((auth()->user()->role == 800 || auth()->user()->role == 700) && $user->id != null)
    <div class="col-9 m-auto text-justify" id="user-booking-requests" style="display:none;">
        <!-- Reservas -->
        <h2>Reserves rebudes</h2>
        <table class="table table-light">
            <thead>
            <tr>
            <th></th>
                <th>Habitació</th>
                <th>Data</th>
                <th>Persones</th>
                <th>Preu</th>
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach(getBookingsByRoom($user->id) as $booking)
            <tr>
                    <td></td>
                    <td>{{$booking->room->name}} - {{$booking->room->establishment->name}}</td>
                    <td>De {{ $booking->initial_date }} a {{ $booking->final_date }}</td>
                    <td>{{$booking->people_amount}}</td>
                    <td>{{$booking->total_price}} €</td>
                    <td><a href="{{ route('booking.show', ['id' => $booking->id]) }}">Detalls</a></td>
                    <td>
                        @if($booking->initial_date >= date('Y-m-d'))
                        <a href="{{ route('booking.destroy', ['id' => $booking->id]) }}" class="cancel-booking">Anular</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif


</x-app>
