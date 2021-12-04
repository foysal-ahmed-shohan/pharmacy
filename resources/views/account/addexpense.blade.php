@extends('master')


@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Add Expense Name</h3>
                 <a href="{{url('/explist')}}" class="btn btn-success pull-right">All Expense List</a>
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
              <form role="form" action="{{route('account.exp_create')}}" method="GET">
                  @csrf
                

                    <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="name">{{ __('Expense Name *') }}</label>
                    </div>
                  <div class="col-md-8">
                          <select class="form-control select2" id="manufacturer_ajax" name="exp_id" value="{{old('manufacturer_id')}}" style="width: 100%;">
                              <option>Select name</option>
                              @foreach($exp as $exp)
                                  <option value="{{$exp->id}}">{{$exp->exp_name}}
                                  </option>
                              @endforeach
                          </select>
                      </div>


                  </div>
                  </div>
                  </div>
                 

                   <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="name">{{ __('Amount *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('exp_name')}}" id="exp_name" name="amount" placeholder="Enter Amount ">
                 </div>
                  </div>
                  </div>
                  </div>

                  
                   <div class="box-body">
                                 <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="sale_date">{{ __('Date:') }}</label>
                                        </div>
                                        <div class="col-md-8">

                                                <div class="input-group date">
                                                    <input type="text" name="date" id="date" value="" class="form-control pull-right datepicker" id="datepicker">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
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

        <!--   <div class="box">
              <div class="box-header">
                  <h3 class="box-title">All Expense Category List</h3>
              </div>
             /.card-header -->
             <!--  <div class="box-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>SL.</th>
                          <th>Name</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>

                          <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td>                             
                                 
                       <button type="button" class="btn btn-danger" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                           event.preventDefault();
                           document.getElementById('').submit();
                       }else {
                           event.preventDefault();
                               }"><i class="fa fa-trash-o"></i>
                       </button> 
                              </td>
                          </tr>


                      </tbody>
                      <tfoot>
                      <tr>
                          <th>SL.</th>
                          <th>Name</th>
                          <th>Amount</th>
                          <th>Date</th>
                          <th>Action</th>
                      </tr>
                      </tfoot>
                  </table>
              </div>
             /.card-body -->
          <!-- </div>  -->
          <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>




  <script type="text/javascript">
        $('#manufacturer_ajax').change(function(){
            var manufacturerID = $(this).val();
            if(manufacturerID){
                $.ajax({
                    type:"GET",
                    url:"{{url('/addajax')}}?manufacturer_id[]="+manufacturerID,
                    success:function(res){
                        if(res){
                            $("#medicine_ajax1").empty();
                            $("#medicine_ajax1").append('<option>Select</option>');
                            $.each(res,function(key,value){
                                $("#medicine_ajax1").append('<option value="'+key+'">'+value+'</option>');
                            });

                        }else{
                            $("#medicine_ajax1").empty();
                        }
                    }
                });
            }else{
                $("#medicine_ajax1").empty();
            }
        });


    </script>


    @endsection