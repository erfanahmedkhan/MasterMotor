@extends('template')
@section('title', 'DCSI Management')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>



<div class="container">
    <div class="csi_main_div">
        <div class="fixme col-md-12">
            <div class="csi_table_main_div">
                <div style="display: flex; flex-direction: row; gap: 15px;">
                    <div class="col-md-4">
                        <label for=""> Dealership : </label>
                        <select class="form-control bg-white" name="" id="" style="font-size: 12px;">
                            <option value="" disabled selected> Select Dealership </option>
                            <option value="one"> 10970 / Gul Motor </option>
                            <option value="two"> 11010 / Yazdani Motor </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for=""> Month : </label>
                        <input class="form-control shadow-sm  bg-white" type="month" id="startdate">
                    </div>
                    <div class="col-md-3">
                        <label for=""> Year : </label>
                        <input class="form-control shadow-sm  bg-white" type="month" id="enddate">
                    </div>
                    <div class="col-md-6">
                        <label for=""> Analytics </label>
                        <label for=""> Individual Question : </label>
                        <!-- <form> -->
                        <div class="multiselect">
                            <div class="selectBox" onclick="showCheckboxes()">
                                <select class="form-control bg-white" name="" id="">
                                    <option>Select an option</option>
                                </select>
                                <div class="overSelect"></div>
                            </div>
                            <div id="checkboxes">
                                <label for="one">
                                    <input type="checkbox" id="one" />&nbsp; First checkbox</label>
                                <label for="two">
                                    <input type="checkbox" id="two" />&nbsp; Second checkbox</label>
                                <label for="three">
                                    <input type="checkbox" id="three" />&nbsp; Third checkbox</label>
                            </div>
                        </div>
                        <!-- </form> -->
                    </div>
                </div>
                <div class="submit_btn">
                    <button class="btn btn-primary btn-round"> Submit </button>
                </div>
            </div>
            <div style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding-bottom: 1rem; padding-top: 20px;">
                <div style="width: 80%; display: flex; flex-direction: row; justify-content: start; align-items: center; gap: 10px;">
                    <!-- <div class="col-md-5 dealership_div" style="display: flex;">
                        <div> Dealership Name : </div>
                        &nbsp;
                        <div style="font-size: 17px;"> abc </div>
                    </div> -->
                    <div class="col-md-4">
                        <label for=""> Filter : </label>
                        <select class="form-control bg-white" name="" id="test" style="font-size: 12px;">
                            <option disabled selected hidden> Select Status </option>
                            <option> Done </option>
                            <option> Not Done </option>
                            <option> Variant </option>
                        </select>
                    </div>
                </div>
                <div class="submit_btn">
                    <button class="btn btn-primary btn-round"> Download </button>
                    <button class="btn btn-primary btn-round" style="width: 90px; height: 35px;"> Save </button>
                </div>
            </div>
        </div>
        <div style="width: fit-content; padding-top: 30px;">
            <table class="example table table-striped table-bordered">
                <thead class="bg bg-primary text-white">
                    <tr>
                        <th> Sr no# </th>
                        <th> Questions </th>
                        <th> Dealership Name </th>
                        <th> CSI Conducted Date </th>
                        <th> CSI Parcentage </th>
                        <th> DCSI Conducted Date </th>
                        <th> DCSI Surveyor Name </th>
                        <th> DCSI Status </th>
                        <th> DCSI Parcentage </th>
                        <th> Total Parcentage </th>
                    </tr>
                </thead>
                <tbody style="font-size: 25px;">
                    <tr>
                        <td> 1 </td>
                        <td>
                            Kya app ka dealership se asani se raabta ho jata tha?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 2 </td>
                        <td>
                            Jub app dealership pohonchay to staff ne app ka istaqbal kitni dair mai kia? </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 3 </td>
                        <td>
                            App service delivery time se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 4 </td>
                        <td>
                            App customer lounge ke aram or us ki safai sutrai se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 5 </td>
                        <td>
                            App service staff se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 6 </td>
                        <td>
                            App overall dealership se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 7 </td>
                        <td>
                            App kitna mutmain hain jo kaam kia gaya us se or us ke total bill ki wazaahat se?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 8 </td>
                        <td>
                            App changan spare parts ke price se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 9 </td>
                        <td>
                            App dealership pe labor price se kitne mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 10 </td>
                        <td>
                            App parts ki availability se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 11 </td>
                        <td>
                            App dealership ke aftersales experience se kitna mutmain hain?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 12 </td>
                        <td>
                            Kya app dubara ana pasand karen g service karwane ke lia?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 13 </td>
                        <td>
                            Kya app apne dosto or rishtedaron ko mashwara den ge gaari khareedne ka ya service karwane ka?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                    <tr>
                        <td> 14 </td>
                        <td>
                            Kya app apni koi raye dena pasand karen ge?
                        </td>
                        <td> 10970/Gul Motor </td>
                        <td> 16/2/2023 </td>
                        <td> 50% </td>
                        <td> 16/2/2023 </td>
                        <td> sheraz </td>
                        <td> Done </td>
                        <td> 50% </td>
                        <td> 100% </td>
                    </tr>
                </tbody>
            </table>
        </div>
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

<script>
    var expanded = false;

    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>

@endsection('content')
