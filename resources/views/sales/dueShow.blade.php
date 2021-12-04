


@extends('master')


@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                 <a href="{{url('/explist')}}" class="btn btn-success pull-right">All Expense List</a>
              </div>
              <!-- /.card-header -->

                @if ($errors->any())
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        @if ($errors->count() == 1)
                            {{$errors->first()}}
                        @else
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
            @endif
              <!-- form start -->
               <form role="form" action="{{route('amount.store')}}" method="GET" enctype="multipart/form-data">
                  @csrf
                   

                   @foreach($due as $due)

					   @if($due->customer_id == $id)
	        


                      <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __('Name:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value="{{$due->customer_name}}" id="invoice_no" name="name" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>
                          <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __('Email:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value="{{$due->customer_email}}" id="invoice_no" name="email" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>

                           <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __('Telephone:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value="{{$due->customer_phone}}" id="invoice_no" name="phone" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>

                             <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __('Address:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value="{{$due->customer_address}}" id="address" name="invoice_no" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __('Customer ID:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value="{{$due->customer_id}}" id="invoice_no" name="customer_id" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>

                             <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __('Due Amount:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value="{{$due->sum}}" id="invoice_no" name="due" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>


                                   <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label for="invoice_no">{{ __(' Payment:') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control"
                                         value=" " id="invoice_no" name="amount" placeholder="Enter Invoice No" >
                                        </div>
                                    </div>
                                </div>
                 @endif
                 @endforeach

                <div class="box-footer">
                  <div class="col-md-offset-3">
                  <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                      <input class="btn btn-warning" type="reset" value="{{ __('Reset') }}">

               </div>
               </div>
              </form>
            </div>
           
      </div><!-- /.container-fluid -->
    </section>




    @endsection





  