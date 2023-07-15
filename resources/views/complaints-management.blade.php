@extends('template')
@section('title', 'Complaints Management')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/complaints-management.css') }}">
    <!-- main-content STARTS -->
    <div class="main-content mt-2">
        <!-- section STARTS -->
        <section class="section">
            <!-- section-body STARTS -->
            <div class="section-body">
                <!-- container STARTS -->
                <div class="container-fluid">
                    <!-- container ROW STARTS -->
                    <div class="row maincard ml-2 ">
                        <div class="col-12">
                            <!-- CARD STARTS -->
                            <div class="card w-100">
                                <!-- card-header STARTS -->
                                <div class="card-header">
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                        style="cursor: pointer; font-size: 20px"></i>
                                    &nbsp;
                                    <strong class="card-title">Complaints Management</strong>
                                    {{-- New Ticket --}}
                                    <a href="{{ url('create-customers-complaints/new') }}"
                                        class="btn btn-round btn-primary float-right" target="_blank">New
                                        Ticket&nbsp;<i class="fa fa-plus-circle"></i></a>
                                </div>
                                <!-- card-body STARTS -->
                                <div class="card-body embed-responsive" style="overflow: auto">
                                    <!-- <div class="card-body"> -->
                                    <!-- SESSION MESSAGES ROW START -->
                                    <div class="row">
                                        <div class="col-12">
                                            @if (session('crm-to-dms'))
                                                <div id="alertMessage"
                                                    class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>{{ session('crm-to-dms') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @if (session('msg'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>{{ session('msg') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- SESSION MESSAGES ROW END -->
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- TABLE STARTS -->
                                            <table class="example table table-hover nowrap">
                                                {{-- <caption>Complaints List</caption> --}}
                                                <thead class="bg bg-primary text-white">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Complaint&nbsp;#</th>
                                                        <th>Complaint&nbsp;Type</th>
                                                        <th>CPT&nbsp;Type</th>
                                                        <th>SPG&nbsp;Type</th>
                                                        <th>Dealer</th>
                                                        <th>Customer</th>
                                                        <th>Mobile</th>
                                                        <th>Complaint&nbsp;Date</th>
                                                        <th class="text-center">Status&nbsp;</th>
                                                        <th>Aging</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="cm_tbody">
                                                    @php
                                                        $n = 1;
                                                        $today = date('Y-m-d');
                                                    @endphp
                                                    {{-- FOREACH STARTS --}}
                                                    @foreach ($list as $row)
                                                        <?php $date = strtotime($row->created_at); ?>
                                                        <tr>
                                                            <td>{{ $n }}</td>
                                                            {{-- Complaint # --}}
                                                            <td class="text-justify">{{ $row->complain_number }}</td>
                                                            {{-- Complaint Type --}}
                                                            <td class="text-justify">{{ $row->complaint_type }}</td>
                                                            {{-- CPT Type --}}
                                                            <td class="custom-truncate text-justify"
                                                                title="{{ $row->complain_type }}">
                                                                {{ $row->complain_type }}
                                                            </td>
                                                            {{-- SPG Type --}}
                                                            <td class="custom-truncate text-justify"
                                                                title="{{ $row->complain_spg_type }}">
                                                                {{ $row->complain_spg_type }}
                                                            </td>
                                                            {{-- Dealer --}}
                                                            <td class="text-justify">{{ $row->dealer_name }}</td>
                                                            {{-- Customer --}}
                                                            <td class="text-justify">{{ $row->customer_name }}</td>
                                                            {{-- Mobile --}}
                                                            <td class="text-justify">{{ $row->mobile }}</td>
                                                            {{-- Complaint Date --}}
                                                            <?php $start_date = date_create($row->createddate); ?>
                                                            <td class="text-center">{{ date_format($start_date, 'd-m-Y') }}
                                                            </td>
                                                            @php
                                                                $complaint_dt = new \Carbon\Carbon($row->created_at);
                                                                $today = date('Y-m-d');
                                                                $aging = $complaint_dt->diff($today)->days;
                                                            @endphp
                                                            {{-- STATUS 'Open' WITH AGING 0 OR WITH AGING < 1 --}}
                                                            @if ($aging < 1 && $row->status == 'Open')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                                {{-- STATUS 'Open' WITH AGING > 0 --}}
                                                            @elseif($aging > 0 && $row->status == 'Open')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $row->status }}&nbsp;!!</span>

                                                                </td>
                                                                {{-- STATUS 'In-Process / In-process' --}}
                                                            @elseif($row->status == 'In-Process' || $row->status == 'In-process')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-yellow shadow-sm text-black">{{ $row->status }}</span>

                                                                </td>
                                                                {{-- STATUS 'Pending' --}}
                                                            @elseif($row->status == 'Pending')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-danger shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                                {{-- STATUS 'Resolve / Resolved' --}}
                                                            @elseif($row->status == 'Resolve' || $row->status == 'Resolved')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-success shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                                {{-- STATUS 'Not Resolved' --}}
                                                            @elseif($row->status == 'Not Resolved')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-black shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                                {{-- STATUS 'Request to force close' --}}
                                                            @elseif($row->status == 'Request to force close')
                                                                <td class="text-justify">
                                                                    <span class="badge bg-gray shadow-sm text-white">Req.
                                                                        to force close</span>

                                                                </td>
                                                                {{-- STATUS 'Force closed' --}}
                                                            @elseif($row->status == 'Force closed')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                                {{-- STATUS 'Closed' --}}
                                                            @elseif($row->status == 'Closed')
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                            @else
                                                                <td class="text-justify">
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $row->status }}</span>

                                                                </td>
                                                            @endif
                                                            {{-- AGING WHEN status = 'Closed' || status == 'Force closed' --}}
                                                            @if ($row->status == 'Closed' || $row->status == 'Force closed')
                                                                <td class="text-center text-primary">{{ $row->aging }}
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge shadow-sm text-success">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                                {{-- AGING WHEN status != 'Closed' --}}
                                                            @else
                                                                <td class="text-center">{{ $aging }}
                                                                    &nbsp;
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge shadow-sm text-primary">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                            @endif
                                                            {{-- ACTION --}}
                                                            <td class="text-left">
                                                                <a href="{{ url('complaint-details/' . $row->id) }}"
                                                                    class="badge bg-primary shadow-sm text-white">
                                                                    <span>Details</span>
                                                                </a>
                                                                @if ($row->complaint_type == 'After Sale' || $row->complaint_type == 'Sale')
                                                                    <a href="{{ url('api-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary" title="Api Status">
                                                                        <i class="fa fa-arrow-up text-white"></i>
                                                                    </a>
                                                                @endif

                                                            </td>
                                                            {{-- ACTION ENDS HERE --}}
                                                        </tr>
                                                        @php
                                                            $n++;
                                                        @endphp
                                                    @endforeach
                                                    {{-- FOREACH ENDS --}}
                                                </tbody>
                                            </table>
                                            <!-- TABLE ENDS -->
                                        </div>
                                    </div>
                                    <!-- ROW  ENDS -->
                                    <!-- </div> -->
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
    <script>
        setTimeout(function() {
            $('#alertMessage').fadeOut('fast');
        }, 5000);
    </script>
@endsection
