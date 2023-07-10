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
        .headind_srch {
            padding: 10px 29px 10px 20px;
            overflow: hidden;
            border-bottom: 1px solid #c4c4c4;
        }

        .recent_heading {
            float: left;
            width: 40%;
        }

        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
        }

        .srch_bar input {
            border: 1px solid #cdcdcd;
            border-width: 0 0 1px 0;
            width: 80%;
            padding: 2px 0 4px 6px;
            background: none;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }


        .messagetyping {
            border: none !important;
            overflow-y: hidden !important;
        }

        .profiletext {
            color: black;
            font-weight: bold;
        }

        .profilenumber {
            color: black;
            font-weight: bold;
            font-size: 13px !important;

        }

        .btn-primary:hover {
            box-sizing: border-box !important;
            background-color: #f58935 !important;
            color: white !important;
            border: 1px solid #f58935 !important;
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
            padding: 2% !important;
            font-size: 5vh;
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

        /* #viewdetails {
            background-color: #28a745 !important;
            width: 8vw !important;
            margin-top: 2px !important;
            border-radius: 25px !important;
            padding: 4px !important;
            border-color: #28a745;
        }
 

        #viewdetails:hover {
            background-color: #28a745 !important;
            width: 8vw !important;
            margin-top: 2px !important;
            border-radius: 25px !important;
            padding: 4px !important;
            border-color: #28a745 !important;
            font-weight: bold;
        } */

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

        #instagram {
            float: right !important;
            box-sizing: border-box !important;
            width: 10vw !important;
            background-color: #e95950 !important;
            color: white !important;
            font-weight: bold !important;
            background-color: 2px solid #e95950;
        }

        #whatsapp {
            float: right !important;
            box-sizing: border-box !important;
            width: 10vw !important;
            background-color: white !important;
            color: #28a745 !important;
            font-weight: bold !important;
            border: 2px solid #28a745 !important;
        }

        #whatsapp:hover {
            box-sizing: border-box !important;
            width: 10vw !important;
            background-color: #28a745 !important;
            color: white !important;
            font-weight: bold !important;
        }

        #facebook {
            float: right !important;
            box-sizing: border-box !important;
            width: 10vw !important;
            background-color: white !important;
            color: #4267B2 !important;
            font-weight: bold !important;
            border: 2px solid #4267B2 !important;
        }

        #facebook:hover {
            box-sizing: border-box !important;
            width: 10vw !important;
            background-color: #17467e !important;
            color: #fff !important;
            font-weight: bold !important;
        }



        .ui-state-active {
            background-color: #17467e !important;
        }

        a:active {
            background-color: yellow;
        }

        .badge-danger {
            border-radius: 100% !important;
            height: 2vh !important;
            display: none;
        }

        .badge-success {
            border-radius: 100% !important;
            height: 2vh !important;
            display: none;
        }

        #instagramdiv {
            background-color: #dee2e6;
            border-radius: 25px !important;
            padding: 4px !important;
        }

        #archives {
            background-color: white !important;

        }

        #senddiv {
            border-radius: 25px;
        }

        /* link https://bootsnipp.com/snippets/1ea0N */

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #fff none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 100%;
            border-right: 1px solid #c4c4c4;

        }

        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }

        .top_spac {
            margin: 20px 0 0;
        }

        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }

        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }

        .chat_ib h5 {
            font-size: 15px;
            color: #464646;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 13px;
            float: right;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: left;
            width: 11%;
        }

        .chat_ib {
            float: left;
            padding: 0 0 0 15px;
            width: 88%;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 53vh;
            overflow-y: scroll;
            overflow-x: hidden;
            padding: 0 !important;
        }

        .inbox_chat::-webkit-scrollbar {
            width: 5px;

        }

        .inbox_chat::-webkit-scrollbar-track {
            background-color: #fff;
        }

        .inbox_chat::-webkit-scrollbar-thumb {
            background: #e95950 !important;
        }

        .msg_history::-webkit-scrollbar {
            width: 5px;
        }

        .msg_history::-webkit-scrollbar-track {
            background-color: #fff;
        }

        .msg_history::-webkit-scrollbar-thumb {
            background: #e95950 !important;
        }

        .active_chat {
            background: #ebebeb;
        }

        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }

        .outgoing_msg_img {
            float: right;
            width: 6%;
        }



        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 25px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: fit-content;
        }

        .mesgs {
            float: left;
            padding: 0px 0px 0px 0px;
            width: 100%;

        }

        .sent_msg p {
            background: #e95950 none repeat scroll 0 0;
            border-radius: 25px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: 5px 10px 5px 12px;
            width: 100%;


        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 0 26px;
        }

        .sent_msg {
            background-color: #fff;
            float: right;
            width: fit-content !important;

        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .msg_send_btn {
            background: #05728f none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            font-size: 17px;
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }

        .messaging {
            padding: 0 0 50px 0;
        }

        .msg_history {
            background-color: #fff;
            height: 53vh;
            overflow-y: scroll;
        }

        .msg_history ::-webkit-scrollbar-thumb {
            background: green;


            height: 350px;
            overflow-y: scroll;
        }
    </style>


</head>

<body>
    <!-- WhatsaApp Facebook Instagram Buttons -->
    <div class="container">
        <!-- row starts -->
        <div class="row">
        <div class="col-md-12 mt-2">
                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>
                <strong class="card-title">Social Media</strong>
                <br>
                <a href="social-media-instagram" active>
                    <button type="button" class="btn ml-2 mr-2" id="instagram" active style="background-color: yellow;">
                    <i class="fa-brands fa-instagram" style="font-size: 14px;"></i>&nbsp;Instagram
                    </button>
                </a>

                <a href="social-media-facebook">
                    <button type="button" class="btn " style="float: right; width:10vw;" id="facebook">
                    <i class="fa-brands fa-facebook" style="font-size: 14px;"></i>&nbsp;Facebook
                    </button>
                </a>

                <a href="social-media-whatsapp">
                    <button type="button" class="btn ml-2 mr-2 " style="float: right; background-color: #25D366; color:white; width:10vw;" id="whatsapp">
                    <i class="fa-brands fa-whatsapp" style="font-size: 14px;"></i>&nbsp;WhatsApp
                    </button>
                </a>
            </div>
        </div>
        </div>
        <!-- row ends  -->
    </div>
    <!-- WhatsaApp Facebook Instagram Buttons -->

    <!-- container starts -->
    <div class="container mt-1" style="box-sizing: border-box;">
        <div class="row">

            <div class="col-md-4 inbox_msg" style="background-color: #fff !important; border-radius: 5px;  border:2px solid #dee2e6; border-bottom: 2px solid  #dee2e6 !important; padding-bottom: 25px;">

                <div class="row">
                    <div class="col-md-12">
                        <center>
                        <h5> <i class="fa-brands fa-instagram text-danger mt-2" style="font-size:6vh;"></i> <span class="mt-2">Instagram</span> </h5>
                        </center>
                    </div>
                </div>


                <div class="inbox_msg mt-2">
                    <div class="inbox_people shadow-lg p-2 bg- rounded">

                        <div class="row">
                            <div class="col-md-12 headind_srch">
                                <div class="srch_bar " style="min-width: -webkit-fill-available;">
                                    <div class="stylish-input-group" style="width: 100%;">
                                        <input type="text" class="search-bar" placeholder="Search Chat">
                                        <span class="input-group-addon bg-success" style="background-color:#e95950 !important; border:#fff;">
                                            <button type="btn">
                                                <i class="fa fa-search text-white" aria-hidden="true"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="inbox_chat shadow  bg- rounded">

                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list active_chat">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="chat_list">
                                        <div class="chat_people">
                                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                            <div class="chat_ib">
                                                <h5>Zamran <span class="chat_date">Dec 18</span></h5>
                                                <p>Lorem ipsum dolor sit amet.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>




                        </div>
                    </div>

                </div>



            </div>
            <!-- col-md-4 ends -->

            <!-- col-md-8 starts -->
            <div class="col-md-8" style="background-color: #fff; border-radius: 5px !important; border:2px solid #dee2e6;">
                <div class="row">
                    <div class="col-md-12">

                        <div class="row mt-1">
                            <div class="col-md-1 mt-2">
                                <a href="">
                                    <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil" style="width: 4vw;">
                                </a>
                            </div>
                            <div class="col-md-2 mt-2 mr-4 float-left">
                                <span class=" mb-2 profiletext">
                                    Zamran

                                </span>
                            </div>
                            <div class="col-md-8 mt-2 ml-4">
                                <a href="http://sodabaz.com/MasterMotor/public/create-customer-inquiry/add">
                                    <button type="button" class="btn btn-round btn-primary float-right ml-1"><i class="fa fa-plus-circle"></i>&nbsp;New Ticket</button>
                                    <a href="">
                                    </a>
                                    <a href="http://sodabaz.com/MasterMotor/public/customer-details/33">
                                        <button class="btn btn-round btn-primary ml-2 mr-1" id="" style="float: right;">View Profile</button>
                                    </a>
                            </div>
                        </div>



                        <div class="col-md-4 mt-3">
                            <!-- <center>
                                <span>
                                    <h4 style="color:#4267B2; font-weight: bold;">FACEBOOK</h4>
                                </span>
                            </center> -->
                        </div>

                    </div>
                </div>
                <div class="mesgs">

                    <div class="msg_history">
                        <div class="incoming_msg mt-1">

                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Test which?</p>
                                    <span class="time_date"> 11:01 AM | June 9</span>
                                </div>
                            </div>
                        </div>
                        <div class="outgoing_msg">
                            <div class="outgoing_msg_img ml-2"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="sent_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date"> 11:01 AM | June 9</span>
                            </div>
                        </div>
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>Test, which is a new approach to have</p>
                                    <span class="time_date"> 11:01 AM | Yesterday</span>
                                </div>
                            </div>
                        </div>
                        <div class="outgoing_msg">
                            <div class="outgoing_msg_img ml-2"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="sent_msg">
                                <p>Apollo University, Delhi</p>
                                <span class="time_date"> 11:01 AM | Today</span>
                            </div>

                        </div>
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>We work directly with our designers and suppliers,
                                        and sell direct to you.</p>
                                    <span class="time_date"> 11:01 AM | Today</span>
                                </div>
                            </div>
                        </div>
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>We work directly with our designers and suppliers,
                                        and sell direct to you, which means quality, exclusive
                                        products, at a price anyone can afford.</p>
                                    <span class="time_date"> 11:01 AM | Today</span>
                                </div>
                            </div>
                        </div>
                        <div class="outgoing_msg">
                            <div class="outgoing_msg_img ml-2"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="sent_msg">
                                <p>Test which is a new approach to have all
                                    solutions</p>
                                <span class="time_date"> 11:01 AM | Today</span>
                            </div>
                        </div>
                    </div>

                    <div class="type_msg mb-2">
                        <div class="input_msg_write mt-1 mb-2">
                            <textarea name="" id="messagetyping" rows="2" style="width: 95%;resize:none" class="messagetyping" placeholder="Type message here."></textarea>

                            <button class="msg_send_btn" type="button" title="Send" style="background-color: #e95950 !important;"><i class="fa fa-paper-plane-o " aria-hidden="true"></i></button>
                        </div>
                    </div>
                </div>

            </div>



        </div>
        <!-- col-md-8 ends -->
    </div>
    <!-- row ends -->
    </div>
    <!-- container starts -->

</body>
@endsection