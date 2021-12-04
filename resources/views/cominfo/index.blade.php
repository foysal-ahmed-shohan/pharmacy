@extends('master')

@section('content')
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">All Supplier List</h3>
                  <a href="{{url('/company/create')}}" class="btn btn-primary pull-right">Add Information</a>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="baseIT" class="table table-bordered table-striped">
                     <thead>
                     <tr>
                        <th>SL.</th>
                        <th>Company Name</th>
                        <th>Tag</th>
                        <th>Mobile 1</th>
                        <th>Mobile 2</th>
                        <th>Email 1</th>
                        <th>Email 2</th>
                        <th>Address</th>
                        <th>Logo</th>
                        <th>Action</th>

                     </tr>
                     </thead>
                     <tbody>
                     @foreach($company as $comp)
                         <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{$comp->cname}}</td>
                           <td>{{$comp->tag}}</td>
                           <td>{{$comp->phone}}</td>
                           <td>{{$comp->phone2}}</td>
                           <td>{{$comp->email1}}</td>
                           <td>{{$comp->email2}}</td>
                           <td>{{$comp->address}}</td>
                           <td><img src="{{ asset('uploads/company/'.$comp->logo) }}" width="80"></td>
                           <td>
                              <a href="{{route('company.edit',[$comp->id])}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>

                             <!--  <a href="{{route('company.destroy',[$comp->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want toDestroy this data permanently?')"><i class="fa fa-trash-o"></i></button></a> -->

                              <form id="delete-form-{{ $comp->id }}" action="{{ route('company.destroy',$comp->id) }}" style="display: none;" method="POST">
                           {{csrf_field()}}company
                           {{ method_field('DELETE') }}
                       </form>
                       <button type="button" class="btn btn-danger" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                           event.preventDefault();
                           document.getElementById('delete-form-{{ $comp->id }}').submit();
                       }else {
                           event.preventDefault();
                               }"><i class="fa fa-trash-o"></i>
                       </button> 

                            

                           </td>
                        </tr>
                     @endforeach
                     </tbody>
                     <tfoot>
                     <tr>
                       <th>SL.</th>
                        <th>Company Name</th>
                        <th>Tag</th>
                        <th>Mobile 1</th>
                        <th>Mobile 2</th>
                        <th>Email 1</th>
                        <th>Email 2</th>
                        <th>Address</th>
                        <th>Logo</th>
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