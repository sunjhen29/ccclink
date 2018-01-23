@extends('layouts.agent.home')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <!-- <h3 class="box-title">View</h3> -->
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>Date</th>
                            <th>Task Name</th>
                            <th>Time Started</th>
                            <th>Time End</th>
                            <th>Total Hours</th>
                        </tr>
                        @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->created_at->toFormattedDateString() }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->created_at->toTimeString() }}</td>
                            <td>
                                @if($task->active==1)
                                    <form id="task_update{{ $task->id  }}" method="POST" action="{{ url('/task/'.$task->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" id="btn-search" class="btn btn-danger">End Task</button>
                                    </form>
                                @else
                                    {{ $task->finished_at->toTimeString() }}
                                @endif
                            </td>
                            <td>
                                @if($task->finished_at != null)
                                    {{ $task->finished_at ->diff($task->created_at)->format('%H:%I:%S') }}
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            @if(!$tasks->contains('active',true))
                                <form id="task" method="POST" action="{{ url("/tasks") }}">
                                    {{ csrf_field() }}
                                    <tr>
                                        <td colspan="4">
                                            <select class="form-control" id="task_name" name="task_name">
                                                <option>Sample</option>
                                                <option>Coffee Break</option>
                                                <option>Hour Break</option>
                                            </select>
                                        </td>
                                        <td>
                                            <button type="submit" id="btn-search" class="btn btn-primary">Start New Task</button>
                                        </td>
                                    </tr>
                                </form>
                            @endif
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
@endsection