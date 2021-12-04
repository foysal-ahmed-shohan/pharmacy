@extends('master')

@section('content')
   <!-- Main content -->

   @if($ck==0)
   <section class="content">
      <div class="row">
         <div class="col-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Purchase List</h3>

                  <a href="{{url('/purchase/add')}}" class="btn btn-primary pull-right">Add Purchase</a>
               </div>
               <!-- /.card-header -->

                <form role="form" action="{{route('purchase.search')}}" method="GET">
               <div class="col-md-12">
                 <div class="col-md-5">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="sale_date">{{ __('From:') }}</label>
                                        </div>
                                        <div class="col-md-10">

                                                <div class="input-group date">
                                                    <input type="text" name="from" id="sale_date" value="{{$date}}"class="form-control pull-right datepicker" id="datepicker">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>

                                                </div>

                                        </div>
                                    </div>
                                </div>
                              </div>
                                <div class="col-md-5">
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="sale_date">{{ __('To:') }}</label>
                                        </div>
                                        <div class="col-md-10">

                                                <div class="input-group date">
                                                    <input type="text" name="to" id="sale_date" value="{{$date}}" class="form-control pull-right datepicker" id="datepicker">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                               </div>
                                          </div>
                                    </div>
                                </div>
                           </div>

                           <div class=" col-md-1">
                        <div class="col-md-offset-3">
                               <button type="submit" class="btn btn-default">{{ __('Search') }}</button> 
                     </div>
                   </div>  
                  </div>
                </form> 





               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Purchase ID</th>
                        <th>Manufacturer Name</th>
                        <th>Date</th>
                        <th>Paymeny Type</th>
                        <th>Total</th>
                        <th>Action</th>


                     </tr>
                     </thead>
                     <tbody>
                     @foreach($purchases as $purchase)
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{$purchase->invoice_no}}</td>
                        <td>{{$purchase->id}}</td>
                        <td>{{$purchase->manufacturer->manufacturer_name}}</td>
                        <td>{{$purchase->purchase_date}}</td>

                        <td>@if ($purchase->payment_type == '0') Cash Payment @elseif ($purchase->payment_type == '1') Bank Payment @else <span style="color:red;">Due Payment</span> @endif</td>
                        <td>৳ {{number_format($purchase->grand_total, 2)}}</td>

                          <td>
                              <a href="{{route('purchase.show',['purchase'=>$purchase->id])}}">
                              <button class="btn btn-success"><i class="fa fa-eye"></i>
                              </button></a>

                              <a href="{{route('purchase.delete',[$purchase->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a>
                           </td>

                     </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Purchase ID</th>
                        <th>Manufacturer Name</th>
                        <th>Date</th>
                        <th>Paymeny Type</th>
                        <th>Total</th>

                     </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   @endif

   <!-- search box start -->
   @if($ck==1)
     <section class="content">
      <div class="row">
         <div class="col-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Search List</h3>
                  <a href="{{url('/purchase/add')}}" class="btn btn-primary pull-right">Add Purchase</a>
               </div>
               <!-- /.card-header -->

                <form role="form" action="{{route('purchase.search')}}" method="GET">
               <div class="col-md-12">
                 <div class="col-md-5">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="sale_date">{{ __('From:') }}</label>
                                        </div>
                                        <div class="col-md-10">

                                                <div class="input-group date">
                                                    <input type="text" name="from" id="sale_date" value="{{$date}}" class="form-control pull-right datepicker" id="datepicker"  >
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>

                                                </div>

                                        </div>
                                    </div>
                                </div>
                              </div>
                                <div class="col-md-5">
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="sale_date">{{ __('To:') }}</label>
                                        </div>
                                        <div class="col-md-10">

                                                <div class="input-group date">
                                                    <input type="text" name="to" id="sale_date" value="{{$date}}" class="form-control pull-right datepicker" id="datepicker">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                               </div>
                                          </div>
                                    </div>
                                </div>
                           </div>

                           <div class=" col-md-1">
                        <div class="col-md-offset-3">
                               <button type="submit" class="btn btn-default">{{ __('Search') }}</button> 
                     </div>
                   </div>  
                  </div>
                </form>  
                <h3 style="text-align: center; color: #1a75ff  "><strong>Search Result: ( From {{$from}} To {{$to}})</strong></h3>  

               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Purchase ID</th>
                        <th>Manufacturer Name</th>
                        <th>Date</th>
                        <th>Paymeny Type</th>
                        <th>Total</th>
  


                     </tr>
                     </thead>
                     <tbody>
                     @foreach($purchases as $purchase)
                     <tr>
                        <td>{{ $no++ }}</td>
                        <td> <a target="blank" href="{{route('purchase.show',['purchase'=>$purchase->id])}}">{{$purchase->invoice_no}}</a></td>
                        <td>{{$purchase->id}}</td>
                         <td>HASAN</td>
                        <td>{{$purchase->purchase_date}}</td>

                        <td>@if ($purchase->payment_type == '0') Cash Payment @elseif ($purchase->payment_type == '1') Bank Payment @else <span style="color:red;">Due Payment</span> @endif</td>
                        <td>৳ {{number_format($purchase->grand_total, 2)}}</td>

                        

                     </tr>
                        @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Purchase ID</th>
                        <th>Manufacturer Name</th>
                        <th>Date</th>
                        <th>Paymeny Type</th>
                        <th>Total</th>

                     </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.card-body -->
            </div>
            <!-- /.card -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   @endif

    
   <!-- End search Box -->



@endsection