
  @extends('template')

  @section('content')


  <link rel="stylesheet" href="{{ asset('assets/css/whatsapp-chats.css') }}">
  <link rel="shortcut-icon" href="../../images/favicon.png" />




     <div class="mainConatinerChat">

        <div class="subContainer">
            <div class="inbox_msg">
                <div class='mainContainerLeftSection'>
                    <form>
                        <button type="submit">Search</button>
                        <input type="search" placeholder="Enter for search">
                    </form>

                    {{-- <div class='mainChatBox'>
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
                              <p class='meassageText'>Oh, hello! How are u doinggggggg</p>
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
                              <p class='meassageText'>Oh, hello! How are u doing</p>
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
                              <p class='meassageText'>Oh, hello! How are u doing</p>
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
                              <p class='meassageText'>Oh, hello! How are u doing</p>
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
                              <p class='meassageText'>Oh, hello! How are u doing</p>
                          </div>
                      </div>  --}}
                    {{-- <h2 id="chatData"></h2> --}}
                    <div class='mainChatBox' onclick="name('0')">
                        <div class='chatListBox'>
                            <div class='subChat'>
                                <div class='profImgDiv'>
                                    <img src="{{ asset('images/avatar/3.jpg') }}" alt="" class='profImg'>
                                </div>
                                <div class='nameStatusDiv'>
                                    <div>
                                        <p class='nameText' id="nameProfile">Shahzil</p>
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
                            <p class='meassageText'>Oh, hello! How are u doing</p>
                        </div>
                    </div>
                    <div class='mainChatBox' onclick="name('1')">
                        <div class='chatListBox'>
                            <div class='subChat'>
                                <div class='profImgDiv'>
                                    <img src="{{ asset('images/avatar/2.jpg') }}" alt="" class='profImg'>
                                </div>
                                <div class='nameStatusDiv'>
                                    <div>
                                        <p class='nameText' id="nameProfile">Rameez</p>
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
                            <p class='meassageText'>Oh, hello! How are u doing</p>
                        </div>
                    </div>
                    <div class='mainChatBox' onclick="name('2')">
                        <div class='chatListBox'>
                            <div class='subChat'>
                                <div class='profImgDiv'>
                                    <img src="{{ asset('images/avatar/1.jpg') }}" alt="" class='profImg'>
                                </div>
                                <div class='nameStatusDiv'>
                                    <div>
                                        <p class='nameText' id="nameProfile">Ahan</p>
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
                            <p class='meassageText'>Oh, hello! How are u doing</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="inbox_chat" id="inbox_chat_id">

                <div class='chat_header' id="headerID">
                    <div class='chatHeaderBox'>
                        <div class='subHeaderChat'>
                            <div class='profImgDiv'>
                                <img class='profImg' id="imgHeader">
                            </div>
                            <div class='nameStatusDiv'>
                                <div>
                                    <p class='HeaderNameText' id="nameHeader"></p>
                                </div>
                                <div style="display: flex">
                                    <p class='HeaderStatusText' id="statusHeader"> </p>
                                    <p class='HeaderStatusText' id="recentActiveHeader"> </p>
                                </div>
                            </div>
                        </div>
  <div style="display: flex;justify-content: center">
                                    <a href="https://sodabaz.com/MasterMotor/public/create-customer-inquiry/whatsapp" target="blank" class="newTicketButton">New Ticket</a>
                                 </div>
                    </div>
                </div>

                <div class='chat_messages_div' id="chat_messages_id">
                    <div class='incomingMessageDiv'>
                        <img src="{{ asset('images/admin.jpg') }}" alt="" class='chat_messages_profile_img'>
                        <div class='incomingMessageSubDiv'>
                            <div class='chat_messages_profile_message_div'>
                                <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sissss</p>
                            </div>
                            <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                        </div>
                    </div>
                    <div class='incomingMessageDiv'>
                        <img src="{{ asset('images/admin.jpg') }}" alt="" class='chat_messages_profile_img'>
                        <div class='incomingMessageSubDiv'>
                            <div class='chat_messages_profile_message_div'>
                                <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sisss</p>
                            </div>
                            <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                        </div>
                    </div>
                    {{-- <div class='outgoingMessage'></div> --}}
                    <div class='outgoingMessageDiv'>
                        <div class='outgoingMessageSubDiv'>
                            <div class='chat_messages_profile_message_div_outgoing'>
                                <p class='chat_messages_profile_message'>Oh, hello! How are u doing Sisss</p>
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
                        <img src="{{ asset('images/admin.jpg') }}" alt="" class='chat_messages_profile_img'>
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

                <div class='send_chat' id="send_chat_id">
                    <form class='formMessage'>
                        <img src="{{ asset('images/attachement.png') }}" alt="" class='attachementImg'>
                        <input type="search" placeholder="Enter for search" class='inputTypeMessage'>
                        <img src="{{ asset('images/voice-search.png') }}" alt="" class='voiceSearch'>
                        <img src="{{ asset('images/send.png') }}" alt="" class='sendButton'>
                    </form>
                </div>
            </div>
            <div id="inboxMessage">
                <img src="{{ asset('images/whatsapp_logo.png') }}" alt="" class='whatsapp_logo'>
                <p class='whatsappText'>For viewing messages, kindly click on chat</p>
            </div>

            <div class='inbox_details' id="inbox_details_id">

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
        </div>

    </div>


<script>
    let arr = [{
            name: 'Shahzil',
            image: 'https://www.w3schools.com/howto/img_avatar2.png',
            status: 'online ',
            recentActive: ' Last seen 5 hr ago',
            lastMessage: ' Oh, hello! All ok'
        },
        {
            name: 'Rameez',
            image: 'https://www.w3schools.com/w3images/avatar2.png',
            status: 'offline  ',
            recentActive: 'Last seen 2 hr ago',
            lastMessage: 'Oh, F***!'
        },
        {
            name: 'Ahsan',
            image: 'https://www.w3schools.com/w3images/avatar5.png',
            status: 'online  ',
            recentActive: ' Last seen 1 hr ago',
            lastMessage: 'Oh, hello! All Done?'
        }
    ]

    function name(number) {

        var x = document.getElementById("nameHeader");
        var y = document.getElementById("statusHeader");
        var z = document.getElementById("recentActiveHeader");
        var a = document.getElementById("imgHeader");
        var section = document.getElementById("inbox_chat_id");
        var beforeSection = document.getElementById("inboxMessage");
        var rightSection = document.getElementById("inbox_details_id");
        var name = document.getElementById("nameRight");
        if (number == 0) {
            x.innerHTML = arr[0].name;
            y.innerHTML = arr[0].status;
            z.innerHTML = arr[0].recentActive;
            a.src = arr[0].image;
            section.style.display = 'block';
            beforeSection.style.display = 'none';
            rightSection.style.display = 'block';
            name.innerHTML = arr[0].name;
        } else if (number == 1) {
            x.innerHTML = arr[1].name;
            y.innerHTML = arr[1].status;
            z.innerHTML = arr[1].recentActive;
            a.src = arr[1].image;
            section.style.display = 'block';
            beforeSection.style.display = 'none';
            rightSection.style.display = 'block';
            name.innerHTML = arr[1].name;
        } else if (number == 2) {
            x.innerHTML = arr[2].name;
            y.innerHTML = arr[2].status;
            z.innerHTML = arr[2].recentActive;
            a.src = arr[2].image;
            section.style.display = 'block';
            beforeSection.style.display = 'none';
            rightSection.style.display = 'block';
            name.innerHTML = arr[2].name;
        }
    }
</script>

  @endsection
