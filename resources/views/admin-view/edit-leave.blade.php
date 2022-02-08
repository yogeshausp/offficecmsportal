@extends('layout-admin.layout')

@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Leave Edit Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leaves</li>
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
                <h3 class="card-title">Please Fill Details </h3>
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

              @foreach ($get_leaves_detail_data as $leave_detail)
              <form id="tasks_form" method="post" action="{{ url('leave-update/'.$leave_detail->id) }}">	
              	<input type="hidden" name="role" value="{{ auth()->user()->role }}" id="role">
              	<input type="hidden" name="email" value="{{ auth()->user()->email }}" id="email">
              	<input type="hidden" name="id" value="{{ auth()->user()->id }}" id="id">
              	<input type="hidden" name="name" value="{{ auth()->user()->name }}" id="name">
                  @csrf
                <div class="card-body">
                	<div class="form-group">
                       <div class="row">
                        <div class="col-sm-4">
                          <label for="sel1">Select Employee:</label>
                                        <select class="form-control" id="employee" name="employee">
                          <option value="">--Select any option--</option>
                                        @foreach ($get_employees_data as $employee)
                                            <option value="{{ $employee->id }}" {{ ( $employee->id == $leave_detail->user_id) ? 'selected' : '' }}>{{ $employee->emp_name }}</option>
                                        @endforeach
                            </select>

                            @error('designation')
                          <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                          <label for="sel1">Select Leave Type:</label>
                                        <select class="form-control" id="leave_type" name="leave_type">
                          <option value="">--Select any option--</option>
                                        @foreach ($get_leaves_data as $leave)
                                            <option value="{{ $leave->id }}" {{ ( $leave->id == $leave_detail->leave_type) ? 'selected' : '' }}>{{ $leave->title }}</option>
                                        @endforeach
                            </select>

                            @error('leave_type')
                          <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>


                        <div class="col-sm-4">
                          <label for="sel1">Select Status:</label>
                                        <select class="form-control" id="status" name="status">
                          <option value="">--Select any option--</option>
                                      
                              <option value="0" {{ ($leave_detail->status == 0) ? 'selected' : '' }}>Unapproved</option>
                              <option value="1" {{ ($leave_detail->status == 1) ? 'selected' : '' }}>Approved</option>
                              <option value="2" {{ ($leave_detail->status == 2) ? 'selected' : '' }}>In-process</option>
                              <option value="3" {{ ($leave_detail->status == 3) ? 'selected' : '' }}>Applied</option>
                                       
                            </select>

                            @error('status')
                          <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
              
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="email">  From:   </label>
                              <input type="text" name="from" class="form-control date" id="to" placeholder="Enter date" value="{{$leave_detail->from}}">
                            @error('from')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="age">  To:   </label>
                                <input type="text" name="to" class="form-control date" id="to" placeholder="Enter date" value="{{$leave_detail->to}}">
                            @error('to')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="address">  Reason:   </label>
                                <input type="richtext" name="reason" class="form-control" id="reason" placeholder="Enter reason" value="{{$leave_detail->reason}}">
                            @error('reason')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
              @endforeach
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