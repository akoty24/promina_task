@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Edit Picture</h1>

            <form method="POST" action="{{ route('pictures.update', $picture->id) }}" enctype="multipart/form-data">
                @csrf <!-- CSRF Protection -->
                @method('PUT') <!-- Use PUT method for update -->

                <div class="form-group">
                    <label for="images">Choose Picture(s):</label>
                    <input type="file" id="images" class="form-control" name="image[]" multiple>
                </div>

                <div class="form-group">
                    <label for="name">Picture Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $picture->name }}" required>
                </div>

                <div class="form-group">
                    <label for="album_id">Select Album:</label>
                    <select class="form-control" id="album_id" name="album_id" required>
                        <option value="">Select Album</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}" {{ $album->id == $picture->album_id ? 'selected' : '' }}>{{ $album->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-primary" type="submit">Update Picture</button>
            </form>
        </div>
    </div>
@endsection
