@extends('layouts.admin.admin',[
            'page_title'=>"User Activity Report",
            'filter_option'=>true,
            'filter_option_title' => "Activity Report",
            'datatable'=>true,
            'addButton' => false,
            'theadings' => array('PRODUCTION DATE','EMPLOYEE NO.','EMPLOYEE NAME','ACTIVITY NAME', 'TIME STARTED','TIME FINISHED','TOTAL HOURS'),
            'export' => false,
            'modal'=>true
        ])

@section('filter_option')
    @include('layouts.forms.filter_user_datefrom_dateto')
@endsection

@section('datatable')
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
@endsection


