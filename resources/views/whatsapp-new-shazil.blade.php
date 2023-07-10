  <link rel="stylesheet" href="{{ asset('assets/css/whatsapp.css') }}">
  <link rel="shortcut-icon" href="../../images/favicon.png" />
  @extends('template')

  @section('content')

      <head>
          <script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
          <script>
              let arr = [{
                      name: 'Shahzil',
                      image: shortcut - icon,
                      status: 'online',
                      time: '5 hr ago',
                      message: 'Oh, hello! All ok'
                  },
                  {
                      name: 'Bilal',
                      image: shortcut - icon,
                      status: 'offline',
                      time: '2 hr ago',
                      message: 'Oh, F***!'
                  },
                  {
                      name: 'Ahsan',
                      image: shortcut - icon,
                      status: 'online',
                      time: '1 hr ago',
                      message: 'Oh, hello! All Done?'
                  }
              ]


              $(document).ready(function() {

                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                  $('#search').on('keyup', function() {
                      $value = $(this).val();
                      $.ajax({
                          type: 'POST',
                          url: "{{ url('search-contacts') }}",
                          data: {
                              'search': $value
                          },
                          proccessing: true,
                          success: function(data) {
                              $('.inbox_chat').html(data);
                          }
                      });
                  });

                  $('#search_chat').on('keyup', function() {
                      $value = $(this).val();
                      var client_number = $('#client_number').val();
                      $.ajax({
                          type: 'POST',
                          url: "{{ url('search-chat') }}",
                          data: {
                              'search_chat': $value,
                              'number': client_number
                          },
                          proccessing: true,
                          success: function(data) {
                              $('.msg_history').html(data);
                              // console.log(data);
                          }
                      });
                  });

              });


              function getChatNumber(number) {
                  $("#chatroom").show();
                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                  $.ajax({
                      type: 'POST',
                      url: "{{ url('get-chats') }}",
                      data: {
                          number: number
                      },
                      success: function(response) {
                          // console.log(response);
                          $(".msg_history").html(response);
                          $(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);
                          $(".type_msg").show();
                          $("#whatsapp_logo").hide(response);
                      }
                  });
              }

              function sendmsg() {
                  var senders_name = $('#senders_name').val();
                  var client_number = $('#client_number').val();
                  var whats_number = $('#whats_number').val();
                  var msg_type = $('#msg_type').val();
                  var msg = $('#msg').val();

                  $.ajaxSetup({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      }
                  });

                  $.ajax({
                      type: 'POST',
                      url: "{{ url('send-msg') }}",
                      data: {
                          msg: msg,
                          sender_name: senders_name,
                          whats_number: whats_number,
                          msg_type: msg_type,
                          client_number: client_number
                      },
                      dataType: "json",
                      success: function(RecordSet) {
                          console.log(RecordSet);
                          // var dateTime = $("#date").val();
                          $(".msg_history").append(
                              "<div class='outgoing_msg'><div class='outgoing_msg_img ml-2'><img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'></div><div class='sent_msg'><p>" +
                              RecordSet.return_data[0].message + "</p><span id='time_date'></span></div></div>");
                          $(".msg_history").scrollTop($(".msg_history")[0].scrollHeight);

                      }
                  });
                  document.getElementById("msg").value = "";
              }




              function dialerClick(type, value) {
                  let input = $('#dialer_input_td input');
                  let input_val = $('#dialer_input_td input').val();
                  if (type == 'dial') {
                      input.val(input_val + value);
                  } else if (type == 'delete') {
                      input.val(input_val.substring(0, input_val.length - 1));
                  } else if (type == 'clear') {
                      input.val("");
                  }
              }
          </script>

          <style>
          @font-face {
    font-family: Poppins-Regular;
    src: url('../../../public/Fonts/Poppins-Regular.ttf');
}

