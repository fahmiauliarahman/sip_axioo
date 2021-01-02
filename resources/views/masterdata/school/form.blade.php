<div class="modal fade" id="modal-school" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="post" id="form-school">
                <div class="modal-body">
                    @csrf
                    @method("POST")
                    <input type="hidden" name="id_school" id="id_school">
                    <div class="form-group">
                        <label for="school_name">School Name</label>
                        <input type="text" class="form-control" id="school_name" name="school_name"
                            placeholder="Insert School Name...">
                    </div>
                    <div class="form-group">
                        <label for="school_address">School Address</label>
                        <textarea class="form-control" id="school_address" name="school_address" rows="3"
                            placeholder="Insert School Address..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
