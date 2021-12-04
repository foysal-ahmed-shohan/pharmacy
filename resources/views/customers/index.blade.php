@extends('master')

@section('content')
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-primary">
               <div class="box-header">
                  <h2 class="box-title">All Customers List</h2>
                  <a href="{{url('/customers/add')}}" class="btn btn-primary pull-right">Add Customer</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Mobile</th>
                        <th>Address</th>
                        <th>Balance</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($customers as $customer)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$customer->customer_name}}</td>
                           <td>{{$customer->customer_email}}</td>
                           <td>{{$customer->customer_phone}}</td>
                           <td>{{$customer->customer_address}}</td>
                           <td>{{$customer->customer_balance}}</td>
                           <td>
                              <a href="{{route('customers.edit',[$customer->id])}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
                      
                              <a href="{{route('customers.delete',[$customer->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want toDestroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a>
                           </td>

                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>E-mail</th>
                        <th>Mobile</th>
                        <th>Address</th>
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