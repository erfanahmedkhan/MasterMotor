@extends('template')
@section('title', 'Inquries Management')
@section('content')
    <style>
        .disabled-link {
            pointer-events: none !important;

        }

        .disabled {
            cursor: not-allowed !important;
        }

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
                                    <strong class="card-title">Inquries list</strong>
                                    <a href="{{ url('create-customers-new-inquiry/add') }}"
                                        class="btn btn-round btn-primary" style="float: right">New Ticket <i
                                            class="fa fa-plus-circle"></i></a>
                                </div>
                                <!-- card-body STARTS -->
                                <div class="card-body embed-responsive" style="overflow: auto">
                                    <!-- <div class="card-body"> -->
                                    <!-- ROW STARTS -->
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
                                            <!-- TABLE STARTS -->
                                            <table class="example table table-striped table-bordered nowrap">
                                                <thead class="bg bg-primary text-white text-center nowrap">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Inquiry&nbsp;#</th>
                                                        <th>Inquiry&nbsp;Category</th>
                                                        <th>Inquiry&nbsp;Type</th>
                                                        <th>Inq&nbsp;Sub-Type</th>
                                                        {{-- <th>Inquiry&nbsp;</th> --}}
                                                        <th>Dealership</th>
                                                        <th>Customer</th>
                                                        <th>Mobile&nbsp;</th>
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
                                                            <td class="text-justify">{{ $item->inquiry_category }}</td>
                                                            <td class="text-justify">{{ $item->inquiry_type }}</td>

                                                            <td class="text-center">
                                                                @if (empty($item->inquiry_sub_type))
                                                                    -
                                                                @else
                                                                    {{ $item->inquiry_sub_type }}
                                                                @endif
                                                            </td>
                                                            {{-- <td class="custom-truncate text-justify"
                                                                title="{{ $item->inquiry_details }}">
                                                                {{ $item->inquiry_details }}</td> --}}
                                                            <td class="text-justify">
                                                                @if (empty($item->dealer_name))
                                                                    -
                                                                @else
                                                                    {{ $item->dealer_name }}
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->cname }}</td>
                                                            <td class="text-justify">{{ $item->mobile }}</td>
                                                            <?php $start_date = date_create($item->start_date); ?>
                                                            <?php $end_date = date_create($item->end_date); ?>
                                                            <td class="text-justify">
                                                                {{ date_format($start_date, 'd-m-Y') }}
                                                            </td>
                                                            @php
                                                                $start_date = new \Carbon\Carbon($item->start_date);
                                                                $today = date('Y-m-d');
                                                                $aging = $start_date->diff($today)->days;
                                                            @endphp

                                                            <td class="text-justify">
                                                                @if ($aging < 1 && $item->status == 'Open')
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($aging > 0 && $item->status == 'Open')
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $item->status }}&nbsp;!!</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Closed')
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Force closed')
                                                                    <span
                                                                        class="badge bg-primary shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Request to force close')
                                                                    <span class="badge bg-gray shadow-sm text-white">Request
                                                                        to<br>force close</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Won')
                                                                    <span
                                                                        class="badge bg-success shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Lost')
                                                                    <span
                                                                        class="badge bg-secondary shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Cold')
                                                                    <span
                                                                        class="badge bg-info shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Warm')
                                                                    <span
                                                                        class="badge bg-orange shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Hot')
                                                                    <span
                                                                        class="badge bg-danger shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @elseif($item->status == 'Pending')
                                                                    <span
                                                                        class="badge bg-danger shadow-sm text-white">{{ $item->status }}</span>
                                                                    <a href="{{ url('inquiry-status-log/' . $item->inquiry_number) }}"
                                                                        class="badge bg-primary shadow-sm text-white">
                                                                        <i class="fa fa-info-circle"></i>
                                                                    </a>
                                                                @endif
                                                            </td>

                                                            @if ($item->status == 'Closed' || $item->status == 'Force closed')
                                                                <td class="text-center">{{ $item->aging }}
                                                                </td>
                                                            @else
                                                                <td class="text-center">{{ $aging }}
                                                                </td>
                                                            @endif
                                                            <td class="text-justify disabled">
                                                                @if ($item->send_to_dms == '1')
                                                                    <a href="{{ url('api/save-customer/' . $item->id) }}"
                                                                        data-placement="top"
                                                                        class="badge bg-warning disabled-link">
                                                                        <i class="fa fa-long-arrow-right"></i>
                                                                    </a>
                                                                @else
                                                                    <a href="{{ url('api/save-customer/' . $item->id) }}"
                                                                        data-placement="top" title="Send inquiry to DMS"
                                                                        class="badge bg-success text-white">
                                                                        <i class="fa fa-long-arrow-right"></i>
                                                                    </a>
                                                                @endif

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
