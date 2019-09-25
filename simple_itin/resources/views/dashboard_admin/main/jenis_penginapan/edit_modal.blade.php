<div class="modal fade" id="editModalRoom">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" autocomplete="off">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Room Type</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="city">Room Type</label>
                        <input type="text" class="form-control" id="edit_room_type" placeholder="Room Type" required>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="room_id" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-flat" id="btnUpdateRoom">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
