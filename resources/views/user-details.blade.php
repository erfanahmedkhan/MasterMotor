<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Customer Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/view-customer-details.css') }}">
    
    <style>
        a {
            text-decoration: none !important;
            color:black !important;
        }
        
        .bg-orange {
            background: #f58935 !important;
            }
    </style>

</head>

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
                <input id="search-box" name='search' type='search' placeholder='Search...'>
                <button onclick="openSearch()" class='button-icons'>
                    <img src="{{ asset('images/search.png') }}" class='icons-header'>
                </button>
                <button class='button-icons'>
                    <img src="{{ asset('images/icon1.png') }}" class='icons-header'>
                </button>
                <button class='button-icons'>
                    <img src="{{ asset('images/icon2.png') }}" class='icons-header'>
                </button>
            </div>
        </div>
    </div>
    <div class='headerSecondDiv' id="myHeader">
        <div class="navbarList">
            <div class='headerContainerListOne'>
                <img src="{{ asset('images/Icons/Dashboard.svg') }}" alt="" class='header-icon'>
                 <a  href='https://sodabaz.com/MasterMotor/public/'>&nbsp;&nbsp;Dashboard</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/customers.svg') }}" alt="" class='header-icon'>
                    <a href='https://sodabaz.com/MasterMotor/public/customers'>&nbsp;&nbsp; Customers</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/Call.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames"><a href='https://sodabaz.com/MasterMotor/public/call-logs'>&nbsp;&nbsp;Call&nbsp;Center</a></li>
                   
            </div>

            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/meta.png') }}" alt="" class='header-icon'>
                <a href='https://sodabaz.com/MasterMotor/public/social-media-whatsapp'>&nbsp;&nbsp;Meta</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/CRMLogs.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">&nbsp;&nbsp;CRM Logs</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/Complaint.svg') }}" alt="" class='header-icon'>
               <a href='https://sodabaz.com/MasterMotor/public/complaint-management'>&nbsp;&nbsp;Complaint&nbsp;Management</a>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/Inquiry.svg') }}" alt="" class='header-icon'>
               <a href='https://sodabaz.com/MasterMotor/public/customer-inquiries-list'>&nbsp;&nbsp;Inquiries</a>
            </div>
            <div class='dropdown' style="margin-top: 2px">
                <div class='headerContainerList'>
                    <img src="{{ asset('images/Icons/Inquiry.svg') }}" alt="" class='header-icon'>
                    <li class="navbarListNames">&nbsp;&nbsp;Other</li>
                </div>
                <div class="dropdown-content">
                    <li class="navbarListNames">Oracle</li>
                    <li class="navbarListNames">Dealership Info</li>
                    <li class="navbarListNames">FAQ </li>
                </div>
            </div>
        </div>
    </div>
    <div class="mainContainer">
        <div class="subContainer">
            {{-- <h1 class="mainHeading">Customers Details</h1> --}}
            <div class="leftSection">
                @foreach ($data as $item)
                    <div class="profileDiv">
                        {{-- <img src="{{ asset('images/osama.jfif') }}" alt="" class='profilePic'> --}}
                        <img src="https://user.ptetutorials.com/images/user-profile.png" alt="Profile Pic"
                            class='profilePic'>
                        <h2 class="nameUser">{{ $item->name }} </h2>
                        <p class="numberUser">{{ $item->mobile }}</p>
                        <div class="phone">
                            <p class="textLeft">Phone</p>
                            <p class="textRight">{{ $item->mobile }}</p>
                        </div>
                        <div class="phone">
                            <p class="textLeft">Email</p>
                            <p class="textRight">{{ $item->email }}</p>
                        </div>
                        <div class="phone">
                            <p class="textLeft">City</p>
                            <p class="textRight">{{ $item->city_name }}</p>
                        </div>
                        <div class="phone">
                            <p class="textLeft">CNIC</p> <br>
                            <p class="textRight">{{ $item->cnic }}</p>
                        </div>
                        <div class="phone">
                            <p class="textLeft">Facebook</p>
                            <p class="textRight"><a href='https://www.facebook.com/{{$item->fb_url}}' class = "text-primary" target="_blank" title="https://www.facebook.com/{{$item->fb_url}}">/{{$item->fb_url}}</a></p>
                        </div>
                        <div class="phone">
                            <p class="textLeft">Instagram</p>
                            <p class="textRight"><a href='https://www.instagram.com/{{$item->insta_url}}' class = "text-primary" target="_blank" title="https://www.instagram.com/{{$item->insta_url}}">/{{$item->insta_url}}</a></p>
                        </div>
                    </div>
                @endforeach
                <div class="detailsDiv">
                    <h2 class="detailText">Details</h2>
                    <div class="leads">
                        <div class="leadsIconText">
                            <img src="{{ asset('images/sand.png') }}" alt="" class='sandTimer'>
                            <h2 class="leadText">Leads</h2>
                        </div>
                        <div class="boxesDiv">
                            <p class="textOpen bg-secondary">Total({{ $total_inquires }})</p>
                            <p class="textOpen  bg-danger" style="margin-left: 3%; ">Hot({{ $total_hotinquires }})
                            </p>
                            <p class="textOpen  bg-primary" style="margin-left: 3%; ">Cold({{ $total_coldinquires }})
                            </p>
                            <p class="textOpen  bg-orange" style="margin-left: 3%; ">Warm({{ $total_warminquires }})
                            </p>
                        </div>
                    </div>
                    {{-- <div class="pbo">
                        <div class="leadsIconText">
                            <img src="{{ asset('images/sand.png') }}" alt="" class='sandTimer'>
                            <h2 class="leadText">PBO</h2>
                        </div>
                        <div class="boxesDiv">
                            <p class="textOpen">Invoiced (0)</p>
                            <p class="textProgress">Delieverd (1)</p>
                            <p class="textTotal">Total (1)</p>
                        </div>
                    </div> --}}
                    <div class="complains">
                        <div class="leadsIconText">
                            <img src="{{ asset('images/sand.png') }}" alt="" class='sandTimer'>
                            <h2 class="leadText">Complaints</h2>
                        </div>
                        <div class="boxesDiv">
                            <p class="textOpen bg-secondary">Total ({{$total_complains}})</p>
                            <p class="textProgress bg-danger">Pending ({{$total_resolvedcomplains}})</p>
                            <p class="textTotal bg-success">Resolved ({{$total_pendingcomplains}})</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rightSection">
                              <div style='display : flex; border-bottom: 1px solid #ccc;'>
                    <div class="tab">
                    <button class="tablinks"  id="defaultOpen" onclick="openCity(event,'PreSales')">Pre Sales</button>
                    <button class="tablinks" onclick="openCity(event, 'Sales')">Sales</button>
                    <button class="tablinks" onclick="openCity(event, 'AfterSales')">After Sales</button>
                    <button class="tablinks" onclick="openCity(event,'Survey')">Survey</button>
                </div>
                    <!--<Button class='newTicket'>New Ticket</Button>-->
                     <a href="{{ url('create-customer-inquiry/'.request()->route('id')) }}" target="blank"
                class="newTicket">New Ticket</a>
                </div>
                <div id="PreSales" class="tabcontent">
                    <h3>INQUIRIES</h3>
                    @foreach ($inquiry as $item)
                        <div class="mainDivPreSales">
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Inq Number</p>
                                <p class="textPreSales">
                                    <!--<a href="{{ url('customer-journey-inquiry/' . $item->id) }}"-->
                                    <!--    class="text-primary">{{ $item->inquiry_number }}</a>-->
                                    <a href="{{ url('inquiry-details/' . $item->id) }}"
                                        class="text-primary">{{ $item->inquiry_number }}</a>
                                </p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Inquiry Type</p>
                                <p class="textPreSales">{{ $item->inquiry_type }}</p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Dealership</p>
                                <p class="textPreSales">{{ $item->dealer_name }}</p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Start Date</p>
                                <p class="textPreSales">{{ $item->start_date }}</p>
                            </div>
                            {{-- <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Escalation Date</p>
                                <p class="textPreSales">{{ $item->end_date }}</p>
                            </div> --}}
                            {{-- <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Status</p>
                                <p class="textPreSales">{{ $item->status }}</p>
                            </div> --}}

                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Status</p>
                                @if ($item->status == 'Hot')
                                    <p class="textPreSales badge bg-danger text-white">{{ $item->status }}</p>
                                @elseif ($item->status == 'Cold')
                                <p class="textPreSales badge bg-info text-white">{{ $item->status }}</p>
                                @else
                                    <p class="textPreSales badge bg-orange text-white">{{ $item->status }}</p>
                                @endif
                            </div>

                            {{-- <div class="subDivPreSales">
                            <button class="viewDetails">View</button>
                        </div> --}}
                        </div>
                    @endforeach

                </div>
                <div id="Sales" class="tabcontent">
                    <h3>COMPLAINTS</h3>
                    @foreach ($complaint as $row)
                        <div class="mainDivPreSales">
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Complain Number</p>
                                <p class="textPreSales"><a href="{{ url('complain-details/' . $row->id) }}"
                                    class="text-primary"> {{ $row->complain_number }}
                                  </a></p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">CCC Type</p>
                                <p class="textPreSales">{{ $row->complain_ccc_type }}</p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Dealership</p>
                                <p class="textPreSales">{{ $row->dealer_name }}</p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Created At</p>
                                <p class="textPreSales">{{ $row->created_at }}</p>
                            </div>

                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Priority</p>
                                <p class="textPreSales">{{ $row->complaint_priority }}</p>
                            </div>
                            <div class="subDivPreSales">
                                <p class="textPreSalesHeading">Status</p>
                                @if ($row->status == 'Pending')
                                    <p class="textPreSales badge bg-danger text-white">{{ $row->status }}</p>
                                @else
                                    <p class="textPreSales badge bg-success text-white">{{ $row->status }}</p>
                                @endif
                            </div>

                        </div>
                    @endforeach

                </div>
                <div id="AfterSales" class="tabcontent">
                    <h3>AFTER-SALES</h3>
                    {{-- <div class="mainDivPreSales">
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
                    </div> --}}
                </div>
                <div id="Survey" class="tabcontent">
                    <h3>SURVEY</h3>
                    {{-- <div class="mainDivPreSales">
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
                    </div> --}}
                </div>
                <div id="RegisterdVechiles" class="tabcontent">
                        <h3>REGISTERED VECHILES</h3>
                    {{-- <div class="mainDivPreSales">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</body>
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

</html>
