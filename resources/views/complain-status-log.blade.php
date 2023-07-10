@extends('template')
@section('title', 'Complaint Status Logs')
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
    </style>
    <!-- main-content STARTS -->
    <div class="main-content mt-3">
        <!-- section STARTS -->
        <section class="section">
            <!-- section-body STARTS -->
            <!-- container STARTS -->
            <div class="container-fluid">
                <!-- container ROW STARTS -->
                <div class="row">
                    <div class="col-12">
                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                    style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">Complaint Status Log</strong>
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
                                                    <th> Create Date & Time </th>
                                                    <th> Current Status </th>
                                                    <th> Previous Status </th>
                                                    <th> Aging </th>
                                                    <th> Last Update Date & Time </th>
                                                    <th> Last Updated By </th>
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
                                                        {{-- <td>{{ $item->created_at }}</td> --}}
                                                        <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                                        <td>{{ $item->current_status }}</td>
                                                        <td>
                                                            @if (empty($item->previous_status))
                                                                -
                                                            @else
                                                                {{ $item->previous_status }}
                                                            @endif
                                                        </td>
                                                        @php
                                                            // $complain_date = new \Carbon\Carbon($item->created_at);
                                                            // $today = date('Y-m-d');
                                                            // $diff = $complain_date->diff($today)->days;
                                                            $complain_date = new \Carbon\Carbon($item->created_at);
                                                            $today = date('d-m-Y');
                                                            $diff = $complain_date->diff($today)->days;
                                                        @endphp
                                                        {{-- <td>{{ $diff }}</td> --}}
                                                        @if ($item->current_status == 'Closed' || $item->current_status == 'Force closed')
                                                            <td class="text-center">{{ $item->aging }}
                                                            </td>
                                                        @else
                                                            <td class="text-center">{{ $diff }}
                                                            </td>
                                                        @endif
                                                        <td>
                                                            @if (empty($item->updated_at))
                                                                -
                                                            @else
                                                                {{ date('d-m-Y H:i:s', strtotime($item->updated_at)) }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if (empty($item->updatedbyname))
                                                                -
                                                            @else
                                                                {{ $item->updatedbyname }}
                                                            @endif
                                                        </td>
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
