@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Manufacturers List</h3>
                  <a href="{{url('/manufacturers/add')}}" class="btn btn-primary pull-right">Add Manufacturer</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Details</th>
                        <th>Balance</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($manufacturers as $manufacturer)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$manufacturer->manufacturer_name}}</td>
                           <td>{{$manufacturer->manufacturer_mobile}}</td>
                           <td>{{$manufacturer->manufacturer_address}}</td>
                           <td>{{$manufacturer->manufacturer_details}}</td>
                           <td>{{$manufacturer->manufacturer_balance}}</td>
                           <td>
                              <a href="{{route('manufacturers.edit',[$manufacturer->id])}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
                              <a href="{{route('manufacturers.delete',[$manufacturer->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Details</th>
                        <th>Balance</th>
                        <th>Action</th>
                     </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
@endsection