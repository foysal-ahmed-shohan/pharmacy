@extends('master')


@section('content')
    <!-- Main content -->
    <section class="content">
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="box-title">Add Supplier</h2>
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
               <form role="form" action="{{route('company.store')}}" enctype="multipart/form-data" method="POST">
                  {{csrf_field()}}
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_name">{{ __('Company Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('cname')}}" id="cname" name="cname" placeholder="Enter Company Name">
                 </div>
              </div>
                  </div>
                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_name">{{ __('Company Tag Line *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('tag')}}" id="tag" name="tag" placeholder="Enter Company Tag Line">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_phone">{{ __('phone *') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{old('phone')}}" id="phone" name="phone" placeholder="Enter Company 1st Mobile Number" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_phone">{{ __('Company Mobile 2nd ') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{old('phone2')}}" id="phone2" name="phone2" placeholder="Company 2nd Mobile Number" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_address">{{ __('Company Email 1st *') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="text" class="form-control" id="sel1" value="{{old('email1')}}" placeholder="Enter 1st email" id="email1" name="email1">
                 </div>
              </div>
                  </div>
                    <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_address">{{ __('Company Email 2nd') }}</label>
                 </div>
                 <div class="col-md-8">
                     <input type="text" class="form-control" id="email2" value="{{old('email2')}}" placeholder="Enter 2nd email" name="email2">
                 </div>
                 </div>
              </div>
               

                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="customer_address">{{ __('Customer Address') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control" name="address" rows="3" value="{{old('address')}}"  placeholder="Enter Company Address">{{old('customer_address')}}</textarea>
                 </div>
              </div>
                  </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="sup_details">{{ __('Logo') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input type="file"  id="usr" rows="3" value="{{old('logo')}}" placeholder="Company Logo" name="logo">
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

    </section>
 @endsection