@extends('template')

@section('content')
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

    .ui-state-active a, .ui-state-active a:link
    {
        color:black !important;
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

<div class="main-content mt-2">
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
 
         
      <div class="card">
        <div class="card-header">
            <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>

          <strong class="card-title">Customer Details</strong>



          <a href="{{ url('vehicles-list/'.$id) }}" class="btn btn-round btn-primary text-white" style="float: right;margin-right: 2%;">
            Registered Vehicle <i class="fa fa-car"></i>
         </a>

        <!--<a href="{{ url('create-inquiry/'.$id) }}" class="btn btn-primary" style="float: right; margin-right: 2%;">-->
        <!--    Create Inquiry <i class="fa fa-plus-circle"></i>-->
        <!--</a>-->

        <!--<a href="{{ url('create-complain/'.$id) }}" class="btn btn-primary" style="float: right; margin-right: 2%;">-->
        <!--    Create Complain <i class="fa fa-plus-circle"></i>-->
        <!--</a>-->


    </div>
        <div class="card-body embed-responsive" style="overflow: auto">
            <div class="card-body">

              <div class="row">
              <div class="col-md-2">
                <p class="mb-0"><b>Customer Type</b></p>
              </div>
              <div class="col-md-3">
                <p class=" mb-0 badge badge-info shadow-sm text-white">{{ $data[0]->customer_type }}</p>
              </div>
              
              
            </div>
            <hr>
    
            <div class="row">
                <div class="col-md-2">
                <p class="mb-0"><b>Customer Name</b></p>
              </div>
              <div class="col-md-3">
                <p class="mb-0">{{ $data[0]->name }}</p>
              </div>
              
              <div class="col-md-2">
                <p class="mb-0"><b>Email</b></p>
              </div>
              <div class="col-md-3">
                <p class=" mb-0">{{ $data[0]->email }}</p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-2">
                <p class="mb-0"><b>Mobile no</b></p>
              </div>
              <div class="col-sm-3">
                <p class="mb-0">{{ $data[0]->mobile }}</p>
              </div>
              
               <div class="col-sm-2">
                <p class="mb-0"><b>CNIC No</b></p>
              </div>
              <div class="col-sm-3">
                <p class="mb-0">{{ $data[0]->cnic }}</p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-2">
                <p class="mb-0"><b>Source</b></p>
              </div>
              <div class="col-sm-3">
                <p class="mb-0">{{ $data[0]->channel }}</p>
              </div>
              
              <div class="col-sm-2">
                <p class="mb-0"><b>City</b></p>
              </div>
              <div class="col-sm-3">
                <p class="mb-0">{{ $data[0]->city_name }}</p>
              </div>
            </div>
            <hr>
            
            <div class="row">
              <div class="col-sm-2">
                <p class="mb-0"><b>Address</b></p>
              </div>
              <div class="col-sm-9">
                <p class="mb-0">{{ $data[0]->address }}</p>
              </div>
            </div>
              
             </div>
        </div>
      </div>
    </div>
  </div>


    <!--Tickets Content-->
 

                <div class="card">
                        <div class="card-header">
                         
                     <strong class="card-title">Customer Tickets</strong>

                     <a href="{{ url('create-customer-inquiry/'.$id) }}" class="btn btn-round btn-primary" style="float:right;">
                            Create Inquiry / Complain <i class="fa fa-plus-circle"></i>
                        </a>
                        </div>

                <div class="row" id="tabs" style="background-color: #eee !important; border:1px solid #eee;">
                    
                        <div class="col-md-12">
                           <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
                            <li><a data-toggle="tab" href="#menu1">Inquiries</a></li>
                            <li><a data-toggle="tab" href="#menu2">Complains</a></li>
                            <li><a data-toggle="tab" href="#menu3">Feedback</a></li>
                          </ul>
                        </div>
                        
                        <div class="col-md-12 tab-content">
                            
                        <div id="home" class="">
                             <!-- Inquiry table -->
                             <h4>Customer inquiries</h4>
                            <table class="table table-striped table-bordered">
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
                                                @php
                                                    $n = 1;
                                                @endphp
                                                @foreach ($inquiry as $item)
                                                
                                                <tr>
                                                    <td>{{$n}}</td>
                                                    <td>{{ $item->cname }}</td>
                                                    <td>{{ $item->mobile }}</td>
                                                    <td>{{ $item->inquiry_number }}</td>
                                                    <td>{{ $item->inquiry_type }}</td>
                                                    <td>{{ $item->inquiry_details }}</td>
                                                    <td>{{ $item->dealer_name }}</td>
                                                    <?php $start_date=date_create($item->start_date); ?>
                                                    <?php $end_date=date_create($item->end_date); ?>
                                                    <td>{{ date_format($start_date, "d/m/Y") }}</td>
                                                    <td>{{ date_format($end_date, "d/m/Y") }}</td>
                                                    <td>
                                                        <a href="#" data-placement="top" title="Send inquiry to DMS" class="badge bg-success text-white"><i class="fa fa-long-arrow-right"></i></a>
                                                        
                                                        <a href="javascript:;" onclick="getid({{ $item->id }})" data-toggle="modal" data-target="#viewInquiry" data-placement="top" title="View more details" class="badge bg-primary  text-white">
                                                            
                                                        <i class="fa fa-info-circle"></i></a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $n++;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                            <br>
                            
                            <!-- Complains table -->
                             <h4>Customer complains</h4>
                             <table class="table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Complain number</th>
                                                    <th>Complain CPT type</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $n = 1;
                                                @endphp
                                                @foreach ($complaint as $row)
                                                <?php $date = strtotime($row->created_at) ?>
                                                <tr>
                                                    <td>{{ $n }}</td>
                                                    <td>{{ $row->complain_number }}</td>
                                                    <td>{{ $row->complain_type }}</td>
                                                    <td>{{ $row->customer_name }}</td>
                                                    <td>{{ $row->mobile }}</td>
                                                    <td>{{date('d/m/Y h:i:s A', $date)}}</td>
                                                    
                                                    @if( $row->status == 'Pending')
                                                        <td><span class="badge bg-danger shadow-sm text-white">{{ $row->status }}</span></td>
                                                    @else
                                                        <td><span class="badge bg-success shadow-sm text-white">{{ $row->status }}</span></td>
                                                    @endif
                                                    
                                                    <td  style='text-align: center;'>
                                                        <a href="{{ url('complain-details/'.$row->id) }}" target="blank" class="btn btn-primary btn-round text-white">
                                                            Add followup
                                                        </a>
                                                    </td>
                                                </tr>
                                                
                                                     @php
                                                    $n++;
                                                    @endphp
                                                @endforeach

                                            </tbody>
                                        </table>
                        </div>
                        
                        <div id="menu1" class="tab-pane fade">
                          <table class="table table-striped table-bordered">
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
                                                @php
                                                    $n = 1;
                                                @endphp
                                                @foreach ($inquiry as $item)
                                                
                                                <tr>
                                                    <td>{{$n}}</td>
                                                    <td>{{ $item->cname }}</td>
                                                    <td>{{ $item->mobile }}</td>
                                                    <td>{{ $item->inquiry_number }}</td>
                                                    <td>{{ $item->inquiry_type }}</td>
                                                    <td>{{ $item->inquiry_details }}</td>
                                                    <td>{{ $item->dealer_name }}</td>
                                                    <?php $start_date=date_create($item->start_date); ?>
                                                    <?php $end_date=date_create($item->end_date); ?>
                                                    <td>{{ date_format($start_date, "d/m/Y") }}</td>
                                                    <td>{{ date_format($end_date, "d/m/Y") }}</td>
                                                    <td>
                                                        <a href="#" data-placement="top" title="Send inquiry to DMS" class="badge bg-success text-white"><i class="fa fa-long-arrow-right"></i></a>
                                                        
                                                        <a href="javascript:;" onclick="getid({{ $item->id }})" data-toggle="modal" data-target="#viewInquiry" data-placement="top" title="View more details" class="badge bg-primary  text-white">
                                                            
                                                        <i class="fa fa-info-circle"></i></a>
                                                    </td>
                                                </tr>
                                                @php
                                                    $n++;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                        </div>
                        
                        <div id="menu2" class="tab-pane fade">
                         <h4>Customer complains</h4>
                             <table class="table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Complain number</th>
                                                    <th>Complain CPT type</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile No</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                $n = 1;
                                                @endphp
                                                @foreach ($complaint as $row)
                                                <?php $date = strtotime($row->created_at) ?>
                                                <tr>
                                                    <td>{{ $n }}</td>
                                                    <td>{{ $row->complain_number }}</td>
                                                    <td>{{ $row->complain_type }}</td>
                                                    <td>{{ $row->customer_name }}</td>
                                                    <td>{{ $row->mobile }}</td>
                                                    <td>{{date('d/m/Y h:i:s A', $date)}}</td>
                                                    
                                                    @if( $row->status == 'Pending')
                                                        <td><span class="badge bg-danger shadow-sm text-white">{{ $row->status }}</span></td>
                                                    @else
                                                        <td><span class="badge bg-success shadow-sm text-white">{{ $row->status }}</span></td>
                                                    @endif
                                                    
                                                    <td  style='text-align: center;'>
                                                        <a href="{{ url('complain-details/'.$row->id) }}" target="blank" class="btn btn-primary btn-round text-white">
                                                            Add followup
                                                        </a>
                                                    </td>
                                                </tr>
                                                
                                                     @php
                                                    $n++;
                                                    @endphp
                                                @endforeach

                                            </tbody>
                                        </table>
                        </div>
                        
                        <div id="menu3" class="tab-pane fade">
                          <table class="table table-bordered" style="margin-left: 5px !important;margin-right: 5px !important;">

                            <thead>
                                 <tr>                                            
                                    <th>Feedback</th>
                                    <th>date</th>
                                </tr>
                            </thead>

                             <tbody id="callLogTB">
                                <tr class="callLogTBrow" style="border-bottom: 10px solid  white !important;">
                                    <td class="col-md-3">
                                       <span>&nbsp;Any feedback</span>
                                    </td>
                                    <td class="col-md-3">
                                        <span>&nbsp;01/01/2022</span>
                                    </td>
                                 
                                    <td class="col-md-3 ">
                                        <span>&nbsp; <a href="#"><button class="btn btn-primary btn-round">View</button></a>
                                        </span>
                                    </td>
                                </tr>
                       
                             </tbody>


                        </table>
                        </div>
                        
                      </div>
                        

                </div>


                <!-- table ends -->

            </div>
        </div>
    </div>
  </section>
</div>


<!-- .content -->


@endsection
