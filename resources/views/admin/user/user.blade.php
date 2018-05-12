@extends('layouts.admin.admin',[
            'page_title'=>"Manage Personnel",
            'filter_option'=>false,
            'filter_option_title' => null,
            'datatable'=>true,
            'addButton' => true,
            'theadings' => array('OPERATOR ID','DEPARTMENT NAME','POSITION','EMPLOYEE NAME','USERNAME','EMAIL','COMMAND'),
            'export' => false,
            'modal'=>true
        ])



@section('datatable')
    @foreach($users as $user)
        <tr>
            <td>{{ $user->employee_no }}</td>
            <td>{{ $user->dept->department_name }}</td>
            <td>{{ $user->position }}</td>
            <td>{{ $user->lastname.', '.$user->firstname }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $user->id }}"> Modify User </button>
                <button class="btn btn-danger btn-xs open-modal" data-toggle="modal" data-target="#myPassword" value="{{ $user->id }}"> Reset Password </button>
            </td>
        </tr>
    @endforeach
@endsection

@section('modal_form')
    <div class="box-group" id="accordion">
        <div class="panel box box-primary">
            <div class="box-header">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" class="collapsed">
                        Personnel Profile
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="employee_no" class="pull-right">Employee No.</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="employee_no" name="employee_no" value="" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="username" class="pull-right">Username</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="firstname" class="pull-right">Name</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="firstname" name="firstname" required placeholder="Firstname">
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="lastname" name="lastname" required placeholder="Lastname">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="email" class="pull-right">Email</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="user_type" class="pull-right">Account Type</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="user_type" name="user_type" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="department" class="pull-right">Department</label>
                                </div>
                                <div class="col-md-8">
                                    {{ Form::select('department',\App\Department::lists('department_name','id'),null,['id' => 'department','class'=> 'form-control','placeholder' => '-- Select Department --']) }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="position" class="pull-right">Position</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="position" name="position" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <img width="120" height="140">
                        </div>
                        <div class="col-xs-2">
                            <input name="user_img" id="üser_img" type="file" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel box box-danger">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="false">
                        Personnel Details
                    </a>
                </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                <div class="box-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                </div>
            </div>
        </div>
        <div class="panel box box-success">
            <div class="box-header with-border">
                <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" class="" aria-expanded="true">
                        Attendance Settings
                    </a>
                </h4>
            </div>
            <div id="collapseThree" class="panel-collapse collapse in" aria-expanded="true" style="">
                <div class="box-body">
                    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3

                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(document).ready(function(){
            $('#btn-add').click(function(){
                $('#myForm').attr('action','/users/create');
                $('#myForm').trigger("reset");
                $('.modal-title').html('Add New User');
                $('#btn-save').html("Save Personnel");
                $('#myModal').modal('show');
            })


            $('.open-modal').click(function(){
                $('#myForm').attr('action','/user/'+ $(this).val()+'/edit');
                $.get('/user/' + $(this).val(),function(data){
                    console.log(data);
                    $("#employee_no").val(data.employee_no);
                    $("#employee_no").prop('disabled',true);
                    $("#username").val(data.username);
                    $("#firstname").val(data.firstname);
                    $("#lastname").val(data.lastname);
                    $("#email").val(data.email);
                    $("#user_type").val(data.user_type);
                    $("#department").val(data.department);
                    $("#position").val(data.position);
                    $('.modal-title').html('Update User');
                    $('#btn-save').html("Update");
                    $("#employee_no").focus();
                })
            })


        })
    </script>
@endpush