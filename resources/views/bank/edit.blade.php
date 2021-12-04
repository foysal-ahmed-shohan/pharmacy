@extends('master')


@section('content')
    <!-- Main content -->
    <section class="content">
            <!-- left column -->

            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h2 class="box-title">Edit Bank</h2>
                </div>
                <!-- /.card-header -->

            <!-- form start -->
                <form role="form" action="{{route('bank.update',[$bank->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="box-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="bank_name">{{ __('Bank Name *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$bank->bank_name}}" id="bank_name" name="bank_name" placeholder="Enter Bank Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ac_name">{{ __('Account Name *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$bank->ac_name}}" id="ac_name" name="ac_name" placeholder="Enter Account Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="ac_no">{{ __('Account Number *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$bank->ac_no}}" id="ac_no" name="ac_no" placeholder="Enter Account Number">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="branch_name">{{ __('Branch *') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" value="{{$bank->branch_name}}" id="branch_name" name="branch_name" placeholder="Enter Branch">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="bank_sing">{{ __('Signature') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            @if ("{{ $bank->bank_sing }}")
                                                <img src="{{ asset('uploads/bank/'.$bank->bank_sing) }}" width="50">
                                            @else
                                                <p>No image found</p>
                                            @endif
                                        </div>
                                        <div class="col-md-10">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" value="{{$bank->bank_sing}}" name="bank_sing" class="custom-file-input" id="bank_sing">
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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="balance">{{ __('Opening Balance') }}</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" value="{{$bank->balance}}" id="balance" name="balance" placeholder="Enter Opening Balance">
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