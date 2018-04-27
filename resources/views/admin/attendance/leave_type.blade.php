@extends('layouts.admin.admin',[
            'page_title'=>"Leave Type",
            'filter_option'=>false,
            'filter_option_title' => null,
            'datatable'=>true,
            'addButton' => true,
            'theadings' => array('LEAVE TYPE CODE','LEAVE DESCRIPTION','COMMAND'),
            'export' => false,
            'modal'=>true
        ])

@section('datatable')
    @foreach($leave_types as $type)
        <tr>
            <td>{{ $type->leave_code }}</td>
            <td>{{ $type->leave_description }}</td>
            <td>
                <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $type->id }}"> Modify Leave Type </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('modal_form')
    <div class="row">
        <div class="col-md-3">
            <label for="leave_code" class="pull-right">Code</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="leave_code" name="leave_code" value="" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="leave_description_name" class="pull-right">Leave Description</label>
        </div>
        <div class="col-md-7">
            <input type="text" class="form-control" id="leave_description" name="leave_description" required>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function(){
            $('#btn-add').click(function(){
                $('#myForm').attr('action','/leave_type/create');
                $('#myForm').trigger("reset");
                $('.modal-title').html('Add New Leave Code');
                $('#btn-save').html("Save Leave Type");
                $('#myModal').modal('show');
                $("#department_code").focus();
            })

            $('.open-modal').click(function(){
                $('#myForm').attr('action','/leave_type/'+ $(this).val()+'/edit');
                $.get('/leave_type/' + $(this).val(),function(data){
                    console.log(data);
                    $("#leave_code").val(data.leave_code);
                    $("#leave_code").prop('disabled',true);
                    $("#leave_description").val(data.leave_description);
                    $('.modal-title').html('Update Leave Type');
                    $('#btn-save').html("Update");
                    $("#leave_code").focus();
                })
            })
        })
    </script>
@endpush