

@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Stock List</h3>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Medicine Name</th>
                        <th>Purchase</th>
                        <th>Sale</th>
                        <th>Available</th>
                        
                     </tr>
                     </thead>
                     <tbody>
                  @foreach($medicine as $m)
						@foreach($sales as $s)
						@foreach($purchase as $p)

						@if ($s->medicine_id == $p->medicine_id && $p->medicine_id== $m->id )
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$m->product_name}}</td>
                           <td>{{$p->sum}}</td>
                           <td>{{$s->sum}}</td>
                           <td>{{$p->sum - $s->sum}}</td>                         
                        </tr>
                    	@endif
						@endforeach 
						@endforeach 
						@endforeach 
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Medicine Name</th>
                        <th>Purchase</th>
                        <th>Sale</th>
                        <th>Available</th>
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