@extends('master')

@section('content')
<!--  <div class="container">

  

</div> -->


<!------ Include the above in your HEAD tag ---------->

<div class="container" style="width: 90%" >
    <div class="print1" id="foysal">
    <div class="row">
        <div class="col-xs-12">
    		<div class="content-dir-item" style="margin-right: 25px;">
    			<td><br><img src="{{ asset('uploads/company/'.$company->logo) }}" width="100" style="margin-bottom: -160px; margin-left: 90%"></td>
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
    				<strong>Billed To:</strong><br>
    					Name: {{$sales->customer->customer_name}}<br>
                       Address: {{$sales->customer->customer_address}}<br>
    					Mobile: {{$sales->customer->customer_phone}}<br>
                       Email: {{$sales->customer->customer_email}}<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Invoice Id: </strong>
    					{{$sales->invoice_no}}<br>
    					<strong>Date: </strong>
    					{{$sales->created_at}}<br>
    				<!-- 	{{$sales->id}} -->
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
        							<td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
        							
        							
        							
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							@foreach ($salesinfo as $salesinfo)
    							<tr>
    								<td>{{ $no++ }}</td>

    								<td class="text-center">{{ $salesinfo->medicine['product_name'] }}</td>
    								<td class="text-center">
                                        {{ $salesinfo->quantity }}</td>
    								<td class="text-center">{{ $salesinfo->price }}</td>
    								<td class="text-right">{{ $salesinfo->total_amount }}</td>
    							</tr>
                               @endforeach
                 
                                
    							<tr>
    								
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
    								<td class="thick-line text-right">{{$sales->sub_total}}</td>
    							</tr>
    							<tr>
    								
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Vat:</strong></td>
    								<td class="no-line text-right">{{$sales->total_tax}}</td>
    							</tr>
                                <tr>
                                   
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total Discount:</strong></td>
                                    <td class="no-line text-right">{{$sales->total_discount}}</td>
                                </tr>
    							<tr>
    								
    								<td class="no-line"></td>
    							    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total</strong></td>
    								<td class="no-line text-right">{{$sales->grand_total}}</td>
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
 
      <a href="{{url('/sales')}}"  class="btn btn-primary pull-left">Back To Invoice</a>
     </div>
    </div>

 @endsection

<!-- <script>
 function CreatePDFfromHTML(foysal) {
    var HTML_Width = $("#foysal").width();
    var HTML_Height = $(".container").height();
    var top_left_margin = 5;
    var PDF_Width = HTML_Width + (top_left_margin * 3);
    var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;

    var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

    html2canvas($("#foysal")[0]).then(function (canvas) {
        var imgData = canvas.toDataURL("image/jpeg", 1.0);
        var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
        pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
        for (var i = 1; i <= totalPDFPages; i++) { 
            pdf.addPage(PDF_Width, PDF_Height);
            pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height*i)+(top_left_margin*4),canvas_image_width,canvas_image_height);
        }
        pdf.save("Your_PDF_Name.pdf");
    
    });
}
</script> -->