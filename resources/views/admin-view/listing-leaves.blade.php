 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Leave Info</li>
            </ol>
          </div>
        </div>
          
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of Leave</h3>
                <span class="total-leaves" style="float:right">Total Casual Leaves: 12</span>
                <span class="pending-leaves"></span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

              <div class="row">

              <form  action="{{ route('leave-filter') }}" method="get">
                @csrf
                  <div class="col-sm-4">
                          <label for="sel1">Select Employee:</label>
                          <select class="form-control" id="employee" name="employee">
                              <option value="">--Select an employee--</option>
                              @foreach ($get_employees_data as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->emp_name }}</option>
                              @endforeach
                            </select>

                            @error('designation')
                              <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                  </div>

                  <div class="col-sm-4">
                          <label for="sel1">Month:</label>
                          <select name="month">
                            <option value="">No Preference</option>
                            <option value="01">January</option>
                            <option value="02">February</option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                          </select>
                  </div> 
                      
                  <div class="col-sm-4">
                          <label for="sel1">Year:</label>
                          <select name="year">
                            <option value="">No Preference</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                            <option value="2025">2025</option>
                          </select>
                  </div> 
                  
                  <div class="col-sm-4">
                      <button type="submit">Filter Results</button>
                  </div>       
                </form>

                  
              </div>

             
              <ul class="nav nav-tabs nav-pills" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All Leaves</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="casual-tab" data-bs-toggle="tab" data-bs-target="#casual" type="button" role="tab" aria-controls="casual" aria-selected="false">Casual Leaves</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="half-day-tab" data-bs-toggle="tab" data-bs-target="#half-day" type="button" role="tab" aria-controls="half-day" aria-selected="false">Half Day Leaves</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="short-tab" data-bs-toggle="tab" data-bs-target="#short" type="button" role="tab" aria-controls="short" aria-selected="false">Short Leaves</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="unpaid-tab" data-bs-toggle="tab" data-bs-target="#unpaid" type="button" role="tab" aria-controls="unpaid" aria-selected="false">Unpaid Leaves</button>
                  </li>
              </ul>
           

              <div class="tab-content">
                  <div class="tab-pane active" id="all" role="tabpanel" aria-labelledby="all-tab">

                      <table id="example1" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Action  </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $counter =1; ?>
                    @foreach ($get_leaves_data as $leave)
                      <tr>
                        <td> <?php echo $counter; ?></td>
                        <td> {{ $leave->formatted_user_id }} </td>
                        <td> {{ $leave->formatted_leave_type }} </td>
                        <td> {{ $leave->formatted_from }} </td>
                        <td> {{ $leave->formatted_to }} </td>
                        <td> {{ $leave->formatted_status }} </td>
                        <td> <a href="{{ url('leave-edit/'.$leave->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('leave-delete/'.$leave->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                        </tr>
                      <?php $counter++; ?>
                    @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Action  </th>
                        </tr>
                      </tfoot>
                    </table>

                  </div>

                  <div class="tab-pane" id="casual" role="tabpanel" aria-labelledby="casual-tab">

                      <table id="example2" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Balance </th>
                        <th> Action  </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $counter =1; ?>
                    @foreach ($get_casuals_data as $leave)
                      <tr>
                        <td> <?php echo $counter; ?></td>
                        <td> {{ $leave->formatted_user_id }} </td>
                        <td> {{ $leave->formatted_leave_type }} </td>
                        <td> {{ $leave->formatted_from }} </td>
                        <td> {{ $leave->formatted_to }} </td>
                        <td> {{ $leave->formatted_status }} </td>
                        <td> {{ $leave->pending_casual }} </td>
                        <td> <a href="{{ url('leave-edit/'.$leave->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('leave-delete/'.$leave->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                        </tr>
                      <?php $counter++; ?>
                    @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Balance </th>
                        <th> Action  </th>
                        </tr>
                      </tfoot>
                    </table>

                  </div>
                  
             
              <div class="tab-pane" id="half-day" role="tabpanel" aria-labelledby="half-day-tab">

                      <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Balance </th>
                        <th> Action  </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $counter =1; ?>
                    @foreach ($get_halves_data as $leave)
                      <tr>
                        <td> <?php echo $counter; ?></td>
                        <td> {{ $leave->formatted_user_id }} </td>
                        <td> {{ $leave->formatted_leave_type }} </td>
                        <td> {{ $leave->formatted_from }} </td>
                        <td> {{ $leave->formatted_to }} </td>
                        <td> {{ $leave->formatted_status }} </td>
                        <td> {{ $leave->pending_half }} </td>
                        <td> <a href="{{ url('leave-edit/'.$leave->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('leave-delete/'.$leave->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                        </tr>
                      <?php $counter++; ?>
                    @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Balance </th>
                        <th> Action  </th>
                        </tr>
                      </tfoot>
                    </table>

                  </div>

                  <div class="tab-pane" id="short" role="tabpanel" aria-labelledby="short-tab">

                      <table id="example4" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Action  </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $counter =1; ?>
                    @foreach ($get_shorts_data as $leave)
                      <tr>
                        <td> <?php echo $counter; ?></td>
                        <td> {{ $leave->formatted_user_id }} </td>
                        <td> {{ $leave->formatted_leave_type }} </td>
                        <td> {{ $leave->formatted_from }} </td>
                        <td> {{ $leave->formatted_to }} </td>
                        <td> {{ $leave->formatted_status }} </td>
                        <td> <a href="{{ url('leave-edit/'.$leave->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('leave-delete/'.$leave->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                        </tr>
                      <?php $counter++; ?>
                    @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Action  </th>
                        </tr>
                      </tfoot>
                    </table>

                  </div>

                  <div class="tab-pane" id="unpaid" role="tabpanel" aria-labelledby="unpaid-tab">

                      <table id="example5" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Action  </th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php  $counter =1; ?>
                    @foreach ($get_unpaids_data as $leave)
                      <tr>
                        <td> <?php echo $counter; ?></td>
                        <td> {{ $leave->formatted_user_id }} </td>
                        <td> {{ $leave->formatted_leave_type }} </td>
                        <td> {{ $leave->formatted_from }} </td>
                        <td> {{ $leave->formatted_to }} </td>
                        <td> {{ $leave->formatted_status }} </td>
                        <td> <a href="{{ url('leave-edit/'.$leave->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('leave-delete/'.$leave->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                        </tr>
                      <?php $counter++; ?>
                    @endforeach
                      </tbody>
                      <tfoot>
                      <tr>
                        <th> Sr.No.</th>
                        <th> Employee </th>
                        <th> Leave Type </th>
                        <th> From </th>
                        <th> To </th>
                        <th> Status </th>
                        <th> Action  </th>
                        </tr>
                      </tfoot>
                    </table>

                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
           
            <!-- <script>

              $(document).ready(function(){

                $('#employee').on('change', function() {

                  var id = $(this).val();

                  if(id != '')
                  {
                    var url = '{{ route("leaveFilter", ":id") }}';

                    url = url.replace(':id', id);

                  }
                  else
                  {

                    var url = '{{ route("leaveList") }}';

                  }              
                  
                 window.location.href = url;
                                  
                });

                var current_url = window.location.href;
                parts = current_url.split("/"),
                last_part = parts[parts.length-1];
                            
                $('#employee option[value='+last_part+']').attr("selected","selected");
              
              });


              
            </script> -->

          
@endsection

