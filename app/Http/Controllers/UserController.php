<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tbl_users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index()
    {
        if (session()->has('isLogin')) {
            return view('index');
        } else {
            return redirect('login');
        }
    }

    public function login()
    {
        return view('login');
    }

    public function login_post(Request $d)
    {
        $username = $d->input('username');
        $password = md5($d->input('password'));
        $login = tbl_users::where('username', $username)->where('password', $password)->get();

        if (count($login) == 1) {
            $d->session()->put('isLogin', $login);
            if (session()->get('isLogin')[0]['role'] != 2) {
                return redirect('/');
            } else {
                return redirect('index');
            }
        } else {
            return redirect('login')->with('error', 'Invalid username or password');
        }
    }

    public function logout()
    {
        session()->forget('isLogin');
        session()->flush();
        return redirect('login');
    }

    public function create_crm_user()
    {
        return view('crm-user-signup');
    }

    // Query Builder
    public function add_crm_user(Request $d)
    {
        $new_crm_user = array(
            'id' => NULL,
            'name' => $d->input('name'),
            'email' => $d->input('email'),
            'phone' => $d->input('phone'),
            'username' => $d->input('username'),
            'password' => md5($d->input('password')), // Using md5() to hash the password
            'role' => explode('|', $d->input('role'))[0], // Extracting the number value from the 'role' input
            'designation' => explode('|', $d->input('role'))[1], // Extracting the designation from the 'role' input
            'status' => 1
        );
        $create_new_crm_user = DB::table('tbl_users')->insert($new_crm_user);
        if ($create_new_crm_user) {
            return redirect('login')->with('message', "New user added successfully");
        } else {
            return redirect()->back()->with('error', 'User not created. Check your query or function.');
        }
    }

    public function users()
    {
        $users = tbl_users::all()->sortByDesc('id');
        return view('users', ["users" => $users]);
    }

    //WhatsApp APi
    public function receiveWebHook(Request $request)
    {

        //Log::info($request->getMethod(), $request->all());

        if ($request->has('hub_mode') && $request->input('hub_mode') === 'subscribe') {
            return response($request->input('hub_challenge'))->header('Content-Type', 'text/plain');
        }
    }

    public function processWebhook(Request $request)
    {
        try {
            $bodyContent = json_decode($request->getContent(), true);
            $value = $bodyContent['entry'][0]['changes'][0]['value'];
            $data = array();
            if (!empty($value['messages'])) {
                if ($value['messages'][0]['type'] == 'text') {
                    $data['Name']        = $value['contacts'][0]['profile']['name'];
                    $data['from']         = $value['messages'][0]['from'];
                    $data['timestamp']     = $value['messages'][0]['timestamp'];
                    $data['message']     = $value['messages'][0]['text']['body'];
                }
                $Name             = $data['Name'];
                $FromNumber        = $data['from'];
                $message        = $data['message'];
                date_default_timezone_set('Asia/Karachi');
                $timestamp = date("Y-m-d h:i:s");
                $sql = DB::insert("INSERT INTO `tbl_whatsapp_chat` VALUES (null, '1', '1','1234567890', '$Name', '$FromNumber','rec', '$message','pending', 'Whatsapp', '$timestamp','$timestamp')");
            }
            return response()->json([
                'success' => true,
                'data' => $data,
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //End
    //FB Api
    protected $token;

    public function __construct()
    {
        $this->token = env('BOT_VERIFY_TOKEN');
    }
    public function verify_token(Request $request)
    {
        if ($request->has('hub_mode') && $request->input('hub_mode') === 'subscribe') {
            return response($request->input('hub_challenge'))->header('Content-Type', 'text/plain');
        }
    }

    public function Handle_Response(Request $request)
    {
        try {
            Log::info($request->getMethod(), $request->all());
            $acces_token = env('BOT_PAGE_ACCESS_TOKEN');
            $bodyContent = json_decode($request->getContent(), true);
            $value      = $bodyContent['entry'][0]['messaging'][0];
            $message    = $value['message']['text'];
            $data = array();
            if (!empty($message)) {
                $data['message']        = $value['message']['text'];
                $data['messageId']         = $value['message']['mid'];
                $messageId        = $data['messageId'];
                $message        = $data['message'];
                date_default_timezone_set('Asia/Karachi');
                $timestamp = date("Y-m-d h:i:s");
                //Curl To get UserName
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "https://graph.facebook.com/v15.0/$messageId?fields=from&access_token=$acces_token",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                ));
                $response = curl_exec($curl);
                $json       = json_decode($response, true);
                $name       = $json['from']['name'];
                $ChatId     = $json['from']['id'];
                curl_close($curl);
                //End
                $sql = DB::insert("INSERT INTO `tbl_whatsapp_chat` VALUES (null, '1', '$messageId','0000', '$name', '$ChatId','rec', '$message','pending', 'Facebook', '$timestamp','$timestamp')");
                return response()->json([
                    'success' => true,
                    'data' => $response,
                ], 200);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'data' => $e->getMessage()
            ], 200);
        }
    }
    //End
}
