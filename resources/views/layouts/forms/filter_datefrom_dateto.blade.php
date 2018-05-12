<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h5 class="box-title"><strong>Filter Options</strong></h5>

            </div>
            <div class="box-body">
                <form id="myForm" >
                    <div class="col-md-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                               Date From
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ getInput('date_from',carbon_last(7,'m/d/Y')) }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                To
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="date_to" name="date_to" value="{{ getInput('date_to',carbon_now('m/d/Y')) }}">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" id="btn-search" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>