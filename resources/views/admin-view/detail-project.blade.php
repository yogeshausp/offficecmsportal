@extends('layout-admin.layout')

@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Project Details </h1>
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
                <h3 class="card-title">Please check detail</h3>
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
             
                <div class="card-body">

                @foreach ($get_project_detail_data as $project_detail)
				<div class="form-group">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="project_name">  Project Name:   </label>
                                <input type="text" name="project_name" class="form-control" id="project_name" value="{{$project_detail->project_name}}">
                            @error('project_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="client_name">  Client Name:   </label>
                                <input type="text" name="client_name" class="form-control" id="client_name" value="{{$project_detail->client_name}}">
                            @error('client_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="project_url">  Project Url:   </label>
                                <input type="text" name="project_url" class="form-control" id="project_url" value="{{$project_detail->project_url}}">
                                                                                     
                                @error('project_url')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="platform">  Platform:   </label>
                                <input type="text" name="platform" class="form-control" id="platform" value="{{$project_detail->platform}}">
                            @error('platform')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="designer">  Designer:   </label>
                                <input type="text" name="designer" class="form-control" id="designer" value="{{$project_detail->designer}}">
                            @error('designer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-sm-4">
                            <label for="developer">  Developer:   </label>
                                <input type="text" name="developer" class="form-control" id="developer" value="{{$project_detail->developer}}">
                            @error('developer')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-4">
                            <label for="username">  Username:   </label>
                                <input type="text" name="username" class="form-control" id="username" value="{{$project_detail->username}}">
                            @error('username')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="password">  Password:   </label>
                                <input type="text" name="password" class="form-control" id="password" value="{{$project_detail->password}}">
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="status">  Status:   </label>
                                <input type="text" name="status" class="form-control" id="status" value="{{$project_detail->formatted_status}}">
                            @error('status')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                          <label for="description">  Brief Summary:   </label> 
                            <textarea id="description" class="form-control" rows="8" cols="50" name="description" >{{$project_detail->description}}</textarea>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- /.card-body -->
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