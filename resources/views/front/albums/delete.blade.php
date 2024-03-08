@extends('layouts.app')

@section('content')
<h1>Delete Album</h1>

<p>This album contains pictures. What would you like to do?</p>

<form method="POST" action="{{ route('albums.confirmDelete', $album->id) }}">
    @csrf
    <button type="submit" class="btn btn-danger" name="action" value="deletePictures">Delete All Pictures</button>
    <button type="submit" class="btn btn-primary" name="action" value="movePictures">Move Pictures to Another Album</button>
</form>
@endsection
