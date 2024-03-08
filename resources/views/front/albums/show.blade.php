@extends('layouts.app')

@section('content')
<a href="{{ route('pictures.create') }}" class="btn btn-primary mb-3 ">Upload Picture</a>

    <div class="card">
        <div class="card-body">
            <div class="text-center ">
                <h1 class="card-title mb-3  text-center">{{ $album->name }}</h1>

            </div>

            <div class="album-photos d-flex flex-wrap">
                @foreach ($album->pictures as $picture)
                    <div class="album-photo">
                        <img src="{{ $picture->getFirstMediaUrl('picture') }}" alt="{{ $picture->name }}" style="max-width: 150px;">
                        <p class="text-center">{{ $picture->name }}</p>
                    </div>
                @endforeach
            </div>
          
        </div>
    </div>
@endsection
