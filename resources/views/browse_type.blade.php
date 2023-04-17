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
        <span class="fw-bold">Browse by Type</span>
    </div>
    <p>Please select these options below</p>
    <ul class="m-0">
        <li>
            <a href="{{ route('browse.type.get', ['type' => 'ug']) }}">Undergraduate Thesis</a>
        </li>
    </ul>
    <ul class="m-0">
        <li>
            <a href="{{ route('browse.type.get', ['type' => 'ms']) }}">Master Thesis</a>
        </li>
    </ul>
    <ul class="m-0">
        <li>
            <a href="{{ route('browse.type.get', ['type' => 'phd']) }}">Doctoral Dissertation</a>
        </li>
    </ul>
</div>
@endsection