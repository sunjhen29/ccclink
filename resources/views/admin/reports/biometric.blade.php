@extends('layouts.admin.admin',[
            'page_title'=>"Device Logs",
            'filter_option'=>true,
            'filter_option_title' => "Filter Options",
            'datatable'=>true,
            'addButton' => false,
            'theadings' => array('OPERATOR ID','ACTUAL LOG','DEVICE ID','PUNCH TYPE'),
            'export' => false,
            'modal'=>false
        ])

@section('filter_option')
    @include('layouts.forms.filter')
@endsection

@section('datatable')
    @foreach($logs as $log)
        <tr>
            <td>{{ $log->operator_id }}</td>
            <td>{{ $log->time_log }}</td>
            <td>{{ $log->device_id }}</td>
            <td>{{ $log->in_out }}</td>
        </tr>
    @endforeach
@endsection
