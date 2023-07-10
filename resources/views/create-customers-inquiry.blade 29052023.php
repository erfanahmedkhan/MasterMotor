@php
$title = 'CRM - Inquiries';
@endphp
@extends('template')
@section('content')
<style>
    /* .inq-div {padding: 15px !important;
        } */

    #statusremarks {
        visibility: visible;
        display: none;
    }

    #otherreason {
        visibility: visible;
        display: none;
    }

    .form-control {
        font-size: 12px;
    }

    .btn {
        font-size: 9px !important;
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
                                <strong class="card-title">&nbsp;Customer Inquiry Form</strong>
                            </div>
                            <!-- card-header ENDS -->
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- form STARTS -->
                                <form action="{{ url('add-customers-inquiry') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{-- row STARTS --}}
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="mobile" class="form-label ">Mobile Number <span class="asterisk text-danger">*</span></label>
                                            <input type="text" class="form-control shadow-sm  bg-white" id="mobile" name="mobile" pattern="[0-9]{12}" required value="{{ !empty($customer[0]->mobile) ? $customer[0]->mobile : '92' }}" required placeholder="92xxxxxxxxxx" title="Max lenth is 12">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="form-label">Customer Name <span class="asterisk text-danger">*</span></label>
                                            <input type="text" class="form-control shadow-sm bg-white rounded" id="customername" name="name" required value="{{ @$customer[0]->name }}" required placeholder="Customer Name">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="email" class="form-label">Email Address</label>
                                            <input type="email" class="form-control shadow-sm  bg-white" id="email" name="email" value="{{ @$customer[0]->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Customer Email">
                                        </div>
                                        <div class="col-md-3">
                                            <label class="form-label">Select City <i class='text-danger'>*</i></label>
                                            <select class="form-control bg-white " name="city" id="city" required onchange="Getcity(this.value)">
                                                <option value="0">Select City</option>
                                                @foreach ($city as $cities)
                                                <option value="{{ $cities->id }}" <?php echo $cities->id == @$customer[0]->city ? 'selected' : ''; ?>>
                                                    {{ $cities->city }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    {{-- row ENDS --}}
                                    {{-- row STARTS --}}
                                    <div class="row mb-1">
                                        <div class="col-8"></div>
                                        <div class="col-4 float-right">
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="inquiryBtn" data-toggle="collapse" data-target="#Inquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Create
                                                Inquiry</button>
                                        </div>
                                    </div>
                                    {{-- row ENDS --}}
                                    {{-- row STARTS --}}
                                    <div class="row">
                                        <div class="col-8"></div>
                                        <div class="col-4 float-right">
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="" data-toggle="collapse" data-target="#afsInquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;AFS
                                            </button>
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="" data-toggle="collapse" data-target="#generalInquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;General
                                            </button>
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="" data-toggle="collapse" data-target="#saleInquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Sales</button>
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="" data-toggle="collapse" data-target="#presaleInquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Pre-Sales
                                            </button>
                                        </div>
                                    </div>
                                    {{-- row ENDS --}}
                                    {{-- row STARTS --}}
                                    <div class="row mt-2">
                                        <div class="col-8"></div>
                                        <div class="col-4">
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="" data-toggle="collapse" data-target="#unsuccessful-calls-Inquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Unsuccessful Call</button>
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-1" id="" data-toggle="collapse" data-target="#feedbackInquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Feedback
                                            </button>
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-1" id="" data-toggle="collapse" data-target="#dealersip-network-Inquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Dealership Network</button>
                                        </div>
                                    </div>
                                    {{-- row ENDS --}}
                                    {{-- row STARTS --}}
                                    {{-- </div>
                                    </div> --}}
                                    <div class="row collapse inq-div" id="Inquiry">
                                        <div class="col-12 mb-2">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i> Inquiry Details</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="inquiry_source" class="form-label">Select source <i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm  bg-white" name="inquiry_source" id="inquiry_source">
                                                    <option value="">Select Source</option>
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="inquiry_type" class="form-label ">Inquiry Type <i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="inquiry_type" onchange="hidefields();" id="inquiry_type">
                                                    <option value="">Select Inquiry Type</option>
                                                    <option value="Pre Sale">Pre Sale</option>
                                                    <option value="General">General</option>
                                                </select>
                                            </div>
                                            <div class="col-3" id="inquiry_sub_type_div">
                                                <label for="inquiry_sub_type" class="form-label">Inquiry Sub
                                                    Type</label>
                                                <select class="form-control shadow-sm  bg-white" name="inquiry_sub_type" id="inquiry_sub_type">
                                                    <option value="">Select Inquiry Sub Type</option>
                                                    <option value="Regular">Regular</option>
                                                    <option value="Promotion & Marketing">Promotion & Marketing
                                                    </option>
                                                    <option value="Compaign">Compaign</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="assigned_agent" class="form-label">Assigned Agent</label>
                                                <select class="form-control bg-white" id="assigned_agent" name="assigned_agent">
                                                    <option value="">Select Agent To Assign</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Admin 2">Admin 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="inquiry_dealership" class="form-label">Select
                                                    Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="" name="inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3" id="interested_vehicle">
                                                <label class="form-label">Interested Vehicle</label>
                                                <select class="form-control bg-white" id="interested_vehicle" name="interested_vehicle">
                                                    <option value="">Select Interesterd Vehicle</option>
                                                    @foreach ($vehicles as $Vehicle)
                                                    <option value="{{ $Vehicle->vehicle_name }}">
                                                        {{ $Vehicle->vehicle_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="interested_color" class="form-label">Interested Colour
                                                </label>
                                                <select class="form-control bg-white" id="interested_color" name="interested_color">
                                                    <option value="">Select Interested Colour</option>
                                                    @foreach ($colors as $color)
                                                    <option value="{{ $color->color }}">{{ $color->color }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="existing_vehicle" class="form-label">Existing
                                                    Vehicle</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 bg-white" id="existing_vehicle" name="existing_vehicle" placeholder="Existing Vehicle">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3" id="payment_mode_div">
                                                <label for="payment_mode" class="form-label">Mode of Payment</label>
                                                <select class="form-control shadow-sm  bg-white" name="payment_mode" onchange="hidefields();" id="payment_mode">
                                                    <option value="">Select payment mode</option>
                                                    <option value="Cash">Cash</option>
                                                    <option value="Bank">Bank</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="10" placeholder="Write customer's inquiry here..." id="inquiry_details" name="inquiry_details"></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-3" id="pre_sale_status">
                                                <label for="selectBox" class="form-label">Inquiry Status <i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="inquiry_status" id="selectBox" onchange="changeFunc();">
                                                    <option value="">Select Status</option>
                                                    <option value="Hot">Hot</option>
                                                    <option value="Cold">Cold</option>
                                                    <option value="Warm">Warm</option>
                                                    <option value="Won">Won</option>
                                                    <option value="Lost">Lost</option>
                                                </select>
                                            </div>
                                            <div class="col-3" id="statusremarks">
                                                <label for="selectBoxx" class="form-label">Inquiry Status
                                                    Reasons</label>
                                                <select class="form-control shadow-sm standardSelect bg-white" name="status_reason" id="selectBoxx" onchange="changeFuncc();">
                                                    <option value="">Select Reason</option>
                                                    @foreach ($status_reason as $inq_status_reason)
                                                    <option value="{{ $inq_status_reason->status_reason }}">
                                                        {{ $inq_status_reason->status_reason }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6" id="otherreason">
                                                <label for="other_reason" class="form-label">Other Reason</label>
                                                <textarea class="form-control shadow-sm bg-white rounded" id="other_reason" name="other_reason" rows="3"></textarea>
                                            </div>

                                            <div class="col-6" id="inquiry_status_remark_div">
                                                <label for="inquiry_status_remarks" class="form-label">Inquiry Status
                                                    Remarks</label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="3" id="inquiry_status_remarks" name="inquiry_status_remarks"></textarea>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-3">
                                                <label class="form-label ">Inquiry Start Date</label>
                                                <input type="date" value="{{ date('Y-m-d') }}" readonly class="form-control" id="">
                                            </div>
                                            <div class="col-3 d-none">
                                                <label class="form-label ">Inquiry End Date</label>
                                                <input type="hidden" name="end_date" value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}" class="form-control" id="" readonly>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Next Follow Up </label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" id="next-follow-up" name="next_follow_up">
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Next Follow Up Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" id="follow-up-preferred-time" name="followup_prefered_time">
                                            </div>
                                            <div class="col-3">
                                                <label for="callback" class="form-label ">Callback<i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="callback" id="callback">
                                                    <option value="Yes" selected>Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="notes" class="form-label">Agent Notes</label>
                                                <textarea class="form-control shadow-sm bg-gray rounded" rows="5" id="notes" name="agent_inquiry_notes"></textarea>
                                            </div>

                                            <div class="col-6">
                                                <label for="followup_remarks" class="form-label">Follow-Up
                                                    Remarks</label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" id="followup_remarks" name="followup_remarks"></textarea>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <h4>For Dealership</h4>
                                            <div class="col-3">
                                                <label class="form-label">Preferred Date</label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" id="dealer_prefered_date" name="dealer_prefered_date">
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" id="dealer_prefered_time" name="dealer_prefered_time">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <label for="dealer_reason" class="form-label">Reason</label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" id="dealer_reason" name="dealer_reason"></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- PRESALE INQUIRY STARTS --}}
                                    <div class="row collapse inq-div" id="presaleInquiry">
                                        <div class="col-12 mb-2">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry Details
                                            </h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_presale" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_presale" id="inquiry_category_presale" value="Pre-Sale" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="presale_inquiry_channel" class="form-label">Inquiry
                                                    Channel&nbsp;<i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="presale_inquiry_channel" id="presale_inquiry_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_inquiry_source" class="form-label ">Source</label>
                                                <select class="form-control shadow-sm bg-white" name="presale_inquiry_source" id="presale_inquiry_source">
                                                    <option value="Promotion">Promotion</option>
                                                    <option value="Social Media">Social Media</option>
                                                    <option value="Website">Website</option>
                                                    <option value="Referral">Referral</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_inquiry_type" class="form-label ">Inquiry
                                                    Type</label>
                                                <select class="form-control shadow-sm bg-white" name="presale_inquiry_type" id="presale_inquiry_type">
                                                    <option value="Vehicle Interest">Vehicle Interest</option>
                                                    <option value="Test Drive">Test Drive</option>
                                                    <option value="Booking Info">Booking Info</option>
                                                    <option value="Insurance Info">Insurance Info</option>
                                                    <option value="PO Cancellation Policy">PO Cancellation Policy
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="presale_inquiry_dealership" class="form-label">Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="presale_inquiry_dealership" name="presale_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_interested_vehicle" class="form-label">Interested
                                                    Vehicle</label>
                                                <select class="form-control bg-white" name="presale_interested_vehicle" id="presale_interested_vehicle">
                                                    <option value="NULL">Select Interesterd Vehicle</option>
                                                    @foreach ($vehicles as $Vehicle)
                                                    <option value="{{ $Vehicle->vehicle_name }}">
                                                        {{ $Vehicle->vehicle_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_interested_color" class="form-label">Interested
                                                    Colour
                                                </label>
                                                <select class="form-control bg-white" id="presale_interested_color" name="presale_interested_color">
                                                    <option value="">Select Interested Colour</option>
                                                    @foreach ($colors as $color)
                                                    <option value="{{ $color->color }}">{{ $color->color }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_existing_vehicle" class="form-label">Existing
                                                    Vehicle</label>
                                                <select class="form-control bg-white" id="presale_existing_vehicle" name="presale_existing_vehicle">
                                                    <option value="NULL">Select Existing Vehicle</option>
                                                    <option value="Honda City">Honda City</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="presale_inquiry_details" class="form-label">VOC&nbsp;<i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="10" placeholder="Write customer's inquiry here..." id="presale_inquiry_details" name="presale_inquiry_details"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="presale_existing_vehicle" class="form-label">Actions
                                                </label>
                                                <select class="form-control bg-white" name="" id="">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="assigned_agent" class="form-label">Assigned Agent</label>
                                                <select class="form-control bg-white" id="assigned_agent" name="assigned_agent">
                                                    <option value="">Select Agent To Assign</option>
                                                    <option value="Admin">Admin</option>
                                                    <option value="Admin 2">Admin 2</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- PRESALE INQUIRY ENDS --}}
                                    {{-- SALE INQUIRY STARTS --}}
                                    <div class="row collapse inq-div" id="saleInquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry Details
                                            </h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_sale" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_sale" id="inquiry_category_sale" value="Sales" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="salesinquiry_channel" class="form-label">Inquiry Channel
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="salesinquiry_channel" id="salesinquiry_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_inquirytype" class="form-label">Inquiry Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="sales_inquirytype" id="sales_inquirytype">
                                                    <option value="Status Confirmation">Status Confirmation</option>
                                                    <option value="Delivery Status">Delivery Status</option>
                                                    <option value="Booking cancellation">Booking Cancellation</option>
                                                    <option value="Price Update">Price Update</option>
                                                    <option value="Compensation">Compensation</option>
                                                    <option value="Policies">Policies</option>
                                                    <option value="Financial Documents">Financial Documents</option>
                                                    <option value="Refund" selected>Refund</option>
                                                    <option value="Booking Amendments">Booking Amendments</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_inquiry_subtype" class="form-label">Inquiry Sub-Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="sales_inquiry_subtype" id="sales_inquiry_subtype">
                                                    <option value="GST Refund">GST Refund</option>
                                                    <option value="Excess Amount Refund">Excess Amount Refund</option>
                                                    <option value="FED Refund">FED Refund</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_inquiry_subtype" class="form-label">Inquiry Sub-Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="sales_inquiry_subtype" id="sales_inquiry_subtype">
                                                    <option value="Colour Change Request">Colour Change Request
                                                    </option>
                                                    <option value="Variant Change Request">Variant Change Request
                                                    </option>
                                                    <option value="Delivery Premises Change Request">Delivery Premises
                                                        Change Request</option>
                                                    <option value="Change of Delivery Personnel">Change of Delivery
                                                        Personnel</option>
                                                </select>

                                            </div>
                                            <div class="col-3">
                                                <label for="sales_pbo" class="form-label">PBO
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="sales_pbo" id="sales_pbo" placeholder="PBO">
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_so_number" class="form-label">Sales Order Number
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="sales_so_number" id="sales_so_number" placeholder="Sales Order Number">
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_chassis" class="form-label">Chassis
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="sales_chassis" id="sales_chassis" placeholder="Chassis">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="sales_inquiry_dealership" class="form-label">
                                                    Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="sales_inquiry_dealership" name="sales_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_vehcile" class="form-label">Vehcile
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" id="sales_vehcile" name="sales_vehcile" placeholder="Vehcile">
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_vehcile_colour" class="form-label">Colour
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="sales_vehcile_colour" id="sales_vehcile_colour" placeholder="Color">
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="sales_inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" name="sales_inquiry_details" rows="10" id="sales_inquiry_details" placeholder="Write customer's inquiry here..."></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="sales_callback" class="form-label ">Callback</label>
                                                <select class="form-control shadow-sm bg-white" name="sales_callback" id="sales_callback">
                                                    <option value="Yes">Yes</option>
                                                    <option value="No" selected>No</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_follow_up" class="form-label">Follow Up Preferred
                                                    Date</label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" name="sales_follow_up" id="sales_follow_up">
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_followup_prefered_time" class="form-label">Follow Up
                                                    Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" name="sales_followup_prefered_time" id="sales_followup_prefered_time">
                                            </div>
                                            <div class="col-3">
                                                <label for="sales_action" class="form-label">Actions</label>
                                                <select class="form-control bg-white" name="sales_action" id="sales_action">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-12">
                                                <label for="followup_remarks" class="form-label">Follow-Up Remarks /
                                                    Agent Notes
                                                </label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" id="followup_remarks" name="followup_remarks"></textarea>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="sales_action" class="form-label">Actions</label>
                                                <select class="form-control bg-white" name="sales_action" id="sales_action">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary w-25" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- SALE INQUIRY ENDS --}}
                                    {{-- GENERAL INQUIRY STARTS --}}
                                    <div class="row collapse inq-div" id="generalInquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry Details
                                            </h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_general" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_general" id="inquiry_category_general" value="Pre-Sale" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="saleinquiry_channel" class="form-label">Channel
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="saleinquiry_channel" id="saleinquiry_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_inquirytype" class="form-label">Inquiry Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="presale_inquirytype" id="presale_inquirytype">
                                                    <option value="Management Information">Management Information
                                                    </option>
                                                    <option value="Plant Related Info">Plant Related Info</option>
                                                    <option value="HR Related Info">HR Related Info</option>
                                                    <option value="Miscellaneous">Miscellaneous</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_inquirytype" class="form-label">PBO
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" id="" name="" placeholder="PBO">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="presale_inquiry_dealership" class="form-label">
                                                    Dealership</label>
                                                <select class="form-control bg-white" id="" name="presale_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_inquirytype" class="form-label">Vehcile
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" id="" name="" placeholder="Vehcile">
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_inquirytype" class="form-label">Color
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" id="" name="" placeholder="Color">
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="10" placeholder="Write customer's inquiry here..." id="inquiry_details" name="inquiry_details"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="callback" class="form-label ">Callback<i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="callback" id="callback">
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Next Follow Up </label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" id="next-follow-up" name="next_follow_up">
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Next Follow Up Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" id="follow-up-preferred-time" name="followup_prefered_time">
                                            </div>
                                            <div class="col-3">
                                                <label for="presale_existing_vehicle" class="form-label">Actions
                                                </label>
                                                <select class="form-control bg-white" name="" id="">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>

                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="followup_remarks" class="form-label">Follow-Up Remarks /
                                                    Agent Notes
                                                </label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" id="followup_remarks" name="followup_remarks"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary w-25" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- GENERAL INQUIRY ENDS --}}
                                    {{-- AFS INQUIRY STARTS --}}
                                    <div class="row collapse inq-div" id="afsInquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;AFS Inquiry
                                                Details</h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_afs" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_afs" id="inquiry_category_afs" value="Pre-Sale" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="afs_inquiry_channel" class="form-label">
                                                    Channel
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="afsinquiry_channel" id="afsinquiry_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_inquirytype" class="form-label">Inquiry Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="afs_inquirytype" id="afs_inquirytype">
                                                    <option value="Warranty Coverage Info">Warranty Coverage Info
                                                    </option>
                                                    <option value="Warranty Criteria" selected>Warranty Criteria
                                                    </option>
                                                    <option value="Maintenance Info">Maintenance Info
                                                    </option>
                                                    <option value="Spare Parts">Spare Parts</option>
                                                    <option value="Accessories">Accessories</option>
                                                </select>
                                            </div>

                                            <div class="col-3" id="afs-inquiry-subtype" style="display: none;">
                                                <label for="afs_inquiry_subtype" class="form-label">Inquiry
                                                    Sub-Type</label>
                                                <select class="form-control shadow-sm bg-white" name="afs_inquiry_subtype" id="afs_inquiry_subtype">
                                                    <!-- Options will be dynamically populated based on the INQUIRY TYPE selection -->
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_pbo" class="form-label">PBO
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="afs_pbo" id="afs_pbo" placeholder="PBO">
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_so_number" class="form-label">Sales Order
                                                    Number
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="afs_so_number" id="afs_so_number" placeholder="Sales Order Number">
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_chassis" class="form-label">Chassis
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="afs_chassis" id="afs_chassis" placeholder="Chassis">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="afs_inquiry_dealership" class="form-label">
                                                    Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="afs_inquiry_dealership" name="afs_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_vehcile" class="form-label">Vehcile
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="afs_vehcile" id="afs_vehcile" placeholder="Vehcile">
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_vehcile_colour" class="form-label">Color
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="afs_vehcile_colour" id="afs_vehcile_colour" placeholder="Color">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="afs_inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" name="afs_inquiry_details" id="afs_inquiry_details" rows="10" placeholder="Write customer's inquiry here..."></textarea>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-3">
                                                <label for="afs_callback" class="form-label ">Callback<i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="afs_callback" id="afs_callback">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_follow_up" class="form-label">Follow Up Preferred Date
                                                </label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" name="afs_follow_up" id="afs_follow_up">
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_followup_prefered_time" class="form-label">Next Follow
                                                    Up Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" name="afs_followup_prefered_time" id="follow-up-preferred-time">
                                            </div>
                                            <div class="col-3">
                                                <label for="afs_inquiry_action" class="form-label">Actions
                                                </label>
                                                <select class="form-control bg-white" name="afs_inquiry_action" id="afs_inquiry_action">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="afs_followup_remarks" class="form-label">Follow-Up Remarks
                                                </label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="afs_followup_remarks" id="afs_followup_remarks"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary w-25" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- AFS INQUIRY ENDS --}}
                                    {{-- DEALERSHIP NETWORK STARTS --}}
                                    <div class="row collapse inq-div" id="dealersip-network-Inquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i> Inquiry Details</h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_dealership_network" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" inputmode="url" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_dealership_network" id="inquiry_category_dealership_network" value="Dealersip Network" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="dealernetwork_inquiry_channel" class="form-label">Channel</label>
                                                <select class="form-control shadow-sm bg-white" name="dealernetwork_inquiry_channel" id="dealernetwork_inquiry_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_inquiry_type" class="form-label ">Inquiry
                                                    Type <i class='text-danger'>*</i></label>
                                                <select class="form-control shadow-sm bg-white" name="dealernetwork_inquiry_type" id="dealernetwork_inquiry_type">
                                                    <option value="Dealership Address">Dealership Address</option>
                                                    <option value="Dealership Contact Details">Dealership Contact
                                                        Details</option>
                                                    <option value="Dealer Development">Dealer Development</option>
                                                    <option value="Dealership Operational Hours">Dealership
                                                        Operational Hours</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_pbo" class="form-label">PBO
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="dealernetwork_pbo" id="dealernetwork_pbo" placeholder="PBO">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="" class="form-label">Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="" name="dealernetwork_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_vehcile" class="form-label">Vehcile
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="dealernetwork_vehcile" id="dealernetwork_vehcile" placeholder="Vehcile">
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_vehcile_colour" class="form-label">Color
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="dealernetwork_vehcile_colour" id="dealernetwork_vehcile_colour" placeholder="Color">
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="dealernetwork_inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="10" placeholder="Write customer's inquiry here..." name="dealernetwork_inquiry_details" id="dealernetwork_inquiry_details"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="form-label">Inquiry Registration Date</label>
                                                <input type="date" value="{{ date('Y-m-d') }}" readonly class="form-control" id="">
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_callback" class="form-label ">Callback</label>
                                                <select class="form-control shadow-sm bg-white" name="dealernetwork_callback" id="dealernetwork_callback">
                                                    <option value="No" selected>No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_follow_up" class="form-label">Follow Up
                                                    Preferred Date</label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" name="dealernetwork_follow_up" id="dealernetwork_follow_up">
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_followup_prefered_time" class="form-label">Next Follow Up Preferred Time</label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" name="dealernetwork_followup_prefered_time" id="follow-up-preferred-time">
                                            </div>
                                            <div class="col-3">
                                                <label for="dealernetwork_inquiry_action" class="form-label">Actions
                                                </label>
                                                <select class="form-control bg-white" name="dealernetwork_inquiry_action" id="dealernetwork_inquiry_action">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="dealernetwork_followup_remarks" class="form-label">Follow-Up Remarks</label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="dealernetwork_followup_remarks" id="dealernetwork_followup_remarks"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary w-25" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- DEALERSHIP NETWORK ENDS --}}
                                    {{-- FEEDBACK STARTS --}}
                                    <div class="row collapse inq-div" id="feedbackInquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Feedback
                                                Inquiry Details</h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_feedback" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_feedback" id="inquiry_category_feedback" value="Feedback" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="feedback_inquiry_channel" class="form-label">
                                                    Channel
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="feedback_inquiry_channel" id="feedback_inquiry_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_inquirytype" class="form-label">Inquiry Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="feedback_inquirytype" id="feedback_inquirytype">
                                                    <option value="Product">Product</option>
                                                </select>
                                            </div>
                                            <div class="col-3" id="feedback-inquiry-subtype" style="display: none;">
                                                <label for="feedback_inquiry_subtype" class="form-label">Inquiry
                                                    Sub-Type</label>
                                                <select class="form-control shadow-sm bg-white" name="feedback_inquiry_subtype" id="feedback_inquiry_subtype">
                                                    <!-- Options will be dynamically populated based on the FEEDBACK INQUIRY TYPE selection -->
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_pbo" class="form-label">PBO
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="feedback_pbo" id="feedback_pbo" placeholder="PBO">
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_so_number" class="form-label">Sales Order
                                                    Number
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="feedback_so_number" id="feedback_so_number" placeholder="Sales Order Number">
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_chassis" class="form-label">Chassis
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="feedback_chassis" id="feedback_chassis" placeholder="Chassis">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="feedback_inquiry_dealership" class="form-label">
                                                    Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="feedback_inquiry_dealership" name="feedback_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_vehcile" class="form-label">Vehcile
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="feedback_vehcile" id="feedback_vehcile" placeholder="Vehcile">
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_vehcile_colour" class="form-label">Color
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="feedback_vehcile_colour" id="feedback_vehcile_colour" placeholder="Color">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="feedback_inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" name="feedback_inquiry_details" id="feedback_inquiry_details" rows="10" placeholder="Write customer's inquiry here..."></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 callback-value-No">
                                                <label for="feedback_callback" class="form-label">Callback</label>
                                                <select class="form-control shadow-sm bg-white callback" name="feedback_callback" id="feedback_callback">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-3 callback-value-Yes">
                                                <label for="feedback_follow_up" class="form-label">Follow Up
                                                    Preferred Date
                                                </label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" name="feedback_follow_up" id="feedback_follow_up">
                                            </div>
                                            <div class="col-3 callback-value-Yes">
                                                <label for="feedback_followup_prefered_time" class="form-label">Follow Up Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" name="feedback_followup_prefered_time" id="feedback_followup_prefered_time">
                                            </div>
                                            <div class="col-3">
                                                <label for="feedback_inquiry_action" class="form-label">Actions
                                                </label>
                                                <select class="form-control bg-white" name="feedback_inquiry_action" id="feedback_inquiry_action">
                                                    <option value="FCR">FCR (First Call Resolution)</option>
                                                    <option value="Follow Up">Follow Up</option>
                                                    <option value="Action Required">Action Required</option>
                                                </select>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-12 callback-value-Yes">
                                                <label for="feedback_followup_remarks" class="form-label">Follow-Up
                                                    Remarks
                                                </label>
                                                <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="feedback_followup_remarks" id="feedback_followup_remarks"></textarea>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary w-25" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- FEEDBACK ENDS --}}
                                    {{-- Unsuccessful Calls ENDS --}}
                                    <div class="row collapse inq-div" id="unsuccessful-calls-Inquiry">
                                        <div class="col-md-12 mb-4">
                                            <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Unsuccessful
                                                Calls
                                                Inquiry Details</h5>
                                        </div>
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-2">
                                                <label for="inquiry_category_feedback" class="form-label">Inquiry
                                                    Category</label>
                                                <input type="text" class="form-control shadow-sm p-3 mb-3 text-center" name="inquiry_category_feedback" id="inquiry_category_feedback" value="Unsuccessful Calls" readonly>
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-3">
                                                <label for="unsuccessful_calls_channel" class="form-label">
                                                    Channel
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="unsuccessful_calls_channel" id="unsuccessful_calls_channel">
                                                    <option value="Call">Call</option>
                                                    <option value="Email">Email</option>
                                                    <option value="SMS">SMS</option>
                                                    <option value="WhatsApp">WhatsApp</option>
                                                    <option value="Facebook">Facebook</option>
                                                    <option value="Instagram">Instagram</option>
                                                    <option value="Dealership">Dealership</option>
                                                    <option value="Walk-In">Walk-In</option>
                                                    <option value="Letters / Application">Letters / Application
                                                    </option>
                                                    <option value="Back-end">Back-end</option>
                                                    <option value="EDB">EDB</option>
                                                    <option value="PMU">PMU</option>
                                                    <option value="CCP">CCP</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="unsuccessful_calls_inquirytype" class="form-label">Inquiry Type
                                                </label>
                                                <select class="form-control shadow-sm  bg-white" name="unsuccessful_calls_inquirytype" id="unsuccessful_calls_inquirytype">
                                                    <option value="Dead on Arrival">Dead on Arrival</option>
                                                    <option value="Call Drop During Conversation">Call Drop During
                                                        Conversation</option>
                                                    <option value="Distortion">Distortion</option>
                                                    <option value="Crank Caller">Crank Caller</option>
                                                    <option value="Abusive Call">Abusive Call</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="unsuccessful_calls_pbo" class="form-label">PBO
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="unsuccessful_calls_pbo" id="unsuccessful_calls_pbo" placeholder="PBO">
                                            </div>
                                            <div class="col-md-3">
                                                <label for="unsuccessful_calls_inquiry_dealership" class="form-label">
                                                    Dealership</label>
                                                <select class="form-control bg-white inquiry_dealerships" id="unsuccessful_calls_inquiry_dealership" name="unsuccessful_calls_inquiry_dealership" onchange="Getalldealership()">
                                                    <option value="">Select Dealership</option>
                                                </select>
                                            </div>
                                            <div class="col-3">
                                                <label for="unsuccessful_calls_vehcile" class="form-label">Vehcile
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="unsuccessful_calls_vehcile" id="unsuccessful_calls_vehcile" placeholder="Vehcile">
                                            </div>
                                            <div class="col-3">
                                                <label for="unsuccessful_calls_vehcile_colour" class="form-label">Color
                                                </label>
                                                <input type="text" class="form-control shadow-sm bg-whiterounded" name="unsuccessful_calls_vehcile_colour" id="unsuccessful_calls_vehcile_colour" placeholder="Color">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="unsuccessful_calls_inquiry_details" class="form-label">VOC <i class='text-danger'>*</i></label>
                                                <textarea class="form-control shadow-sm bg-white rounded" name="unsuccessful_calls_inquiry_details" id="unsuccessful_calls_inquiry_details" rows="10" placeholder="Write customer's inquiry here..."></textarea>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3 callback-value-No">
                                                <label for="unsuccessful_calls_callback" class="form-label">Callback</label>
                                                <select class="form-control shadow-sm bg-white callback" name="unsuccessful_calls_callback" id="unsuccessful_calls_callback">
                                                    <option value="No">No</option>
                                                    <option value="Yes">Yes</option>
                                                </select>
                                            </div>
                                            <div class="col-3 callback-value-Yes">
                                                <label for="unsuccessful_calls_follow_up" class="form-label">Follow
                                                    Up Preferred Date
                                                </label>
                                                <input type="date" class="form-control shadow-sm bg-white rounded" name="unsuccessful_calls_follow_up" id="unsuccessful_calls_follow_up">
                                            </div>
                                            <div class="col-3 callback-value-Yes">
                                                <label for="unsuccessful_calls_followup_prefered_time" class="form-label">Follow Up Preferred Time </label>
                                                <input type="time" class="form-control shadow-sm bg-white rounded" name="unsuccessful_calls_followup_prefered_time" id="unsuccessful_calls_followup_prefered_time">
                                            </div>
                                        </div>
                                        {{-- row ENDS --}}
                                        {{-- row STARTS --}}
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                <input type="submit" value="Submit" id="" class="btn btn-round btn-primary w-25" style="float: right">
                                            </div>
                                        </div>
                                    </div>
                                    {{-- Unsuccessful Calls ENDS --}}

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
            <!-- section-body ENS -->
    </section>
    <!-- section STARTS -->
</div>
<!-- main-content ENDS -->



<script src="{{ asset('scripts/common.js') }}"></script>
<script src="{{ asset('scripts/inquiryforms.js') }}"></script>

<script>
    // Get references to the dropdowns
    const inquiryTypeDropdown = document.getElementById('afs_inquirytype');
    const inquirySubTypeDiv = document.getElementById('afs-inquiry-subtype');
    const inquirySubTypeDropdown = document.getElementById('afs_inquiry_subtype');

    // Add event listener to the inquiryTypeDropdown
    inquiryTypeDropdown.addEventListener('change', function() {
        // Hide the inquirySubTypeDiv by default
        inquirySubTypeDiv.style.display = 'none';

        // Get the selected value
        const selectedValue = inquiryTypeDropdown.value;

        // Define the options for each inquiry type
        const optionsByInquiryType = {
            'Maintenance Info': [{
                    value: 'FFS',
                    text: 'FFS'
                },
                {
                    value: 'SFS',
                    text: 'SFS'
                },
                {
                    value: 'Periodic Maintenance Info',
                    text: 'Periodic Maintenance Info'
                }
            ],
            'Spare Parts': [{
                    value: 'Availability',
                    text: 'Availability'
                },
                {
                    value: 'Price',
                    text: 'Price'
                }
            ],
            'Accessories': [{
                    value: 'Availability',
                    text: 'Availability'
                },
                {
                    value: 'Price',
                    text: 'Price'
                }
            ]
        };

        // Clear previous options
        inquirySubTypeDropdown.innerHTML = '';

        // Check if the selectedValue is in optionsByInquiryType
        if (selectedValue in optionsByInquiryType) {
            // Populate the inquirySubTypeDropdown with options based on the selected value
            optionsByInquiryType[selectedValue].forEach(function(option) {
                const optionElement = document.createElement('option');
                optionElement.value = option.value;
                optionElement.text = option.text;
                inquirySubTypeDropdown.appendChild(optionElement);
            });

            // Show the inquirySubTypeDiv
            inquirySubTypeDiv.style.display = 'block';
        }
    });

    // feedback
    // Get references to the select elements and the inquiry subtype div
    const inquiryTypeSelect = document.getElementById('feedback_inquirytype');
    const inquirySubtypeDiv = document.getElementById('feedback-inquiry-subtype');
    const inquirySubtypeSelect = document.getElementById('feedback_inquiry_subtype');

    // Function to handle the change event on the inquiry type select element
    function handleInquiryTypeChange() {
        // Get the selected value
        const selectedValue = inquiryTypeSelect.value;

        // Check the selected value and update the inquiry subtype select options
        if (selectedValue === 'Product') {
            inquirySubtypeSelect.innerHTML = `
      <option value="company">Company</option>
      <option value="dealership">Dealership</option>
    `;
        } else {
            // Clear the options in the inquiry subtype select element
            inquirySubtypeSelect.innerHTML = '';
        }

        // Show or hide the inquiry subtype div based on the selected value
        if (selectedValue === 'Product' || selectedValue === 'Product2') {
            inquirySubtypeDiv.style.display = 'block';
        } else {
            inquirySubtypeDiv.style.display = 'none';
        }
    }

    // Add an event listener to the inquiry type select element
    inquiryTypeSelect.addEventListener('change', handleInquiryTypeChange);

    // Set the initial state based on the default value
    handleInquiryTypeChange();

    // Callback - Follow-Up Date Time & Follow-Up Remarks
    $(document).ready(function() {
        // Hide the callback-value-Yes divs by default
        $(".callback-value-Yes").hide();

        // Handle select change event
        $(".callback").change(function() {
            var selectedValue = $(this).val();

            // Show/hide callback-value-Yes divs based on the selected value
            if (selectedValue === "Yes") {
                $(".callback-value-Yes").show();
            } else {
                $(".callback-value-Yes").hide();
            }
        });
    });
</script>
@endsection
