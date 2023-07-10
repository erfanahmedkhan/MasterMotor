
    @extends('template')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/instagram-notification.css') }}">
 
    <div class="mainContainerInstaNoti">
        <div class="subContainerInstaNoti">
            <div class="leftContainer">
                <div class="linksDiv">
                    <img src="{{ asset('images/insta-posts-icon.png') }}" alt="" class='linksImgMessages'>
                    <a href="https://sodabaz.com/MasterMotor/public/instagram-posts" class="links">Posts</a>
                </div>
                <div class="linksDiv">
                    <img src="{{ asset('images/insta-message-icon.png') }}" alt="" class='linksImg'>
                    <a href="https://sodabaz.com/MasterMotor/public/instagram-chats" class="links">Messages</a>
                </div>
                <div class="notificationsDiv">
                    <div class="linksDiv">
                        <img src="{{ asset('images/insta-notification-icon.png') }}" alt="" class='linksImgMessages'>
                        <a href="https://sodabaz.com/MasterMotor/public/instagram-notifications" class="links">Notifications</a>
                    </div>
                    <p class="notificationNumber">2</p>
                </div>
            </div>
           <div class="rightContainer">
              <h1 class="mainHeading">Notifications</h1>
              <h3 class="subHeading">Today</h3>
              <div class="notificationDiv">
                <div class="profImgDiv">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='profimg'>
                </div>
                <div class="messageDiv">
                    <p class="message"><span class="nameOfPerson">Bilal Khan</span> comment on your post</p>
                    <p class="timing">23 hours ago</p>
                </div>
              </div>
              <div class="notificationDiv">
                <div class="profImgDiv">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='profimg'>
                </div>
                <div class="messageDiv">
                    <p class="message"><span class="nameOfPerson">Ahsan Khan</span> liked your post</p>
                    <p class="timing">23 hours ago</p>
                </div>
              </div>
              <div class="notificationDiv">
                <div class="profImgDiv">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='profimg'>
                </div>
                <div class="messageDiv">
                    <p class="message"><span class="nameOfPerson">Rehman Khan</span> comment on your post</p>
                    <p class="timing">23 hours ago</p>
                </div>
              </div>
              <h3 class="subHeading">Earlier</h3>
              <div class="notificationDiv">
                <div class="profImgDiv">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='profimg'>
                </div>
                <div class="messageDiv">
                    <p class="message"><span class="nameOfPerson">Ahsan Khan</span> comment on your post</p>
                    <p class="timing">23 hours ago</p>
                </div>
              </div>
              <div class="notificationDiv">
                <div class="profImgDiv">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='profimg'>
                </div>
                <div class="messageDiv">
                    <p class="message"><span class="nameOfPerson">Rehman Khan</span> comment on your post</p>
                    <p class="timing">23 hours ago</p>
                </div>
              </div>
           </div>
        </div>
    </div>
@endsection('content')