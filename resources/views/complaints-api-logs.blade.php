@extends('template')
@section('title', 'Complaints API Logs')
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
            max-width: 300 !important;
            white-space: nowrap !important;
            /* overflow: hidden !important; */
            overflow: visible !important
                /* text-overflow: ellipsis !important; */
                overflow-x: scroll !important;
            overflow-y: auto !important;
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
                                    <strong class="card-title">Complaints API Logs</strong>
                                    <a href="{{ url('complaints-management') }}" class="btn btn-round btn-primary"
                                        style="float: right" target="_blank">Complaints</a>
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
                                            <table class="example table table-hover">
                                                <caption>List of API's Status & Response</caption>
                                                <thead class="bg bg-primary text-white">
                                                    <tr>
                                                        <th>#</th>
                                                        <th class="text-center">Complaint&nbsp;#</th>
                                                        <th class="text-center">Complaint&nbsp;Type</th>
                                                        <th class="text-center">API Status</th>
                                                        <th class="w-50">API Response</th>
                                                        <th class="text-center">Date&nbsp;&&nbsp;Time</th>
                                                        <th class="text-center">User</th>
                                                    </tr>
                                                </thead>
                                                <tbody style="font-size: 10px !important;">
                                                    @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach ($list as $row)
                                                        <?php $date = strtotime($row->created_at); ?>
                                                        <tr>
                                                            <td>{{ $n }}</td>
                                                            <td class="text-center">{{ $row->complain_number }}</td>
                                                            <td class="text-center">{{ $row->complain_type }}</td>
                                                            @if ($row->api_status == 200)
                                                                <td> <span class="badge bg-success text-center text-white">
                                                                        {{ $row->api_status }}
                                                                    </span>
                                                                </td>
                                                            @else
                                                                <td> <span class="badge bg-danger text-center text-white">
                                                                        {{ $row->api_status }}
                                                                    </span>
                                                                </td>
                                                            @endif
                                                            <td title="{{ $row->api_response }}">
                                                                {{ $row->api_response }}</td>
                                                            <td>{{ date('d-m-Y H:i:s', strtotime($row->created_at)) }}</td>
                                                            <td class="text-center">{{ $row->user }}</td>
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
@endsection
