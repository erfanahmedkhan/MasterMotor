<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="{{ asset('assets/css/posts-facebook.css') }}">

<head>
</head>

<body>

    {{-- Heaader Section Full Start --}}
    <div class='headerFirstDiv'>
        <div class='headerContainer'>
            <div class='logoContainer'>
                <img src="{{ asset('images/Changan-Auto-logo - black.png') }}" alt="" class='logo'>
                <h2 class='heading'>Hi,Welcome Back</h2>
            </div>
            <div style="display : flex">
                <p class='heading' id="time"></p>
                <p class='headingTime' id="ct7"></p>
            </div>
            <div>
                <button class='button-icons'>
                    <img src="{{ asset('images/icon1.png') }}" class='icons-header'>
                </button>
                <button class='button-icons'>
                    <img src="{{ asset('images/user.png') }}" class='icons-header'>
                </button>

            </div>
        </div>
    </div>
    <div class='headerSecondDiv' id="myHeader">
        <div class="navbarList">
            <div class='headerContainerListOne'>
                <img src="{{ asset('images/Icons/Dashboard.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">Dashboard</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/customers.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">Customers</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/Call.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">Call Center</li>
            </div>

            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/meta.png') }}" alt="" class='header-icon'>
                <li class="navbarListNames">Meta</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/CRMLogs.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">CRM Logs</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/Complaint.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">Complaint Management</li>
            </div>
            <div class='headerContainerList'>
                <img src="{{ asset('images/Icons/inquiry.svg') }}" alt="" class='header-icon'>
                <li class="navbarListNames">Inquiries</li>
            </div>
        </div>
    </div>
    {{-- Heaader Section Full Finish --}}
    <div class="mainContainer">
        <div class="subContainer">
            <div class="leftContainer">
                <div class="linksDiv">
                    <img src="{{ asset('images/003.png') }}" alt="" class='linksImg'>
                    <a href="http://localhost/MasterMotor/public/facebook-posts" class="links">Posts</a>
                </div>
                <div class="linksDiv">
                    <img src="{{ asset('images/01.png') }}" alt="" class='linksImgMessages'>
                    <a href="http://localhost/MasterMotor/public/social-media-facebook" class="links">Messages</a>
                </div>
                <div class="notificationsDiv">
                    <div class="linksDiv">
                        <img src="{{ asset('images/002.png') }}" alt="" class='linksImgMessages'>
                        <a href="#" class="links">Notifications</a>
                    </div>
                    <p class="notificationNumber">2</p>
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
                        <img src="{{ asset('images/admin.jpg') }}" alt="" class='yourCommentImg'>
                        <div class="recentCommentsResponseBoxMain">
                            <div class="recentCommentsResponseBox">
                                <p class="nameOfRecentCommentsUser">Bilal Khan</p>
                                <p class="commentOfRecentCommentsUser">Oh wow! Awesome</p>
                            </div>
                            <div style="display: flex;justify-content: space-around;margin-top: 2px">
                                <p class="recentCommentsLike">Like</p>
                                <div style="display: flex">
                                    <p class="recentCommentsReply">Reply</p>
                                    <p class="recentCommentsReplyTime">5w</p>
                                </div>
                            </div>
                            <div class="subreplyNumbers">
                                <img src="{{ asset('images/arrow.png') }}" alt="" class='arrowImg'>
                                <p class="checkSubReplies" onclick="display()">1 replies</p>
                            </div>
                            
                        </div>
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
                                        <p class="recentCommentsReply">Reply</p>
                                        <p class="recentCommentsReplyTime">5w</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
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
        console.log(p1);
        var x = document.getElementById('p1');
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

</html>
