@extends('template')
@section('title', 'Inquiry Status Logs')
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
                    <div class="col-md-12">
                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                    style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">Inquiry Status Log</strong>
                                <!-- <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#AddCustomerModal" style="float: right;">
                                        Add new Customer <i class="fa fa-plus-circle"></i>
                                      </button> -->
                            </div>
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <!-- TABLE STARTS -->
                                        <table class="example table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                                <tr class="text-center">
                                                    <th>#</th>
                                                    <th>Inquiry Number</th>
                                                    <th>Create Date & Time</th>
                                                    <th>Current Status </th>
                                                    <th> Previous Status</th>
                                                    <th>Aging</th>
                                                    <th>Last Update Date & Time</th>
                                                    <th> Last Updated By</th>
                                                    <th>Created By </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @php
                                                    $n = 1;
                                                    $today = date('d-m-Y');
                                                @endphp
                                                @foreach ($data as $item)
                                                    <tr class="text-center">
                                                        <td>{{ $n }}</td>
                                                        <td>{{ $item->inquiry_number }}</td>
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
                                                            $complain_date = new \Carbon\Carbon($item->created_date);
                                                            $today = date('d-m-Y');
                                                            $diff = $complain_date->diff($today)->days;
                                                        @endphp
                                                        <td class="text-center">
                                                            @if ($item->current_status == 'Closed' || $item->current_status == 'Force closed' || $item->current_status == 'Won' || $item->current_status == 'Lost')
                                                                {{ $item->aging }}
                                                            @else
                                                                {{ $diff }}
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
    </div>
    <!-- section-body ENS -->
    </section>
    <!-- section STARTS -->
    </div>
    <!-- main-content ENDS -->
@endsection
