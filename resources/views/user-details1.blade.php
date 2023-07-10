@extends('template')
@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/view-customer-details.css') }}">

  
    <div class="mainContainer">
        <div class="subContainer">
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
                        <p class="textRight">Baghdad</p>
                    </div>
                    <div class="phone">
                        <p class="textLeft">Nic #</p>
                        <p class="textRight">42101-2857978-6</p>
                    </div>
                </div>
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
            </div>
            <div class="rightSection">
               
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event,'PreSales')">Pre Sales</button>
                    <button class="tablinks" onclick="openCity(event, 'Sales')">Sales</button>
                    <button class="tablinks" onclick="openCity(event, 'AfterSales')">After Sales</button>
                    <button class="tablinks" onclick="openCity(event,'Survey')">Survey</button>
                    <button class="tablinks" onclick="openCity(event,'RegisterdVechiles')">Registerd Vechiles</button>
                </div>
                <div id="PreSales" class="tabcontent">
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

                <div id="AfterSales" class="tabcontent">
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
                <div id="Survey" class="tabcontent">
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
                <div id="RegisterdVechiles" class="tabcontent">
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
            </div>
        </div>
    </div>

@endsection