@php
    $title = 'CRM - Inquiries List';
@endphp
@extends('template')
@section('content')
    <style>
        .card {
            --bs-card-border-width: 5px !important;
        }

        .card-body {
            padding: 5px 15px 5px 15px !important;
        }
        .maincard {
            width: 95% !important;
        }

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


        .form-control {
            margin-bottom: 1px !important;
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

    <!-- main-content START -->
    <div class="main-content m-2 p-2">
        <!-- section START -->
        <section class="section">
            <!-- section-body START -->
            <div class="section-body">
                <!-- container START -->
                <div class="container-fluid rounded p-2">
                    <!-- container ROW STARTS -->
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
                        </div>
                        @endif
                        <!-- CARD STARTS -->
                        <div class="card maincard ml-2">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                    style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">&nbsp;Customer Inquiries</strong>
                                <a href="{{ url('create-customers-new-inquiry/add') }}" class="btn btn-round btn-primary"
                                    style="float: right">New Ticket <i class="fa fa-plus-circle"></i></a>
                            </div>
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="example table table-striped table-bordered nowrap">
                                            <thead class="bg bg-primary text-white text-center nowrap">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Inquiry&nbsp;Number</th>
                                                    <th>Inquiry&nbsp;Category</th>
                                                    <th>Inquiry&nbsp;Type</th>
                                                    <th>Inq&nbsp;Sub-Type</th>
                                                    {{-- <th>Inquiry&nbsp;</th> --}}
                                                    <th>Dealership</th>
                                                    <th>Customer</th>
                                                    <th>Mobile&nbsp;no</th>
                                                    <th>Start&nbsp;Date</th>
                                                    <th>Status</th>
                                                    <th>Aging</th>
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
                                                        {{-- <td class="text-center">{{ $item->inquiry_sub_type }}</td> --}}
                                                        <td class="text-center">
                                                            @if (empty($item->inquiry_sub_type))
                                                                -
                                                            @else
                                                                {{ $item->inquiry_sub_type }}
                                                            @endif
                                                        </td>
                                                        {{-- <td class="custom-truncate"
                                                                title="{{ $item->inquiry_details }}">
                                                                {{ $item->inquiry_details }}</td> --}}
                                                        <td class="text-center">
                                                            @if (empty($item->dealer_name))
                                                                -
                                                            @else
                                                                {{ $item->dealer_name }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $item->cname }}</td>
                                                        <td class="text-center">{{ $item->mobile }}</td>
                                                        <?php $start_date = date_create($item->start_date); ?>
                                                        <?php $end_date = date_create($item->end_date); ?>
                                                        <td class="text-center">{{ date_format($start_date, 'd-m-Y') }}
                                                        </td>
                                                        <td class="text-center">
                                                            <span
                                                                class="badge bg-orange shadow-sm text-white">{{ $item->status }}</span>
                                                        </td>
                                                        @php
                                                            $start_date = new \Carbon\Carbon($item->start_date);
                                                            $today = date('Y-m-d');
                                                            $aging = $start_date->diff($today)->days;
                                                        @endphp

                                                        @if ($item->status == 'Closed')
                                                            <td class="text-center">{{ $item->aging }}
                                                            </td>
                                                        @else
                                                            <td class="text-center">{{ $aging }}
                                                            </td>
                                                        @endif
                                                        <td class="text-center">
                                                            <a href="{{ url('api/save-customer/' . $item->id) }}"
                                                                data-placement="top" title="Send inquiry to DMS"
                                                                class="badge bg-success text-white">
                                                                <i class="fa fa-long-arrow-right"></i>
                                                            </a>


                                                            <a href="{{ url('inquiry-details/' . $item->id) }}"
                                                                class="badge bg-primary  text-white" data-placement="top"
                                                                title="Inquiry Details">
                                                                <i class="fa fa-info-circle"></i></a>
                                                        </td>
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
        </section>
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
