<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master Motors</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<link rel="apple-touch-icon" href="apple-icon.png">
<link rel="shortcut icon" href="favicon.ico">

<link rel="stylesheet" href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
<link rel="stylesheet" href="{{ asset('vendors/themify-icons/css/themify-icons.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/flag-icon-css/css/flag-icon.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/selectFX/css/cs-skin-elastic.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/jqvmap/dist/jqvmap.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/whatsapp.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/chosen/chosen.min.css') }}">

<link href='https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.dataTables.min.css' rel='stylesheet'
    type='text/css'>
<link href='https://cdn.datatables.net/datetime/1.2.0/css/dataTables.dateTime.min.css' rel='stylesheet' type='text/css'>
<style>
    @font-face {
        font-family: Poppins-Regular;
        src: url('../../../public/Fonts/Poppins-Regular.ttf');
    }

    @font-face {
        font-family: Poppins-Thin;
        src: url('../../../public/Fonts/Poppins-Thin.ttf');
    }

    @font-face {
        font-family: Inter-Medium;
        src: url('../../../public/Fonts/Inter-Medium.ttf');
    }

    @font-face {
        font-family: BeVietnamPro-Regular;
        src: url('../public/Fonts/BeVietnamPro-Regular.ttf');
    }

    body {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    .img-profile {
        border-radius: 20px;
    }

    .bell-icon {
        width: 70px;
        /* background-color: red;/ */
    }

    .headerContainer {
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-around;
        margin-left: 5px !important;
        /*background-color: blue !important; */
        padding-left: 20px;
        width: 100% !important;
    }

    .header-icon {
        width: 21px;
        /* padding-left: 10px; */
    }

    .headerFirstDiv {
        width: 100%;
        /* height: 10vh; */
        /* background-color: red; */
        display: flex;
        justify-content: center;
        border-bottom: 1px solid #eeeef0;
        background-color: #f3f4f7;
    }


    .logo {
        width: 160px;
    }

    .heading {
        color: black;
        font-size: 17px;
        font-family: Poppins-Regular;
        margin-left: 20px;
    }

    .button-icons {
        background-color: white;
        border-radius: 5px;
        border: none;
        -webkit-box-shadow: 4px 4px 10px 0 rgb(0 0 0 / 8%), -5px -6px 10px 0 rgb(253 253 253);
        margin-left: 20px;
        box-shadow: 4px 4px 10px 0 rgb(0 0 0 / 8%), -5px -6px 10px 0 rgb(253 253 253);
        padding: 5px 10px 5px 10px;
        background-image: linear-gradient(to top, #f1f2f5, rgba(255, 255, 255, 0)), linear-gradient(to bottom, #f6f6f9, #f6f6f9);
        cursor: pointer;
    }

    .icons-header {
        width: 20px;
    }

    .logoContainer {
        display: flex;
        align-items: center;
    }

    .badgeDiv {
        position: absolute;
        right: -6px;
        top: -11px;
        background-color: #FF5334;
        width: 20px;
        display: flex;
        justify-content: center;
    }

    .headingTime {
        color: black;
        font-size: 17px;
        font-family: Poppins-Regular;
        margin-left: 5px;
    }

    .badge {
        color: white;
        font-family: Poppins-Regular;
        margin: 0;
        font-size: 12px;

    }

    .headerSecondDiv {
        width: 100% !important;
        background-color: #f3f4f7;
        display: flex;
        justify-content: center;
        padding: 15px 4px 15px 4px;
    }

    .navbarList {
        width: 96% !important;
        /* background-color: blue; */
        /* margin-left: 50px; */
        font-size: 15px;
        color: #000;
        font-family: Poppins-Regular;
        display: flex;
        flex-direction: row;
    }

    .headerContainerList {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding-left: 50px;
    }

    .headerContainerListOne {
        display: flex;
        flex-direction: row;
        align-items: center;
        padding-left: 13px;
    }

    .navbarListNames {
        padding-left: 10px;
        list-style-type: none;
        font-size: 14.5px;
        font-weight: 500;
        font-family: BeVietnamPro-Regular !important;
        /*color : red;*/
    }

    #search-box2 {
        padding: 10px;
        border: none;
        border-radius: 50px;
        display: none;
        float: left;
        width: 200px;
        /* transition: all 3s; */
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content li {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    #logoutButton {
        background-color: #ddd;
        /* width: 100px; */
        font-family: BeVietnamPro-Regular;
        color: red;
    }

    #profileButton {
        background-color: #ddd;
    }

    #profileButton:hover {
        background-color: #ddd !important;
    }

    #logoutButton:hover {
        background-color: #ddd !important;
        color: red !important;
    }

    #Demo {
        /* background-color: blue; */
        width: 170px !important;
        margin-left: 10px;
        margin-top: 10px;
    }

    #headingModal {
        font-family: BeVietnamPro-Regular;
        color: #495155;
    }


    .mainContainer {
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .subNameDiv {
        width: 80%;
        /* background-color: #ddd; */
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .namePage {
        font-family: BeVietnamPro-Regular;
        font-size: 20px;
        color: #AAA9B6;
        font-weight: 500;
    }


    .saveButtonText {
        color: white;
        text-decoration: none;
        background-color: #00CC8E;
        font-family: BeVietnamPro-Regular;
        font-size: 17px;
        font-weight: 500;
        width: 90px;
        height: 35px;
        /* border: none; */
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .subContainer {
        width: 90%;
        border: 1px solid rgb(233, 233, 233);
        /* height: 50vh; */
        display: flex;
        align-items: center;
        flex-direction: column;
        padding: 10px;
    }

    .profilePic {
        width: 100px;
        height: 100px;
        border-radius: 50px;
    }

    .inputType {
            width: 180px;
    border: 1px solid #EEF0F1;
    font-family: Poppins-Thin;
    font-size: 15px;
    color: #828C8E;
    margin-top: 3px;
    padding: 2px 5px 2px 5px;
    /* padding-top: 5px;*/
    }

    .fullNameText {
        color: #666666;
        font-size: 14px;
        font-family: BeVietnamPro-Regular;
        margin: 0;
        font-weight: 400;
        margin-top: 10px;
    }

    .passwordText {
        font-family: BeVietnamPro-Regular;
        font-size: 14px;
        color: #00CC8E;
        cursor: pointer;
    }

    .inputTypeMonth {
        width: 35%;
    border: 1px solid #EEF0F1;
    font-family: Poppins-Thin;
    font-size: 15px;
    color: #828C8E;
    margin-top: 3px;
    padding: 2px 5px 2px 5px;
    /* padding-top: 5px;*/
    }

    .inputTypeDate {
        width: 20%;
    border: 1px solid #EEF0F1;
    font-family: Poppins-Thin;
    font-size: 15px;
    color: #828C8E;
    margin-top: 3px;
    padding: 2px 5px 2px 5px;
    /* padding-top: 5px;*/
    }

    .inputTypeYear {
        width: 35%;
    border: 1px solid #EEF0F1;
    font-family: Poppins-Thin;
    font-size: 15px;
    color: #828C8E;
    margin-top: 3px;
    padding: 2px 5px 2px 5px;
    /* padding-top: 5px;*/
    }

    .inputTypeName {
        width: 180px;
    border: 1px solid #EEF0F1;
    font-family: Poppins-Thin;
    font-size: 15px;
    color: #828C8E;
    margin-top: 3px;
    padding: 2px 5px 2px 5px;
    /* padding-top: 5px;*/
    }

    .inputTypePassword {
        border: none;
        font-family: Poppins-Thin;
    }

    .changePasswordDiv {
        width: 100%;
        border: 1px solid #EEF0F1;
        font-family: BeVietnamPro-Regular;
        font-size: 14px;
        color: #828C8E;
        margin-top: 3px;
        padding: 3px;
        padding-top: 5px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .changePasswordcontainer {
        /* display: flex; */
        /* justify-content: space-between; */
        width: 100%;
        display: none;
    }
    #updateButton {
        display: none;
    }
</style>

<body>
    <div class='headerFirstDiv'>
        <div class='headerContainer'>
            <div class='logoContainer'>
                <img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt="" class='logo'>
                <h2 class='heading'>Hi,Welcome Back</h2>
            </div>
            <div style="display : flex">
                <p class='heading' id="time"></p>
                <p class='headingTime' id="ct7"></p>
            </div>
            <div>
                <input id="search-box2" name='search' type='search' placeholder='Search...'>
                <button onclick="openSearch()" class='button-icons'>
                    <img src="{{ asset('images/search.png') }}" class='icons-header'>
                </button>
                <button class='button-icons'>
                    <img src="{{ asset('images/icon1.png') }}" class='icons-header'>
                </button>
                <button class='button-icons' onclick="profileFunction()">
                    <img src="{{ asset('images/user2.png') }}" class='icons-header'>
                </button>
                <div id="Demo" class="w3-dropdown-content w3-bar-block w3-border">
                    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                        Open modal
                      </button> --}}
                    <a href="#" class="w3-bar-item w3-button" id="profileButton" data-bs-toggle="modal"
                        data-bs-target="#myModal">My Profile</a>
                    <a href="#" class="w3-bar-item w3-button" id="logoutButton">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <div class='headerSecondDiv' id="myHeader">
        <div class="navbarList">
            <div class='headerContainerListOne'>
                <img src="{{ asset('images/dashboard.png') }}" alt="" class='header-icon'>
                <a class="navbarListNames" href='https://sodabaz.com/MasterMotor/public/'>Dashboard</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/customers.png') }}" alt="" class='header-icon'>
                <a class="navbarListNames" href='https://sodabaz.com/MasterMotor/public/customers'>Customers</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/call-center.png') }}" alt="" class='header-icon'>
                <a class="navbarListNames"
                    href='https://sodabaz.com/MasterMotor/public/call-logs'>Call&nbsp;Center</a>
            </div>

            <div class='headerContainerList'>
                <img src="{{ asset('images/meta.png') }}" alt="" class='header-icon'>
                <a class="navbarListNames"
                    href='https://sodabaz.com/MasterMotor/public/social-media-whatsapp'>Meta</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/crm-logs.png') }}" alt="" class='header-icon'>
                <li class="navbarListNames">CRM&nbsp;Logs</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/complaint.png') }}" alt="" class='header-icon'>
                <a class="navbarListNames"
                    href='https://sodabaz.com/MasterMotor/public/complaint-management'>Complaint&nbsp;Management</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/inquiry.png') }}" alt="" class='header-icon'>
                <a class="navbarListNames"
                    href='https://sodabaz.com/MasterMotor/public/customer-inquiries-list'>Inquiries</a>
            </div>
            <div class='dropdown' style="margin-top: 2px">
                <div class='headerContainerList'>
                    <img src="{{ asset('images/other.png') }}" alt="" class='header-icon'>
                    <li class="navbarListNames">Other</li>
                </div>
                <div class="dropdown-content">
                    <li class="navbarListNames">Oracle</li>
                    <li class="navbarListNames">Dealership Info</li>
                    <li class="navbarListNames">FAQ </li>
                </div>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog modal-l">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title" id='headingModal'>My Profile</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="mainContainer">
                        <div class="subNameDiv">
                            <!--<h2 class="namePage">My Profile > <span style="color: black">Edit Profile</span> </h2>-->
                            <!--<a href="" class="saveButtonText">Save</a>-->
                        </div>
                        <div class="subContainer">
                            <img src="{{ asset('images/osama.jfif') }}" alt="" class='profilePic'>
                            <div style="display: flex;justify-content: space-between;width : 100%">
                                <div>
                                    <h2 class="fullNameText">First Name</h2>
                                    <input type="text" class="inputTypeName" value="Osama" readonly>
                                </div>
                                <div>
                                    <h2 class="fullNameText">Last Name</h2>
                                    <input type="text" class="inputTypeName" value="Khan" readonly>
                                </div>


                            </div>
                            <div style="display: flex;justify-content: space-between;width : 100%">
                                <div style='width : 100%'>
                                    <h2 class="fullNameText">Password</h2>
                                    <div class='changePasswordDiv'>
                                        <input type="text" class="inputTypePassword" value="********" readonly>
                                        <h2 class="passwordText" onclick="changePassword()">CHANGE PASSWORD</h2>
                                    </div>

                                </div>
                            </div>
                            <div class="changePasswordcontainer" id="changePasswordContainer">
                                <div style='width : 100%'>
                                    <h2 class="fullNameText">Enter Old Password</h2>
                                    <div class='changePasswordDiv'>
                                        <input type="text" class="inputTypePassword" placeholder="********">
                                    </div>

                                </div>
                                <div style="display: flex;justify-content: space-between;width : 100%">
                                    <div>
                                        <h2 class="fullNameText">New Password</h2>
                                        <input type="text" class="inputType" placeholder="********">
                                    </div>
                                    <div>
                                        <h2 class="fullNameText">Confirm New Password</h2>
                                        <input type="text" class="inputType" placeholder="********">
                                    </div>
    
    
                                </div>
                            </div>
                            <div style="display: flex;justify-content: space-between;width : 100%">
                                <div>
                                    <h2 class="fullNameText">Email</h2>
                                    <input type="text" class="inputType" value="abc@gmail.com" readonly>
                                </div>
                                <div>
                                    <h2 class="fullNameText">Phone</h2>
                                    <input type="text" class="inputType" value="03322053759" readonly>
                                </div>


                            </div>
                            <div style="display: flex;justify-content: space-between;width : 100%">
                                <!--<div>-->
                                <!--     <h2 class="fullNameText">Password</h2>-->
                                <!--     <input type="text" class="inputType" value="********">-->
                                <!-- </div>-->
                                <div>
                                    <h2 class="fullNameText">Gender</h2>
                                    <input type="text" class="inputType" value="Male" readonly>
                                </div>
                                <div>
                                    <h2 class="fullNameText">Role</h2>
                                    <input type="text" class="inputType" value="Admin" readonly>
                                </div>


                            </div>
                            <div style="display: flex;justify-content: space-between;width : 100%">
                                <!--<div>-->
                                <!--     <h2 class="fullNameText">Password</h2>-->
                                <!--     <input type="text" class="inputType" value="********">-->
                                <!-- </div>-->
                                <div>
                                    <h2 class="fullNameText">Date Of Birth</h2>
                                    <div style="display: flex;justify-content: space-between">
                                        <input type="text" class="inputTypeMonth" value="December" readonly>
                                        <input type="text" class="inputTypeDate" value="5" readonly>
                                        <input type="text" class="inputTypeYear" value="1998" readonly>
                                    </div>
                                </div>


                            </div>
                            <div style="display: flex;justify-content: space-between;width : 100%">
                                <div>
                                    <h2 class="fullNameText">Designation</h2>
                                    <input type="text" class="inputType" value="Admin" readonly>
                                </div>
                                <div>
                                    <h2 class="fullNameText">Department</h2>
                                    <input type="text" class="inputType" value="Call center" readonly>
                                </div>


                            </div>
                        </div>



                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer"
                    style="width: 100%;    padding: 5px 35px 5px 35px;">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                        style="background-color: #00CC8E;border: none" id="updateButton">Update</button>
                </div>

            </div>
        </div>
    </div>
    @yield('content')


    <!-- Right Panel -->

    <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>


    <script src="{{ asset('vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/widgets.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
    <script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>

    <script src="{{ asset('vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/jszip/dist/jszip.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('vendors/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/js/init-scripts/data-table/datatables-init.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.2.0/js/dataTables.dateTime.min.js"></script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin2 </title>
    <!-- plugins:css -->
    {{--
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    --}}
    <link rel="stylesheet" href="../../vendors/feather/feather.css">
    <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../../vendors/typicons/typicons.css">
    <link rel="stylesheet" href="../../vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="../../vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../../vendors/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="../../vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../js/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->

    <!-- endinject -->
    <link rel="shortcut icon" href="../../images/favicon.png" />

    <script>
        (function($) {
            // alert("");
            "use strict";

            jQuery('#vmap').vectorMap({
                map: 'world_en',
                backgroundColor: null,
                color: '#ffffff',
                hoverOpacity: 0.7,
                selectedColor: '#1de9b6',
                enableZoom: true,
                showTooltip: true,
                values: sample_data,
                scaleColors: ['#1de9b6', '#03a9f5'],
                normalizeFunction: 'polynomial'
            });
        })(jQuery);



        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                // disable_search_threshold: 10,
                // no_results_text: "Oops, nothing found!",
                // width: "100%"
            });
        });

        function goback() {
            window.history.back()
        }

        $('#collapseDiv').on('shown.bs.collapse', function() {
            console.log("Opened")
        });

        $('#collapseDiv').on('hidden.bs.collapse', function() {
            console.log("Closed")
        });

        setTimeout(function() {
            $(".alert").hide();
        }, 3000);
    </script>
    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

            var minutes = x.getMinutes().toString()
            minutes = minutes.length == 1 ? 0 + minutes : minutes;



            var month = (x.getMonth() + 1).toString();
            month = month.length == 1 ? 0 + month : month;

            var dt = x.getDate().toString();
            dt = dt.length == 1 ? 0 + dt : dt;

            var x1 = month + "-" + dt + "-" + x.getFullYear();
            x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct7()', refresh)
        }
        display_c7()
    </script>
    <script>
        function profileFunction() {
            var x = document.getElementById("Demo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
    <script>
        function myFunction(p1) {
            console.log(p1);
            var x = document.getElementById('p1');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function display(subComment) {
            console.log(subComment);
            var x = document.getElementById('subComment');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script>
        const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        const d = new Date();
        let day = weekday[d.getDay()];
        document.getElementById("time").innerHTML = day;

        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }

        function openSearch() {
            var y = document.getElementById("search-box2");
            if (y.style.display === "none") {
                y.style.display = "block";
                y.style.transition = "all 3s"
            } else {
                y.style.display = "none";
            }
        }
    </script>
    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

            var minutes = x.getMinutes().toString()
            minutes = minutes.length == 1 ? 0 + minutes : minutes;



            var month = (x.getMonth() + 1).toString();
            month = month.length == 1 ? 0 + month : month;

            var dt = x.getDate().toString();
            dt = dt.length == 1 ? 0 + dt : dt;

            var x1 = month + "-" + dt + "-" + x.getFullYear();
            x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct7()', refresh)
        }
        display_c7()
    </script>
    <script>
        function myFunction(p1) {
            console.log(p1);
            var x = document.getElementById('p1');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function replyFunction(p1) {
            // console.log(p1);
            var x = document.getElementById('inputReplyDiv');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function subReplyFunction(p1) {
            // console.log(p1);
            var x = document.getElementById('inputReplyDiv2nd');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }

        function display(subComment) {
            console.log(subComment);
            var x = document.getElementById('subComment');
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>
    <script>
        const weekday = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

        const d = new Date();
        let day = weekday[d.getDay()];
        document.getElementById("time").innerHTML = day;

        window.onscroll = function() {
            myFunction()
        };

        var header = document.getElementById("myHeader");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
            } else {
                header.classList.remove("sticky");
            }
        }
    </script>
    <script>
        function infoFunction() {
            var x = document.getElementById("click");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        function changePassword() {
            var x = document.getElementById("changePasswordContainer");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
            var x = document.getElementById("updateButton");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }



        function openSearch() {
            var y = document.getElementById("search-box");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
        }
    </script>
    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

            var minutes = x.getMinutes().toString()
            minutes = minutes.length == 1 ? 0 + minutes : minutes;



            var month = (x.getMonth() + 1).toString();
            month = month.length == 1 ? 0 + month : month;

            var dt = x.getDate().toString();
            dt = dt.length == 1 ? 0 + dt : dt;

            var x1 = month + "-" + dt + "-" + x.getFullYear();
            x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct7()', refresh)
        }
        display_c7()
    </script>
    <script src="{{ asset('vendors/chosen/chosen.jquery.min.js') }}"></script>
</body>

</html>
