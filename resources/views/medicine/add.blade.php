@extends('master')

@section('content')
    <!-- Main content -->
    <section class="content">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h2 class="box-title">Add Medicine</h2>
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
              <form role="form" action="{{route('medicine.store')}}" method="POST" enctype="multipart/form-data">
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
                    <input type="text" class="form-control" value="{{old('barcode')}}" id="barcode" name="barcode" placeholder="Enter Barcode or QRcode">
                 </div>
              </div>
                  </div>
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="product_name">{{ __('Medicine Name *') }}</label>
                 </div>
                 <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('product_name')}}" id="product_name" name="product_name" placeholder="Enter Medicine Name">
                 </div>
              </div>
                  </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="box_size">{{ __('Box Size *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{old('box_size')}}" id="box_size" name="box_size" placeholder="Enter Box Size">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="shelf">{{ __('Medicine Shelf') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{old('shelf')}}" id="shelf" name="shelf" placeholder="Enter Medicine Shelf">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cat_id">{{ __('Medicine Category') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="cat_id" value="{{old('cat_id')}}" style="width: 100%;">
                                        <option>Select Medicine Category</option>
                                        @foreach($medicine_cat as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
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
                                    <select class="form-control select2" name="manufacturer_id" value="{{old('manufacturer_id')}}" style="width: 100%;">
                                        <option>Select Manufacturer</option>
                                        @foreach($manufacturer_id as $manu_id)
                                            <option value="{{$manu_id->id}}">{{$manu_id->manufacturer_name}}</option>
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
                                    <input type="number" class="form-control" value="{{old('sell_price')}}" id="sell_price" name="sell_price" placeholder="Enter Sell Price">
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
                                        <input type="number" value="{{old('vat')}}" name="vat" class="form-control" placeholder="Enter Vat">
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
                                    <input type="number" class="form-control" value="{{old('manufacturer_price')}}" id="manufacturer_price" name="manufacturer_price" placeholder="Enter Manufacturer Price">
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
                     <select class="form-control select2" name="type_id" value="{{old('type_id')}}" style="width: 100%;">
                         <option>Select Medicine Type</option>
                         @foreach($medicine_type as $type)
                             <option value="{{$type->id}}">{{$type->name}}</option>
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
                                    <input type="text" class="form-control" value="{{old('generic_name')}}" id="generic_name" name="generic_name" placeholder="Enter Generic Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="unit_id">{{ __('Unit *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="form-control select2" name="unit_id" value="{{old('unit_id')}}" style="width: 100%;">
                                        <option>Select Unit</option>
                                        @foreach($medicine_unit as $unit)
                                            <option value="{{$unit->id}}">{{$unit->name}}</option>
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
                    <textarea class="form-control" rows="3" name="details" placeholder="Enter Details">{{old('details')}}</textarea>
                 </div>
                 </div>
                  </div>
                        <div class="form-group">
                     <div class="row">
                     <div class="col-md-4">
                    <label for="images">{{ __('Images') }}</label>
                 </div>
                 <div class="col-md-8">
                     <div class="input-group">
                         <div class="custom-file">
                             <input type="file" value="{{old('images')}}" name="images" class="custom-file-input" id="images">
                             <p class="help-block">Choose Medicine Images</p>
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
                                        <input type="number" name="tax" value="{{old('tax')}}" class="form-control" placeholder="Enter Tax">
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
                         <input type="number" value="{{old('igst')}}" name="igst" class="form-control" placeholder="Enter IGST">
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