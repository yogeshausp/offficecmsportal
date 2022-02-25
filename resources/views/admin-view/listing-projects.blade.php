 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Projects Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Projects Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of Projects</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Project Name </th>
                    <th> Client Name </th>
                    <th> URL </th>
                    <th> Platform </th>
                    <th> Designer </th>
                    <th> Developer </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  $counter =1; ?>
                @foreach ($get_projects_data as $project)
                  <tr>
                    <td> <?php echo $counter; ?></td>
                    <td> {{ $project->project_name }} </td>
                    <td> {{ $project->client_name }} </td>
                    <td> {{ $project->project_url }} </td>
                    <td> {{ $project->platform }} </td>
                    <td> {{ $project->designer }} </td>
                    <td> {{ $project->developer }} </td>
                    <td> {{ $project->formatted_status }} </td>
                    <td> <a href="{{ url('project-detail/'.$project->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> | <a href="{{ url('project-edit/'.$project->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('project-delete/'.$project->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                  </tr>
                  <?php $counter++; ?>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Project Name </th>
                    <th> Client Name </th>
                    <th> URL </th>
                    <th> Platform </th>
                    <th> Designer </th>
                    <th> Developer </th>
                    <th> Status </th>
                    <th> Action </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection