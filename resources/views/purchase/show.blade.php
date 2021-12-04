@extends('master')

@section('content')




<div class="container" style="width: 90%" >
    <div class="print1" id="foysal">
    <div class="row">
        <div class="col-xs-12">
    		<div class="content-dir-item" style="margin-right: 25px;">
    			<td><br><img src="{{ asset('uploads/company/'.$company->logo) }}"" width="100" style="margin-bottom: -160px; margin-left: 90%"></td>
    			<h3>{{$company->cname}}</h3>
                 <p>{{$company->address}}</p>
                 <p>{{$company->phone}}, {{$company->phone2}}</p>
                 <p>{{$company->email1}}, {{$company->email2}}</p>
                 
    			<h3 class="pull-right">Order Information:</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To(Manufacturer):</strong><br>
    				Name: {{$purchase->manufacturer->manufacturer_name}}<br>
                       Address: {{$purchase->manufacturer->manufacturer_address}}<br>
                        Mobile: {{$purchase->manufacturer->manufacturer_mobile}}<br>
                       Details: {{$purchase->manufacturer->manufacturer_details}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Invoice Id: </strong>
    					{{$purchase->invoice_no}}<br>
    					<strong>Date: </strong>
    					{{$purchase->created_at}}<br>
    				
    				</address>
    			</div>
               
    		</div>
    	<!-- 	<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Payment Method:</strong><br>
    					Visa ending **** 4242<br>
    					jsmith@email.com
    				</address>
    			</div>
    			
    		</div> -->
    	</div>
    </div>

    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table  class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Item</strong></td>
        							<td class="text-center"><strong>Medicine Name</strong></td>
                                    <td class="text-center"><strong>Box Size</strong></td>
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							
        							
        							
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							
                                @foreach($purchaseinfo as $purchaseinfo)
    							<tr>
    								<td>{{ $no++ }}</td>

    								<td class="text-center">{{ $purchaseinfo->medicine['product_name'] }}</td>

                                    <td class="text-center">{{ $purchaseinfo->medicine['box_size'] }}</td>
                                     
    								<td class="text-center">{{ $purchaseinfo->quantity}}</td>
    								<td class="text-center">{{ $purchaseinfo->rate}}</td>
    								<td class="text-right">{{ $purchaseinfo->total_price}}</td>
    							</tr>
                               
                               @endforeach
                 
                                
    							<tr>
    								
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="thick-line text-center"></td>
    								<td class="thick-line text-right"></td>
    							</tr>
    							
                               
    							<tr>
    								
    								<td class="no-line"></td>
    							    <td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">{{$purchase->grand_total}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    </div>


    <div class="box-header">

                  <a onclick="printContent('foysal');" class="btn btn-danger pull-left">Print</a>
                  
                  <a onclick="CreatePDFfromHTML('foysal');" id="cmd"  class="btn btn-primary pull-left">PDF</a>
             
                  <a href=""  class="btn btn-primary pull-left">Back To Invoice</a>
               </div>
    </div>

 @endsection

