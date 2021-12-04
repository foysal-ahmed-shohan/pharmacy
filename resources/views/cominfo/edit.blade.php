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
               <form role="form" action="{{route('company.update',[$company->id])}}" method="post" enctype="multipart/form-data" >
                  {{csrf_field()}}
                  @method('put')
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_name">{{ __('Company Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$company->cname}}" id="cname" name="cname" placeholder="Enter Company Name">
                 </div>
              </div>
                  </div>
                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_name">{{ __('Company Tag Line *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$company->tag}}" id="tag" name="tag" placeholder="Enter Company Tag Line">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_phone">{{ __('phone *') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{$company->phone}}" id="phone" name="phone" placeholder="Enter Company 1st Mobile Number" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_phone">{{ __('Company Mobile 2nd ') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="tel" class="form-control" value="{{$company->phone2}}" id="phone2" name="phone2" placeholder="Company 2nd Mobile Number" pattern="[0-9]{11}">
                 </div>
              </div>
                  </div>
                   <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_address">{{ __('Company Email 1st *') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="text" class="form-control" id="sel1" value="{{$company->email1}}" placeholder="Enter 1st email" id="email1" name="email1">
                 </div>
              </div>
                  </div>
                    <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_address">{{ __('Company Email 2nd') }}</label>
                 </div>
                 <div class="col-md-8">
                     <input type="text" class="form-control" id="email2" value="{{$company->email2}}" placeholder="Enter 2nd email" name="email2">
                 </div>
                 </div>
              </div>
                  
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="sup_address">{{ __('Company Address') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control"  rows="3" placeholder="Company Address" value="{{$company->address}}" name="address">{{$company->address}}</textarea>
                 </div>
              </div>
                  </div>
                 <!--    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="sup_details">{{ __('Logo') }}</label>
                            </div>
                            <div class="col-md-2">
                                            @if ("{{ $company->logo }}")
                                                <img src="{{ asset('uploads/bank/'.$company->logo) }}" width="70">
                                            @else
                                                <p>No image found</p>
                                            @endif
                                        </div>
                        </div>
                    </div> -->
                      <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="logo">{{ __('Signature') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if ("{{ $company->logo }}")
                                                <img src="{{ asset('uploads/company/'.$company->logo) }}" width="50">
                                            @else
                                                <p>No image found</p>
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" value="{{$company->logo}}" name="logo" class="custom-file-input" id="logo">
                                                    <p class="help-block">Change Bank Signature as Images</p>
                                                </div>
                                                <!--     <div class="input-group-append">
                                                         <span class="input-group-text" id="">Upload</span>
                                                     </div>-->
                                            </div>
                                        </div>
                                    </div>


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