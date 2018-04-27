@extends('layouts.admin.admin',[
            'page_title'=>"Time In",
            'filter_option'=>true,
            'filter_option_title' => "Filter Options",
            'datatable'=>true,
            'addButton' => false,
            'theadings' => array('DATE','EMPLOYEE NO.','TIME IN','TIME OUT'),
            'export' => true,
            'modal'=>true
        ])

@section('filter_option')
        @include('layouts.forms.filter')
@endsection

@section('datatable')
    @foreach($biometrics as $biometric)
        <tr>
            <td>{{ $biometric->production_date }}</td>
            <td>{{ $biometric->operator_id }}</td>
            <td>
                @if($biometric->time_in)
                    {{ substr($biometric->time_in,11,8) }}
                @else
                    <button class="btn btn-danger btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $biometric->id }}"> No Time In</button>
                @endif
            </td>
            <td>
                @if($biometric->time_out)
                    {{ substr($biometric->time_out,11,8) }}
                @else
                    <button class="btn btn-danger btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $biometric->id }}"> No Time Out</button>
                @endif
            </td>
        </tr>
    @endforeach
@endsection

@section('modal_form')
    <div class="row">
        <div class="col-md-3">
            <label for="production_date" class="pull-right">Date</label>
        </div>
        <div class="col-md-3">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="production_date" name="production_date" value="{{ $date1 or \Carbon\Carbon::tomorrow()->format('m/d/Y') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="leave_code" class="pull-right">Operator ID</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="operator_id" name="operator_id" required readonly />
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for="time_in" class="pull-right">Time In</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="time_in" name="time_in" value="" required pattern="^[0-1][0-9]:[0-5][0-9]$">
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for="time_out" class="pull-right">Time Out</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="time_out" name="time_out" value="" required pattern="^[0-1][0-9]:[0-5][0-9]$">
        </div>
    </div>
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $('.open-modal').click(function(){
            $('#myForm').attr('action','/dailytimerecord/create');
            $('#myForm').trigger("reset");
            $('.modal-title').html('Append Log');
            $.get('/dailytimerecord/' + $(this).val(),function(data){
                console.log(data);
                var newdate = data.production_date.split("-");
                var production_date = newdate[1]+'/'+ newdate[2]+'/'+newdate[0];

                $("#production_date").val(production_date);
                $("#production_date").prop('readonly',true);
                $("#operator_id").val(data.operator_id);
                if(data.in_out == 1) {
                    $("#time_in").val(data.time_log.substr(11,5));
                    $("#time_in").prop('disabled',true);
                    $("#time_out").prop('disabled',false);
                    $("#time_in").focus();
                } else {
                    $("#time_out").val(data.time_log.substr(11,5));
                    $("#time_out").prop('disabled',true);
                    $("#time_in").prop('disabled',false);
                    $("#time_out").focus();
                }
                $('#btn-save').html("Append");
            })
        })

        //Date Picker
        $('#production_date').datepicker({
            autoclose: true
        })

    })
</script>
@endpush