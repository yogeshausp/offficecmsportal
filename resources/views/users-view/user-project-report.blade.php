@extends('layout-user.layout')

@section('content')

 <?php  $login_user = auth()->user()->name;?>
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Project Report:</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">project details</li>
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
                <h3 class="card-title">Please <small>enter the project details Below :</small></h3>
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
              <form id="quickForm" method="post" action="{{action('UserController@insert_project_reports') }}">  @csrf                            
                 <input type="hidden" name="user_name" value="<?php echo auth()->user()->name;?>">
                <input type="hidden" name="user_id" value="<?php echo auth()->user()->id;?>">
                <div class="card-body">
                  <div class="form-group">
                  	<label for="exampleInputPassword1">Select any project Name:</label>
					        <select class="form-control" id="project_name" name="project_name">
          						<option value="">--Select any option--</option>
          					   @foreach ($get_project_data as $project_reports)
          	           <?php if($login_user ==$project_reports->name) { ?>
						
          						<option value="{{ $project_reports->project_name }}">{{ $project_reports->project_name }} </option>
          						<?php } ?>
          					@endforeach
					       </select>
                  @error('project_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>
                  <div class="form-group">
                    <label for="work_done">Work Done Details:</label>
                    <input type="text" name="work_done" class="form-control" id="work_done" placeholder="Enter the Details">
                    @error('work_done')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                   <div class="form-group">
                    <label for="time_ded_project_fist">Time dedicated  Project fist :</label>
                    <input type="text" name="time_ded_project_fist" class="form-control" id="time_ded_project_fist" placeholder="Enter the Details">
                    @error('time_ded_project_fist')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>

                     <div class="form-group">
                    <label for="link_submission_project_fist ">Link Submission Project fist: </label>
                    <input type="text" name="link_submission_project_fist" class="form-control" id="link_submission_project_fist" placeholder="Enter the Details">
                    @error('link_submission_project_fist')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>


                <div class="form-group">
                  	<label for="exampleInputPassword1">Select any option:</label>

					<select class="form-control" id="status" name="project_status">
					<option value="">--Select any option--</option>
						
					<option value="Approval">Approval</option>
					<option value="Pending">Pending</option>
					</select>
            @error('project_status')
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