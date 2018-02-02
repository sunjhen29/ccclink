@extends('layouts.admin.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton"><span class="glyphicon glyphicon-plus"></span> Add New User</button> </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped dataTable" >
                                    <thead>
                                    <tr>
                                        <th>Employee No.</th>
                                        <th>Employee Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Command</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{ $user->employee_no }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $user->id }}"> Modify User </button>
                                            </td>
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
        <!-- /.col -->
    </div>

    <div id="myModal" class="modal modal-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New User</h4>
                </div>
                <form id="frmUser" method="POST" action="{{ url('/users/create') }}">
                    {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="employee_no">Emp No.</label>
                            <input type="text" class="form-control" id="employee_no" name="employee_no" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="user_type">User Type</label>
                            <input type="text" class="form-control" id="user_type" name="user_type" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" id="btn-save" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function(){

            $('#btn-add').click(function(){
                $('#frmUser').trigger("reset");
                $('.modal-title').html('Add New User Record');
                $('#btn-save').html("Save");
                $('#myModal').modal('show');
            })


            $('.open-modal').click(function(){
                $('#frmUser').attr('action','/user/'+ $(this).val()+'/edit');
                $.get('/user/' + $(this).val(),function(data){
                    console.log(data);
                    $("#employee_no").val(data.employee_no);
                    $("#username").val(data.username);
                    $("#name").val(data.name);
                    $("#email").val(data.email);
                    $("#user_type").val(data.user_type);
                    $("#password").val();
                    $("#password-confirm").val();
                    $('.modal-title').html('Update User');
                    $('#btn-save').html("Update");
                    $("#password").focus();
                })
            })


            $(function () {
                $('#example2').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false
                })
            })





        })
    </script>
@endpush