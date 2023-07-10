<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class SocialController extends Controller
{

    public function whatsapp()
    {
        $data = DB::select("select distinct sender_name,(client_number),msg_status FROM `tbl_whatsapp_chat` where channel = 'Whatsapp' order by id desc");
        $city = DB::select("select * from tbl_city");
        return view('whatsapp', ['data' => $data, 'city' => $city]);
    }

    public function social_media_facebook()
    {
        $data = DB::select("select distinct sender_name, (client_number) FROM `tbl_whatsapp_chat` where channel = 'Facebook' order by id desc");
        return view('social-media-facebook', ['data' => $data]);
    }

        public function new_whatsapp_shazil()
    {
        return view('whatsapp-new-ui');
    }

     public function crm_logs()
    {
        return view('crm-logs');
    }

    public function admin()
    {
        return view('admin');
    }

    public function social_media_instagram()
    {
        return view('social-media-instagram');
    }

    public function facebook_posts()
    {
        return view('facebook-posts');
    }

public function facebook_chats()
    {
        return view('facebook-chats');
    }
    public function facebook_notification()
    {
        return view('facebook-notification');
    }
    public function whatsapp_chats()
    {
        return view('whatsapp-chats');
    }
     public function instagram_posts()
    {
        return view('instagram-posts');
    }

public function instagram_chats()
    {
        return view('instagram-chats');
    }
    public function instagram_notifications()
    {
        return view('instagram-notifications');
    }
    public function call_logs()
    {
        return view('call-logs');
    }

     public function user_details()
    {
        return view('user-details');
    }

      public function call_receive_details()
    {
        return view('call-receive-details');
    }

    public function agent_dashboard()
    {
        return view('index');
    }

    // public function supervisor_dashboard()
    // {
    //     return view('supervisor-dashboard');
    // }

    // 11052023
    public function supervisor_dashboard()
    {
        $today = date('Y-m-d');
        // dd($today);
        $after1day = date('Y-m-d', strtotime($today . ' +1 days'));
        // dd($after1day);
        //$pendingcomplains = DB::table('tbl_customers_complains')->where('status', '=', 'pending')->count();
        $pendingcomplains = DB::table('tbl_customers_complains')->whereIn('status', ['pending', 'Open'])->count();
        //dd($pendingcomplains);
        $todayscomplains = DB::table('tbl_customers_complains')->where('createddate', '=', $today)->count();
        //dd($todayscomplains);
        $todaysinquiries = DB::table('tbl_customers_inquiries')->where('start_date', '=', $today)->count();
        //dd($todaysinquiries);
        //$todaysfollowups = DB::table('tbl_customers_inquiries')->where('next_follow_up', '=', $today)->select();
        //dd($todaysfollowups);
        $todaysfollowups = DB::select("select * from `tbl_customers_inquiries` WHERE `next_follow_up` = '$today'");
        $tomorrowsfollowups = DB::select("select * from `tbl_customers_inquiries` WHERE `next_follow_up` = '$after1day'");
        // $todaysfollowups = DB::select("select l.*, u.name as agent from `tbl_customers_inquiries` l inner join tbl_users u on u.id =  l.created_by WHERE `next_follow_up` = '$today'");
        // dd($todaysfollowups);
        return view('supervisor-dashboard', ["total_pendingcomplains" => $pendingcomplains, "todays_generatedcomplains" => $todayscomplains, "todays_generatedinquiries" => $todaysinquiries, "todays_followups" => $todaysfollowups, "tomorrows_followups" => $tomorrowsfollowups]);
    }


    public function get_chats(Request $req)
    {
        $num = $req->number;
        session()->forget('number');
        $req->session()->put('number', $num);
        $chats = DB::select("select * from tbl_whatsapp_chat where client_number = '$num' and channel = 'Whatsapp'");
        $ReturnData['ReturnData'] = $chats;
         $html = '<div>';

              foreach($chats as $row)
                {
                     date_default_timezone_set('Asia/Karachi');
                     $date = strtotime($row->creation_date);

                    $html .='
                        <script>
                             $("#chat_name").html("'.$row->sender_name.'");
                             $("#profilenumber").html("'.$row->client_number.'");
                            //  $("#time_date").html("'. date('h:i A', $date).'|'. date('M d,Y', $date) .'");
                             $("#whats_number").val("'.$row->whats_number.'");
                             $("#senders_name").val("'.$row->sender_name.'");
                             $("#client_number").val("'.$row->client_number.'");
                        </script>';

                    if($row->message != '')
                    {

                        if($row->msg_type == 'rec'){
                        $html .='
                        <div class="incoming_msg mt-1">

                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>'.$row->message.'</p>
                                    <span class="time_date">'. date('h:i ', $date).'|'. date('M d,Y', $date) .'</span>
                                </div>
                            </div>
                        </div>';
                    }
                    else{
                        $html .='
                            <div class="outgoing_msg">
                            <div class="outgoing_msg_img ml-2"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="sent_msg">
                                <p>'.$row->message.'</p>
                                <span class="time_date">'. date('h:i ', $date).'|'. date('M d,Y', $date) .'</span>
                            </div>
                        </div>
                             ';
                    }

                  }
                }

            $html .= '</div>';

         $msg_status = DB::update("update tbl_whatsapp_chat set msg_status = 'read' where client_number = '$num' and msg_status='Pending' and channel = 'Whatsapp'");

          echo $html;

        // return json_encode($ReturnData);
    }

    public function search_chat(Request $request)
    {
        $search = $request->search_chat;
        $number = $request->number;

        if($request->ajax())
        {
            $records = DB::select("SELECT * FROM tbl_whatsapp_chat WHERE message LIKE '%$search%' AND client_number = '$number' ORDER BY id DESC");

            $html = '<div>';

              foreach($records as $row)
                {
                     date_default_timezone_set('Asia/Karachi');
                     $date = strtotime($row->creation_date);

                    $html .='
                        <script>
                             $("#chat_name").html("'.$row->sender_name.'");
                             $("#profilenumber").html("'.$row->client_number.'");
                            //  $("#time_date").html("'. date('h:i A', $date).'|'. date('M d,Y', $date) .'");
                             $("#whats_number").val("'.$row->whats_number.'");
                             $("#senders_name").val("'.$row->sender_name.'");
                             $("#client_number").val("'.$row->client_number.'");
                        </script>';



                    if($row->message != '')
                    {

                        if($row->msg_type == 'rec'){
                        $html .='
                        <div class="incoming_msg mt-1">

                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>'.$row->message.'</p>
                                    <span class="time_date">'. date('h:i ', $date).'|'. date('M d,Y', $date) .'</span>
                                </div>
                            </div>
                        </div>';
                    }
                    else{
                        $html .='
                            <div class="outgoing_msg">
                            <div class="outgoing_msg_img ml-2"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="sent_msg">
                                <p>'.$row->message.'</p>
                                <span class="time_date">'. date('h:i ', $date).'|'. date('M d,Y', $date) .'</span>
                            </div>
                        </div>
                             ';
                    }

                  }
                }

                 $html .= '</div>';

                echo $html;
        }
    }

    public function search_contacts(Request $request)
    {
        $search = $request->search;
        if($request->ajax())
        {
            $output="";
            $records = DB::select("select distinct sender_name,client_number from tbl_whatsapp_chat where concat(sender_name,client_number) like '%$search%' order by id desc");

            $output .="<div class='inbox_chat shadow  bg- rounded'>";
                foreach ($records as $row) {
                    date_default_timezone_set('Asia/Karachi');

                   $output .="
                     <div class='row'>
                        <div class='col-md-12'>
                            <div class='chat_list'>
                                <div class='chat_people'>
                                    <div class='chat_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>
                                    <div class='chat_ib'>
                                        <h5><a href='javascript:;' onclick='getChatNumber($row->client_number)'> $row->sender_name </a> <span class='chat_date'></span></h5>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   ";
                }
            $output .="</div>";
            echo $output;
        }
    }



    public function send_wp_msg(Request $req)
    {
        $msg_from = $req->msg_from;
        $client_number = $req->client_number;
        $sender_name = $req->sender_name;
        $whats_number = $req->whats_number;
        $msg_type = $req->msg_type;
        $msg_body = $req->msg;
        $agent_id = session()->get('isLogin')[0]['id'];
        $chat_id = 101;

        date_default_timezone_set('Asia/Karachi');
        $date = date("Y-m-d h:i:s");

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://graph.facebook.com/v15.0/108031718818259/messages',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "messaging_product": "whatsapp",
            "to": "'.$client_number.'",
            "type": "text",
            "text": {
                "preview_url": false,
                "body":"'.$msg_body.'"
            }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer EAAMZBzY2wbqwBADBdyiXhAp7A6nx5ApOvSVd9KhRPYG5ZBYrwseIKIRrOG2uZAUkjHjfdTroZCgZBqhPdeK6vh7bMxAnBeZBZBOVD1ZBU8Qh4FM96GKdIKrhc8mFmSDKkqFdijANd2fCRvH2w4ZCreqh5YKXeAyjBjRfTqSpYlRX71aCfMnNOcWDxSXsqvYcMgxYRmiIRZBXeq7gZDZD'
          ),
        ));


        $response = curl_exec($curl);
        curl_close($curl);
        // echo $response;

        $save_msg = DB::insert("
            INSERT INTO `tbl_whatsapp_chat`
            (`id`, `agent_id`, `chat_id`, `whats_number`, `sender_name`, `client_number`, `msg_type`, `message`, `channel`, `creation_date`, `process_date`)
            VALUES
            (null, '$agent_id', '$chat_id', '$whats_number', '$sender_name', '$client_number','$msg_type', '$msg_body', 'Whatsapp', '$date', '$date')
        ");

        if($save_msg)
        {
            $sent_msg = DB::select("select * from tbl_whatsapp_chat order by id desc limit 1");
            $return_data['return_data'] = $sent_msg;
            return json_encode($return_data);
        }else
        {
            echo "Message not saves";
        }
    }

    public function send_fb_msg(Request $req)
    {
        $msg_body       = $req->fb_msg;
        $sender_name    = $req->sender_name;
        $msg_type       = "sent";
        $chadId         = $req->ChatId;
        $agent_id       = session()->get('isLogin')[0]['id'];
        $acces_token = env('BOT_PAGE_ACCESS_TOKEN');
        date_default_timezone_set('Asia/Karachi');
        $date = date("Y-m-d h:i:s");

        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://graph.facebook.com/v15.0/me/messages?access_token=$acces_token",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "recipient":{
                "id":"'.$chadId.'"
            },
            "message":{
                "text":"'.$msg_body.'"
            }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        $result = json_decode($response, true);
        $messageId = $result['message_id'];

        $save_msg = DB::insert("INSERT INTO `tbl_whatsapp_chat`(`id`, `agent_id`, `chat_id`, `whats_number`, `sender_name`, `client_number`, `msg_type`, `message`, `channel`, `creation_date`, `process_date`)VALUES
        (null, '$agent_id', '$messageId', '0000', '$sender_name', '$chadId','$msg_type', '$msg_body', 'Facebook', '$date', '$date')");

        if($save_msg) {

            $sent_msg = DB::select("select * from tbl_whatsapp_chat where client_number = '$chadId' AND channel = 'Facebook' order by id desc limit 1");
            $return_data['return_data'] = $sent_msg;
            return json_encode($return_data);
        } else {
            echo "Message not saves";
        }
    }
    //Get FaceBook All Chat By User Id
    public function get_FaceBook_chats(Request $req)
    {
        $num = $req->ChatId;
        $chats = DB::select("select * from tbl_whatsapp_chat where client_number = '$num' and channel = 'Facebook'");
        $html = '<div>';

              foreach($chats as $row)
                {
                     date_default_timezone_set('Asia/Karachi');
                     $date = strtotime($row->creation_date);

                    $html .='
                        <script>
                             $("#chat_name").html("'.$row->sender_name.'");
                             $("#profilenumber").html("'.$row->client_number.'");
                            //  $("#time_date").html("'. date('h:i A', $date).'|'. date('M d,Y', $date) .'");
                             $("#whats_number").val("'.$row->whats_number.'");
                             $("#senders_name").val("'.$row->sender_name.'");
                             $("#client_number").val("'.$row->client_number.'");
                        </script>';

                    if($row->message != '')
                    {

                        if($row->msg_type == 'rec'){
                        $html .='
                        <div class="incoming_msg mt-1">

                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"></div>
                            <div class="received_msg">
                                <div class="received_withd_msg">
                                    <p>'.$row->message.'</p>
                                    <span class="time_date">'. date('M d,Y', $date) . " " . date('h:i ', $date). '</span>
                                </div>
                            </div>
                        </div>';
                    }
                    else{
                        $html .='
                            <div class="outgoing_msg">
                            <div class="outgoing_msg_img ml-2"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="sent_msg">
                                <p>'.$row->message.'</p>
                                <span class="time_date">'. date('M d,Y', $date)  . " " . date('h:i ', $date) .'</span>
                            </div>
                        </div>
                             ';
                    }

                  }
                }

            $html .= '</div>';

         $msg_status = DB::update("update tbl_whatsapp_chat set msg_status = 'read' where client_number = '$num' and msg_status='Pending' and channel = 'Whatsapp'");

         $ReturnData['ReturnData'] =  $html;

        return json_encode($ReturnData);
    }
    //End
    public function add_whatsapp_contact(Request $add)
    {
        $contact_name = $add->input('contact_name');
        $phone_num = $add->input('phone_number');
        $email = $add->input('email');
        $city = $add->input('city');
        $agent_id = session()->get('isLogin')[0]['id'];

        $check = DB::select("select * from tbl_whatsapp_chat where sender_name = '$contact_name' and client_number = '$phone_num'");

        $check2 = DB::select("select * from customers where name = '$contact_name' and mobile = '$phone_num'");

        if(count($check) == 1)
        {
            return redirect()->back()->with('warning', 'The contact you added is already exists');
        }
        else
        {
            $save = DB::insert("INSERT INTO `tbl_whatsapp_chat`(`id`,`whats_number`, `agent_id`, `sender_name`, `client_number`, `channel`) VALUES (null, 123456789,'$agent_id','$contact_name','$phone_num')");

            $save2 = DB::insert("INSERT INTO `customers`(`id`, `name`, `email`, `mobile`, `city`) VALUES(null,'$contact_name','$email','$phone_num','$city','Whatsapp')");

            if($save && $save2)
            {
                return redirect()->back()->with('msg', 'Contact saved successfully');
            }
        }

    }
    public function call_dailer() {

        return view('softphone');
    }

    public function community_management()
    {
        return view('community-management');
    }


}
