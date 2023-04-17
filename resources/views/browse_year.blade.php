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
        <span class="fw-bold">Browse by Year</span>
    </div>
    <p>Please select these options below</p>

    @if (empty($years))
        <h2 class="fw-bold">No document published yet.</h2>
    
    @else
        <ul class="m-0">
            @foreach ($years as $year)
                <li>
                    <a href="{{ route('browse.year.get', ['year' => $year]) }}">{{ $year }}</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection