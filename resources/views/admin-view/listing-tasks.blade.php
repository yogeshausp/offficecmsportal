 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tasks Assign Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tasks Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of Tasks Assign</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Project_name </th>
                    <th> Brief_slug </th>
                    <th>  Project Assign  </th>
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
                    <td> {{ $tasks->brief_slug }}
                    </td>
                    <td> {{ $tasks->name }} </td>
                    <td>{{ $tasks->created_at }}</td>
                    <td>{{ $tasks->updated_at }}</td>

                  </tr>
                  <?php $counter++; ?>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Project_name </th>
                    <th> Brief_slug </th>
                    <th>  Project Assign  </th>
                    <th> Created At </th>
                    <th> Updated At </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection