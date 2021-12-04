@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Medicine List</h3>
                  <a href="{{url('/medicine/add')}}" class="btn btn-primary pull-right">Add Medicine</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Medicine Name</th>
                        <th>Generic Name</th>
                        <th>Medicine Type</th>
                        <th>Manufacturer</th>
                        <th>Sell Price</th>
                        <th>Purchase Price</th>
                        <th>Unit</th>
                        <th>Box Size</th>
                        <th>Images</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($medicine as $medic)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$medic->product_name}}</td>
                           <td>{{$medic->generic_name}}</td>
                           <td>{{$medic->type['name']}}</td>
                           <td>{{$medic->manufacturer['manufacturer_name']}}</td>
                           <td>{{$medic->sell_price}}</td>
                           <td>{{$medic->manufacturer_price}}</td>
                           <td>{{$medic->unit['name']}}</td>
                           <td>{{$medic->box_size}}</td>
                           <td><img src='{{ asset('uploads/medicine/'.$medic->images) }}' width="80"></td>
                           <td>
                              <a href="{{route('medicine.edit',[$medic->id])}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
                              <a href="{{route('medicine.delete',[$medic->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Medicine Name</th>
                        <th>Generic Name</th>
                        <th>Medicine Type</th>
                        <th>Manufacturer</th>
                        <th>Sell Price</th>
                        <th>Purchase Price</th>
                        <th>Unit</th>
                        <th>Box Size</th>
                        <th>Images</th>
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