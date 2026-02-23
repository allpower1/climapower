@if (session('status'))
    <div class="contact-form-success alert alert-success d-none mt-4">
        <strong>Success!</strong> {{ session('status') }}.
    </div>
@endif

@if (Session::has('message'))
    <div class="contact-form-success alert alert-info mt-4">
        {{ Session::get('message') }}
    </div>
@endif

@if (Session::has('msj'))
    <div class="contact-form-success alert alert-info mt-4">
        {{ Session::get('msj') }}
    </div>
@endif

@if (Session::has('msjError'))
    <div class="contact-form-success alert alert-info mt-4">
        {{ Session::get('msjError') }}
    </div>
@endif

@if (session('successenvio'))
    <div class="contact-form-success alert alert-success mt-4">
        <strong>Exito!</strong> {{ session('successenvio') }}.
    </div>
@endif

@if (session('msjerror'))
    <div class="contact-form-error alert alert-danger mt-4">
        <strong>Error!</strong> {{ session('msjerror') }}.
        <span class="mail-error-message text-1 d-block"></span>
    </div>
@endif

@if (Session::has('msjAlert'))
    <div class="contact-form-success alert alert-info mt-4">
        {{ Session::get('msjAlert') }}
    </div>
@endif

@if ($errors->count() > 0)
    <div class="contact-form-error alert alert-danger mt-4">
        <strong>Error!</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <span class="mail-error-message text-1 d-block"></span>
    </div>
@endif