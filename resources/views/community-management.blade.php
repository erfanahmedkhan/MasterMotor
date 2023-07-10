<!--@extends('template')-->
@extends('agenttemplate')
@section('content')


<link rel="stylesheet" href="{{ asset('assets/css/call-recieve-details.css') }}">

<div style="width: 100%; height: 80vh; display: flex; flex-direction: column; justify-content: center; align-items: center;">
    <div class="survey_main_div">
        <div class="survey_box_main_div">
            <a href='{{ url('social-media-facebook') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/community-management/f.png') }}" alt="">
                    <h2> Facebook </h2>
                </div>
            </a>
            <a href='{{ url('instagram-chats') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/community-management/insta.png') }}" alt="">
                    <h2> Instagram </h2>
                </div>
            </a>
            <a href='{{ url('social-media-whatsapp') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/community-management/whats.png') }}" alt="">
                    <h2> Whatsapp </h2>
                </div>
            </a>
        </div>
        <!-- management div start here -->
        <div class="survey_box_main_div">
            <a href='{{ url('') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/community-management/mail.png') }}" alt="">
                    <h2> Mail </h2>
                </div>
            </a>
            <a href='{{ url('') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/community-management/calls.png') }}" alt="">
                    <h2> Calls </h2>
                </div>
            </a>
            <a href='{{ url('') }}'>
                <div class="survey_inner_div">
                    <img src="{{ url('images/community-management/image.png') }}" alt="">
                    <h2> webform </h2>
                </div>
            </a>
        </div>
        <!-- management div end here -->

    </div>
</div>


<!-- <div class='socialChannelsContainer'>
                    <div class='iconsContainer3'>
                        <div class='badgeDiv'>
                            <h5 class='badge'>2</h5>
                        </div>
                        <img src="{{ asset('images/f.png') }}" alt="" class='facebookIcon'>
                        <h5 class='iconsName'>facebook</h5>
                    </div>
                    <div class='iconsContainer2'>
                        <div class='badgeDiv'>
                            <h5 class='badge'>2</h5>
                        </div>
                        <img src="{{ asset('images/insta.png') }}" alt="" class='facebookIcon'>
                        <h5 class='iconsName'>instagram</h5>
                    </div>
                    <div class='iconsContainer5'>
                        <div class='badgeDiv'>
                            <h5 class='badge'>2</h5>
                        </div>
                        <img src="{{ asset('images/whats.png') }}" alt="" class='facebookIcon'>
                       
                        <h5 class='iconsName'>whatsapp</h5>
                    </div>
                    <div class='iconsContainer1'>
                        <div class='badgeDiv'>
                            <h5 class='badge'>2</h5>
                        </div>
                        <img src="{{ asset('images/mail.png') }}" class='facebookIcon'>
                        <h5 class='iconsName' id='iconsNameId'>mail</h5>
                    </div>
                    <div class='iconsContainer4'>
                        <div class='badgeDiv'>
                            <h5 class='badge'>2</h5>
                        </div>
                        <img src="{{ asset('images/calls.png') }}" alt="" class='mailIcon'>
                        <h5 class='iconsName'>calls</h5>
                    </div>
                    <div class='iconsContainer6'>
                        <div class='badgeDiv'>
                            <h5 class='badge'>2</h5>
                        </div>
    
                        <img src="{{ asset('images/image.png') }}" alt="" class='facebookIcon'>
                        <h5 class='iconsName'>webform</h5>
                    </div>
                </div> -->

@endsection('content')