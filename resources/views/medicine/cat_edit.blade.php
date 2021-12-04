@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="box-title">Edit Medicine Category</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('medicine.cat_update',[$mcat->id])}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="name">{{ __('Category Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$mcat->name}}" id="name" name="name" placeholder="Enter Category Name">
                 </div>
              </div>
                  </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="status">{{ __('Category Status') }}</label>
                            </div>
                            <div class="col-md-8">
                                    <label for="radioPrimary1">
                                        <input type="radio" class="flat-red" value="1" {{ $mcat->status == '1' ? 'checked' : '' }} id="radioPrimary1" name="status"> Active
                                    </label>
                                    <label for="radioPrimary2">
                                        <input type="radio" class="flat-red" value="0" {{ $mcat->status == '0' ? 'checked' : '' }} id="radioPrimary2" name="status"> Inactive
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