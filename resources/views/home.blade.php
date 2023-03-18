@extends('layouts.app')

@section('scripts')
{{-- @vite(['']) --}}
@endsection

@section('content')
<div class="container">
    <a href="{{ route('metadata') }}" class="btn btn-primary">Metadata</a>
    <a href="{{ route('browse') }}" class="btn btn-primary">Browse</a>
    <a href="{{ route('admin') }}" class="btn btn-primary">Admin</a>
    <a href="{{ route('deposit') }}" class="btn btn-primary">Deposit</a>
</div>
@endsection
