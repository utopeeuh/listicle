@extends('layouts.master')
@section('content')
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-modal">
        Add new task
    </button>

    @include('modals.create')

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#clear-modal">
        Clear all
    </button>
    @include('modals.clear')

    <br>
    @forelse ($notes as $note)
        <input type="checkbox" id="task-{{ $note->id }}-cb" onclick="isdone({{ $note->id }});"
            {{ $note->isdone == 1 ? 'checked' : '' }} />
        <span for="task-{{ $note->id }}-cb" class="strikethrough">{{ $note->title }}</span>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#update-modal-{{ $note->id }}">
            Edit
        </button>
        @include('modals.update')

        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
            data-bs-target="#delete-modal-{{ $note->id }}">
            Delete
        </button>
        @include('modals.delete')
        <br>
    @empty
        <div>no task</div>
    @endforelse
@endsection

<script>
    function isdone(note_id) {
        console.log(1);
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
