@extends('template')
@section('title', 'Complaints Management')
@section('content')
    <style>
        .card {
            --bs-card-border-width: 5px !important;
            height: 493px !important;
        }

        .card-body {
            padding: 10px 15px 5px 15px !important;
        }

        .bg-orange {
            background-color: #FF8B22 !important;
        }

        .bg-yellow {
            background-color: yellow !important;
            color: black !important;
            font-weight: bold !important;
        }

        .bg-gray {
            background: darkgray !important;
        }

        .badge {
            font-size: 10px !important;
        }

        .maincard {
            width: 95% !important;
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
            max-width: 150 !important;
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
        }
    </style>
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
                            <div class="card w-95">
                                <!-- card-header STARTS -->
                                <div class="card-header">
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                        style="cursor: pointer; font-size: 20px"></i>
                                    <strong class="card-title">Complaints Management</strong>
                                    <a href="{{ url('create-customer-inquiry/add') }}" class="btn btn-round btn-primary"
                                        style="float: right">New Ticket <i class="fa fa-plus-circle"></i></a>
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
                                            <table class="example table table-hover  nowrap">
                                                <caption>List of Complaints</caption>
                                                <thead class="bg bg-primary text-white text-center tablethead">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Complaint&nbsp;#</th>
                                                        <th>Complaint&nbsp;Type</th>
                                                        <th>CPT&nbsp;Type</th>
                                                        <th>SPG&nbsp;Type</th>
                                                        {{-- <th>CCC&nbsp;Type</th> --}}
                                                        <th>Dealer</th>
                                                        <th>Customer</th>
                                                        <th>Mobile</th>
                                                        <th>Date</th>
                                                        <th class="text-center">Status&nbsp;</th>
                                                        <th>Aging</th>
                                                        <th class="text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 10px !important;">
                                                    @php
                                                        $n = 1;
                                                        $today = date('Y-m-d');
                                                    @endphp
                                                    @foreach ($list as $row)
                                                        <?php $date = strtotime($row->created_at); ?>
                                                        <tr>
                                                            <td>{{ $n }}</td>
                                                            <td class="text-center">{{ $row->complain_number }}</td>
                                                            <td class="text-center">{{ $row->complaint_type }}</td>
                                                            <td
                                                                class="custom-truncate text-center" title="{{ $row->complain_type }}">
                                                                {{ $row->complain_type }}
                                                            </td>
                                                            <td class="custom-truncate text-center"
                                                                title="{{ $row->complain_spg_type }}">
                                                                {{ $row->complain_spg_type }}
                                                            </td>
                                                            {{-- <td class="custom-truncate text-center"
                                                                title="{{ $row->complain_ccc_type }}">
                                                                {{ $row->complain_ccc_type }}
                                                            </td> --}}
                                                            <td class="text-center">{{ $row->dealer_name }}</td>
                                                            <td class="text-justify">{{ $row->customer_name }}</td>
                                                            <td class="text-center">{{ $row->mobile }}</td>
                                                            <!--<td>{{ date('d/m/Y', $date) }}</td>-->
                                                            <?php $start_date = date_create($row->createddate); ?>
                                                            <td>{{ date_format($start_date, 'd-m-Y') }}</td>
                                                            @php
                                                                $complain_date = new \Carbon\Carbon($row->created_at);
                                                                $today = date('Y-m-d');
                                                                $aging = $complain_date->diff($today)->days;
                                                            @endphp

                                                            <!--Status 'Open' by default with Aging 0-->
                                                            @if ($aging < 1 && $row->status == 'Open')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                            @elseif($aging > 0 && $row->status == 'Open')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $row->status }}&nbsp;!!</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                                <!--Status 'In Process' with Aging < 7 days-->
                                                            @elseif($aging < 3 && $row->status == 'In-Process')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-yellow shadow-sm text-black">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                                <!--Status 'In Process' with Aging > 7 days-->
                                                            @elseif($aging > 2 && $row->status == 'In-Process')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-yellow shadow-sm text-black">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>

                                                                <!--Status 'Pending' -->
                                                            @elseif($row->status == 'Pending')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-danger shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>

                                                                <!--Status 'Resolve' -->
                                                            @elseif($row->status == 'Resolve')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-success shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                                <!--Status 'Resolved' -->
                                                            @elseif($row->status == 'Resolved')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-success shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>

                                                                <!--Status 'Not Resolved' -->
                                                            @elseif($row->status == 'Not Resolved')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-black shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>

                                                                <!--Request to force close' -->
                                                            @elseif($row->status == 'Request to force close')
                                                                <td class="text-left">
                                                                    <span class="badge bg-gray shadow-sm text-white">Request
                                                                        to<br>force close</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>

                                                                <!--Force closed-->
                                                            @elseif($row->status == 'Force closed')
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>

                                                                <!--Status = 'Closed'-->
                                                            @else
                                                                <td class="text-left">
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $row->status }}</span>
                                                                    <a href="{{ url('complain-status-log/' . $row->complain_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                </td>
                                                            @endif

                                                            @if ($row->status == 'Closed')
                                                                <td class="text-center">{{ $row->aging }}
                                                                </td>
                                                            @else
                                                                <td class="text-center">{{ $aging }}
                                                                </td>
                                                            @endif

                                                            <td class="text-right">
                                                                <a href="{{ url('complain-details/' . $row->id) }}"
                                                                    class="badge bg-primary shadow-sm text-white">
                                                                    Details
                                                                </a>
                                                                <a href="{{ url('api-status-log/' . $row->complain_number) }}"
                                                                    class="badge bg-secondary shadow-sm text-white" title="Api Status">
                                                                    <i class="fa fa-info-circle text-white"></i>
                                                                </a>
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
