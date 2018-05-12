@extends('layouts.agent.home',['page_title'=>'Attendance Report'])

@section('content')
    @include('layouts.forms.filter_datefrom_dateto')
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
                        @foreach($biometrics as $dtr)
                            <tr>
                                <td>{{ $dtr->production_date }}</td>
                                <td>{{ substr($dtr->time_in,11,8) }}</td>
                                <td>{{ substr($dtr->time_out,11,8)}}</td>
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
