@extends('template')

@section('content')

  <link rel="stylesheet" href="{{ asset('assets/css/facebook.css') }}">


    <div class="container mt-1" style="box-sizing: border-box;">
      <div class="mainConatinerChat">

                  <div class="inbox_msg">
                      <div class='mainContainerLeftSection'>
                          <form>
                              <button type="submit">Search</button>
                              <input type="search" placeholder="Enter for search">
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
                                  <p class='meassageText'>Oh, hello! How are u doing sis</p>
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
                                  <p class='meassageText'>Oh, hello! How are u doing sis</p>
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
                                  <p class='meassageText'>Oh, hello! How are u doing sis</p>
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
                                  <p class='meassageText'>Oh, hello! How are u doing sis</p>
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
                                  <p class='meassageText'>Oh, hello! How are u doing sis</p>
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
                                          <p class='HeaderStatusText'>Offline . Last seen 12 hr ago</p>
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
                              <p class='chat_messages_profile_message_incoming'>Oh, hello! How are u doing Sis</p>
                              </div>
                                  <p class='chat_messages_profile_date'>Dec 29,2022 01:29</p>
                              </div>
                          </div>
                          <div class='incomingMessageDiv'>
                              <img src="{{ asset('images/admin.jpg') }}" alt=""
                                  class='chat_messages_profile_img'>
                              <div class='incomingMessageSubDiv'>
                              <div class='chat_messages_profile_message_div'>
                              <p class='chat_messages_profile_message_incoming'>Oh, hello! How are u doing Sis</p>
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
                              <p class='chat_messages_profile_message_incoming'>Oh, hello! How are u doing Sis</p>
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
                          <p class='CityTextInfo'>Complain : close</p>
                          <p class='CityTextInfo'>Date : 1/5/23</p>
                          <p class='CityTextInfo'>Status : pending</p>
                      </div>
                  </div>

              </div>
     
    </div>
    </div>

@endsection