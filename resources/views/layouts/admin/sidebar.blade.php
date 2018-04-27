<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset("bower_components/admin-lte/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>{{ auth()->guard('admin')->user()->name }}</p>
        <!-- Status -->
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- search form (Optional)
    <form action="#" method="get" class="sidebar-form">
      <div class="input-group">
        <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
      </div>
    </form>
    search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Main Navigation</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="/admin"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li class="treeview">
        <a href=""><i class="ion ion-ios-paper-outline"></i> <span>Reports</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/reports/login') }}">Login Report</a></li>
          <li><a href="{{ url('/reports/activity') }}">User Activity Report</a></li>
        </ul>

      </li>

      <li class="treeview">
        <a href=""><i class="ion ion-ios-paper-outline"></i> <span>Device</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/imports/timelog') }}">Upload Time Logs</a></li>
          <li><a href="{{ url('/imports/biometric') }}">Device Log</a></li>
        </ul>

      </li>

      <li class="treeview">
        <a href=""><i class="ion ion-ios-paper-outline"></i> <span>Personnel</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/department') }}">Department</a></li>
          <li><a href="{{ url('/users') }}">Personnel</a></li>
        </ul>

      </li>

      <li class="treeview">
        <a href=""><i class="ion ion-ios-paper-outline"></i> <span>Attendance</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('/leave_type') }}">Leave Type</a></li>
          <li><a href="{{ url('/leave') }}">Exception</a></li>
          <li><a href="{{ url('attendance/timerecord') }}">Time Record</a></li>
        </ul>

      </li>


    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>