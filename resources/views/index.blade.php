@extends('layouts.master')
@section('content')

    @include('modals.create')
    @include('modals.clear')

    <div class="container p-5">
        @if ($notes->count() > 0)
            <div class="row justify-content-center align-items-center mb-4">
                <div class="col-md-9">
                    <button type="button" class="btn btn-text btn-green-text" data-bs-toggle="modal"
                        data-bs-target="#create-modal">
                        Add new task
                    </button>
                    <button type="button" class="btn btn-text btn-red-text" data-bs-toggle="modal"
                        data-bs-target="#clear-modal">
                        Clear all
                    </button>
                </div>
            </div>
        @endif

        @forelse ($notes as $note)
            <div class="row justify-content-center align-items-center mb-1">
                <div class="col-md-8 col-sm-12 align-items-center task-cb">
                    <input type="checkbox" id="task-{{ $note->id }}-cb" name="task-{{ $note->id }}-cb"
                        onclick="isdone({{ $note->id }});" {{ $note->isdone == 1 ? 'checked' : '' }} />
                    <label class="cb-check" for="task-{{ $note->id }}-cb"></label>
                    <label for="task-{{ $note->id }}-cb" class="task task-{{ $note->priority }}">
                        {{ $note->title }}</label>
                </div>
                <div class="col-md-auto">
                    <button type="button" class="btn btn-text btn-green-text" data-bs-toggle="modal"
                        data-bs-target="#update-modal-{{ $note->id }}">
                        <i class="far fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-text btn-red-text" data-bs-toggle="modal"
                        data-bs-target="#delete-modal-{{ $note->id }}">
                        <i class="far fa-trash-alt"></i>
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

                <button type="button" class="btn btn-plus" data-bs-toggle="modal" data-bs-target="#create-modal">
                    <i class="fas fa-plus"></i>
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
