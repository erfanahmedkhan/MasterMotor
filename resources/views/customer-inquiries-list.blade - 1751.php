@extends('template')
@section('content')

    <head>
        <style>
            .table tr td {
                padding: 0.5rem;
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

            .custom-truncate {
                max-width: 250 !important;
                white-space: nowrap !important;
                overflow: hidden !important;
                text-overflow: ellipsis !important;
            }

            .bg-orange {
                background-color: #FF8B22 !important;
                font-size: 9px !important;
            }
        </style>
    </head>
    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script>
        function getid(Id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('viewInquiryDetails.post') }}",
                data: {
                    Id: Id
                },
                dataType: "json",
                success: function(RecordSet) {
                    $("#customer_inquiry").text(RecordSet.ReturnData[0].inquiry_details);
                    $("#customer_name").text(RecordSet.ReturnData[0].cname);
                    $("#customer_mobile").text(RecordSet.ReturnData[0].mobile);
                    $("#inquiry_number").text(RecordSet.ReturnData[0].inquiry_number);
                    $("#inquiry_types").text(RecordSet.ReturnData[0].inquiry_type);
                    $("#inquiry_sub_type").text(RecordSet.ReturnData[0].inquiry_sub_type);
                    $("#payment_mode").text(RecordSet.ReturnData[0].payment_mode);
                    $("#inquiry_dealership").text(RecordSet.ReturnData[0].dealer_name);
                    $("#start_date").text(RecordSet.ReturnData[0].start_date);
                    $("#end_date").text(RecordSet.ReturnData[0].end_date);
                    $("#existing_vehicle").text(RecordSet.ReturnData[0].existing_vehicle);
                    $("#interested_vehicle").text(RecordSet.ReturnData[0].interested_vehicle);
                    $("#inquiry_status").text(RecordSet.ReturnData[0].status);
                    $("#inquiry_remarks").text(RecordSet.ReturnData[0].remarks);
                    $("#status_reason").text(RecordSet.ReturnData[0].status_reason);
                    $("#other_reason").text(RecordSet.ReturnData[0].other_reason);
                    $("#next_follow_up").text(RecordSet.ReturnData[0].next_follow_up);
                    $("#next_followup_time").text(RecordSet.ReturnData[0].followup_prefered_time);
                    $("#followup_remarks").text(RecordSet.ReturnData[0].remarks);
                    $("#agent_inquiry_notes").text(RecordSet.ReturnData[0].agent_notes);
                    // alert(RecordSet);
                }
            });
        }
    </script>
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
                            <!-- CARD STARTS -->
                            <div class="card maincard ml-2">
                                <!-- card-header STARTS -->
                                <div class="card-header">
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                        style="cursor: pointer; font-size: 20px"></i>
                                    <strong class="card-title">&nbsp;Customer Inquiries</strong>
                                    <a href="{{ url('create-customers-new-inquiry/add') }}"
                                        class="btn btn-round btn-primary" style="float: right">New Ticket <i
                                            class="fa fa-plus-circle"></i></a>
                                </div>
                                <!-- card-body STARTS -->
                                <div class="card-body embed-responsive" style="overflow: auto">
                                    <!-- <div class="card-body"> -->
                                    <!-- ROW STARTS -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            {{-- <form action="{{ url('customer-inquiries-list') }}" method="GET"></form> --}}
                                            <!-- TABLE STARTS -->
                                            <table class="example table table-striped table-bordered nowrap ">
                                                <thead class="bg bg-primary text-white text-center nowrap">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Inquiry&nbsp;Number</th>
                                                        <th>Inquiry&nbsp;Type</th>
                                                        <th>Inquiry&nbsp;Category</th>
                                                        <th>Inq&nbsp;Sub-Type</th>
                                                        {{-- <th>Inquiry&nbsp;</th> --}}
                                                        <th>Dealership</th>
                                                        <th>Customer</th>
                                                        <th>Mobile&nbsp;no</th>
                                                        <th>Start&nbsp;Date</th>
                                                        <th>Status</th>
                                                        {{-- <th>Escalation&nbsp;Date</th> --}}
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach ($data as $item)
                                                        <tr>
                                                            <td>{{ $n }}</td>
                                                            <td>{{ $item->inquiry_number }}</td>
                                                            <td class="text-center">{{ $item->inquiry_category }}</td>
                                                            <td class="text-center">{{ $item->inquiry_type }}</td>
                                                            <td class="text-center">{{ $item->inquiry_sub_type }}</td>
                                                            {{-- <td class="custom-truncate"
                                                                title="{{ $item->inquiry_details }}">
                                                                {{ $item->inquiry_details }}</td> --}}
                                                            <td>{{ $item->dealer_name }}</td>
                                                            <td>{{ $item->cname }}</td>
                                                            <td class="text-center">{{ $item->mobile }}</td>
                                                            <?php $start_date = date_create($item->start_date); ?>
                                                            <?php $end_date = date_create($item->end_date); ?>
                                                            <td class="text-center">{{ date_format($start_date, 'd/m/Y') }}
                                                            </td>
                                                            <td class="text-center">
                                                                <span
                                                                    class="badge bg-orange shadow-sm text-white">{{ $item->status }}</span>
                                                            </td>
                                                            {{-- <td class="text-center">{{ date_format($end_date, 'd/m/Y') }}
                                                            </td> --}}
                                                            <td class="text-center">
                                                                <a href="{{ url('api/save-customer/' . $item->id) }}"
                                                                    data-placement="top" title="Send inquiry to DMS"
                                                                    class="badge bg-success text-white">
                                                                    <i class="fa fa-long-arrow-right"></i>
                                                                </a>


                                                                <a href="{{ url('inquiry-details/' . $item->id) }}"
                                                                    class="badge bg-primary  text-white"
                                                                    data-placement="top" title="Inquiry Details">
                                                                    <i class="fa fa-info-circle"></i></a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $n++;
                                                        @endphp
                                                    @endforeach
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


    <div class="modal fade" id="viewInquiry" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Customer Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-0"><b>Customer Inquiry</b></p>
                        </div>
                        <div class="col-md-3">
                            <p id="customer_inquiry" class=" mb-0 badge badge-info shadow-sm text-white"></p>
                        </div>

                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-0"><b>Customer Name</b></p>
                        </div>
                        <div class="col-md-3">
                            <p id="customer_name" class="mb-0"></p>
                        </div>

                        <div class="col-md-3">
                            <p class="mb-0"><b>Customer Mobile</b></p>
                        </div>
                        <div class="col-md-3">
                            <p id="customer_mobile" class=" mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>Inquiry Number</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="inquiry_number" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Inquiry Type</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="inquiry_types" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>Inquiry sub type</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="inquiry_sub_type" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Payment mode</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="payment_mode" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-md-3">
                            <p class="mb-0"><b>Inquiry Dealership</b></p>
                        </div>
                        <div class="col-md-3">
                            <p id="inquiry_dealership" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Start Date</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="start_date" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>Escalation Date</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="end_date" class="mb-0"></p>
                        </div>


                        <div class="col-md-3">
                            <p class="mb-0"><b>Existing Vehicle</b></p>
                        </div>
                        <div class="col-md-3">
                            <p id="existing_vehicle" class=" mb-0"></p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>Interested Vehicle</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="interested_vehicle" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Inquiry Remarks</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="inquiry_remarks" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>



                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>Other Reason</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="other_reason" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Next Followup</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="next_follow_up" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>followup prefered time</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="next_followup_time" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Followup Remarks</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="followup_remarks" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-2">
                            <p class="mb-0"><b> Agent Notes</b></p>
                        </div>

                        <div class="col-sm-4">
                            <p class="mb-0"></p>
                            <p id="agent_inquiry_notes" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0"><b>Inquiry Status</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="inquiry_status" class="mb-0"></p>
                        </div>

                        <div class="col-sm-3">
                            <p class="mb-0"><b>Status Reason</b></p>
                        </div>
                        <div class="col-sm-3">
                            <p id="status_reason" class="mb-0"></p>
                        </div>
                    </div>
                    <hr>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

    </div>

    <script>
        function changeColorAndDisable(element) {
            element.classList.remove("bg-warning");
            element.classList.add("bg-success");
            element.removeAttribute("href");
            element.removeAttribute("onclick");
            element.title = "Inquiry Sent to DMS";
            element.style.cursor = "not-allowed";
        }
    </script>
@endsection
