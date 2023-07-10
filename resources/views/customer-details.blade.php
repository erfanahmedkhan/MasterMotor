@extends('template')

@section('content')



  <style>

    .ui-state-active a, .ui-state-active a:link
    {
        color:black !important;
    }
            input {
            text-align: center;
        }
        
        .form-control {
    font-size: 12px;
}


 .status {
            color: #28a745 !important;
        }

        .viewbutton {
            width: 8vw !important;
            border-radius: 25px !important;
            padding: 4px !important;
            background-color: red !important;
            color: white !important;
        }

        .dropdown-menu.show {
            display: block;
            margin-top: 39px;
            margin-right: 20px;
            margin-left: -104px;
        }

       .dropdown-item:hover
       {
           background-color: black;
       }
    </style>

<div class="main-content mt-3">
    <section class="section">
        <div class="section-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if (session('msg'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('msg') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ session('error') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                             <form action="{{ url('editcustomer/'.$data[0]->id) }}" method="POST">
                                @csrf
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                            style="cursor: pointer; font-size: 20px"></i>
                                        <strong class="card-title">Customer Details</strong>
                                        
                                        <a href="{{ url('create-customer-inquiry/' . $id) }}"
                                            class="btn btn-round btn-primary text-white" style="float:right;">
                                            New Ticket&nbsp;<i class="fa fa-plus-circle"></i>
                                        </a>
                                        <!--<a href="{{ url('vehicles-list/' . $id) }}"-->
                                        <!--    class="btn btn-round btn-primary text-white"-->
                                        <!--    style="float: right;margin-right:1%;">-->
                                        <!--    Registered Vehicle <i class="fa fa-car"></i>-->
                                        <!--</a>-->
                                    </div>

                                    <div class="card-body embed-responsive" style="overflow: auto">

                                        <div class="card-body">
                                             <form action="{{ url('editcustomer/'.$data[0]->id) }}" method="POST">
                                                @csrf

                                                <div class="row style='  text-align: center !important;'">
                                                    <input type="hidden" name="id" id="id">
                                                     <div class="col-md-3">
                                                        <label class="form-label">Customer ID</label>
                                                        <input type="text" value="{{ $data[0]->id }}"
                                                            class="form-control shadow-sm bg-white rounded" readonly>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Customer Name</label>
                                                        <input type="text" value="{{ $data[0]->name }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                   
                                                    <div class="col-md-3">
                                                        <label class="form-label">Customer Type</label>
                                                        <input type="text" value="{{ $data[0]->customer_type }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Mobile Number</label>
                                                        <input type="text" value="{{ $data[0]->mobile }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">CNIC NO</label>
                                                        <input type="text" value="{{ $data[0]->cnic }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Email Address</label>
                                                        <input type="text" value="{{ $data[0]->email }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">City</label>
                                                        <input type="text" value="{{ $data[0]->city_name }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Address</label>
                                                        <input type="text" value="{{ $data[0]->address }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-3">
                                                        <label class="form-label">Source</label>
                                                        <input type="text" value="{{ $data[0]->channel }}"
                                                            class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                </div>
                                                <div class="row style='  text-align: center !important;'">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Facebook URL</label>
                                                        <input type="text"  value="{{ $data[0]->fb_url }}" 
                                                        class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Instagram URL</label>
                                                        <input type="text"  value="{{ $data[0]->insta_url }}" 
                                                        class="form-control shadow-sm bg-white rounded">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" onclick="goback()">Close</button>
                                                    <button type="submit" class="btn btn-warning">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
