@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Create Picture</h1>

            <form method="POST" action="{{ route('pictures.store') }}" enctype="multipart/form-data">
                @csrf <!-- CSRF Protection -->
                <label for="image">Choose Picture:</label>

                <input type="file" id="images" class="form-control" name="image[]" multiple required>

                <label for="name">Picture Name:</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Picture Name"
                    required>

                <label for="album_id">Select Album:</label>
                <select class="form-control" id="album_id" name="album_id" required>
                    <option value="">Select Album</option>
                    @foreach ($albums as $album)
                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                    @endforeach
                </select>

                <button class="btn btn-primary" type="submit">Upload Picture</button>
            </form>
        </div>
    </div>
@endsection
