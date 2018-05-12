@extends('layouts.agent.home',['page_title'=>'Job Monitoring'])

@section('content')
    <div class="row">
        <div class="col-xs-12">

            <div class="box box-primary">
                <div class="box-header">
            </div>
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody><tr>
                            <th>DATE</th>
                            <th>ACTIVITY NAME</th>
                            <th>TIME STARTED</th>
                            <th>TIME END</th>
                            <th>TOTAL HOURS</th>
                        </tr>
                        @foreach($tasks->tasks as $task)
                        <tr>
                            <td>{{ $task->created_at->toFormattedDateString() }}</td>
                            <td>{{ $task->task_name }}</td>
                            <td>{{ $task->created_at->toTimeString() }}</td>
                            <td>
                                @if($task->active==1)
                                    <form id="task_update{{ $task->id  }}" method="POST" action="{{ url('/task/'.$task->id) }}">
                                        {{ csrf_field() }}
                                        <button type="submit" id="btn-search" class="btn btn-danger">End Activity</button>
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
                        @if(!$tasks->tasks->contains('active',true))
                            <form id="task" method="POST" action="{{ url("/tasks") }}">
                                {{ csrf_field() }}
                                <tr>
                                    <td colspan="4">
                                        {{ Form::select('task_name', $task_lists, null, ['class'=>'form-control']) }}
                                    </td>
                                    <td>
                                        <button type="submit" id="btn-search" class="btn btn-success">Start New Activity</button>
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