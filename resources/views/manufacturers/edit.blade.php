@extends('master')

@section('content')

    <!-- Main content -->
    <section class="content">

          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="box-title">Edit Manufacturer</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('manufacturers.update',[$manufacturer->id])}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="manufacturer_name">{{ __('Manufacturer Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$manufacturer->manufacturer_name}}" id="manufacturer_name" name="manufacturer_name" placeholder="Enter Manufacturer Name">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="manufacturer_mobile">{{ __('Manufacturer Mobile') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{$manufacturer->manufacturer_mobile}}" id="manufacturer_mobile" name="manufacturer_mobile" placeholder="Enter Manufacturer Mobile" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="manufacturer_address">{{ __('Manufacturer Address') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control" name="manufacturer_address" rows="3" placeholder="Enter Manufacturer Address">{{$manufacturer->manufacturer_address}}</textarea>
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="manufacturer_details">{{ __('Manufacturer Details') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="manufacturer_details" placeholder="Enter Manufacturer Details">{{$manufacturer->manufacturer_details}}</textarea>
                 </div>
                 </div>
                  </div>

                  </div>

                <div class="box-footer">
                  <div class="col-md-offset-3">
                  <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                  <button type="submit" class="btn btn-warning">{{ __('Save and Add Another') }}</button>
               </div>
               </div>
              </form>
            </div>
            <!-- /.card -->

    </section>
 @endsection