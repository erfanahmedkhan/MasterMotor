@extends('template')

@section('content')

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
                        <form action="{{ url('update-complaint-status/'.$rows[0]->id) }}" method="POST">
                           
                            @csrf
                        <div class="card">
                            <div class="card-header">

                                <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()" style="cursor: pointer; font-size: 20px"></i>

                                <strong class="card-title">Complaint Management</strong>

                            </div>
                            <div class="card-body embed-responsive" style="overflow: auto">
                                <div class="card-body">
                                    
                                     <div class="row">
                                      <div class="col-md-2">
                                        <p class="mb-0"><b>Customer VOC</b></p>
                                      </div>
                                      <div class="col-md-3">
                                        <p class=" mb-0 badge badge-info shadow-sm text-white">{{ $rows[0]->voc }}</p>
                                      </div>
                                      
                                    </div>
                                    <hr>
                            
                                    <div class="row">
                                        <div class="col-md-3">
                                        <p class="mb-0"><b>Customer Name</b></p>
                                      </div>
                                      <div class="col-md-3">
                                        <p class="mb-0">{{ $rows[0]->customer_name }}</p>
                                      </div>
                                      
                                      <div class="col-md-3">
                                        <p class="mb-0"><b>Customer Vehicle</b></p>
                                      </div>
                                      <div class="col-md-3">
                                        <p class=" mb-0">{{ $rows[0]->customer_vehicle }}</p>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Complain Created by</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->username }}</p>
                                      </div>
                                      
                                       <div class="col-sm-3">
                                        <p class="mb-0"><b>Complain Date</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->created_at }}</p>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                        <div class="col-md-3">
                                        <p class="mb-0"><b>Complain Dealership</b></p>
                                      </div>
                                      <div class="col-md-3">
                                        <p class="mb-0">{{ $rows[0]->dealer_name }}</p>
                                      </div>
                                      
                                     <div class="col-sm-3">
                                        <p class="mb-0"><b>Complaint Type CPT</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->complain_type }}</p>
                                      </div>
                                     </div> 
                                    <hr>
                                    
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Complaint Type SPG</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->complain_spg_type }}</p>
                                      </div>
                                      
                                      
                                       <div class="col-md-3">
                                        <p class="mb-0"><b>Complaint Type CCC</b></p>
                                      </div>
                                      <div class="col-md-3">
                                        <p class=" mb-0">{{ $rows[0]->complain_ccc_type }}</p>
                                      </div>
                                    </div>
                                   
                                    <hr>
                                    
                                    
                                    
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>PBO</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->pbo }}</p>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Chasis Number</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->chasis_number }}</p>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Engine number</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->engine_number }}</p>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Registration Number</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->registration_number }}</p>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Invoice number</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->invoice_number }}</p>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Sales order Number</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->sales_order_number }}</p>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Milage</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->milage }}</p>
                                      </div>
                                      
                                      <div class="col-sm-3">
                                        <p class="mb-0"><b>Agent Notes</b></p>
                                      </div>
                                      <div class="col-sm-3">
                                        <p class="mb-0">{{ $rows[0]->notes }}</p>
                                      </div>
                                    </div>
                                    <hr>
                                    
                                    <div class="row">
                                      <div class="col-sm-2">
                                        <p class="mb-0"><b> Status</b></p>
                                      </div>
                                      <div class="col-sm-4">
                                        <p class="mb-0">
                                            @if($rows[0]->status == 'Pending')
                                            
                                            <select class="form-control" name="complaint_status" id="complaint_status" onchange="this.form.submit()">
                                                <option value="{{ $rows[0]->status }}">{{ $rows[0]->status }}</option>
                                                <option value="Pending">Pending</option>
                                                <option value="Resolve">Resolve</option>
                                            </select>
                                            
                                            @else
                                            <p class=" mb-0 badge badge-success shadow-sm text-white">{{ $rows[0]->status }}</p>
                                            @endif
                                            
                                        </p>
                                      </div>
                                      
                                    </div>
                                

                                </div>
                            </div>
                        </div>
                      
                        </form>
                        <!-- form ends -->


                    </div>
                </div>
            </div>

        </div>
        <!-- ADD FOLLOW UP MODAL STARTS -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <!-- Complaint Follow Up Table Starts -->
                                    <div class="card-header">
                                        <button type="button" class="btn btn-round btn-primary" data-toggle="modal" data-target="#AddFollowUp" style="float: right;">
                                            Add Follow Up &nbsp;<i class="fa fa-plus-circle"></i>
                                        </button>
                                        <h6><strong>Complaint Follow Up</strong></h6>
                                    </div>
                                    
                           <div class="card-body embed-responsive" style="overflow: auto">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="example table table-striped table-bordered">
                                            <thead class="bg bg-primary text-white">
                                                <tr>
                                                    <th>#</th>
                                                    <th class="searchignfilter">Date</th>
                                                    <th>Source</th>
                                                    <th>Engage Time</th>
                                                    <th>Agent</th>
                                                    <th>Complaint Status</th>
                                                    <th>Notes</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $n = 1;
                                                @endphp
                                                @foreach ($followup as $item)
                                                <tr>
                                                    <td>{{ $n }}</td>
                                                    <td>{{ $item->date }}</td>
                                                    <td>{{ $item->source }}</td>
                                                    <td>{{ $item->engage_time }}</td>
                                                    <td>{{ $item->agent }}</td>
                                                    <td>{{ $item->complaint_status }}</td>
                                                    <td>{{ $item->notes }}</td>
                                                    <td><a href="javascript:;" onclick="getdata({{ $item->id }})" id="editbtn" class="badge bg-warning text-white shadow-sm" data-toggle="modal" data-target="#EditModal" data-placement="top" title="Edit Record" ><i class="fa fa-edit"></i></a></td>
                                                </tr>
                                                
                                                @php
                                                    $n++;
                                                @endphp
                                                
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- Complaint Follow Up Table Ends -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- ADD FOLLOW UP MODAL ENDS -->
    </section>
</div>





<!-- Add Modal -->

<div class=" modal fade bd-example-modal-xl" id="AddFollowUp" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('add-follow-up') }}" method="POST">
            <input type="hidden" name="id" value="{{ $id }}">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5>Add Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                    <div class="row">

                        <div class="col-md-4">
                            <label for="date" class="form-label">Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control shadow-sm bg-white rounded" required id="date" name="date">
                        </div>


                        <div class="col-md-4">
                            <label for="channel" class="form-label">Source <i class="text-danger">*</i></label>
                            <select class="form-control bg-white shadow-sm  bg-white" name="source" required id="channel">
                                <option value="">Select Channel</option>
                                <option value="Call">Call</option>
                                <option value="SMS">SMS</option>
                                <option value="Email">Email</option>
                                <option value="WhatsApp">WhatsApp</option>
                                <option value="Facebook">Facebook</option>
                                <option value="Instagram">Instagram</option>
                                <option value="Web Form">Web Form</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="engage_time" class="form-label">Engage Time <i class="text-danger">*</i></label>
                            <input type="text" class="form-control shadow-sm bg-white rounded" id="engage_time" required name="engage_time" placeholder="Engage Time">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="agent" class="form-label">Agent Name</label>
                            <input type="text" class="form-control shadow-sm bg-white rounded" id="agent" readonly name="agent" value="{{ session()->get('isLogin')[0]['name'] }}" required placeholder="Agent Name">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="complain_status" class="form-label">Complain Status <i class="text-danger">*</i></label>
                            <select class="form-control bg-white shadow-sm bg-white" name="complaint_status" required id="complain_status">
                                <option value="">Complain Status</option>
                                <option value="Pending">Pending</option>
                                <option value="Resolve">Resolve</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="notes" class="form-label">Agent Notes</label>
                            <textarea class="form-control shadow-sm bg-white rounded" id="notes" name="notes" placeholder="Agent Notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-9"></div>
                        <div class="col-md-3">
                        <button type="submit" class="btn btn-round btn-primary" style="width: 100%;">Save</button>
                    </div>

            </div>
        </div>
        </form>
    </div>
</div>
</div>

<!--Edit popup-->

<div class="modal fade bd-example-modal-xl" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ url('editfollowuprecord') }}" method="POST">
            @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5>Edit Follow Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">


                    <div class="row">
                        <input type="hidden" id="edit_id" name="edit_id">

                        <div class="col-md-4">
                            <label for="date" class="form-label">Date <i class="text-danger">*</i></label>
                            <input type="date" class="form-control shadow-sm bg-white rounded" required id="edit_date" name="date">
                        </div>


                        <div class="col-md-4">
                            <label for="channel" class="form-label">Source <i class="text-danger">*</i></label>
                            <select class="form-control bg-white shadow-sm  bg-white" name="source" required id="edit_channel">
                                
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="engage_time" class="form-label">Engage Time <i class="text-danger">*</i></label>
                            <input type="text" class="form-control shadow-sm bg-white rounded" id="edit_engage_time" required name="edit_engage_time" placeholder="Engage Time">
                        </div>
                        <div class="col-md-4 mt-2">
                            <label for="agent" class="form-label">Record Created By</label>
                            <input type="text" class="form-control shadow-sm bg-white rounded" id="edit_agent_name" readonly name="agent" value="{{ session()->get('isLogin')[0]['name'] }}" required placeholder="Agent Name">
                        </div>

                        <div class="col-md-4 mt-2">
                            <label for="complain_status" class="form-label">Complain Status <i class="text-danger">*</i></label>
                            <select class="form-control bg-white shadow-sm bg-white" name="complaint_status" required id="edit_complain_status">
                                
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label for="notes" class="form-label">Agent Notes</label>
                            <textarea class="form-control shadow-sm bg-white rounded" id="edit_notes" name="notes" placeholder="Agent Notes"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-round btn-primary" data-dismiss="modal">Cancel</button>
                       <button type="submit" class="btn btn-round btn-primary">Save</button>
                    </div>
        </div>
        </form>
    </div>
</div>
</div>

<script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<script>

    function getdata(Id){
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type:'POST',
        url:"{{ route('editfollowup.post') }}",
        data:{Id:Id},
        dataType: "json",
        success:function(RecordSet) {
            console.log(RecordSet);
            $("#edit_date").val(RecordSet.ReturnData[0].date);
            $("#edit_channel").append('<option value="'+ RecordSet.ReturnData[0].source +'">'+ RecordSet.ReturnData[0].source +'</option>');
            $("#edit_complain_status").append('<option value="'+ RecordSet.ReturnData[0].complaint_status +'">'+ RecordSet.ReturnData[0].complaint_status +'</option>');
            $("#edit_engage_time").val(RecordSet.ReturnData[0].engage_time);
            $("#edit_agent_name").val(RecordSet.ReturnData[0].agent);
            $("#edit_notes").val(RecordSet.ReturnData[0].notes);
            $("#edit_id").val(RecordSet.ReturnData[0].id);
        }
        
    });
}

function editfollowup()
{
    var id = $("#edit_id").val();
    var date = $("#edit_date").val();
    var source = $("#edit_channel").val();
    var engage_time = $("#edit_engage_time").val();
    var agent = $("#edit_agent_name").val();
    var complain_status = $("#edit_complain_status").val();
    var notes = $("#edit_notes").val();
    
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    $.ajax({
        type:'POST',
        url:"{{ route('editfollowuprecord.post') }}",
        data:{
            id:id,
            date:date,
            source:source,
            engage_time:engage_time,
            agent:agent,
            complain_status:complain_status,
            notes:notes
        },
        success:function(response) {
            alert(response);
        }
        
    });
}

</script>

@endsection
