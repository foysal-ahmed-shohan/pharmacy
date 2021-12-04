@extends('master')

@section('content')
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Bank List</h3>
                  <a href="{{url('/bank/add')}}" class="btn btn-primary pull-right">Add Bank</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Branch</th>
                        <th>signature</th>
                        <th>Balance</th>
                        <th>Action</th>
                     </tr>
                     </thead>
                     <tbody>
                     @foreach($bank as $bk)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$bk->bank_name}}</td>
                           <td>{{$bk->ac_name}}</td>
                           <td>{{$bk->ac_no}}</td>
                           <td>{{$bk->branch_name}}</td>
                           <td><img src="{{ asset('uploads/bank/'.$bk->bank_sing) }}" width="80"></td>
                           <td>{{$bk->balance}}</td>
                           <td>
                              <a href="{{route('bank.edit',[$bk->id])}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
                              <a href="{{route('bank.delete',[$bk->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a>
                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                        <th>SL.</th>
                        <th>Name</th>
                        <th>Account Name</th>
                        <th>Account Number</th>
                        <th>Branch</th>
                        <th>signature</th>
                        <th>Balance</th>
                        <th>Action</th>
                     </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
@endsection