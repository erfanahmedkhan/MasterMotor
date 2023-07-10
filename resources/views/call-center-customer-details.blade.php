@extends('template')

@section('content')

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#tabs").tabs();
        });
    </script>

    <style>
        .btn-primary:hover {
            box-sizing: border-box !important;
            background-color: black !important;
            color: white !important;
            border: 1px solid black !important;
        }

        .card-body {
            /* background-color: black !important; */
            padding: 0 !important;

        }

        #details {
            width: 10vw !important;
            border-radius: 25px !important;

        }

        #whatsapp {
            text-align: center !important;

        }


        .danger {
            color: red !important;
        }

        .archievedanger {
            box-sizing: border-box !important;

            padding: 5% !important;
            color: red !important;
        }

        .danger span {
            color: red !important;
        }

        .call {
            background-color: lightgrey !important;
            border-radius: 100% !important;
            padding: 4% !important;
        }

        .call-details {
            color: grey !important;
        }

        /* span {
            font-weight: bold !important;
        } */

        #callLogTH {
            box-sizing: border-box !important;
            margin-left: 25px !important;

            background-color: #dee2e6 !important;
            color: black !important;

        }

        #callLogTH :a {
            box-sizing: border-box !important;
            margin-left: 25px !important;

            background-color: white !important;
            color: black !important;

        }


        #thCallLog {
            padding-left: 4% !important;
        }

        #archievehistory {
            color: grey !important;
        }

        #callhistory {
            width: 8vw !important;
            margin-top: 2px !important;
            border-radius: 25px !important;
            padding: 4px !important;
        }

        #callmd8 {
            border-radius: 25px !important;
            padding: 4px !important;
        }

        .fa-user-plus {
            font-size: 4vh !important;

            text-align: center !important;
            padding-bottom: 10px !important;
        }

        .fa-plus {
            font-size: 3vh !important;
            text-align: center !important;
            padding-bottom: 10px !important;
        }

        #fa-plus {
            width: 8vw !important;
            margin-top: 2px !important;
            border-radius: 25px !important;
            padding: 4px !important;
        }

        .status {
            color: #28a745 !important;
        }

        .viewbutton {
            width: 8vw !important;
            border-radius: 25px !important;
            padding: 4px !important;
            background-color: #17467e !important;
            color: white !important;
        }

        .ui-widget-header {
            border: 1px solid transparent;
            background: transparent;
            font-weight: bold;
        }

        #statusremarks {
            visibility: visible;
            display: none;
        }

        #otherreason {
            visibility: visible;
            display: none;
        }

        #savecomplain:hover {
            box-sizing: border-box !important;
            background-color: #17467e !important;
            border: 1px solid #17467e !important;
        }

        #saveinquiry:hover {
            box-sizing: border-box !important;
            background-color: #17467e !important;
            border: 1px solid #17467e !important;
        }



        #allilcf li {
            font-weight: bold !important;
        }
    </style>


