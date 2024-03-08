@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <h1 class="display-4">Welcome to Album Manager!</h1>
            <p class="lead">Manage your albums and pictures with ease.</p>
            <hr class="my-4">
            <p style=" font-size: 20px" class="text-center"><a href="{{ route('albums.index') }}">Albums </a></p>
        </div>
    </div>
@endsection
