@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/home.scss',
])
@endsection

@section('content')
<div class="container">
    <div class="title-text pb-2 mb-4 fs-4">
        <i class="fa-solid fa-book me-2"></i>
        <span class="fw-bold">Browse by Faculty</span>
    </div>
    <p>Please select these options below</p>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'feco']) }}">Faculty of Economics</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'flaw']) }}">Faculty of Law</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'feng']) }}">Faculty of Engineering</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'fmed']) }}">Faculty of Medicine</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'fagr']) }}">Faculty of Argiculture</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'fedu']) }}">Faculty of Education and Educational Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'fsoc']) }}">Faculty of Social and Politic Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'fmat']) }}">Faculty of Mathematics and Natural Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'focs']) }}">Faculty of Computer Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="{{ route('browse.faculty.get', ['faculty' => 'foph']) }}">Faculty of Public Health</a></li>
    </ul>
</div>
@endsection