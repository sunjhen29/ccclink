@extends('layouts.admin.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>Time Log</strong></h3>
                </div>
                <div class="box-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{ Form::open(array('role'=>'form','url'=>'/imports/timelog','action'=>'POST','files'=>'true')) }}
                            {{ csrf_field() }}
                        <div class="col-md-2">
                            {{ Form::file('attlog',null,['class'=>'form-control','required']) }}
                        </div>
                        <div class="col-md-1">
                            <label for="production_date">Production Date</label>
                        </div>
                        <div class="col-md-2">
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ $date1 or \Carbon\Carbon::now()->format('m/d/Y') }}">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" id="btn-search" class="btn btn-primary">Start Import</button>
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
                        <thead>
                            <tr>
                                <th>PRODUCTION DATE</th>
                                <th>ROWS IMPORTED</th>
                                <th>COMMAND</th>
                                <th>UPLOAD TIMELOG</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($production_dates as $production_date)
                            <tr>
                                <td>{{ $production_date->production_date }}</td>
                                <td>{{ $production_date->row_count }}</td>
                                <td><a class='btn btn-sm btn-success' href="/exports/payroll?date_from={{urlencode($production_date->production_date)}}&date_to={{urlencode($production_date->production_date)}}&user_id="><i class="fa fa-download"> Download XLS</a></td>
                                <td>{{ $production_date->created_at }}</td>
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