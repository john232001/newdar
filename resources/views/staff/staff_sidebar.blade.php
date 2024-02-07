 <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('assets/dist/img/admin.png')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Staff</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="{{ route('staff.home') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="{{ route('staff_landholding') }}">
            <i class="fa fa-envelope"></i> <span>LandTenure Services</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>