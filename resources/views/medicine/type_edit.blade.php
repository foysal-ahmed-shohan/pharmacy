@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Edit Medicine Type</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('medicine.type_update',[$mtype->id])}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="name">{{ __('Type Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$mtype->name}}" id="name" name="name" placeholder="Enter Type Name">
                 </div>
              </div>
                  </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="status">{{ __('Type Status') }}</label>
                            </div>
                            <div class="col-md-8">
                                <label for="radioPrimary1">
                                    <input type="radio" class="flat-red" value="1" {{ $mtype->status == '1' ? 'checked' : '' }} id="radioPrimary1" name="status"> Active
                                </label>
                                <label for="radioPrimary2">
                                    <input type="radio" class="flat-red" value="0" {{ $mtype->status == '0' ? 'checked' : '' }} id="radioPrimary2" name="status"> Inactive
                                </label>

                            </div>
                        </div>
                    </div>

                  </div>

                <div class="box-footer">
                  <div class="col-md-offset-3">
                  <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                  <button type="reset" class="btn btn-warning">{{ __('Reset') }}</button>
               </div>
               </div>
              </form>
            </div>

    </section>
 @endsection