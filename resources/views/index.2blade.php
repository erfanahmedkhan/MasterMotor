    @extends('template')

    @section('content')


    <style>
        .socialmediaicons img {
            height: 40%;
            width: fit-content;
        }

        .socialmediaicons a {
            text-decoration: none;
            color: black;
        }

        .socialmediaicons a:hover {
            color: #17467e !important;
            /*text-decoration: underline;*/
        }

        #DataTables_Table_0_filter {
            margin: 0;
            float: right;
        }

        #DataTables_Table_0_paginate {
            float: right;
        }

        #DataTables_Table_0_length {
            display: none
        }

        .container-fluid {

            background-color: #f4f5ff;
        }

        .fa-check {
            font-size: 33px;
            margin-bottom: 10px;

        }

        .fa-phone {
            font-size: 33px;
            color: #17467e;
            margin-bottom: 10px;
        }

        .fa-clock-o {
            font-size: 33px;
            color: #17467e;
            margin-bottom: 10px;
        }

        .fa-envelope {
            font-size: 33px;
            color: #f58935;
            margin-bottom: 10px;
        }

        .fa-mobile {
            font-size: 39px;
            color: #f58935;
            margin-bottom: 10px;
        }

        .fa-mobile-signal {
            font-size: 33px;
            color: #f58935;
            margin-bottom: 10px;
        }

        .text-primary {
            color: #17467e;
        }

        .rounded {
            border-radius: 1.25rem !important;
        }

        .badge {
            float: right;
            margin-right: 20%;
            font-weight: bold;
            color: #fff;

        }

        .points {
            color: #f58935 !important;
            font-weight: bold;
        }

        .bg-warning {
            color: #f58935 !important;
            background-color: #f58935 !important;
        }

        .bg-primary {
            color: #17467e;
            background-color: #17467e;
        }

        /* .card-body {
                padding: 5px !important;
            } */

        #nav {
            display: flex;
            padding-left: 25px;
        }

        #nav ol {
            display: flex;
            margin-left: 25px;
            margin-top: 2%;
        }

        

        .navbar-default .active {
            text-decoration-color: #f58935;
        }

        .topbar {
            height: 34px;
        }

        footer {
            margin-top: 46%;
            margin-bottom: 1%;
            height: 55px;
        }

        body {

            background-color: #f4f5ff;
        }

        .channels {

            height: fit-content;
        }

        .channels img {
            max-width: 50% !important;
        }

        .linechatdiv {
            margin-left: 4% !important;
        }
    </style>
    </head>




    <div class="content mt-3">

        <div class="row" style="background-color: #f4f5ff;">
            <div class="col-md-3">

                <div class="row">
                    <div class="col-md-12 mt-2  ">
                        <h4>
                            <center><strong>AGENTS</strong></center>
                        </h4>

                        <table class="table table-responsive{-sm|-md|-lg|-xl} table-borderless table-hover  ">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><i class="fa fa-user-circle-o" style="font-size: 33px; "></i></td>
                                    <td>Zamran</td>
                                    <td class="points">10</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><i class="fa fa-user-circle-o" style="font-size: 33px; "></i></td>
                                    <td>Ammar</td>
                                    <td class="points">15</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><i class="fa fa-user-circle-o" style="font-size: 33px; "></i></td>
                                    <td>Asim</td>
                                    <td class="points">30</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><i class="fa fa-user-circle-o" style="font-size: 33px; "></i></td>
                                    <td>Osama</td>
                                    <td class="points">20</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><i class="fa fa-user-circle-o" style="font-size: 33px; "></i></td>
                                    <td>Sheikh</td>
                                    <td class="points">15</td>
                                </tr>


                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row mt-4 mr-4">
                    <div class="col-md-12 mt-4 ml-4 p-2 shadow-sm bg-white rounded ">
                        <strong>
                            <h5 class="ml-4">Today's Completed Calls</h5>
                        </strong> <br>
                        <span>
                            <i class="fa fa-check ml-4 text-success">&nbsp; &nbsp;<strong>90</strong></i>
                        </span>
                    </div>
                </div>

                <div class="row mt-4 mr-4">
                    <div class="col-md-12 mt-4 ml-4 p-2 shadow-sm  bg-white rounded">
                        <strong>
                            <h5 class="ml-4">Today's Scheduled Calls</h5>
                        </strong> <br>
                        <span>
                            <i class="fa fa-phone ml-4">&nbsp; &nbsp;<strong>25</strong></i>
                        </span>
                    </div>
                </div>

                <div class="row mt-4 mr-4">
                    <div class="col-md-12 mt-4 ml-4 p-2 shadow-sm bg-white rounded">
                        <strong>
                            <h5 class="ml-4">Customers Feedback</h5>
                        </strong> <br>
                        <span>
                            <i class="fa fa-envelope ml-4">&nbsp; &nbsp;<strong>10</strong></i>

                        </span>
                    </div>
                </div>

                <div class="row mt-4 mr-4">
                    <div class="col-md-12 mt-4 ml-4 p-2 shadow-sm  bg-white rounded">
                        <strong>
                            <h5 class="ml-4">Calls on Queue</h5>
                        </strong> <br>
                        <span>
                            <i class="fa fa-mobile ml-4 ">&nbsp; &nbsp; &nbsp;<strong>5</strong></i>
                        </span>
                    </div>
                </div>

            </div>

            <!-- col-md-9 STARTS -->
            <div class="col-md-9" style="background-color: #f4f5ff;">

                <div class="row mt-2 mb-2 ml-4 ">
                    <h4><strong>DASHBOARD</strong></h4>
                </div>

                <div class="row ml-2">
                    <div class="col-md-12">
                        <h4>Channels</h4>
                    </div>
                </div>


                <div class="row mt-4 ml-4 socialmediaicons">
                    <div class="col-md-2 channels">
                        <a href="social-media-facebook">
                            <span class="badge badge-notification bg-danger">10</span>
                            <img src="{{asset('images/facebook.png')}}" alt="" srcset="">
                            &nbsp;<strong>Facebook</strong></a>
                    </div>
                    <div class="col-md-2 channels">
                        <a href="social-media-instagram">
                            <span class="badge badge-notification bg-danger">2</span>
                            <img src="{{asset('images/instagram.png')}}" alt="" srcset="">
                            &nbsp;<strong>Instagram</strong>
                    </div>
                    <div class="col-md-2 channels">
                        <a href="social-media-whatsapp">
                            <span class="badge badge-notification bg-danger">5</span>
                            <img src="{{asset('images/whatsapp.png')}}" alt="" srcset="">
                            &nbsp;<strong>WhatsApp</strong>
                    </div>
                    <div class="col-md-2 channels">
                        <a href="call-center-call">
                            <span class="badge badge-notification bg-danger">10</span>
                            <img src="{{asset('images/call.png')}}" alt="" srcset="">
                            &nbsp; &nbsp;<strong>Calls</strong>
                    </div>
                    <div class="col-md-2 channels">
                        <a href="marketing-campaign-email">
                            <span class="badge badge-notification bg-danger">5</span>
                            <img src="{{asset('images/email.png')}}" alt="" srcset=""> <br>
                            <strong>E-mail</strong>
                    </div>
                    <div class="col-md-2 channels">
                        <a href="web-forms-management">
                            <span class="badge badge-notification bg-danger">4</span>
                            <img src="{{asset('images/webform.png')}}" alt="" srcset="">
                            &nbsp; &nbsp;<strong>Webform</strong>
                    </div>
                </div>




                <div class="row ml-1">

                    <div class="col-md-3 mt-2 ml-4 p-2 ">
                        <div class="card bg-white rounded">
                            <div class="card-body shadow-sm p-3 bg-white rounded">
                                <center>
                                    <h6> Number of Inquries </h6>
                                    <canvas id="inquriesBarChart"></canvas>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mt-2 ml-4 p-2 ">
                        <div class="card bg-white rounded">
                            <div class="card-body shadow-sm p-3 bg-white rounded">
                                <center>
                                    <h6> Number of Complaints </h6>
                                    <canvas id="inquriesBarChart2"></canvas>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mt-2 p-2 linechatdiv">
                        <div class="card bg-white rounded">
                            <div class="card-body shadow-sm p-3 bg-white rounded">
                                <center>
                                    <h6> Transferred Calls</h6>
                                    <canvas id="lineChart"></canvas>
                                </center>
                            </div>
                        </div>
                    </div>




                </div>

                <div class="row ml-2">
                    <div class="col-md-12">

                        <div class="container mt-3">

                            <div id="accordion">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        <a class="btn text-white" data-bs-toggle="collapse" href="#collapseOne">
                                            <h4>Today's Follow-Up</h4>
                                        </a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                                        <div class="card-body">
                                            <table class="example table table-striped table-bordered">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Mobile</th>
                                                        <th>Next Follow-Up</th>
                                                        <th>Agent Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>Ammar</td>
                                                        <td>Ammar@gmail.com</td>
                                                        <td>03021260860</td>
                                                        <td>03:00PM</td>
                                                        <td>Hasan Imam</td>
                                                        <td>
                                                            <a href="javascript:;" data-placement="top" title="View more details" class="badge bg-primary text-white float-left">
                                                                <i class="fa fa-info-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Zamran</td>
                                                        <td>Zamran@gmail.com</td>
                                                        <td>03021260861</td>
                                                        <td>03:30PM</td>
                                                        <td>Hasan Imam</td>
                                                        <td>
                                                            <a href="javascript:;" data-placement="top" title="View more details" class="badge bg-primary text-white float-left">
                                                                <i class="fa fa-info-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Asad</td>
                                                        <td>Asad@gmail.com</td>
                                                        <td>03021260862</td>
                                                        <td>04:00PM</td>
                                                        <td>Hasan Imam</td>
                                                        <td>
                                                            <a href="javascript:;" data-placement="top" title="View more details" class="badge bg-primary text-white float-left">
                                                                <i class="fa fa-info-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Rehman</td>
                                                        <td>Rehman@gmail.com</td>
                                                        <td>03021260863</td>
                                                        <td>04:30PM</td>
                                                        <td>Hasan Imam</td>
                                                        <td>
                                                            <a href="javascript:;" data-placement="top" title="View more details" class="badge bg-primary text-white float-left">
                                                                <i class="fa fa-info-circle"></i></a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Ahmed</td>
                                                        <td>Ahmed@gmail.com</td>
                                                        <td>03021260864</td>
                                                        <td>05:00PM</td>
                                                        <td>Hasan Imam</td>
                                                        <td>
                                                            <a href="javascript:;" data-placement="top" title="View more details" class="badge bg-primary text-white float-left">
                                                                <i class="fa fa-info-circle"></i></a>
                                                        </td>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                    </div>

                </div>




                <div class="row mb-4" style="margin-left: 4%;">
                    <div class="col-md-5 mr-1 shadow-sm bg-white rounded">
                        <!-- Inbound Calls -->

                        <h6 class=" mt-2"><strong>Inbound Calls</strong></h6>
                        <div class=" mt-2 ">
                            <strong>
                                <span style="float:left"> Todays</span>
                                <span style="float:right;"></span></strong> <br>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                </div>
                            </div>
                            <strong>
                                <span style="float:left"> 78 </span>
                                <span style="float:right;color:green;"></span></strong> <br>
                        </div>

                        <div class=" mt-4 ">
                            <strong>
                                <span style="float:left"> Weekly</span>
                                <span style="float:right;"></span></strong> <br>
                            <div class="progress mt-2">
                                <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                </div>
                            </div>
                            <strong>
                                <span style="float:left"> 78 </span>
                                <span style="float:right;color:red;"></span>
                            </strong>
                        </div>

                    </div>
                    <!-- Outbound Close Rate -->

                    <div class="col-md-5 shadow-sm bg-white rounded" style="margin-left: 13%;">
                        <h6 class="ml-4 mt-2"><strong>Outbound Calls</strong></h6>
                        <div class=" mt-2 ml-4 ">
                            <strong>
                                <span style="float:left"> Daily</span>
                                <span style="float:right;"></span></strong> <br>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                </div>
                            </div>
                            <strong>
                                <span style="float:left">78</span>
                                <span style="float:right;color:green;"></span></strong> <br>
                        </div>
                        <div class=" mt-4 ml-4  ">
                            <strong>
                                <span style="float:left"> Weekly</span>
                                <span style="float:right;"></span></strong> <br>
                            <div class="progress mt-2">
                                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                </div>
                            </div>
                            <strong>
                                <span style="float:left"> 78</span>
                                <span style="float:right;color:red;"></span>
                            </strong>
                        </div>
                    </div>

                </div>





            </div>

            <!-- col-md-9 ENDS -->

        </div>


    </div>

    <script src="assets/js/init-scripts/flot-chart/curvedLines.js"></script>
    <script src="assets/js/init-scripts/flot-chart/flot-tooltip/jquery.flot.tooltip.min.js"></script>
    <script src="assets/js/init-scripts/flot-chart/flot-chart-init.js"></script>
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <!--  Chart js -->
    <script src="{{asset('vendors/chart.js/dist/Chart.bundle.min.js')}}"></script>

    <script>
        (function($) {
            "use strict";



            // inquriesslBarChart
            var ctx = document.getElementById("inquriesBarChart");
            ctx.height = 200;
            ctx.width = 250;
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    datasets: [{
                            label: "Total No. of Inquries",
                            data: [25, 50, 75, 90, 70, 25, 50],
                            datawidth: "2",
                            borderColor: "black",
                            borderWidth: "1",
                            backgroundColor: "#17467e"
                        },
                        {
                            label: "Resolved Inquries",
                            data: [15, 30, 45, 50, 50, 15, 40],
                            datawidth: "2",
                            borderColor: "#00BC26",
                            borderWidth: "1",
                            backgroundColor: "#00BC26"
                        }
                    ]
                }
            });
        })(jQuery);
    </script>
    <script>
        (function($) {
            "use strict";

            //linechat

            var ctxL = document.getElementById("lineChart");
            ctxL.height = 170;
            ctxL.width = 300;
            var myLineChart = new Chart(ctxL, {
                type: 'line',
                data: {
                    labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                    datasets: [{
                        label: "Transferred Calls",
                        data: [55, 50, 45, 40, 30, 25, 27],
                        backgroundColor: "#25D366",
                        borderColor: "#00BC26",
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true
                }
            });


        })(jQuery);
    </script>
    <script>
        var ctx = document.getElementById("inquriesBarChart2");
        ctx.height = 200;
        ctx.width = 250;
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
                datasets: [{
                        label: "Total No. of Complaints",
                        data: [25, 50, 75, 90, 70, 25, 50],
                        datawidth: "2",
                        borderColor: "#f58935",
                        borderWidth: "1",
                        backgroundColor: "#f58935"
                    },
                    {
                        label: "Resolved Complaints",
                        data: [15, 30, 45, 50, 50, 15, 40],
                        datawidth: "2",
                        borderColor: "#00BC26",
                        borderWidth: "1",
                        backgroundColor: "#00BC26"
                    }
                ]
            }
        });
        (jQuery);
    </script>
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


    @endsection