<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                @if($addButton == true)
                    <h3 class="box-title"><button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton"><span class="glyphicon glyphicon-plus"></span> Add {{ $addText or 'New Record'  }}</button> </h3>
                @endif
                @if($export == true)
                    <a href="{{ url('/exports/payroll?date_from='.urlencode(getInput('date_from',carbon_yesterday('m/d/Y'))).'&date_to='.urlencode(getInput('date_to',carbon_yesterday('m/d/Y')))) }}"><button class="btn btn-success btn-md addbutton pull-right"><i class="fa fa-file-excel-o" aria-hidden="true"></i>  Export to Excel</button></a>
                @endif
            </div>
            <div class="box-body">
                <table id="myTable" class="table table-hover table-bordered" >
                    <thead>
                    <tr>
                        @foreach($theadings as $theading)
                            <th>{{ $theading }}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                        @yield('datatable')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>