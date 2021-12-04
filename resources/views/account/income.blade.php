

@extends('master')

@section('content')

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h2 class="box-title">Total Sales: <b>{{$sales}}<b></h2><br>
                  	<h2 class="box-title">Total Sales Due: <b>{{$sales_due}}<b></h2><br>
                  		<h2 class="box-title">Total Purchase: <b>{{$purchase}}<b></h2><br>
                  			<h2 class="box-title">Total Purchase Due: <b>{{$parchase_due}}<b></h2><br>
                  			<h2 class="box-title">Total expense: <b>{{$expense}}<b></h2><br>
                           <br>
                           <h1 class="box-title">Total Profit: <b>{{($sales-$sales_due)-($purchase-$parchase_due)-$expense}}<b></h1><br>

                
               </div>
               <!-- /.box-header -->
               <div class="box-body">
               	 <div class="row">
                  <div class="col-sm-6">
                 
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






