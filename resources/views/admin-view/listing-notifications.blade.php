 
@extends('layout-admin.layout')

@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Notification Information</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Notifications Info</li>
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
                <h3 class="card-title">Information of Notifications</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th> Sr.No.</th>
                    <th> Subject </th>
                    <th> Message </th>
                    <th> Action  </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php  $counter =1; ?>
                @foreach ($get_notifications_data as $notification)
                  <tr>
                    <td> <?php echo $counter; ?></td>
                    <td> {{ $notification["subject"] }} </td>
                    <td> {{ $notification["message"] }} </td>
                    <td> <a href="" id="editNotification" data-toggle="modal" data-target='#notification-add-modal' data-id="{{$notification['id'] }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> | <a href="" id="deleteNotification" data-id="{{$notification['id'] }}"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                    </tr>
                  <?php $counter++; ?>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                  <th> Sr.No.</th>
                  <th> Subject </th>
                    <th> Message </th>
                    <th> Action  </th>
                     </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            
            <div class="modal" id="notification-add-modal" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Notification Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form id="notification_add_form" method="post" action="{{ action('Admin\NotificationController@insert_notification') }}">

                      @csrf

                      <input type="hidden" id="notification_id" name="notification_id" value="">


                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-6">
                            <label for="title">  Subject:   </label>
							<input type="text" name="subject" class="form-control" id="add-subject" value="" placeholder="Enter the subject">
                          </div>

                          <div class="col-sm-6">
                            <label for="title">  Message:   </label>
							<input type="text" name="message" class="form-control" id="add-message" value="" placeholder="Enter the message">
                          </div>
                         
                        </div>
                        
                      </div>

                       <button type="submit" class="btn btn-primary" id="add-notification">Submit</button>

                       <span class="btn btn-primary" id="edit-notification" style="display:none">Edit Notification</span>

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

                    $('#notification-add-modal').modal('show')


                });


                $('body').on('click', '#editNotification', function (event) {

                  event.preventDefault();
                  var id = $(this).data('id');
                  console.log(id)
                  $.get('notification-edit/' + id, function (data) {
                      $('#add-notification').hide();
                      $('#edit-notification').show();
                      $('#practice_modal').modal('show');
                      $('#notification_id').val(data.data.id);
                      $('#add-subject').val(data.data.subject);
                      $('#add-message').val(data.data.message);
                    });

                });

                
                $('body').on('click', '#edit-notification', function (event) {

                  event.preventDefault()
                  var id = $("#notification_id").val();
                  var subject = $('#add-subject').val();
                  var message = $('#add-message').val();
                  
                  $.ajax({
                    url: 'notification-update/' + id,
                    type: "GET",
                    data: {
                      id: id,
                      subject: subject,
                      message: message,
                    },
                    dataType: 'json',
                    success: function (data) {
                      $('#practice_modal').modal('hide');
                      $('#notification_add_form').trigger("reset");
                        
                      window.location.reload(true);
                    }
                  });
                });


                $('body').on('click', '#deleteNotification', function (event) {

                  event.preventDefault()
                  var id = $(this).attr('data-id');
                  
                  $.ajax({
                    url: 'notification-delete/' + id,
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

