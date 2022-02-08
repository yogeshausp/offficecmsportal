@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Task Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Tasks Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of User Tasks</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
	                    <th> Sr.No.</th>
	                    <th> Project Name </th>
	                    <th> Work Done </th>
	                    <th>  Time Dedicated Details  </th>
	                    <th>Link Submission Details</th>
	                    <th> User Name</th>
	                    <th> Status</th>
	                    <th> Created At </th>
	                    <th> Updated At </th>
                  </tr>
                  </thead>
                  <tbody>
					<?php  $counter =1; ?>
						@foreach ($get_tasks_data as $tasks)
						<tr>
						<td> <?php echo $counter; ?></td>
						<td> {{ $tasks->project_name }} </td>
						<td> {{ $tasks->work_done }}</td>
						<td> {{ $tasks->time_dedicated_details }} </td>
						<td> {{ $tasks->link_submission_details }} </td>
						<td> {{ $tasks->user_name }} </td>
						<td> {{ $tasks->status }} </td>
						<td>{{ $tasks->created_at }}</td>
						<td>{{ $tasks->updated_at }}</td>

						</tr>
						<?php $counter++; ?>
					@endforeach
                  </tbody>
                  <tfoot>
					<tr>
						<th> Sr.No.</th>
	                    <th> Project Name </th>
	                    <th> Work Done </th>
	                    <th>  Time Dedicated Details  </th>
	                    <th>Link Submission Details</th>
	                    <th> User Name</th>
	                    <th> Status</th>
	                    <th> Created At </th>
	                    <th> Updated At </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection