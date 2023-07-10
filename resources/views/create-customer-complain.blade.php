@php
$title = 'CRM - Inquiry Form';
@endphp
@extends('template')
@section('content')
    <style>
        #statusremarks {
            visibility: visible;
            display: none;
        }
        #otherreason {
            visibility: visible;
            display: none;
        }
        #submitBtn {
            display: none;
        }
        .form-control {
            font-size: 12px;
        }
        .complaintBtn {
             font-size: 10px !important;
        }
    </style>
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
                                <strong class="card-title">Create Customer Inquiry/Complain</strong>
                            </div>
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <form action="{{ url('add-customer-inquiry') }}" method="POST" enctype="multipart/form-data">
                                      @csrf
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="mobile" class="form-label ">Mobile Number <span class="asterisk text-danger">*</span></label>
                                            <input type="text" class="form-control shadow-sm  bg-white"  id="mobile" name="mobile" pattern="[0-9]{12}" required value="{{ (!empty($customer[0]->mobile)) ? $customer[0]->mobile : '92'; }}" required placeholder="92xxxxxxxxxx" title="Max lenth is 12">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Customer Name <span class="asterisk text-danger">*</span></label>
                                            <input type="text" class="form-control shadow-sm bg-white rounded" id="customername" name="name" required value="{{ @$customer[0]->name }}" required placeholder="Customer Name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control shadow-sm  bg-white" id="email" name="email" value="{{ @$customer[0]->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address" >
                                        </div>
                                            <div class="col-md-3">
                                                <label class="form-label">Select City <i class='text-danger'>*</i></label>
                                                <select class="form-control bg-white " name="city" id="city" required onchange="Getcity(this.value)">
                                                    <option value="0">Select City</option>
                                                    @foreach($city as $cities)
                                                    <option value="{{ $cities->id }}" <?php echo ($cities->id == @$customer[0]->city)?'selected':''; ?>>{{ $cities->city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">

                                                <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="inquiryBtn" data-toggle="collapse" data-target="#Inquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Create Inquiry</button>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row collapse" id="Inquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-question-circle" aria-hidden="true"></i> Inquiry Details</h5>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="assigned_agent" class="form-label">Assigned Agent</label>
                                            <select class="form-control bg-white" id="assigned_agent" name="assigned_agent">
                                                <option value="">Select Agent To Assign</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Admin 2">Admin 2</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="inquiry_type" class="form-label ">Inquiry Type <i class='text-danger'>*</i></label>
                                            <select class="form-control shadow-sm bg-white" name="inquiry_type" onchange="hidefields();" id="inquiry_type" >
                                                    <option value="">Select Inquiry Type</option>
                                                    <option value="Pre Sale">Pre Sale</option>
                                                    <option value="General">General</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="dealership" class="form-label">Select Inquiry Dealership <i class='text-danger'>*</i></label>
                                            <select class="form-control bg-white" id="inquiry_dealerships" name="inquiry_dealership" onchange="Getalldealership()">
                                                <option value="">Select Dealership</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="inquiry_sub_type_div">
                                            <label for="inquiry_type" class="form-label">Inquiry sub type</label>
                                            <select class="form-control shadow-sm  bg-white"  name="inquiry_sub_type" id="inquiry_sub_type">
                                                    <option value="">Select Inquiry Sub Type</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Promotion & Marketing">Promotion & Marketing</option>
                                                    <option value="Compaign">Compaign</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="interested_vehicle">
                                            <label class="form-label">Interested Vehicle <i class='text-danger'>*</i></label>
                                            <select class="form-control bg-white" id="interested_vehicles" name="interested_vehicle">
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
                                        <div class="col-md-4" id="">
                                            <label class="form-label">Interested Color </label>
                                            <select class="form-control bg-white" id="" name="interested_color">
                                                    <option value="">Select interested color</option>
                                                    @foreach ($colors as $color)
                                                    <option value="{{ $color->color }}">{{ $color->color }}</option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="payment_mode_div">
                                            <label for="inquiry_type" class="form-label">Mode of payment</label>
                                            <select class="form-control shadow-sm  bg-white" name="payment_mode" onchange="hidefields();" id="payment_mode" >
                                                    <option value="">Select payment mode</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank">Bank</option>
                                            </select>
                                        </div>
                                            <div class="col-md-4">
                                                <label for="inquiry_details" class="form-label">Inquiry VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="3" placeholder="Customer inquiry voc" id="inquiry_details" name="inquiry_details" ></textarea>
                                            </div>
                                            <div class="col-md-4" id="">
                                                <label class="form-label">Select source <i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm  bg-white" name="inquiry_source" id="">
                                                        <option value="">Select Source</option>
                                                        <option value="Call">Call</option>
                                                        <option value="SMS">SMS</option>
                                                        <option value="Email">Email</option>
                                                        <option value="WhatsApp">WhatsApp</option>
                                                        <option value="Facebook">Facebook</option>
                                                        <option value="Instagram">Instagram</option>
                                                        <option value="Web Form">Web Form</option>
                                                </select>
                                            </div>
                                        <div class="col-md-4" id="pre_sale_status">
                                            <label for="selectBox" class="form-label">Inquiry Status <i class='text-danger'>*</i></label>
                                            <select class="form-control shadow-sm bg-white" name="inquiry_status" id="selectBox" onchange="changeFunc();" >
                                                <option value="">Select Status</option>
                                                <option value="Hot">Hot</option>
                                                <option value="Cold">Cold</option>
                                                <option value="Warm">Warm</option>
                                                <option value="Won">Won</option>
                                                <option value="Lost">Lost</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4" id="statusremarks">
                                            <label for="status" class="form-label">Inquiry Status Reasons</label>
                                            <select class="form-control shadow-sm standardSelect bg-white" name="status_reason" id="selectBoxx" onchange="changeFuncc();">
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
                                        <div class="col-md-4" id="otherreason">
                                            <label for="reason" class="form-label">Other Reason</label>
                                            <textarea class="form-control shadow-sm bg-white rounded"  id="reason" name="other_reason"></textarea>
                                        </div>
                                        <div class="col-md-4" id="inquiry_status_remark_div">
                                            <label for="inquiry_status_remarks" class="form-label">Inquiry Status Remarks</label>
                                            <input class="form-control shadow-sm bg-white rounded"  id="inquiry_status_remarks" name="inquiry_status_remarks">
                                        </div>
                                        <div class="col-md-4">
                                             <label for="existing_vehicle" class="form-label">Existing Vehicle</label>
                                             <input type="text" class="form-control shadow-sm p-3 mb-3 bg-white" id="" name="existing_vehicle" placeholder="Existing Vehicle">
                                        </div>
                                        <div class="col-md-4">
                                             <label class="form-label ">Inquiry Start Date</label>
                                             <input type="date" value="{{ date('Y-m-d') }}" readonly class="form-control" id="">
                                        </div>
                                         <input type="hidden" name="end_date" value="{{ date('Y-m-d', strtotime(date('Y-m-d'). ' + 7 day')) }}" class="form-control" id="">
                                        <div class="col-md-4">
                                            <label class="form-label">Next Follow Up </label>
                                            <input type="date" class="form-control shadow-sm bg-white rounded" id="next-follow-up" name="next_follow_up" >
                                        </div>
                                        <div class="col-md-4">
                                            <label class="form-label">Next Follow Up Preferred Time </label>
                                            <input type="time" class="form-control shadow-sm bg-white rounded" id="follow-up-preferred-time" name="followup_prefered_time" >
                                        </div>
                                        <div class="col-md-4">
                                            <label for="followup_remarks" class="form-label">Follow-Up Remarks</label>
                                            <input class="form-control shadow-sm bg-white rounded" rows="3" id="followup_remarks" name="followup_remarks">
                                        </div>
                                        <div class="col-md-4">
                                              <label for="notes" class="form-label">Agent Notes</label>
                                              <textarea class="form-control shadow-sm bg-white rounded" rows="3"  id="notes" name="agent_inquiry_notes"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="callback" class="form-label ">Callback<i class='text-danger'>*</i></label>
                                            <select class="form-control shadow-sm bg-white" name="callback" id="callback">
                                                    <option value="Yes" selected>Yes</option>
                                                    <option value="No">No</option>
                                            </select>
                                        </div>
                                        <div class="row">
                                            <h4>For Dealership</h4>
                                            <div class="col-md-4">
                                                <label class="form-label">Preferred Date</label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded"
                                                    id="dealer_prefered_date" name="dealer_prefered_date">
                                            </div>
                                            <div class="col-md-4">
                                                <label class="form-label">Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded"
                                                    id="dealer_prefered_time" name="dealer_prefered_time">
                                            </div>
                                            <div class="col-md-4">
                                                <label for="dealer_reason" class="form-label">Reason</label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="3" id="dealer_reason" name="dealer_reason"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" value="Submit" id="" class="btn btn-round btn-primary" style="float: right">
                                        </div>
                                </div>

                            </form>


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

<script src="{{asset('scripts/common.js')}}"></script>
<script src="{{asset('scripts/inquiryforms.js')}}"></script>

@endsection
