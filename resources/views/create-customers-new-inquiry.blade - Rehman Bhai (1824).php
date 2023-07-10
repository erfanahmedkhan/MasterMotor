@php
    $title = 'CRM - Inquiries';
@endphp
@extends('template')
@section('content')
    <style>
        .form-control {
            font-size: 12px;
        }

        .btn {
            font-size: 9px !important;
        }

        .bg-orange {
            background-color: #FF8B22 !important;
        }

        .card {
            --bs-card-border-width: 5px !important;
        }

        .card-body {
            padding: 0 15px 5px 15px !important;
        }

        .btn-primary:not(:disabled):not(.disabled):active,
        .show>.btn-primary.dropdown-toggle {
            color: #fff !important;
            background-color: #000204 !important;
            border-color: #005cbf !important;
            font-style: italic !important;
        }
    </style>
    <!-- main-content START -->
    <div class="main-content m-2 p-2">
        <!-- section START -->
        <section class="section">
            <!-- section-body START -->
            <div class="section-body">
                <!-- container START -->
                <div class="container-fluid rounded p-2">
                    <!-- alert-success-warning ROW START -->
                    <div class="row">
                        <div class="col-12">
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
                        </div>
                    </div>
                    <!-- alert-success-warning ROW END -->
                    <div class="row">
                        <div class="col-12">
                            <!-- card START -->
                            <div class="card">
                                <!-- card-header START -->
                                <div class="card-header">
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                        style="cursor: pointer; font-size: 20px"></i>
                                    <strong class="card-title">&nbsp;Customer Inquiry Form</strong>
                                </div>
                                <!-- card-header END -->
                                <!-- card-body START -->
                                <div class="card-body embed-responsive" style="overflow: auto">
                                    <!-- form START -->
                                    <form action="{{ url('add-customers-new-inquiry') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        {{-- row START --}}
                                        <div class="row mt-2">
                                            <div class="col-3">
                                                <label for="mobile" class="form-label ">Mobile Number <span
                                                        class="asterisk text-danger">*</span></label>
                                                <input type="text" class="form-control shadow-sm  bg-white"
                                                    id="mobile" name="mobile" pattern="[0-9]{12}" required
                                                    value="{{ !empty($customer[0]->mobile) ? $customer[0]->mobile : '92' }}"
                                                    required placeholder="92xxxxxxxxxx" title="Max lenth is 12">
                                            </div>
                                            <div class="col-3">
                                                <label for="" class="form-label">Customer Name <span
                                                        class="asterisk text-danger">*</span></label>
                                                <input type="text" class="form-control shadow-sm bg-white rounded"
                                                    id="customername" name="name" required
                                                    value="{{ @$customer[0]->name }}" required placeholder="Customer Name">
                                            </div>
                                            <div class="col-3">
                                                <label for="email" class="form-label">Email Address</label>
                                                <input type="email" class="form-control shadow-sm  bg-white"
                                                    id="email" name="email" value="{{ @$customer[0]->email }}"
                                                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                    placeholder="Customer Email">
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Select City <i class='text-danger'>*</i></label>
                                                <select class="form-control bg-white " name="city" id="city"
                                                    required onchange="Getcity(this.value)">
                                                    <option value="0">Select City</option>
                                                    @foreach ($city as $cities)
                                                        <option value="{{ $cities->id }}" <?php echo $cities->id == @$customer[0]->city ? 'selected' : ''; ?>>
                                                            {{ $cities->city }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        {{-- row END --}}
                                        {{-- row START --}}
                                        <div class="row">
                                            <div class="col-8"></div>
                                            <div class="col-4 float-right">
                                                {{-- AFS Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id="afsinquiryBtn"
                                                    data-type="AFS" onclick="getinquirytype(this);" data-toggle="collapse"
                                                    data-target="#afsInquiry"><i class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;AFS
                                                </button>
                                                {{-- General Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id="generalinquiryBtn"
                                                    data-type="General" onclick="getinquirytype(this);"
                                                    data-toggle="collapse" data-target="#generalInquiry"><i
                                                        class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;General
                                                </button>
                                                {{-- Sales Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id="salesinquiryBtn"
                                                    data-type="Sales" onclick="getinquirytype(this);"
                                                    data-toggle="collapse" data-target="#saleInquiry"><i
                                                        class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;Sales
                                                </button>
                                                {{-- Pre-Sales Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id="presalesinquiryBtn"
                                                    data-type="Pre-Sales" onclick="getinquirytype(this);"
                                                    data-toggle="collapse" data-target="#presalesInquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Pre-Sales
                                                </button>
                                            </div>
                                        </div>
                                        {{-- row END --}}
                                        {{-- row START --}}
                                        <div class="row mt-2">
                                            <div class="col-8"></div>
                                            <div class="col-4">
                                                {{-- Unsuccessful Call Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2"
                                                    id="unsuccessful-calls-inquiryBtn" data-type="Unsuccessful Call"
                                                    onclick="getinquirytype(this);" data-toggle="collapse"
                                                    data-target="#unsuccessful-calls-Inquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Unsuccessful Call
                                                </button>
                                                {{-- Feedback Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-1" id="feedbackinquiryBtn"
                                                    data-type="Feedback" onclick="getinquirytype(this);"
                                                    data-toggle="collapse" data-target="#feedbackInquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Feedback
                                                </button>
                                                {{-- Dealership Network Button --}}
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-1"
                                                    id="dealersip-network-inquiryBtn" data-type="Dealership Network"
                                                    onclick="getinquirytype(this);" data-toggle="collapse"
                                                    data-target="#dealersip-network-Inquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Dealership Network
                                                </button>
                                            </div>
                                        </div>
                                        {{-- row END --}}
                                        {{-- Pre-Sales INQUIRY START --}}
                                        <div class="row collapse inq-div" id="presalesInquiry">
                                            <div class="col-12 mb-2">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry
                                                    Details
                                                </h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_presales" class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_presales" id="inquiry_category_presales"
                                                        value="Pre-Sales" readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="presales_inquiry_channel"
                                                        class="form-label">Channel</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="presales_inquiry_channel" id="presales_inquiry_channel">
                                                        @foreach ($channel as $presale_channel)
                                                            <option value="{{ $presale_channel->source }}">
                                                                {{ $presale_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="presales_inquiry_source" class="form-label">Source</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="presales_inquiry_source" id="presales_inquiry_source">
                                                        @foreach ($presale_sources as $presales_source)
                                                            <option value="{{ $presales_source->source }}">
                                                                {{ $presales_source->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Pre-Sales Inquiry Type --}}
                                                <div class="col-3">
                                                    <label for="presales_inquiry_type" class="form-label ">Inquiry
                                                        Type</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="presales_inquiry_type" id="presales_inquiry_type"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                </div>
                                                {{-- Pre-Sales Inquiry Sub-Type --}}
                                                <div class="col-3 sales_subtype" style="display: none;">
                                                    <label for="presales_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="presales_inquiry_subtype" id="presales_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the Pre-Sales Inquiry Type selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="presales_inquiry_dealership"
                                                        class="form-label">Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="presales_inquiry_dealership"
                                                        name="presales_inquiry_dealership" onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="presales_interested_vehicle" class="form-label">Interested
                                                        Vehicle</label>
                                                    <select class="form-control bg-white"
                                                        name="presales_interested_vehicle"
                                                        id="presales_interested_vehicle">
                                                        <option value="NULL">Select Interesterd Vehicle</option>
                                                        @foreach ($vehicles as $Vehicle)
                                                            <option value="{{ $Vehicle->vehicle_name }}">
                                                                {{ $Vehicle->vehicle_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="presales_interested_color" class="form-label">Interested
                                                        Colour
                                                    </label>
                                                    <select class="form-control bg-white" id="presales_interested_color"
                                                        name="presales_interested_color">
                                                        <option value="NULL">Select Interested Colour</option>
                                                        @foreach ($colors as $color)
                                                            <option value="{{ $color->color }}">{{ $color->color }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="presales_existing_vehicle" class="form-label">Existing
                                                        Vehicle</label>
                                                    <select class="form-control bg-white" id="presales_existing_vehicle"
                                                        name="presales_existing_vehicle">
                                                        <option value="NULL">Select Existing Vehicle</option>
                                                        @foreach ($pak_vehicles as $existing_vehicle)
                                                            <option value="{{ $existing_vehicle->vehicle_name }}">
                                                                {{ $existing_vehicle->vehicle_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="presales_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="presales_action"
                                                        id="presales_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="presales_inquiry_details" class="form-label">VOC&nbsp;<i
                                                            class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="10"
                                                        placeholder="Write customer's inquiry here..." id="presales_inquiry_details" name="presales_inquiry_details"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="presales_callback" class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="presales_callback" id="presales_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="presales_followup_date" class="form-label">Follow Up
                                                        Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="presales_followup_date" id="presales_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="presales_followup_time" class="form-label">Follow
                                                        Up Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="presales_followup_time" id="presales_followup_time">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-12 callback-value-Yes">
                                                    <label for="presales_followup_remarks" class="form-label">Follow-Up
                                                        Remarks
                                                    </label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="presales_followup_remarks"
                                                        id="presales_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="presales_assigned_agent" class="form-label">Assign To
                                                        Agent</label>
                                                    <select class="form-control bg-white" id="presales_assigned_agent"
                                                        name="presales_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign The Inquiry
                                                        </option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                                <div class="col-3 d-none">
                                                    <label for="start_date" class="form-label">Inquiry Start
                                                        Date</label>
                                                    <input type="date"class="form-control shadow-sm" id="start_date"
                                                        value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="col-3 d-none">
                                                    <label for="" class="form-label">Expected Clousre
                                                        Date</label>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="expected_closure" id=""
                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25" style="float: right">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                        </div>
                                        {{-- Pre-Sales INQUIRY END --}}
                                        {{-- Sales INQUIRY START --}}
                                        <div class="row collapse inq-div" id="saleInquiry">
                                            <div class="col-12 mb-2">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry
                                                    Details
                                                </h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_sales" class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_sales" id="inquiry_category_sales"
                                                        value="Sales" readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="sales_inquiry_channel" class="form-label">Inquiry
                                                        Channel
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="sales_inquiry_channel" id="sales_inquiry_channel">
                                                        @foreach ($channel as $sales_channel)
                                                            <option value="{{ $sales_channel->source }}">
                                                                {{ $sales_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- {{-- Sales Inquiry Type --}} -->
                                                <div class="col-3">
                                                    <label for="sales_inquirytype" class="form-label">Inquiry
                                                        Type</label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="sales_inquiry_type" id="sales_inquiry_type"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                </div>
                                                {{-- Sales Inquiry Sub-Type --}}
                                                <div class="col-3 sales_subtype" style="display: none;">
                                                    <label for="sales_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="sales_inquiry_subtype" id="sales_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the Sales INQUIRY TYPE selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded" onchange="getResponse(this.id,this.value)"
                                                        name="sales_pbo" id="sales_pbo" placeholder="PBO">
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_so_number" class="form-label">Sales Order Number
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="sales_so_number" id="sales_so_number"
                                                        placeholder="Sales Order Number">
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_chassis" class="form-label">Chassis
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm  rounded"
                                                        name="sales_chassis" id="sales_chassis" placeholder="Chassis"
                                                        readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="sales_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                        {{-- <input type="text" class="form-control shadow-sm  rounded"
                                                        name="sales_inquiry_dealership" id="sales_inquiry_dealership" placeholder="Dealership"
                                                        readonly> --}}


                                                    {{-- <select class="form-control bg-white inquiry_dealerships"
                                                        id="sales_inquiry_dealership" name="sales_inquiry_dealership">
                                                        <option value=""></option> --}}
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="sales_inquiry_dealership" name="sales_inquiry_dealership"
                                                        >

                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_vehicle" class="form-label">Vehicle
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        id="sales_vehicle" name="sales_vehicle" placeholder="Vehicle"
                                                        readonly>
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="sales_vehicle_colour" id="sales_vehicle_colour"
                                                        placeholder="Colour" readonly>
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="sales_action"
                                                        id="sales_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="sales_inquiry_details" class="form-label">VOC <i
                                                            class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" name="sales_inquiry_details" rows="10"
                                                        id="sales_inquiry_details" placeholder="Write customer's inquiry here..."></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="sales_callback" class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="sales_callback" id="sales_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="sales_followup_date" class="form-label">Follow Up
                                                        Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="sales_followup_date" id="sales_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="sales_followup_time" class="form-label">Follow
                                                        Up Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="sales_followup_time" id="sales_followup_time">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row callback-value-Yes">
                                                <div class="col-12">
                                                    <label for="sales_followup_remarks" class="form-label">Follow-Up
                                                        Remarks</label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" id="sales_followup_remarks"
                                                        name="sales_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="sales_assigned_agent" class="form-label">Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white" id="sales_assigned_agent"
                                                        name="sales_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign The Inquiry
                                                        </option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                                <div class="col-3 d-none">
                                                    <label for="start_date" class="form-label">Inquiry Start
                                                        Date</label>
                                                    <input type="date"class="form-control shadow-sm" id="start_date"
                                                        value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="col-3 d-none">
                                                    <label for="" class="form-label">Expected Clousre
                                                        Date</label>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="expected_closure" id=""
                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25" style="float: right">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Sales INQUIRY END --}}
                                        {{-- General INQUIRY START --}}
                                        <div class="row collapse inq-div" id="generalInquiry">
                                            <div class="col-12 mb-2">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry
                                                    Details
                                                </h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_general" class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_general" id="inquiry_category_general"
                                                        value="General" readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="general_inquiry_channel" class="form-label">Channel
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="general_inquiry_channel" id="general_inquiry_channel">
                                                        @foreach ($channel as $general_channel)
                                                            <option value="{{ $general_channel->source }}">
                                                                {{ $general_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- General Inquiry Type --}}
                                                <div class="col-3">
                                                    <label for="general_inquiry_type" class="form-label">Inquiry Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="general_inquiry_type" id="general_inquiry_type"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                </div>
                                                {{-- General Inquiry Sub-Type --}}
                                                <div class="col-3  sales_subtype" id="sales_subtype"
                                                    style="display: none;">
                                                    <label for="general_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="general_inquiry_subtype" id="general_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the General Inquiry Type  selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="general_pbo" id="general_pbo" placeholder="PBO">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="general_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="general_inquiry_dealership" name="general_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="NULL">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_vehicle" class="form-label">Vehicle
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="general_vehicle" id="general_vehicle" placeholder="Vehicle"
                                                        readonly>
                                                    {{-- <select class="form-control bg-white" name="general_vehicle"
                                                        id="general_vehicle">
                                                        <option value="NULL">Select Interesterd Vehicle</option>
                                                        @foreach ($vehicles as $general_vehicle)
                                                            <option value="{{ $general_vehicle->vehicle_name }}">
                                                                {{ $general_vehicle->vehicle_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="general_vehicle_colour" id="general_vehicle_colour"
                                                        placeholder="Vehicle" readonly>
                                                    {{-- <select class="form-control bg-white" id="general_vehicle_colour"
                                                        name="general_vehicle_colour">
                                                        <option value="NULL">Select Colour</option>
                                                        @foreach ($colors as $general_color)
                                                            <option value="{{ $general_color->color }}">
                                                                {{ $general_color->color }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="general_action"
                                                        id="general_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="general_inquiry_details" class="form-label">VOC <i
                                                            class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="10"
                                                        placeholder="Write customer's inquiry here..." id="general_inquiry_details" name="general_inquiry_details"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="general_callback" class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="general_callback" id="general_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="general_followup_date" class="form-label">Follow Up
                                                        Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="general_followup_date" id="general_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="general_followup_time" class="form-label">Follow
                                                        Up Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="general_followup_time" id="general_followup_time">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row callback-value-Yes">
                                                <div class="col-12">
                                                    <label for="general_followup_remarks" class="form-label">Follow-Up
                                                        Remarks</label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" id="general_followup_remarks"
                                                        name="general_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="general_assigned_agent" class="form-label">Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white" id="general_assigned_agent"
                                                        name="general_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign The Inquiry
                                                        </option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                                <div class="col-3 d-none">
                                                    <label for="start_date" class="form-label">Inquiry Start
                                                        Date</label>
                                                    <input type="date"class="form-control shadow-sm" id="start_date"
                                                        value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="col-3 d-none">
                                                    <label for="" class="form-label">Expected Clousre
                                                        Date</label>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="expected_closure" id=""
                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25" style="float: right">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                        </div>
                                        {{-- GENERAL INQUIRY END --}}
                                        {{-- AFS INQUIRY START --}}
                                        <div class="row collapse inq-div" id="afsInquiry">
                                            <div class="col-12 mb-2">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry
                                                    Details</h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_afs" class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_afs" id="inquiry_category_afs"
                                                        value="AFS" readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="afs_inquiry_channel" class="form-label">
                                                        Channel
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="afs_inquiry_channel" id="afs_inquiry_channel">
                                                        @foreach ($channel as $afs_channel)
                                                            <option value="{{ $afs_channel->source }}">
                                                                {{ $afs_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- AFS Inquiry Type --}}
                                                <div class="col-3">
                                                    <label for="afs_inquirytype" class="form-label">Inquiry Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white "
                                                        name="afs_inquiry_type" id="afs_inquirytype"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                    {{-- <select class="form-control shadow-sm  bg-white"
                                                    name="afs_inquiry_type" id="afs_inquirytype">
                                                    @foreach ($afs_inquiry_types as $afs_inquiry_type)
                                                        <option value="{{ $afs_inquiry_type->inquiry_type }}">
                                                            {{ $afs_inquiry_type->inquiry_type }}
                                                        </option>
                                                    @endforeach
                                                </select> --}}
                                                </div>
                                                {{-- AFS Inquiry Sub-Type --}}
                                                <div class="col-3 sales_subtype" id="afs-inquiry-subtype"
                                                    style="display: none;">
                                                    <label for="afs_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="afs_inquiry_subtype" id="afs_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the AFS INQUIRY TYPE selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_pbo" id="afs_pbo" onchange="getResponse(this.id,this.value)" placeholder="PBO">
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_so_number" class="form-label">Sales Order
                                                        Number
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_so_number" id="afs_so_number" onchange="getResponse(this.id,this.value)"
                                                        placeholder="Sales Order Number">
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_chassis" class="form-label">Chassis
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="afs_chassis" id="afs_chassis" placeholder="Chassis"
                                                        readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="afs_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="afs_inquiry_dealership" name="afs_inquiry_dealership"
                                                        onchange="Getalldealership()">

                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_vehicle" class="form-label">Vehicle
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="afs_vehicle" id="afs_vehicle" placeholder="Vehicle"
                                                        readonly>
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="afs_vehicle_colour" id="afs_vehicle_colour"
                                                        placeholder="Colour" readonly>
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_inquiry_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="afs_action"
                                                        id="afs_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="afs_inquiry_details" class="form-label">VOC <i
                                                            class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" name="afs_inquiry_details" id="afs_inquiry_details"
                                                        rows="10" placeholder="Write customer's inquiry here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="afs_callback" class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="afs_callback" id="afs_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="afs_followup_date" class="form-label">Follow
                                                        Up Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_followup_date" id="afs_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="afs_followup_time" class="form-label">Follow
                                                        Up
                                                        Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_followup_time" id="afs_followup_time">
                                                </div>

                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row callback-value-Yes">
                                                <div class="col-12">
                                                    <label for="afs_followup_remarks" class="form-label">Follow-Up
                                                        Remarks
                                                    </label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="afs_followup_remarks"
                                                        id="afs_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="afs_assigned_agent" class="form-label">Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white" id="afs_assigned_agent"
                                                        name="afs_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign The Inquiry
                                                        </option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                                <div class="col-3 d-none">
                                                    <label for="start_date" class="form-label">Inquiry Start
                                                        Date</label>
                                                    <input type="date"class="form-control shadow-sm" id="start_date"
                                                        value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="col-3 d-none">
                                                    <label for="" class="form-label">Expected Clousre
                                                        Date</label>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="expected_closure" id=""
                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25" style="float: right">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- AFS INQUIRY END --}}
                                        {{-- Dealership Network START --}}
                                        <div class="row collapse inq-div" id="dealersip-network-Inquiry">
                                            <div class="col-md-12 mb-4">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i> Inquiry Details
                                                </h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_dealernetwork" class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text" inputmode="url"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_dealernetwork"
                                                        id="inquiry_category_dealernetwork" value="Dealership Network"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="dealernetwork_inquiry_channel"
                                                        class="form-label">Channel</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="dealernetwork_inquiry_channel"
                                                        id="dealernetwork_inquiry_channel">
                                                        @foreach ($channel as $dealers_channel)
                                                            <option value="{{ $dealers_channel->source }}">
                                                                {{ $dealers_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                {{-- Dealership Network Inquiry Types --}}
                                                <div class="col-3">
                                                    <label for="dealernetwork_inquiry_type" class="form-label ">Inquiry
                                                        Type <i class='text-danger'>*</i></label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="dealernetwork_inquiry_type" id="dealernetwork_inquiry_type"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                </div>

                                                {{--  Dealership Network Inquiry Sub-Type --}}
                                                <div class="col-3 sales_subtype" style="display: none;">
                                                    <label for="dealernetwork_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="dealernetwork_inquiry_subtype"
                                                        id="dealernetwork_inquiry_subtype">
                                                        {{-- Options will be dynamically populated based on the Dealership Network INQUIRY TYPE selection --}}
                                                    </select>
                                                </div>
                                                {{-- Dealership Network Inquiry Sub-Types --}}
                                                <div class="col-3">
                                                    <label for="dealernetwork_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_pbo" id="dealernetwork_pbo"
                                                        placeholder="PBO">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="dealernetwork_inquiry_dealership"
                                                        class="form-label">Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        name="dealernetwork_inquiry_dealership"
                                                        id="dealernetwork_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="dealernetwork_vehicle" class="form-label">Vehicle
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_vehicle" id="dealernetwork_vehicle"
                                                        placeholder="Vehicle">
                                                    {{-- <select class="form-control bg-white" name="dealernetwork_vehicle"
                                                        id="dealernetwork_vehicle">
                                                        <option value="NULL">Select Vehicle</option>
                                                        @foreach ($vehicles as $dealernetwork_vehicle)
                                                            <option value="{{ $dealernetwork_vehicle->vehicle_name }}">
                                                                {{ $dealernetwork_vehicle->vehicle_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="dealernetwork_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_vehicle_colour"
                                                        id="dealernetwork_vehicle_colour" placeholder="Vehicle">
                                                    {{-- <select class="form-control bg-white"
                                                        id="dealernetwork_vehicle_colour"
                                                        name="dealernetwork_vehicle_colour">
                                                        <option value="NULL">Select Colour</option>
                                                        @foreach ($colors as $dealernetwork_color)
                                                            <option value="{{ $dealernetwork_color->color }}">
                                                                {{ $dealernetwork_color->color }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="dealernetwork_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="dealernetwork_action"
                                                        id="dealernetwork_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="dealernetwork_inquiry_details" class="form-label">VOC
                                                        <i class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="10"
                                                        placeholder="Write customer's inquiry here..." name="dealernetwork_inquiry_details"
                                                        id="dealernetwork_inquiry_details"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="dealernetwork_callback"
                                                        class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="dealernetwork_callback" id="dealernetwork_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="dealernetwork_followup_date" class="form-label">Follow
                                                        Up Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_followup_date"
                                                        id="dealernetwork_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="dealernetwork_followup_time" class="form-label">Follow
                                                        Up
                                                        Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_followup_time"
                                                        id="dealernetwork_followup_time">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row callback-value-Yes">
                                                <div class="col-12">
                                                    <label for="dealernetwork_followup_remarks"
                                                        class="form-label">Follow-Up
                                                        Remarks</label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="dealernetwork_followup_remarks"
                                                        id="dealernetwork_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="dealernetwork_assigned_agent" class="form-label">Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white"
                                                        id="dealernetwork_assigned_agent"
                                                        name="dealernetwork_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign</option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                                <div class="col-3 d-none">
                                                    <label for="start_date" class="form-label">Inquiry Start
                                                        Date</label>
                                                    <input type="date"class="form-control shadow-sm" id="start_date"
                                                        value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="col-3 d-none">
                                                    <label for="" class="form-label">Expected Clousre
                                                        Date</label>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="expected_closure" id=""
                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25" style="float: right">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- DEALERSHIP NETWORK END --}}
                                        {{-- FEEDBACK START --}}
                                        <div class="row collapse inq-div" id="feedbackInquiry">
                                            <div class="col-md-12 mb-4">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry
                                                    Details
                                                </h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_feedback" class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_feedback" id="inquiry_category_feedback"
                                                        value="Feedback" readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="feedback_inquiry_channel" class="form-label">
                                                        Channel
                                                    </label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="feedback_inquiry_channel" id="feedback_inquiry_channel">
                                                        @foreach ($channel as $feedback_channel)
                                                            <option value="{{ $feedback_channel->source }}">
                                                                {{ $feedback_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_inquirytype" class="form-label">Inquiry Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="feedback_inquiry_type" id="feedback_inquirytype"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                </div>
                                                <div class="col-3 sales_subtype" id="feedback-inquiry-subtype"
                                                    style="display: none;">
                                                    <label for="feedback_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="feedback_inquiry_subtype" id="feedback_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the FEEDBACK INQUIRY TYPE selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="feedback_pbo" id="feedback_pbo" placeholder="PBO">
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_so_number" class="form-label">Sales Order
                                                        Number
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="feedback_so_number" id="feedback_so_number"
                                                        placeholder="Sales Order Number">
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_chassis" class="form-label">Chassis
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="feedback_chassis" id="feedback_chassis"
                                                        placeholder="Chassis" readonly>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="feedback_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="feedback_inquiry_dealership"
                                                        name="feedback_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="NULL">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_vehicle" class="form-label">Vehicle
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="feedback_vehicle" id="feedback_vehicle"
                                                        placeholder="feedback_vehicle" readonly>

                                                    {{-- <select class="form-control bg-white" name="feedback_vehicle"
                                                        id="feedback_vehicle">
                                                        <option value="NULL">Select Vehicle</option>
                                                        @foreach ($vehicles as $feedback_vehicle)
                                                            <option value="{{ $feedback_vehicle->vehicle_name }}">
                                                                {{ $feedback_vehicle->vehicle_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm rounded"
                                                        name="feedback_vehicle_colour" id="feedback_vehicle_colour"
                                                        placeholder="feedback_vehicle_colour" readonly>
                                                    {{-- <select class="form-control bg-white" id="feedback_vehicle_colour"
                                                        name="feedback_vehicle_colour">
                                                        <option value="NULL">Select Colour</option>
                                                        @foreach ($colors as $feedback_vehcile_colour)
                                                            <option value="{{ $feedback_vehcile_colour->color }}">
                                                                {{ $feedback_vehcile_colour->color }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_inquiry_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="feedback_inquiry_action"
                                                        id="feedback_inquiry_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="feedback_inquiry_details" class="form-label">VOC <i
                                                            class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" name="feedback_inquiry_details"
                                                        id="feedback_inquiry_details" rows="10" placeholder="Write customer's inquiry here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="feedback_callback" class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="feedback_callback" id="feedback_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="feedback_followup_date" class="form-label">Follow Up
                                                        Preferred Date
                                                    </label>
                                                    <input type="date"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="feedback_followup_date" id="feedback_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="feedback_followup_time" class="form-label">Follow
                                                        Up Preferred Time </label>
                                                    <input type="time"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="feedback_followup_time" id="feedback_followup_time">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-12 callback-value-Yes">
                                                    <label for="feedback_followup_remarks" class="form-label">Follow-Up
                                                        Remarks
                                                    </label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="feedback_followup_remarks"
                                                        id="feedback_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="feedback_assigned_agent" class="form-label">feedback
                                                        Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white" id="feedback_assigned_agent"
                                                        name="feedback_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign</option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25" style="float: right">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- FEEDBACK END --}}
                                        {{-- Unsuccessful Calls START --}}
                                        <div class="row collapse inq-div" id="unsuccessful-calls-Inquiry">
                                            <div class="col-md-12 mb-4">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry
                                                    Details</h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_unsuccess_calls"
                                                        class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_unsuccess_calls"
                                                        id="inquiry_category_unsuccess_calls" value="Unsuccessful Call"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_channel" class="form-label">
                                                        Channel
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="unsuccess_calls_channel" id="unsuccess_calls_channel">
                                                        @foreach ($channel as $unsuccessful_calls_channel)
                                                            <option value="{{ $unsuccessful_calls_channel->source }}">
                                                                {{ $unsuccessful_calls_channel->source }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_inquiry_type" class="form-label">Inquiry
                                                        Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="unsuccess_calls_inquiry_type"
                                                        id="unsuccess_calls_inquiry_type"
                                                        onblur="getinquirysubtype(this.value)">
                                                    </select>
                                                </div>
                                                <div class="col-3  sales_subtype" id="sales_subtype"
                                                    style="display: none;">
                                                    <label for="unsuccess_calls_inquiry_subtype"
                                                        class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white inquiry_sub_type"
                                                        name="unsuccess_calls_inquiry_subtype"
                                                        id="unsuccess_calls_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the Unsuccessful Call Inquiry Type selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="unsuccess_calls_pbo" id="unsuccess_calls_pbo"
                                                        placeholder="PBO">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="unsuccess_calls_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="unsuccess_calls_dealership"
                                                        name="unsuccess_calls_dealership" onchange="Getalldealership()">
                                                        <option value="NULL">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_vehicle" class="form-label">Vehicle
                                                    </label>
                                                    <input type="text"
                                                        class="form-control shadow-sm rounded"
                                                        name="unsuccess_calls_vehicle" id="unsuccess_calls_vehicle"
                                                        placeholder="Vehicle" readonly>
                                                    {{-- <select class="form-control bg-white" name="unsuccess_calls_vehicle"
                                                        id="unsuccess_calls_vehicle">
                                                        <option value="NULL">Select Vehicle</option>
                                                        @foreach ($vehicles as $unsuccess_calls_vehicle)
                                                            <option value="{{ $unsuccess_calls_vehicle->vehicle_name }}">
                                                                {{ $unsuccess_calls_vehicle->vehicle_name }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_vehicle_colour"
                                                        class="form-label">Colour
                                                    </label>
                                                    <input type="text"
                                                        class="form-control shadow-sm rounded"
                                                        name="unsuccess_calls_vehicle_colour" id="unsuccess_calls_vehicle_colour"
                                                        placeholder="Colour" readonly>
                                                    {{-- <select class="form-control bg-white"
                                                        id="unsuccess_calls_vehicle_colour"
                                                        name="unsuccess_calls_vehicle_colour">
                                                        <option value="NULL">Select Colour</option>
                                                        @foreach ($colors as $unsuccess_calls_vehicle_colour)
                                                            <option value="{{ $unsuccess_calls_vehicle_colour->color }}">
                                                                {{ $unsuccess_calls_vehicle_colour->color }}
                                                            </option>
                                                        @endforeach
                                                    </select> --}}
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="unsuccess_calls_action"
                                                        id="unsuccess_calls_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label for="unsuccess_calls_inquiry_details"
                                                        class="form-label">VOC&nbsp;<i class='text-danger'>*</i></label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" name="unsuccess_calls_inquiry_details"
                                                        id="unsuccess_calls_inquiry_details" rows="10" placeholder="Write customer's inquiry here..."></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 callback-value-No">
                                                    <label for="unsuccess_calls_callback"
                                                        class="form-label">Callback</label>
                                                    <select class="form-control shadow-sm bg-white callback"
                                                        name="unsuccess_calls_callback" id="unsuccess_calls_callback">
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    </select>
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="unsuccess_calls_followup_date" class="form-label">Follow
                                                        Up Preferred Date
                                                    </label>
                                                    <input type="date"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="unsuccess_calls_followup_date"
                                                        id="unsuccess_calls_followup_date">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="unsuccess_calls_followup_time" class="form-label">Follow
                                                        Up Preferred Time </label>
                                                    <input type="time"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="unsuccess_calls_followup_time"
                                                        id="unsuccess_calls_followup_time">
                                                </div>
                                            </div>
                                            <div class="row callback-value-Yes">
                                                <div class="col-12">
                                                    <label for="unsuccess_calls_followup_remarks"
                                                        class="form-label">Follow-Up
                                                        Remarks</label>
                                                    <textarea class="form-control shadow-sm bg-white rounded" rows="5" name="unsuccess_calls_followup_remarks"
                                                        id="unsuccess_calls_followup_remarks"></textarea>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_assigned_agent"
                                                        class="form-label">Assign To
                                                        Agent</label>
                                                    <select class="form-control bg-white"
                                                        id="unsuccess_calls_assigned_agent"
                                                        name="unsuccess_calls_assigned_agent">
                                                        <option value="NULL">Select Agent To Assign</option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>

                                                <div class="col-3 d-none">
                                                    <label for="start_date" class="form-label">Inquiry Start
                                                        Date</label>
                                                    <input type="date"class="form-control shadow-sm"
                                                        id="start_date" value="{{ date('Y-m-d') }}" readonly>
                                                </div>
                                                <div class="col-3 d-none">
                                                    <label for="" class="form-label">Expected Clousre
                                                        Date</label>
                                                    <input type="text" class="form-control shadow-sm"
                                                        name="expected_closure" id=""
                                                        value="{{ date('Y-m-d', strtotime(date('Y-m-d') . ' + 7 day')) }}"
                                                        readonly>
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-8"></div>
                                                <div class="col-4">
                                                    <input type="submit" value="Submit" id=""
                                                        class="btn btn-round btn-primary w-25 text-bold"
                                                        style="float: right">
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Unsuccessful Calls END --}}
                                    </form>
                                </div>
                                <!-- card-body END -->
                            </div>
                            <!-- CARD END -->
                        </div>
                        <!-- ROW END -->
                    </div>
                    <!-- container ROW END -->
                </div>
                <!-- container END -->
                <!-- section-body ENS -->
            </div>
        </section>
        <!-- section START -->
    </div>
    <!-- main-content END -->

    <script src="{{ asset('scripts/common.js') }}"></script>
    <script src="{{ asset('scripts/inquiryforms.js') }}"></script>
    <script src="{{ asset('scripts/jquery.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inq-div').hide(); // Hide all divs initially
            // Click event handler for buttons
            $('[data-toggle="collapse"]').click(function() {
                var target = $(this).data('target'); // Get the target div id
                $('.inq-div').not(target).hide(); // Hide all divs except the target
                $(target).toggle(); // Toggle the visibility of the target div
                $('[data-toggle="collapse"]').removeClass('bg-dark');
                $(this).addClass('bg-dark');
            });

        });
    </script>
    <script>
        // Callback - Follow-Up Date, Time & Follow-Up Remarks
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
