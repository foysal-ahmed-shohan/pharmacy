@extends('master')

@section('content')
 <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
   <!-- Main content -->

@if($ck==0)
   <section class="content">
      <div class="row">
         <div class="col-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Sales List</h3>
                  <a href="{{url('/sales/add')}}" class="btn btn-primary pull-right">Add Sales</a>
               </div>
               <!-- /.card-header -->
                <!-- serch box -->
               <form role="form" action="{{route('sale.search')}}" method="GET">
                <div class="col-md-12">
                  

                 <div class="col-md-5">
                           <div class="form-group">
                                 <div class="row">
                                        <div class="col-md-2">
                                            <label for="sale_date">{{ __('From:') }}</label>
                                        </div>
                                        <div class="col-md-10">

                                                <div class="input-group date">
                                                    <input type="text" name="from" id="sale_date" value="{{$date}}"  class="form-control pull-right datepicker" id="datepicker">
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
                                                    <input type="text" name="to" id="sale_date" value="{{$date}}"  class="form-control pull-right datepicker" id="datepicker">
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
                           <button type="submit" id="hide" onclick="showHideDiv('t')" class="btn btn-default">{{ __('Search') }}</button> 
                        </div>
                     </div>  
                  </div>                   
               </form> 

                  
                  <!-- end search box      -->

               <div id="t" class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>

                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Payment Type</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Action</th>
  
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($sales as $sale)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$sale->invoice_no}}</td>
                           <td>{{$sale->customer['customer_name']}}</td>
                           
                           <td>@if ($sale->payment_type == '0') Cash Payment 
                              @elseif ($sale->payment_type == '1') Bank Payment @else($sale->payment_type == '2')  bkash/Rocket
                              @endif
                           </td>
                           <td>{{$sale->sale_date}}</td>
                           <td>৳ {{number_format($sale->grand_total, 2)}}</td>
                           <td>
                              <a href="{{route('sale.show',['sale'=>$sale->id])}}">
                              <button class="btn btn-success"><i class="fa fa-eye"></i>
                              </button></a>

                              <a href="{{route('sale.delete',[$sale->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want toDestroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a>
                           </td>
                          
                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Payment Type</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                        <th>Action</th>

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

<!-- search result table -->

@if($ck==1)
 <section class="content">
      <div class="row">
         <div class="col-md-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Search Results</h3>
                  <a href="{{url('/sales/add')}}" class="btn btn-primary pull-right">Add Sales</a>
               </div>

                
                <!-- serch box -->
               <form role="form" action="{{route('sale.search')}}" method="GET">
                <div class="col-md-12">
                  

                 <div class="col-md-5">
                           <div class="form-group">
                                 <div class="row">
                                        <div class="col-md-2">
                                            <label for="sale_date">{{ __('From:') }}</label>
                                        </div>
                                        <div class="col-md-10">

                                                <div class="input-group date">
                                                    <input type="text" name="from" id="sale_date" value="{{$date}}" class="form-control pull-right datepicker" id="datepicker">
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
                           <button type="submit" id="hide" onclick="showHideDiv('t')" class="btn btn-default">{{ __('Search') }}</button> 
                        </div>
                     </div>  
                  </div>                   
               </form> 

                   <h3 style="text-align: center; color: #1a75ff  "><strong>Search Result: ( From {{$from}} To {{$to}} )</strong></h3>  
               <!-- /.card-header -->
                  <!-- end search box      -->

               <div id="t" class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>

                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Payment Type</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                       
  
                     </tr>
                     </thead>
                     <tbody>
                     
                     @foreach($sales as $sale)
                        <tr>
                           <td>{{ $ck++ }}</td>
                           <td><a target=”_blank” href="{{route('sale.show',['sale'=>$sale->id])}}">{{$sale->invoice_no}}</a></td>

                           <td>Foysal</td>
                           
                           <td>@if ($sale->payment_type == '0') Cash Payment @else ($sale->payment_type == '1') Bank Payment @endif</td>
                           <td>{{$sale->sale_date}}</td>
                           <td>৳ {{number_format($sale->grand_total, 2)}}</td>

                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Invoice No</th>
                        <th>Customer Name</th>
                        <th>Payment Type</th>
                        <th>Date</th>
                        <th>Total Amount</th>
                     

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





<!-- End Search Table -->

@endsection
