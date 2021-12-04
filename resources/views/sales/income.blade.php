

@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h2 class="box-title">Customer Name: <b>{{ $name->customer_name}}<b></h2>
                     <a href="{{url('due/CustomerDue')}}" class="btn btn-primary pull-right">All Due Customers</a>
                 <br>
                 @foreach($customer as $customer)
                 @if($customer->customer_id == $id)
                  	<h2 class="box-title">Total Balance: <b>{{ $customer->sum}}<b></h2>
                 @endif
                 @endforeach

               </div>
               <!-- /.box-header -->
               <div class="box-body">
               	 <div class="row">
                  <div class="col-sm-6">
                  <table id="" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL</th>
                        <th>Invoice No</th>
                        <th>Due Amount</th>
                        <th>Date</th>                 
                        
                     </tr>
                     </thead>
                     <tbody>
                    
                       
                     @foreach($sales as $sales)
                      @if($sales->due_amount>0 && $sales->customer_id==$id)
                     <tr>
                       <th>{{ $no++}}</th>
                        <th>{{ $sales->invoice_no}}</th>
                        <th>{{ $sales->due_amount}}</th>
                        <th>{{ $sales->created_at}}</th>
  
                     </tr>

                       @endif
                      @endforeach
                    	
                     </tbody>
                    
                  </table>
               </div>

             
              <div class="col-sm-6">
                  <table id="" class="table table-bordered table-striped">
                     <thead>
                     <tr>

                        <th>Payment</th>
                        <th>Date</th>                 
                        
                     </tr>
                     </thead>
                     <tbody>
                    
                       
                     @foreach($due as $due)
                      @if($due->due_amount <0 && $due->customer_id == $id )
                     <tr>

                        <th>{{ $p=abs( $due->due_amount )}}</th>
                        <th>{{ $due->created_at}}</th>
  
                     </tr>

                       @endif
                      @endforeach
                    	
                     </tbody>
                    
                  </table>
               </div>

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






