@extends('layouts.admin.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Filter Options</strong></h3>
                </div>
                <div class="box-body">
                    <form id="frmActivityReport" >
                        <div class="col-md-1">
                            <label for="job_name" class="control-label">Staff ID</label>
                        </div>
                        <div class="col-md-2">
                            <input type="text" class="form-control" id="user_id" name="user_id" value="{{ $user_id or '' }}" autofocus="" >
                        </div>
                        <div class="col-md-1">
                            <label for="production_date">Production</label>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ $date1 or \Carbon\Carbon::now()->format('m/d/Y') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group date">
                                <div class="input-group-addon">
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

    <div class='row'>
        <div class='col-md-12'>
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Records</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="{{ url('/exports/payroll?date_from='.urlencode($date1).'&date_to='.urlencode($date2)) }}"><button class="btn btn-success btn-md addbutton pull-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i>  Export to Excel</button></a>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Date</th>
                            <th>Employee No.</th>
                            <th>Employee Name</th>
                            <th>Day</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>In</th>
                            <th>Out</th>
                            <th>Remarks</th>
                        </tr>
                        @foreach($biometrics as $biometric)
                            <tr>
                                <td>{{ $biometric->work_date }}</td>
                                <td>{{ $biometric->employee_no }}</td>
                                <td>{{ $biometric->employee_name }}</td>
                                <td>{{ $biometric->day }}</td>
                                <td>{{ $biometric->in1 }}</td>
                                <td>{{ $biometric->out1 }}</td>
                                <td>{{ $biometric->in2 }}</td>
                                <td>{{ $biometric->out2 }}</td>
                                <td>{{ $biometric->Remarks }}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div><!-- /.col -->
    </div>


@endsection