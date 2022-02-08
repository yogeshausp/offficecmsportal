@extends('layout-admin.layout')

@section('content')

 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects Details Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Validation</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


     <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Please Fill <small>The Details Below</small></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
             @if (session('status'))
                <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
                </div>
                @elseif(session('failed'))
                <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
              {{ session('failed') }}
                </div>
              @endif
              <form id="quickForm" method="post" action="{{action('AdminController@insert_projects') }}">	
              	<input type="hidden" name="role" value="{{ auth()->user()->role }}" id="role">
              	<input type="hidden" name="email" value="{{ auth()->user()->email }}" id="email">
              	<input type="hidden" name="id" value="{{ auth()->user()->id }}" id="id">
              	<input type="hidden" name="name" value="{{ auth()->user()->name }}" id="name">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="project_name"> Project Name: </label>
                    <input type="text" name="project_name" class="form-control" id="project_name" placeholder="Enter project Name">
					@error('project_name')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  </div>
                  <div class="form-group">
                    <label for="project_details"> Project Details: </label>
                    <textarea class="form-control" id="project_details" name="project_details" rows="3"></textarea>
					@error('project_details')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                    
                  </div>

                   <div class="form-group">
                    <label for="project_slug"> Project Slug: </label>
                    <input type="text" name="project_slug" class="form-control" id="project_slug" placeholder="Enter brief slug">
					@error('project_slug')
						<div class="alert alert-danger">{{ $message }}</div>
					@enderror
                  </div>


                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">

          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
 @endsection