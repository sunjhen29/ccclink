@extends('layouts.agent.home')

@section('content')
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
                            <th>Date</th>
                            <th>Event</th>
                            <th>Time</th>
                        </tr>
                        @foreach($user_logins as $login)
                            <tr>
                                <td>{{ $login->created_at->toFormattedDateString() }}</td>
                                <td>
                                    {{ $login->event }}
                                </td>
                                <td>{{ $login->created_at->toTimeString() }}</td>
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