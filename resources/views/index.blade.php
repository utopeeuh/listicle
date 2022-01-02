@extends('layouts.master')
@section('content')

    @include('modals.create')
    @include('modals.clear')

    <div class="container p-5">
        @if ($notes->count() > 0)
            <div class="row justify-content-center align-items-center mb-4">
                <div class="col-md-6">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-modal">
                        Add new task
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#clear-modal">
                        Clear all
                    </button>
                </div>
            </div>
        @endif

        @forelse ($notes as $note)
            <div class="row justify-content-center align-items-center mb-1">
                <div for="task-{{ $note->id }}-cb" class="task task-{{ $note->priority }} col-md-4 align-items-center">
                    <input type="checkbox" id="task-{{ $note->id }}-cb" onclick="isdone({{ $note->id }});"
                        {{ $note->isdone == 1 ? 'checked' : '' }} />
                    <span class="st"> {{ $note->title }}</span>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#update-modal-{{ $note->id }}">
                        Edit
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#delete-modal-{{ $note->id }}">
                        Delete
                    </button>
                </div>
            </div>
            @include('modals.update')
            @include('modals.delete')
        @empty

            <div class="d-flex flex-column align-items-center justify-content-center" style="height: 40%">
                <div class="no-task mb-2 text-center">
                    No tasks found, start by<br>clicking the button below
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-modal">
                    Add new task
                </button>

            </div>
        @endforelse
    </div>
@endsection

<script>
    function isdone(note_id) {
        $.ajax({
            type: "POST",
            url: "/done/" + note_id,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(result) {}
        });
    }
</script>
