<!DOCTYPE html>
<html lang="en">


<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CHANGAN - Steel UI </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">


    <!-- plugins:css -->

    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/steelui/template/vendors/iconfonts/mdi/font/css/materialdesignicons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.1.96/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/steelui/template/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/steelui/template/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/steelui/template/css/horizontal-layout/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="https://changan.com.pk/images/favicon.png" />

    <style>
        .top-navbar {
            background-color: #17467e !important;
        }

        .bottom-navbar {
            background-color: #e9e9e9 !important;
        }

        .nav-link {
            color: #ffffff !important;
            padding: 10px 0px !important;
            line-height: 1 !important;

        }

        .nav-link img {
            height: 30px !important;
        }

        .nav-link span {
            font-size: 0.8rem !important;
            color: black;
        }

        .content-wrapper {
            height: 550 !important;
            overflow: auto !important;
        }

        .text-success {
            color: #28a745 !important;
        }

        .text-primary {
            color: #17467e !important;
        }

        .text-warning {
            color: #f58935 !important;
        }

        .card .card-body {
            padding: 0.5rem 0.5rem !important;
        }

        .icon-wrap {
            background: #e9e9e9 !important;
            height: auto !important;
        }

        .channels {
            height: fit-content;
        }

        .channels img {
            height: 50px !important;
            margin-top: 10px !important;
            margin-left: 10px !important;
        }

        .channels h4 {
            font-size: 1rem;
        }

        .channels a {
            text-decoration: none;
            color: black;
        }

        a.disabled {
            pointer-events: none;
        }

        .channels-row {
            margin-left: 10px !important;
        }

        table th {
            font-weight: bold !important;
        }

        .dataTables_length {
            box-sizing: border-box !important;
            display: none !important;
        }

        .dataTables_length label {
            box-sizing: border-box !important;
            display: none !important;
        }

        .dataTables_info {
            display: none !important;
        }

        .dataTables_paginate {
            display: none !important;
        }

        th.sorting_asc:before {
            display: none !important;
        }

        th.sorting_asc:after {
            display: none !important;
        }

        th.sorting:before {
            display: none !important;
        }

        th.sorting:after {
            display: none !important;
        }

        th.sorting_desc:after {
            display: none !important;
        }

        th.sorting_desc:before {
            display: none !important;
        }

        .sorting_asc:before {
            display: none !important;
        }

        .sorting_asc:after {
            display: none !important;
        }

        div.dataTables_wrapper div.dataTables_filter {
            box-sizing: border-box !important;
            width: fit-content !important;
            float: right !important;
        }

        .dataTables_filter label input {
            border: 2px solid #17467e !important;
            box-shadow: inset 0 0.5rem 2rem 0px #fff !important;
        }

        /* div.dataTables_wrapper div.dataTables_filter input {
            box-sizing: border-box !important;
            background: rgb(255, 255, 255) !important;
            margin-left: 0 !important;
            display: inline-block !important;
            width: auto !important;
            height: 10px !important;
        } */

        #ct7 {
            color: #17467e !important;
        }

        .footer {
            background: #e9e9e9 !important;
            padding: 10px 1rem !important;
            font-weight: bold;
        }

        .shadow {
            box-shadow: inset 0 0.5rem 2rem 0px #e9e9e9 !important;
        }

        .form-control {
            font-weight: 400;

            box-shadow: inset 2px 2px 5px #e9e9e9, inset -3px -3px 7px #e9e9e9;
            height: 10px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_horizontal-navbar.html -->
        <div class="horizontal-menu">


            <nav class="bottom-navbar bg-dark">
                <div class="container">
                    <ul class="nav page-navigation">
                        <li class="nav-item">
                            <img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt="" style="height: 50px;">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/') }}">
                                <img src="{{ asset('icons/dashboard.png') }}" alt="" class="rounded img-fluid">
                                <span>&nbsp;Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('customers') }}">
                                <img src="{{ asset('icons/customers.png') }}" alt="" class="rounded img-fluid">
                                <span>&nbsp;Customers</span>

                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('call-center-call') }}">
                                <img src="{{ asset('images/Icons/Call.svg') }}" alt="" class="rounded img-fluid">
                                <span>&nbsp;Call Center</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('social-media-whatsapp') }}" class="rounded img-fluid">
                                <img src="{{ asset('images/Icons/meta.svg') }}" alt="" class="rounded img-fluid">
                                <span>Meta</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">
                                <img src="{{ asset('images/Icons/CRMLogs.svg') }}" alt="" class="rounded img-fluid">
                                <span>&nbsp;CRM Logs</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('complaint-management') }}">
                                <img src="{{ asset('icons/complaint-management.png') }}" alt="" class="rounded img-fluid">
                                <span>&nbsp;Complaint Management</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('customer-inquiries-list') }}" class="rounded img-fluid">
                                <img src="{{ asset('images/Icons/Inquiry.svg') }}" alt="">
                                <span>&nbsp;Inquiries</span>
                            </a>
                        </li>

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}" class="rounded img-fluid">
                                <img src="{{ asset('images/Icons/admin.png') }}" alt="">
                                <span>&nbsp;Logout</span>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item">
                            <a class="nav-link" href="pages/widgets/widgets.html">
                                <i class="mdi mdi-airplay menu-icon"></i>
                                <span class="menu-title">Widgets</span>
                            </a>
                        </li>
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-puzzle-outline menu-icon"></i>
                                <span class="menu-title">UI Elements</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="category-heading">Basic Elements</p>
                                                <div class="submenu-item">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/accordions.html">Accordion</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/badges.html">Badges</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/breadcrumbs.html">Breadcrumbs</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdown</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/modals.html">Modals</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/progress.html">Progress
                                                                        bar</a></li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/pagination.html">Pagination</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/tabs.html">Tabs</a></li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/typography.html">Typography</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/tooltips.html">Tooltip</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <div class="row">
                                            <div class="col-12">
                                                <p class="category-heading">Advanced Elements</p>
                                                <div class="submenu-item">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <ul>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/dragula.html">Dragula</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/carousel.html">Carousel</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/clipboard.html">Clipboard</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/context-menu.html">Context
                                                                        Menu</a></li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/loaders.html">Loader</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/slider.html">Slider</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <ul>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/popups.html">Popup</a>
                                                                </li>
                                                                <li class="nav-item"><a class="nav-link" href="pages/ui-features/notifications.html">Notification</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-group col-md-4">
                                        <p class="category-heading">Icons</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/icons/flag-icons.html">Flag Icons</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/icons/font-awesome.html">Font Awesome</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/icons/simple-line-icon.html">Simple Line Icons</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/icons/themify.html">Themify Icons</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                                <span class="menu-title">Forms</span>
                                <i class="menu-arrow"></i></a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/advanced_elements.html">Advanced Elements</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/validation.html">Validation</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/wizard.html">Wizard</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/text_editor.html">Text
                                            Editor</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/forms/code_editor.html">Code
                                            Editor</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-finance menu-icon"></i>
                                <span class="menu-title">Data</span>
                                <i class="menu-arrow"></i></a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-6">
                                        <p class="category-heading">Charts</p>
                                        <div class="submenu-item">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/chartjs.html">Chart Js</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/morris.html">Morris</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/flot-chart.html">Flot</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/google-charts.html">Google Chart</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-md-6">
                                                    <ul>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/sparkline.html">Sparkline</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/c3.html">C3 Chart</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/chartist.html">Chartist</a></li>
                                                        <li class="nav-item"><a class="nav-link" href="pages/charts/justGage.html">JustGage</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Table</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/tables/basic-table.html">Basic Table</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/tables/data-table.html">Data Table</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/tables/js-grid.html">Js-grid</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/tables/sortable-table.html">Sortable Table</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Maps</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/maps/mapeal.html">Mapeal</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/maps/vector-map.html">Vector Map</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/maps/google-maps.html">Google Map</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item mega-menu">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-codepen menu-icon"></i>
                                <span class="menu-title">Sample Pages</span>
                                <i class="menu-arrow"></i></a>
                            <div class="submenu">
                                <div class="col-group-wrapper row">
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">User Pages</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/login.html">Login</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/login-2.html">Login 2</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/register.html">Register</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/register-2.html">Register 2</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/lock-screen.html">Lockscreen</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">Error Pages</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/error-400.html">400</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/error-404.html">404</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/error-500.html">500</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/error-505.html">505</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">E-commerce</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/invoice.html">Invoice</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/pricing-table.html">Pricing Table</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/orders.html">Orders</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-group col-md-3">
                                        <p class="category-heading">General</p>
                                        <ul class="submenu-item">
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/search-results.html">Search Results</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/profile.html">Profile</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/timeline.html">Timeline</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/news-grid.html">News grid</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/portfolio.html">Portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="pages/samples/faq.html">FAQ</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="mdi mdi-image-filter menu-icon"></i>
                                <span class="menu-title">Apps</span>
                                <i class="menu-arrow"></i></a>
                            <div class="submenu">
                                <ul class="submenu-item">
                                    <li class="nav-item"><a class="nav-link" href="pages/apps/email.html">Email</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/apps/calendar.html">Calendar</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pages/apps/todo.html">Todo List</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="pages/apps/gallery.html">Gallery</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.bootstrapdash.com/demo/steelui/docs/documentation.html" class="nav-link">
                                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                                <span class="menu-title">Documentation</span></a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </div>



        <!-- partial -->
        <!-- COL-MD-3 starts -->
        <div class="col-md-3" style="float: right; ">
            <div class="container-fluid page-body-wrapper">
                <!-- main-panel starts -->
                <div class="main-panel">

                    <!-- content-wrapper starts -->
                    <div class="content-wrapper">

                        <div class="row mb-2  ml-2">
                            <h2>AGENTS <i class="fa fa-headset"></i></h2>
                        </div>

                        <div class="row ml-2 ">
                            <h3>Agent's Status</h3>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="mt-2 mb-2">Total</h5>
                                            <div class="d-flex mt-2">
                                                <div class="icon-wrap text-primary">
                                                    <b>5</b>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="mt-2 mb-2">Online</h5>
                                            <div class="d-flex mt-2">
                                                <div class="icon-wrap text-primary">
                                                    <b>4</b>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="mt-2 mb-2">Offline</h5>
                                            <div class="d-flex mt-2">
                                                <div class="icon-wrap text-danger">
                                                    <b>1</b>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="mt-2 mb-2">Active</h5>
                                            <div class="d-flex mt-2">
                                                <div class="icon-wrap text-success">
                                                    <b>2</b>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="mt-2 mb-2">On-Call</h5>
                                            <div class="d-flex mt-2">
                                                <div class="icon-wrap text-warning">
                                                    <b>1</b>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <center>
                                            <h5 class="mt-2 mb-2">Break</h5>
                                            <div class="d-flex mt-2">
                                                <div class="icon-wrap text-danger">
                                                    <b>1</b>
                                                </div>
                                            </div>
                                        </center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body" style="  overflow: auto !important;">
                                        <h4 class="card-title text-success">Active Agents</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead style="font-weight: bold !important;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>
                                                            Profile
                                                        </th>
                                                        <th>
                                                            Agent
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/4789/4789117.png" alt="image">
                                                        </td>
                                                        <td>
                                                            Mrs. Elena
                                                        </td>


                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn4.vectorstock.com/i/1000x1000/89/38/call-center-agent-service-icon-vector-13298938.jpg" alt="image">
                                                        </td>
                                                        <td>
                                                            Hassan Imam
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-warning">Agents On Break</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead style="font-weight: bold !important;">
                                                    <tr>
                                                        <th>#</th>
                                                        <th>
                                                            Profile
                                                        </th>
                                                        <th>
                                                            Agent
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>4</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn4.vectorstock.com/i/1000x1000/89/38/call-center-agent-service-icon-vector-13298938.jpg" alt="image">
                                                        </td>
                                                        <td class="text-danger">
                                                            Hassan Imam
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12  ">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title text-primary">Rewards Table</h4>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>
                                                            User
                                                        </th>
                                                        <th>
                                                            Agent
                                                        </th>

                                                        <th>
                                                            Points
                                                        </th>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn4.vectorstock.com/i/1000x1000/89/38/call-center-agent-service-icon-vector-13298938.jpg" alt="image">
                                                        </td>
                                                        <td>
                                                            Hassan Imam
                                                        </td>
                                                        <td>
                                                            70
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn4.vectorstock.com/i/1000x1000/89/38/call-center-agent-service-icon-vector-13298938.jpg" alt="image">
                                                        </td>
                                                        <td>
                                                            Hassan Imam
                                                        </td>
                                                        <td>
                                                            65
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn-icons-png.flaticon.com/512/4789/4789117.png" alt="image">
                                                        </td>
                                                        <td>
                                                            Hassan Imam
                                                        </td>
                                                        <td>
                                                            65
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn4.vectorstock.com/i/1000x1000/89/38/call-center-agent-service-icon-vector-13298938.jpg" alt="image">
                                                        </td>
                                                        <td>
                                                            Hassan Imam
                                                        </td>
                                                        <td>
                                                            60
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td class="py-1">
                                                            <img src="https://cdn4.vectorstock.com/i/1000x1000/89/38/call-center-agent-service-icon-vector-13298938.jpg" alt="image">
                                                        </td>
                                                        <td>
                                                            Hassan Imam
                                                        </td>
                                                        <td>
                                                            60
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- content-wrapper ends -->
                </div>
                <!-- main-panel ends -->
            </div>
        </div>
        <!-- COL-MD-3 ends -->
        <!-- COL-MD-9 starts -->
        <div class="col-md-9">
            <!-- page-body-wrapper starts -->
            <div class="container-fluid page-body-wrapper">
                <!-- main-panel starts -->
                <div class="main-panel">
                    <!-- content-wrapper starts -->
                    <div class="content-wrapper">


                        <div class="row mb-2  ml-2">
                            <h2>DASHBOARD</h2>
                        </div>

                        <div class="row ml-2 ">
                            <h3>CHANNELS</h3>
                        </div>

                        <!-- CHANNELS CARD ROW STARTS -->
                        <div class="row mt-1 mb-1">
                            <!-- Facebook -->
                            <div class="col-md-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body channels">
                                        <a href="social-media-facebook">
                                            <img src="{{asset('images/facebook.png')}}" alt="Facebook" srcset="">
                                            <p>
                                                <h4 class="ml-2">Facebook</h4>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Instagram -->
                            <div class="col-md-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body channels">
                                        <a href="social-media-instagram">
                                            <img src="{{asset('images/instagram.png')}}" alt="Instagram" srcset="">
                                            <p>
                                                <h4 class="ml-2">Instagram</h4>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- WhatsApp -->
                            <div class="col-md-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body channels">
                                        <a href="social-media-whatsapp">
                                            <img src="{{asset('images/whatsapp.png')}}" alt="WhatsApp" srcset="">
                                            <p>
                                                <h4 class="ml-2">WhatsApp</h4>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Calls -->
                            <div class="col-md-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body channels">
                                        <a href="call-center-call">
                                            <img src="{{asset('images/call.png')}}" alt="Calls" srcset="">
                                            <p>
                                                <h4 class="ml-2">Calls</h4>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body channels">
                                        <a href="marketing-campaign-email">
                                            <img src="{{asset('images/outlook.png')}}" alt="Email" srcset="">
                                            <p>
                                                <h4 class="ml-2">Email</h4>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- Webform -->
                            <div class="col-md-2 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body channels">
                                        <a href="web-forms-management" class="disabled">
                                            <img src="{{asset('images/webform.png')}}" alt="Webform" srcset="">
                                            <p>
                                                <h4 class="ml-2">Webform</h4>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CHANNELS CARD ROW ENDS -->

                        <div class="row ml-2 ">
                            <h3>TODAY</h3>
                        </div>

                        <!-- TODAY CARD ROW STARTS -->
                        <div class="row">
                            <!-- Follow-Up Calls -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Follow-Up Calls</h5>
                                        <div class="d-flex mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-phone text-primary"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-primary">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Follow-Up Calls -->

                            <!-- Completed Calls -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Completed Calls</h5>
                                        <div class="d-flex  mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-check text-success"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-success">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Completed Calls -->

                            <!-- Calls on Queue -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Calls on Queue</h5>
                                        <div class="d-flex mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-mobile-screen-button text-warning"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-warning">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Calls on Queue -->

                            <!-- Customers Feedback -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Customers Feedback</h5>
                                        <div class="d-flex mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-message text-warning"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-warning">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Customers Feedback -->
                        </div>
                        <!-- TODAY CARD ROW ENDS -->

                        <div class="row ml-2 ">
                            <h3>INBOUND & OUTBOUND CALLS</h3>
                        </div>

                        <!-- INBOUND & OUTBOUND CALLS ROW STARTS -->
                        <div class="row">
                            <!-- TODAY'S INBOUND -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Today's Inbound</h5>
                                        <div class="d-flex mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-arrow-down text-primary"></i>
                                                <i class="fa fa-arrow-down text-primary"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-primary">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Weekly Inbound -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Weekly Inbound</h5>
                                        <div class="d-flex  mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-arrow-down text-primary"></i>
                                                <i class="fa fa-arrow-down text-primary"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-primary">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- TODAY'S OUTBOUND -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Today's Outbound</h5>
                                        <div class="d-flex mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-arrow-up text-warning"></i>
                                                <i class="fa fa-arrow-up text-warning"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-warning">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Weekly Outbound -->
                            <div class="col-md-3 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h5>Weekly Outbound</h5>
                                        <div class="d-flex  mt-3">
                                            <div class="icon-wrap">
                                                <i class="fa fa-arrow-up text-warning"></i>
                                                <i class="fa fa-arrow-up text-warning"></i>
                                            </div>
                                            <div class="mt-2 ml-4">
                                                <p class="font-weight-bold">
                                                <h1 class="text-warning">25</h1>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- INBOUND & OUTBOUND CALLS ROW ENDS -->

                        <div class="row ml-2">
                            <h3>TODAY'S FOLLOW-UP</h3>
                        </div>

                        <div class="row">
                            <div class="col-md-12 grid-margin">
                                <div class="card">

                                    <!-- <h6>Current Date Time (PST)</h6>
                                        <h6 id="ct7"></h6> -->

                                    <div class=" mt-2 table-sorter-wrapper col-md-12 table-responsive">
                                        <table class="data-table-search table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">#</th>
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
                                                    <td>1</td>
                                                    <td>Ammar</td>
                                                    <td>Ammar@gmail.com</td>
                                                    <td>03021260860</td>
                                                    <td>03:00PM</td>
                                                    <td>Hasan Imam</td>
                                                    <td>
                                                        <a href="http://sodabaz.com/MasterMotor/public/customers" data-placement="top" title="View more details" class="badge bg-primary text-white float-left">
                                                            <i class="fa fa-info-circle"></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
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
                                                    <td>3</td>
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
                                                    <td>4</td>
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
                                                    <td>5</td>
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
                    <!-- content-wrapper ends -->
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
        <!-- COL-MD-9 ends -->
        <!-- partial ends-->

        <!-- FOOTER STARTS -->
        <footer class="footer fixed-bottom shadow p-3 bg-white rounded">
            <div class="row">
                <div class="col-md-4 w-100 clearfix">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2022
                        <a href="http://sodabaz.com/MasterMotor/public/" target="_blank">CHANGAN AUTO</a>. All rights
                        reserved.</span>
                </div>

                <div class="col-md-4 text-center" id="ct7"></div>
                <div class="col-md-4">
                    <span class="text-muted float-none float-sm-right d-block mt-1 mt-sm-0 text-center">
                        DEVELOPED BY <a href="https://www.qbsco.net/" class=" title='Tooltip on top'">QBS</a>
                    </span>
                </div>
            </div>

        </footer>
        <!-- FOOTER ENDS -->
    </div>
    <!-- container-scroller -->

    <!-- plugins:js -->
    <script src="../../vendors/js/vendor.bundle.base.js"></script>
    <script src="../../vendors/js/vendor.bundle.addons.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="../../js/off-canvas.js"></script>
    <script src="../../js/hoverable-collapse.js"></script>
    <script src="../../js/template.js"></script>
    <script src="../../js/settings.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="../../js/dashboard.js"></script>
    <script src="../../js/todolist.js"></script>
    <!-- End custom js for this page-->

    <script>
        function display_ct7() {
            var x = new Date()
            var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
            hours = x.getHours() % 12;
            hours = hours ? hours : 12;
            hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

            var minutes = x.getMinutes().toString()
            minutes = minutes.length == 1 ? 0 + minutes : minutes;

            var seconds = x.getSeconds().toString()
            seconds = seconds.length == 1 ? 0 + seconds : seconds;

            var month = (x.getMonth() + 1).toString();
            month = month.length == 1 ? 0 + month : month;

            var dt = x.getDate().toString();
            dt = dt.length == 1 ? 0 + dt : dt;

            var x1 = month + "/" + dt + "/" + x.getFullYear();
            x1 = x1 + " - " + hours + ":" + minutes + ":" + seconds + " " + ampm;
            document.getElementById('ct7').innerHTML = x1;
            display_c7();
        }

        function display_c7() {
            var refresh = 1000; // Refresh rate in milli seconds
            mytime = setTimeout('display_ct7()', refresh)
        }
        display_c7()
    </script>
