@extends('template')
@section('title', 'CSI')
@section('content')
    {{-- CUSTOM CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">
    {{-- JQUERY  --}}
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    {{-- BODY --}}
    <div class="container">
        <div class="csi_main_div">
            <div class="fixme col-12">
                <div class="csi_table_main_div">
                    <div style="display: flex; flex-direction: row; gap: 15px;">
                        <div class="col-8">
                            <label for="">Dealership&nbsp;:</label>
                            <select class="form-control bg-white" name="" id="" style="font-size: 12px;">
                                <option value="" disabled selected> Select Dealership </option>
                                <option value="one"> 10970 / Gul Motor </option>
                                <option value="two"> 11010 / Yazdani Motor </option>
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="">Month&nbsp;:</label>
                            <input class="form-control shadow-sm  bg-white" type="month" id="startdate">
                        </div>
                        <div class="col-6">
                            <label for="">Year&nbsp;:</label>
                            <input class="form-control shadow-sm  bg-white" type="month" id="enddate">
                        </div>
                    </div>
                    <div class="submit_btn mb-2">
                        <button class="btn btn-primary btn-round">Submit</button>
                    </div>
                </div>
                <div
                    style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding-bottom: 1rem; padding-top: 20px;">
                    <div
                        style="width: 80%; display: flex; flex-direction: row; justify-content: start; align-items: center; gap: 10px;">
                        <div class="col-md-5 dealership_div" style="display: flex;">
                            <div> Dealership&nbsp;Name&nbsp;:</div>
                            &nbsp;
                            <div style="font-size: 17px;">Changan Gul Motors</div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Filter&nbsp;:</label>
                            <select class="form-control bg-white" name="" id="test" style="font-size: 12px;">
                                <option disabled selected hidden>Select&nbsp;DCSI&nbsp;Status</option>
                                <option>Done</option>
                                <option>Not Done</option>
                                <option>Variant</option>
                            </select>
                        </div>
                    </div>
                    <div class="submit_btn">
                        <button class="btn btn-primary btn-round">Download</button>
                        <button class="btn btn-primary btn-round" style="width: 90px; height: 35px;">Save</button>
                    </div>
                </div>
            </div>
            <div style="width: fit-content;" class="row">
                <table class="example table table-striped table-bordered table-sm">
                    <thead class="bg bg-primary text-white text-center">
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Contact</th>
                            <th>Variant</th>
                            <th>Chassis</th>
                            <th>Registration Number</th>
                            <th>Mileage</th>
                            <th>CSI Conducted Date</th>
                            <th>CSI Surveyor Name</th>
                            <th>DCSI Status</th>
                            <th>DCSI Conducted Date</th>
                            <th>Calling Status</th>
                            <th>Call Recording</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Rehman</td>
                            <td>9234567890</td>
                            <td>5 years</td>
                            <td>57534692</td>
                            <td>76465567</td>
                            <td>14km</td>
                            <td>12/2/2023</td>
                            <td>CSI</td>
                            <td class="view" data-toggle="modal" data-target="#AddCustomerModal">Done</td>
                            <td>12/2/2023</td>
                            <td>
                                <select style="border: none; background-color: transparent; font-size: 12px;" name=""
                                    id="">
                                    <option selected disabled>Select Option</option>
                                    <option>Busy</option>
                                    <option>Not Responding</option>
                                    <option>Not Interested</option>
                                </select>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <p style="font-size: 11px; color: black; ">Call Attempt : </p>
                                    <p style="font-size: 11px; ">2</p>
                                </div>
                                <p style="font-size: 10px;">12/3/2023 12:30 AM</p>
                            </td>
                            <td style="font-size: 20px; text-align: center;"> <i class="fa-solid fa-record-vinyl"
                                    style="cursor: pointer;"></i> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Taha</td>
                            <td>9234567890</td>
                            <td>2 years</td>
                            <td>57534692</td>
                            <td>76465567</td>
                            <td>18km</td>
                            <td>12/5/2023</td>
                            <td>warranty</td>
                            <td class="view" data-toggle="modal" data-target="#AddCustomerModal">Not Done</td>
                            <td>12/5/2023 </td>
                            <td>
                                <select style="border: none; background-color: transparent; font-size: 12px;" name=""
                                    id="">
                                    <option selected disabled>Select Option</option>
                                    <option>Busy</option>
                                    <option>Not Responding</option>
                                    <option>Not Interested</option>
                                </select>
                                <div style="display: flex; flex-direction: row; align-items: center;">
                                    <p style="font-size: 11px; color: black; ">Call Attempt : </p>
                                    <p style="font-size: 11px; ">2</p>
                                </div>
                                <p style="font-size: 10px;">12/3/2023 12:30 AM</p>
                            </td>
                            <td style="font-size: 20px; text-align: center;"> <i class="fa-solid fa-record-vinyl"
                                    style="cursor: pointer;"></i> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- popup box start here -->
            <div class="modal fade bd-example-modal-xl" id="AddCustomerModal" tabindex="-1" role="dialog"
                aria-labelledby="largeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="largeModalLabel"> DCSI Survey </h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="display: flex; flex-direction: column;">
                            <div class="csi_inner_div">
                                <div class="body">
                                    <div class="body_inner_div">
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                1) Is the dealership easy to get in contact with? <br>
                                                1) Kya app ka dealership se asani se raabta ho jata tha? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                2) How would you rate the time took to attend you after reaching the
                                                dealership? <br>
                                                2) Jub app dealership pohonchay to staff ne app ka istaqbal kitni dair mai
                                                kia? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="2">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="2">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="2">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="2">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                3) How you rate the estimated service delivery time? <br>
                                                3) App service delivery time se kitna mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="3">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="3">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="3">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="3">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                4) How would you rate customer lounge cleanliness/comfort? <br>
                                                4) App customer lounge ke aram or us ki safai sutrai se kitna mutmain hain?
                                                <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="4">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="4">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="4">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="4">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                5) How would you rate the helpfulness/attitude ofservice staff? <br>
                                                5) App service staff se kitna mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="5">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="5">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="5">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="5">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                6) How would you rate overall dealership staff helpfulness? <br>
                                                6) App overall dealership se kitna mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="6">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="6">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="6">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="6">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                7) How Satisfied are you with the explanation of performed job and break-up
                                                of total bill? <br>
                                                7) App kitna mutmain hain jo kaam kia gaya us se or us ke total bill ki
                                                wazaahat se? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="7">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="7">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="7">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="7">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                8) How Satisfied are you with the price of changan share parts? <br>
                                                8) App changan spare parts ke price se kitna mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="8">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="8">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="8">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="8">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                9) How Satisfied are you with the price of dealership labor? <br>
                                                9) App dealership pe labor price se kitne mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="9">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="9">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="9">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="9">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                10) How would you rate the availability of parts? <br>
                                                10) App parts ki availability se kitna mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="10">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="10">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="10">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="10">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                11) How would you rate the overall after-sale experience of dealership? <br>
                                                11) App dealership ke aftersales experience se kitna mutmain hain? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="11">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="11">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="11">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="11">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                12) If given a chance, would you still come back for service next time? <br>
                                                12) Kya app dubara ana pasand karen g service karwane ke lia? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                13) Are you willing to recommend your friends or families to purchase of
                                                repair vehicles here? <br>
                                                13) Kya app apne dosto or rishtedaron ko mashwara den ge gaari khareedne ka
                                                ya service karwane ka? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                            <div
                                                style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                <div style="padding: 1rem 0.5rem;">Remarks</div>
                                                <textarea name="" id="" rows="3"
                                                    style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                            </div>
                                        </div>
                                        <div
                                            style="display: flex; flex-direction: column; gap: 15px; box-shadow: 0px 0px 10px 0px lightgray; padding: 10px 8px; border-radius: 10px;">
                                            <h6>
                                                14) Kya app apni koi raye dena pasand karen ge? <br>
                                            </h6>
                                            <div style="display: flex; flex-direction: row;">
                                                <div
                                                    style="width: fit-content; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px; display: flex; flex-direction: row; align-items: center;">
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1rem 0.5rem;">Neither Satisfied Nor
                                                            Dissatisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Somewhat Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; border-right: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                            <input type="radio" name="12">
                                                        </div>
                                                    </div>
                                                    <div style="width: 170px; text-align: center;">
                                                        <div style="padding: 1.7rem 0.5rem;">Extremely Satisfied</div>
                                                        <div
                                                            style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center;  padding: 10px 0;">
                                                            <input type="radio" name="1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div
                                                    style="width: 230px; text-align: center; margin-left: 10px; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                                    <div style="padding: 1.7rem 0.5rem;">Score</div>
                                                    <div
                                                        style="width: 100%; height: fit-content; border-top: 2px solid gray; color: black; font-weight: 600; text-align: center; padding: 10px 0;">
                                                        3 </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            style="width: 78%; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                            <div style="padding: 1rem 0.5rem;">Remarks</div>
                                            <textarea name="" id="" rows="3"
                                                style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                        </div>
                                    </div>
                                    <div
                                        style="width: 100%; display: flex; flex-direction: column; justify-content: end; align-items: flex-end;">
                                        <div
                                            style="width: 230px; text-align: center; border: 2px solid gray; color: black; font-weight: 600; border-radius:5px;">
                                            <div style="padding: 1rem 0.5rem;">Total Score</div>
                                            <textarea name="" id="" rows="3"
                                                style="width: 100%; border: none; border-top: 2px solid gray; color: black; font-weight: 600;"></textarea>
                                        </div>
                                    </div>
                                    <div style="width: 100%; display: flex; flex-direction: row; justify-content: end;">
                                        <button class="btn btn-primary btn-round"> Submit </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- popup box end here -->
        </div>
    </div>

    <script>
        var fixmeTop = $('.fixme').offset().top;
        $(window).scroll(function() {
            var currentScroll = $(window).scrollTop();
            if (currentScroll >= fixmeTop) {
                $('.fixme').css({
                    position: 'fixed',
                    top: '0',
                    left: '0',
                    background: 'white',
                    zIndex: '999',
                });
            } else {
                $('.fixme').css({
                    position: 'static'
                });
            }
        });
    </script>

    <script>
        var startdate = document.getElementById('startdate');
        var enddate = document.getElementById('enddate');

        startdate.onchange = function() {
            if ((startdate.value > enddate.value) && enddate.value.length != 0) {
                alert("Please Enter Valid Dates!");
                startdate.value = "";
                enddate.value = "";
            }
        }

        enddate.onchange = function() {
            if ((startdate.value > enddate.value) && startdate.value.length != 0) {
                alert("Please Enter Valid Dates!");
                startdate.value = "";
                enddate.value = "";
            }
        }
    </script>

@endsection('content')
