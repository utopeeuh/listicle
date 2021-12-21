<!-- Modal -->
<div class="modal fade" id="update-modal-{{ $note->id }}" tabindex="-1" aria-labelledby="update-modal-label"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/update/{{ $note->id }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control" value="{{ $note->title }}" required>
                    </div>
                    <div class="form-group">
                        <label for="Priority">Priority</label>
                        <input type="radio" class="btn-check" name="priority" id="low-update-{{ $note->id }}"
                            autocomplete="off" value="low" {{ $note->priority == 'low' ? 'checked' : '' }}>
                        <label class="btn btn-secondary" for="low-update-{{ $note->id }}">Low</label>

                        <input type="radio" class="btn-check" name="priority"
                            id="medium-update-{{ $note->id }}" autocomplete="off" value="medium"
                            {{ $note->priority == 'medium' ? 'checked' : '' }}>
                        <label class="btn btn-secondary" for="medium-update-{{ $note->id }}">Medium</label>

                        <input type="radio" class="btn-check" name="priority" id="high-update-{{ $note->id }}"
                            autocomplete="off" value="high" {{ $note->priority == 'high' ? 'checked' : '' }}>
                        <label class="btn btn-secondary" for="high-update-{{ $note->id }}">High</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
