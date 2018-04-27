<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><strong>{{ $heading_title or 'Title' }}</strong></h3>
            </div>
            <div class="box-body">
                <form id="frmActivityReport" >
                    <div class="col-md-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                From
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ $date1 or \Carbon\Carbon::now()->format('m/d/Y') }}">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                To
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="date_to" name="date_to" value="{{ $date2 or \Carbon\Carbon::now()->format('m/d/Y') }}">
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