@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Create Album</h1>
            <form action="{{ route('albums.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Album Name:</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Create Album</button>
            </form>
        </div>
    </div>
@endsection
