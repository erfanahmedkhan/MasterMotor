@extends('template')
@section('title', 'Warranty Management')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>



<div class="container">
    <div class="csi_main_div">
        <div class="fixme col-12">
            <div class="csi_table_main_div">
                {{-- <div style="display: flex; flex-direction: row; gap: 15px;"> --}}
                <div style="gap: 15px;">
                    <div class="col-4">
                        <label for=""> Dealership : </label>
                        <select class="form-control bg-white" name="" id="" style="font-size: 12px;">
                            <option value="" disabled selected> Select Dealership </option>
                            <option value="one"> 10970 / Gul Motor </option>
                            <option value="two"> 11010 / Yazdani Motor </option>
                        </select>
                    </div>
                    <div class="col-3">
                        <label for=""> Month : </label>
                        <input class="form-control shadow-sm  bg-white" type="month" id="startdate">
                    </div>
                    <div class="col-3">
                        <label for=""> Year : </label>
                        <input class="form-control shadow-sm  bg-white" type="month" id="enddate">
                    </div>
                    <div class="col-6">
                    <label for=""> Analytics : </label>
                    <label for=""> Individual Question : </label>
                    <select class="form-control bg-white" name="" id="" style="font-size: 12px;">
                        <option value="" disabled selected hidden> Select individual Question </option>
                        <option value="one"> one </option>
                        <option value="two"> two </option>
                    </select>
                </div>
                </div>
                <div class="submit_btn">
                    <button class="btn btn-primary btn-round"> Submit </button>
                </div>
            </div>
            <div style="width: 100%; display: flex; flex-direction: row; justify-content: space-between; align-items: center; padding-bottom: 1rem; padding-top: 20px;">
                <div style="width: 80%; display: flex; flex-direction: row; justify-content: start; align-items: center; gap: 10px;">
                    <div class="col-md-5 dealership_div" style="display: flex;">
                        <div> Dealership Name : </div>
                        &nbsp;
                        <div style="font-size: 17px;"> abc </div>
                    </div>
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
