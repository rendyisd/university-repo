@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/home.scss',
])
@endsection

@section('content')
<div class="container">
    <table>
        <h1>Document Type</h1>
        <p><a href="">Undergraduate Thesis</a></p>
        <p><a href="">Master Thesis</a></p>
        <p><a href="">Doctoral Dissertation</a></p>
    </table>
</div>
@endsection