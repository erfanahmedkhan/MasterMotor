@extends('template')
@section('title', 'Inquiry Details')
@section('content')
    <style>
        .card {
            --bs-card-border-width: 5px !important;
            /* height: 444px !important; */
        }

        .card-body {
            padding: 5px 15px 5px 15px !important;
        }

        .form-label {
            font-weight: bold !important
        }

        .form-control {
            font-size: 11px !important;
            font-weight: bold !important
        }

        input {
            text-align: center;
        }

        .btn {
            border-radius: 50px !important;
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

                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong>{{ session('error') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            {{-- <form action="{{ url('updatecustomerjourneyinquiry/' . $inquiry[0]->id) }}"
                                                method="POST"> --}}
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                        style="cursor: pointer; font-size: 20px"></i>
                                    <strong class="card-title">&nbsp;Inquiry Details</strong>
                                </div>

                                <div class="card-body">
                                    <form action="{{ url('update-inquiry-status/' . $inquiry[0]->id) }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="form-label">Customer Name</label>
                                                <input type="text" value="{{ $inquiry[0]->cname }}"
                                                    class="form-control shadow-sm bg-white  rounded" readonly>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Mobile</label>
                                                <input type="text" value="{{ $inquiry[0]->mobile }}"
                                                    class="form-control shadow-sm bg-white rounded" readonly>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" value="{{ $inquiry[0]->cemail }}"
                                                    class="form-control shadow-sm bg-white  rounded" readonly>
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">City</label>
                                                <input type="text" value="{{ $inquiry[0]->city_name }}"
                                                    class="form-control shadow-sm bg-white  rounded" readonly>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-3">
                                                <label class="form-label">Inquiry Number</label>
                                                <input type="text" value="{{ $inquiry[0]->inquiry_number }}"
                                                    class="form-control shadow-sm rounded" name="inquiry_number" readonly>
                                            </div>
                                        </div>
                                        <div class="row mt-1">
                                            <div class="col-12">
                                                <label for="inquiry_details" class="form-label font-weight-bold">VOC</label>
                                                <textarea class="form-control shadow-sm rounded mw-100" rows="10" readonly>{{ $inquiry[0]->inquiry_details }}</textarea>
                                            </div>
                                        </div>
                                        {{-- Pre-Sales START --}}
                                        @if ($inquiry[0]->inquiry_category == 'Pre-Sales')
                                            <div class="row mt-1">
                                                {{-- Inquiry Category --}}
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Category</label>
                                                    <input type="text" value="{{ $inquiry[0]->inquiry_category }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div>
                                                {{-- Channel --}}
                                                <div class="col-3">
                                                    <label class="form-label">Channel</label>
                                                    <input type="text" value="{{ $inquiry[0]->channel }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Source --}}
                                                @if (!empty($inquiry[0]->source))
                                                    <div class="col-3">
                                                        <label class="form-label">Source</label>
                                                        <input type="text" value="{{ $inquiry[0]->source }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Inquiry Type --}}
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Type</label>
                                                    <input type="text" value="{{ $inquiry[0]->inquiry_type }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div>
                                                {{-- Inquiry Sub-Type --}}
                                                @if (!empty($inquiry[0]->inquiry_sub_type))
                                                    <div class="col-3">
                                                        <label class="form-label">Inquiry Sub-Type</label>
                                                        <input type="text" value="{{ $inquiry[0]->inquiry_sub_type }}"
                                                            class="form-control shadow-sm rounded" disabled>
                                                    </div>
                                                @endif
                                                {{-- Dealership --}}
                                                @if (!empty($inquiry[0]->dealer_name))
                                                    <div class="col-3">
                                                        <label class="form-label">Dealership</label>
                                                        <input type="text" value="{{ $inquiry[0]->dealer_name }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Dealership</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Interested Vehicle --}}
                                                @if (empty($inquiry[0]->interested_vehicle))
                                                    <div class="col-3">
                                                        <label class="form-label">Interested Vehicle</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Interested Vehicle</label>
                                                        <input type="text"
                                                            value="{{ $inquiry[0]->interested_vehicle }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Interested Color --}}
                                                @if (empty($inquiry[0]->interested_color))
                                                    <div class="col-3">
                                                        <label class="form-label">Interested Colour</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Interested Colour</label>
                                                        <input type="text" value="{{ $inquiry[0]->interested_color }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Existing Vehicle --}}
                                                @if (!empty($inquiry[0]->existing_vehicle))
                                                    <div class="col-3">
                                                        <label class="form-label">Existing Vehicle</label>
                                                        <input type="text" value="{{ $inquiry[0]->existing_vehicle }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Existing Vehicle</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Action --}}
                                                <div class="col-3">
                                                    <label class="form-label">Action</label>
                                                    <input type="text" value="{{ $inquiry[0]->action }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Callback --}}
                                                <div class="col-3">
                                                    <label class="form-label">Callback</label>
                                                    <input type="text" value="{{ $inquiry[0]->callback }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Follow-up Preferred Date & Time --}}
                                                @if ($inquiry[0]->callback == 'Yes')
                                                    <?php $followup_prefered_date = date_create($inquiry[0]->followup_prefered_date); ?>
                                                    <div class="col-3">
                                                        <label class="form-label">Follow-up Preferred Date</label>
                                                        <input type="text"
                                                            value="{{ date_format($followup_prefered_date, 'd-m-Y') }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Follow-up Preferred Time</label>
                                                        <input type="text"
                                                            value="{{ $inquiry[0]->followup_prefered_time }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Assigned Agent --}}
                                                @if (!empty($inquiry[0]->assigned_agent))
                                                    <div class="col-3">
                                                        <label class="form-label">Assigned Agent</label>
                                                        <input type="text" value="{{ $inquiry[0]->assigned_agent }}"
                                                            class="form-control shadow-sm rounded" disabled>
                                                    </div>
                                                @endif
                                                {{-- Status --}}
                                                <div class="col-3">
                                                    <label for="inquiry_status" class="form-label ">Status</label>
                                                    @if (
                                                        !(
                                                            $inquiry[0]->status == 'Closed' ||
                                                            $inquiry[0]->status == 'Request to force closed' ||
                                                            $inquiry[0]->status == 'Force closed'
                                                        ))
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status" onchange="handleDropdownChange()">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}
                                                            </option>
                                                            <option value="Request to force closed" class="text-danger">
                                                                Request to force closed</option>
                                                        </select>
                                                    @elseif ($inquiry[0]->status == 'Force closed')
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}</option>
                                                        </select>
                                                    @else
                                                        <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}
                                                            </option>
                                                            <option value="Force closed" class="text-danger">Force closed
                                                            </option>
                                                        </select>
                                                        <?php } else {?>
                                                        <select class="form-control" name="complaint_status"
                                                            id="complaint_status">
                                                            <option value="{{ $inquiry[0]->status }}">Request to force
                                                                closed
                                                            </option>
                                                        </select>
                                                        <?php } ?>
                                                    @endif
                                                </div>
                                                {{-- Inquiry Creation Date --}}
                                                <div class="col-3">
                                                    <?php $start_date = date_create($inquiry[0]->start_date); ?>
                                                    <label class="form-label">Inquiry Creation Date</label>
                                                    <input type="text" value="{{ date_format($start_date, 'd-m-Y') }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Expected Closure Date --}}
                                                <div class="col-3">
                                                    <?php $expected_closure = date_create($inquiry[0]->expected_closure); ?>
                                                    <label class="form-label">Expected Closure Date</label>
                                                    <input type="text"
                                                        value="{{ date_format($expected_closure, 'd-m-Y') }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- Pre-Sales END --}}
                                        {{-- Sales, & Feedback START --}}
                                        @if (
                                            $inquiry[0]->inquiry_category == 'Sales' or
                                                $inquiry[0]->inquiry_category == 'Feedback' or
                                                $inquiry[0]->inquiry_category == 'AFS')
                                            <div class="row mt-1">
                                                {{-- Inquiry Category --}}
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Category</label>
                                                    <input type="text" value="{{ $inquiry[0]->inquiry_category }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div>
                                                {{-- Channel --}}
                                                <div class="col-3">
                                                    <label class="form-label">Channel</label>
                                                    <input type="text" value="{{ $inquiry[0]->channel }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Inquiry Type --}}
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Type</label>
                                                    <input type="text" value="{{ $inquiry[0]->inquiry_type }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div>
                                                {{-- Inquiry Sub-Type --}}
                                                @if (!empty($inquiry[0]->inquiry_sub_type))
                                                    <div class="col-3">
                                                        <label class="form-label">Inquiry Sub-Type</label>
                                                        <input type="text" value="{{ $inquiry[0]->inquiry_sub_type }}"
                                                            class="form-control shadow-sm rounded" disabled>
                                                    </div>
                                                @endif
                                                {{-- PBO --}}
                                                @if (!empty($inquiry[0]->pbo))
                                                    <div class="col-3">
                                                        <label class="form-label">PBO</label>
                                                        <input type="text" value="{{ $inquiry[0]->pbo }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">PBO</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- SO Number --}}
                                                @if (!empty($inquiry[0]->sales_order_number))
                                                    <div class="col-3">
                                                        <label class="form-label">SO Number</label>
                                                        <input type="text"
                                                            value="{{ $inquiry[0]->sales_order_number }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">SO Number</label>
                                                        <input type="text" value="N/A"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Chassis Number --}}
                                                @if (!empty($inquiry[0]->chassis_number))
                                                    <div class="col-3">
                                                        <label class="form-label">Chassis Number</label>
                                                        <input type="text" value="{{ $inquiry[0]->chassis_number }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Chassis Number</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Dealership --}}
                                                @if (!empty($inquiry[0]->dealer_name))
                                                    <div class="col-3">
                                                        <label class="form-label">Dealership</label>
                                                        <input type="text" value="{{ $inquiry[0]->dealer_name }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Dealership</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Vehicle --}}
                                                @if (!empty($inquiry[0]->vehicle))
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle</label>
                                                        <input type="text" value="{{ $inquiry[0]->vehicle }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Vehicle Colour --}}
                                                @if (!empty($inquiry[0]->vehicle_colour))
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle Colour</label>
                                                        <input type="text" value="{{ $inquiry[0]->vehicle_colour }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle Colour</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Action --}}
                                                <div class="col-3">
                                                    <label class="form-label">Action</label>
                                                    <input type="text" value="{{ $inquiry[0]->action }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Callback --}}
                                                <div class="col-3">
                                                    <label class="form-label">Callback</label>
                                                    <input type="text" value="{{ $inquiry[0]->callback }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Follow-up Preferred Date & Time --}}
                                                @if ($inquiry[0]->callback == 'Yes')
                                                    <?php $followup_prefered_date = date_create($inquiry[0]->followup_prefered_date); ?>
                                                    <div class="col-3">
                                                        <label class="form-label">Follow-up Preferred Date</label>
                                                        <input type="text"
                                                            value="{{ date_format($followup_prefered_date, 'd-m-Y') }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Follow-up Preferred Time</label>
                                                        <input type="text"
                                                            value="{{ $inquiry[0]->followup_prefered_time }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Assigned Agent --}}
                                                @if (!empty($inquiry[0]->assigned_agent))
                                                    <div class="col-3">
                                                        <label class="form-label">Assigned Agent</label>
                                                        <input type="text" value="{{ $inquiry[0]->assigned_agent }}"
                                                            class="form-control shadow-sm rounded" disabled>
                                                    </div>
                                                @endif
                                                {{-- Status --}}
                                                {{-- <div class="col-3">
                                                    <label for="city" class="form-label ">Status</label>
                                                    <input type="text" value="{{ $inquiry[0]->status }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div> --}}
                                                <div class="col-3">
                                                    <label for="inquiry_status" class="form-label ">Status</label>
                                                    @if (
                                                        !(
                                                            $inquiry[0]->status == 'Closed' ||
                                                            $inquiry[0]->status == 'Request to force closed' ||
                                                            $inquiry[0]->status == 'Force closed'
                                                        ))
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status" onchange="handleDropdownChange()">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}
                                                            </option>
                                                            <option value="Request to force closed" class="text-danger">
                                                                Request to force closed</option>
                                                        </select>
                                                    @elseif ($inquiry[0]->status == 'Force closed')
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status" disabled>
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}</option>
                                                        </select>
                                                    @else
                                                        <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}
                                                            </option>
                                                            <option value="Force closed" class="text-danger">Force closed
                                                            </option>
                                                        </select>
                                                        <?php } else {?>
                                                        <select class="form-control" name="complaint_status"
                                                            id="complaint_status">
                                                            <option value="{{ $inquiry[0]->status }}">Request to force
                                                                closed
                                                            </option>
                                                        </select>
                                                        <?php } ?>
                                                    @endif
                                                </div>
                                                {{-- Inquiry Creation Date --}}
                                                <div class="col-3">
                                                    <?php $start_date = date_create($inquiry[0]->start_date); ?>
                                                    <label class="form-label">Inquiry Creation Date</label>
                                                    <input type="text" value="{{ date_format($start_date, 'd-m-Y') }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Expected Closure Date --}}
                                                <div class="col-3">
                                                    <?php $expected_closure = date_create($inquiry[0]->expected_closure); ?>
                                                    <label class="form-label">Expected Closure Date</label>
                                                    <input type="text"
                                                        value="{{ date_format($expected_closure, 'd-m-Y') }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- Sales & Feedback END --}}
                                        {{-- General, Unsuccessful Call, & Dealership Network START --}}
                                        @if (
                                            $inquiry[0]->inquiry_category == 'General' or
                                                $inquiry[0]->inquiry_category == 'Dealership Network' or
                                                $inquiry[0]->inquiry_category == 'Unsuccessful Call')
                                            <div class="row mt-1">
                                                {{-- Inquiry Category --}}
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Category</label>
                                                    <input type="text" value="{{ $inquiry[0]->inquiry_category }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div>
                                                {{-- Channel --}}
                                                <div class="col-3">
                                                    <label class="form-label">Channel</label>
                                                    <input type="text" value="{{ $inquiry[0]->channel }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Inquiry Type --}}
                                                <div class="col-3">
                                                    <label class="form-label">Inquiry Type</label>
                                                    <input type="text" value="{{ $inquiry[0]->inquiry_type }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div>
                                                {{-- Inquiry Sub-Type --}}
                                                @if (!empty($inquiry[0]->inquiry_sub_type))
                                                    <div class="col-3">
                                                        <label class="form-label">Inquiry Sub-Type</label>
                                                        <input type="text" value="{{ $inquiry[0]->inquiry_sub_type }}"
                                                            class="form-control shadow-sm rounded" disabled>
                                                    </div>
                                                @endif
                                                {{-- PBO --}}
                                                @if (!empty($inquiry[0]->pbo))
                                                    <div class="col-3">
                                                        <label class="form-label">PBO</label>
                                                        <input type="text" value="{{ $inquiry[0]->pbo }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">PBO</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Dealership --}}
                                                @if (!empty($inquiry[0]->dealer_name))
                                                    <div class="col-3">
                                                        <label class="form-label">Dealership</label>
                                                        <input type="text" value="{{ $inquiry[0]->dealer_name }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Dealership</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Vehicle --}}
                                                @if (!empty($inquiry[0]->vehicle))
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle</label>
                                                        <input type="text" value="{{ $inquiry[0]->vehicle }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Vehicle Colour --}}
                                                @if (!empty($inquiry[0]->vehicle_colour))
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle Colour</label>
                                                        <input type="text" value="{{ $inquiry[0]->vehicle_colour }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @else
                                                    <div class="col-3">
                                                        <label class="form-label">Vehicle Colour</label>
                                                        <input type="text" value="-"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Action --}}
                                                <div class="col-3">
                                                    <label class="form-label">Action</label>
                                                    <input type="text" value="{{ $inquiry[0]->action }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Callback --}}
                                                <div class="col-3">
                                                    <label class="form-label">Callback</label>
                                                    <input type="text" value="{{ $inquiry[0]->callback }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Follow-up Preferred Date & Time --}}
                                                @if ($inquiry[0]->callback == 'Yes')
                                                    <div class="col-3">
                                                        <?php $followup_prefered_date = date_create($inquiry[0]->followup_prefered_date); ?>
                                                        <label class="form-label">Follow-up Preferred Date</label>
                                                        <input type="text"
                                                            value="{{ date_format($followup_prefered_date, 'd-m-Y') }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Follow-up Preferred Time</label>
                                                        {{-- {{ date('h:i:s A', strtotime($inquiry[0]->followup_prefered_time)) }} --}}
                                                        <input type="text"
                                                            value="{{ $inquiry[0]->followup_prefered_time }}"
                                                            class="form-control shadow-sm rounded" readonly>
                                                    </div>
                                                @endif
                                                {{-- Assigned Agent --}}
                                                @if (!empty($inquiry[0]->assigned_agent))
                                                    <div class="col-3">
                                                        <label class="form-label">Assigned Agent</label>
                                                        <input type="text" value="{{ $inquiry[0]->assigned_agent }}"
                                                            class="form-control shadow-sm rounded" disabled>
                                                    </div>
                                                @endif
                                                {{-- Status --}}
                                                {{-- <div class="col-3">
                                                    <label for="city" class="form-label ">Status</label>
                                                    <input type="text" value="{{ $inquiry[0]->status }}"
                                                        class="form-control shadow-sm rounded" disabled>
                                                </div> --}}
                                                <div class="col-3">
                                                    <label for="inquiry_status" class="form-label ">Status</label>
                                                    @if (
                                                        !(
                                                            $inquiry[0]->status == 'Won' ||
                                                            $inquiry[0]->status == 'Closed' ||
                                                            $inquiry[0]->status == 'Request to force closed' ||
                                                            $inquiry[0]->status == 'Force closed'
                                                        ))
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status" onchange="handleDropdownChange()">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}
                                                            </option>
                                                            <option value="Request to force closed" class="text-danger">
                                                                Request to force closed</option>
                                                        </select>
                                                    @elseif ($inquiry[0]->status == 'Force closed')
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status" disabled>
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}</option>
                                                        </select>
                                                        {{-- Won --}}
                                                    @elseif ($inquiry[0]->status == 'Won')
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status" onchange="handleDropdownChange()">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}</option>
                                                            <option value="Closed">Close</option>
                                                            <option value="Not Resolved">Not Resolved</option>
                                                            <option value="Request to force closed" class="text-danger">
                                                                Request to force closed</option>
                                                        </select>
                                                    @else
                                                        <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                        <select class="form-control" name="inquiry_status"
                                                            id="inquiry_status">
                                                            <option value="{{ $inquiry[0]->status }}">
                                                                {{ $inquiry[0]->status }}
                                                            </option>
                                                            <option value="Force closed" class="text-danger">Force closed
                                                            </option>
                                                        </select>
                                                        <?php } else {?>
                                                        <select class="form-control" name="complaint_status"
                                                            id="complaint_status">
                                                            <option value="{{ $inquiry[0]->status }}">Request to force
                                                                closed
                                                            </option>
                                                        </select>
                                                        <?php } ?>
                                                    @endif
                                                </div>
                                                {{-- Inquiry Start Date --}}
                                                <div class="col-3">
                                                    <?php $start_date = date_create($inquiry[0]->start_date); ?>
                                                    <label class="form-label">Inquiry Creation Date</label>
                                                    <input type="text" value="{{ date_format($start_date, 'd-m-Y') }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                                {{-- Expected Closure Date --}}
                                                <div class="col-3">
                                                    <?php $expected_closure = date_create($inquiry[0]->expected_closure); ?>
                                                    <label class="form-label">Expected Closure Date</label>
                                                    <input type="text"
                                                        value="{{ date_format($expected_closure, 'd-m-Y') }}"
                                                        class="form-control shadow-sm rounded" readonly>
                                                </div>
                                            </div>
                                        @endif
                                        {{-- General & Dealership Network END --}}

                                        @if (!empty($inquiry[0]->force_close_reason))
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">Reason For Force Close</label>
                                                    <textarea class="form-control textarea shadow-sm  rounded" rows="5" readonly>{{ $inquiry[0]->force_close_reason }}</textarea>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="row">
                                            <div class="col-12" id="textarea" style="display: none;">
                                                <label for="textarea" class="form-label">Reason For Force Close</label>
                                                <textarea name="force_close_reason" id="force_close_reason" class="form-control textarea shadow-sm  rounded"
                                                    rows="5"></textarea>
                                            </div>
                                        </div>
                                        @if ($inquiry[0]->callback == 'Yes')
                                            <div class="row">
                                                <div class="col-12">
                                                    <label class="form-label">Follow-up Remarks</label>
                                                    <textarea class="form-control shadow-sm rounded mw-100" rows="5" readonly>{{ $inquiry[0]->followup_remarks }}</textarea>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-9"></div>
                                            <div class="col-3">
                                                <input type="submit" value="Update" id=""
                                                    class="btn btn-round btn-primary w-25 float-right">
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                            {{-- </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script>
        function handleDropdownChange() {
            var selectedOption = document.getElementById("inquiry_status").value; // status dropdown
            var textarea = document.getElementById("textarea"); // Reason For Force Close

            if (selectedOption === "Request to force closed") {
                alert(selectedOption);
                textarea.style.display = "block"; // Show the textarea
                dsc.style.display = "none"; // Hide the dsc dropdown
                dsctextarea.style.display = "none"; // Hide the dsc textarea
                customer_satisfaction.style.display = "none"; // Hide the customer_satisfaction  dropdown
                guilty_dealsership.style.display = "none"; // Hide the guilty_dealsership  dropdown
                dsc_dropdown.removeAttribute('required'); // removing required attribute from dsc_dropdown
            } else if (selectedOption === "Force closed") {
                alert(selectedOption);
            } else if (selectedOption === "Closed") {
                textarea.style.display = "none"; // Hide the textarea
                alert(selectedOption);
            } else if (selectedOption === "Not Resolved") {
                textarea.style.display = "none"; // Hide the textarea
                alert(selectedOption);

            } else if (selectedOption === "Closed") {
                dsc.style.display = "block"; // Show the dsc dropdown
                dsc_dropdown.setAttribute('required', 'required'); // setting required attribute on dsc_dropdown
                customer_satisfaction.style.display = "block"; // Show the customer_satisfaction dropdown
                guilty_dealsership.style.display = "block"; // Show the guilty_dealsership dropdown
                textarea.style.display = "none"; // Hide the textarea
            } else {
                textarea.style.display = "none"; // Hide the textarea
                dsc.style.display = "none"; // Hide the dsc dropdown
                dsctextarea.style.display = "none"; // Hide the dsc textarea
                customer_satisfaction.style.display = "none"; // Hide the customer_satisfaction  dropdown
                guilty_dealsership.style.display = "none"; // Hide the guilty_dealsership  dropdown
                dsc_dropdown.removeAttribute('required');
            }
        }
    </script>
    <script>
        function handleDSC() {
            var dscselectedOption = document.getElementById("dsc_dropdown").value;
            var dsctextarea = document.getElementById("dsctextarea"); // DSC Remarks div
            var textarea = document.getElementById("textarea"); // Reason For Force Close div
            if (dscselectedOption === "Excluded" || dscselectedOption === "Included") {
                dsctextarea.style.display = "block"; // Show the dsc textarea
            } else {
                dsctextarea.style.display = "none"; // Hide the dsc textarea
            }
        }
    </script>
@endsection
