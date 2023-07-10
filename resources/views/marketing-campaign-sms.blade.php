@extends('template')

@section('content')

<head>
    <style>
        #emailbtn {
            box-sizing: border-box;
        }

        #emailbtn:hover {
            box-sizing: border-box;
            background-color: #17467e !important;
            color: white !important;
        }

        #smsbtn:hover {
            background-color: #17467e !important;
            border: 1px solid #17467e !important;
        }

        #thead {
            background-color: #17467e;
        }
    </style>
</head>

<!-- main-content STARTS -->
<div class="main-content">
    <!-- section STARTS -->
    <section class="section">
        <!-- section-body STARTS -->
        <div class="section-body">

            <!-- container STARTS -->
            <div class="container">
                <!-- container ROW STARTS -->
                <div class="row">
                    <!-- container col 12 STARTS -->
                    <div class="col-sm-12">

                        <!-- CARD STARTS -->
                        <div class="card">
                            <!-- card-header STARTS -->
                            <div class="card-header">
                                <div>
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                                    &nbsp;
                                    <strong class="card-title">SMS</strong>
                                    <!-- <p class="ml-3" style="display:inline-block">Send promotional messages</p> -->
                                    <button type="button" class="btn btn-dark" style="float: right;" id="emailbtn">
                                        <a href="marketing-campaign-email" class="text-white">E-mails</a>
                                    </button>
                                    <button type="button" class="btn btn-primary mr-2" style="float: right;" id="smsbtn">
                                        <a href="marketing-campaign-sms" class="text-white">Via SMS</a>
                                    </button>
                                </div>
                            </div>
                            <!-- card-header ENDS -->
                            <!-- card-body embed-responsive STARTS -->
                            <div class="card-body embed-responsive" style="overflow: auto">

                                <!-- FORM STARTS -->

                                <form action="" method="POST">
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 ml-4">
                                            <label for="sms" class="form-label">
                                                <h4>Enter Phone Number</h4>
                                            </label>
                                            <input class='form-control shadow bg-white rounded' type="text">
                                            <label for="sms" class="form-label">
                                                <h4>Create New Campaign Via SMS</h4>
                                            </label>
                                            <textarea class="form-control shadow bg-white rounded" rows="10" required="" id="sms" name="sms"></textarea>
                                        </div>
                                    </div>


                                    <div class="row mt-2">
                                        &nbsp; &nbsp;&nbsp;
                                        <div class="col-sm-9">
                                            <Button class="btn btn-primary shadow" style="float: right;">Send</Button>
                                        </div>
                                        <div class="col-sm-3"></div>
                                    </div>
                                    <!-- ROW ENDS -->
                                </form>
                                <!-- FORM ENDS -->
                                <hr>

                                <span class="ml-2 mt-2 mb-2  "><strong class="card-title">View SMS List</strong></span>

                                <!-- ROW STARTS -->
                                <div class="row">
                                    <div class="col-sm-12">

                                        <!-- TABLE STARTS -->

                                        <table id="example" class="table table-striped table-bordered  dataTable no-footer" role="grid" aria-describedby="example_info">
                                            <thead class="bg bg-primary text-white">

                                                <tr id="thead">
                                                    <th style="width:10%;">#</th>
                                                    <th style="width:30%;">ID</th>
                                                    <th style="width:20%;">Date</th>
                                                    <th style="width:20%;">Sent</th>
                                                    <th style="width:10%;">View</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>SMS-0001</td>
                                                    <td>2022-12-05 12:59:53</td>
                                                    <td>100</td>
                                                    <td style='text-align: center;'>
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#campaignDetailsModal" style="width: 100%;">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>SMS-0002</td>
                                                    <td>2022-12-05 13:33:53</td>
                                                    <td>200</td>
                                                    <td style='text-align: center;'>
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#campaignDetailsModal" style="width: 100%;">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                        <!-- TABLE ENDS -->
                                    </div>
                                </div>
                                <!-- ROW  ENDS -->
                            </div>
                            <!-- card-body embed-responsive ENDS -->
                        </div>
                        <!-- CARD ENDS -->
                    </div>
                    <!-- container col 12 ends -->
                </div>
                <!-- container ROW ENDS -->
            </div>
            <!-- container ENDS -->
        </div>
        <!-- section-body ENDS -->
        <!-- section-body ENDS -->
    </section>
    <!-- section STARTS -->
</div>
<!-- main-content ENDS -->

<div class="modal fade bd-example-modal-xl" id="campaignDetailsModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="largeModalLabel">SMS Campaign Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="campaignID" class="form-label"><b>Campaign ID</b></label>
                            <input type="text" class="form-control" id="campaignID" name="campaignID" value="SMS-0001" readonly>
                        </div>

                        <div class="col-md-4">
                            <label for="sentTo" class="form-label"><b>Sent To</b></label>
                            <input type="text" class="form-control" id="sentTo" name="sentTo" value="100" readonly>
                        </div>
                        <div class="col-md-4">
                            <label for="dateTime" class="form-label"><b>Campaign Date & Time</b></label>
                            <input type="text" class="form-control" id="dateTime" name="dateTime" value="2022-12-05 12:59:53" readonly>
                        </div>
                    </div>


                    <div class="row mt-2">
                        <div class="col-md-12">
                            <label for="campaign" class="form-label"><b>Campaign Text</b></label>
                            <textarea id="campaign" name="campaign" class="form-control" name="" rows="3" value="100" readonly>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum repellendus minus quae eos laudantium dolores mollitia architecto necessitatibus nostrum eius voluptatibus, molestias, facere alias similique vero optio tempora impedit. Incidunt.</textarea>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button class="btn btn-danger float-right" style="width: 100%;"><b>Close</b></button>
                        </div>
                    </div>
            </div>



        </div>

        </form>

    </div>

</div>

@endsection
