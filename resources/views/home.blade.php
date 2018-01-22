@extends('layouts.agent.home')

@section('content')
    <div class='row'>
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Add New Task</strong></h3>
                </div>
                <div class="box-body">
                    <form id="task" method="POST" action="{{ url("/tasks") }}">
                        {{ csrf_field() }}

                        <div class="col-md-2">
                            <label for="task_name" class="control-label">Select Task</label>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" id="task_name" name="task_name">
                                <option>Sample</option>
                                <option>Break</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" id="btn-search" class="btn btn-primary">Start</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">View</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Date</th>
                            <th>Task Name</th>
                            <th>Status</th>
                        </tr>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->created_at->toFormattedDateString() }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                        </tbody></table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection