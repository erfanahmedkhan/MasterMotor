@extends('template')
@section('title', 'CRM Logs')

<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<script>
    function getid(Id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: 'POST',
            url: "{{ route('viewcrmlogsdetails.post') }}",
            data: {
                Id: Id
            },
            dataType: "json",
            success: function(RecordSet) {
                $("#action").val(RecordSet.ReturnData[0].action);
                $("#action_time").val(RecordSet.ReturnData[0].action_time);
                $("#old_value").val(RecordSet.ReturnData[0].old_value);
                $("#new_value").val(RecordSet.ReturnData[0].new_value);
                $("#agent").val(RecordSet.ReturnData[0].agentname);
                $("#LogLabel").text(RecordSet.ReturnData[0].agentname);
            }
        });
    }
</script>

@section('content')
    <!-- main-content STARTS -->
    <div class="main-content mt-2">
        <!-- section STARTS -->
        <section class="section">
            <!-- section-body STARTS -->
            <div class="section-body">
                <!-- container STARTS -->
                <div class="container-fluid">
                    <!-- container ROW STARTS -->
                    <div class="row">
                        <div class="col-md-12">
                            <!-- CARD STARTS -->
                            <div class="card">
                                <!-- card-header STARTS -->
                                <div class="card-header">
                                    <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                        style="cursor: pointer; font-size: 20px"></i>
                                    <strong class="card-title">CRM Logs</strong>
                                </div>

                                <!-- card-body STARTS -->
                                <div class="card-body embed-responsive" style="overflow: auto">
                                    <div class="row">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3">
                                            <button class="btn btn-primary btn-round float-right mb-2"
                                                data-toggle="collapse" data-target="#searchfilters" aria-hidden="false"
                                                aria-controls="searchfilters">
                                                <b>Filters</b>&nbsp;&nbsp;<i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <!-- ROW STARTS -->

                                    <div class="row">
                                        <div class="col-md-12">

                                            @if (session('msg'))
                                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                    <strong>{{ session('msg') }}</strong>
                                                    <button type="button" class="close" data-dismiss="alert"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                            @endif
                                            <!-- TABLE STARTS -->

                                            <table class="example table table-striped table-bordered">
                                                <thead class="bg bg-primary text-white">
                                                    <tr>
                                                        <th style="width: 5%">#</th>
                                                        {{-- <th>ID</th> --}}
                                                        <th style="width: 15%">Agent Name</th>
                                                        <th style="width: 20%">Old Value</th>
                                                        <th style="width: 20%">New Value</th>
                                                        <th style="width: 35%">Value Description</th>
                                                        <th style="width: 5%">Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $n = 1;
                                                    @endphp
                                                    @foreach ($logdata as $datalog)
                                                        <tr style="padding: 0.1rem !important;">
                                                            <td  padding: 0.1rem !important;>{{ $n }}</td>
                                                            {{-- <td>{{ $datalog->id }}</td> --}}
                                                            <td>{{ $datalog->agentname }}</td>
                                                            <td>{{ $datalog->old_value }}</td>
                                                            <td>{{ $datalog->new_value }}</td>
                                                            <td>
                                                                <span class="d-inline-block text-truncate"
                                                                    style="max-width: 300px !important;">
                                                                    {{ $datalog->action }}
                                                                </span>
                                                            </td>
                                                            <td class="text-center">
                                                                <a href="javascript:;" onclick="getid({{ $datalog->id }})"
                                                                    data-toggle="modal" data-target="#view_crmlogs"
                                                                    data-placement="top" title="View Logs Details"
                                                                    class="badge bg-primary  text-white">
                                                                    <i class="fa fa-info-circle"></i></a>
                                                            </td>
                                                        </tr>
                                                        @php
                                                            $n++;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <!-- TABLE ENDS -->
                                        </div>
                                    </div>
                                    <!-- ROW  ENDS -->
                                    <!-- </div> -->
                                </div>
                                <!-- card-body ENDS -->
                            </div>
                            <!-- CARD ENDS -->
                        </div>
                        <!-- ROW ENDS -->
                    </div>
                    <!-- container ROW ENDS -->
                </div>
                <!-- container ENDS -->
            </div>
            <!-- section-body ENS -->
            <!-- MODAL STARTS -->
            <div class="modal fade bd-example-modal-xl" id="view_crmlogs" tabindex="-1" role="dialog"
                aria-labelledby="largeModalLabel" aria-hidden="true">

                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="LogLabel"></h5>
                            <button type="button" class="close close-danger text-danger" data-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-6">
                                    <label for="action" class="form-label">Action</label>
                                    <textarea class="form-control form-control-text-area  shadow-sm bg-white rounded" id="action" name="action"
                                        rows="2"></textarea>
                                </div>
                                <div class="col-3">
                                    <label for="action_type" class="form-label">Action Type</label>
                                    <input type="text" class="form-control shadow-sm bg-white rounded" id="action_type"
                                        name="action_type">
                                </div>
                                <div class="col-3">
                                    <label for="action_time" class="form-label">Action Time</label>
                                    <input type="text" class="form-control shadow-sm bg-white rounded" id="action_time"
                                        name="action_time">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="old_value" class="form-label">Old Value</label>
                                    <input type="text" class="form-control shadow-sm bg-white rounded" id="old_value"
                                        name="old_value">

                                </div>
                                <div class="col-3">
                                    <label for="module" class="form-label">Module</label>
                                    <input type="text" class="form-control shadow-sm bg-white rounded" id="module"
                                        name="module">
                                </div>
                                <div class="col-3">
                                    <label for="agent" class="form-label">Agent</label>
                                    <input type="text" class="form-control shadow-sm bg-white rounded" id="agent"
                                        name="agent">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <label for="new_value" class="form-label">New Value</label>
                                    <input type="text" class="form-control shadow-sm bg-white rounded" id="new_value"
                                        name="new_value">

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><b>Close</b></button>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- MODAL ENDS -->

    </section>
    <!-- section STARTS -->
    </div>
    <!-- main-content ENDS -->
@endsection
