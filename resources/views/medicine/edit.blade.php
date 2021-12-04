@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="box-title">Edit Medicine</h2>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('medicine.update',[$medic->id])}}" method="POST" enctype="multipart/form-data">
                  @csrf
                <div class="box-body">
                    <div class="row">
                    <div class="col-md-6">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="barcode">{{ __('Barcode or QRcode') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$medic->barcode}}" id="barcode" name="barcode" placeholder="Enter Barcode or QRcode">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="product_name">{{ __('Medicine Name *') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="text" class="form-control" value="{{$medic->product_name}}" id="product_name" name="product_name" placeholder="Enter Medicine Name">
                 </div>
              </div>
                  </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="box_size">{{ __('Box Size *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{$medic->box_size}}" id="box_size" name="box_size" placeholder="Enter Box Size">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="shelf">{{ __('Medicine Shelf') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$medic->shelf}}" id="shelf" name="shelf" placeholder="Enter Medicine Shelf">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cat_id">{{ __('Medicine Category') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="cat_id" style="width: 100%;">
                                        <option>Select Medicine Category</option>
                                        @foreach($medicine_cat as $category)
                                        <option value="{{$category->id}}" {{$medic->cat_id == $category->id ? "selected" : "" }}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="manufacturer_id">{{ __('Manufacturer *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="manufacturer_id" style="width: 100%;">
                                        <option>Select Manufacturer</option>
                                        @foreach($manufacturer_id as $manu_id)
                                            <option value="{{$manu_id->id}}" {{$medic->manufacturer_id == $manu_id->id ? "selected" : "" }}>{{$manu_id->manufacturer_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sell_price">{{ __('Sell Price *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{$medic->sell_price}}" id="sell_price" name="sell_price" placeholder="Enter Sell Price">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="vat">{{ __('Vat') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <input type="number" value="{{$medic->vat}}" name="vat" class="form-control" placeholder="Enter Vat">
                                        <div class="input-group-addon">
                                            <i class="fa fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="manufacturer_price">{{ __('Manufacturer Price *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{$medic->manufacturer_price}}" id="manufacturer_price" name="manufacturer_price" placeholder="Enter Manufacturer Price">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="type_id">{{ __('Medicine Type *') }}</label>
                 </div>
                 <div class="col-md-8">
                     <select class="form-control select2" name="type_id" style="width: 100%;">
                         <option>Select Medicine Type</option>
                         @foreach($medicine_type as $type)
                             <option value="{{$type->id}}" {{$medic->type_id == $type->id ? "selected" : "" }}>{{$type->name}}</option>
                         @endforeach
                     </select>
                 </div>
              </div>
                  </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="generic_name">{{ __('Generic Name *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$medic->generic_name}}" id="generic_name" name="generic_name" placeholder="Enter Generic Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="unit_id">{{ __('Unit *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="unit_id" style="width: 100%;">
                                        <option>Select Unit</option>
                                        @foreach($medicine_unit as $unit)
                                            <option value="{{$unit->id}}" {{$medic->unit_id == $unit->id ? "selected" : "" }}>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="details">{{ __('Details') }}</label>
                 </div>
                 <div class="col-md-8">
                    <textarea class="form-control" rows="3" name="details" placeholder="Enter Details">{{$medic->details}}</textarea>
                 </div>
                 </div>
                  </div>
                        <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="images">{{ __('Images') }}</label>
                 </div>
                 <div class="col-md-8">
                     @if ("{{ $medic->images }}")
                         <img src="{{ asset('uploads/medicine/'.$medic->images) }}" width="50">
                     @else
                         <p>No image found</p>
                     @endif
                     <div class="input-group">
                         <div class="custom-file">
                             <input type="file"  value="{{$medic->images}}" name="images" class="custom-file-input" id="images">
                             <p class="help-block">Change Medicine Images</p>
                         </div>
                    <!--     <div class="input-group-append">
                             <span class="input-group-text" id="">Upload</span>
                         </div>-->
                     </div>
                 </div>
                 </div>
                  </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="tax">{{ __('Tax') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group mb-3">
                                        <input type="number" name="tax" value="{{$medic->tax}}" class="form-control" placeholder="Enter Tax">
                                        <div class="input-group-addon">
                                            <i class="fa fa-percent"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="igst">{{ __('Igst') }}</label>
                 </div>
                 <div class="col-md-8">
                     <div class="input-group mb-3">
                         <input type="number" value="{{$medic->igst}}" name="igst" class="form-control" placeholder="Enter IGST">
                         <div class="input-group-addon">
                             <i class="fa fa-percent"></i>
                         </div>
                     </div>
                 </div>
              </div>
                  </div>

                    </div>
                </div>
                  </div>

                <div class="box-footer">
                  <div class="col-md-offset-4">
                  <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                      <input class="btn btn-warning" type="reset" value="{{ __('Reset') }}">
               </div>
               </div>
              </form>
            </div>
            <!-- /.card -->
    </section>
 @endsection