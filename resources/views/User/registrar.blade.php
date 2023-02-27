@extends('layouts.madre');

@section('title', 'Datos de usuario')

@section('content')

<form action="" method="post">
        @csrf
        <center><h1>Crear Usuario</h1></center>

        {{-- Nombre --}}
        <div class="input-group mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="Nombre completo" autofocus maxLength="100">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user"></span>
                </div>
            </div>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Username --}}
        <div class="input-group mb-3">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                   value="{{ old('username') }}" placeholder="Usuario" autofocus maxLength="25">

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

        {{-- correo electronico --}}
        <div class="input-group mb-3">
            <input type="email" name="correo" class="form-control @error('correo') is-invalid @enderror"
                   value="{{ old('correo') }}" placeholder="correo electronico" autofocus maxLength="100">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>

            @error('correo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- fecha nacimiento --}}
        <div class="input-group mb-3">
            <input type="text" name="nacimiento" class="form-control @error('nacimiento') is-invalid @enderror" id="nacimiento"
                   value="{{ old('nacimiento') }}" placeholder="Fecha de Nacimiento" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                </div>
            </div>

            @error('nacimiento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- identidad --}}
        <div class="input-group mb-3">
            <input type="number" name="identidad" class="form-control @error('identidad') is-invalid @enderror" 
            value="{{ old('identidad') }}" placeholder="Identidad" autofocus maxLength="13"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card"></span>
                </div>
            </div>

            @error('identidad')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- telefono --}}
        <div class="input-group mb-3">
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" 
            value="{{ old('telefono') }}" placeholder="telefono" autofocus maxLength="8"
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>

            @error('telefono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Rols --}}
        <div class="input-group mb-3">
            <select name="rol" id="rol" class="form-control @error('rol') is-invalid @enderror">
                @if(old('rol'))
                    <option value="{{old('rol')}}" style="display:none">{{old('rol')}}</option>
                @else
                    <option value="" style="display:none">Seleccione el cargo</option>
                @endif
                @foreach($roles as $r)
                    <option value="{{$r->name}}">{{$r->name}}</option>
                @endforeach
            </select>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-users"></span>
                </div>
            </div>

            @error('rol')
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

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            Guardar datos
        </button>

    </form>

    <script>
        window.addEventListener('load',function(){
            document.getElementById('nacimiento').type= 'text';
            document.getElementById('nacimiento').addEventListener('blur',function(){
                document.getElementById('nacimiento').type= 'text';
            });
            document.getElementById('nacimiento').addEventListener('focus',function(){
                document.getElementById('nacimiento').type= 'date';
            });
        });
    </script>

@stop