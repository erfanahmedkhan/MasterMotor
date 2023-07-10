@extends('template')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/instagram-posts.css') }}">
    <div class="mainContainer">
        <div class="subContainer">
            <div class="leftContainer">
                <div class="linksDiv">
                    <img src="{{ asset('images/insta-posts-icon.png') }}" alt="" class='linksImg'>
                   <a href="https://sodabaz.com/MasterMotor/public/instagram-posts" class="links">Posts</a>
                </div>
                <div class="linksDiv">
                    <img src="{{ asset('images/insta-message-icon.png') }}" alt="" class='linksImgMessages'>
                     <a href="https://sodabaz.com/MasterMotor/public/instagram-chats" class="links">Messages</a>
                </div>
                <div class="notificationsDiv">
                    <div class="linksDiv">
                        <img src="{{ asset('images/insta-notification-icon.png') }}" alt=""
                            class='linksImgMessages'>
                        <a href="https://sodabaz.com/MasterMotor/public/instagram-notificatons" class="links">Notifications</a>
                    </div>
                    <p class="notificationNumber">2</p>
                </div>
            </div>
            <div class="postSection">
                <div class="headerPost">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='userImg'>
                    <div style="display: flex; margin-left: 10px; align-items: center">
                        <p class="nameText">Faysal Bank</p>
                    </div>
                </div>
                <div class="postImg">
                    {{-- <img src="{{ asset('images/banner1.png') }}" alt="" class='postImg'> --}}
                </div>
                <div class="bottomSection">
                    <button class="buttonLike">
                        <img src="{{ asset('images/i2.png') }}" alt="" class='likeImg'>
                    </button>
                    <button class="buttonComment" onclick="myFunction()">
                        <img src="{{ asset('images/i1.png') }}" alt="" class='likeImg'>
                    </button>
                </div>
                <p class="likes">1,717 likes</p>
                <div class="nameAndDescription">
                    <p class="nameTextbottom">Faysal Bank <span class="decriptionTextbottom">Iphone 11 Pro
                            Max(256GB)📱 Price: 120,000/-Non-PTA APPROVED</span></p>
                </div>
                <p class="time">3 Day Ago</p>
                <div id="p1">
                    <div class="yourCommentDiv">
                        <img src="{{ asset('images/face8.jpg') }}" alt="" class='yourCommentImg'>
                        <input type="text" class="commentInput" placeholder="Write a public comment...">
                    </div>
                    <div class="recentComments">
                        <img src="{{ asset('images/admin.jpg') }}" alt="" class='yourCommentImg'>
                        <div class="recentCommentsResponseBoxMain">
                            <div class="recentCommentsResponseBox">
                                <p class="nameOfRecentCommentsUser">Bilal Khan</p>
                                <p class="commentOfRecentCommentsUser">Oh wow! Awesome</p>
                            </div>
                            <div style="display: flex;justify-content: space-around;margin-top: 2px;width: 200px;">
                                <p class="recentCommentsLike">Like</p>
                                <div style="display: flex">
                                    <p class="recentCommentsReply" onclick="replyFunction()">Reply</p>
                                    <p class="recentCommentsReplyTime">5w</p>
                                </div>
                            </div>
                            <div class="subreplyNumbers">
                                <img src="{{ asset('images/arrow.png') }}" alt="" class='arrowImg'>
                                <p class="checkSubReplies" onclick="display()">1 replies</p>
                            </div>     
                        </div>
                        
                    </div>
                    <div id="inputReplyDiv">
                        <input type="text" class="inputReply" placeholder="Reply user name">
                    </div>
                    <div class="recentCommentsSub" id="subComment">
                        <div style="display: flex">
                            <img src="{{ asset('images/admin.jpg') }}" alt="" class='yourCommentImg'>
                            <div class="recentCommentsResponseBoxMain">
                                <div class="recentCommentsResponseBox">
                                    <p class="nameOfRecentCommentsUser">Bilal Khan</p>
                                    <p class="commentOfRecentCommentsUser">Oh wow! Awesome</p>
                                </div>
                                <div style="display: flex;justify-content: space-around;margin-top: 2px">
                                    <p class="recentCommentsLike">Like</p>
                                    <div style="display: flex">
                                        <p class="recentCommentsReply" onclick="subReplyFunction()">Reply</p>
                                        <p class="recentCommentsReplyTime">5w</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="inputReplyDiv2nd">
                            <input type="text" class="inputReply" placeholder="Reply user name">
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection('content')