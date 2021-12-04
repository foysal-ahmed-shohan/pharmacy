@extends('master')


@section('content')
    <!-- Main content -->
        <section class="content">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="box-title">Add Customer</h2>
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
              <form role="form" action="{{route('customers.store')}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="customer_name">{{ __('Customer Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('customer_name')}}" id="customer_name" name="customer_name" placeholder="Enter Customer Name">
                 </div>
              </div>
                  </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="customer_email">{{ __('Customer E-mail') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="email" class="form-control" value="{{old('customer_email')}}" id="customer_email" name="customer_email" placeholder="Enter Customer E-mail">
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="customer_phone">{{ __('Customer Mobile') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{old('customer_phone')}}" id="customer_phone" name="customer_phone" placeholder="Enter Customer Mobile" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="customer_address">{{ __('Customer Address') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control" name="customer_address" rows="3" placeholder="Enter Customer Address">{{old('customer_address')}}</textarea>
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="customer_balance">{{ __('Previous Balance') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="number" class="form-control" value="{{old('customer_balance')}}" id="customer_balance" name="customer_balance" placeholder="Enter Previous Balance">
                 </div>
              </div>
                  </div>
                  </div>

                <div class="box-footer">
                  <div class="col-md-offset-3">
                  <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                      <input class="btn btn-warning" type="reset" value="{{ __('Reset') }}">
               </div>
               </div>
              </form>
            </div>
            <!-- /.card -->

          

        
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 @endsection