</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 mt-2">
                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                <strong class="card-title">Customer Details</strong>
            </div>
        </div>
        <div class="row mt-2" style="padding-left: 10px; padding-right: 10px;">
            <div class="col-md-4" style="border-right: 2px solid #eee !important; background-color:#eee !important; color:black !important;">
                <div class="row mt-4">
                    <div class="col-md-12">
                        <center>
                            <i class="fa fa-phone text-dark" style="font-size:5vh;"></i>
                        </center>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">

                                <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40" style="background-color: white !important;">
                                <span>Admin</span>

                                <!-- <a href="login">
                                <span class="btn" style="float:right;"><i class="fa fa-cog text-dark" style="font-size:3vh; float:right;"></i></span>
                                </a> -->
                            </div>

                            <div class="col-md-12 mt-3"></div>
                            <div class="col-md-12 mb-1">
                                <span>Call Logs</span>
                                <!-- <span class="btn" style="float:right;">
                                    <i class="material-icons  text-dark" style="font-size:5vh;">dialpad</i>
                                </span> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="md-12" id="bootstrap-data-table-export_filter" class="dataTables_filter">
                                <input type="search" class="form-control" placeholder="Search" aria-controls="bootstrap-data-table-export" style="width: 150%;">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12 mb-2">
                                <span class="danger">
                                    <i class="fa fa-phone call archievedanger"></i> Customer Three</span> &nbsp;
                                <span class="mt-2 mr-2" id="archievehistory" style="float: right;">10:10am</span>
                            </div>
                            <div class="col-md-12 mb-2">
                                <span>
                                    <i class="fa fa-phone call"></i> Customer One</span> &nbsp;
                                <span class="mt-2 mr-2" id="archievehistory" style="float: right;">10:00am</span>
                            </div>
                            <div class="col-md-12 mb-2">
                                <span>
                                    <i class="fa fa-phone call"></i>Customer Two</span> &nbsp;
                                <span class="mt-2 mr-2" id="archievehistory" style="float: right;">09:50am</span>
                            </div>

                            <div class="col-md-12 mb-2">
                                <span class="danger">
                                    <i class="fa fa-phone call archievedanger"></i> Customer One</span> &nbsp;
                                <span class="mt-2 mr-2" id="archievehistory" style="float: right;">09:30am</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


             <div class="container col-md-8" style="background-color:#dee2e6 ; height:fit-content !important;" id="callmd8">
                 
                  <div class="row">
                      
                        <div class="col-md-12 mt-2">
                            <a href="https://sodabaz.com/MasterMotor/public/create-customer-inquiry/add" class="btn btn-round btn-primary">
                                Create Inquiry / Complain <i class="fa fa-plus-circle"></i>
                            </a>
                      
                            <a href="#" style="float:right;" class="btn btn-round btn-success" data-toggle="tooltip" data-placement="top" title="Mute Call"><i class="fa fa-volume-off"></i></a>
                    
                            <a href="#" style="float:right;" class="btn btn-round btn-danger mr-1" data-toggle="tooltip" data-placement="top" title="End Call"><i class="fa fa-phone"></i></a>
                      
                      
                    </div>

                <div class="col-md-12 mb-2">
                   
                    <col-md-6>
                        <center>
                            <h5>
                                Customer Details
                            </h5>
                        </center>
                    </col-md-6>

                </div>
                </center>

                <div class="row" id="tabs" style="background-color: #eee !important; border:1px solid #eee;">
                    <div class="col-md-12">
                        <ul id="allilcf">
                            <li style="width: 19%; border:none ;"><a href="#tabs-1">All</a></li>
                            <li style="width: 19%; border:none ;"> <a href="#tabs-2">Inquiry</a></li>
                            <li style="width: 19%; border:none ;"> <a href="#tabs-3">Leads</a></li>
                            <li style="width: 19%; border:none ;"> <a href="#tabs-4">Complaints</a></li>
                            <li style="width: 19%; border:none ;"> <a href="#tabs-5">Feedbacks</a></li>
                        </ul>
                    </div>
                    <div class="col-md-12" id="tabs-1">

                        <table class="table table-bordered" style="margin-left: 5px !important;margin-right: 5px !important;">

                            <thead>
                                <tr>
                                    <th>Inquiry dealership</th>
                                    <th>Inquiry date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                             <tbody id="callLogTB">
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                
                               <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>

                             </tbody>


                        </table>
                    </div>

                    <!-- tab 2 inquiry-->

                    <div class="col-md-12" id="tabs-2">
                        <table class="table table-bordered" style="margin-left: 5px !important;margin-right: 5px !important;">

                            <thead>
                                <tr>
                                    <th>Inquiry dealership</th>
                                    <th>Inquiry date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                             <tbody id="callLogTB">
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                
                               <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>

                             </tbody>


                        </table>
                      </div>


                    <!-- tab 3 - lead -->

                    <div class="col-md-12" id="tabs-3">
                     <table class="table table-bordered" style="margin-left: 5px !important;margin-right: 5px !important;">

                            <thead>
                                <tr>
                                    <th>Lead</th>
                                    <th>date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                             <tbody id="callLogTB">
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                
                               <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>

                             </tbody>


                        </table>
                    </div>


                    <!-- tab 4- complain -->


                    <div class="col-md-12" id="tabs-4">
                      <table class="table table-bordered" style="margin-left: 5px !important;margin-right: 5px !important;">

                            <thead>
                                <tr>
                                    <th>Complain dealership</th>
                                    <th>Complain date</th>
                                    <th>Status</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                             <tbody id="callLogTB">
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                                
                               <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Gull Motors</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span class="status">&nbsp;Resolved</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;New Alsvin</span>
                                    </td>
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>

                             </tbody>


                        </table>
                      
                    </div>

                    <div class="col-md-12" id="tabs-5">
                      <table class="table table-bordered" style="margin-left: 5px !important;margin-right: 5px !important;">

                            <thead>
                                 <tr>                                            
                                    <th>Feedback</th>
                                    <th>date</th>
                                </tr>
                            </thead>

                             <tbody id="callLogTB">
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Any feedback</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                 
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                       
                             </tbody>


                        </table>
                      
                    </div>

                </div>


                <!-- table ends -->

            </div>
        </div>
    </div>

    <!-- modal - call pop-up -->

    <!-- Add Modal -->

    <div class="modal fade bd-example-modal-md" id="callpopup" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Incoming call</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <div class="row">




                        <div class="col-md-4">
                            <span>
                                <h4>Caller</h4>
                            </span>
                        </div>
                        <div class="col-md-4">
                            <span>
                                <h3>+923001234567</h3>
                            </span>
                        </div>
                        <div class="col-md-4">
                        </div>


                        <div class="col-md-4">
                            <button class="btn btn-danger" data-dismiss="modal" aria-label="Close">Decline</button>
                        </div>
                        <div class="col-md-2">
                        </div>

                        <div class="col-md-4">
                            <a href="http://127.0.0.1:8000/call-center-customer-details">
                                <button class="btn btn-success">Receive</button>
                            </a>
                        </div>




                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- modal - call pop-up -->

    <!-- ADD NEW STARTS STARTS -->

</body>
@endsection
