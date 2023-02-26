@extends('adminlte::page');
<script src="{{ asset("JS/sweetalert2.all.min.js") }}"></script>
<script src="{{ asset("JS/app.js") }}"></script>

<style>
    .content-wrapper {
        background-color: #ffffff !important;
    }
</style>

@section('content')
@yield('content')
@stop