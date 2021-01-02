<div class="modal fade" id="modal-student" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="form-student">
                    <div class="modal-body">
                        @csrf
                        @method("POST")
                        <input type="hidden" name="id" id="id_student">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input autofocus name="name" type="text" class="form-control" id="name"
                                        placeholder="Name...">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone_number">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">+62</div>
                                        </div>
                                        <input name="phone_number" type="text" class="form-control" id="phone_number"
                                            placeholder="Phone Number..." value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="school_id">School <a class="badge bg-primary ml-2"
                                            id="btn-add-school">Add</a></label>
                                    <select name="school_id" id="school_id" class="form-control"></select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="grade">Grade</label>
                                    <select name="grade" id="grade" class="form-control">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="name">E-Mail</label>
                                    <input name="email" type="text" class="form-control" id="email"
                                        placeholder="E-Mail...">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="dept_id">Department <a class="badge bg-primary ml-2"
                                            id="btn-add-department">Add</a></label>
                                    <select name="dept_id" id="dept_id" class="form-control"></select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bg-primary submit-btn" id="btn-save-student">Save
                            changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
