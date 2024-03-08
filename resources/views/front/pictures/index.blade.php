@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1 class="card-title">Pictures</h1>

            <a href="{{ route('pictures.create') }}" class="btn btn-primary mb-3">Upload Picture</a>

            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pictures as $picture)
                        <tr>
                            <td>{{ $picture->name }}</td>
                            <td>
                                @if ($picture->getFirstMediaUrl('picture'))
                                    <img src=" {{ $picture->getFirstMediaUrl('picture') }}"
                                        style="max-width: 150px;">
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('pictures.edit', $picture->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('pictures.destroy', $picture->id) }}" method="POST"
                                    style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
