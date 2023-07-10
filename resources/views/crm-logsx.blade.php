@extends('template')

<head>
    <style>
        .btn-round {
            border-radius: 50px !important
        }

        .descWrapping {
            white-space: nowrap !important;
            overflow: hidden !important;
            text-overflow: ellipsis !important;
            text-align: justify !important;
            width: 95%!important;
        }
    </style>
</head>
@section('content')

<!-- main-content STARTS -->
<div class="main-content mt-2">
    <!-- section STARTS -->
    <section class="section">
        <!-- section-body STARTS -->
        <div class="section-body">
            <!-- container STARTS -->
            <div class="container-fluid">
                <!-- container ROW STARTS -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                                <strong class="card-title">CRM Logs</strong>
                            </div>

                            <!-- card-body STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3">
                                        <button class="btn btn-primary btn-round float-right mb-2" data-toggle="collapse" data-target="#searchfilters" aria-hidden="false" aria-controls="searchfilters">
                                            <b>Filters</b>&nbsp;&nbsp;<i class="fa fa-search"></i>
                                        </button>


                                    </div>
                                </div>
                                <!-- ... -->
                                <div class="row mt-1 collapse" id="searchfilters">
                                    <div class="col-md-3">
                                        <label for="start_from"><b>From:</b></label>
                                        <input type="date" class="form-control" name="start_from" id="start_from">

                                    </div>

                                    <div class="col-md-3">
                                        <label for="end_from"><b>To:</b></label>
                                        <input type="date" class="form-control" name="end_from" id="end_from">
                                    </div>

                                    <div class="col-md-3">
                                        <label for="module"><b>Module</b></label>
                                        <select class="form-control shadow-sm  bg-white" name="module" id="module">
                                            <option value="Inquiries">Inquiries</option>
                                            <option value="Complaints">Complaints</option>
                                            <option value="Social">Social</option>
                                            <option value="Call">Call</option>
                                            <option value="Customers">Customers</option>
                                        </select>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="users"><b>Users</b></label>
                                        <select class="form-control shadow-sm  bg-white" name="users" id="users">
                                            <option value="Admin">Admin</option>
                                            <option value="Zamran">Zamran</option>
                                            <option value="Ammar">Ammar</option>
                                            <option value="Ahsan">Ahsan</option>
                                            <option value="Sheraz">Sheraz</option>
                                        </select>
                                        <button type="submit" class="btn btn-round btn-primary mt-1 mb-1" name="search" value="Search" style="float:right;">Search</button>

                                    </div>


                                </div>
                                <!-- ... -->
                              
                                <div class="row">
                                    <div class="col-md-12" style="width: 20%">
                                        <!-- <div>
                                            <span class="badge descWrapping">
                                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quae, placeat explicabo quis voluptatem maxime similique sequi distinctio aspernatur molestiae enim eaque sunt quo cupiditate dolor facilis accusamus perferendis aliquid quibusdam corporis perspiciatis facere? Quo, eum iure obcaecati repellendus ea ipsum nisi saepe ipsam autem natus, quasi doloribus veritatis accusantium!
                                            </span>
                                            <span> <button class=" btn btn-primary btn-round badge badge-primary ml-4" data-toggle="modal" data-target="#logsdetails" data-placement="top" title="More Info"> <i class="fa fa-info-circle"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <div></div> -->
                                    </div>

                                </div>
                                <!-- ROW STARTS -->

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
                                        <!-- TABLE STARTS -->

                                        <table class="example table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                                <tr>
                                                    <th style="width: 5%">#</th>
                                                    <th style="width: 15%">Agent Name</th>
                                                    <th style="width: 15%">Previous Action</th>
                                                    <th style="width: 15%">Current Action</th>
                                                    <th style="width: 11%">Module</t>
                                                    <th style="width: 20% !important;">Description</th>
                                                    <th style="width: 7%">Status</th>
                                                    <th style="width: 3%">Details</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Zamran</td>
                                                    <td>-</td>
                                                    <td class="text-success"><b>Insert</b></td>
                                                    <td>Social Media</td>
                                                    <td>
                                                        <span class="badge descWrapping">
                                                            Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                                        </span>
                                                        <!-- <span class="float-right"><a href="logsdetails" data-toggle="modal" data-target="#logsdetails">more</a></span> -->

                                                    </td>

                                                    <td></td>
                                                    <td><button class=" btn btn-primary btn-round badge badge-primary ml-4" data-toggle="modal" data-target="#logsdetails" data-placement="top" title="More Info"> <i class="fa fa-info-circle"></i>
                                                        </button></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Syed Subhan Ali</td>
                                                    <td class="text-success"><b>Insert</b></td>
                                                    <td class="text-warning"><b>Update</b></td>
                                                    <td>Complaint</td>
                                                    <td >
                                                        <span class="badge descWrapping">
                                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime magni quis eum.
                                                        </span>
                                                    <!-- <span class="float-right">
                                                            <a href="logsdetails2" data-toggle="modal" data-target="#logsdetails2">more</a>
                                                        </span> -->
                                                    </td>
                                                    <td></td>
                                                    <td><button class=" btn btn-primary btn-round badge badge-primary ml-4" data-toggle="modal" data-target="#logsdetails2" data-placement="top" title="More Info"> <i class="fa fa-info-circle"></i>
                                                        </button></td>
                                                </tr>

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
        <!-- MODAL STARTS -->
        <div class="modal fade bd-example-modal-xl" id="logsdetails" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="largeModalLabel">CRM Logs</h5>
                        <button type="button" class="close close-danger text-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tr>
                                <td><b>Agent name</b></td>
                                <td>Zamran</td>
                                <td><b>Date Time</b></td>
                                <td>11/12/2022 02:30:55 AM</td>

                            </tr>

                            <tr>
                                <td><b>Action</b></td>
                                <td class="text-warning"><b>Insert</b></td>
                                <td><b>Module</b></td>
                                <td>Inquiry</td>
                            </tr>
                            <tr>
                                <td><b>Inquiry Type</b></td>
                                <td>Pre Sale</td>
                                <td><b>Inquiry Number</b></td>
                                <td>INQ-0000000041</td>
                            </tr>
                            <tr>
                                <td><b>Old Value</b></td>
                                <td>-</td>
                                <td><b>New Value</b></td>
                                <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime magni quis eum dolore voluptates mollitia praesentium dolorem expedita placeat veniam.</td>
                            </tr>
                            <tr>
                                <td><b>Status Value</b></td>
                                <td>-</td>
                                <td><b>IP Address</b></td>
                                <td>103.134.238.130</td>
                            </tr>
                        </table>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Close</b></button>
                    </div>
                </div>

            </div>
        </div>
