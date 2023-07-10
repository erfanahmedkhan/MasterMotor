@extends('template')
@section('title', 'API Status Response ')
@section('content')
    <style>
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

        .maincard {
            width: 95% !important;
        }
    </style>
    <!-- main-content STARTS -->
    <div class="main-content mt-3">
        <!-- section STARTS -->
        <section class="section">
            <!-- section-body STARTS -->
            <!-- container STARTS -->
            <div class="container-fluid">
                <!-- container ROW STARTS -->
                <div class="row maincard">
                    <div class="col-12">
                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                    style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">Api Status</strong>
                                <a href="{{ url('complaints-api-logs') }}" class="btn btn-round btn-primary"
                                    style="float: right" title="Complaints API Status & Responses">API Logs</a>
                            </div>
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <div class="row">
                                    <div class="col-12">
                                        <!-- TABLE STARTS -->
                                        <table class="example table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                                <tr class="text-center">
                                                    <th> # </th>
                                                    <th> Complaint Number </th>
                                                    <th> Complaint Type </th>
                                                    <th> Api Status</th>
                                                    <th> Api Response</th>
                                                    <th> Create Date & Time </th>
                                                    <th> Created By </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $n = 1;
                                                @endphp
                                                @foreach ($data as $item)
                                                    <tr class="text-center">
                                                        <td>{{ $n }}</td>
                                                        <td>{{ $item->complain_number }}</td>
                                                        <td>{{ $item->complain_type }}</td>
                                                        <td>{{ $item->api_status }}</td>
                                                        <td>{{ $item->api_response }}</td>
                                                        <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                                        <td>{{ $item->createdbyname }}</td>
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
        </section>
        <!-- section STARTS -->
    </div>
    <!-- main-content ENDS -->
@endsection
