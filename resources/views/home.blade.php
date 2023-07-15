<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
</head>

<body>
    <div class='headerFirstDiv'>
        <div class='headerContainer'>
            <div class='logoContainer'>
                <img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt="" class='logo'>
                <h2 class='heading'>{{ session()->get('isLogin')[0]['name'] }}</h2>
            </div>
            <div style="display : flex;align-items: center;">
                <p class='heading' id="time"></p>
                <p class='headingTime' id="ct7"></p>
            </div>
            <div style="display: flex">
                {{-- <button class='button-icons'> --}}
                <div class="inputDivHeader" id="inputDivHeaderId" style="display: none">
                    <input type="text" size="30" onkeyup="showResult(this.value)" class="inputHeader"
                        placeholder="Search">
                    <div id="livesearch"></div>
                </div>

                {{-- </button> --}}
                {{-- <input id="search-box2" name='search' type='search' placeholder='Search...'> --}}
                <button onclick="openSearch()" class='button-icons'>
                    <img src="{{ asset('images/search.png') }}" class='icons-header'>
                </button>
                <button class='button-icons'>
                    <img src="{{ asset('images/icon1.png') }}" class='icons-header'>
                </button>
                <button class='button-icons' onclick="profileFunction()">
                    <details class="dropdown" style="margin-right: 0px !important">
                        <summary role="button" onclick="profileFunction()">
                            <img src="{{ asset('images/user2.png') }}" class='icons-header'>
                        </summary>
                        <ul>
                            <li class='subDropLi'>
                                <img src="{{ asset('images/myProf.png') }}" alt="" class='subDropLiIconProf'>
                                <a href="#" class="navbarListNames">My Profile</a>
                            </li>
                            <li class='subDropLi'>
                                <img src="{{ asset('images/logut.png') }}" alt="" class='subDropLiIconProf'>
                                <a href="{{ url('logout') }}" class="navbarListNames">Logout</a>
                            </li>
                        </ul>
                    </details>
                </button>
            </div>
        </div>
    </div>
    <div
        style="width: 100%; height: 80vh; display: flex; flex-direction: column; justify-content: center; align-items: center;  margin-top:10px;">
        <div class="survey_main_div_home">
            <div class="survey_box_main_div_home">
                <a href='{{ url('dashboard') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/dashboard.png') }}" alt="" class='header-icon'>
                        <h2> Dashboard </h2>
                    </div>
                </a>
                <!-- <a href='{{ url('customers') }}'>
                <div class="survey_inner_div">
                    <img src="{{ asset('images/customers.png') }}" alt="" class='header-icon'>
                    <h2> Customers </h2>
                </div>
            </a> -->
                <a href='{{ url('call-logs') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/call-center.png') }}" alt="" class='header-icon'>
                        <h2> Call Center </h2>
                    </div>
                </a>
                <a href='{{ url('') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/meta.png') }}" alt="" class='header-icon'>
                        <h2> Meta </h2>
                    </div>
                </a>
                <!-- <a href='{{ url('crm-logs') }}'>
                <div class="survey_inner_div">
                    <img src="{{ asset('images/crm-logs.png') }}" alt="" class='header-icon'>
                    <h2> CRM Logs </h2>
                </div>
            </a> -->
                <a href='{{ url('complaint-management') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/complaint.png') }}" alt="" class='header-icon'>
                        <h2> Complaints </h2>
                    </div>
                </a>
                <a href='{{ url('customer-inquiries-list') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/inquiry.png') }}" alt="" class='header-icon'>
                        <h2> Inquiries </h2>
                    </div>
                </a>
                <a href='{{ url('survey') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/Icons/survey.png') }}" alt="" class='header-icon'>
                        <h2> Surveys </h2>
                    </div>
                </a>
                <a href='{{ url('') }}'>
                    <div class="survey_inner_div">
                        <img src="{{ asset('images/Icons/survey.png') }}" alt="" class='header-icon'>
                        <h2> User Roles </h2>
                    </div>
                </a>
                <!-- <a href='{{ url('') }}'>
                <div class="survey_inner_div">
                    <img src="{{ asset('images/other.png') }}" alt="" class='header-icon'>
                    <h2> Other </h2>
                </div>
            </a> -->
            </div>
        </div>
    </div>
</body>


<script src="{{ asset('vendors/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<script src="{{ asset('vendors/chart.js/dist/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/widgets.js') }}"></script>
<script src="{{ asset('vendors/jqvmap/dist/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
<script src="{{ asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
        //
        var minutes = x.getMinutes().toString()
        minutes = minutes.length == 1 ? 0 + minutes : minutes;
        //
        //
        //
        //
        var month = (x.getMonth() + 1).toString();
        month = month.length == 1 ? 0 + month : month;
        //
        var dt = x.getDate().toString();
        dt = dt.length == 1 ? 0 + dt : dt;
        //
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
    //
    const d = new Date();
    let day = weekday[d.getDay()];
    document.getElementById("time").innerHTML = day;
    //
    window.onscroll = function() {
        myFunction()
    };
    //
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    //
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
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
        //
        var minutes = x.getMinutes().toString()
        minutes = minutes.length == 1 ? 0 + minutes : minutes;
        //
        //
        //
        var month = (x.getMonth() + 1).toString();
        month = month.length == 1 ? 0 + month : month;
        //
        var dt = x.getDate().toString();
        dt = dt.length == 1 ? 0 + dt : dt;
        //
        var x1 = month + "-" + dt + "-" + x.getFullYear();
        x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
    }
    //
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
    //
    function replyFunction(p1) {
        // console.log(p1);
        var x = document.getElementById('inputReplyDiv');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    //
    function subReplyFunction(p1) {
        // console.log(p1);
        var x = document.getElementById('inputReplyDiv2nd');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
    //
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
    //
    const d = new Date();
    let day = weekday[d.getDay()];
    document.getElementById("time").innerHTML = day;
    //
    window.onscroll = function() {
        myFunction()
    };
    //
    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;
    //
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
    //
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
    //
    //
    //
    function openSearch() {
        var y = document.getElementById("inputDivHeaderId");
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
        //
        var minutes = x.getMinutes().toString()
        minutes = minutes.length == 1 ? 0 + minutes : minutes;
        //
        //
        //
        var month = (x.getMonth() + 1).toString();
        month = month.length == 1 ? 0 + month : month;
        //
        var dt = x.getDate().toString();
        dt = dt.length == 1 ? 0 + dt : dt;
        //
        var x1 = month + "-" + dt + "-" + x.getFullYear();
        x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
    }
    //
    function display_c7() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct7()', refresh)
    }
    display_c7()
</script>
<script>
    function showResult(str) {
        if (str.length == 0) {
            document.getElementById("livesearch").innerHTML = "";
            document.getElementById("livesearch").style.border = "0px";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("livesearch").innerHTML = this.responseText;
                document.getElementById("livesearch").style.border = "1px solid #A5ACB2";
            }
        }
        xmlhttp.open("GET", "livesearch.php?q=" + str, true);
        xmlhttp.send();
    }
</script>
<script>
    $(".ui.dropdown").dropdown();
</script>
<script src="{{ asset('vendors/chosen/chosen.jquery.min.js') }}"></script>

</html>
