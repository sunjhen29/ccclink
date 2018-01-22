<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{ $page_title or "Time and Attendance | Dashboard" }}</title>
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

                    </section>
          </div>

          @include('layouts.agent.footer') <!-- Footer -->

          @include('layouts.agent.control') <!-- Control Side Bar -->
    </div>


    <!-- jQuery 3 -->
    <script src="{{ asset("bower_components/jquery/dist/jquery.min.js") }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset("bower_components/bootstrap/dist/js/bootstrap.min.js") }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset("bower_components/admin-lte/dist/js/adminlte.min.js") }}"></script>

    @stack('scripts')

</body>
</html>