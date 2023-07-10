@extends('template')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">

    <!-- survey scc file start here -->

    <link rel="stylesheet" href="{{ asset('assets/css/survey_css/myprofile.css') }}">

    <!-- survey scc file end here -->
    <style>
        .btn {
            font-size: 10px !important;
            height: fit-content !important;

            padding: 10px !important;
        }
    </style>

    <div class="mainContainer">
        <div class="subContainerCallRecieveDetails">
            {{-- <h1 class="mainHeading">Customers Details</h1> --}}
            <div class="leftSection">
                <div class="profileDiv">
                    <img src="{{ asset('images/osama.jfif') }}" alt="" class='profilePic'>
                    <h2 class="nameUser">Osama Khan</h2>
                    <p class="numberUser">0334-2053756</p>
                    <div class="phone">
                        <p class="textLeft">Phone</p>
                        <p class="textRight">0334-2053756</p>
                    </div>
                    <div class="phone">
                        <p class="textLeft">Email</p>
                        <p class="textRight">usamadon@gmail.com</p>
                    </div>
                    <div class="phone">
                        <p class="textLeft">City</p>
                        <p class="textRight">Chakwal</p>
                    </div>
                    <div class="phone">
                        <p class="textLeft">Nic #</p>
                        <p class="textRight">42101-2857978-6</p>
                    </div>
                </div>
                <!-- <div class="detailsDiv">
                                    <h2 class="detailText">Registered Vehicles</h2>
                                    <div class="phone">
                                        <p class="textRight vehiclebtn" data-toggle="modal" data-target=".bd-example-modal-xl" title="View Vehicle Details">Alsvin DC3 Comfort</p>
                                    </div>
                                    <div class="phone">
                                        <p class="textRight vehiclebtn" data-toggle="modal" data-target=".bd-example-modal-xl" title="View Vehicle Details">Oshan X7</p>
                                    </div>

                                </div> -->
                <div class="detailsDiv">
                    <h2 class="detailText">Registered Vehicles</h2>
                    <div class="phone">
                        <p class="textRight">Alsvin DC3 Comfort</p>
                    </div>
                    <div class="phone">
                        <p class="textRight">Oshan X7</p>
                    </div>

                </div>
                <!-- =========================== vehhical information popup box start here ============================================ -->

                <!-- <div class="modal fade bd-example-modal-xl" id="AddCustomerModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

                                    <div class="modal-dialog modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3 class="modal-title" id="largeModalLabel">Vehicle Information</h3>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5>Vehicle Name: Alsvin dc3 comfort</h5>
                                                <h5>Tenure: 2 Years</h5>
                                                <h5>Active Dealership: Gul Motors Karachi</h5>

                                                <div class="container">
                                                    <div>
                                                        <div class="tabs">
                                                            <button id="PBO Details" class="tab" id="vehicledefaultOpen">PBO Details</button>
                                                            <button id="vehicle Dispatch" class="tab"> vehicle Dispatch </button>
                                                            <button id="Invoice" class="tab">Invoice</button>
                                                            <button id="PDS/PDI" class="tab">PDS/PDI</button>
                                                            <button id="Delivery" class="tab">Delivery</button>
                                                            <button id="Feedback" class="tab">Feedback</button>
                                                            <buttonx id="Transferred" class="tab">Transferred</buttonx>
                                                        </div>
                                                    </div>

                                                    <div class="contents">
                                                        <div id="PBO Details" class="content">
                                                            <table class="example table table-striped table-bordered ">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> Booking Date </th>
                                                                        <th> Delivery Date </th>
                                                                        <th> Declaration From </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="vehicle Dispatch" class="content">
                                                            <table class="example table table-striped table-bordered">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> Dispatch Date </th>
                                                                        <th> Dealer Receiving Date </th>
                                                                        <th> VDQI Sheet </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="Invoice" class="content">
                                                            <table class="example table table-striped table-bordered">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> Invoice Date </th>
                                                                        <th> Dispatch Date </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="PDS/PDI" class="content">
                                                            <table class="example table table-striped table-bordered">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> PDS Date </th>
                                                                        <th> PDI Date </th>
                                                                        <th> GTG Date </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="Delivery" class="content">
                                                            <table class="example table table-striped table-bordered">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> Delivery Date </th>
                                                                        <th> Delivery Ceremony </th>
                                                                        <th> satisfaction Note </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="Feedback" class="content">
                                                            <table class="example table table-striped table-bordered">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> PFS Date </th>
                                                                        <th> SSIDate </th>
                                                                        <th> FFS Appointment Details </th>
                                                                        <th> Test Drive </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                        <div id="Transferred" class="content">
                                                            <table class="example table table-striped table-bordered">
                                                                <thead class="bg bg-primary text-white">
                                                                    <tr>
                                                                        <th> current owner </th>
                                                                        <th> Previous owner </th>
                                                                        <th> Vihical </th>
                                                                        <th> Chasis Number </th>
                                                                    </tr>
                                                                </thead>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="button">
                                                        <button class="previous">PREV</button>
                                                        <button class="next">NEXT</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                <!-- =========================== vehhical information popup box end  here ============================================ -->
                <div class="detailsDiv">
                    <h2 class="detailText">Details</h2>
                    <div class="leads">
                        <div class="leadsIconText">
                            <img src="{{ asset('images/sand.png') }}" alt="" class='sandTimer'>
                            <h2 class="leadText">Leads</h2>
                        </div>
                        <div class="boxesDiv">
                            <p class="textOpen">Open (0)</p>
                            <p class="textTotal">Total (1)</p>
                            <p class="textProgress">Delieverd (1)</p>
                        </div>
                    </div>
                    <div class="pbo">
                        <div class="leadsIconText">
                            <img src="{{ asset('images/sand.png') }}" alt="" class='sandTimer'>
                            <h2 class="leadText">PBO</h2>
                        </div>
                        <div class="boxesDiv">
                            <p class="textOpen">Invoiced (0)</p>
                            <p class="textProgress">Delieverd (1)</p>
                            <p class="textTotal">Total (1)</p>
                        </div>
                    </div>
                    <div class="complains">
                        <div class="leadsIconText">
                            <img src="{{ asset('images/sand.png') }}" alt="" class='sandTimer'>
                            <h2 class="leadText">Complains</h2>
                        </div>
                        <div class="boxesDiv">
                            <p class="textOpen">Open (0)</p>
                            <p class="textProgress">Progress (1)</p>
                            <p class="textTotal">Total (1)</p>
                        </div>
                    </div>
                </div>

                <div class="detailsDiv" style="gap: 10px;">
                    <h2 class="detailText"> Survey </h2>
                    <div style="display: flex; flex-direction: column; gap: 10px; border-bottom: 1px solid lightgray;">
                        <div class="leadsIconText">
                            <h2 class="leadText"> DCSI </h2>
                        </div>
                        <div style="display: flex; gap: 10px;">
                            <h6> Done </h6>
                            <div>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                            </div>
                            <h6> 50% </h6>
                        </div>
                    </div>
                    <div style="display: flex; flex-direction: column; gap: 10px; border-bottom: 1px solid lightgray;">
                        <h2 class="leadText"> SSI </h2>
                        <div style="display: flex; gap: 10px;">
                            <h6> Done </h6>
                            <div>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                                <i class="fa fa-star" style="color: gold;" aria-hidden="true"></i>
                            </div>
                            <h6> 50% </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSection">
                <h1 class="textCall">Incoming Call</h1>
                <div class="mainCallIncomingDiv">
                    <div>
                        <p class="textPreSalesHeading">In progress</p>
                        <p class="textPreSales">00:50</p>
                        <div style="display: flex;width: 120px;justify-content: space-between;margin-top: 10px">
                            <button class="viewButtons" style="background-color: #FF5940">
                                <img src="{{ asset('images/phonee.png') }}" alt="" class='callIcons'>
                            </button>
                            <button class="viewButtons" style="background-color: #38BDFE">
                                <img src="{{ asset('images/phoneHold.png') }}" style="height: 12px;width: 12px;">
                            </button>
                            <button class="viewButtons" style="background-color: #AFAFAD">
                                <img src="{{ asset('images/mic.png') }}" style="height: 12px;width: 12px;">
                            </button>
                        </div>
                    </div>

                </div>
                <div style='display : flex; border-bottom: 1px solid #ccc;'>
                    <div class="taba">
                        <button class="tablinks" id="defaultOpen" onclick="openCity(event,'Pre Sales')">Pre
                            Sales</button>
                        <button class="tablinks" onclick="openCity(event,'Sales')">Sales</button>
                        <button class="tablinks" onclick="openCity(event, 'After Sales')">After Sales</button>
                        <button class="tablinks" onclick="openCity(event, 'Complaints')"> Complaints </button>
                        <button class="tablinks" onclick="openCity(event,'Survey')">Survey</button>
                    </div>
                    <!--<Button class='newTicket'>New Ticket</Button>-->
                    {{-- <a href="https://sodabaz.com/MasterMotor/public/create-customer-inquiry/whatsapp" target="blank" class="newTicket">New Ticket</a> --}}
                    <a href="{{ url('create-customers-new-inquiry/add') }}" style="float: right" class="text-white"
                        target="_blank">
                        <button class="btn btn-primary text-white">Inquiry&nbsp;<i
                                class="fa fa-plus-circle"></i></button></a>
                    <a href="{{ url('create-customer-inquiry/add') }}" style="float: right" class="ml-2 text-white"
                        target="_blank">
                        <button class="btn btn-primary text-white">Complaint&nbsp;<i
                                class="fa fa-plus-circle"></i></button></a>
                </div>

                <div id="Pre Sales" class="tabcontent" style="overflow-x: scroll;">
                    <table class="example table table-striped nowrap table-bordered">
                        <thead class="bg bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Customer</th>
                                <th>Mobile&nbsp;no</th>
                                <th>Inquiry&nbsp;ID</th>
                                <th>Inquiry&nbsp;Type</th>
                                <th>Inquiries&nbsp;</th>
                                <th>Dealership</th>
                                <th>Start&nbsp;Date</th>
                                <th>Escalation&nbsp;Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div id="Sales" class="tabcontent">
                    <div class="mainDivPreSales">
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Dealership</p>
                            <p class="textPreSales">Yazdani Motors</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Date</p>
                            <p class="textPreSales">12/4/2003</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Status</p>
                            <p class="textPreSales">Pending</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Type</p>
                            <p class="textPreSales"> New Alsvin </p>
                        </div>
                        <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div>
                    </div>
                    <div class="mainDivPreSales">
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Dealership</p>
                            <p class="textPreSales">Bilal Motors</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Date</p>
                            <p class="textPreSales">12/4/2003</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Status</p>
                            <p class="textPreSales">Pending</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Type</p>
                            <p class="textPreSales"> New Alsvin </p>
                        </div>
                        <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div>
                    </div>
                    <div class="mainDivPreSales">
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Dealership</p>
                            <p class="textPreSales">Bilal Motors</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Date</p>
                            <p class="textPreSales">12/4/2003</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Status</p>
                            <p class="textPreSales">Pending</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Type</p>
                            <p class="textPreSales"> New Alsvin </p>
                        </div>
                        <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div>
                    </div>
                </div>
                <div id="After Sales" class="tabcontent">
                    <div class="mainDivPreSales">
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Dealership</p>
                            <p class="textPreSales">Bilal Motors</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Date</p>
                            <p class="textPreSales">12/4/2003</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Status</p>
                            <p class="textPreSales">Pending</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Type</p>
                            <p class="textPreSales"> New Alsvin </p>
                        </div>
                        <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div>
                    </div>
                    <div class="mainDivPreSales">
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Dealership</p>
                            <p class="textPreSales">Bilal Motors</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Date</p>
                            <p class="textPreSales">12/4/2003</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Status</p>
                            <p class="textPreSales">Pending</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Type</p>
                            <p class="textPreSales"> New Alsvin </p>
                        </div>
                        <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div>
                    </div>
                    <div class="mainDivPreSales">
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Dealership</p>
                            <p class="textPreSales">Bilal Motors</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Date</p>
                            <p class="textPreSales">12/4/2003</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Status</p>
                            <p class="textPreSales">Pending</p>
                        </div>
                        <div class="subDivPreSales">
                            <p class="textPreSalesHeading">Type</p>
                            <p class="textPreSales"> New Alsvin </p>
                        </div>
                        <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div>
                    </div>
                </div>
                <div id="Complaints" class="tabcontent" style="overflow-x: scroll;">
                    <table class="example table table-striped nowrap table-bordered">
                        <thead class="bg bg-primary text-white">
                            <tr>
                                <th>#</th>
                                <th>Complain ID</th>
                                <th>Complain CPT Type</th>
                                <th>Complain SPG Type</th>
                                <th>Complain CCC Type</th>
                                <th>Customer Name</th>
                                <th>Mobile No</th>
                                <th>Date</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div id="Survey" class="tabcontent">
                    <div class="main_body">
                        <div>
                            <div class="main_inner_head">
                                <div class="">
                                    <div class="progress1">
                                        <div class="progress-track"></div>
                                        <div id="step1" class="progress-step">
                                            step 1
                                        </div>
                                        <div id="step2" class="progress-step">
                                            step2
                                        </div>
                                        <div id="step3" class="progress-step">
                                            step 3
                                        </div>
                                        <div id="step4" class="progress-step">
                                            step 4
                                        </div>

                                        <div id="step5" class="progress-step">
                                            step 5
                                        </div>

                                        <div id="step6" class="progress-step">
                                            step 6
                                        </div>

                                        <div id="step7" class="progress-step">
                                            step 7
                                        </div>

                                        <div id="step8" class="progress-step">
                                            step 8
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="main_inner_body">
                                <div class="step1" id="in">
                                    <h3 class="h3">step 1</h3>
                                </div>
                                <div class="step2" id="pi">
                                    <h3 class="h3">step 2</h3>
                                </div>
                                <div class="step3" id="eb">
                                    <h3 class="h3"> step 3</h3>
                                </div>
                                <div class="step4" id="exp">
                                    <h3 class="h3"> step 4</h3>
                                </div>
                                <div class="step5" id="tc">
                                    <h3 class="h3"> step 5</h3>
                                </div>
                                <div class="step6" id="ca">
                                    <h3 class="h3">step 6</h3>
                                </div>
                                <div class="step7" id="al">
                                    <h3 class="h3">step 7</h3>
                                </div>
                                <div class="step8" id="all">
                                    <h3 class="h3">step 8</h3>
                                </div>
                            </div>
                        </div>
                        <div class="main_body_footer">
                            <button class="Previous" onclick="previous()">Previous</button>
                            <button class="next" id="next_btn" onclick="next()">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- ==================================================== ALL SCRIPT START HERE ==================================================== -->

    <script>
        function openSearch() {
            var y = document.getElementById("search-box");
            if (y.style.display === "none") {
                y.style.display = "block";
                y.style.transition = "all 3s"
            } else {
                y.style.display = "none";
            }
        }
    </script>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            let tabs = document.querySelectorAll('.tab');
            let contents = document.querySelectorAll('.content');
            let prev = document.querySelector('.previous');
            let next = document.querySelector('.next');

            let firstTab = function(tabs) {
                tabs[0].classList.add('tab-active');
                tabs[0].classList.add('active'); // add 'active' class to the first tab
            };
            let firstContent = function(contents) {
                contents[0].classList.add('content-active');
            };

            firstTab(tabs);
            firstContent(contents);

            for (let i = 0; i < tabs.length; i++) {
                tabs[i].addEventListener('click', () => tabClick(i));
            }

            prev.addEventListener('click', () => tabClick(getCurrentIndex() - 1));
            next.addEventListener('click', () => tabClick(getCurrentIndex() + 1));

            function getCurrentIndex() {
                for (let i = 0; i < tabs.length; i++) {
                    if (tabs[i].classList.contains('tab-active')) {
                        return i;
                    }
                }
                return 0;
            }

            function tabClick(currentIndex) {
                if (currentIndex >= tabs.length) {
                    currentIndex = 0;
                } else if (currentIndex < 0) {
                    currentIndex = tabs.length - 1;
                }
                removeActive();
                tabs[currentIndex].classList.add('tab-active');
                tabs[currentIndex].classList.add('active'); // add 'active' class to current tab
                contents[currentIndex].classList.add('content-active');
            }

            function removeActive() {
                for (let i = 0; i < tabs.length; i++) {
                    contents[i].classList.remove('content-active');
                    tabs[i].classList.remove('tab-active');
                    tabs[i].classList.remove('active'); // remove 'active' class from all tabs
                }
            }
        });
        document.getElementById("vehicledefaultOpen").click();
    </script>

    <!-- ======================================= ALL SURVEY SCREEN START HERE ========================================= -->

    <!--=============================================== ALL COUNTER START HERE ===============================================-->

    <script>
        var global_counter = 1;
    </script>

    <!--=============================================== ALL COUNTER END HERE ===============================================-->

    <!-- ======================================================= next button start here ======================================================= -->

    <script>
        let step = 'Get Started';

        const step1 = document.getElementById('step1');
        const step2 = document.getElementById('step2');
        const step3 = document.getElementById('step3');
        const step4 = document.getElementById('step4');
        const step5 = document.getElementById('step5');
        const step6 = document.getElementById('step6');
        const step7 = document.getElementById('step7');
        const btn = document.getElementsByClassName('next');


        function next() {
            if (step === 'Get Started') {

                ++global_counter;
                console.log("Global Counter Value => " + global_counter);

                step = 'Personal Information';
                step1.classList.remove("is-active");
                step1.classList.add("is-complete");
                step2.classList.add("is-active");
                btn[0].innerText = "Next";
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "block";
                document.getElementById("eb").style.display = "none";
                document.getElementById("exp").style.display = "none";
                document.getElementById("tc").style.display = "none";
                document.getElementById("ca").style.display = "none";
                document.getElementById("al").style.display = "none";
                document.getElementById("myBtn").style.display = "block";
                document.getElementById("all").style.display = "none";

            } else if (step === 'Personal Information') {
                ++global_counter;
                console.log("Global Counter Value => " + global_counter);
                step = 'Education Background';
                step2.classList.remove("is-active");
                step2.classList.add("is-complete");
                step3.classList.add("is-active");
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "none";
                document.getElementById("eb").style.display = "block";
                document.getElementById("exp").style.display = "none";
                document.getElementById("tc").style.display = "none";
                document.getElementById("ca").style.display = "none";
                document.getElementById("al").style.display = "none";
                document.getElementById("all").style.display = "none";

            } else if (step === 'Education Background') {

                ++global_counter;
                console.log("Global Counter Value => " + global_counter);
                step = 'Experience';
                step3.classList.remove("is-active");
                step3.classList.add("is-complete");
                step4.classList.add("is-active");
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "none";
                document.getElementById("eb").style.display = "none";
                document.getElementById("exp").style.display = "block";
                document.getElementById("tc").style.display = "none";
                document.getElementById("ca").style.display = "none";
                document.getElementById("al").style.display = "none";
                document.getElementById("all").style.display = "none";

            } else if (step === 'Experience') {

                ++global_counter;
                console.log("Global Counter Value => " + global_counter);
                step = 'Training/Certification';
                step4.classList.remove("is-active");
                step4.classList.add("is-complete");
                step5.classList.add("is-active");
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "none";
                document.getElementById("eb").style.display = "none";
                document.getElementById("exp").style.display = "none";
                document.getElementById("tc").style.display = "block";
                document.getElementById("ca").style.display = "none";
                document.getElementById("al").style.display = "none";
                document.getElementById("all").style.display = "none";

            } else if (step === 'Training/Certification') {

                ++global_counter;
                console.log("Global Counter Value => " + global_counter);
                step = 'careeraspiration';
                step5.classList.remove("is-active");
                step5.classList.add("is-complete");
                step6.classList.add("is-active");
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "none";
                document.getElementById("eb").style.display = "none";
                document.getElementById("exp").style.display = "none";
                document.getElementById("tc").style.display = "none";
                document.getElementById("ca").style.display = "block";
                document.getElementById("al").style.display = "none";
                document.getElementById("all").style.display = "none";

            } else if (step === 'careeraspiration') {

                ++global_counter;
                console.log("Global Counter Value => " + global_counter);
                step = 'Acknowledgement';
                step6.classList.remove("is-active");
                step6.classList.add("is-complete");
                step7.classList.add("is-active");
                btn[0].innerText = "Complete Set Up";
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "none";
                document.getElementById("eb").style.display = "none";
                document.getElementById("exp").style.display = "none";
                document.getElementById("tc").style.display = "none";
                document.getElementById("ca").style.display = "none";
                document.getElementById("al").style.display = "block";
                document.getElementById("all").style.display = "none";

            } else if (step === 'Acknowledgement') {
                ++global_counter;
                console.log("Global Counter Value => " + global_counter);
                step = 'Acknowledgements';
                step7.classList.remove("is-active");
                step7.classList.add("is-complete");
                step8.classList.add("is-active");
                btn[0].innerText = "Complete Set Up";
                document.getElementById("in").style.display = "none";
                document.getElementById("pi").style.display = "none";
                document.getElementById("eb").style.display = "none";
                document.getElementById("exp").style.display = "none";
                document.getElementById("tc").style.display = "none";
                document.getElementById("ca").style.display = "none";
                document.getElementById("al").style.display = "none";
                document.getElementById("all").style.display = "block";


            } else if (step === 'Acknowledgements') {
                btn.disabled = true;
            }
        }
    </script>

    <!-- ======================================================= next button start here ======================================================= -->

    <!-- ======================================================= previous button start here ======================================================= -->

    <script>
        function previous() {

            if (global_counter > 1) {
                --global_counter;


                if (global_counter === 7) {
                    //Remove Acknowledgement Divs
                    step = "careeraspiration";
                    document.getElementById("in").style.display = "none";
                    document.getElementById("pi").style.display = "none";
                    document.getElementById("eb").style.display = "none";
                    document.getElementById("exp").style.display = "none";
                    document.getElementById("tc").style.display = "none";
                    document.getElementById("ca").style.display = "none";
                    document.getElementById("al").style.display = "block";
                    document.getElementById("all").style.display = "none";
                    step7.classList.add("is-active");
                    step7.classList.remove("is-complete");
                    step8.classList.remove("is-active");
                    btn[0].innerText = "Next";
                } else if (global_counter === 6) {
                    //Remove Acknowledgement Divs
                    step = "careeraspiration";
                    document.getElementById("in").style.display = "none";
                    document.getElementById("pi").style.display = "none";
                    document.getElementById("eb").style.display = "none";
                    document.getElementById("exp").style.display = "none";
                    document.getElementById("tc").style.display = "none";
                    document.getElementById("ca").style.display = "block";
                    document.getElementById("al").style.display = "none";
                    document.getElementById("all").style.display = "none";
                    step6.classList.add("is-active");
                    step6.classList.remove("is-complete");
                    step7.classList.remove("is-active");
                    btn[0].innerText = "Next";
                } else if (global_counter === 5) {

                    step = "Training/Certification";
                    document.getElementById("in").style.display = "none";
                    document.getElementById("pi").style.display = "none";
                    document.getElementById("eb").style.display = "none";
                    document.getElementById("exp").style.display = "none";
                    document.getElementById("tc").style.display = "block";
                    document.getElementById("ca").style.display = "none";
                    document.getElementById("al").style.display = "none";
                    document.getElementById("all").style.display = "none";
                    step5.classList.add("is-active");
                    step5.classList.remove("is-complete");
                    step6.classList.remove("is-active");
                    btn[0].innerText = "Next";
                } else if (global_counter === 4) {

                    step = "Experience";
                    document.getElementById("in").style.display = "none";
                    document.getElementById("pi").style.display = "none";
                    document.getElementById("eb").style.display = "none";
                    document.getElementById("exp").style.display = "block";
                    document.getElementById("tc").style.display = "none";
                    document.getElementById("ca").style.display = "none";
                    document.getElementById("al").style.display = "none";
                    document.getElementById("all").style.display = "none";
                    step4.classList.add("is-active");
                    step4.classList.remove("is-complete");
                    step5.classList.remove("is-active");
                    btn[0].innerText = "Next";
                } else if (global_counter === 3) {

                    step = "Education Background";
                    document.getElementById("in").style.display = "none";
                    document.getElementById("pi").style.display = "none";
                    document.getElementById("eb").style.display = "block";
                    document.getElementById("exp").style.display = "none";
                    document.getElementById("tc").style.display = "none";
                    document.getElementById("ca").style.display = "none";
                    document.getElementById("al").style.display = "none";
                    document.getElementById("all").style.display = "none";
                    step3.classList.add("is-active");
                    step3.classList.remove("is-complete");
                    step4.classList.remove("is-active");
                    btn[0].innerText = "Next";
                } else if (global_counter === 2) {

                    step = "Personal Information";
                    document.getElementById("in").style.display = "none";
                    document.getElementById("pi").style.display = "block";
                    document.getElementById("eb").style.display = "none";
                    document.getElementById("exp").style.display = "none";
                    document.getElementById("tc").style.display = "none";
                    document.getElementById("ca").style.display = "none";
                    document.getElementById("al").style.display = "none";
                    document.getElementById("all").style.display = "none";
                    step2.classList.add("is-active");
                    step2.classList.remove("is-complete");
                    step3.classList.remove("is-active");
                    btn[0].innerText = "Next";
                } else if (global_counter === 1) {

                    step = "Get Started";
                    document.getElementById("in").style.display = "block";
                    document.getElementById("pi").style.display = "none";
                    document.getElementById("eb").style.display = "none";
                    document.getElementById("exp").style.display = "none";
                    document.getElementById("tc").style.display = "none";
                    document.getElementById("ca").style.display = "none";
                    document.getElementById("al").style.display = "none";
                    document.getElementById("all").style.display = "none";
                    step1.classList.add("is-active");
                    step1.classList.remove("is-complete");
                    step2.classList.remove("is-active");
                    btn[0].innerText = "Get Started";
                    document.getElementById("myBtn").style.display = "none";

                }
            }
        }
    </script>

    <!-- ======================================================= previous button end here ======================================================= -->

    <!-- ======================================= ALL SURVEY SCREEN END HERE ========================================= -->

    <!-- ==================================================== ALL SCRIPT END HERE ==================================================== -->
@endsection('content')
