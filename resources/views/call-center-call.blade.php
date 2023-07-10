@include('template')

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
  

    <style>
    .modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 1.3rem;
    outline: 0;
    opacity: 83%;
}
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
        
        .modal-content {
            margin-top: 41%%;
        }

        #details {
            width: 10vw;
            border-radius: 25px;

        }

        #whatsapp {
            text-align: center !important;

        }

        .danger {
            color: red !important;
        }

        .archievedanger {
            box-sizing: border-box !important;

            padding: 5%;
            color: red !important;
        }

        .danger span {
            color: red !important;
        }

        .call {
            background-color: lightgrey;
            border-radius: 100%;
            padding: 4%;
        }

        .call-details {
            color: grey;
        }

        span {
            font-weight: bold !important;


        }

        #callLogTH {
            text-align: justify !important;
            color: grey;
        }

        #thCallLog {
            padding-left: 5%;

        }

        #archievehistory {
            color: grey !important;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12 mt-2">
                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                <strong class="card-title">Call Center</strong>
                <!--<a href="{{ url('#') }}" class="btn btn-primary text-white" style="float:right; width: 10vw;">Call</a>-->

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
                                <a href="">
                                    <img src="https://www.iconpacks.net/icons/2/free-user-icon-3296-thumb.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40" style="background-color: white !important;">
                                    <span>Admin</span>
                                </a>
                                <!-- <a href="login">
                                <span class="btn" style="float:right;"><i class="fa fa-cog text-dark" style="font-size:3vh; float:right;"></i></span>
                                </a> -->
                            </div>

                            <div class="col-md-12 mt-3"></div>
                            <div class="col-md-12">
                                <span>Archive</span>
                                 <span class="btn" style="float:right;">
                                    <i class="material-icons  text-dark" style="font-size:100%;">dialpad</i>
                                </span>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="md-12" id="bootstrap-data-table-export_filter" class="dataTables_filter" style="width:16vw;">
                                <input type="search" class="form-control" placeholder="Search" aria-controls="bootstrap-data-table-export" style="width: 200%;">
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



            <div class="container col-md-8" style="background-color:#eee;padding:10px">
                <div class="row">
                    <div class="col-md-4"> <span>Customer Name</span></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <!--<button class="btn btn-dark">View Details</button>-->
                    </div>
                    <!--<div class="col-md-2">-->
                    <!--    <span id="whatsapp">-->
                    <!--        <center>-->
                    <!--            <a href="#">-->
                    <!--                <i class="fa fa-whatsapp btn" style="font-size:5vh;color:green;  "></i>-->
                    <!--        </center>-->
                    <!--        </a>-->
                    <!--    </span>-->
                    <!--</div>-->
                </div>

                <div class="row" style="background-color: white !important;">
                    <table class="table table-borderless">
                        <div class="col-md-12">
                            <thead id="callLogTH">
                                <tr>
                                    <th id="thCallLog">Call Log</th>
                                    <th>Time</th>
                                    <th>Date</th>
                                    <th>Duration</th>
                                </tr>
                            </thead>
                        </div>
                        <div class="col-md-12">
                            <tbody id="callLogTB">
                                <tr>
                                    <td class="col-md-3 danger">
                                        <span><i class="fa fa-phone call"></i><span>&nbsp;
                                                Missed Call</span>
                                    </td>
                                    <td class="call-details col-md-3">09:30am</td>
                                    <td class="call-details col-md-3">01/01/2022
                                    </td>
                                    <td class="call-details col-md-3">0 min</td>
                                </tr>
                                <tr>
                                    <td class="col-md-3">
                                        <span><i class="fa fa-phone call"></i><span>&nbsp;
                                                Inbound Call</span>
                                    </td>
                                    <td class="call-details col-md-3">10:45am</td>
                                    <td class="call-details col-md-3">01/01/2022
                                    </td>
                                    <td class="call-details col-md-3">10 min 30 sec
                                    </td>
                                </tr>
                            </tbody>
                            <tr>
                                <td class="col-md-3 danger">
                                    <span><i class="fa fa-phone call"></i><span>&nbsp;
                                            Missed Call</span>
                                </td>
                                <td class="call-details col-md-3">10:45am</td>
                                <td class="call-details col-md-3">01/01/2022
                                </td>
                                <td class="call-details col-md-3">10 min 30 sec
                                </td>
                            </tr>
                            </tbody>
                            <tr>
                                <td class="col-md-3 danger">
                                    <span><i class="fa fa-phone call"></i><span>&nbsp;
                                            Missed Call</span>
                                </td>
                                <td class="call-details col-md-3">10:45am</td>
                                <td class="call-details col-md-3">01/01/2022
                                </td>
                                <td class="call-details col-md-3">10 min 30 sec
                                </td>
                            </tr>
                            </tbody>
                            <tr>
                                <td class="col-md-3">
                                    <span><i class="fa fa-phone call"></i><span>&nbsp;
                                            Inbound Call</span>
                                </td>
                                <td class="call-details col-md-3">10:45am</td>
                                <td class="call-details col-md-3">01/01/2022
                                </td>
                                <td class="call-details col-md-3">10 min 30 sec
                                </td>
                            </tr>
                            </tbody>
                        </div>
                    </table>


                    <!-- table ends -->
                </div>

            </div>
        </div>
    </div>
    
    <!-- modal - call pop-up start -->
       <div class="modal fade show" id="callpopup" aria-modal="true" style="display: block;">

        <div class="modal-dialog modal-md">
            <div class="modal-content bg bg-dark text-white">
               
                    <center><h5>Incoming Call</h5></center>
               
                <div class="modal-body">
                <div class="row">

                    <div class="col-md-3">
                        <i class="fa fa-user-circle" style="
                            margin-left: 40%;
                            margin-top: 19%;
                            font-size: 74px;
                        "></i>
                    </div>

                    <div class="col-md-9">
                        <h4 style="margin-left: 13%;margin-top: 4%;"><b>Josh Brolin</b></h4><br>
                        <h5 style="margin-left: 14%;">923031234567</h5>
                    </div>
                    
                </div>

                    <div class="col-md-12">
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close" style="
                margin-left: 33%;
                margin-top: 5.6%;
                border-radius: 15px;
            ">Decline</button>
                    <a href="{{ url('call-center-customer-details') }}" style="margin-right: 19%;margin-top: 5%;border-radius: 15px;" class="btn btn-success">Recive</a>
                    </div>
                </div>
            </div>
        </div>
    </div>                      
    <!-- modal - call pop-up end -->
   
   <script>
       $(document).ready(function(){
           $('#callpopup').modal('show');
       });
   </script>
</body>


    
