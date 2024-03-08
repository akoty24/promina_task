@extends('layouts.app')

@section('content')
<h1 class="display-4">Albums</h1>

<div class="album-grid d-flex flex-wrap mb-5">
    @foreach ($albums as $album)
    <div class="album-card" data-album-id="{{ $album->id }}">
        <div class="album-icons">
            <a href="#" class="delete-album" data-album-id="{{ $album->id }}"><i class="fas fa-trash-alt"></i></a>
            <a href="{{ route('albums.edit', $album->id) }}"><i class="fas fa-edit"></i></a>
        </div>
        <a href="{{ route('albums.show', $album->id) }}">
            @if ($album->pictures->count() > 0)
                <img src="{{ $album->pictures->first()->getFirstMediaUrl('picture') }}" style="max-width: 150px;" alt="{{ $album->pictures->first()->name }}" class="album-image">
            @endif
            <h3 class="album-title text-center">{{ $album->name }}</h3>
        </a>
    </div>
    @endforeach
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>This album contains pictures. What would you like to do?</p>
                <button class="btn btn-danger" id="deletePicturesBtn">Delete All Pictures</button>
                <button class="btn btn-primary" id="movePicturesBtn">Move Pictures to Another Album</button>
            </div>
        </div>
    </div>
</div>
<!-- Select Album Modal -->
<div class="modal fade" id="selectAlbumModal" tabindex="-1" aria-labelledby="selectAlbumModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectAlbumModalLabel">Select Target Album</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Select the album where you want to move the pictures:</p>
                <select  class="form-control" id="targetAlbumSelect">
                    @foreach ($albums as $album)
                        <option  value="{{ $album->id }}">{{ $album->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary mt-3" id="confirmMoveBtn">Move Pictures</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden input field to store album ID -->
<input type="hidden" id="albumIdToDelete">

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteAlbumButtons = document.querySelectorAll('.delete-album');
        deleteAlbumButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const albumId = $(this).data('album-id');
                $('#deleteModal').modal('show');
                $('#albumIdToDelete').val(albumId);
            });
        });

        // Handle clicking on the "Delete All Pictures" button
        document.getElementById('deletePicturesBtn').addEventListener('click', function () {
            const albumId = $('#albumIdToDelete').val();
            window.location.href = "/albums/" + albumId + "/delete-pictures";
        });

        // Handle clicking on the "Move Pictures to Another Album" button
        document.getElementById('movePicturesBtn').addEventListener('click', function () {
            // You can redirect to a page where users can choose another album
            console.log('Move pictures to another album');
            // Close the modal
            $('#deleteModal').modal('hide');
        });
    });
    document.addEventListener('DOMContentLoaded', function () {
        // Handle clicking on the "Move Pictures to Another Album" button
        document.getElementById('movePicturesBtn').addEventListener('click', function () {
            $('#selectAlbumModal').modal('show');
        });

        // Handle clicking on the "Move Pictures" button in the modal
        document.getElementById('confirmMoveBtn').addEventListener('click', function () {
            const albumId = $('#albumIdToDelete').val();
            const targetAlbumId = $('#targetAlbumSelect').val();
            // Perform an AJAX request to move pictures to the target album
            $.ajax({
                url: "/albums/" + albumId + "/move-pictures",
                type: "POST",
                data: {
                    target_album_id: targetAlbumId,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    // Handle success response
                    console.log(response);
                    // Redirect to the albums index or display a success message
                    window.location.href = "{{ route('albums.index') }}";
                },
                error: function (xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    // Display an error message or handle the error as needed
                    alert('An error occurred while moving pictures.');
                }
            });
        });
    });
</script>
@endsection
