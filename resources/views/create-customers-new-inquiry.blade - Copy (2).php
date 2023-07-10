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
            font-size: 10px !important;
        }
    </style>
    <!-- main-content START -->
    <div class="main-content m-2 p-2">
        <!-- section START -->
        <section class="section">
            <!-- section-body START -->
            <div class="section-body">
                <!-- container START -->
                <div class="container-fluid bg-success p-2">
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
                                        <div class="row">
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
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id=""
                                                    data-toggle="collapse" data-target="#afsInquiry"><i
                                                        class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;AFS
                                                </button>
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id=""
                                                    data-toggle="collapse" data-target="#generalInquiry"><i
                                                        class="fa fa-question-circle" aria-hidden="true"></i>&nbsp;General
                                                </button>
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id=""
                                                    data-toggle="collapse" data-target="#saleInquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Sales</button>
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id=""
                                                    data-toggle="collapse" data-target="#presaleInquiry"><i
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
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-2" id=""
                                                    data-toggle="collapse" data-target="#unsuccessful-calls-Inquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Unsuccessful Call</button>
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-1" id=""
                                                    data-toggle="collapse" data-target="#feedbackInquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Feedback
                                                </button>
                                                <button type="button" style="float: right;"
                                                    class="btn btn-round btn-primary mr-1" id=""
                                                    data-toggle="collapse" data-target="#dealersip-network-Inquiry"><i
                                                        class="fa fa-question-circle"
                                                        aria-hidden="true"></i>&nbsp;Dealership Network</button>
                                            </div>
                                        </div>
                                        {{-- row END --}}
                                        {{-- Pre-Sales INQUIRY START --}}
                                        <div class="row collapse inq-div" id="presaleInquiry">
                                            <div class="col-12 mb-2">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;Inquiry Details
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
                                                <div class="col-3">
                                                    <label for="presales_inquiry_type" class="form-label ">Inquiry
                                                        Type</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="presales_inquiry_type" id="presales_inquiry_type">
                                                        @foreach ($presale_inquiry_types as $presales_inquiry_type)
                                                            <option value="{{ $presales_inquiry_type->inquiry_type }}">
                                                                {{ $presales_inquiry_type->inquiry_type }}
                                                            </option>
                                                        @endforeach
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
                                                        <option value="">Select Interested Colour</option>
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
                                                        <option value="">Select Agent To Assign The Inquiry
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
                                                <div class="col-3">
                                                    <label for="sales_inquiry_type" class="form-label">Inquiry
                                                        Type</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="sales_inquiry_type" id="sales_inquiry_type">
                                                        @foreach ($sales_inquiry_types as $sales_inquiry_type)
                                                            <option value="{{ $sales_inquiry_type->inquiry_type }}">
                                                                {{ $sales_inquiry_type->inquiry_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3" id="sales-inquiry-subtype" style="display: none;">
                                                    <label for="sales_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="sales_inquiry_subtype" id="sales_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
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
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="sales_chassis" id="sales_chassis" placeholder="Chassis">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="sales_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="sales_inquiry_dealership" name="sales_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_vehicle" class="form-label">Vehcile
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        id="sales_vehicle" name="sales_vehicle" placeholder="Vehcile">
                                                </div>
                                                <div class="col-3">
                                                    <label for="sales_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="sales_vehicle_colour" id="sales_vehicle_colour"
                                                        placeholder="Colour">
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
                                                        <option value="">Select Agent To Assign The Inquiry</option>
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
                                                <div class="col-3">
                                                    <label for="general_inquiry_type" class="form-label">Inquiry Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="general_inquiry_type" id="general_inquiry_type">
                                                        @foreach ($general_inquiry_types as $general_inquiry_type)
                                                            <option value="{{ $general_inquiry_type->inquiry_type }}">
                                                                {{ $general_inquiry_type->inquiry_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="general_pbo" id="general_pbo" placeholder="PBO">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="general_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="general_inquiry_dealership" name="general_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_vehicle" class="form-label">Vehcile
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="general_vehicle" id="general_vehicle"
                                                        placeholder="Vehcile">
                                                </div>
                                                <div class="col-3">
                                                    <label for="general_vehicle_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        id="general_vehicle_colour" name="general_vehicle_colour"
                                                        placeholder="Colour">
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
                                                        <option value="">Select Agent To Assign The Inquiry</option>
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
                                                <div class="col-3">
                                                    <label for="afs_inquirytype" class="form-label">Inquiry Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="afs_inquiry_type" id="afs_inquirytype">
                                                        @foreach ($afs_inquiry_types as $afs_inquiry_type)
                                                            <option value="{{ $afs_inquiry_type->inquiry_type }}">
                                                                {{ $afs_inquiry_type->inquiry_type }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-3" id="afs-inquiry-subtype" style="display: none;">
                                                    <label for="afs_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="afs_inquiry_subtype" id="afs_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the INQUIRY TYPE selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_pbo" id="afs_pbo" placeholder="PBO">
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_so_number" class="form-label">Sales Order
                                                        Number
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_so_number" id="afs_so_number"
                                                        placeholder="Sales Order Number">
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_chassis" class="form-label">Chassis
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_chassis" id="afs_chassis" placeholder="Chassis">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="afs_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="afs_inquiry_dealership" name="afs_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_vehcile" class="form-label">Vehcile
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_vehcile" id="afs_vehcile" placeholder="Vehcile">
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_vehcile_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_vehcile_colour" id="afs_vehcile_colour"
                                                        placeholder="Colour">
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
                                                    <label for="afs_follow_up" class="form-label">Follow
                                                        Up Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_follow_up" id="afs_follow_up">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="afs_followup_prefered_time" class="form-label">Follow
                                                        Up
                                                        Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="afs_followup_prefered_time" id="afs_followup_prefered_time">
                                                </div>
                                                <div class="col-3">
                                                    <label for="afs_inquiry_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white" name="afs_inquiry_action"
                                                        id="afs_inquiry_action">
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
                                                    <label for="general_assigned_agent" class="form-label">Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white" id="general_assigned_agent"
                                                        name="general_assigned_agent">
                                                        <option value="">Select Agent To Assign The Inquiry</option>
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
                                        {{-- DEALERSHIP NETWORK START --}}
                                        <div class="row collapse inq-div" id="dealersip-network-Inquiry">
                                            <div class="col-md-12 mb-4">
                                                <h5><i class="fa fa-comments" aria-hidden="true"></i> Inquiry Details
                                                </h5>
                                            </div>
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-2">
                                                    <label for="inquiry_category_dealership_network"
                                                        class="form-label">Inquiry
                                                        Category</label>
                                                    <input type="text" inputmode="url"
                                                        class="form-control shadow-sm p-3 mb-3 text-center"
                                                        name="inquiry_category_dealership_network"
                                                        id="inquiry_category_dealership_network" value="Dealersip Network"
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
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="dealernetwork_inquiry_type" id="dealernetwork_inquiry_type">
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
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="dealernetwork_pbo" id="dealernetwork_pbo"
                                                        placeholder="PBO">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="form-label">Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="" name="dealernetwork_inquiry_dealership"
                                                        onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="dealernetwork_vehcile" class="form-label">Vehcile
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="dealernetwork_vehcile" id="dealernetwork_vehcile"
                                                        placeholder="Vehcile">
                                                </div>
                                                <div class="col-3">
                                                    <label for="dealernetwork_vehcile_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="dealernetwork_vehcile_colour"
                                                        id="dealernetwork_vehcile_colour" placeholder="Colour">
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
                                                    <label for="dealernetwork_follow_up" class="form-label">Follow
                                                        Up Preferred Date
                                                    </label>
                                                    <input type="date" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_follow_up" id="dealernetwork_follow_up">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="dealernetwork_followup_prefered_time"
                                                        class="form-label">Follow Up
                                                        Preferred Time </label>
                                                    <input type="time" class="form-control shadow-sm bg-white rounded"
                                                        name="dealernetwork_followup_prefered_time"
                                                        id="dealernetwork_followup_prefered_time">
                                                </div>
                                            </div>
                                            {{-- row END --}}
                                            {{-- row START --}}
                                            <div class="row">
                                                <div class="col-3">
                                                    <label for="dealernetwork_inquiry_action" class="form-label">Actions
                                                    </label>
                                                    <select class="form-control bg-white"
                                                        name="dealernetwork_inquiry_action"
                                                        id="dealernetwork_inquiry_action">
                                                        <option value="FCR">FCR (First Call Resolution)</option>
                                                        <option value="Follow Up">Follow Up</option>
                                                        <option value="Action Required">Action Required</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Registration Date</label>
                                                    <input type="date" value="{{ date('Y-m-d') }}" readonly
                                                        class="form-control" id="">
                                                </div>
                                            </div>
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
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="feedback_inquiry_channel" id="feedback_inquiry_channel">
                                                        @foreach ($channel as $unsuccessful_calls_channel)
                                                        <option value="{{ $unsuccessful_calls_channel->source }}">
                                                            {{ $unsuccessful_calls_channel->source }}
                                                        </option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_inquirytype" class="form-label">Inquiry Type
                                                    </label>
                                                    <select class="form-control shadow-sm  bg-white"
                                                        name="feedback_inquirytype" id="feedback_inquirytype">
                                                        <option value="Product">Product</option>
                                                    </select>
                                                </div>
                                                <div class="col-3" id="feedback-inquiry-subtype" style="display: none;">
                                                    <label for="feedback_inquiry_subtype" class="form-label">Inquiry
                                                        Sub-Type</label>
                                                    <select class="form-control shadow-sm bg-white"
                                                        name="feedback_inquiry_subtype" id="feedback_inquiry_subtype">
                                                        <!-- Options will be dynamically populated based on the FEEDBACK INQUIRY TYPE selection -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="feedback_pbo" id="feedback_pbo" placeholder="PBO">
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_so_number" class="form-label">Sales Order
                                                        Number
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="feedback_so_number" id="feedback_so_number"
                                                        placeholder="Sales Order Number">
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_chassis" class="form-label">Chassis
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="feedback_chassis" id="feedback_chassis"
                                                        placeholder="Chassis">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="feedback_inquiry_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="feedback_inquiry_dealership"
                                                        name="feedback_inquiry_dealership" onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_vehcile" class="form-label">Vehcile
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="feedback_vehcile" id="feedback_vehcile"
                                                        placeholder="Vehcile">
                                                </div>
                                                <div class="col-3">
                                                    <label for="feedback_vehcile_colour" class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="feedback_vehcile_colour" id="feedback_vehcile_colour"
                                                        placeholder="Colour">
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
                                                    <label for="feedback_follow_up" class="form-label">Follow Up
                                                        Preferred Date
                                                    </label>
                                                    <input type="date"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="feedback_follow_up" id="feedback_follow_up">
                                                </div>
                                                <div class="col-3 callback-value-Yes">
                                                    <label for="feedback_followup_prefered_time"
                                                        class="form-label">Follow
                                                        Up Preferred Time </label>
                                                    <input type="time"
                                                        class="form-control shadow-sm bg-white rounded"
                                                        name="feedback_followup_prefered_time"
                                                        id="feedback_followup_prefered_time">
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
                                                <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                <div class="col-3">
                                                    <label for="unsuccessful_calls_assigned_agent"
                                                        class="form-label">Assigned
                                                        Agent</label>
                                                    <select class="form-control bg-white"
                                                        id="unsuccessful_calls_assigned_agent"
                                                        name="unsuccessful_calls_assigned_agent">
                                                        <option value="">Select Agent To Assign</option>
                                                        <option value="Shahrukh">Shahrukh</option>
                                                        <option value="Hasan">Hasan</option>
                                                    </select>
                                                </div>
                                                <?php } ?>
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Registration Date</label>
                                                    <input type="date" value="{{ date('Y-m-d') }}" readonly
                                                        class="form-control" id="">
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
                                                        id="inquiry_category_unsuccess_calls" value="Unsuccessful Calls"
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
                                                        id="unsuccess_calls_inquiry_type">
                                                        <option value="Dead on Arrival">Dead on Arrival</option>
                                                        <option value="Call Drop During Conversation">Call Drop During
                                                            Conversation</option>
                                                        <option value="Distortion">Distortion</option>
                                                        <option value="Crank Caller">Crank Caller</option>
                                                        <option value="Abusive Call">Abusive Call</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_pbo" class="form-label">PBO
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="unsuccess_calls_pbo" id="unsuccess_calls_pbo"
                                                        placeholder="PBO">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="unsuccess_calls_dealership" class="form-label">
                                                        Dealership</label>
                                                    <select class="form-control bg-white inquiry_dealerships"
                                                        id="unsuccess_calls_dealership"
                                                        name="unsuccess_calls_dealership" onchange="Getalldealership()">
                                                        <option value="">Select Dealership</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_vehicle" class="form-label">Vehcile
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="unsuccess_calls_vehicle" id="unsuccess_calls_vehicle"
                                                        placeholder="Vehcile">
                                                </div>
                                                <div class="col-3">
                                                    <label for="unsuccess_calls_vehicle_colour"
                                                        class="form-label">Colour
                                                    </label>
                                                    <input type="text" class="form-control shadow-sm bg-whiterounded"
                                                        name="unsuccess_calls_vehicle_colour"
                                                        id="unsuccess_calls_vehicle_colour" placeholder="Colour">
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
                                                        <option value="">Select Agent If Wanted To Assign The
                                                            Inquiry</option>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.inq-div').hide(); // Hide all divs initially

            // Click event handler for buttons
            $('[data-toggle="collapse"]').click(function() {
                var target = $(this).data('target'); // Get the target div id
                $('.inq-div').not(target).hide(); // Hide all divs except the target
                $(target).toggle(); // Toggle the visibility of the target div
            });
        });
    </script>

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


        // feedback category
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
    <script>
        // SALES
        // Get references to the dropdowns
        const inquiryTypeDropdown = document.getElementById('sales_inquiry_type');
        const inquirySubTypeDiv = document.getElementById('sales-inquiry-subtype');
        const inquirySubTypeDropdown = document.getElementById('sales_inquiry_subtype');

        // Add event listener to the inquiryTypeDropdown
        inquiryTypeDropdown.addEventListener('change', function() {
            // Hide the inquirySubTypeDiv by default
            inquirySubTypeDiv.style.display = 'none';

            // Get the selected value
            const selectedValue = inquiryTypeDropdown.value;

            // Define the options for each inquiry type
            const optionsByInquiryType = {
                'Refund': [{
                        value: 'GST Refund',
                        text: 'GST Refund'
                    },
                    {
                        value: 'Excess Amount Refund',
                        text: 'Excess Amount Refund'
                    },
                    {
                        value: 'FED Refund',
                        text: 'FED Refund'
                    }
                ],
                'Booking Amendments': [{
                        value: 'Colour Change Request',
                        text: 'Colour Change Request'
                    },
                    {
                        value: 'Variant Change Request',
                        text: 'Variant Change Request'
                    },
                    {
                        value: 'Delivery Premises Change Request',
                        text: 'Delivery Premises Change Request'
                    },
                    {
                        value: 'Change of Delivery personnel',
                        text: 'Change of Delivery personnel'
                    }
                ]
            };

            // Clear previous options
            while (inquirySubTypeDropdown.options.length > 0) {
                inquirySubTypeDropdown.remove(0);
            }

            // Check if the selectedValue is in optionsByInquiryType
            if (selectedValue in optionsByInquiryType) {
                // Populate the inquirySubTypeDropdown with options based on the selected value
                optionsByInquiryType[selectedValue].forEach(function(option) {
                    const optionElement = document.createElement('option');
                    optionElement.value = option.value;
                    optionElement.text = option.text;
                    inquirySubTypeDropdown.add(optionElement);
                });

                // Show the inquirySubTypeDiv
                inquirySubTypeDiv.style.display = 'block';
            }
        });
    </script>
@endsection
