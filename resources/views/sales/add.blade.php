@extends('master')

@section('content')
    <!-- Main content -->
    <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <section class="content">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Add Sales</h3>
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
                <form role="form" action="{{route('sales.store')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="customer_id">{{ __('Customer Name *') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control select2" id="customer_id" name="customer_id" value="{{old('customer_id')}}" style="width: 100%;">
                                                <option>Select Customer</option>
                                                @foreach($customer_id as $cus_id)
                                                    <option value="{{$cus_id->id}}">{{$cus_id->customer_name}}</option>
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
                                            <input type="text" class="form-control" value="{{$invoice}}" id="invoice_no" name="invoice_no" placeholder="Enter Invoice No" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="payment_type">{{ __('Payment Type *') }}</label>
                                        </div>
                                        <div class="col-md-8">
                                            <select class="form-control select2" onchange="bank_paymet(this.value)" name="payment_type" id="payment_type" value="{{old('payment_type')}}" style="width: 100%;">
                                                <option>Select Payment Type</option>
                                                <option value="0">Cash Payment</option>
                                                <option value="1">Credit/Debit Card</option>
                                                <option value="2">bKash/Rocket Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="sale_date">{{ __('Date *') }}</label>
                                        </div>
                                        <div class="col-md-8">

                                                <div class="input-group date">
                                                    <input type="text" name="sale_date" id="sale_date" value="{{old('sale_date')}}" class="form-control pull-right datepicker" id="datepicker">
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
                                            <textarea class="form-control" rows="1" name="details" placeholder="Enter Details">{{old('details')}}</textarea>
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
                                                <option>Select Bank</option>
                                                @foreach($bank_id as $bk_id)
                                                    <option value="{{$bk_id->id}}">{{$bk_id->bank_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="display: none;" id="BKASH">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="bank_id">{{ __(' bKash/Rocket Number') }}</label>
                                        </div>
                                        <div class="col-md-8">

                                        <td>
                                        <input type="tel" class="form-control" id="bkash" name="bkash" value="{{old('bank')}}" pattern="[0-9]{11}" >
                                        </td>

                                           <!--  <select class="form-control select2" id="bkash_id" name="bkash_id" value="{{old('bank_id')}}" style="width: 100%;">
                                                <option>Select Bank</option>
                                                @foreach($bank_id as $bk_id)
                                                    <option value="{{$bk_id->id}}">{{$bk_id->bank_name}}</option>
                                                @endforeach
                                            </select> -->
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <table class="table table-bordered" id="tbl_posts">
                            <thead>
                            <tr>
                                <th style="width: 15%;">Medicine Name *</th>
                                <th style="width: 10%;">Batch ID *</th>
                                <th>Ava.Qnt</th>
                                <th>Expired Date</th>
                                <th>Unit</th>
                                <th>Qty *</th>
                                <th>Price *</th>
                                <th>Discount %</th>
                                <th>Total</th>
                                <th style="text-align: center;"><a href="#" class="addRow btn btn-success"><i class="fa fa-plus"></i> </a></th>
                            </tr>
                            </thead>
                            <tbody id="sale_table">
                            <tr>
                                <td>
                                    <select class="form-control select2 medicine_id" id="medicine_id" name="medicine_id[]" style="width: 100%;">
                                        <option>Select Medicine</option>
                                        @foreach($medicine_id as $mdc_id)
                                            <option value="{{$mdc_id->id}}">{{$mdc_id->product_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <select class="form-control select2 batch_id" id="batch_id" name="batch_id[]"  style="width: 100%;">

                                    </select>
                                </td>
                                <td>
                                    <input type="text" class="form-control text-right available_qty" id="available_qty" name="available_qty[]" placeholder="0.00" readonly>
                                </td>
                                <td>
                                    <input type="text" class="form-control text-right expired_date" id="expired_date" name="expired_date[]" placeholder="dd/mm/yyyy" readonly>
                                </td>
                                <td>
                                    
                                    <input type="text" class="form-control text-right unit_id" id="unit_id" name="unit_id[]" placeholder="None" readonly>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-right quantity" id="quantity" name="quantity[]" placeholder="0.00">
                                </td>
                                <td>
                                    <input type="number" class="form-control text-right price" id="price" name="price[]" placeholder="0.00" readonly>
                                </td>
                                <td>
                                    <input type="number" class="form-control text-right discount" id="discount" name="discount[]" placeholder="0.00">
                                    <input type="hidden" class="form-control text-right dvalue">
                                    <input type="hidden" class="form-control text-right svat">
                                    <input type="hidden" class="form-control text-right stax">
                                    <input type="hidden" class="form-control text-right sigst">
                                    <input type="hidden" class="form-control text-right tvat">
                                    <input type="hidden" class="form-control text-right ttax">
                                    <input type="hidden" class="form-control text-right tigst">
                                </td>
                                <td>
                                    <input type="number" class="form-control text-right total_amount" id="total_amount" name="total_amount[]" placeholder="0.00" readonly>
                                </td>
                                <td style="text-align: center;"><a href="#" class="remove btn btn-danger"><i class="fa fa-close"></i></a></td>
                            </tr>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="8" class="text-right">Sub Total:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right sub_total" id="sub_total" name="sub_total" placeholder="0.00" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Invoice Discount:</th>
                                <th class="text-right">
                                    <input type="hidden" class="form-control text-right sub_discount">
                                    <input type="text" class="form-control text-right invoice_discount" id="invoice_discount" name="invoice_discount" placeholder="0.00">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Total Discount:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right total_discount" value="{{old('total_discount')}}" id="total_discount" name="total_discount" placeholder="0.00" readonly>
                                </th>
                            </tr>
                           
                          
                       <div id="myDIV"  >
                            <tr>
                                <th colspan="8" class="text-right">Vat:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right vat" value="{{old('vat')}}" id="vat" name="vat" placeholder="0.00" readonly>
                                </th>
                               
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Tax:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right tax" value="{{old('tax')}}" id="tax" name="tax" placeholder="0.00" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Igst:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right igst" value="{{old('igst')}}" id="igst" name="igst" placeholder="0.00" readonly>
                                </th>
                            </tr>

                        </div>
                            <tr>
                                <th colspan="8" class="text-right">Total Tax:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right total_tax" value="{{old('total_tax')}}" id="total_tax" name="total_tax" placeholder="0.00" readonly>
                                </th> 

                            <!-- <th>
                                <button class="btn btn-primary" type="button" onclick="myFunction()">+</button>
                               
                               
                            </th> -->

                            </tr>
                         

                            <tr>
                                <th colspan="8" class="text-right">Grand Total:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right grand_total" value="{{old('grand_total')}}" id="grand_total" name="grand_total" placeholder="0.00" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Paid Amount:</th>
                                <th class="text-right">
                                    <input type="number" class="form-control text-right paid_amount" value="{{old('paid_amount')}}" id="paid_amount" name="paid_amount" placeholder="0.00">
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Due:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right due_amount" id="due_amount" name="due_amount" value="" placeholder="0.00" readonly>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="8" class="text-right">Change:</th>
                                <th class="text-right">
                                    <input type="text" class="form-control text-right change_amount" id="change_amount" name="change_amount" placeholder="0.00" readonly>
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

  <script>
                                  
    function myFunction() {
      var x = document.getElementById("myDIV");
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
 </script>


    <script type="text/javascript">
        $('.addRow').on('click',function(){
            addRow();
        });
        function addRow() {
          var tr =  '<tr>'+
                        '<td>'+
                        '<select class="form-control select2 medicine_id" id="medicine_id" name="medicine_id[]" style="width: 100%;">'+
                        '<option>Select Medicine</option>'+
                        '@foreach($medicine_id as $mdc_id)'+
                        '<option value="{{$mdc_id->id}}">{{$mdc_id->product_name}}</option>'+
                        '@endforeach'+
                        '</select>'+
                        '</td>'+
                        '<td>'+
                        '<select class="form-control select2 batch_id" id="batch_id" name="batch_id[]" value="{{old('batch_id')}}" style="width: 100%;">'+

                        '</select>'+
                        '</td>'+
                        '<td><input type="text" class="form-control text-right available_qty" id="available_qty" name="available_qty[]" placeholder="0.00" readonly></td>'+
                        '<td><input type="text" class="form-control text-right expired_date" id="expired_date" name="expired_date[]" placeholder="dd/mm/yyyy" readonly></td>'+
                        '<td><input type="text" class="form-control text-right unit_id" id="unit_id" name="unit_id[]" placeholder="None" readonly></td>'+
                        '<td><input type="number" class="form-control text-right quantity" id="quantity" name="quantity[]" placeholder="0.00"></td>'+
                        '<td><input type="number" class="form-control text-right price" id="price" name="price[]" placeholder="0.00" readonly></td>'+
                        '<td><input type="number" class="form-control text-right discount" id="discount" name="discount[]" placeholder="0.00"><input type="hidden" class="form-control text-right dvalue"><input type="hidden" class="form-control text-right svat"><input type="hidden" class="form-control text-right stax"><input type="hidden" class="form-control text-right sigst"><input type="hidden" class="form-control text-right tvat"><input type="hidden" class="form-control text-right ttax"><input type="hidden" class="form-control text-right tigst"></td>'+
                        '<td><input type="number" class="form-control text-right total_amount" id="total_amount" name="total_amount[]" placeholder="0.00" readonly></td>'+
                        '<td style="text-align: center;"><a href="#" class="btn btn-danger remove"><i class="fa fa-close"></i></a></td>'+
                        '</tr>';
                        $('tbody').append(tr);
        };
        $('tbody').on('click','.remove',function() {
            var l = $('tbody tr').length;
            if(l==1) {
                alert('You can not remove last one');
            }else {
                $(this).parent().parent().remove();
            }
        });
    </script>



    <script type="text/javascript">
        function bank_paymet(val){
            {
            if(val==2){
                var style = 'block';
                document.getElementById('bkash').setAttribute("required", true);
            }

            else{
                var style ='none';
                document.getElementById('bkash').removeAttribute("required");
            }

            document.getElementById('BKASH').style.display = style;
        }

         if(val==1){
                var style = 'block';
                document.getElementById('bank_id').setAttribute("required", true);
            }

            else{
                var style ='none';
                document.getElementById('bank_id').removeAttribute("required");
            }

            document.getElementById('bankID').style.display = style;
    }

    </script>








    <script>
        $('tbody').delegate('.quantity, .price, .discount, .total_amount','keyup', function(){
            var tr = $(this).parent().parent();
            var quantity = tr.find('.quantity').val();
            var price = tr.find('.price').val();
            var discount = tr.find('.discount').val();
            var dvalue = (price/100 * discount * quantity);
            var total_amount = (quantity * price - dvalue);
            tr.find('.total_amount').val(total_amount);
            tr.find('.dvalue').val(dvalue);
            var svat = tr.find('.svat').val();
            var stax = tr.find('.stax').val();
            var sigst = tr.find('.sigst').val();
            var tvat = (price/100 * svat * quantity);
            var ttax = (price/100 * stax * quantity);
            var tigst = (price/100 * sigst * quantity);
            tr.find('.tvat').val(tvat);
            tr.find('.ttax').val(ttax);
            tr.find('.tigst').val(tigst);
            subtotal();
            tdiscount();
            total_vat_tax();
        });
        function subtotal () {
            var subtotal = 0;
            $('.total_amount').each(function (i,e) {
                var total_p = $(this).val()-0;
                subtotal += total_p;
            });
            $('.sub_total').val(subtotal);
        }
        function tdiscount () {
            var tdiscount = 0;
            $('.dvalue').each(function (i,e) {
                var dtvalue = $(this).val()-0;
                tdiscount += dtvalue;
            });
            $('.sub_discount').val(tdiscount);
            $('.total_discount').val(tdiscount);
        }
        function total_vat_tax () {
            var tovat = 0;
            $('.tvat').each(function (i,e) {
                var tvats = $(this).val()-0;
                tovat += tvats;
            });
            $('.vat').val(tovat);
            var totax = 0;
            $('.ttax').each(function (i,e) {
                var ttaxs = $(this).val()-0;
                totax += ttaxs;
            });
            $('.tax').val(totax);

            var toigst = 0;
            $('.tigst').each(function (i,e) {
                var tigsts = $(this).val()-0;
                toigst += tigsts;
            });
            $('.igst').val(toigst);
            var total_tax = +tovat + +totax + +toigst;

            $('.total_tax').val(total_tax);

            var stotal = $('.sub_total').val();
            var indiscount = $('.invoice_discount').val();
            if (indiscount) {
                $('.invoice_discount').keyup(function () {
                    var indiscount = $(this).val();
                    var subtotal = stotal - indiscount;
                    var gtotal = +subtotal + +total_tax;
                    $('.grand_total').val(gtotal);
                });
            }else {
                var gtotal = +stotal + +total_tax;
                $('.grand_total').val(gtotal);
            }
            $('.paid_amount').keyup(function () {
                var paidamount = $('.paid_amount').val();
                var gttal = $('.grand_total').val();
                var dueamount = gttal - paidamount;
                var changeamount = paidamount - gttal;
                if (gttal > paidamount ) {
                    $('.change_amount').empty();
                    $('.due_amount').val(dueamount);
                }

                else if(gttal == paidamount )
                {    
                    var dueamount=0;
                    $('.change_amount').empty();
                    $('.due_amount').val(dueamount);
                }
                else
                {
                    $('.due_amount').empty();
                    $('.change_amount').val(changeamount);
                }

            });
        }
        $('.invoice_discount').keyup(function () {
         //   var totaldis = 0;
            var invdis = $(this).val();
            var tdisc = $('.sub_discount').val();
            if (invdis) {
                $('#total_discount').empty();
                var totaldis = +tdisc + +invdis;
                $('.total_discount').val(totaldis);
            }else {
                $('.total_discount').val(tdisc);
            }

        });
        // Batch ID
        $('tbody').delegate('.medicine_id','change', function(){
            var tr = $(this).parent().parent();
            var medicineID = tr.find('.medicine_id').val();
     //       var dataID = {'medicine_id':medicine_id};
            if(medicineID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/batchID')}}?medicine_id[]="+medicineID,
                    success:function(res){
                        if(res){
                            tr.find(".batch_id").empty();
                            tr.find(".batch_id").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                tr.find(".batch_id").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            tr.find(".batch_id").empty();
                        }
                    }
                });
            }else{
                tr.find(".batch_id").empty();
            }
        });
        // Expired Date
        $('tbody').delegate('.batch_id','change', function(){
            var tr = $(this).parent().parent();
            var batch_id = tr.find('.batch_id').val();
            var dataID = {'batch_id':batch_id};
            $.ajax({
                type:"GET",
                url:"{{url('/expired')}}",
                dataType: 'json',
                data: dataID,
                success:function (data) {
                    tr.find('.expired_date').val(data.expired_date);
                }

            });
        });

// Unit & Sale Price
        $('tbody').delegate('.medicine_id','change', function(){
            var tr = $(this).parent().parent();
            var id = tr.find('.medicine_id').val();
            var dataID = {'id':id};
            $.ajax({
                type:"GET",
                url:"{{url('/unitPrice')}}",
                dataType: 'json',
                data: dataID,
                success:function (data) {
                    tr.find('.price').val(data.sell_price);
                    tr.find('.unit_id').val(data.unit_id);
                    tr.find('.svat').val(data.vat);
                    tr.find('.stax').val(data.tax);
                    tr.find('.sigst').val(data.igst);

                }

            });

        });

    </script>






    <script>
        var today = new Date();

        var dd = today.getDate();
        var mm = today.getMonth()+1; //January is 0!
        var yyyy = today.getFullYear();

        if(dd<10) {
            dd = '0'+dd
        }

        if(mm<10) {
            mm = '0'+mm
        }

        // today = yyyy + '/' + mm + '/' + dd;
        today = dd + '/' + mm + '/' + yyyy;

        //    console.log(today);
        document.getElementById('sale_date').value = today;
    </script>
@endsection