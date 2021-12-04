@extends('master')

@section('content')
    <!-- Main content -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <section class="content">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Add Purchase</h3>
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
                <form role="form" action="{{route('purchase.store')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="manufacturer_id">{{ __('Manufacturer *') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control select2" id="manufacturer_ajax" name="manufacturer_id" value="{{old('manufacturer_id')}}" style="width: 100%;">
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
                                            <label for="invoice_no">{{ __('Invoice No *') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" class="form-control" value="{{old('invoice_no')}}" id="invoice_no" name="invoice_no" placeholder="Enter Invoice No">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="payment_type">{{ __('Payment Type *') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control select2" onchange="bank_paymet(this.value)" name="payment_type" id="payment_type" value="{{old('payment_type')}}" style="width: 100%;" onclick='test()'>
                                                <option>Select Payment Type</option>
                                                <option value="0">Cash Payment</option>
                                                <option value="1">Bank Payment</option>
                                                <option value="2">Due Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="purchase_date">{{ __('Purchase Date *') }}</label>
                                        </div>
                                        <div class="col-md-8">

                                                <div class="input-group date">
                                                    <input type="text" class="form-control pull-right datepicker" id="datepicker">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>

                                                </div>

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
                                <div class="form-group" style="display: none;" id="bankID">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="bank_id">{{ __('Bank *') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control select2" id="bank_id" name="bank_id" value="{{old('bank_id')}}" style="width: 100%;">
                                                <option>Select Payment Type</option>
                                                <option value="0">Cash Payment</option>
                                                <option value="1">Bank Payment</option>
                                                <option value="2">Due Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <table class="table table-bordered" id="tbl_posts">
                            <thead>
                            <tr>
                                <th style="width: 20%;">Medicine Name *</th>
                                <th>Batch ID *</th>
                                <th>Expired Date *</th>
                                <th>Stock/Qnt</th>
                                <th>Quantity *</th>
                                <th>Purchase Price *</th>
                                <th>Total</th>
                                <th><button type="button" id="add_row" class="btn btn-success btn-sm">Add Row</button></th>
                            </tr>
                            </thead>
                            <tbody id="tbl_posts_body">

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="2">

                                        <a class="btn btn-primary pull-right add-record" data-added="0">Add Row</a>

                                </th>

                                <th colspan="4" class="text-right">Grand Total:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right" value="{{old('invoice_no')}}" id="invoice_no" name="invoice_no" placeholder="0.00">
                                </th>
                            </tr>
                            </tfoot>
                        </table>




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
    <script type="text/javascript">
        function bank_paymet(val){
            if(val==1){
                var style = 'block';
                document.getElementById('bank_id').setAttribute("required", true);
            }else{
                var style ='none';
                document.getElementById('bank_id').removeAttribute("required");
            }

            document.getElementById('bankID').style.display = style;
        }

    </script>
    <script type="text/javascript">
        $('#manufacturer_ajax').change(function(){
            var manufacturerID = $(this).val();
            if(manufacturerID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/addajax')}}?manufacturer_id[]="+manufacturerID,
                    success:function(res){
                        if(res){
                            $(".medicine_ajax").empty();
                            $(".medicine_ajax").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                $(".medicine_ajax").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $(".medicine_ajax").empty();
                        }
                    }
                });
            }else{
                $(".medicine_ajax").empty();
            }
        });
        $('#medicine_ajax').change(function(){
            var medicineID = $(this).val();
            if(medicineID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/addPrice')}}?rate[]="+medicineID,
                    success:function(res){
                        if(res){

                            $(".rate_ajax").empty();
                            $('.rate_ajax').val(manufaturer_price);

                        }else{
                            $(".medicine_ajax").empty();
                        }
                    }
                });
            }else{
                $(".medicine_ajax").empty();
            }
        });

    </script>
    <script>
        $(document).ready(function(){

            var count = 1;

            dynamic_field(count);

            function dynamic_field(number)
            {
                html = '<tr>';
                html += '<td><select class="form-control select2 medicine_ajax"  id="medicine_ajax" name="medicine_id[]" style="width:100%;"></td>';
                html += '<td><input type="text" class="form-control" id="batch_id" name="batch_id[]" placeholder="Batch ID"></td>';
                html += '<td><input type="text" name="expired_date[]" class="form-control pull-right datepicker" placeholder="dd/mm/yyyy"></td>';
                html += '<td><input type="text" class="form-control text-right" id="stock_id" name="stock_id[]" placeholder="0.00"></td>';
                html += '<td><input type="text" class="form-control text-right" value="1" id="quantity" name="quantity[]" placeholder="0.00"></td>';
                html += '<td><input type="text" class="form-control text-right rate_ajax" id="rate" name="rate[]" placeholder="0.00"></td>';
                html += '<td><input type="text" class="form-control text-right" id="total_price" name="total_price[]" placeholder="0.00"></td>';
                if(number > 1)
                {
                    html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger remove">Remove</button></td></tr>';
                    $('tbody').append(html);
                }
                else
                {
                    html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
                    $('tbody').html(html);
                }
            }

            $(document).on('click', '#add', function(){
                count++;
                dynamic_field(count);
            });

            $(document).on('click', '.remove', function(){
                count--;
                $(this).closest("tr").remove();
            });

        });

    </script>

@endsection