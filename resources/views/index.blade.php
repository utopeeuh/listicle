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
        <span>{{ $note->title }}</span>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update-modal">
            Edit
        </button>
        @include('modals.update')

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">
            Delete
        </button>
        @include('modals.delete')
    @empty
        <div>no task</div>
    @endforelse
@endsection

<script>
    // jquery post for done
</script>
