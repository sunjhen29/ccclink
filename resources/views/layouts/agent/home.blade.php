<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $page_title or "Time and Attendance | Dashboard" }}</title>

  <link rel="SHORTCUT ICON" href="{{ asset("images/logo2.png") }}">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!--Bootstrap -->
  <link rel="stylesheet" href="{{ asset("bower_components/bootstrap/dist/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css") }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/AdminLTE.min.css") }}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
                                                        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{ asset("bower_components/admin-lte/dist/css/skins/skin-blue.min.css") }}">

    <!-- Bootstrap Data tables -->
  <link rel="stylesheet" href="{{ asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <!-- Date Range Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
    <!-- Bootstrap Date Picker -->
    <link rel="stylesheet" href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">




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


<body class="hold-transition skin-blue layout-boxed">
    <div class="wrapper">
          @include('layouts.agent.header')  <!-- header -->

          @include('layouts.agent.sidebar') <!-- sidebar -->

          <div class="content-wrapper"> <!-- content wrapper -->
                    <section class="content-header">
                      <h1>
                        {{ $page_title or "Page Title" }}
                        <small>{{ $page_description or null }}</small>
                      </h1>
                      <!--
                      <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                        <li class="active">Here</li>
                      </ol>
                      -->
                    </section>

                    <section class="content container-fluid"> <!-- Main Content -->

                        @yield('content')

                        @if(!isset($crud))
                            @include('layouts.components.datatable')
                            @include('layouts.components.modal')
                        @endif


                    </section>
          </div>

          @include('layouts.agent.footer') <!-- Footer -->

          <!-- Control Side Bar -->
    </div>


    <!-- jQuery 3 -->
    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>
    <!-- Data tables -->
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
    <!-- Date Range Picker -->
    <script src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <!-- Bootstrap Date Picker -->
    <script src="{{ asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>

    @stack('scripts')

    <script>
        $(document).ready(function(){
            //Data Table

            $(function () {
                $('#myTable').DataTable({
                    'paging'      : true,
                    'lengthChange': true,
                    'searching'   : true,
                    'ordering'    : true,
                    'info'        : true,
                    'autoWidth'   : false,
                    'responsive'  : true,
                    'pageLength'  : 25
                })
            })

            //Date Picker
            $('#date_from').datepicker({
                autoclose: true
            })

            $('#date_to').datepicker({
                autoclose: true
            })

        })
    </script>

</body>
</html>