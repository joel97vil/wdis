<x-app>
    <div class="col-9 m-auto text-justify">
        <h1>Formulari d'edició d'usuaris</h1>
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

    <div class="col-9 m-auto text-justify">
        <form action="{{ route('signup') }}" method="post">
            @csrf
            <div class="form-group jumbotron">
                <div class="row row-cols-3 row-cols-sm-2 row-cols-md-3 row-cols-bg-6 px-4">
                    <div class="col">
                        <label for="username">Nom d'usuari</label>
                        <input class="form-control c-input" name="username" id="username" aria-label="Nom d'usuari" type="text" value="" />
                    </div>
                    <div class="col">
                        <label for="password">Contrassenya</label>
                        <input class="form-control c-input" name="password" id="password" aria-label="Contrassenya" type="password" />
                    </div>
                    <div class="col">
                        <label for="confirm_password">Repeteix la contrassenya</label>
                        <input class="form-control c-input" name="confirm_password" id="confirm_password" aria-label="Repeteix la contrassenya" type="password" />
                    </div>
                </div>
                <div class="row row-cols-3 row-cols-sm-2 row-cols-md-3 row-cols-bg-6 px-4">
                    <div class="col">
                        <label for="name">Nom complet</label>
                        <input class="form-control c-input" name="name" id="name" type="text" aria-label="Nom complet" value="" />
                    </div>
                    <div class="col">
                        <label for="nif">NIF/NIE/CIF</label>
                        <input class="form-control c-input" name="nif" id="nif" type="text" aria-label="NIF/NIE/CIF" value="" />
                    </div>
                </div>
                <div class="row row-cols-3 row-cols-sm-2 row-cols-md-3 row-cols-bg-6 px-4">
                    <div class="col">
                        <label for="city">Població</label>
                        <input class="form-control c-input" name="city" id="city" type="text" aria-label="Població" value="" />
                    </div>
                    <div class="col">
                        <label for="postal_code">Codi postal</label>
                        <input class="form-control c-input" name="postal_code" id="postal_code" type="text" aria-label="Codi postal" value=""  />
                    </div>
                    <div class="col">
                        <label for="address">Adreça</label>
                        <input class="form-control c-input" name="address" id="address" type="text" aria-label="Adreça" value="" />
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-bg-1 px-4">
                    <div class="col">
                        <label class="form-check-label"><input type="checkbox" required="required"> Accepto els <a href="{{ route('termes') }}" target="_blank">termes i condicions</a> d'aquest lloc web</label>
                    </div>
                    <input name="role" id="role" type="hidden" value="600">
                </div>

                <br />
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-bg-2 px-4">
                    <div class="col">
                        <button class="btn btn-primary" type="submit">Confirmar</button>
                        <a href="/" class="btn btn-secondary" >Enrere</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app>