@font-face {
    font-family: Poppins-Bold;
    src: url('../../../public/Fonts/Poppins-Bold.ttf');
}
              .type_msg {
                  display: none;
              }

              .headind_srch {
                  padding: 10px 29px 10px 20px;
                  overflow: hidden;
                  border-bottom: 1px solid #c4c4c4;
              }


              .recent_heading {
                  float: left;
                  width: 40%;
              }


              #chatroom {
                  display: none;
              }


              label {
                  font-size: 80%;
              }

              .srch_bar {
                  display: inline-block;
                  text-align: right;
                  width: 60%;
              }


              .srch_bar input {
                  border: 1px solid #cdcdcd;
                  border-width: 0 0 1px 0;
                  width: 80%;
                  padding: 2px 0 4px 6px;
                  background: none;
              }

              .srch_bar .input-group-addon button {
                  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                  border: medium none;
                  padding: 0;
                  color: #707070;
                  font-size: 18px;
              }

              .srch_bar .input-group-addon {
                  margin: 0 0 0 -27px;
              }

              .chat_ib h5 {
                  font-size: 15px;
                  color: #464646;
                  margin: 0 0 8px 0;
              }

              .chat_ib h5 span {
                  font-size: 13px;
                  float: right;
              }

              .chat_ib p {
                  font-size: 14px;
                  color: #989898;
                  margin: auto
              }

              .chat_img {
                  float: left;
                  width: 11%;
              }

              .recent_heading h4 {
                  color: #05728f;
                  font-size: 21px;
                  margin: auto;
              }


              .messagetyping {
                  border: none !important;
                  overflow-y: hidden !important;
              }

              .profiletext {
                  color: black;
                  font-weight: bold;
              }

              .profilenumber {
                  color: black;
                  font-weight: bold;
                  font-size: 13px !important;

              }

              .btn-primary:hover {
                  box-sizing: border-box !important;
                  background-color: #f58935 !important;
                  color: white !important;
                  border: 1px solid #f58935 !important;
              }

              .card-body {
                  /* background-color: black !important; */
                  padding: 0 !important;

              }

              #details {
                  width: 10vw !important;
                  border-radius: 25px !important;

              }

              #whatsapp {
                  text-align: center !important;

              }


              .danger {
                  color: red !important;
              }

              .archievedanger {
                  box-sizing: border-box !important;

                  padding: 5% !important;
                  color: red !important;
              }

              .danger span {
                  color: red !important;
              }

              .call {
                  background-color: lightgrey !important;
                  border-radius: 100% !important;
                  padding: 2% !important;
                  font-size: 5vh;
              }

              .call-details {
                  color: grey !important;
              }

              /* span {
                                                                                                    font-weight: bold !important;
                                                                                                } */

              #callLogTH {
                  box-sizing: border-box !important;
                  margin-left: 25px !important;

                  background-color: #dee2e6 !important;
                  color: black !important;

              }

              #callLogTH :a {
                  box-sizing: border-box !important;
                  margin-left: 25px !important;

                  background-color: white !important;
                  color: black !important;

              }


              #thCallLog {
                  padding-left: 4% !important;
              }

              #archievehistory {
                  color: grey !important;
              }

              /* #viewdetails {
                                                                                                    background-color: #00a884 !important;
                                                                                                    width: 8vw !important;
                                                                                                    margin-top: 2px !important;
                                                                                                    border-radius: 25px !important;
                                                                                                    padding: 4px !important;
                                                                                                    border-color: #00a884;
                                                                                                }
                                                                                         

                                                                                                #viewdetails:hover {
                                                                                                    background-color: #00a884 !important;
                                                                                                    width: 8vw !important;
                                                                                                    margin-top: 2px !important;
                                                                                                    border-radius: 25px !important;
                                                                                                    padding: 4px !important;
                                                                                                    border-color: #00a884 !important;
                                                                                                    font-weight: bold;
                                                                                                } */

              #callmd8 {
                  border-radius: 25px !important;
                  padding: 4px !important;
              }

              .fa-user-plus {
                  font-size: 4vh !important;

                  text-align: center !important;
                  padding-bottom: 10px !important;
              }

              .fa-plus {
                  font-size: 3vh !important;
                  text-align: center !important;
                  padding-bottom: 10px !important;
              }

              #fa-plus {
                  width: 8vw !important;
                  margin-top: 2px !important;
                  border-radius: 25px !important;
                  padding: 4px !important;
              }

              .status {
                  color: #28a745 !important;
              }

              .viewbutton {
                  width: 8vw !important;
                  border-radius: 25px !important;
                  padding: 4px !important;
                  background-color: #17467e !important;
                  color: white !important;
              }

              .ui-widget-header {
                  border: 1px solid transparent;
                  background: transparent;
                  font-weight: bold;
              }

              #statusremarks {
                  visibility: visible;
                  display: none;
              }

              #otherreason {
                  visibility: visible;
                  display: none;
              }

              #savecomplain:hover {
                  box-sizing: border-box !important;
                  background-color: #17467e !important;
                  border: 1px solid #17467e !important;
              }

              #saveinquiry:hover {
                  box-sizing: border-box !important;
                  background-color: #17467e !important;
                  border: 1px solid #17467e !important;
              }

              #allilcf li {
                  font-weight: bold !important;
              }

              #facebook {
                  float: right !important;
                  box-sizing: border-box !important;
                  width: 10vw !important;
                  background-color: #fff !important;
                  color: #4267B2 !important;
                  font-weight: bold !important;
                  border: 2px solid #4267B2 !important;
              }

              #facebook:hover {
                  float: right !important;
                  box-sizing: border-box !important;
                  width: 10vw !important;
                  background-color: #4267B2 !important;
                  color: #fff !important;
                  font-weight: bold !important;
                  border: 2px solid #4267B2 !important;
              }


              #whatsapp {
                  float: right !important;
                  box-sizing: border-box !important;
                  width: 10vw !important;
                  background-color: #28a745 !important;
                  color: #fff !important;
                  font-weight: bold !important;
                  border: 2px solid #00a884 !important;
              }


              #instagram {
                  float: right !important;
                  box-sizing: border-box !important;
                  width: 10vw !important;
                  background-color: #fff !important;
                  color: #e95950 !important;
                  font-weight: bold !important;
                  background-color: 2px solid #e95950;
                  border: 2px solid #e95950 !important;
              }

              #instagram:hover {

                  box-sizing: border-box !important;
                  width: 10vw !important;
                  background-color: #e95950 !important;
                  color: white !important;
                  font-weight: bold !important;
                  background-color: 2px solid #e95950;
              }



              .ui-state-active {
                  background-color: #17467e !important;
              }

              a:active {
                  background-color: yellow;
              }

              .badge-danger {
                  border-radius: 100% !important;
                  height: 2vh !important;
                  display: none;
              }

              .badge-success {
                  border-radius: 100% !important;
                  height: 2vh !important;
                  display: none;
              }

              #instagramdiv {
                  background-color: #dee2e6;
                  border-radius: 25px !important;
                  padding: 4px !important;
              }

              #archives {
                  background-color: white !important;

              }

              #senddiv {
                  border-radius: 25px;
              }

              /* link https://bootsnipp.com/snippets/1ea0N */

              img {
                  max-width: 100%;
              }

              .inbox_people {
                  background: #fff none repeat scroll 0 0;
                  float: left;
                  overflow: hidden;
                  width: 100%;
                  border-right: 1px solid #c4c4c4;

              }


              .top_spac {
                  margin: 20px 0 0;
              }







              .srch_bar .input-group-addon button {
                  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                  border: medium none;
                  padding: 0;
                  color: #707070;
                  font-size: 18px;
              }

              .srch_bar .input-group-addon {
                  margin: 0 0 0 -27px;
              }

              .chat_ib h5 {
                  font-size: 15px;
                  color: #464646;
                  margin: 0 0 8px 0;
              }

              .chat_ib h5 span {
                  font-size: 13px;
                  float: right;
              }

              .chat_ib p {
                  font-size: 14px;
                  color: #989898;
                  margin: auto
              }

              .chat_img {
                  float: left;
                  width: 11%;
              }

              .chat_ib {
                  float: left;
                  padding: 0 0 0 15px;
                  width: 88%;
              }

              .chat_people {
                  overflow: hidden;
                  clear: both;
              }

              .chat_list {
                  border-bottom: 1px solid #c4c4c4;
                  margin: 0;
                  padding: 18px 16px 10px;
              }

              {{-- .inbox_chat {
                  height: 53vh;
                  overflow-y: scroll;
                  overflow-x: hidden;
                  padding: 0 !important;
              }

              .inbox_chat::-webkit-scrollbar {
                  width: 5px;

              }

              .inbox_chat::-webkit-scrollbar-track {
                  background-color: #fff;
              }

              .inbox_chat::-webkit-scrollbar-thumb {
                  background: #28a745;
              } --}} .msg_history::-webkit-scrollbar {
                  width: 5px;
              }

              .msg_history::-webkit-scrollbar-track {
                  background-color: #fff;
              }

              .msg_history::-webkit-scrollbar-thumb {
                  background: #28a745;
              }

              .active_chat {
                  background: #ebebeb;
              }

              .incoming_msg_img {
                  display: inline-block;
                  width: 6%;
              }

              .outgoing_msg_img {
                  float: right;
                  width: 6%;
              }



              .received_msg {
                  display: inline-block;
                  padding: 0 0 0 10px;
                  vertical-align: top;
                  width: 92%;
              }

              .received_withd_msg p {
                  background: #ebebeb none repeat scroll 0 0;
                  border-radius: 25px;
                  color: #646464;
                  font-size: 14px;
                  margin: 0;
                  padding: 5px 10px 5px 12px;
                  width: 100%;
              }

              .time_date {
                  color: #747474;
                  display: block;
                  font-size: 12px;
                  margin: 8px 0 0;
              }

              .received_withd_msg {
                  width: fit-content;
              }

              .mesgs {
                  float: left;
                  padding: 0px 0px 0px 0px;
                  width: 100%;

              }

              .sent_msg p {
                  background: #28a745 none repeat scroll 0 0;
                  border-radius: 25px;
                  font-size: 14px;
                  margin: 0;
                  color: #fff;
                  padding: 5px 10px 5px 12px;
                  width: 100%;


              }

              .outgoing_msg {
                  overflow: hidden;
                  margin: 26px 0 26px;
              }

              .sent_msg {
                  background-color: 25D366;

                  float: right;
                  width: fit-content !important;

              }

              .input_msg_write input {
                  background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
                  border: medium none;
                  color: #4c4c4c;
                  font-size: 15px;
                  min-height: 48px;
                  width: 100%;
              }

              .type_msg {
                  border-top: 1px solid #c4c4c4;
                  position: relative;
              }

              .msg_send_btn {
                  background: #05728f none repeat scroll 0 0;
                  border: medium none;
                  border-radius: 50%;
                  color: #fff;
                  cursor: pointer;
                  font-size: 17px;
                  height: 33px;
                  position: absolute;
                  right: 0;
                  top: 11px;
                  width: 33px;
              }

              .messaging {
                  padding: 0 0 50px 0;
              }

              .msg_history {
                  background-color: #fff;
                  height: 53vh;
                  overflow-y: scroll;
              }

              .msg_history ::-webkit-scrollbar-thumb {
                  background: #28a745;


                  height: 350px;
                  overflow-y: scroll;
              }

              #dialer_table {
                  width: 100%;
                  font-size: 1.5em;
              }

              #dialer_table tr td {
                  text-align: center;
                  height: 50px;
                  width: 33%;
              }

              /*#dialer_table #dialer_input_td {*/
              /*    border-bottom: 1px solid #fafafa;*/
              /*}*/

              /*#dialer_table #dialer_input_td input {*/
              /*    width: 100%;*/
              /*    border: none;*/
              /*    font-size: 1.6em;*/
              /*}*/

              /* Remove arrows from type number input : Chrome, Safari, Edge, Opera */
              /*#dialer_table #dialer_input_td input::-webkit-outer-spin-button,*/
              /*#dialer_table #dialer_input_td input::-webkit-inner-spin-button {*/
              /*    -webkit-appearance: none;*/
              /*    margin: 0;*/
              /*}*/

              /* Remove arrows from type number input : Firefox */
              /*#dialer_table #dialer_input_td input[type=number] {*/
              /*    -moz-appearance: textfield;*/
              /*}*/

              #dialer_table #dialer_input_td input::placeholder {
                  /* Chrome, Firefox, Opera, Safari 10.1+ */
                  /*    color: #cccccc;*/
                  opacity: 1;
                  /* Firefox */
                  /*}*/

                  #dialer_table #dialer_input_td input:-ms-input-placeholder {
                      /* Internet Explorer 10-11 */
                      /*    color: #cccccc;*/
                      /*}*/

                      #dialer_table #dialer_input_td input::-ms-input-placeholder {
                          /* Microsoft Edge */
                          /*    color: #cccccc;*/
                          /*}*/


                          #dialer_table #dialer_call_btn_td {
                              color: #ffffff;
                              background-color: green;
                              border: none;
                              cursor: pointer;
                              width: 100%;
                              text-decoration: none;
                              padding: 5px 32px;
                              text-align: center;
                              display: inline-block;
                              margin: 10px 2px 4px 2px;
                              transition: all 300ms ease;
                              -moz-transition: all 300ms ease;
                              --webkit-transition: all 300ms ease;
                          }

                          #dialer_table #dialer_call_btn_td:hover {
                              background-color: #009d00;
                          }

                          #dialer_table .dialer_num_tr td {
                              -webkit-touch-callout: none;
                              /* iOS Safari */
                              -webkit-user-select: none;
                              /* Safari */
                              -khtml-user-select: none;
                              /* Konqueror HTML */
                              -moz-user-select: none;
                              /* Old versions of Firefox */
                              -ms-user-select: none;
                              /* Internet Explorer/Edge */
                              user-select: none;
                              /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
                              cursor: pointer;
                          }

                          #dialer_table .dialer_num_tr td:nth-child(1) {
                              border-right: 1px solid #fafafa;
                          }

                          #dialer_table .dialer_num_tr td:nth-child(3) {
                              border-left: 1px solid #fafafa;
                          }

                          #dialer_table .dialer_num_tr:nth-child(1) td,
                          #dialer_table .dialer_num_tr:nth-child(2) td,
                          #dialer_table .dialer_num_tr:nth-child(3) td,
                          #dialer_table .dialer_num_tr:nth-child(4) td {
                              border-bottom: 1px solid #fafafa;
                          }

                          #dialer_table .dialer_num_tr .dialer_num {
                              color: #0B559F;
                              cursor: pointer;
                          }

                          #dialer_table .dialer_num_tr .dialer_num:hover {
                              background-color: #fafafa;
                          }

                          #dialer_table .dialer_num_tr:nth-child(0) td {
                              border-top: 1px solid #fafafa;
                          }

                          #dialer_table .dialer_del_td img {
                              cursor: pointer;
                          }

                          input {
                              width: 66%;
                              border-radius: 26px;
                              border: 1px solid #ada9a9;
                              padding: 1% 6%;
                              margin: 1% 1%;
                              background-image: url(https://www.pngarea.com/pngm/109/1164446_searchicon-png-search-icon-png-download.png);
                              background-size: contain;
                              background-repeat: no-repeat;
                              outline: 0;
                              background-position: 12px;
                              background-size: 16px;
                          }

                          .searchBarContainer {
                              width: 70%;
                              height: 20vh;
                              background: #05728f;
                          }
          </style>


      </head>

      <body>
          <!-- WhatsaApp Facebook Instagram Buttons -->
          <div class="container ">
              <!-- row starts -->
              <div class="row mt-3">
                  <div class="col-md-12">
                      <div class="row">
                          <div class="col-md-12 mt-1">
                              <i class="fa fa-arrow-circle-left text text-danger" onclick="goback()"
                                  style="cursor: pointer; font-size: 20px"></i>
                              <strong class="card-title">Social Media</strong>


                              <a href="social-media-instagram" active>
                                  <button type="button" class="btn ml-2 mr-2" id="instagram" active
                                      style="background-color: yellow;">
                                      <i class="fa-brands fa-instagram"></i> Instagram
                                  </button>
                              </a>

                              <a href="social-media-facebook">
                                  <button type="button" class="btn " style="float: right; width:10vw;" id="facebook">
                                      <i class="fa-brands fa-facebook"></i> Facebook
                                  </button>
                              </a>

                              <a href="">
                                  <button type="button" class="btn btn-success ml-2 mr-2 "
                                      style="float: right; color:white; width:10vw;" id="whatsapp">
                                      <i class="fa-brands fa-whatsapp"></i> WhatsApp
                                  </button>
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- row ends  -->
          </div>
          <!-- WhatsaApp Facebook Instagram Buttons -->

          <!-- container starts -->
          <div class="container mt-3" style="box-sizing: border-box;">

              @if (session('msg'))
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <strong>{{ session('msg') }}</strong>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              @endif

              <div class="mainConatinerChat">

                  <div class="inbox_msg">
                      <div class='mainContainerLeftSection'>
                          <form>
                              <button type="submit">Search</button>
                              <input type="search" placeholder="Enter for searchSearchSearch">
                          </form>

                          <div class='mainChatBox'>
                              <div class='chatListBox'>
                                  <div class='subChat'>
                                      <div class='profImgDiv'>
                                          <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImg'>
                                      </div>
                                      <div class='nameStatusDiv'>
                                          <div>
                                              <p class='nameText'>Shahzil</p>
                                          </div>
                                          <div>
                                              <p class='statusText'>Online</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div>
                                      <p class='statusText'>6 hr ago</p>
                                  </div>
                              </div>
                              <div>
                                  <p class='meassageText'>Oh, hello! How are u doing bitch</p>
                              </div>
                          </div>
                          <div class='mainChatBox'>
                              <div class='chatListBox'>
                                  <div class='subChat'>
                                      <div class='profImgDiv'>
                                          <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImg'>
                                      </div>
                                      <div class='nameStatusDiv'>
                                          <div>
                                              <p class='nameText'>Bilal</p>
                                          </div>
                                          <div>
                                              <p class='statusText'>Online</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div>
                                      <p class='statusText'>5 hr ago</p>
                                  </div>
                              </div>
                              <div>
                                  <p class='meassageText'>Oh, hello! How are u doing bitch</p>
                              </div>
                          </div>
                          <div class='mainChatBox'>
                              <div class='chatListBox'>
                                  <div class='subChat'>
                                      <div class='profImgDiv'>
                                          <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImg'>
                                      </div>
                                      <div class='nameStatusDiv'>
                                          <div>
                                              <p class='nameText'>Ahsan</p>
                                          </div>
                                          <div>
                                              <p class='statusText'>Online</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div>
                                      <p class='statusText'>6 hr ago</p>
                                  </div>
                              </div>
                              <div>
                                  <p class='meassageText'>Oh, hello! How are u doing bitch</p>
                              </div>
                          </div>
                          <div class='mainChatBox'>
                              <div class='chatListBox'>
                                  <div class='subChat'>
                                      <div class='profImgDiv'>
                                          <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImg'>
                                      </div>
                                      <div class='nameStatusDiv'>
                                          <div>
                                              <p class='nameText'>Rameez</p>
                                          </div>
                                          <div>
                                              <p class='statusText'>Online</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div>
                                      <p class='statusText'>6 hr ago</p>
                                  </div>
                              </div>
                              <div>
                                  <p class='meassageText'>Oh, hello! How are u doing bitch</p>
                              </div>
                          </div>
                          <div class='mainChatBox'>
                              <div class='chatListBox'>
                                  <div class='subChat'>
                                      <div class='profImgDiv'>
                                          <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImg'>
                                      </div>
                                      <div class='nameStatusDiv'>
                                          <div>
                                              <p class='nameText'>Shahzil</p>
                                          </div>
                                          <div>
                                              <p class='statusText'>Online</p>
                                          </div>
                                      </div>
                                  </div>
                                  <div>
                                      <p class='statusText'>6 hr ago</p>
                                  </div>
                              </div>
                              <div>
                                  <p class='meassageText'>Oh, hello! How are u doing bitch</p>
                              </div>
                          </div>




                      </div>
                  </div>

                  <div class="inbox_chat">

                      <div class='chat_header'>
                          <div class='chatHeaderBox'>
                              <div class='subHeaderChat'>
                                  <div class='profImgDiv'>
                                      <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImg'>
                                  </div>
                                  <div class='nameStatusDiv'>
                                      <div>
                                          <p class='HeaderNameText'>Shahzil</p>
                                      </div>
                                      <div>
                                          <p class='HeaderStatusText'>Offline . Last seen 6 hr ago</p>
                                      </div>
                                  </div>
                              </div>

                          </div>
                      </div>

                      <div class='chat_messages_div'>
                          <div class='incomingMessageDiv'>
                              <img src="{{ asset('images/admin.jpg') }}" alt=""
                                  class='chat_messages_profile_img'>
                              <div class='incomingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div'>
                              <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                          </div>
                          <div class='incomingMessageDiv'>
                              <img src="{{ asset('images/admin.jpg') }}" alt=""
                                  class='chat_messages_profile_img'>
                              <div class='incomingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div'>
                              <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                          </div>
                          {{-- <div class='outgoingMessage'></div> --}}
                           <div class='outgoingMessageDiv'>
                              <div class='outgoingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div_outgoing'>
                              <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                               <img src="{{ asset('images/admin.jpg') }}" alt="" class='chat_messages_profile_img'>
                          </div>
                             <div class='outgoingMessageDiv'>
                              <div class='outgoingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div_outgoing'>
                              <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                               <img src="{{ asset('images/admin.jpg') }}" alt="" class='chat_messages_profile_img'>
                          </div>
                           <div class='incomingMessageDiv'>
                              <img src="{{ asset('images/admin.jpg') }}" alt=""
                                  class='chat_messages_profile_img'>
                              <div class='incomingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div'>
                              <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                          </div>
                           <div class='outgoingMessageDiv'>
                              <div class='outgoingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div_outgoing'>
                              <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                               <img src="{{ asset('images/admin.jpg') }}" alt="" class='chat_messages_profile_img'>
                          </div>
                      </div>

                      <div class='send_chat'>
                          <form class='formMessage'>
                              <img src="{{ asset('images/attachement.png') }}" alt="" class='attachementImg'>
                              <input type="search" placeholder="Enter for search" class='inputTypeMessage'>
                              <img src="{{ asset('images/voice-search.png') }}" alt="" class='voiceSearch'>
                              <img src="{{ asset('images/send.png') }}" alt="" class='sendButton'>
                          </form>
                      </div>
                  </div>

                  <div class='inbox_details'>

                      <div class='upper-container'>

                          <img src="{{ asset('images/admin.jpg') }}" alt="" class='profImgInfo'>
                          <p class='NameTextInfo'>Shahzil</p>
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

              </div>


              <!--Add new customer modal -->
              <div class="modal fade" id="dialer_modal" tabindex="-1" aria-labelledby="dialer_modal_label"
                  aria-hidden="true">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                          <form action="{{ url('add-whatsapp-contact') }}" method="POST">
                              @csrf
                              <div class="modal-header">
                                  <h5 class="modal-title" id="dialer_modal_label">Add new contact</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                              </div>
                              <div class="modal-body">
                                  <table id="dialer_table">
                                      <tr>
                                          <td colspan="3">
                                              <label>Customer name <span class="asterisk text-danger">*</span></label>
                                              <input type="text" name="contact_name" class="form-control" required
                                                  placeholder="Customer name">
                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="3">
                                              <label>Email address</label>
                                              <input type="email" name="email" class="form-control"
                                                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                                  placeholder="Email address">
                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="3">
                                              <label>Select City <i class='text-danger'>*</i></label>
                                              <select class="form-control bg-white standardSelect" name="city"
                                                  id="city" required onchange="Getcity(this.value)">
                                                  <option value="">Select City</option>
                                                  @foreach ($city as $cities)
                                                      <option value="{{ $cities->id }}">{{ $cities->city }}</option>
                                                  @endforeach
                                              </select>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td id="dialer_input_td" colspan="3">
                                              <label>Contact number <span class="asterisk text-danger">*</span></label>
                                              <input type="text" name="phone_number" pattern="[0-9]{12}"
                                                  class="form-control" required placeholder="92xxxxxxxxxx"
                                                  title="Max length is 12">
                                          </td>
                                      </tr>

                                      <tr class="dialer_num_tr">
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 1)">1
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 2)">2
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 3)">3
                                          </td>
                                      </tr>
                                      <tr class="dialer_num_tr">
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 4)">4
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 5)">5
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 6)">6
                                          </td>
                                      </tr>
                                      <tr class="dialer_num_tr">
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 7)">7
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 8)">8
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 9)">9
                                          </td>
                                      </tr>
                                      <tr class="dialer_num_tr">
                                          <td class="dialer_del_td">
                                              <img alt="clear" onclick="dialerClick('clear', 'clear')"
                                                  src="data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhcyIgZGF0YS1pY29uPSJlcmFzZXIiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWVyYXNlciBmYS13LTE2IGZhLTd4Ij48cGF0aCBmaWxsPSIjYjFiMWIxIiBkPSJNNDk3Ljk0MSAyNzMuOTQxYzE4Ljc0NS0xOC43NDUgMTguNzQ1LTQ5LjEzNyAwLTY3Ljg4MmwtMTYwLTE2MGMtMTguNzQ1LTE4Ljc0NS00OS4xMzYtMTguNzQ2LTY3Ljg4MyAwbC0yNTYgMjU2Yy0xOC43NDUgMTguNzQ1LTE4Ljc0NSA0OS4xMzcgMCA2Ny44ODJsOTYgOTZBNDguMDA0IDQ4LjAwNCAwIDAgMCAxNDQgNDgwaDM1NmM2LjYyNyAwIDEyLTUuMzczIDEyLTEydi00MGMwLTYuNjI3LTUuMzczLTEyLTEyLTEySDM1NS44ODNsMTQyLjA1OC0xNDIuMDU5em0tMzAyLjYyNy02Mi42MjdsMTM3LjM3MyAxMzcuMzczTDI2NS4zNzMgNDE2SDE1MC42MjhsLTgwLTgwIDEyNC42ODYtMTI0LjY4NnoiIGNsYXNzPSIiPjwvcGF0aD48L3N2Zz4="
                                                  width="22px" title="Clear" />
                                          </td>
                                          <td class="dialer_num" style="cursor:pointer;"
                                              onclick="dialerClick('dial', 0)">0
                                          </td>
                                          <td class="dialer_del_td">
                                              <img alt="delete" onclick="dialerClick('delete', 'delete')"
                                                  src="data:image/svg+xml;base64,PHN2ZyBhcmlhLWhpZGRlbj0idHJ1ZSIgZm9jdXNhYmxlPSJmYWxzZSIgZGF0YS1wcmVmaXg9ImZhciIgZGF0YS1pY29uPSJiYWNrc3BhY2UiIHJvbGU9ImltZyIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB2aWV3Qm94PSIwIDAgNjQwIDUxMiIgY2xhc3M9InN2Zy1pbmxpbmUtLWZhIGZhLWJhY2tzcGFjZSBmYS13LTIwIGZhLTd4Ij48cGF0aCBmaWxsPSIjREMxQTU5IiBkPSJNNDY5LjY1IDE4MS42NWwtMTEuMzEtMTEuMzFjLTYuMjUtNi4yNS0xNi4zOC02LjI1LTIyLjYzIDBMMzg0IDIyMi4wNmwtNTEuNzItNTEuNzJjLTYuMjUtNi4yNS0xNi4zOC02LjI1LTIyLjYzIDBsLTExLjMxIDExLjMxYy02LjI1IDYuMjUtNi4yNSAxNi4zOCAwIDIyLjYzTDM1MC4wNiAyNTZsLTUxLjcyIDUxLjcyYy02LjI1IDYuMjUtNi4yNSAxNi4zOCAwIDIyLjYzbDExLjMxIDExLjMxYzYuMjUgNi4yNSAxNi4zOCA2LjI1IDIyLjYzIDBMMzg0IDI4OS45NGw1MS43MiA1MS43MmM2LjI1IDYuMjUgMTYuMzggNi4yNSAyMi42MyAwbDExLjMxLTExLjMxYzYuMjUtNi4yNSA2LjI1LTE2LjM4IDAtMjIuNjNMNDE3Ljk0IDI1Nmw1MS43Mi01MS43MmM2LjI0LTYuMjUgNi4yNC0xNi4zOC0uMDEtMjIuNjN6TTU3NiA2NEgyMDUuMjZDMTg4LjI4IDY0IDE3MiA3MC43NCAxNjAgODIuNzRMOS4zNyAyMzMuMzdjLTEyLjUgMTIuNS0xMi41IDMyLjc2IDAgNDUuMjVMMTYwIDQyOS4yNWMxMiAxMiAyOC4yOCAxOC43NSA0NS4yNSAxOC43NUg1NzZjMzUuMzUgMCA2NC0yOC42NSA2NC02NFYxMjhjMC0zNS4zNS0yOC42NS02NC02NC02NHptMTYgMzIwYzAgOC44Mi03LjE4IDE2LTE2IDE2SDIwNS4yNmMtNC4yNyAwLTguMjktMS42Ni0xMS4zMS00LjY5TDU0LjYzIDI1NmwxMzkuMzEtMTM5LjMxYzMuMDItMy4wMiA3LjA0LTQuNjkgMTEuMzEtNC42OUg1NzZjOC44MiAwIDE2IDcuMTggMTYgMTZ2MjU2eiIgY2xhc3M9IiI+PC9wYXRoPjwvc3ZnPg=="
                                                  width="25px" title="Delete" />
                                          </td>
                                      </tr>
                                      <tr>
                                          <td colspan="3"><button type="submit"
                                                  class="btn btn-round btn-success btn-block">Add new contact</button></td>
                                      </tr>
                                  </table>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>

              <script>
                  var input = document.getElementById("msg");
                  input.addEventListener("keyup", function(event) {
                      if (event.keyCode === 13) {
                          // event.preventDefault();
                          document.getElementById("sendMsg").click();
                      }
                  });

                  $('#toggle-search').on('click', function() {
                      $('#search_chat').toggle('display: inline-block');
                  });
              </script>

      </body>
  @endsection
