@extends('template')

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">

                @if (session('status'))

            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endif

                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Users Record</strong>

                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#AddUserModal" style="float: right;">
                        Add new user
                        </button>

                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Contact no</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n = 1;
                                @endphp
                                  @foreach ($users as $row)
                                      <tr>

                                        <td>{{ $n }}</td>
                                        <td>{{ $row['name'] }}</td>
                                        <td>{{ $row['email'] }}</td>
                                        <td>{{ $row['password'] }}</td>
                                        <td>{{ $row['phone'] }}</td>
                                        <td>{{ $row['role'] }}</td>
                                        <td>{{ $row['status'] }}</td>
                                      </tr>

                                      @php
                                          $n++;
                                      @endphp
                                  @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


  <!-- Add Modal -->
  <div class="modal fade" id="AddUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <form action="{{ url('adduser') }}" method="POST">
            {{ csrf_field() }}
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <label>Username :</label>
            <input type="text" id="" name="name" required placeholder="Enter Username..." class="form-control">
            <br>

            <label>Email :</label>
            <input type="email" id="" name="email" required placeholder="Email Address..." class="form-control">
            <br>

            <label>Password :</label>
            <input type="password" id="" name="password" required placeholder="Enter Password..." class="form-control">
            <br>

            <label>Contact no :</label>
            <input type="number" id="" name="phone" required placeholder="Contact no..." class="form-control">
            <br>

            <label>Role :</label>
            <input type="text" id="" name="role" required placeholder="User Role..." class="form-control">
            <br>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </form>
    </div>
  </div>

  {{-- <script>
    $(document).ready(function(){
        $('#addform').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "adduser",
                data: $("#addform").serialize(),
                success: function(response){
                    console.log(response);
                    $('#AddUserModal').modal('hide');
                    alert("Record added");
                },
                error: function(error){
                    console.log(error);
                    alert("Record not added");
                }
            });
        });
    });
  </script> --}}

@endsection
