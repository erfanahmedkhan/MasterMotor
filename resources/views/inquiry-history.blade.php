@extends('template')

@section('content')


<!-- main-content STARTS -->
<div class="main-content mt-3">
    <!-- section STARTS -->
    <section class="section">
        <!-- section-body STARTS -->
        <div class="section-body">
            <!-- container STARTS -->
            <div class="container">
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
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">Inquiries List</strong>

                            </div>
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- TABLE STARTS -->
                                        <table id="bootstrap-data-table-export" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Customer&nbsp;Name</th>
                                                    <th>Customer&nbsp;Type</th>
                                                    <th>Customer&nbsp;Mobile&nbsp;no</th>
                                                    <th>Inquiry&nbsp;ID</th>
                                                    <th>Inquiry&nbsp;Type</th>
                                                    <th>Inquiries</th>
                                                    <th>Dealership</th>
                                                    <th>Start&nbsp;Date</th>
                                                    <th>End&nbsp;Date</th>
                                                    <th>Source</th>
                                                    <th>City</th>
                                                    <th>Status</th>
                                                    <th>Reason</th>
                                                    <th>Other&nbsp;Reason</th>
                                                    <th>Next&nbsp;Follow&nbsp;Up</th>
                                                    <th>Remarks</th>
                                                    <th>Notes</th>
                                                    <th>Created&nbsp;By</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->cname }}</td>
                                                    <td>{{ $item->customer_type }}</td>
                                                    <td>{{ $item->mobile }}</td>
                                                    <td>{{ $item->inquiry_number }}</td>
                                                    <td>{{ $item->inquiry_type }}</td>
                                                    <td>{{ $item->inquiry_details }}</td>
                                                    <td>{{ $item->dealer_name }}</td>
                                                    <td>{{ $item->start_date }}</td>
                                                    <td>{{ $item->end_date }}</td>
                                                    <td>{{ $item->source }}</td>
                                                    <td>{{ $item->city_name }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>{{ $item->status_remarks }}</td>
                                                    <td>{{ $item->other_reason }}</td>
                                                    <td>{{ $item->next_follow_up }}</td>
                                                    <td>{{ $item->remarks }}</td>
                                                    <td>{{ $item->notes }}</td>
                                                    <td>{{ $item->username }}</td>
                                                    <td>
                                                        <a href="{{ url('api/save-customer/'.$item->id) }}" class="btn btn-round btn-primary">Send to DMS</a>
                                                    </td>
                                                </tr>
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
