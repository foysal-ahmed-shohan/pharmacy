@extends('master')

@section('content')
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box box-primary">
               <div class="box-header">
                  <h2 class="box-title">All Manufacturer List</h2>
                  <!-- <a href="{{url('/customers/add')}}" class="btn btn-primary pull-right">Add Customer</a> -->
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Manufacturer Name</th>
                        <th>Due Amount</th>
                        <th>Phone</th>
                        <th>Adress</th>
                        <th>Action</th>
                       
                     </tr>
                     </thead>
                     <tbody>

                     @foreach($due as $due)
                        <tr>
                        <td>{{$no++}}</td>
                        <td>{{$due->manufacturer_name}}</td> 
                        <td>{{$due->sum}}</td>
                        <td>{{$due->manufacturer_mobile}}</td>
                        <td>{{$due->manufacturer_address}}</td>
                        <td>
                          <a href="{{route('manu.show',['due'=>$due->id])}}">
                           <button class="btn btn-success"><i class="fa fa-eye"></i>
                           </button></a>
                     

                          <a href="{{route('manu.total',['due'=>$due->id])}}">
                           <button class="btn btn-primary"><i class="fa fa-pencil"></i>
                           </button></a>
                            </td>
                         </tr>
                     @endforeach
              
           
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Manufacturer Name</th>
                        <th>Due Amount</th>
                        <th>Phone</th>
                        <th>Adress</th>
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