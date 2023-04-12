@extends('layouts.app')

@section('scripts')
@vite([
    'resources/sass/home.scss',
])
@endsection

@section('content')
<div class="container">
    <table>
        <p><a href="">2023</a></p>
        <p><a href="">2022</a></p>
        <p><a href="">2021</a></p>
        <p><a href="">2020</a></p>
        <p><a href="">2019</a></p>
    </table>
</div>
@endsection