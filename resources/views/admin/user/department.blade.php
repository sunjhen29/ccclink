@extends('layouts.admin.admin')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><button id="btn-add" name="btn-add" class="btn btn-success btn-md addbutton"><span class="glyphicon glyphicon-plus"></span> Add New Department</button> </h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped dataTable" >
                                    <thead>
                                    <tr>
                                        <th>Department Code</th>
                                        <th>Department</th>
                                        <th>Command</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($departments as $dept)
                                        <tr>
                                            <td>{{ $dept->department_code }}</td>
                                            <td>{{ $dept->department_name }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-xs open-modal" data-toggle="modal" data-target="#myModal" value="{{ $dept->id }}"> Modify User </button>
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

        <div id="myModal" class="modal modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"></h4>
                    </div>
                    <form id="frmDepartment" method="POST" action="{{ url('/department/create') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="row">

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

                                </div>
                            </div>






                        </div>
                        <!-- /.box-body -->
                        <div class="modal-footer">
                            <button type="submit" id="btn-save" class="btn btn-success"></button>
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
                $('#frmDepartment').trigger("reset");
                $('.modal-title').html('Add New Department');
                $('#btn-save').html("Save Department");
                $('#myModal').modal('show');
                $("#department_code").focus();
            })


            $('.open-modal').click(function(){
                $('#frmDepartment').attr('action','/department/'+ $(this).val()+'/edit');
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