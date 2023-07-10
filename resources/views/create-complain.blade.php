@extends('template')

@section('content')

<div class="main-content mt-4">
    <section class="section">
        <div class="section-body">


            <div class="container">
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
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('error-msg') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif
                        <div class="card">
                            <div class="card-header">

                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>

                                <strong class="card-title">Create Complain</strong>

                                <a href="{{ url('complain-history/'.$id) }}" class="btn btn-primary text-white" style="float: right;">
                                    Complain History <i class="fa fa-plus-circle"></i>
                                </a>

                            </div>
                            <form action="{{ url('add-complain') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <div class="card-body">

                                   
                                    <div class="row">

                                        <div class="col-md-3">
                                            <label for="complaint_type" class="form-label mt-2">Complaint Type <i class='text-danger'>*</i></label>
                                            <select class="form-control shadow bg-white standardSelect" name="complaint_type" id="complaint_type" required>
                                                <option value="Sales">Sales</option>
                                                <option value="After Sales">After Sales</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="dealers" class="form-label mt-2">Select Dealership <i class='text-danger'>*</i></label>
                                            <select class="form-control shadow bg-white standardSelect" name="dealers" id="dealers" required>
                                                <option value="">Select Dealership</option>
                                                @foreach($dealer as $row)
                                                    <option value="{{ $row->dealer_code }}">{{ $row->dealer_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        
                                        <div class="col-md-3">
                                            <label for="vehicle" class="form-label mt-2" >Customer vehicles <i class='text-danger'>*</i></label>
                                            <select data-placeholder="Choose a Vehicle..." class="form-control shadow bg-white rounded standardSelect" name="vehicle" id="vehicle">
                                                @foreach ($data as $row)
                                                <option value="{{ $row->car_model }}">{{ $row->car_model }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                        <br>

                                    <div class="row mt-2">
                                            <div class="col-md-6">
                                                <label for="voc" class="form-label">Write Complain <i class='text-danger'>*</i></label>
                                            <textarea class="form-control shadow bg-white rounded" rows="5" id="voc" name="voc" required placeholder="Customer Complaint" style="resize:none"></textarea>
                                        
                                        </div>
                                        <div class="col-md-6">
                                            <label for="notes" class="form-label">Agent Notes</label>
                                            <textarea class="form-control shadow bg-white rounded" rows="5" id="notes" placeholder="Agent Remarks" name="notes" style="resize:none"></textarea>
                                        </div>
                                        
                                        
                                        
                                    </div>
                                    <!-- ROW ENDS -->
                                    <br>


                                        <div class="row mt-2">
                                        <div class="col-md-6">
                                            <!-- <h6 style="font-weight: normal;">Complaint Priority</h6> -->
                                            <label for="complaint_priority" class="form-label mt-2">Complaint Priority <i class='text-danger'>*</i></label> <br>

                                            <label class="radio-inline" for="complaint_priority"> </label>
                                            <input type="radio" name="complaint_priority" class="shadow bg-white" id="complaint_priority" value="High">
                                            <span>High</span>

                                            <label class="radio-inline" for="complaint_priority"> </label>
                                            <input type="radio" name="complaint_priority" class="ml-4 shadow bg-white" value="Medium">
                                            <span>Medium</span>
                                            
                                            <label class="radio-inline" for="complaint_priority"> </label>
                                            <input type="radio" name="complaint_priority" class="ml-4 shadow bg-white" value="Low">
                                            <span>Low</span>
                                            
                                        </div>
                                    </div>
                                    <!-- ROW ENDS -->
                                    <br>

                                    <!-- ROW STARTS -->
                                    <div class="row">

                                        <div class="col-md-3 ">

                                            <label for="upload_docs" class="form-label mt-2">Upload Document</label>
                                            <input type="file" class="form-control shadow bg-white rounded" id="upload_docs" name="upload_docs">
                                        </div>
                                    </div>


                                </div>

                                <!-- ROW ENDS -->
                                <div style="float: right;">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>


                            </div>

                         </form>


                        </div>

                    </div>
                    <!-- ROW ENDS -->



                </div>
            </div>
        </div>
</div>
</div>
</div>
</div>
</section>
</div>


<!-- .content -->

<!-- Add Modal -->

<div class=" modal fade bd-example-modal-xl" id="AddVehicleModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Register Vehicle</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">

                    <div class="row">


                        <div class="col-md-4">
                            <label for="company" class="form-label">Car Company</label>
                            <input type="text" class="form-control shadow bg-white rounded" id="company" name="company">
                        </div>
                        <div class="col-md-4">
                            <label for="model" class="form-label">Car Model</label>
                            <input type="text" class="form-control shadow bg-white" id="model" name="model">
                        </div>
                        <div class="col-md-4">
                            <label for="model_year" class="form-label">Car Model Year</label>
                            <input type="text" class="form-control shadow  bg-white" id="model_year" name="model_year">
                        </div>

                        <div class="col-md-4">
                            <label for="purchased_date" class="form-label mt-2">Purchase Date</label>
                            <input type="text" class="form-control shadow  bg-white" id="purchased_date" name="purchased_date" placeholder="01/01/2022">
                        </div>
                        <div class=" col-md-4">
                            <label for="Chases_no" class="form-label mt-2">Chases Number</label>
                            <input type="text" class="form-control shadow  bg-white" id="Chases_no" name="Chases_no">
                        </div>

                        <div class="col-md-4">
                            <label for="color" class="form-label  mt-2">Color</label>
                            <input type="text" class="form-control shadow  bg-white" id="color" name="color">
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3"></div>
                        <div class="col-md-12"></div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


        @endsection
