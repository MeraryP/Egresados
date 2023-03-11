@if(session('mensaje'))
<div class="alert alert-danger">
    {{session('mensaje')}}
</div>
@endif
<form action="{{route('login')}}" method="post">
@csrf

{{-- Email field --}}
<div class="input-group mb-3">
    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
           value="{{ old('username') }}" placeholder="Usuario" autofocus>

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-user"></span>
        </div>
    </div>

    @error('username')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Password field --}}
<div class="input-group mb-3">
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
           placeholder="Contraseña">

    <div class="input-group-append">
        <div class="input-group-text">
            <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
        </div>
    </div>

    @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>

{{-- Login field --}}
<div class="row">

    <div class="col-12">
        <button type=submit class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-sign-in-alt"></span>
            Inicio de Sesion
        </button>
    </div>
</div>

</form>