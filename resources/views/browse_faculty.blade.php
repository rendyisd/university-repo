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
        <li><a href="">Faculty of Economics</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Law</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Engineering</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Medicine</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Argiculture</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Education and Educational Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Social and Politic Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Mathematics and Natural Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Computer Science</a></li>
    </ul>
    <ul class="m-0">
        <li><a href="">Faculty of Public Health</a></li>
    </ul>
</div>
@endsection