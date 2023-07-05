<x-app>
    <h1>Inicia sessió</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form class="c-form" action="{{ route('signin') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-8">
                    <label for="username">Nom d'usuari</label>
                    <input class="form-control c-input" name="username" id="username" aria-label="Nom d'usuari" type="text" value="" />
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label for="password">Contrassenya</label>
                    <input class="form-control c-input" name="password" id="password" aria-label="Contrassenya" type="password" />
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <button class="btn btn-primary btn-block" type="submit">Entra</button>
                    <a href="/" class="btn btn-secondary btn-block">Enrere</a>
                </div>
            </div>
        </div>

        <br />
        <div class="row">
            <div class="col-12">
                No tens compte? <a href="{{ route('register') }}">Registra't</a>
            </div>
        </div>
    </form>
</x-app>