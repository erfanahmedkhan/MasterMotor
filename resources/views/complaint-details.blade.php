    @extends('template')
    @section('title', 'Complaint Details')
    @section('content')
        <style>
            .card {
                --bs-card-border-width: 5px !important;
                --bs-card-cap-padding-y: 0.4rem !important;
                background-color: #f1f1f1 !important;
                line-height: 100% !important;
            }

            .card-body {
                padding: 5px 15px 10px 15px !important;
            }

            .custom-truncate {
                max-width: 150 !important;
                white-space: nowrap !important;
                overflow: hidden !important;
                text-overflow: ellipsis !important;
            }

            .form-label {
                font-weight: bold !important
            }

            .form-control {
                font-size: 11px !important;
                font-weight: bold !important
            }

            input {
                text-align: center !important;
            }

            .btn {
                border-radius: 50px !important;
            }

            input {
                text-align: center !important;
            }

            /* select option {
                            text-align: center !important;
                        } */

            .textarea {
                text-align: justify !important;
            }

            table.dataTable thead>tr>th.sorting_asc,
            table.dataTable thead>tr>th.sorting_desc,
            table.dataTable thead>tr>th.sorting,
            table.dataTable thead>tr>td.sorting_asc,
            table.dataTable thead>tr>td.sorting_desc,
            table.dataTable thead>tr>td.sorting {
                padding-right: 25px !important;
                font-size: 12px !important;
                font-family: BeVietnamPro-Regular !important;
            }

            div.dataTables_wrapper div.dataTables_length select {
                width: 50px !important;
                display: inline-block;
                padding-right: 15px !important;
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
                                    <div class="alert alert-success  alert-dismissible fade show" role="alert">
                                        <strong>{{ session('msg') }}</strong>
                                        <button type="button" class="close mt-2" data-dismiss="alert" aria-label="Close">
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
                                <form action="{{ url('update-complaint-status/' . $rows[0]->id) }}" method="POST">
                                    @csrf
                                    <div class="card w-95 ">
                                        <div class="card-header">
                                            <h6> <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                                    style="cursor: pointer;"></i>&nbsp;<strong
                                                    class="card-title mt-2">Complaint Details</strong>
                                            </h6>
                                        </div>
                                        <div class="card-body embed-responsive" style="overflow: auto">
                                            <div class="card-body">
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-label">Customer Name</label>
                                                        <input type="text" value="{{ $rows[0]->customer_name }}"
                                                            class="form-control shadow-sm  rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Mobile</label>
                                                        <input type="text" value="{{ $rows[0]->mobile }}"
                                                            class="form-control shadow-sm  rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="text" value="{{ $rows[0]->email }}"
                                                            class="form-control shadow-sm  rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">City</label>
                                                        <input type="text" value="{{ $rows[0]->city }}"
                                                            class="form-control shadow-sm  rounded" readonly>
                                                    </div>
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-label">Complaint Number</label>
                                                        <input type="text" value="{{ $rows[0]->complain_number }}"
                                                            class="form-control shadow-sm  rounded" name="complain_number"
                                                            readonly>
                                                    </div>
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-12 w-100">
                                                        <label class="form-label">VOC</label>
                                                        <textarea class="form-control textarea shadow-sm rounded w-100" rows="10" readonly>{{ $rows[0]->voc }}</textarea>
                                                    </div>
                                                </div>
                                                {{-- ROW STARTS --}}
                                                @if ($rows[0]->complaint_type == 'General' or $rows[0]->complaint_type == 'Pre-Sale')
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint Type</label>
                                                            <input type="text" value="{{ $rows[0]->complaint_type }}"
                                                                class="form-control shadow-sm rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Source</label>
                                                            <input type="text" value="{{ $rows[0]->source }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Dealership</label>
                                                            <input type="text" value="{{ $rows[0]->dealer_name }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint CPT Type</label>
                                                            <input type="text" value="{{ $rows[0]->cpt }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint SPG Type</label>
                                                            <input type="text" value="{{ $rows[0]->spg }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint CCC Type</label>
                                                            <input type="text" value="{{ $rows[0]->ccc }}"
                                                                title="{{ $rows[0]->ccc }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint Priority</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->complaint_priority }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- Sale --}}
                                                @if ($rows[0]->complaint_type == 'Sale')
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint Type</label>
                                                            <input type="text" value="{{ $rows[0]->complaint_type }}"
                                                                class="form-control shadow-sm rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Source</label>
                                                            <input type="text" value="{{ $rows[0]->source }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">PBO</label>
                                                            <input type="text" value="{{ $rows[0]->pbo }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        @if (!empty($rows[0]->sales_order_number))
                                                            <div class="col-3">
                                                                <label class="form-label">Sales order Number</label>
                                                                <input type="text"
                                                                    value="{{ $rows[0]->sales_order_number }}"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">Sales order Number</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @endif
                                                        <div class="col-3">
                                                            <label class="form-label">Vehicle</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->customer_vehicle }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Invoice Number</label>
                                                            <input type="text" value="{{ $rows[0]->invoice_number }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        @if (!empty($rows[0]->invoice_date))
                                                            <?php $invoice_date = date_create($rows[0]->invoice_date); ?>
                                                            <div class="col-3">
                                                                <label class="form-label">Invoice Date</label>
                                                                <input type="text"
                                                                    value="{{ date_format($invoice_date, 'd-m-Y') }}"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">Invoice Date</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @endif

                                                        <div class="col-3">
                                                            <label class="form-label">Colour</label>
                                                            <input type="text" value="{{ $rows[0]->vehicle_colour }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Dealership</label>
                                                            <input type="text" value="{{ $rows[0]->dealer_name }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint CPT Type</label>
                                                            <input type="text" value="{{ $rows[0]->cpt }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label">Complaint SPG Type</label>
                                                            <input type="text" value="{{ $rows[0]->spg }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label class="form-label">Complaint CCC Type</label>
                                                            <input type="text" value="{{ $rows[0]->ccc }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint Priority</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->complaint_priority }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- After Sale --}}
                                                @if ($rows[0]->complaint_type == 'After Sale')
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint Type</label>
                                                            <input type="text" value="{{ $rows[0]->complaint_type }}"
                                                                class="form-control shadow-sm rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Source</label>
                                                            <input type="text" value="{{ $rows[0]->source }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        @if (!empty($rows[0]->pbo))
                                                            <div class="col-3">
                                                                <label class="form-label">PBO</label>
                                                                <input type="text" value="{{ $rows[0]->pbo }}"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">PBO</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @endif
                                                        <div class="col-3">
                                                            <label class="form-label">Vehicle</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->customer_vehicle }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        @if (!empty($rows[0]->chasis_number))
                                                            <div class="col-3">
                                                                <label class="form-label">Chasis Number</label>
                                                                <input type="text"
                                                                    value="{{ $rows[0]->chasis_number }}"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">Chasis Number</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @endif
                                                        @if (!empty($rows[0]->engine_number))
                                                            <div class="col-3">
                                                                <label class="form-label">Engine Number</label>
                                                                <input type="text"
                                                                    value="{{ $rows[0]->engine_number }}"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">Engine Number</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @endif
                                                        @if (!empty($rows[0]->registration_number))
                                                            <div class="col-3">
                                                                <label class="form-label">Registration Number</label>
                                                                <input type="text"
                                                                    value="{{ $rows[0]->registration_number }}"
                                                                    class="form-control shadow-sm  rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">Registration Number</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm rounded" readonly>
                                                            </div>
                                                        @endif
                                                        <div class="col-3">
                                                            <label class="form-label">Colour</label>
                                                            <input type="text" value="{{ $rows[0]->vehicle_colour }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>

                                                        @if (!empty($rows[0]->invoice_date))
                                                            <?php $invoice_date = date_create($rows[0]->invoice_date); ?>
                                                            <div class="col-3">
                                                                <label class="form-label">Invoice Date</label>
                                                                <input type="text"
                                                                    value="{{ date_format($invoice_date, 'd-m-Y') }}"
                                                                    class="form-control shadow-sm rounded" readonly>
                                                            </div>
                                                        @else
                                                            <div class="col-3">
                                                                <label class="form-label">Invoice Date</label>
                                                                <input type="text" value="N/A"
                                                                    class="form-control shadow-sm rounded" readonly>
                                                            </div>
                                                        @endif
                                                        <div class="col-3">
                                                            <label class="form-label">Dealership</label>
                                                            <input type="text" value="{{ $rows[0]->dealer_name }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label">Complaint CPT Type</label>
                                                            <input type="text" value="{{ $rows[0]->cpt }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-6">
                                                            <label class="form-label">Complaint SPG Type</label>
                                                            <input type="text" value="{{ $rows[0]->spg }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>

                                                        <div class="col-6">
                                                            <label class="form-label">Complaint CCC Type</label>
                                                            <input type="text" value="{{ $rows[0]->ccc }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                    {{-- ROW STARTS --}}
                                                    <div class="row">
                                                        <div class="col-3">
                                                            <label class="form-label">Complaint Priority</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->complaint_priority }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                    </div>
                                                @endif
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label class="form-label">Agent Remarks</label>
                                                        <textarea class="form-control textarea shadow-sm rounded" rows="5" readonly>{{ $rows[0]->notes }}</textarea>
                                                    </div>
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-3">
                                                        <label class="form-label">Complaint Registered Date</label>
                                                        <input type="text" value="{{ $rows[0]->createddate }}"
                                                            class="form-control shadow-sm  rounded" readonly>
                                                    </div>
                                                    <div class="col-3">
                                                        <label class="form-label">Status</label>
                                                        @if ($rows[0]->status == 'Open')
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="handleDropdownChange()">
                                                                <option value="{{ $rows[0]->status }}">
                                                                    {{ $rows[0]->status }}
                                                                </option>
                                                                <option value="Request to force close"
                                                                    class="text-danger">
                                                                    Request to force close</option>
                                                            </select>
                                                        @elseif ($rows[0]->status == 'Request to force close')
                                                            <?php if(session()->get('isLogin')[0]['role'] == 1){ ?>
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="this.form.submit()">
                                                                <option value="{{ $rows[0]->status }}">Request to force
                                                                    close
                                                                </option>
                                                                <option value="Force closed" class="text-danger">Force
                                                                    closed
                                                                </option>
                                                            </select>
                                                            <?php } else {?>
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="this.form.submit()">
                                                                <option value="{{ $rows[0]->status }}">Request to force
                                                                    close
                                                                </option>
                                                            </select>
                                                            <?php } ?>
                                                        @elseif ($rows[0]->status == 'Pending')
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="handleDropdownChange()">
                                                                <option value="{{ $rows[0]->status }}">
                                                                    {{ $rows[0]->status }}</option>
                                                                <option value="Resolved">Resolved</option>
                                                                <option value="Request to force close"
                                                                    class="text-danger">
                                                                    Request to force close</option>
                                                            </select>
                                                        @elseif ($rows[0]->status == 'In-Process')
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="handleDropdownChange()">
                                                                <option value="{{ $rows[0]->status }}">
                                                                    {{ $rows[0]->status }}</option>
                                                                <option value="Request to force close"
                                                                    class="text-danger">
                                                                    Request to force close</option>
                                                            </select>
                                                        @elseif ($rows[0]->status == 'Resolve' || $rows[0]->status == 'Resolved')
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="handleDropdownChange()">
                                                                <option value="{{ $rows[0]->status }}">
                                                                    {{ $rows[0]->status }}</option>
                                                                <option value="Closed">Close</option>
                                                                <option value="Not Resolved">Not Resolved</option>
                                                                <option value="Request to force close"
                                                                    class="text-danger">
                                                                    Request to force close</option>
                                                            </select>
                                                        @elseif ($rows[0]->status == 'Not Resolved')
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="handleDropdownChange()">
                                                                <option value="{{ $rows[0]->status }}">
                                                                    {{ $rows[0]->status }} </option>
                                                                <option value="Request to force close"
                                                                    class="text-danger">
                                                                    Request to force close</option>
                                                            </select>
                                                        @else
                                                            <select class="form-control text-center"
                                                                name="complaint_status" id="complaint_status"
                                                                onchange="handleDropdownChange()">
                                                                <option value="{{ $rows[0]->status }}">
                                                                    {{ $rows[0]->status }}</option>
                                                            </select>
                                                        @endif
                                                    </div>
                                                    @if ($rows[0]->status == 'Closed')
                                                        <div class="row"></div>
                                                        <div class="col-3">
                                                            <label class="form-label">DSC</label>
                                                            <input type="text" value="{{ $rows[0]->dsc }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Customer Satisfaction</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->customer_satisfaction }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="col-3">
                                                            <label class="form-label">Dealership Guilty</label>
                                                            <input type="text"
                                                                value="{{ $rows[0]->guilty_dealsership }}"
                                                                class="form-control shadow-sm  rounded" readonly>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label">DSC Remarks</label>
                                                                <textarea class="form-control textarea shadow-sm rounded" rows="5" readonly>{{ $rows[0]->dsc_remarks }}</textarea>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    @if ($rows[0]->status == 'Request to force close')
                                                        <div class="col-12">
                                                            <label class="form-label">Reason For Force Close</label>
                                                            <textarea class="form-control textarea shadow-sm  rounded" rows="5" readonly>{{ $rows[0]->force_close_reason }}</textarea>
                                                        </div>
                                                    @endif
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-12" id="textarea" style="display: none;">
                                                        <label for="textarea" class="form-label">Reason For Force
                                                            Close</label>
                                                        <textarea name="force_close_reason" id="force_close_reason" class="form-control textarea shadow-sm  rounded"
                                                            rows="5"></textarea>
                                                    </div>
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-3" id="dsc" style="display: none;">
                                                        <label for="">DSC</label>
                                                        <select class="form-control text-center" name="dsc"
                                                            id="dsc_dropdown" onchange="handleDSC()" required>
                                                            <option value="">Select DSC</option>
                                                            <option value="Excluded">Excluded</option>
                                                            <option value="Included">
                                                                Included</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-3" id="customer_satisfaction"
                                                        style="display: none;">
                                                        <label for="">Customer Satisfaction</label>
                                                        <select class="form-control text-center"
                                                            name="customer_satisfaction">
                                                            <option value="Satisfied">Satisfied</option>
                                                            <option value="Dissatisfied">Dissatisfied</option>
                                                            <option value="Compromised">Compromised</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-3" id="guilty_dealsership" style="display: none;">
                                                        <label for="">Dealership Guilty</label>
                                                        <select class="form-control text-center"
                                                            name="guilty_dealsership">
                                                            <option value="No">No</option>
                                                            <option value="Yes">Yes</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                {{-- ROW STARTS --}}
                                                <div class="row">
                                                    <div class="col-12" id="dsctextarea" style="display: none;">
                                                        <label for="textarea" class="form-label">DSC Remarks</label>
                                                        <textarea name="dsc_remarks" class="form-control textarea shadow-sm  rounded" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- ROW STARTS --}}
                                            <div class="row">
                                                <div class="col-9"></div>
                                                <div class="col-3">
                                                    <input type="submit" value="Update" id=""
                                                        class="btn btn-round btn-primary w-25 float-right">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <!-- form ends -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- ADD FOLLOW UP MODAL STARTS -->
        <!-- main-content START -->
        <div class="main-content mr-2 ml-2 p-2">
            <!-- section START -->
            <section class="section">
                <!-- section-body START -->
                <div class="section-body">
                    <!-- container START -->
                    <div class="container-fluid rounded p-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <!-- Complaint Follow Up Table Starts -->
                                    <div class="card-header">
                                        <button type="button" class="btn btn-round btn-primary mt-2" data-toggle="modal"
                                            data-target="#AddFollowUp" style="float: right;">
                                            Add Follow Up &nbsp;<i class="fa fa-plus-circle"></i>
                                        </button>
                                        <h6> <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                                style="cursor: pointer;"></i>&nbsp;<strong
                                                class="card-title mt-2">Complaint Follow-Ups</strong>
                                        </h6>
                                    </div>
                                    <div class="card-body embed-responsive" style="overflow: auto">
                                        <div class="row">
                                            <div class="col-12">

                                                <table class="example table table-hover  nowrap">
                                                    <thead class="bg bg-primary text-center text-white">
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Source</th>
                                                            <th>Complaint #</th>
                                                            <th>Follow-Up Date</th>
                                                            <th>Complaint Status</th>
                                                            <th>Agent Notes</th>
                                                            <th>Agent</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $n = 1;
                                                        @endphp
                                                        @foreach ($followup as $item)
                                                            <tr>
                                                                <td class="text-justify">{{ $n }}</td>
                                                                <td class="text-justify">{{ $item->source }}</td>
                                                                <td class="text-justify">{{ $item->complain_number }}</td>
                                                                <?php $date = date_create($item->date); ?>
                                                                <td class="text-center"> {{ date_format($date, 'd-m-Y') }}
                                                                </td>
                                                                <td class="text-center">{{ $item->complaint_status }}</td>
                                                                <td class="custom-truncate text-center w-50"
                                                                    title="{{ $item->notes }}">{{ $item->notes }}</td>
                                                                <td class="text-justify">{{ $item->agent }}</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ADD FOLLOW UP MODAL ENDS -->

        <!-- Customer's Follow Up Modal STARTS-->
        <div class="modal fade bd-example-modal-xl" id="AddFollowUp" tabindex="-1" role="dialog"
            aria-labelledby="largeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <form action="{{ url('add-follow-up') }}" method="POST">
                    <input type="hidden" name="id" value="{{ $id }}">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <strong>Customer's Follow Up</strong>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="complain_number" class="form-label">Complaint Number</label>
                                    <input type="text" class="form-control shadow-sm rounded" id="complain_number"
                                        readonly name="complain_number" value="{{ $rows[0]->complain_number }}">
                                </div>
                                <div class="col-3">
                                    <label for="date" class="form-label">Date<i class="text-danger">*</i></label>
                                    <input type="date" class="form-control shadow-sm rounded"id="date"
                                        name="date" required>
                                </div>
                                <div class="col-3">
                                    <label for="channel" class="form-label">Source<i class="text-danger">*</i></label>
                                    <select class="form-control shadow-sm text-justify" name="source" id="channel"
                                        required>
                                        @foreach ($source as $cust_source)
                                            <option value="{{ $cust_source->source }}">
                                                {{ $cust_source->source }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-3">
                                    <label for="complain_status" class="form-label">Complaint Status <i
                                            class="text-danger">*</i></label>
                                    <select class="form-control  shadow-sm " name="complaint_status" required
                                        id="complain_status">
                                        <option value="">Complaint Status</option>
                                        <option value="Pending">Pending</option>
                                        <option value="Resolved">Resolved</option>
                                    </select>
                                </div>
                                <div class="col-3 d-none">
                                    <label for="agent" class="form-label">Agent Name</label>
                                    <input type="text" class="form-control shadow-sm  rounded" id="agent" readonly
                                        name="agent" value="{{ session()->get('isLogin')[0]['name'] }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="notes" class="form-label">Agent Notes</label>
                                    <textarea class="form-control shadow-sm bg-white rounded" id="notes" name="notes"
                                        placeholder="Take notes if necessary..." rows=10></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-9"></div>
                                <div class="col-3 float-right">
                                    <button type="submit"
                                        class="btn btn-round btn-primary w-50 float-right">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Customer's Follow Up Modal ENDS-->

        <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
        <script>
            function getdata(Id) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: "{{ route('editfollowup.post') }}",
                    data: {
                        Id: Id
                    },
                    dataType: "json",
                    success: function(RecordSet) {
                        console.log(RecordSet);
                        $("#edit_date").val(RecordSet.ReturnData[0].date);
                        $("#edit_channel").append('<option value="' + RecordSet.ReturnData[0].source + '">' +
                            RecordSet.ReturnData[0].source + '</option>');
                        $("#edit_complain_status").append('<option value="' + RecordSet.ReturnData[0]
                            .complaint_status + '">' + RecordSet.ReturnData[0].complaint_status + '</option>');
                        $("#edit_engage_time").val(RecordSet.ReturnData[0].engage_time);
                        $("#edit_agent_name").val(RecordSet.ReturnData[0].agent);
                        $("#edit_notes").val(RecordSet.ReturnData[0].notes);
                        $("#edit_id").val(RecordSet.ReturnData[0].id);
                    }
                });
            }
        </script>

        <script>
            function handleDropdownChange() {
                var selectedOption = document.getElementById("complaint_status").value; // status dropdown
                var textarea = document.getElementById("textarea"); // Reason For Force Close
                var dsc = document.getElementById("dsc"); // DSC div
                var dscselectedOption = document.getElementById("dsc_dropdown").value; // DSC dropdown
                var customer_satisfaction = document.getElementById("customer_satisfaction"); // Customer Satisfaction div
                var guilty_dealsership = document.getElementById("guilty_dealsership"); // Dealsership Guilty div
                if (selectedOption === "Request to force close") {
                    textarea.style.display = "block"; // Show the textarea
                    dsc.style.display = "none"; // Hide the dsc dropdown
                    dsctextarea.style.display = "none"; // Hide the dsc textarea
                    customer_satisfaction.style.display = "none"; // Hide the customer_satisfaction  dropdown
                    guilty_dealsership.style.display = "none"; // Hide the guilty_dealsership  dropdown
                    dsc_dropdown.removeAttribute('required'); // removing required attribute from dsc_dropdown
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

        <script>
            setTimeout(function() {
                $('.alert').fadeOut('fast');
            }, 3000);
        </script>

    @endsection
