@extends('template')

@section('content')

<head>
    <style>
        #statusremarks {
            visibility: visible;
            display: none;
        }

        #otherreason {
            visibility: visible;
            display: none;
        }
    </style>

    <script type="text/javascript">
        function changeFunc() {
            var selectBox = document.getElementById("selectBox");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue === "Lost") {
                document.getElementById('otherreason').style.visibility = "visible";
                document.getElementById('statusremarks').style.display = "inline";
            } else {
                document.getElementById('statusremarks').style.display = "none";
                document.getElementById('otherreason').style.display = "none";
            }
        }

        function changeFuncc() {
            var selectBox = document.getElementById("selectBoxx");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            if (selectedValue === "Other reason") {
                document.getElementById('otherreason').style.visibility = "visible";
                document.getElementById('otherreason').style.display = "inline";
            } else {
                document.getElementById('otherreason').style.display = "none";
            }

        }
    </script>
</head>

<div class="main-content mt-5">
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
                        <form action="{{ url('add-inquiry') }}" method="POST">
                            <input type="hidden" name="customer_id" value="{{ $id }}">
                            <input type="hidden" name="city" value="{{ $customer_data['city'] }}">
                            <input type="hidden" name="customer_type" value="{{ $customer_data['customer_type'] }}">
                            <input type="hidden" name="source" value="{{ $customer_data['channel'] }}">
                            @csrf
                        <div class="card">
                            <div class="card-header">

                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>

                                <strong class="card-title">Create Inquiry</strong>

                                <a href="{{ url('inquiry-history/'.$id) }}" class="btn btn-primary text-white" style="float: right;">
                                    Inquiry History <i class="fa fa-plus-circle"></i>
                                </a>

                            </div>
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <div class="card-body">

                                  
                                    <div class="row">
                                        
                                        <div class="col-md-3">
                                            <label for="inquiry_type" class="form-label mt-2">Inquiry Type <i class='text-danger'>*</i></label>
                                            <select class="form-control shadow  bg-white standardSelect" name="inquiry_type" id="inquiry_type" requried>
                                                <option value="">Select Inquiry Type</option>
                                                <option value="Pre Sale">Pre Sale</option>
                                                <option value="Sale">Sale</option>
                                                <option value="After Sale">After Sale</option>
                                            </select>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="cnic" class="form-label mt-2">Dealership <i class='text-danger'>*</i></label>
                                            <select class="form-control bg-white standardSelect" name="dealership" required id="channel" required>
                                               
                                                <option value="">Select Dealership</option>
                                                
                                                @foreach($dealers as $row)
                                                <option value="{{ $row->dealer_code }}">{{ $row->dealer_name }}</option>
                                                @endforeach
                                                
                                            </select>
                                        </div>

                                        
                                        <div class="col-md-3">
                                            <label for="status" class="form-label mt-2">Status <i class='text-danger'>*</i></label>
                                            <select class="form-control shadow  bg-white standardSelect" name="status" required id="selectBox" onchange="changeFunc();" required>
                                                <option value="">Select Status</option>
                                                <option value="Hot">Hot</option>
                                                <option value="Cold">Cold</option>
                                                <option value="Warm">Warm</option>
                                                <option value="Won">Won</option>
                                                <option value="Lost">Lost</option>
                                            </select>
                                        </div>
                                        <!--<div class="col-md-3">-->
                                        <!--    <label class="form-label mt-2">Source <i class='text-danger'>*</i></label>-->
                                        <!--    <select class="form-control bg-white standardSelect" name="source" id="channel" required>-->
                                        <!--      <option value="">Select Channel</option>-->
                                        <!--      <option value="Call">Call</option>-->
                                        <!--      <option value="SMS">SMS</option>-->
                                        <!--      <option value="Email">Email</option>-->
                                        <!--      <option value="WhatsApp">WhatsApp</option>-->
                                        <!--      <option value="Facebook">Facebook</option>-->
                                        <!--      <option value="Instagram">Instagram</option>-->
                                        <!--      <option value="Web Form">Web Form</option>-->
                                        <!--    </select>-->
                                        <!--  </div>-->
                                           <div class="col-md-3">
                                                <label for="cnic" class="form-label mt-2">Existing Vehicle</label>
                                                <input type="text" class="form-control shadow p-3 mb-3 bg-white" id="cnic" name="existing_vehicle" placeholder="Existing Vehicle">
                                              </div>
                                          </div>
                                          <br>
                                          
                                          <div class="row">
                                         

                                              <div class="col-md-3">
                                                <label class="form-label mt-2">Interested Vehicle <i class='text-danger'>*</i></label>
                                                <select class="form-control bg-white standardSelect" name="interested_vehicle" required>
                                                    <option value="">Select Interesterd Vehicle</option>
                                                    <option value="Changan Karvaan">Changan Karvaan</option>
                                                    <option value="Changan M8">Changan M8</option>
                                                    <option value="Changan M9">Changan M9</option>
                                                    <option value="Changan Karvaan Plus">Changan Karvaan Plus</option>
                                                    <option value="Alsvin MT Comfort">Alsvin MT Comfort</option>
                                                    <option value="Alsvin DCT Comfort">Alsvin DCT Comfort</option>
                                                    <option value="Alsvin DCT Lumiere">Alsvin DCT Lumiere</option>
                                                    <option value="Oshan X7 Comfort (7 Seats)">Oshan X7 Comfort (7 Seats)</option>
                                                    <option value="Oshan X7 FutureSense (5 Seats)">Oshan X7 FutureSense (5 Seats)</option>
                                                  </select>
                                            </div>

                                          <div class="col-md-3">
                                            <label class="form-label mt-2">Inquiry Start Date</label>
                                            <input type="date" value="{{ date('Y-m-d') }}" readonly class="form-control" id="">
                                          </div>

                                          <div class="col-md-3">
                                            <label class="form-label mt-2">Inquiry End Date</label>
                                            <input type="date" name="end_date" value="{{ date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 day')) }}" class="form-control" id="">
                                          </div>
                                          <br>

                                          <div class="col-md-3 mt-2">
                                            <label for="next-follow-up" class="form-label">Next Follow Up </label>
                                            <input type="date" class="form-control shadow bg-white rounded" id="next-follow-up" name="next-follow-up" >
                                        </div>
                                        <br>

                                        <!--<div class="col-md-3 mt-2">-->
                                        <!--    <label for="remarks" class="form-label">Remarks</label>-->
                                        <!--    <textarea class="form-control shadow bg-white rounded" rows="1" id="remarks" name="remarks" style="resize:none"></textarea>-->
                                        <!--</div>-->

                                        <div class="col-md-3" id="statusremarks">
                                            <label for="status" class="form-label mt-2">Reasons</label>
                                            <select class="form-control shadow bg-white" name="status_remarks" id="selectBoxx" onchange="changeFuncc();">
                                                <option value="">Select Reasons</option>

                                                <option value="Financial issue">Financial issue</option>
                                                <option value="High price">High price</option>
                                                <option value="Long delivery time">Long delivery time</option>
                                                <option value="No quota available">No quota available</option>
                                                <option value="Only information gathering">Only information gathering</option>
                                                <option value="Parts unavailable">Parts unavailable</option>
                                                <option value="Delivery commitment issue">Delivery commitment issue</option>
                                                <option value="Purchased used Changan vehicle">Purchased used Changan vehicle</option>
                                                <option value="Purchased other brand">Purchased other brand</option>
                                                <option value="Variant not available in ready stock">Variant not available in ready stock</option>
                                                <option value="Color not available in ready stock">Color not available in ready stock</option>
                                                <option value="Financing/leasing case not approved/delayed">Financing/leasing case not approved/delayed</option>
                                                <option value="Test drive not available">Test drive not available</option>
                                                <option value="High interest rate">High interest rate</option>
                                                <option value="Purchased from other dealership">Purchased from other dealership</option>
                                                <option value="Unable to contact customer">Unable to contact customer</option>
                                                <option value="Aftersales support is not good">Aftersales support is not good</option>
                                                <option value="Bad market feedback about product quality">Bad market feedback about product quality</option>
                                                <option value="Other reason">Other reason</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row" mt-2 id="otherreason">
                                        <div class="col-md-12 mt-2">
                                            <label for="reason" class="form-label">Other Reason</label>
                                            <textarea class="form-control shadow bg-white rounded" rows="2" id="reason" name="reason" style="resize:none"></textarea>
                                        </div>
                                    </div>
                                   

                                    <div class="row mt-2">
                                        <div class="col-md-6 mt-2">
                                            <label for="inquiry_details" class="form-label">Inquiry Details <i class='text-danger'>*</i></label>
                                            <textarea class="form-control shadow bg-white rounded" required rows="4" id="inquiry_details" name="inquiry_details" style="resize:none"></textarea>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <label for="notes" class="form-label">Notes</label>
                                            <textarea class="form-control shadow bg-white rounded" rows="4" id="notes" name="notes" style="resize:none"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- ROW ENDS -->
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3" style="width: 100% !important;">
                                    <button type="submit" class="btn btn-primary" style="float: right; width: 10vw !important;">Save</button>

                                </div>


                            </div>

                        </div>
                    </form>

                    </div>
                    <!-- ROW ENDS -->

            </div>
            </div>
        </div>
    </section>
</div>


<!-- .content -->

@endsection
