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
                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">Complaint History</strong>
                            </div>
                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <!-- <div class="card-body"> -->
                                <!-- ROW STARTS -->
                                <div class="row">
                                    <div class="col-md-12">

                                        <!-- TABLE STARTS -->
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Customer Mobile no</th>
                                                    <th>Customer Cnic</th>
                                                    <th>Complain ID</th>
                                                    <th>VOC</th>
                                                    <th>Dealership</th>
                                                    <th>Complain Type</th>
                                                    <th>Owner Vehicle</th>
                                                    <th>Complaint Priority</th>
                                                    <th>Date</th>
                                                    <th>Notes</th>
                                                    <th>Uploaded Document</th>
                                                    <th>Created By</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                <tr>

                                                  <td>{{ $item->cname }}</td>
                                                  <td>{{ $item->mobile }}</td>
                                                  <td>{{ $item->cnic }}</td>
                                                  <td>{{ $item->id }}</td>
                                                  <td>{{ $item->voc }}</td>
                                                  <td>{{ $item->dealer_name }}</td>
                                                  <td>{{ $item->complaint_type }}</td>
                                                  <td>{{ $item->owner_vehicle }}</td>
                                                  <td>{{ $item->complaint_priority }}</td>
                                                  <td>{{ $item->created_at }}</td>
                                                  <td>{{ $item->notes }}</td>
                                                  <td><img src="{{ asset($item->document) }}" width="80" alt=""></td>
                                                  <td>{{ $item->username }}</td>
                                                </tr>
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
