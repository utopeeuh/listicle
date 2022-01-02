<!-- Modal -->
<div class="modal fade" id="create-modal" tabindex="-1" aria-labelledby="create-modal-label" aria-hidden="true">
    <div class="vertical-alignment-helper">
        <div class="modal-dialog vertical-align-center">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add a new task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/store" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="Priority">Priority</label>
                            <br>
                            <input type="radio" class="btn-check" name="priority" id="low-create"
                                autocomplete="off" value="low" checked>
                            <label class="btn btn-secondary" for="low-create">Low</label>

                            <input type="radio" class="btn-check" name="priority" id="medium-create"
                                autocomplete="off" value="medium">
                            <label class="btn btn-secondary" for="medium-create">Medium</label>

                            <input type="radio" class="btn-check" name="priority" id="high-create"
                                autocomplete="off" value="high">
                            <label class="btn btn-secondary" for="high-create">High</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
