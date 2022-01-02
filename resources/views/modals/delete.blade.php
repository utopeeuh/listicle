<!-- Modal -->
<div class="modal fade" id="delete-modal-{{ $note->id }}" tabindex="-1" aria-labelledby="update-modal-label"
    aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Are you sure?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Use the checkbox instead to declare you've finished this task!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                    <a href="/destroy/{{ $note->id }}">
                        <div class="btn btn-danger">
                            Yes
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
