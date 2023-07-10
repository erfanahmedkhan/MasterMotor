@extends('template')

@section('content')

<link rel="stylesheet" href="{{ asset('assets/css/posts-facebook.css') }}">


   
    <div class="mainContainer">
        <div class="subContainer">
            <div class="leftContainer" id="leftContainerId">
                <div class="linksDiv">
                    <img src="{{ asset('images/003.png') }}" alt="" class='linksImg'>
                    <a href="http://localhost/MasterMotor/public/facebook-posts" class="links">Posts</a>
                </div>
                <div class="linksDiv">
                    <img src="{{ asset('images/01.png') }}" alt="" class='linksImgMessages'>
                    <a href="http://localhost/MasterMotor/public/social-media-facebook" class="links">Messages</a>
                </div>
                <div class="notificationsDiv">
                    <div class="linksDivIcon">
                        <img src="{{ asset('images/002.png') }}" alt="" class='linksImgMessages'>
                        <a href="#" class="links">Notifications</a>
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
            <div class="postSection">
                <div class="headerPost">
                    <img src="{{ asset('images/face8.jpg') }}" alt="" class='userImg'>
                    <div style="display: flex; flex-direction: column ;     margin-left: 10px;">
                        <p class="nameText">Faysal Bank</p>
                        <p class="dateText">3d</p>
                    </div>
                </div>
                <div class="postImg">
                    {{-- <img src="{{ asset('images/banner1.png') }}" alt="" class='postImg'> --}}
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
                    <button class="buttonComment" onclick="myFunction()">
                        <img src="{{ asset('images/cht.png') }}" alt="" class='likeImg'>
                        <p class="commentPostText">Comment</p>
                    </button>
                </div>
                <div id="p1">
                    <div class="yourCommentDiv">
                        <img src="{{ asset('images/face8.jpg') }}" alt="" class='yourCommentImg'>
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


<script>
    function display_ct7() {
        var x = new Date()
        var ampm = x.getHours() >= 12 ? ' PM' : ' AM';
        hours = x.getHours() % 12;
        hours = hours ? hours : 12;
        hours = hours.toString().length == 1 ? 0 + hours.toString() : hours;

        var minutes = x.getMinutes().toString()
        minutes = minutes.length == 1 ? 0 + minutes : minutes;



        var month = (x.getMonth() + 1).toString();
        month = month.length == 1 ? 0 + month : month;

        var dt = x.getDate().toString();
        dt = dt.length == 1 ? 0 + dt : dt;

        var x1 = month + "-" + dt + "-" + x.getFullYear();
        x1 = x1 + "  " + hours + ":" + minutes + " " + ampm;
        document.getElementById('ct7').innerHTML = x1;
        display_c7();
    }

    function display_c7() {
        var refresh = 1000; // Refresh rate in milli seconds
        mytime = setTimeout('display_ct7()', refresh)
    }
    display_c7()
</script>
<script>
    function myFunction(p1) {
        var x = document.getElementById('p1');
        console.log('fffff')
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


@endsection
