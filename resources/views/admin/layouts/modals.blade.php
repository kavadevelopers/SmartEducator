<div class="modal fade" id="atAttendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form method="post" action="<?= App\Http\Controllers\admin\BaseController::aUrl('/attendance/save') ?>" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #f6f7f9;">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #1d262d;">Select employee and details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Selected Date</label>
                    <input type="text" name="date" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label>Employee <span class="-req">*</span></label>
                    <select class="form-control" name="employee" required>
                        <option value="">-- Select --</option>
                        <?php foreach(DB::table('z_user')->where('id','!=','1')->get() as $val){ ?>
                            <option value="<?= $val->id ?>"><?= $val->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Select Option <span class="-req">*</span></label>
                    <select class="form-control" name="type" required>
                        <option value="">-- Select --</option>
                        <?php foreach(DB::table('manage_attendance_types')->where('df','')->get() as $val){ ?>
                            <option value="<?= $val->name ?>"><?= $val->name ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Notes</label>
                    <textarea name="notes" class="form-control" placeholder="Notes (if any)"></textarea>
                </div>
            </div>
            <div class="modal-footer text-right">
                <button type="button" class="btn btn-danger btnTakeAttendance"><i class="fa fa-arrow-left"></i> Back</button>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>
    </div>
    </form>
</div>

<div class="modal fade" id="atCalanderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="background: #f6f7f9;">
            <div class="modal-header">
                <h5 class="modal-title" style="color: #1d262d;">Select Date</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="atCalandarContainer"></div>
            </div>
        </div>
    </div>
</div>


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
                            <option value="Reschedule">Reschedule</option>
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




<script type="text/javascript">
    var calendar;
    calConfirg = {
        date:new Date(),
        enableYearView:true,
        showYearDropdown: true,
        startOnMonday: true,
        onClickDate:onSelectDateFromCal
    }

    function openCalander() {
        calendar = $('.atCalandarContainer').calendar(calConfirg);
        $('#atAttendModal').modal('hide');
        $('#atCalanderModal').modal('show');
    }
    function onSelectDateFromCal(date) {
        $('.atCalandarContainer').updateCalendarOptions({
            date: date
        });
        var formattedDate = new Date(calendar.getSelectedDate());
        var d = formattedDate.getDate();
        if(d.toString().length == 1){
            d = "0"+d;
        }
        var m =  formattedDate.getMonth();
        m += 1;
        if(m.toString().length == 1){
            m = "0"+m;
        }
        var y = formattedDate.getFullYear();

        finalDate = d+'-'+m+'-'+y;

        $('#atAttendModal input[name=date]').val(finalDate);
        $('#atCalanderModal').modal('hide');
        $('#atAttendModal').modal('show');
    }
</script>