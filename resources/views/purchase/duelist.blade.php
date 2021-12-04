

@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                <h2 class="box-title">Manufacturer Name: <b>{{ $name->manufacturer_name}}<b>
                  </h2><br>
                <h2 class="box-title">Manufacturer Mobile: <b>{{ $name->manufacturer_mobile}}<b></h2><br>
                  <h2 class="box-title">Manufacturer Address: <b>{{ $name->manufacturer_address}}<b></h2>

                     <a href="{{url('due/ManufacturerDue')}}" class="btn btn-primary pull-right">All Due Manufacturer</a>
                 <br>
                 @foreach($manufacturer as $manufacturer)
                 @if($manufacturer->manufacturer_id == $id)
                  	<h2 class="box-title">Total Balance: <b>{{ $manufacturer->sum}}<b></h2>
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
                    
                       
                     @foreach($purchase as $purchase)
                     @if($purchase->due_amount>0 && $purchase->manufacturer_id==$id)
                     <tr>
                       <th>{{ $no++}}</th>
                        <th>{{ $purchase->invoice_no}}</th>
                        <th>{{ $purchase->due_amount}}</th>
                        <th>{{ $purchase->created_at}}</th>
  
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
                      @if($due->due_amount <0 && $due->manufacturer_id == $id )
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






