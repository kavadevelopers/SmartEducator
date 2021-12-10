<div class="modal fade" id="changeStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/leads/status/') ?>" enctype="multipart/form-data">
    {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="background: #f6f7f9;">
                <div class="modal-header">
                    <h5 class="modal-title" style="color: #1d262d;">Change Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" name="status" required>
                            <option value="">-- Select Status --</option>
                            <option value="new">New</option>
                            <option value="Busy">Busy</option>
                            <option value="Switch off">Switch off</option>
                            <option value="Not reachable">Not reachable</option>
                            <option value="Not interested">Not interested</option>
                            <option value="Deal closed">Deal closed</option>
                            <option value="Appointment fixed">Appointment fixed</option>
                        </select>
                    </div>
                    <div class="form-group apDateContainer" style="display:none;">
                        <label>Appointment Date</label>
                        <input type="text" name="date" class="form-control dtpickerdemo" placeholder="Appointment Date" />
                    </div>
                    <div class="form-group">
                        <textarea name="notes" rows="5" class="form-control" placeholder="Notes (if any)"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                    <input type="hidden" name="eid">
                </div>
            </div>
        </div>
    </form>
</div>

<style type="text/css">
    .flatpickr-calendar.open {
        display: inline-block;
        z-index: 9999999999;
    }
</style>