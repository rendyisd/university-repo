@extends('layouts.app')

@section('scripts')
    {{-- @vite(['']) --}}
@endsection

@section('content')
    {{-- frame work --}}
    <script src="https://kit.fontawesome.com/4c177f5af8.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    @vite(['resources/sass/home.scss'])
    <title>Home</title>

    <div class="container">
        <a href="{{ route('metadata') }}" class="btn btn-primary">Metadata</a>
        <a href="{{ route('browse') }}" class="btn btn-primary">Browse</a>
        <a href="{{ route('admin') }}" class="btn btn-primary">Admin</a>
        <a href="{{ route('deposit') }}" class="btn btn-primary">Deposit</a>
    @endsection
