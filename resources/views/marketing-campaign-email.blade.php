@extends('template')

@section('content')

<head>
    <style>
        #emailbtn {
            box-sizing: border-box;
        }

        #emailbtn:hover {
            background-color: #17467e !important;
            border: 1px solid #17467e !important;
        }

        #smsbtn:hover {
            background-color: #17467e !important;
            border: 1px solid #17467e !important;
        }

        #subject {
            border: none;
            border-bottom: 1px solid lightgray;
        }

        #thead {
            background-color: #17467e;
        }

        .wrapper {
            width: 100%;
            height: fit-content;
            background: #fff;
            margin: 15px auto 0;
        }

        .wrapper .title {
            padding: 10px;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            border-bottom: 1px solid #ebedec;
        }

        .wrapper .tabs_wrap {
            padding: 20px;
            border-bottom: 1px solid #ebedec;
        }

        .wrapper .tabs_wrap ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            list-style-type: none;
        }

        .wrapper .tabs_wrap ul li {
            width: 135px;
            text-align: center;
            background: #e9ecf1;
            border-right: 1px solid #c1c4c9;
            padding: 13px 15px;
            cursor: pointer;
            -webkit-transition: all 0.2s ease;
            -o-transition: all 0.2s ease;
            transition: all 0.2s ease;
        }

        .wrapper .tabs_wrap ul li:first-child {
            border-top-left-radius: 25px;
            border-bottom-left-radius: 25px;
        }

        .wrapper .tabs_wrap ul li:last-child {
            border-right: 0px;
            border-top-right-radius: 25px;
            border-bottom-right-radius: 25px;
        }

        .wrapper .tabs_wrap ul li:hover,
        .wrapper .tabs_wrap ul li.active {
            background: #17467e;
            color: #fff;
        }

        .wrapper .container .item_wrap {
            padding: 5px 20px;
            border: 1px solid #ebedec;
            cursor: pointer;
            list-style-type: none;
        }

        .wrapper .container .item_wrap:hover {
            background: #e9ecf1;
        }

        .wrapper .container .item {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .item_wrap .item .item_left {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
        }

        .item_wrap .item_left img {
            width: 40px;
            height: 40px;
            display: block;
        }

        .item_wrap .item_left .data {
            margin-left: 20px;
        }

        .item_wrap .item_left .data .name {
            font-weight: 600;
        }

        .item_wrap .item_left .data .distance {
            color: #7f8b9b;
            font-size: 14px;
            margin-top: 3px;
        }

        .item_wrap .item_right .status {
            position: relative;
            color: #77818d;
        }

        .tab {
            /* overflow: hidden; */
            /* border: 1px solid #ccc; */
            /* background-color: #f1f1f1; */
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border-top: none;
        }

        .all_mail_main_div {
            width: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .all_mail_main_div li {
            width: 100%;
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
                                    <strong class="card-title">Email </strong>
                                    <!-- <p class="ml-3" style="display:inline-block">Send promotional messages</p> -->
                                    <button type="button" class="btn btn-primary" style="float: right;" id="emailbtn">
                                        <a href="marketing-campaign-email" class="text-white">E-mails</a>
                                    </button>
                                    <button type="button" class="btn btn-dark mr-2" style="float: right;" id="smsbtn">
                                        <a href="marketing-campaign-sms" class="text-white">Via SMS</a>
                                    </button>
                                </div>
                            </div>
                            <!-- card-header ENDS -->
                            <!-- card-body embed-responsive STARTS -->
                            <div class="card-body embed-responsive shadow bg-white rounded" style="overflow: auto">

                                <!-- FORM STARTS -->
                                <!-- <div class="row">
                                    <div class="col-sm-4 ml-4">
                                        <h4>Create New Email Campaign</h4>
                                    </div>
                                    <div class="col-sm-8"></div>
                                </div>

                                <form action="" method="POST">

                                    <div class="row ">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 mt-2 ml-4">
                                            <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject" required>
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 mt-2 mb-2 ml-4">
                                            <textarea class="form-control shadow bg-white rounded" rows="10" required="" id="sms" name="sms" placeholder="Type..." required></textarea>
                                        </div>

                                        <div class="col-sm-3 ml-4 mb-2 " style="float: right;">
                                            <input type="file" class="form-control" id="attachment" name="attachment" style="float: right;">
                                        </div>
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-3 mt-2 mb-2 ">
                                            <Button class="btn btn-primary shadow" style="float: right;">Send to all users</Button>
                                        </div>
                                    </div>
                                </form> -->
                                <!-- FORM ENDS -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="wrapper">
                                            <div class="tabs_wrap">
                                                <ul class="tab">
                                                    <li class="tablinks" onclick="openCity(event, 'Inbox')">Inbox</li>
                                                    <li class="tablinks" onclick="openCity(event, 'Sent')">Sent</li>
                                                    <li class="tablinks" onclick="openCity(event, 'Compose')">Compose</li>
                                                    <!-- <li class="tablinks" onclick="openCity(event, 'Dummy text2')">Dummy text 2</li> -->
                                                </ul>
                                            </div>
                                            <div id="Inbox" class="container tabcontent">
                                                <ul class="all_mail_main_div">
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/Ctwf8HA.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Alex, 21</p>
                                                                    <p class="distance">0.95Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">05-14-2023 03:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="Sent" class="container tabcontent">
                                                <ul class="all_mail_main_div">
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="item_wrap ">
                                                        <div class="item">
                                                            <div class="item_left">
                                                                <div class="img">
                                                                    <img src="https://i.imgur.com/2Necikc.png" alt="">
                                                                </div>
                                                                <div class="data">
                                                                    <p class="name">Brad Mondo, 32</p>
                                                                    <p class="distance">3.97Km</p>
                                                                </div>
                                                            </div>
                                                            <div class="item_right">
                                                                <div class="status">02-18-2023 08:04 PM</div>
                                                            </div>
                                                        </div>  
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="Compose" class="container tabcontent">
                                                <div class="row">
                                                    <div class="col-sm-4 ml-4">
                                                        <h4>Create New Email Campaign</h4>
                                                    </div>
                                                    <div class="col-sm-8"></div>
                                                </div>

                                                <form action="" method="POST">

                                                    <div class="row ">
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-9 mt-2 ml-4">
                                                            <input type="text" class="form-control" placeholder="Subject" id="subject" name="subject" required>
                                                        </div>
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-9 mt-2 mb-2 ml-4">
                                                            <textarea class="form-control shadow bg-white rounded" rows="10" required="" id="sms" name="sms" placeholder="Type..." required></textarea>
                                                        </div>

                                                        <div class="col-sm-3 ml-4 mb-2 " style="float: right;">
                                                            <input type="file" class="form-control" id="attachment" name="attachment" style="float: right;">
                                                        </div>
                                                        <div class="col-sm-3"></div>
                                                        <div class="col-sm-3 mt-2 mb-2 ">
                                                            <Button class="btn btn-primary shadow" style="float: right;">Send to all users</Button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- <div id="Dummy text2" class="container tabcontent">
                                                <h1> Dummy text Div 2</h1>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <script>
                                    function openCity(evt, email_system) {
                                        var i, tabcontent, tablinks;

                                        tabcontent = document.getElementsByClassName("tabcontent");
                                        for (i = 0; i < tabcontent.length; i++) {
                                            tabcontent[i].style.display = "none";
                                        }

                                        tablinks = document.getElementsByClassName("tablinks");
                                        for (i = 0; i < tablinks.length; i++) {
                                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                                        }

                                        document.getElementById(email_system).style.display = "block";
                                        evt.currentTarget.className += " active";
                                    }

                                    // Open the first tab initially
                                    var firstTab = document.getElementsByClassName("tablinks")[0];
                                    firstTab.click();
                                </script>

                                <!-- <span class="ml-2 mt-2 mb-2"><strong class="card-title">Marketing Campaigns List</strong></span> -->

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
                                                    <td>Email-0001</td>
                                                    <td>2022-12-05 17:59:53</td>
                                                    <td>100</td>
                                                    <td style='text-align: center;'>
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#campaignDetailsModal" style="width: auto;">
                                                            View
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Email-0002</td>
                                                    <td>2022-12-05 18:03:53</td>
                                                    <td>200</td>
                                                    <td style='text-align: center;'>
                                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#campaignDetailsModal" style="width: auto;">
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
                <h5 class="modal-title" id="largeModalLabel">E-Mail Campaign Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="campaignID" class="form-label"><b>Campaign ID</b></label>
                            <input type="text" class="form-control" id="campaignID" name="campaignID" value="Email-0001" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="subject" class="form-label"><b>Subject</b></label>
                            <input type="text" class="form-control" id="subject" name="subject" value="Email-Marketing-Campaign" readonly>
                        </div>

                        <div class="col-md-2">
                            <label for="sentTo" class="form-label"><b>Sent To</b></label>
                            <input type="text" class="form-control" id="sentTo" name="sentTo" value="100" readonly>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-4">
                            <label for="dateTime" class="form-label"><b>Campaign Date & Time</b></label>
                            <input type="text" class="form-control" id="dateTime" name="dateTime" value="2022-12-05 17:59:53" readonly>
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