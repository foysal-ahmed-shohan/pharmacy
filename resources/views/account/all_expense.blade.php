
 




@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Expense</h3>
                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Expense Name</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Action</th>
                        
                     </tr>
                     </thead>
                     <tbody>
                     
						   @foreach($exp as $exp)
                        <tr>
                           <td>{{$no++}}</td>
                           <td>{{$exp->exp_name}}</td>
                           <td>{{$exp->amount}}</td>
                           <td>{{$exp->date}}</td>
                            <td>                            

                               <form id="delete-form-{{ $exp->id }}" action="{{ route('account.d',$exp->id) }}" style="display: none;" method="GET">
                           {{csrf_field()}}company
                           {{ method_field('DELETE') }}
                       </form>
                       <button type="button" class="btn btn-danger" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                           event.preventDefault();
                           document.getElementById('delete-form-{{ $exp->id }}').submit();
                       }else {
                           event.preventDefault();
                               }"><i class="fa fa-trash-o"></i>
                       </button>

                           </td>
                          
                        </tr>
               
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