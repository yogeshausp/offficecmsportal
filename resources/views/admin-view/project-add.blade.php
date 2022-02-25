@extends('layout-admin.layout')

@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Project Add Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects</li>
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
                <h3 class="card-title">Please Fill The Details Below</h3>
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
              <form id="tasks_form" method="post" action="{{action('Admin\ProjectController@insert_project') }}">	
              	<input type="hidden" name="role" value="{{ auth()->user()->role }}" id="role">
              	<input type="hidden" name="email" value="{{ auth()->user()->email }}" id="email">
              	<input type="hidden" name="id" value="{{ auth()->user()->id }}" id="id">
              	<input type="hidden" name="name" value="{{ auth()->user()->name }}" id="name">
              	@csrf
                <div class="card-body">
				<div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="project_name">  Project Name:   </label>
                                <input type="text" name="project_name" class="form-control" id="project_name" placeholder="Enter project name">
                            @error('project_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="client_name">  Client Name:   </label>
                                <input type="text" name="client_name" class="form-control" id="client_name" placeholder="Enter client name">
                            @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="project_url">  Project Url:   </label>
                                <input type="text" name="project_url" class="form-control" id="project_url" placeholder="Enter project url">
                                                                                     
                                @error('project_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="platform">  Platform:   </label>
                                <input type="text" name="platform" class="form-control" id="platform" placeholder="Enter platform">
                            @error('platform')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="designer">  Designer:   </label>
                                <input type="text" name="designer" class="form-control" id="designer" placeholder="Assign designer">
                            @error('designer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-sm-4">
                            <label for="developer">  Developer:   </label>
                                <input type="text" name="developer" class="form-control" id="developer" placeholder="Assign developer">
                            @error('developer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <label for="username">  Username:   </label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="password">  Password:   </label>
                                <input type="text" name="password" class="form-control" id="password" placeholder="Enter password">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                          <label for="description">  Brief Summary:   </label> 
                            <textarea class="form-control" id="description" name="description" rows="8" cols="50" placeholder="Enter brief summary..."></textarea>
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

    <script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 
 
@endsection