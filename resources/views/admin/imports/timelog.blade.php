@extends('layouts.admin.admin',[
            'page_title'=>"Upload Time Logs",
            'filter_option'=>true,
            'filter_option_title' => "Upload",
            'datatable'=>true,
            'addButton' => false,
            'theadings' => array('PRODUCTION DATE','ROWS IMPORTED','COMMAND','CREATED AT'),
            'export' => false,
            'modal'=>false
        ])

@section('filter_option')
    {!! Form::open(array('role'=>'form','url'=>'/imports/timelog','action'=>'POST','files'=>'true')) !!}
    {{ csrf_field() }}
    <div class="col-md-1">
        <label for="production_date">Production Date</label>
    </div>
    <div class="col-md-2">
        <div class="input-group date">
            <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
            </div>
            <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ carbon_yesterday('m/d/Y') }}">
        </div>
    </div>
    <div class="col-md-2">
        {{ Form::file('attlog',null,['class'=>'form-control','required'=>'required']) }}
    </div>
    <div class="col-md-1">
        <button type="submit" id="btn-search" class="btn btn-primary">Upload to Database</button>
    </div>
    {!! Form::close() !!}
@endsection


@section('datatable')
    @foreach($production_dates as $production_date)
        <tr>
            <td>{{ $production_date->production_date }}</td>
            <td>{{ $production_date->row_count }}</td>
            <td><a class='btn btn-sm btn-success' href="/attendance/timerecord?user_id=&date_from={{urlencode($production_date->production_date)}}&date_to={{urlencode($production_date->production_date)}}&user_id="><i class="fa fa-external-link"> View Logs</a></td>
            <td>{{ $production_date->created_at }}</td>
        </tr>
    @endforeach
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#snd-mail').click(function(){
                $.get('/email/login/' + $("#email").val(),function(data) {
                    console.log(data);
                    alert(data);
                })
            })

        })
    </script>
@endpush