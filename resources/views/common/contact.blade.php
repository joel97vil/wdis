<x-app>
    <h1>Contacta amb el teu establiment</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <form class="c-form" action="{{ route('contact.submit') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="row">
                <div class="col-6">
                    <label for="name">Nom</label>
                    <input class="form-control c-input" name="name" id="name" type="text" aria-label="Nom" value="" />
                </div>
                <div class="col-6">
                    <label for="email">Email</label>
                    <input class="form-control c-input" name="email" id="email" type="text" aria-label="Email" value="" />
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label for="establishment">Establiment</label>
                    <select class="form-control c-input c-select" name="establishment" aria-label="Establiment" id="establishment" required>
                        @foreach(getEstablishments() as $establishment)
                            <option value="{{ $establishment->name }}">{{ $establishment->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <label for="comments">Comentaris</label>
                    <textarea class="form-control c-input" name="comments" id="comments" aria-label="Comentaris" cols="55" rows="5"></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <label class="form-check-label"><input type="checkbox" id="legal_checkbox" name="legal_checkbox" required> Accepto els <a href="{{ route('termes') }}">termes i condicions</a> d'aquest lloc web</label>s
                </div>
            </div>

            <button class="btn btn-primary" type="submit">Confirmar</button>
            <a href="/" class="btn btn-secondary" >Enrere</a>
        </div>
    </form>
</x-app>
