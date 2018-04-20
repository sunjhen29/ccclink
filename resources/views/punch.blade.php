@extends('layouts.agent.home')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>User Activity Report</strong></h3>

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

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <!--<h3 class="box-title"></h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Production Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                        </tr>
                        @foreach($punches as $punch)
                            <tr>
                                <td>{{ $punch->production_date }}</td>
                                <td>{{ substr($punch->time_log,11,20) }}</td>
                                <td>{{ $punch->in_out == 1 ? "Check In" : "Check Out" }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>

                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection