@extends('template')
@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/call-logs.css') }}">
<div class="mainContainer">
    <div class="subContainer">

        <div class="leftSection">
            <div class="profileDiv">
                <div class="callIconDiv">
                    <img src="{{ asset('images/telephone-call.png') }}" alt="" class='callIcon'>
                </div>
                <div class="detailsDiv">
                    <div class="userDiv">
                        <img src="{{ asset('images/user1.png') }}" alt="" class='profilePic'>
                    </div>
                    <div class="adminInformation">
                        <h1 class="nameAdmin">Irfan Khan</h1>
                        <h1 class="subName">Master Motors</h1>
                    </div>
                    <div class="settings" data-toggle="modal" data-target="#myModal22">
                        <img src="{{ asset('images/settings.png') }}" alt="" class='settingIcon'>
                    </div>
                </div>
                <div class="searchDiv">
                    <form role="search" id="form">
                        <input type="search" id="query" name="q" placeholder="Search people" aria-label="Search through site content">
                        <button>
                            <img src="{{ asset('images/searchIcon.png') }}" alt="" class='settingIcon'>
                        </button>
                    </form>
                </div>
                <div class="userCallDetails">
                    <div class="callDetailsDiv">
                        <div class="callIconDivSuccess">
                            <img src="{{ asset('images/callSuccess.png') }}" alt="" class='callIconSuccess'>
                        </div>
                        <div class="userInformation">
                            <h1 class="nameAdmin">Irfan Khan</h1>
                            <h1 class="subNameText">Missed Call</h1>
                            <h1 class="subNameText" style="color: #000;"> Phone </h1>
                        </div>
                        <div class="timingDiv">
                            <h1 class="subName">08:00</h1>
                        </div>
                    </div>
                    <div class="callDetailsDiv">
                        <div class="callIconDivSuccess">
                            <img src="{{ asset('images/callSuccess.png') }}" alt="" class='callIconSuccess'>
                        </div>
                        <div class="userInformation">
                            <h1 class="nameAdmin">Irfan Khan</h1>
                            <h1 class="boundText">InBound Call</h1>
                            <h1 class="subNameText" style="color: #000;"> Landline </h1>
                        </div>
                        <div class="timingDiv">
                            <h1 class="subName">08:00</h1>
                        </div>
                    </div>
                    <div class="callDetailsDiv">
                        <div class="callIconDivSuccess">
                            <img src="{{ asset('images/callSuccess.png') }}" alt="" class='callIconSuccess'>
                        </div>
                        <div class="userInformation">
                            <h1 class="nameAdmin">Irfan Khan</h1>
                            <h1 class="subNameText">Missed Call</h1>
                            <h1 class="subNameText" style="color: #000;"> Phone </h1>
                        </div>
                        <div class="timingDiv">
                            <h1 class="subName">08:00</h1>
                        </div>
                    </div>
                    <div class="callDetailsDiv">
                        <div class="callIconDivSuccess">
                            <img src="{{ asset('images/callSuccess.png') }}" alt="" class='callIconSuccess'>
                        </div>
                        <div class="userInformation">
                            <h1 class="nameAdmin">Irfan Khan</h1>
                            <h1 class="subNameText">Missed Call</h1>
                            <h1 class="subNameText" style="color: #000;"> Landline </h1>
                        </div>
                        <div class="timingDiv">
                            <h1 class="subName">08:00</h1>
                        </div>
                    </div>
                    <div class="callDetailsDiv">
                        <div class="callIconDivSuccess">
                            <img src="{{ asset('images/callSuccess.png') }}" alt="" class='callIconSuccess'>
                        </div>
                        <div class="userInformation">
                            <h1 class="nameAdmin">Irfan Khan</h1>
                            <h1 class="subNameText">Missed Call</h1>
                            <h1 class="subNameText" style="color: #000;"> Phone </h1>
                        </div>
                        <div class="timingDiv">
                            <h1 class="subName">08:00</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="rightSection">
            <div class="headerRightSection">
                <h1 class="nameAdminHeader">Irfan Khan <span>
                        <h6 style="font-size:11px;">+923021234567</h6>
                    </span></h1>

                <div class="buttonsTwo">
                    <a href='{{ url('call-receive-details') }}'  class="viewDetails">View Details</a>
                    <button class="callIconButton">
                        <img src="{{ asset('images/calls.png') }}" alt="" class='callButtonIcon'>
                    </button>
                </div>
            </div>
            <div class="rightSectionBottom">
                <div class="innerSection">
                    <div class="subInnerSection">
                        <img src="{{ asset('images/callAbondened.png') }}" alt="" class='callIconSuccess'>
                        <h1 class="missCallText">Missed Call</h1>
                    </div>
                    <h1 class="innerText"> Good </h1>
                    <h1 class="innerText">08:00 pm</h1>
                    <h1 class="innerText">22/06/2023</h1>
                    <h1 class="innerText">0 min</h1>
                    <h1 class="innerText"> Complain </h1>
                </div>
                <div class="innerSection">
                    <div class="subInnerSection">
                        <img src="{{ asset('images/callSuccess.png') }}" alt="" class='callIconSuccess'>
                        <h1 class="inboundCallText">Inbound Call</h1>
                    </div>
                    <h1 class="innerText"> high </h1>
                    <h1 class="innerText">10:00 am</h1>
                    <h1 class="innerText">11/02/2022</h1>
                    <h1 class="innerText">10 min</h1>
                    <h1 class="innerText"> Service </h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal22" class="modal fade in" role="dialog" tabindex="-1" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Conference</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <iframe allow="microphone *; camera *; autoplay *" allowfullscreen="true" frameborder="0" width="350" height="500" src="{{ route('Dailer') }}" name="wphone" id="webphoneframe"></iframe>
                <script>
                    function ismobilebrowser() {
                        var check = false;
                        (function(a) {
                            if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i
                                .test(a) ||
                                /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i
                                .test(a.substr(0, 4))) check = true;
                        })(navigator.userAgent || navigator.vendor || window.opera);
                        return check;
                    }
                    if (ismobilebrowser()) {
                        document.getElementsByTagName('body')[0].style.marginTop = '0px';
                        var frm = document.getElementById('webphoneframe');
                        frm.setAttribute("style", "width:100%; height:100%");
                        frm.style.width = '100%';
                        frm.style.height = '100vh';
                    }
                </script>
            </div>
        </div>
    </div>
</div>
@endsection('content')