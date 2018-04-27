@extends('layouts.admin.admin',[
            'page_title'=>"Manage Department",
            'filter_option'=>false,
            'filter_option_title' => "Upload",
            'datatable'=>true,
            'addButton' => true,
            'theadings' => array('DEPARTMENT CODE','DEPARTMENT','COMMAND'),
            'export' => false,
            'modal'=>true
        ])

@section('datatable')
      @foreach($departments as $dept)
        <tr>
            <td>{{ $dept->department_code }}</td>
            <td>{{ $dept->department_name }}</td>
            <td>
                <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $dept->id }}"> Modify User </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('modal_form')
    <div class="row">
        <div class="col-md-3">
            <label for="department_code" class="pull-right">Department Code</label>
        </div>
        <div class="col-md-3">
            <input type="text" class="form-control" id="department_code" name="department_code" value="" required>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <label for="department_name" class="pull-right">Department Name</label>
        </div>
        <div class="col-md-7">
            <input type="text" class="form-control" id="department_name" name="department_name" required>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $('#btn-add').click(function(){
                $('#myForm').attr('action','/department/create');
                $('#myForm').trigger("reset");
                $('.modal-title').html('Add New Department');
                $('#btn-save').html("Save Department");
                $('#myModal').modal('show');
                $("#department_code").focus();
            })

            $('.open-modal').click(function(){
                $('#myForm').attr('action','/department/'+ $(this).val()+'/edit');
                $.get('/department/' + $(this).val(),function(data){
                    console.log(data);
                    $("#department_code").val(data.department_code);
                    $("#department_code").prop('disabled',true);
                    $("#department_name").val(data.department_name);
                    $('.modal-title').html('Update Department');
                    $('#btn-save').html("Update");
                    $("#department_code").focus();
                })
            })
        })
    </script>
@endpush