</div>
<!-- MODAL ENDS -->

<!-- MODAL STARTS -->
<div class="modal fade bd-example-modal-xl" id="logsdetails2" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">CRM Logs</h5>
                <button type="button" class="close close-danger text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <table class="table">
                    <tr>
                        <td><b>Agent name</b></td>
                        <td>Syed Subhan Ali</td>
                        <td><b>Date Time</b></td>
                        <td>11/12/2022 02:30:55 AM</td>

                    </tr>

                    <tr>
                        <td><b>Action</b></td>
                        <td class="text-success"><b>Update</b></td>
                        <td><b>Module</b></td>
                        <td>Complaint</td>
                    </tr>
                    <tr>
                        <td><b>Complaint Type</b></td>
                        <td>Publicity and promotion </td>
                        <td><b>Complaint Number</b></td>
                        <td>CM-000000012</td>
                    </tr>
                    <tr>
                        <td><b>Old Value</b></td>
                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos, consectetur?</td>
                        <td><b>New Value</b></td>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime magni quis eum dolore voluptates mollitia praesentium dolorem expedita placeat veniam.</td>
                    </tr>
                    <tr>
                        <td><b>Status Value</b></td>
                        <td>-</td>
                        <td><b>IP Address</b></td>
                        <td>103.134.238.130</td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Close</b></button>
            </div>
        </div>

    </div>
</div>
</div>
<!-- MODAL ENDS -->
</section>
<!-- section STARTS -->
</div>
<!-- main-content ENDS -->

@endsection