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
              <form role="form" action="{{route('supplier.store')}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_name">{{ __('Supplier Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('sup_name')}}" id="sup_name" name="sup_name" placeholder="Enter Supplier Name">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_phone">{{ __('Supplier Mobile') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{old('sup_phone')}}" id="sup_phone" name="sup_phone" placeholder="Enter Mobile Mobile" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_address">{{ __('Supplier Address') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control" name="sup_address" rows="3" placeholder="Enter Supplier Address">{{old('sup_address')}}</textarea>
                 </div>
              </div>
                  </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="sup_details">{{ __('Supplier Details') }}</label>
                            </div>
                            <div class="col-md-8">
                                <textarea class="form-control" name="sup_details" rows="3" placeholder="Enter Supplier Details">{{old('sup_details')}}</textarea>
                            </div>
                        </div>
                    </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_balance">{{ __('Previous Balance') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="number" class="form-control" value="{{old('sup_balance')}}" id="sup_balance" name="sup_balance" placeholder="Enter Previous Balance">
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