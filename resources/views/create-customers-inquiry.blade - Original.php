@php
$title = 'CRM - Inquiries';
@endphp
@extends('template')
@section('content')
<style>
    .inq-div {
        padding: 15px !important;
    }

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
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <form action="{{ url('add-customers-inquiry') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
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
                                            <input type="email" class="form-control shadow-sm  bg-white" id="email" name="email" value="{{ @$customer[0]->email }}" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Email Address">
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
                                    <div class="row">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <button type="button" style="float: right;" class="btn btn-round btn-primary mr-2" id="inquiryBtn" data-toggle="collapse" data-target="#Inquiry"><i class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Create
                                                Inquiry</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="row collapse inq-div" id="Inquiry">
                            <div class="col-md-12 mb-4">
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
                                    <select class="form-control bg-white" id="inquiry_dealerships" name="inquiry_dealership" onchange="Getalldealership()">
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
                                    <textarea class="form-control shadow-sm bg-white rounded" rows="8" placeholder="Write customer's inquiry here..." id="inquiry_details" name="inquiry_details"></textarea>
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
@endsection
