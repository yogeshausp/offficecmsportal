@extends('layout-admin.layout')

@section('content')
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Employee Add Details </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees</li>
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
              <form id="tasks_form" method="post" action="{{action('Admin\EmployeeController@insert_employee') }}">	
              	<input type="hidden" name="role" value="{{ auth()->user()->role }}" id="role">
              	<input type="hidden" name="email" value="{{ auth()->user()->email }}" id="email">
              	<input type="hidden" name="id" value="{{ auth()->user()->id }}" id="id">
              	<input type="hidden" name="name" value="{{ auth()->user()->name }}" id="name">
              	@csrf
                <div class="card-body">
				<div class="form-group">
                    <h5>Personal Information</h5>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="emp_id">  Employee ID:   </label>
                                <input type="text" name="emp_id" class="form-control" id="emp_id" placeholder="Enter employee ID">
                            @error('emp_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="emp_name">  Employee Name:   </label>
                                <input type="text" name="emp_name" class="form-control" id="emp_name" placeholder="Enter employee name">
                            @error('emp_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="dob">  Date of Birth:   </label>
                                <input type="text" name="dob" class="form-control date" id="dob" placeholder="Enter date of birth">
                               
                            </div>
                            
                                @error('dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="email">  Email:   </label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="Enter email">
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="age">  Age:   </label>
                                <input type="text" name="age" class="form-control" id="email" placeholder="Enter age">
                            @error('age')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h5>Official Information</h5>
					<div class="row">
						<div class="col-sm-4">
							<label for="sel1">Select Designation:</label>
							<select class="form-control" id="designation" name="designation">
							<option value="">--Select any option--</option>
                            @foreach ($get_designations_data as $designation)
                                <option value="{{ $designation->id }}">{{ $designation->title }}</option>
                            @endforeach
						    </select>

						    @error('designation')
							<div class="alert alert-danger">{{ $message }}</div>
						    @enderror
					    </div>

                        <div class="col-sm-4">
							<label for="sel1">Select Department:</label>
							<select class="form-control" id="department" name="department">
							<option value="">--Select any option--</option>
                            @foreach ($get_departments_data as $department)
                                <option value="{{ $department->id }}">{{ $department->title }}</option>
                            @endforeach
						    </select>

						    @error('department')
							<div class="alert alert-danger">{{ $message }}</div>
						    @enderror
					    </div>

                        <div class="col-sm-4">
                            <label for="doj">  Date of joining:   </label>
                                <input type="text" name="doj" class="form-control date" id="doj" placeholder="Enter date of joining">
                            @error('doj')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="salary">  Salary:   </label>
                                <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter salary">
                            @error('salary')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
				</div> 

                <div class="form-group">
                    <h5>Communication Information</h5>
					<div class="row">
                        <div class="col-sm-4">
                            <label for="address">  Address:   </label>
                                <input type="richtext" name="address" class="form-control" id="address" placeholder="Enter address">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="city">  City:   </label>
                                <input type="text" name="city" class="form-control" id="city" placeholder="Enter city">
                            @error('city')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="city">  State:   </label>
                                <input type="text" name="state" class="form-control" id="state" placeholder="Enter state">
                            @error('state')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="contact">  Contact number:   </label>
                                <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter contact number">
                            @error('contact')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="alt_contact">  Alternarte contact number:   </label>
                                <input type="text" name="alt_contact" class="form-control" id="alt_contact" placeholder="Enter alternate contact number">
                            @error('alt_contact')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h5>Guardian Information</h5>
					<div class="row">
                        <div class="col-sm-4">
                            <label for="gname">  Guardian name:   </label>
                                <input type="text" name="gname" class="form-control" id="gname" placeholder="Enter guardian name">
                            @error('gname')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="gcontact">  Guardian contact:   </label>
                                <input type="text" name="gcontact" class="form-control" id="gcontact" placeholder="Enter guardian contact">
                            @error('gcontact')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <h5>Document Information</h5>
					<div class="row">
                        <div class="col-sm-4">
                            <label for="aadhar_number">  Aadhar number:   </label>
                                <input type="text" name="aadhar_number" class="form-control" id="aadhar_number" placeholder="Enter aadhar number">
                            @error('aadhar_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="pan_number">  Pan number:   </label>
                                <input type="text" name="pan_number" class="form-control" id="pan_number" placeholder="Enter pan number">
                            @error('pan_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="bgroup">  Blood group:   </label>
                                <input type="text" name="bgroup" class="form-control" id="bgroup" placeholder="Enter blood group">
                            @error('bgroup')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <h5>Financial Information</h5>
					<div class="row">
                        <div class="col-sm-4">
                            <label for="bank_name">  Bank name:   </label>
                                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Enter bank name">
                            @error('bank_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="acc_number">  Account number:   </label>
                                <input type="text" name="acc_number" class="form-control" id="acc_number" placeholder="Enter account number">
                            @error('acc_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-sm-4">
                            <label for="branch_name">  Branch name:   </label>
                                <input type="text" name="branch_name" class="form-control" id="branch_name" placeholder="Enter branch name ">
                            @error('branch_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-4">
                            <label for="ifsc">  IFSC code:   </label>
                                <input type="text" name="ifsc" class="form-control" id="ifsc" placeholder="Enter IFSC code">
                            @error('ifsc')
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

    <script type="text/javascript">
    $('.date').datepicker({  
       format: 'yyyy-mm-dd'
     });  
</script> 
 
@endsection