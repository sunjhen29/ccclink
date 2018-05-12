@extends('layouts.agent.home',['page_title'=>'Punch Details'])

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
                        @foreach($punches as $punch)
                            <tr>
                                <td>{{ $punch->production_date }}</td>
                                <td>{{ substr($punch->time_log,11,20) }}</td>
                                <td>{{ $punch->in_out == 1 ? "Check In" : "Check Out" }}</td>
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