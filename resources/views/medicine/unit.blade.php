@extends('master')


@section('content')
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
          <!-- left column -->
          
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header">
                <h3 class="box-title">Add Medicine Unit</h3>
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
              <form role="form" action="{{route('medicine.unit_store')}}" method="POST">
                  @csrf
                <div class="box-body">
                  <div class="form-group">
                     <div class="row">
                     <div class="col-md-3">
                    <label for="name">{{ __('Unit Name *') }}</label>
                 </div>
                    <div class="col-md-8">
                    <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="Enter Unit Name">
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
                  <h3 class="box-title">All Medicine Unit List</h3>
              </div>
              <!-- /.card-header -->
              <div class="box-body">
                  <table class="table table-bordered table-striped">
                      <thead>
                      <tr>
                          <th>SL.</th>
                          <th>Name</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      @foreach($medicineunit as $munit)
                          <tr>
                              <td>{{ $no++ }}</td>
                              <td>{{$munit->name}}</td>
                              <td>@if ($munit->status == '1') Active @else Inactive @endif</td>
                              <td>
                                  <a href="{{route('medicine.unit_edit',[$munit->id])}}"><button class="btn btn-warning"><i class="fa fa-pencil-square-o"></i></button></a>
                                  <a href="{{route('medicine.unit_delete',[$munit->id])}}"><button class="btn btn-danger" onClick="return confirm('Are you sure you want to Destroy this data permanently?')"><i class="fa fa-trash-0"></i></button></a>
                              </td>
                          </tr>
                      @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                          <th>SL.</th>
                          <th>Name</th>
                          <th>Status</th>
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