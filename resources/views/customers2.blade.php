@extends('template')

@section('content')

<!-- main-content STARTS -->
<div class="main-content mt-3">
    <!-- section STARTS -->
    <section class="section">
        <!-- section-body STARTS -->
        <div class="section-body">
            <!-- container STARTS -->
            <div class="container-fluid">
                <!-- container ROW STARTS -->
                <div class="row">
                    <div class="col-md-12">
                        @if (session('msg'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                          <strong>{{ session('msg') }}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif

                        @if (session('error-msg'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          <strong>{{ session('error-msg') }}</strong>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        @endif
                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">Customers List</strong>
                                <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#AddCustomerModal" style="float: right;">
                                    Add new Customer <i class="fa fa-plus-circle"></i>
                                  </button>
                            </div>
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- TABLE STARTS -->
                                   
                                        <table class="example2 table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                              <tr>
                                                <th>id</th>
                                                <th>name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                             
                                              </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                          </table>
                                        <!-- TABLE ENDS -->
                                      
                                    </div>
                                </div>
                                <!-- ROW  ENDS -->

                            </div>
                            <!-- card-body ENDS -->
                        </div>
                        <!-- CARD ENDS -->
                    </div>
                    <!-- ROW ENDS -->
                </div>
                <!-- container ROW ENDS -->
            </div>
            <!-- container ENDS -->
        </div>
        <!-- section-body ENS -->
    </section>
    <!-- section STARTS -->
</div>
<!-- main-content ENDS -->



<div class="modal fade bd-example-modal-xl" id="AddCustomerModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="largeModalLabel">Add Customer</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ url('addcustomer') }}" method="POST">
            @csrf
            <div class="row">


                 <div class="col-md-4">
                <label for="fname" class="form-label">Customer Name <span class="asterisk text-danger">*</span></label>
                <input type="text" class="form-control shadow-sm bg-white rounded" id="fname" name="name" placeholder="Customer Name" required>
                </div>
                
                <div class="col-md-4">
                    <label for="Customer Type" class="form-label">Customer Type <span class="asterisk text-danger">*</span></label>
                    <select name="customer_type" class="form-control shadow-sm" id="" required>
                        <option value="">Select Customer Type</option>
                        <option value="GOVERMENT">GOVERMENT</option>
                        <option value="INDIVIDUAL">INDIVIDUAL</option>
                        <option value="CORPORATE">CORPORATE</option>
                        <option value="INDIVIDUAL LEASING">INDIVIDUAL LEASING</option>
                        <option value="INDIVIDUAL FINANCING">INDIVIDUAL FINANCING</option>
                        <option value="CORPORATE LEASING">CORPORATE LEASING</option>
                        <option value="CORPORATE LEASINGCORPORATE FINANCING">CORPORATE LEASING</option>
                    </select>
            </div>

              <div class="col-md-4">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" class="form-control shadow-sm  bg-white" id="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address">
              </div>

              <div class="col-md-4">
                <label for="mobile" class="form-label">Mobile Number <span class="asterisk text-danger">*</span></label>
                <input type="number" class="form-control shadow-sm  bg-white"  id="mobile" required name="mobile" required placeholder="03021234567">
              </div>
              <div class="col-md-8">
                <label for="address" class="form-label">Address <span class="asterisk text-danger">*</span></label>
                <input type="text" class="form-control shadow-sm  bg-white" id="address" name="address" required placeholder="ex. House #123, St-9.">
              </div>
              <!-- <div class="col-md-3"></div> -->
              <div class="col-md-4">
                <label for="city" class="form-label mt-2">City <span class="asterisk text-danger">*</span></label>
                <select class="form-control shadow-sm bg-white" name="city" required>
                    @foreach($city as $cities)
                        <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                    @endforeach
                </select>
                </div>

              <div class="col-md-4">
                <label for="cnic" class="form-label  mt-2">CNIC NO <span class="asterisk text-danger">*</span></label>
                <input type="number" class="form-control shadow-sm p-3 mb-3 bg-white" id="cnic" name="cnic" maxlength="3" maxlength="3" required placeholder="1234567893214">
              </div>

              <div class="col-md-4">
                <label class="form-label mt-2">Source <span class="asterisk text-danger">*</span></label>
                <select class="form-control shadow-sm bg-white" name="channel" id="channel" required>
                  <option value="">Select Channel</option>
                  <option value="Call">Call</option>
                  <option value="SMS">SMS</option>
                  <option value="Email">Email</option>
                  <option value="WhatsApp">WhatsApp</option>
                  <option value="Facebook">Facebook</option>
                  <option value="Instagram">Instagram</option>
                  <option value="Web Form">Web Form</option>
                </select>
              </div>

             

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>

  <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
  <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/jszip/dist/jszip.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="https://sodabaz.com/MasterMotor/public/assets/js/init-scripts/data-table/datatables-init.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        
      // DataTable
      $('.example2').DataTable({
         processing: true,
         serverSide: true,
         dataType: "json",
         ajax: "{{ route('get-customers.post') }}",
         columns: [
            { data: 'id' },
            { data: 'name' },
            { data: 'email' },
            { data: 'mobile' },
        ]
        //  success:function(response){
        //     console.log(response);
        //  }
      });

    });
    </script>
    
@endsection

