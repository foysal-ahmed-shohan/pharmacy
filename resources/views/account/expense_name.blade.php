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
              <form role="form" action="{{route('account.store')}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="name">{{ __('Expense Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('exp_name')}}" id="exp_name" name="exp_name" placeholder="Enter Expense Name">
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

          <div class="box">
              <div class="box-header">
                  <h3 class="box-title">All Expense Category List</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>SL.</th>
                          <th>Name</th>
                       
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($exp_name as $exp)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{$exp->exp_name}}</td>
                              <td>                             
                                   <form id="delete-form-{{ $exp->id }}" action="{{ route('account.destroy',$exp->id) }}" style="display: none;" method="POST">
                           {{csrf_field()}}company
                           {{ method_field('DELETE') }}
                       </form>
                       <button type="button" class="btn btn-danger" title="Delete" onclick="if(confirm('Are you sure? You want to delete this?')){
                           event.preventDefault();
                           document.getElementById('delete-form-{{ $exp->id }}').submit();
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
                          <th>Name</th>
                         
                          <th>Action</th>
                      </tr>
                      </tfoot>
                  </table>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 @endsection