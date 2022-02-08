 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employees Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of Employees</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Emp ID </th>
                    <th> Emp Name </th>
                    <th> Designation </th>
                    <th> Department  </th>
                    <th> Email </th>
                    <th> Contact </th>
                    <th> DOB </th>
                    <th> Action </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  $counter =1; ?>
                @foreach ($get_employees_data as $employee)
                  <tr>
                    <td> <?php echo $counter; ?></td>
                    <td> {{ $employee->emp_id }} </td>
                    <td> {{ $employee->emp_name }} </td>
                    <td> {{ $employee->formatted_designation }} </td>
                    <td> {{ $employee->formatted_department }} </td>
                    <td> {{ $employee->email }} </td>
                    <td> {{ $employee->contact }} </td>
                    <td> {{ $employee->formate_dob }} </td>
                    <td> <a href="{{ url('employee-detail/'.$employee->id) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> | <a href="{{ url('employee-edit/'.$employee->id) }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="{{ url('employee-delete/'.$employee->id) }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a> </td>
                  </tr>
                  <?php $counter++; ?>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Emp ID </th>
                    <th> Emp Name </th>
                    <th> Designation </th>
                    <th> Department  </th>
                    <th> Email </th>
                    <th> Contact </th>
                    <th> DOB </th>
                    <th> Action </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection