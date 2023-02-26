@extends('adminlte::page');
<script src="{{ asset("JS/sweetalert2.all.min.js") }}"></script>

<style>
    .content-wrapper {
        background-color: #ffffff !important;
    }
</style>

@section('content')
@yield('content')
@stop