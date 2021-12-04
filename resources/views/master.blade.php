@include('layouts.head')


@include('layouts.navbar')

@include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1><i class="{{$icon}} head-title"></i> {{$title}}</h1>
        <ol class="breadcrumb">
          <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
          <li class="active">{{$title}}</li>
        </ol>
      </section>
   @yield('content')
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('layouts.footer')