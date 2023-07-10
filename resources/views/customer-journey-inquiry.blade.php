@include('template')

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <style>
    .modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0,0,0,.2);
    border-radius: 1.3rem;
    outline: 0;
    opacity: 83%;
}
        .btn-primary:hover {
            box-sizing: border-box !important;
            background-color: black !important;
            color: white !important;
            border: 1px solid black !important;
        }

        .card-body {
            /* background-color: black !important; */
            padding: 0 !important;

        }

        .modal-content {
            margin-top: 41%%;
        }

        #details {
            width: 10vw;
            border-radius: 25px;

        }

        #whatsapp {
            text-align: center !important;

        }

        .danger {
            color: red !important;
        }

        .archievedanger {
            box-sizing: border-box !important;

            padding: 5%;
            color: red !important;
        }

        .danger span {
            color: red !important;
        }

        .call {
            background-color: lightgrey;
            border-radius: 100%;
            padding: 4%;
        }

        .call-details {
            color: grey;
        }

        span {
            font-weight: bold !important;


        }

        #callLogTH {
            text-align: justify !important;
            color: grey;
        }

        #thCallLog {
            padding-left: 5%;

        }

        #archievehistory {
            color: grey !important;
        }
    </style>
</head>

<body>
    <div class="modal fade bd-example-modal-xl mt-4" id="callpopup" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-lg" role="document">

          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title" id="largeModalLabel">Inquiry Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div class="modal-body">
              <form action="{{ url('updatecustomerjourneyinquiry/'.$inquiry[0]->id) }}" method="POST">
                @csrf

                <div class="row">


                    <div class="col-md-4" hidden>
                      <label class="form-label">Inquiry ID</label>
                      <input type="text" value="{{ $inquiry[0]->id}}" class="form-control shadow-sm bg-white rounded" readonly >
                    </div>

                  <div class="col-md-4">
                    <label class="form-label">Inquiry Number</label>
                    <input type="text" value="{{ $inquiry[0]->inquiry_number}}" class="form-control shadow-sm bg-white rounded" readonly>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Inquiry Type</label>
                    <input type="text"  value="{{ $inquiry[0]->inquiry_type}}" class="form-control shadow-sm bg-white rounded" disabled>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Dealership</label>
                    <input type="text"  value="{{ $inquiry[0]->dealer_name}}" class="form-control shadow-sm bg-white rounded" readonly>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Start Date</label>
                    <input type="text" value="{{ $inquiry[0]->start_date}}" class="form-control shadow-sm bg-white rounded" readonly>
                  </div>

                  <div class="col-md-4">
                    <label class="form-label">Escalation Date</label>
                    <input type="text" value="{{ $inquiry[0]->end_date}}" class="form-control shadow-sm bg-white rounded" readonly>
                  </div>
                  <div class="col-md-4">
                    <label class="form-label">Source</label>
                    <input type="text" value="{{ $inquiry[0]->source}}" class="form-control shadow-sm bg-white rounded" readonly>
                  </div>

                  <div class="col-md-4">
                    <label for="city" class="form-label ">Status</label>
                    <select class="form-control shadow-sm bg-white text-center" name="status" required>
                        <option  value="{{ $inquiry[0]->status}}" selected>{{ $inquiry[0]->status}}</option>
                        <option value="">Update Status</option>
                        <option value="Hot">Hot</option>
                        <option value="Cold">Cold</option>
                        <option value="Warm">Warm</option>

                    </select>
                  </div>

                </div>
                <div class="row">
                    <div class="col-md-8">
                        <label for="inquiry_details" class="form-label">Inquiry</label>
                        <textarea class="form-control shadow-sm bg-white rounded" rows="3" readonly>{{ $inquiry[0]->inquiry_details}}</textarea>
                    </div>
                </div>

                <div class="modal-footer">
                  <button type="submit" class="btn btn-warning" >Update</button>
                  <a href=""></a>



                  <button type="button" class="btn btn-danger" onclick="goback()">Close</button>
                </div>
              </form>
            </div>

          </div>

        </div>

      </div>




    <!-- modal - call pop-up start -->
       {{-- <div class="modal fade show" id="callpopup" aria-modal="true" style="display: block;">

        <div class="modal-dialog modal-md">
            <div class="modal-content bg bg-dark text-white">

                    <center><h5>Incoming Call</h5></center>

                <div class="modal-body">
                <div class="row">

                    <div class="col-md-3">
                        <i class="fa fa-user-circle" style="
                            margin-left: 40%;
                            margin-top: 19%;
                            font-size: 74px;
                        "></i>
                    </div>

                    <div class="col-md-9">
                        <h4 style="margin-left: 13%;margin-top: 4%;"><b>Josh Brolin</b></h4><br>
                        <h5 style="margin-left: 14%;">923031234567</h5>
                    </div>

                </div>

                    <div class="col-md-12">
                    <button class="btn btn-danger" data-dismiss="modal" aria-label="Close" style="
                margin-left: 33%;
                margin-top: 5.6%;
                border-radius: 15px;
            ">Decline</button>
                    <a href="{{ url('call-center-customer-details') }}" style="margin-right: 19%;margin-top: 5%;border-radius: 15px;" class="btn btn-success">Recive</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- modal - call pop-up end -->

   <script>
       $(document).ready(function(){
           $('#callpopup').modal('show');
       });
   </script>
</body>



