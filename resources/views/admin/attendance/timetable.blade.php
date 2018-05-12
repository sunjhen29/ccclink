@extends('layouts.admin.admin',[
            'page_title'=>"Leave",
            'filter_option'=>false,
            'filter_option_title' => "Upload",
            'datatable'=>true,
            'addButton' => true,
            'theadings' => array('DATE','EMPLOYEE NAME','LEAVE TYPE','REASON','APPROVER','STATUS','COMMAND'),
            'export' => false,
            'modal'=>true
        ])


@section('datatable')
        @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->leave_date }}</td>
                <td>{{ $leave->user->fullname }}</td>
                <td>{{ $leave->leave_code }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->approve->fullname }}</td>
                <td>{{ $leave->status }}</td>
                <td>
                    <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $leave->id }}"> Modify </button>
                    <button class="btn btn-success btn-xs open-dialog-approve" data-toggle="modal" data-target="#myDialog" value="{{ $leave->id }}"> Approve </button>
                    <button class="btn btn-danger btn-xs open-dialog-decline" data-toggle="modal" data-target="#myDialog" value="{{ $leave->id }}"> Decline </button>
                </td>
            </tr>
        @endforeach
@endsection

@section('modal_form')
    <div class="row">
        <div class="col-md-3">
            <label for="leave_date" class="pull-right">Date</label>
        </div>
        <div class="col-md-3">
            <div class="input-group date">
                <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="date_from" name="date_from" value="{{ $date1 or \Carbon\Carbon::tomorrow()->format('m/d/Y') }}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="leave_code" class="pull-right">Leave Type</label>
        </div>
        <div class="col-md-3">
            {{ Form::select('leave_code',\App\LeaveType::lists('leave_description','leave_code'),null,['id' => 'leave_code','class'=> 'form-control','placeholder' => '-- Leave Type --','required'=> true]) }}
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for="reason" class="pull-right">Reason</label>
        </div>
        <div class="col-md-7">
            <input type="text" class="form-control" id="reason" name="reason" value="" required>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <label for="approver" class="pull-right">Approver</label>
        </div>
        <div class="col-md-5">
            {{ Form::select('approver',\App\User::where('user_type','Admin')->lists('firstname','id'),null,['id' => 'approver','class'=> 'form-control','placeholder' => '-- Approver --','required'=>true]) }}
        </div>
    </div>
@endsection

@include('layouts.components.dialog');

@push('scripts')
    <script>
        $(document).ready(function(){
                $('#btn-add').click(function(){
                $('#myForm').attr('action','/leave/create');
                $('#myForm').trigger("reset");
                $('.modal-title').html('Add New Leave');
                $('#btn-save').html("Save Leave");
                $('#myModal').modal('show');
                $("#reason").focus();
            })

            $('.open-modal').click(function(){
                $('#myForm').attr('action','/leave/'+ $(this).val()+'/edit');
                $.get('/leave/' + $(this).val(),function(data){
                    console.log(data);
                    $("#date_from").val(data.leave_date);
                    $("#leave_code").val(data.leave_code);
                    $("#reason").val(data.reason);
                    $("#status").val(data.status);
                    $("#approver").val(data.approver);
                    $('.modal-title').html('Update Leave');
                    $('#btn-save').html("Update");
                    $("#leave_code").focus();
                })
            })

            $('.open-dialog-approve').click(function(){
                $('#myDialogForm').attr('action','/leave/'+ $(this).val()+'/approve');
                $('.message').html('Are you sure you want to Approved?');
                $('.modal-title').html('Confirm?');
            })

            $('.open-dialog-decline').click(function(){
                $('#myDialogForm').attr('action','/leave/'+ $(this).val()+'/decline');
                $('.message').html('Are you sure you want to decline?');
                $('#declined_reason').attr('type','text');
                $('.modal-title').html('Decline?');
            })

        })
    </script>
@endpush