<x-app>
    <div class="col-9 m-auto text-justify">
        <h1>Sign in</h1>
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
        <form action="{{ route('signin') }}" method="post">
            @csrf
            <div class="form-group jumbotron">
                <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-bg-1 px-4">
                    <div class="col">
                        <label for="username">Username</label>
                        <input class="form-control c-input" name="username" id="username" aria-label="Nom d'usuari" type="text" value="" />
                    </div>
                    <div class="col">
                        <label for="password">Password</label>
                        <input class="form-control c-input" name="password" id="password" aria-label="Contrassenya" type="password" />
                    </div>
                    <div class="col">
                        <button class="btn btn-primary btn-block" type="submit">Log in</button>
                        <a href="/" class="btn btn-secondary btn-block">Back</a>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2 px-4 my-8">
                    <div class="col">
                        You don't have account? <a href="{{ route('register') }}">Register</a>
                    </div>
                    <div class="col">I forgot my password</div>
                </div>
            </div>
        </form>
    </div>
</x-app>