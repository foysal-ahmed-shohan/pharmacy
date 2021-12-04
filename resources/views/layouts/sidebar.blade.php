  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar"  style="background-color: #2C3E50!important;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li>
          <a href="{{url('/dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Sales</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/sales')}}"><i class="fa fa-circle-o"></i>All Sales</a></li>
            <li><a href="{{url('/sales/add')}}"><i class="fa fa-circle-o"></i>Add Sale</a></li>
            <li><a href="{{url('/due/CustomerDue')}}"><i class="fa fa-circle-o"></i>Customer Due</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-handshake-o"></i> <span>Customers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/customers')}}"><i class="fa fa-circle-o"></i>All Customers</a></li>
            <li><a href="{{url('/customers/add')}}"><i class="fa fa-circle-o"></i>Add Customer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-medkit"></i> <span>Medicine</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/medicine')}}"><i class="fa fa-circle-o"></i>All Medicine</a></li>
            <li><a href="{{url('/medicine/add')}}"><i class="fa fa-circle-o"></i>Add Medicine</a></li>
            <li><a href="{{url('/medicine/category')}}"><i class="fa fa-circle-o"></i>Medicine Category</a></li>
            <li><a href="{{url('/medicine/type')}}"><i class="fa fa-circle-o"></i>Medicine Type</a></li>
            <li><a href="{{url('/medicine/unit')}}"><i class="fa fa-circle-o"></i>Medicine Unit</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building-o"></i> <span>Manufacturers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/manufacturers')}}"><i class="fa fa-circle-o"></i>All Manufacturers</a></li>
            <li><a href="{{url('/manufacturers/add')}}"><i class="fa fa-circle-o"></i>Add Manufacturer</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-basket"></i> <span>Purchase</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/purchase')}}"><i class="fa fa-circle-o"></i>All Purchase</a></li>
            <li><a href="{{url('/purchase/add')}}"><i class="fa fa-circle-o"></i>Add Purchase</a></li>
            <li><a href="{{url('due/ManufacturerDue')}}"><i class="fa fa-circle-o"></i>Manufacturer Due</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-university"></i> <span>Bank</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/bank')}}"><i class="fa fa-circle-o"></i>All Bank</a></li>
            <li><a href="{{url('/bank/add')}}"><i class="fa fa-circle-o"></i>Add Bank</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user-plus"></i> <span>Supplier</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/supplier')}}"><i class="fa fa-circle-o"></i>All Supplier</a></li>
            <li><a href="{{url('/supplier/add')}}"><i class="fa fa-circle-o"></i>Add Supplier</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-home"></i> <span>Company Information</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{route('company.index')}}"><i class="fa fa-circle-o"></i>Profile</a></li>
            <li><a href="{{route('company.create')}}"><i class="fa fa-circle-o"></i>Add Information</a></li>
          </ul>
        </li>

          <li>
          <a href="{{url('/stock')}}">
            <i class="fa fa-medkit"></i> <span>Stock</span>
          </a>
         </li>


         <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-basket"></i> <span>Account</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/account/create')}}"><i class="fa fa-circle-o"></i>Expense Head</a></li>
            <li><a href="{{url('/expadd')}}"><i class="fa fa-circle-o"></i>Add Expense</a></li>
            <li><a href="{{url('explist')}}"><i class="fa fa-circle-o"></i>Expense List</a></li>
            <li><a href="{{url('/income')}}"><i class="fa fa-circle-o"></i>Income Statement</a></li>
          </ul>
        </li>


    
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>