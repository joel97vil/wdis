<x-app>
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
    <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2 px-4">
        <div class="col">
            <div class="text-center">
                <h3>Contact us</h3>
            </div>
        </div>
        <div class="col">
            <div class="">
                <h3>Or send us a message</h3>
            </div>
            <form action="{{ route('contact.submit') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2">
                        <div class="col">
                            <label for="name">Name</label>
                            <input class="form-control" name="name" id="name" type="text" aria-label="Your name" value="" />
                        </div>
                        <div class="col">
                            <label for="email">Email</label>
                            <input class="form-control" name="email" id="email" type="text" aria-label="Email" value="" />
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-sm-1 row-cols-md-1 row-cols-bg-1">
                        <div class="col">
                            <label for="subject">Subject</label>
                            <input class="form-control" name="subject" id="subject" type="text" aria-label="Subject" value="" />
                        </div>
                        <div class="col">
                            <label for="comments">Message</label>
                            <textarea class="form-control" name="comments" id="comments" aria-label="Comentaris" cols="55" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label class="form-check-label"><input type="checkbox" id="legal_checkbox" name="legal_checkbox" required> I accept the <a href="{{ route('termes') }}">terms and conditions</a> of this web</label>
                        </div>
                    </div>

                    <button class="btn btn-primary" type="submit">Send</button>
                    <a href="/" class="btn btn-secondary" >Go back</a>
                </div>
            </form>
        </div>
    </div>
    <div class="row row-cols-2 row-cols-sm-1 row-cols-md-2 row-cols-bg-2">
        <div class="col">
            Here goes maps ubication
        </div>
    </div>
</x-app>
