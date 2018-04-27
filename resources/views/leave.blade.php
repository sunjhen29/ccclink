@extends('layouts.agent.home')

@section('content')
    @include('layouts.components.filter')
@endsection

@section('datatable')
    <thead>
    <tr>
        <th>Leave Date</th>
        <th>Leave Type</th>
        <th>Reason</th>
        <th>Approver</th>
        <th>Status</th>
        <th>Declined Reason</th>
        <th>Command</th>
    </tr>
    </thead>
    <tbody>
    @foreach($leaves as $leave)
        <tr>
            <td>{{ $leave->leave_date }}</td>
            <td>{{ $leave->leave_code }}</td>
            <td>{{ $leave->reason }}</td>
            <td>{{ $leave->approver }}</td>
            <td>{{ $leave->status }}</td>
            <td>{{ $leave->declined_reason }}</td>
            <td>
            @if($leave->status == 'Pending')
            <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $leave->id }}"> Modify </button>
            @endif
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>

    </tfoot>
@endsection

@section('form')
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

@push('scripts')
<script>
    $(document).ready(function(){
        $('#btn-add').click(function(){
            $('#myForm').attr('action','/agent_leave/create');
            $('#myForm').trigger("reset");
            $('.modal-title').html('Add New Leave');
            $('#btn-save').html("Save Leave");
            $('#myModal').modal('show');
            $("#reason").focus();
        })

        $('.open-modal').click(function(){
            $('#myForm').attr('action','/agent_leave/'+ $(this).val()+'/edit');
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