<form id="frmFilter" >
    <div class="col-md-1">
        <label for="department_id" class="control-label">Department</label>
    </div>
    <div class="col-md-2">
        {{ Form::select('department',\App\Department::lists('department_name','id'),null,['id' => 'department','class'=> 'form-control','placeholder' => 'All Department']) }}
    </div>
    <div class="col-md-1">
        <label for="user_id" class="control-label">Staff ID</label>
    </div>
    <div class="col-md-2">
             {{ Form::select('user_id',\App\User::lists('employee_no','employee_no'),getInput('user_id',null),['id' => 'user_id','class'=> 'form-control','placeholder' => '-- Select User --']) }}
            <span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span>
    </div>

    <div class="col-md-1">
        <label for="production_date">Production</label>
    </div>
    <div class="col-md-2">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ getInput('date_from',carbon_yesterday('m/d/Y')) }}">
        </div>
    </div>
    <div class="col-md-2">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="date_to" name="date_to" value="{{ getInput('date_to',carbon_yesterday('m/d/Y')) }}">
        </div>
    </div>
    <div class="col-md-1">
        <button type="submit" id="btn-search" class="btn btn-primary">Submit</button>
    </div>
</form>
