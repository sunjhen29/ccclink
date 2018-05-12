<form id="frmProductionReport" _lpchecked="1">
    <div class="col-md-1">
        <label for="job_name" class="control-label">Staff ID</label>
    </div>
    <div class="col-md-2">
        <input type="text" class="form-control" id="user_id" name="user_id" value="{{ getInput('user_id','') }}" autofocus="" >
    </div>
    <div class="col-md-1">
        <label for="production_date">Production</label>
    </div>
    <div class="col-md-2">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ getInput('date_from',carbon_now('m/d/Y')) }}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="date_to" name="date_to" value="{{ getInput('date_to',carbon_now('m/d/Y')) }}">
        </div>
    </div>
    <div class="col-md-1">
        <button type="submit" id="btn-search" class="btn btn-primary">Search</button>
    </div>
</form>
