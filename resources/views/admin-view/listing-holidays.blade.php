 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Holidays Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Holidays Info</li>
            </ol>
          </div>
        </div>
          <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ul class="action-btn-group float-sm-right" style="display:inline-flex; list-style-type: none;">

                <li class="add-btn-group">
                    <span class="add-btn">Add</span>
                </li>
            </ul>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

     <div class="card">
              <div class="card-header">
                <h3 class="card-title">Information of Holidays</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Title </th>
                    <th> Start Date </th>
                    <th> End Date  </th>
                    <th> Action  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $counter =1; ?>
                @foreach ($get_holidays_data as $holiday)
                  <tr>
                    <td> <?php echo $counter; ?></td>
                    <td> {{ $holiday["title"] }} </td>
                    <td>{{ $holiday["start_date"] }} 
                    </td>
                    <td> {{ $holiday["end_date"] }}</td>
                    <td> <a href="" id="editHoliday" data-toggle="modal" data-target='#holiday-add-modal' data-id="{{$holiday['id'] }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="" id="deleteHoliday" data-id="{{$holiday['id'] }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                  <?php $counter++; ?>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th> Sr.No.</th>
                    <th> Title </th>
                    <th> Start Date </th>
                    <th> End Date  </th>
                    <th> Action  </th>
                     </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            
            <div class="modal" id="holiday-add-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Holiday Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="holiday_add_form" method="post" action="{{ action('Admin\HolidayController@insert_holiday') }}">

                      @csrf

                      <input type="hidden" id="holiday_id" name="holiday_id" value="">


                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-4">
                            <label for="title">  Title:   </label>
							              <input type="text" name="title" class="form-control" id="add-title" value="" placeholder="Enter the title">
                          </div>

                          <div class="col-sm-4">
                            <label for="start_date">  Start Date:   </label>
							              <input type="text" name="start_date" class="form-control" id="add-start-date" value="" placeholder="Enter the start date">
                          </div>

                          <div class="col-sm-4">
                            <label for="end_date">  End Date:   </label>
							              <input type="text" name="end_date" class="form-control" id="add-end-date" value="" placeholder="Enter the end date">
                          </div>

                        </div>
                        
                      </div>

                       <button type="submit" class="btn btn-primary" id="add-holiday">Submit</button>

                       <span class="btn btn-primary" id="edit-holiday" style="display:none">Edit Holiday</span>

                    </form>
                  </div>
                </div>
              </div>
            </div>


            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

            <script>

              $(document).ready(function(){


                $.ajaxSetup({
                  headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                });


                $('body').on('click', '.add-btn', function (event) {

                    $('#holiday-add-modal').modal('show')


                });


                $('body').on('click', '#editHoliday', function (event) {

                  event.preventDefault();
                  var id = $(this).data('id');
                  console.log(id)
                  $.get('holiday-edit/' + id, function (data) {
                      $('#add-holiday').hide();
                      $('#edit-holiday').show();
                      $('#practice_modal').modal('show');
                      $('#holiday_id').val(data.data.id);
                      $('#add-title').val(data.data.title);
                      $('#add-start-date').val(data.data.start_date);
                      $('#add-end-date').val(data.data.end_date);
                  });

                });

                
                $('body').on('click', '#edit-holiday', function (event) {

                  event.preventDefault()
                  var id = $("#holiday_id").val();
                  var title = $('#add-title').val();
                  var startDate = $('#add-start-date').val();
                  var endDate = $('#add-end-date').val();

                  $.ajax({
                    url: 'holiday-update/' + id,
                    type: "GET",
                    data: {
                      id: id,
                      title: title,
                      start_date: startDate,
                      end_date: endDate
                    },
                    dataType: 'json',
                    success: function (data) {
                      $('#practice_modal').modal('hide');
                      $('#holiday_add_form').trigger("reset");
                        
                      window.location.reload(true);
                    }
                  });
                });


                $('body').on('click', '#deleteHoliday', function (event) {

                  event.preventDefault()
                  var id = $(this).attr('data-id');
                  
                  $.ajax({
                    url: 'holiday-delete/' + id,
                    type: "GET",
                    dataType: 'json',
                    success: function (data) {
                      window.location.reload(true);
                    }
                  });
                });
              });

            </script>           
@endsection

