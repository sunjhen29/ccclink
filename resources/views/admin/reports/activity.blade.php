@extends('layouts.admin.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>User Activity Report</strong></h3>
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
                    <h3 class="box-title">Time Logs</h3>

                    <div class="box-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <!--
                            <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                        <tr>
                            <th>Production Date</th>
                            <th>Employee No.</th>
                            <th>Employee Name</th>
                            <th>Activity Name</th>
                            <th>Time Started</th>
                            <th>Time Finished</th>
                            <th>Total Hours</th>
                        </tr>
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->production_date }}</td>
                                <td>{{ $task->user->employee_no }}</td>
                                <td>{{ $task->user->name }}</td>
                                <td>{{ $task->task_name }}</td>
                                <td>{{ $task->created_at->toTimeString() }}</td>
                                <td>
                                    @if($task->active==1)

                                    @else
                                        {{ $task->finished_at->toTimeString() }}
                                    @endif
                                </td>
                                <td>
                                    @if($task->finished_at != null)
                                        {{ $task->finished_at ->diff($task->created_at)->format('%H:%I:%S') }}
                                    @else
                                        <span> Ongoing</span>
                                    @endif
                                </td>
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