</body>

</html> <!-- plugins:js -->
<script src="https://www.bootstrapdash.com/demo/steelui/template/vendors/js/vendor.bundle.base.js"></script>
<script src="https://www.bootstrapdash.com/demo/steelui/template/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<script src="https://www.bootstrapdash.com/demo/steelui/template/js/off-canvas.js"></script>
<script src="https://www.bootstrapdash.com/demo/steelui/template/js/hoverable-collapse.js"></script>
<script src="https://www.bootstrapdash.com/demo/steelui/template/js/template.js"></script>
<script src="https://www.bootstrapdash.com/demo/steelui/template/js/settings.js"></script>
<script src="https://www.bootstrapdash.com/demo/steelui/template/js/todolist.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{asset('assets/js/steel-dashboard.js')}}"></script>
<script src="https://www.bootstrapdash.com/demo/steelui/template/js/todolist.js"></script>
<!-- <script src="https://www.bootstrapdash.com/demo/steelui/template/js/data-table.js"></script> -->
<!-- End custom js for this page-->
</body>


<!-- DATA TABLE SCRIPT -->
<script>
    (function($) {
        'use strict';
        $(function() {
            $('.data-table-search').DataTable({
                "aLengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],

                "language": {
                    search: ""
                }
            });
            $('.data-table-search').each(function() {
                var datatable = $(this);
                // SEARCH - Add the placeholder for Search and Turn this into in-line form control
                var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
                search_input.attr('placeholder', 'Search');
                search_input.removeClass('form-control-sm');
                // LENGTH - Inline-Form control
                var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
                length_sel.removeClass('form-control-sm');
            });
        });
    })(jQuery);
</script>

</html>
