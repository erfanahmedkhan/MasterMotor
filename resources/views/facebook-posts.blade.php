@extends('template')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/posts-facebook.css') }}">


    
    <div class="mainContainerFbPosts">
        <div class="subContainerFbPosts">
            <div class="leftContainer" id="leftContainerId">
                <div class="linksDiv">
                    <img src="{{ asset('images/003.png') }}" alt="" class='linksImg'>
                    <a href="https://sodabaz.com/MasterMotor/public/facebook-posts" class="links">Posts</a>
                </div>
                <div class="linksDiv">
                    <img src="{{ asset('images/01.png') }}" alt="" class='linksImgMessages'>
                    <a href="https://sodabaz.com/MasterMotor/public/facebook-chats" class="links">Messages</a>
                </div>
                <div class="notificationsDiv">
                    <div class="linksDivIcon">
                        <img src="{{ asset('images/002.png') }}" alt="" class='linksImgMessages'>
                        <a href="https://sodabaz.com/MasterMotor/public/facebook-notification" class="links">Notifications</a>
                    </div>
                    <p class="notificationNumber">2</p>
                </div>
            </div>
            <div id="showSideBar">
                <img src="{{ asset('images/cross.png') }}" alt="" class='crossImg' onclick="showRightSection()">
                <div class='upper-container'>

                    <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImgInfo'>
                    <p class='NameTextInfo' id="nameRight">Shahzil</p>
                    <p class='CityTextInfo'>03318963465</p>
                    <p class='CityTextInfo'>abcde@gmail.com</p>
                    <p class='CityTextInfo'>Karachi, Sindh</p>

                </div>

                <div class='inquiryBox'>
                    <p class='CityTextInfo'>Inquiry : won</p>
                    <p class='CityTextInfo'>Date : 1/5/23</p>
                    <p class='CityTextInfo'>Status : pending</p>
                </div>
                <div class='inquiryBox'>
                    <p class='CityTextInfo'>Complain : won</p>
                    <p class='CityTextInfo'>Date : 1/5/23</p>
                    <p class='CityTextInfo'>Status : pending</p>
                </div>
            </div>
            <div style="display: flex;flex-direction: column;width: 100%">
                <a href="https://sodabaz.com/MasterMotor/public/create-customer-inquiry/whatsapp" target="blank" class="newTicketButtonFb">New Ticket</a>
                <div class="postSectionFbPosts">
                    <div class="headerPost">
                        <img src="{{ asset('images/face8.jpg') }}" alt="" class='userImg'>
                        <div style="display: flex; flex-direction: column ;     margin-left: 10px;">
                            <p class="nameText">Faysal Bank</p>
                            <p class="dateText">3d</p>
                        </div>
                    </div>
                    <div class="postImg">
                        <img src="{{ asset('images/changan.jpg') }}" alt="" class='postImg'> 
                    </div>
                    <div class="bottomPost">
                        <p class="likesText">reactions 234</p>
                        <p class="commentsText">12 comments</p>
                    </div>
                    <div class="bottomSection">
                        <button class="buttonLike">
                            <img src="{{ asset('images/thmb.png') }}" alt="" class='likeImg'>
                            <p class="likePostText">like</p>
                        </button>
                        <button class="buttonComment" onclick="myFunctionShow()">
                            <img src="{{ asset('images/cht.png') }}" alt="" class='likeImg'>
                            <p class="commentPostText">Comment</p>
                        </button>
                    </div>
                    <div id="para" style='display : none'>
                        <div class="yourCommentDiv">
                            <img src="{{ asset('images/face8.jpg') }}" alt="" class='yourCommentImg' >
                            <input type="text" class="commentInput" placeholder="Write a public comment...">
                        </div>
                        <div class="recentComments">
                            <img src="{{ asset('images/admin.jpg') }}" alt="" class='yourCommentImg' onclick="addSideBar()">
                            <div class="recentCommentsResponseBoxMain">
                                <div class="recentCommentsResponseBox">
                                    <p class="nameOfRecentCommentsUser" onclick="addSideBar()">Bilal Khan</p>
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
    </div>


<script>
    function myFunctionShow() {
        var x = document.getElementById('para');
        // console.log('fffff')
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function replyFunction() {
        var x = document.getElementById('inputReplyDiv');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function subReplyFunction() {
        var x = document.getElementById('inputReplyDiv2nd');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }

    function display(subComment) {
        console.log(subComment);
        var x = document.getElementById('subComment');
        if (x.style.display === "none") {
            x.style.display = "block";
        } else {
            x.style.display = "none";
        }
    }
</script>
   
<script>
 function addSideBar() {
        var x = document.getElementById('leftContainerId');
        var showBar = document.getElementById('showSideBar');
        // console.log('fffff')
        if (x.style.display === "flex") {
            x.style.display = "block";
        } 
        else {
            x.style.display = "none"
            if (x.style.display = "none") {
                showBar.style.display = "block"
            }
        }
    }

    function showRightSection() {
        var a = document.getElementById('leftContainerId');
        var showBar = document.getElementById('showSideBar');
        if (a.style.display === "none") {
            a.style.display = "block";
            showBar.style.display = "none";
        }
    }
</script>
@endsection('content')