<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!--
    <meta http-equiv="refresh" content="60" />
  -->
  <title>{{ $page_title or "Time and Attendance | Dashboard" }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="SHORTCUT ICON" href="{{ asset("images/logo2.png") }}">

    <!--Bootstrap -->
  <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
  <!-- Date Range Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- Bootstrap Date Picker -->
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Bootstrap Data tables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">


  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                                                        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/skin-blue.min.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  @include('layouts.admin.header')

  @include('layouts.admin.sidebar')

  <div class="content-wrapper">

    @include('layouts.components.header')

    <section class="content container-fluid">
      @if($filter_option == true)
        @include('layouts.components.filter_option')
      @endif

      @if($datatable == true)
        @include('layouts.components.datatable')
      @endif

      @if($modal == true)
        @include('layouts.components.modal')
      @endif

      @include('layouts.components.error')

      @yield('content')

    </section>

  </div>

  @include('layouts.admin.footer')


  <!-- Control Sidebar -->
   <!--
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!--
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    -->
    <!-- Tab panes -->
    <!--
    <div class="tab-content">
      <!-- Home tab content -->
      <!--
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        -->
        <!-- /.control-sidebar-menu -->
        <!--
        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
Custom Template Design
<span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        -->
        <!-- /.control-sidebar-menu -->
        <!--
      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <!--
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      -->
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <!--
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
Report panel usage
<input type="checkbox" class="pull-right" checked>
            </label>

            <p>
Some information about this general settings option
</p>
          </div>
          -->
          <!-- /.form-group -->
      <!--
        </form>
      </div>
      -->
      <!-- /.tab-pane -->
    <!--
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <!--
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
<!-- Date Range Picker -->
<script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- Bootstrap Date Picker -->
<script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Data tables -->
<script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>


<script>
    $(document).ready(function(){
        //Data Table
        //$(function () {
           var table = $('#myTable').DataTable({
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false,
                'responsive'  : true,
                'pageLength'  : 25,
                "order": []
            })
        //})

        //Date Picker
        $('#date_from').datepicker({
            autoclose: true
        })

        $('#date_to').datepicker({
            autoclose: true
        })

    })
</script>
<script>
    $(document).ready(function() {

        var default_user = $('select[name="user_id"]').val();

        $('#loader').css("visibility", "hidden");

        $(function () {
            $('select[name="department"]').change();
        });


        $('select[name="department"]').on('change', function(){
            var dept_id = $(this).val();

            if(dept_id == ''){
                dept_id = 9999;
            }


            if(dept_id) {

                 $.ajax({
                    url: '/user/dept/'+dept_id,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader').css("visibility", "visible");
                    },

                    success:function(data) {

                        $('select[name="user_id"]').empty();

                        $('select[name="user_id"]').append('<option value="">All User</option>');

                        $.each(data, function(key, value){
                             $('select[name="user_id"]').append('<option value="'+ key +'">' + value + '</option>');
                        });

                        $('select[name="user_id"]').val(default_user);

                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="user_id"]').empty();
            }

        });

    });
</script>



@stack('scripts')

</body>
</html>