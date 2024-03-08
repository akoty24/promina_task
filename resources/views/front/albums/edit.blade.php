@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit Album</h1>
            <form action="{{ route('albums.update', $album->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Album Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}"
                        required>
                </div>
                <button type="submit" class="btn btn-primary">Update Album</button>
            </form>
        </div>
    </div>
@endsection
