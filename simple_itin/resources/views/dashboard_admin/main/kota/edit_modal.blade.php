<div class="modal fade" id="editModalCity">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" autocomplete="off">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit City</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="edit_city" placeholder="City" required>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="city_id" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-flat" id="btnUpdateCity">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
