@extends('template')
@section('title', 'Surveys')
@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">

<div style="width: 100%; height: 80vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div class="survey_main_div">
        <div class="survey_box_main_div">
            <a href='{{ url('csi') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/csi.png') }}" alt="">
                    <h2> CSI </h2>
                </div>
            </a>
            <a href='{{ url('ssi') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/ssi.png') }}" alt="">
                    <h2> SSI </h2>
                </div>
            </a>
            <a href='{{ url('miscellaneous') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/miscellaneous.png') }}" alt="">
                    <h2> MISCELLANEOUS </h2>
                </div>
            </a>
            <a href='{{ url('warranty') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/warranty.png') }}" alt="">
                    <h2> WARRANTY </h2>
                </div>
            </a>
        </div>
        <!-- management div start here -->
        <div class="survey_box_main_div">
            <a href='{{ url('csi-management') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/csim.png') }}" alt="">
                    <h2> DCSI <br> Management </h2>
                </div>
            </a>
            <a href='{{ url('ssi-management') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/ssim.png') }}" alt="">
                    <h2> DSSI <br> Management </h2>
                </div>
            </a>
            <a href='{{ url('miscellaneous-management') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/miscellaneousm.png') }}" alt="">
                    <h2> MISCELLANEOUS <br> Management </h2>
                </div>
            </a>
            <a href='{{ url('warranty-management') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/survey_imgs/warrantym.png') }}" alt="">
                    <h2> WARRANTY <br> Management </h2>
                </div>
            </a>
        </div>
        <!-- management div end here -->

    </div>
</div>

@endsection('content')
