@extends('layout-admin.layout')

@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Tasks Add Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tasks</li>
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
              <form id="tasks_form" method="post" action="{{action('AdminController@insert_task') }}">	
              	<input type="hidden" name="role" value="{{ auth()->user()->role }}" id="role">
              	<input type="hidden" name="email" value="{{ auth()->user()->email }}" id="email">
              	<input type="hidden" name="id" value="{{ auth()->user()->id }}" id="id">
              	<input type="hidden" name="name" value="{{ auth()->user()->name }}" id="name">
              	@csrf
                <div class="card-body">
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4">
							<label for="sel1">Select Project:</label>
							<select class="form-control" id="project_name" name="project_name">
							<option value="">--Select any option--</option>
                            @foreach ($get_projects_data as $projects)
                                <option value="{{ $projects->project_name }}">{{ $projects->project_name }}</option>
                            @endforeach
						    </select>

						@error('project_name')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>

					<div class="col-sm-4">
						<label for="brief_slug">  Slug:   </label>
							 <input type="text" name="brief_slug" class="form-control" id="brief_slug" placeholder="Enter brief slug">
						@error('brief_slug')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>

					<div class="col-sm-4">
							<label for="sel1">Assign Project user name:</label>
							<select class="form-control" id="project_assign" name="project_assign">
                            <option value="">--Select any option--</option>
							@foreach ($get_users as $users)
							  @if($users->role==2)
								<option value="{{ $users->id }}">{{ $users->name }}</option>
							  @endif
							@endforeach
							</select>
						@error('project_assign')
							<div class="alert alert-danger">{{ $message }}</div>
						@enderror
					</div>

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