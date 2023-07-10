@extends('template')

@section('content')


<!-- main-content STARTS -->
<div class="main-content mt-3">
    <!-- section STARTS -->
    <section class="section">
        <!-- section-body STARTS -->
        <div class="section-body">
            <!-- container STARTS -->
            <div class="container-fluid">
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
                                <strong class="card-title">Registered Vehicles</strong>

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
                                                <tr>
                                                    <th>Customer Name</th>
                                                    <th>Customer Mobile no</th>
                                                    <th>Customer cnic</th>
                                                    <th>Customer Type</th>
                                                    <th>Car Model</th>
                                                    <th>Car Company</th>
                                                    <th>Car Model Year</th>
                                                    <th>Registered Date</th>
                                                    <th>Chases Number</th>
                                                    <th>Car Color</th>
                                                    <th>Status</th>
                                                   
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $item->cname }}</td>
                                                    <td>{{ $item->mobile }}</td>
                                                    <td>{{ $item->cnic }}</td>
                                                    <td>{{ $item->customer_type }}</td>
                                                    <td>{{ $item->car_model }}</td>
                                                    <td>{{ $item->car_company }}</td>
                                                    <td>{{ $item->car_model_year }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->chases_number }}</td>
                                                    <td>{{ $item->color }}</td>
                                                    <td>{{ $item->status }}</td>
                                                    <td>
                                                        <a href="#" class="btn btn-primary">View</a>
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
