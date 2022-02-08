 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Info</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Sr.No.</th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Role </th>
                    <th> Department </th>
                    <th> Created At </th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php  $counter =1; ?>
                @foreach ($get_user_data as $user)
                  <tr>
                    <td> <?php echo $counter; ?></td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }}
                    </td>
                    <td> @if($user->role =='1') Admin @else User   @endif </td>
                    <td> {{ $user->department }} </td>
                    <td>{{ $user->created_at }}</td>

                  </tr>
                  <?php $counter++; ?>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Sr.No.</th>
                    <th> Name </th>
                    <th> Email </th>
                    <th> Role </th>
                    <th> Department </th>
                    <th> Created At </th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection