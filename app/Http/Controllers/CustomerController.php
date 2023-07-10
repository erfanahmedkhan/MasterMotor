<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Customer_Logs;
use App\Models\Vehicles;
use App\Models\tbl_customers_complain;
use App\Models\tbl_customers_inquiry;
use App\Models\Complaint_Follow_Up;

use Illuminate\Support\Facades\DB;
use App\Models\Products;
//use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function crm_logs()
    {
        $logdata = DB::select("SELECT tbl_logs.*, tbl_users.name as agentname from  tbl_logs LEFT join tbl_users on tbl_users.id = tbl_logs.created_by ");
        return view('crm-logs',  ["logdata" => $logdata]);
    }

    // customer-journey / user_journey function
    public function user_journey($id)
    {
        $data = DB::select("SELECT customers.*,tbl_city.city as city_name FROM customers LEFT JOIN tbl_city ON tbl_city.id = customers.city WHERE customers.id='$id'");
        // Complains list
        $complains = DB::select("SELECT tbl_customers_complains.*,tbl_dealers.dealer_name,customers.name as customer_name,customers.mobile ,tbl_users.name as username, tbl_complain_cpt.complain_type,tbl_complain_spg.complain_spg_type,tbl_complain_ccc.complain_ccc_type FROM `tbl_customers_complains`
        INNER JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
        INNER JOIN customers ON customers.id = tbl_customers_complains.customer_id
        INNER JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
        INNER JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
        INNER JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
        INNER JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
        WHERE customer_id = $id
        ORDER BY tbl_customers_complains.id DESC
        ");
        // Inquiry list
        $inquiry = DB::select("SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
        FROM tbl_customers_inquiries
        LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
        LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
        LEFT JOIN tbl_city ON tbl_city.id = customers.city
        LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
        WHERE customer_id = $id
        ORDER BY id DESC");
        $vehicles = Vehicles::where('customer_id', '=', $id)->get();
        $calccount = DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->count();
        $calccounthot = DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->where('status', '=', 'hot')->count();
        $calccountwarm = DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->where('status', '=', 'warm')->count();
        $calccountcold =  DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->where('status', '=', 'cold')->count();
        $calccountcomplains = DB::table('tbl_customers_complains')->where('customer_id', '=', $id)->count();
        $calccountresolved = DB::table('tbl_customers_complains')->where('customer_id', '=', $id)->where('status', '=', 'resolve')->count();
        $calccountpending = DB::table('tbl_customers_complains')->where('customer_id', '=', $id)->where('status', '=', 'pending')->count();
        return view('user-details', compact('vehicles', 'id'), ["data" => $data, "total_complains" => $calccountcomplains, "total_resolvedcomplains" => $calccountresolved, "total_pendingcomplains" => $calccountpending, "total_inquires" => $calccount, "total_hotinquires" => $calccounthot, "total_coldinquires" => $calccountcold, "total_warminquires" => $calccountwarm, "complaint" => $complains, "inquiry" => $inquiry]);
    }

    public function  customer_journey_inquiry($id)
    {
        $data = DB::select("SELECT customers.*,tbl_city.city as city_name FROM customers LEFT JOIN tbl_city ON tbl_city.id = customers.city WHERE customers.id='$id'");
        // Inquiry list
        $inquiry = DB::select("SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.email as cemail, customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username, inquiry_types.inquiry_type as inquiry_type
    FROM tbl_customers_inquiries
    LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
    LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
    LEFT JOIN tbl_city ON tbl_city.id = customers.city
    LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
    LEFT join inquiry_types on inquiry_types.id = tbl_customers_inquiries.inquiry_type
    WHERE tbl_customers_inquiries.id = $id
    ORDER BY id DESC");
        return view('inquiry-details', ["data" => $data, "inquiry" => $inquiry]);
    }

    public function updatecustomerjourneyinquiry(Request $req, $id)
    {
        $status = $req->input('status');
        try {
            date_default_timezone_set("Asia/Karachi");
            $updatetime = date("Y-m-d h:i:s");
            $update = DB::update("UPDATE `tbl_customers_inquiries` SET `status`='$status', status_update_time = '$updatetime'  WHERE id = '$id'");
            if ($update) {
                return redirect()->back();
            }
        } catch (\Exception $e) {
            return $e->getMessage();
            // return redirect()->back()->with('error', 'Customer not updated. Check your function & try again.');
        }
    }

    public function social_media_webwhatsapp()
    {
        return view('social-media-webwhatsapp');
    }

    public function social_media_meta_facebook()
    {
        return view('social-media-meta-facebook');
    }

    public function social_media_meta_instagram()
    {
        return view('social-media-meta-instagram');
    }

    public function customer()
    {
        $data = DB::select("SELECT customers.*,tbl_city.city as city_name FROM customers LEFT JOIN tbl_city ON tbl_city.id = customers.city ORDER BY id DESC");
        $city = DB::select("select * from tbl_city");
        $dealers = DB::select("select * from tbl_dealers");
        // $ReturnData['ReturnData'] = $data;
        // return json_encode($ReturnData);
        return view('customers', ["records" => $data, 'city' => $city, 'dealer' => $dealers]);
    }

    public function vehicles_list($id)
    {
        $vehicles = DB::select("SELECT vehicles.*,customers.name as cname,customers.mobile,customers.cnic,customers.customer_type FROM `vehicles` INNER JOIN customers ON vehicles.customer_id = customers.id WHERE customers.id = $id");
        return view('vehicles-lists', ["data" => $vehicles]);
    }

    public function get_all_customer()
    {
        // $client = new Client();
        // $data = $client->request('get', 'https://sodabaz.com/CRMAPI/public/api/blogs', [
        //     'form_params' => [
        //         'client_id' => 'test_id',
        //     ]
        // ]);
        // //return response()->json($data);
        // echo $data->getStatusCode();
        // echo $data->getBody();
    }

    public function save_customer($id)
    {
        $sql = DB::select("SELECT c.customer_type,c.name,c.city,c.email,c.mobile,i.existing_vehicle,i.interested_vehicle,i.status,i.dealership,c.channel,i.created_by,i.inquiry_number,i.start_date,tbl_dealers.dealer_name,i.source,i.status_reason ,i.next_follow_up,i.followup_remarks as remarks FROM `tbl_customers_inquiries` i inner join tbl_dealers on dealer_code = i.dealership INNER JOIN customers c ON i.customer_id = c.id WHERE i.id=$id");
        $encode = json_encode($sql);

        // if ($sql) {
        //     $update_send_to_dms = DB::update("UPDATE `tbl_customers_inquiries` set send_to_dms = '1' WHERE id = '$id' ");
        //     if ($update_send_to_dms)
        //         Var_dump($update_send_to_dms);
        //     dd($update_send_to_dms);
        // }

        //$decode = json_decode($encode, true);

        // Send data to DMS
        $url = "https://dms-test01.mastermotors.pk/crmapi/public/index.php/api/save_customer";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POSTFIELDS => ['body' => $encode],
        ));
        if ($curl == true) {

            $update_send_to_dms = DB::update("UPDATE `tbl_customers_inquiries` set `send_to_dms` = 1 WHERE `id` = '$id' ");

           dd("yes");
        }
        $response = curl_exec($curl);
        // dd($curl);
        // $response = Http::post($url, ['body' => $encode]);
        // SMS API
        // $x = $sql[0]->mobile;
        // $i = $sql[0]->inquiry_number;
        // $msg = "Dear Customer, Thank you for contacting Master Changan Motors your inquiry has been registered and your Inquiry No. is " . $i . " for future follow up and update";
        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
        // $response = Http::post($url);
        return $response;
    }

    public function sales_crm_to_dms($id)
    {
        $sql = DB::select("SELECT
        c.mobile as contactnumber,
        cm.dealership as dealercode,
        c.name as customername,
        cm.created_by as createdby,
        c.cnic as nic,
        c.email as email,
        c.customer_type as customertype,
        c.address as customeraddress,
        ct.city as city,
        cm.pbo as pbonumber,
        cm.sales_order_number as saleorderno,
        cm.invoice_number as invoiceno,
        cm.invoice_date as invoicedate,
        cm.complain_number as complainno,
        cm.voc as voc,
        cm.notes as agentnotes,
        cm.complaint_priority as complainpriority,
        cpt.complain_type as cpt,
        spg.complain_spg_type as spg,
        ccc.complain_ccc_type as ccc,
        agent.name as createdbycrm
         FROM `tbl_customers_complains` cm
         INNER JOIN customers c ON cm.customer_id = c.id
         INNER JOIN tbl_city ct ON c.city = ct.id
         INNER JOIN tbl_complain_cpt cpt ON cm.complain_type_cpt = cpt.complain_id
         INNER JOIN tbl_complain_spg spg ON cm.complain_type_spg = spg.complain_spg_id
         INNER JOIN tbl_complain_ccc ccc ON cm.complain_type_ccc = ccc.complain_ccc_id
         INNER JOIN tbl_users agent ON cm.created_by = agent.id
         WHERE cm.id=$id");
        //  IF CITY ID INSTEAD OF CITY NAME
        //  c.city as cust_city,
        //  INNER JOIN tbl_city cust_city ON c.city = cust_city.id
        // dd($sql);

        $encode = json_encode($sql[0]);
        // dd($encode);
        // $decode = json_decode($encode, true);
        // dd($decode);
        $ticket = $sql[0]->complainno;
        $createdby = $sql[0]->createdby;
        $date = date("Y-m-d h:i:s");
        $complain_type = "Sale";
        $status = 200;
        $response = "Demo response";

        if ($sql) {
            $sales_api_sql = "INSERT INTO `api_status_log`(`complain_number`, `complain_type`, `api_status`, `api_response`, `created_at`,  `created_by`) VALUES ('$ticket', '$complain_type', '$status', '$response','$date', '$createdby')";
            DB::insert($sales_api_sql);
        }


        // CURL

        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => "https://dms-test01.mastermotors.pk/dmssalesapi/complainservice.php?param=createservicecomplain",
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_SSL_VERIFYPEER => 0,
        //     CURLOPT_SSL_VERIFYHOST => 0,
        //     CURLOPT_POSTFIELDS =>  $encode,
        //     CURLOPT_HTTPHEADER =>  array(
        //         'X-Token: 1256token3478',
        //         'Content-Type: application/json'
        //     ),
        // ));
        // $response = curl_exec($curl);
        // curl_close($curl);   // dd($response);
        // $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);  // dd($status);
        // $decode = json_decode($response);   // dd($decode);

        // if (empty($decode) || $decode->statuscode != 200) {
        //     var_dump($status);
        //     echo "<br>";
        //     var_dump($response);
        //     die();
        // }
    }


    public function afs_crm_to_dms($id)
    {
        $sql = DB::select("SELECT
        c.mobile as contactnumber,
        cm.dealership as dealercode,
        c.name as customername,
        cm.created_by as createdby,
        c.cnic as nic,
        c.email as email,
        c.customer_type as customertype,
        c.address as customeraddress,
        ct.city as city,
        cm.pbo as pbonumber,
        cm.chasis_number as chassisno,
        cm.registration_number as regno,
        cm.complain_number as complainno,
        cm.voc as voc,
        cm.notes as agentnotes,
        cm.complaint_priority as complainpriority,
        cpt.complain_type as cpt,
        spg.complain_spg_type as spg,
        ccc.complain_ccc_type as ccc,
        agent.name as createdbycrm
         FROM `tbl_customers_complains` cm
         INNER JOIN customers c ON cm.customer_id = c.id
         INNER JOIN tbl_city ct ON c.city = ct.id
         INNER JOIN tbl_complain_cpt cpt ON cm.complain_type_cpt = cpt.complain_id
         INNER JOIN tbl_complain_spg spg ON cm.complain_type_spg = spg.complain_spg_id
         INNER JOIN tbl_complain_ccc ccc ON cm.complain_type_ccc = ccc.complain_ccc_id
         INNER JOIN tbl_users agent ON cm.created_by = agent.id
         WHERE cm.id=$id");
        //  IF CITY ID INSTEAD OF CITY NAME
        //  c.city as cust_city,
        //  INNER JOIN tbl_city cust_city ON c.city = cust_city.id
        // dd($sql);

        $encode = json_encode($sql[0]);
        // dd($encode);
        // $decode = json_decode($encode, true);
        // dd($decode);

        // $cust = $sql[0]->customername;
        // $x = $sql[0]->contactnumber;
        $ticket = $sql[0]->complainno;
        $createdby = $sql[0]->createdby;
        $date = date("Y-m-d h:i:s");
        $complain_typeype = "AFS";
        // dd($date);

        // CURL
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dms-test01.mastermotors.pk/dmssalesapi/complainservice.php?param=createservicecomplain",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_POSTFIELDS =>  $encode,
            CURLOPT_HTTPHEADER =>  array(
                'X-Token: 1256token3478',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // dd($response);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // dd($status);
        $decode = json_decode($response);
        // dd($decode);

        // MAINTAINING LOGS - INSERTING IN `api_status_log` TABLE
        if ($decode->statuscode = 200) {
            $afs_api_sql = "INSERT INTO `api_status_log`(`complain_number`, `api_status`, `api_response`, `created_at`,  `created_by`) VALUES ('$ticket','$status', '$response','$date', '$createdby')";
            DB::insert($afs_api_sql);
        }

        if (empty($decode) || $decode->statuscode != 200) {

            // MAINTAINING LOGS - INSERTING IN `api_status_log` TABLE
            $afs_api_sql = "INSERT INTO `api_status_log`(`complain_number`, `api_status`, `api_response`, `created_at`,  `created_by`) VALUES ('$ticket','$status', '$response','$date', '$createdby')";
            DB::insert($afs_api_sql);

            // DISPLAYING STATUS & RESPONSE
            var_dump($status);
            echo "<br>";
            var_dump($response);
            die();
        }
    }


    public function get_customer_by_id($id)
    {
        $data = DB::select("SELECT `name`,`email` FROM `customers` WHERE `id` = '$id' ");
        return response()->json($data);
    }

    public function customeradd(Request $req)
    {
        $obj = new Customer();
        $obj->name = $req->input('name');
        $obj->fb_url = $req->input('fb_url');
        $obj->insta_url = $req->input('insta_url');
        $obj->email = $req->input('email');
        $obj->mobile = $req->input('mobile');
        $obj->address = $req->input('address');
        $obj->city = $req->input('city');
        $obj->cnic = $req->input('cnic');
        $obj->channel = $req->input('channel');

        date_default_timezone_set('Asia/Karachi');
        $obj->date = date("Y-m-d h:i:s");

        $obj->customer_type = $req->input('customer_type');

        $check = Customer::where('mobile', $req->input('mobile'))->where('cnic', $req->input('cnic'))->get();

        if (count($check) == 1) {
            return redirect()->back()->with('alert', 'This Customer is already Exist');
        } else {
            $success = $obj->save();
            if ($success) {
                // $logs = new Customer_logs();
                // $logs->name = $req->input('name');
                // $logs->email = $req->input('email');
                // $logs->mobile = $req->input('mobile');
                // $logs->address = $req->input('address');
                // $logs->city = $req->input('city');
                // $logs->cnic = $req->input('cnic');
                // $logs->channel = $req->input('channel');

                // date_default_timezone_set('Asia/Karachi');
                // $logs->date = date("Y-m-d h:i:s");

                // $logs->customer_type = $req->input('customer_type');

                // $logs->created_by = session()->get('isLogin')[0]['id'];
                // $logs->save();

                $action = "New Customer Created " . json_encode($obj);
                $created_by = session()->get('isLogin')[0]['id'];
                $createddate = date('Y-m-d h:i:s');

                $sql = DB::insert("INSERT INTO `tbl_logs` VALUES (null, '$action', '$createddate',  $created_by, '', '')");

                return redirect()->back()->with('msg', 'New Customer added Successfully');
            } else {
                return redirect()->back()->with('error-msg', 'Customer not added Successfully');
            }
        }
    }

    //zamran code
    public function getCustomerDetailsForEdit(Request $req)
    {
        $id = $req->id;
        $customer_info = DB::select("SELECT * FROM `customers` WHERE `id` = '$id' ");
        echo json_encode($customer_info);
    }

    public function customeredit(Request $req)
    {
        $id = $req->input('id');
        $query = DB::select("select * from customers where id = $id");
        $newObj = Customer::find($id);
        $row = $query[0];
        $comments = array();
        $upd;

        $name = $req->input('name');
        $fb_url = $req->input('fb_url');
        $insta_url = $req->input('insta_url');
        $email = $req->input('email');

        $action = "Customer Record Updated ";
        $created_by = session()->get('isLogin')[0]['id'];
        $createddate = date('Y-m-d h:i:s');


        if ($row->name != $req->input('name')) {
            $newObj->name = $req->input('name');
            $upd = $newObj->update();
            DB::insert("INSERT INTO `tbl_logs` VALUES (null, '$action', '$createddate',  '$created_by', '$row->name', '$name')");
        }

        if ($row->fb_url != $req->input('fb_url')) {
            $newObj->fb_url = $req->input('fb_url');
            $upd = $newObj->update();
            DB::insert("INSERT INTO `tbl_logs` VALUES (null, '$action', '$createddate',  '$created_by', '$row->name', '$name')");
        }
        if ($row->insta_url != $req->input('insta_url')) {
            $newObj->insta_url = $req->input('insta_url');
            $upd = $newObj->update();
            DB::insert("INSERT INTO `tbl_logs` VALUES (null, '$action', '$createddate',  '$created_by', '$row->name', '$name')");
        }


        if ($row->email != $req->input('email')) {
            $newObj->email = $req->input('email');
            $upd = $newObj->update();
            DB::insert("INSERT INTO `tbl_logs` VALUES (null, '$action', '$createddate',  '$created_by', '$row->email', '$email')");
        }


        if ($row->mobile != $req->input('mobile')) {

            $newObj->mobile = $req->input('mobile');
            $upd = $newObj->update();
        }

        if ($row->address != $req->input('address')) {

            $newObj->address = $req->input('address');
            $upd = $newObj->update();
        }

        if ($row->city != $req->input('city')) {

            $newObj->city = $req->input('city');
            $upd = $newObj->update();
        }

        if ($row->cnic != $req->input('cnic')) {

            $newObj->cnic = $req->input('cnic');
            $upd = $newObj->update();
        }

        if ($row->channel != $req->input('channel')) {

            $newObj->channel = $req->input('channel');
            $upd = $newObj->update();
        }

        if ($row->customer_type != $req->input('customer_type')) {

            $newObj->customer_type = $req->input('customer_type');
            $upd = $newObj->update();
        }


        if (empty($upd)) {
            return redirect()->back()->with('error-msg', 'You have made no Changes');
        }



        if ($upd) {
            return redirect()->back()->with('msg', 'Customer record updated Successfully');
        } else {
            return redirect()->back()->with('error-msg', 'Customer record not updated Successfully');
        }
    }

    public function customerdelete($id)
    {
        $cd = Customer::find($id);
        $cd->delete();
        return redirect()->back()->with('msg', 'Customer record deleted Successfully');
    }

    public function customer_details($id)
    {
        $data = DB::select("SELECT customers.*,tbl_city.city as city_name FROM customers LEFT JOIN tbl_city ON tbl_city.id = customers.city WHERE customers.id='$id'");
        // Complains list
        $complains = DB::select("
        SELECT
        tbl_customers_complains.*,tbl_dealers.dealer_name,customers.name as customer_name,customers.mobile ,tbl_users.name as username, tbl_complain_cpt.complain_type,tbl_complain_spg.complain_spg_type,tbl_complain_ccc.complain_ccc_type
        FROM
        `tbl_customers_complains`
        INNER JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
        INNER JOIN customers ON customers.id = tbl_customers_complains.customer_id
        INNER JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
        INNER JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
        INNER JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
        INNER JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
        WHERE customer_id = $id
        ORDER BY tbl_customers_complains.id DESC
        ");
        // Inquiry list
        $inquiry = DB::select("SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
        FROM tbl_customers_inquiries
        LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
        LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
        LEFT JOIN tbl_city ON tbl_city.id = customers.city
        LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
        WHERE customer_id = $id
        ORDER BY id DESC");
        $vehicles = Vehicles::where('customer_id', '=', $id)->get();
        return view('customer-details', compact('vehicles', 'id'), ["data" => $data, "complaint" => $complains, "inquiry" => $inquiry]);
    }

    public function addvehicles(Request $d)
    {
        $v = new Vehicles();
        $v->car_company = $d->input('company');
        $v->car_model = $d->input('model');
        $v->car_model_year = $d->input('model_year');
        $v->date = $d->input('purchased_date');
        $v->chases_number = $d->input('Chases_no');
        $v->color = $d->input('color');
        $v->customer_id = $d->input('customer_id');
        $v->status = $d->input('status');
        $v->save();
        return redirect()->back()->with('msg', 'Vehicle registered Successfully');
    }

    public function editvehicles(Request $d, $id)
    {
        $v = Vehicles::find($id);
        $v->car_company = $d->input('company');
        $v->car_model = $d->input('model');
        $v->car_model_year = $d->input('model_year');
        $v->date = $d->input('purchased_date');
        $v->chases_number = $d->input('Chases_no');
        $v->color = $d->input('color');
        $v->status = $d->input('status');
        $v->update();
        return redirect()->back()->with('msg', 'Vehicle record updated Successfully');
    }

    public function add_complain(Request $d)
    {
        $v = new tbl_customers_complain();
        $v->voc = $d->input('voc');
        $v->dealership = $d->input('dealers');
        $v->complaint_type = $d->input('complaint_type');
        $v->owner_vehicle = $d->input('vehicle');
        $v->complaint_priority = $d->input('complaint_priority');
        $v->notes = $d->input('notes');
        $v->customer_id = $d->input('id');
        $v->status = "Pending";
        $v->created_by = session()->get('isLogin')[0]['name'];
        if ($d->hasfile('upload_docs')) {
            $img = $d->file('upload_docs');
            $filename = $img->getClientOriginalName();
            $file = "assets/upload_docs/" . $filename;
            $img->move("assets/upload_docs/", $file);
            $v->document = $file;
        }
        $success = $v->save();
        if ($success) {
            return redirect()->back()->with('msg', 'Customer Complain Created');
        } else {
            return redirect()->back()->with('error-msg', 'Customer complain not Created');
        }
    }

    public function complain_history($id)
    {
        //$complain = tbl_customers_complain::where('customer_id', $id)->get();
        $complain = DB::select("
        SELECT
        tbl_customers_complains.*,customers.name as cname, customers.mobile, customers.cnic, tbl_users.name as username, tbl_dealers.dealer_name
        FROM
        `tbl_customers_complains`
        INNER JOIN customers ON customers.id = tbl_customers_complains.customer_id
        INNER JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
        INNER JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
        WHERE
        customer_id = 3
        ORDER BY tbl_customers_complains.id DESC
        ");
        return view('complain-history', ["data" => $complain]);
    }

    // public function create_inquiry($id)
    // {
    //     $customer_data = Customer::find($id);
    //     $dealers = DB::select("select * from tbl_dealers");
    //     return view('create-inquiry', compact('id', 'customer_data'), ["dealers" => $dealers]);
    // }

    // public function add_inquiry(Request $d)
    // {
    //     $v = new tbl_customers_inquiry();
    //     $inq = DB::select("select inquiry_number from tbl_customers_inquiries ORDER BY id DESC LIMIT 1");
    //     if($inq)
    //     {
    //         $array = ($inq);
    //     foreach($array as $row)
    //     {
    //         $row->inquiry_number;
    //         $inqnum = explode("-",$row->inquiry_number);

    //         $num = (int)$inqnum[1];
    //         $serial = $inqnum[0].'-'.sprintf("%010d", $num+1);
    //     }
    //     }
    //     else
    //     {
    //         $serial = "INQ-".sprintf("%010d", 1);
    //     }
    //     $v->inquiry_number = $serial;
    //     $v->inquiry_details = $d->input('inquiry_details');
    //     $v->dealership = $d->input('dealership');
    //     $v->start_date = date('Y-m-d');
    //     $v->end_date = $d->input('end_date');
    //     $v->inquiry_type = $d->input('inquiry_type');
    //     $v->city = $d->input('city');
    //     $v->source = $d->input('source');
    //     $v->customer_type = $d->input('customer_type');
    //     $v->existing_vehicle = $d->input('existing_vehicle');
    //     $v->interested_vehicle = $d->input('interested_vehicle');
    //     $v->status = $d->input('status');
    //     $v->notes = $d->input('notes');
    //     $v->status_remarks = $d->input('status_remarks');
    //     $v->other_reason = $d->input('reason');
    //     $v->next_follow_up = $d->input('next-follow-up');
    //     $v->remarks = $d->input('remarks');
    //     $v->customer_id = $d->input('customer_id');
    //     $v->created_by = session()->get('isLogin')[0]['id'];
    //     $success = $v->save();
    //     if($success)
    //     {
    //         return redirect('inquiry-history/'.$d->input('customer_id'))->with('msg', 'Customer inquiry Created');
    //     }else
    //     {
    //         return redirect()->back()->with('error-msg', 'Customer inquiry not Created');
    //     }
    // }

    public function call_center_call()
    {
        return view('call-center-call');
    }

    public function call_center_call_details()
    {
        $city = DB::select("select * from tbl_city");
        $dealer = DB::select("select * from tbl_dealers");
        return view('call-center-customer-details', ['city' => $city, 'dealers' => $dealer]);
    }

    public function inquiry_history($id)
    {
        $inquiry = DB::select("SELECT tbl_customers_inquiries.*,customers.name as cname,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
        FROM tbl_customers_inquiries
        INNER JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
        INNER JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
        INNER JOIN tbl_city ON tbl_city.id = customers.city
        inner join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
        WHERE tbl_customers_inquiries.customer_id = $id ORDER BY id DESC");

        return view('inquiry-history', ["data" => $inquiry]);
    }

    public function complaint_list()
    {
        $data = DB::select("
            SELECT
            tbl_customers_complains.*,tbl_dealers.dealer_name,customers.name as customer_name,customers.mobile ,tbl_users.name as username, tbl_complain_cpt.complain_type,tbl_complain_spg.complain_spg_type,tbl_complain_ccc.complain_ccc_type
            FROM
            `tbl_customers_complains`
            LEFT JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
            LEFT JOIN customers ON customers.id = tbl_customers_complains.customer_id
            LEFT JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
            LEFT JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
            LEFT JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
            LEFT JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
            ORDER BY tbl_customers_complains.id DESC");
        $complain_cpt = DB::select("select * from `tbl_complain_cpt`");

        foreach ($data as $row) {
            $id = $row->id;
            // $created_at = explode(" ", $row->created_at);
            $status_update = null;
            $created_at = $row->createddate;
            $after3days = date('Y-m-d', strtotime($created_at . ' +3 days'));
            $currentdate = date("Y-m-d");
            $complaindate = new \Carbon\Carbon($row->createddate);
            $today = $currentdate;
            $aging = $complaindate->diff($today)->days;
            //echo $aging;
            if ($row->status == "Closed" && $row->status == "Force closed") {
                if (empty($row->aging)) {
                    DB::update("UPDATE `tbl_customers_complains` set aging = '$aging' WHERE `id` = '$id' ");
                }
            }
            // echo $after3days;
            $complainpreviousstatus = DB::select("select status as previousstatus, complain_number, created_by, created_at from tbl_customers_complains where id = '$id'");
            $previousstatus = $complainpreviousstatus[0]->previousstatus;
            $complain_number = $complainpreviousstatus[0]->complain_number;
            $created_by = $complainpreviousstatus[0]->created_by;
            $created_at = $complainpreviousstatus[0]->created_at;
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            $updated_by = session()->get('isLogin')[0]['id'];
            if ($currentdate == $after3days) {
                // dd($created_at);
                $status_update = DB::update("UPDATE `tbl_customers_complains` set status = 'Pending' WHERE `id` = '$id' ");
            }
            if ($status_update) {
                $sql = "
                    INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `previous_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES ('$complain_number','Pending','$previousstatus', '$created_by', '$created_at', '$updated_by', Now())
                    ";
                DB::insert($sql);
            }
            if ($currentdate >= $after3days && ($row->status != "Pending" && $row->status != "Force Closed" && $row->status != "Request to force close")) {
                $status_update = DB::update("UPDATE `tbl_customers_complains` set status = 'Pending' WHERE `id` = '$id' ");
            }
            if ($status_update) {
                $sql = "
                    INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `previous_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES ('$complain_number','Pending','$previousstatus', '$created_by', '$created_at', '$updated_by', Now())
                    ";
                DB::insert($sql);
            }
        }
        return view('complaint-management', ["list" => $data, 'complain_cpt' => $complain_cpt]);
    }

    public function complaints_api_status_logs()
    {
        $data = DB::select("
            SELECT
            api_status_log.*,
            tbl_users.name as user
            FROM
            `api_status_log`
            left JOIN tbl_users ON tbl_users.id = api_status_log.created_by
            ORDER BY api_status_log.id DESC");

        return view('complaints-api-logs', ["list" => $data]);
    }


    public function complain_details($id)
    {
        $row = DB::select("
        SELECT
        tbl_customers_complains.*,tbl_dealers.dealer_name,customers.name as customer_name, customers.mobile as mobile, customers.email as email, tbl_users.name as username, tbl_city.city as city, tbl_complain_cpt.complain_type as cpt, tbl_complain_spg.complain_spg_type as spg, tbl_complain_ccc.complain_ccc_type as ccc
        FROM
        `tbl_customers_complains`
        left JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
        left JOIN customers ON customers.id = tbl_customers_complains.customer_id
        left JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
        LEFT JOIN tbl_city ON tbl_city.id = customers.city
        left JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
        left JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
        left JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
        WHERE tbl_customers_complains.id = $id
        ");
        $followup = DB::select("select * from tbl_follow_up where complain_id = '$id' order by id desc");
        $dealership = DB::select("select * from tbl_dealers");
        return view('complain-details', compact('id', 'followup'), ['rows' => $row, 'dealership' => $dealership]);
    }

    // public function update_complaint_status($id, Request $d)
    // {
    //     $status = $d->input('complaint_status');
    //     DB::update("update tbl_customers_complains set status = '$status' where id = '$id'");
    //     return redirect()->back()->with('msg', 'Complaint status Updated');
    // }

    public function update_inquiry_status($id, Request $d)
    {
        $updated_by = session()->get('isLogin')[0]['id'];
        $status = $d->input('inquiry_status');
        $inquiry_number = $d->input('inquiry_number');
        $createdby = DB::select("select created_by as created_by from tbl_customers_inquiries where id = '$id'");
        $created_by = $createdby[0]->created_by;
        $createdat = DB::select("select created_at as created_at from tbl_customers_inquiries where id = '$id'");
        $created_at = $createdat[0]->created_at;
        $complainpreviousstatus = DB::select("select status as previousstatus from tbl_customers_inquiries where id = '$id'");
        $previousstatus = $complainpreviousstatus[0]->previousstatus;
        // Force
        $force_close_reason = $d->input('force_close_reason');
        // dd($status);
        // dd($force_close_reason);
        if ($status == "Request to force closed") {
            $update_status_force_closed = DB::update("update tbl_customers_inquiries set status = '$status', force_close_reason = '$force_close_reason' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_force_closed) {
                return redirect()->back()->with('msg', 'Inquiry Status Updated');
            }
        }
        if ($status == "Force closed") {
            $update_status_force_closed = DB::update("update tbl_customers_inquiries set status = '$status' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_force_closed) {
                return redirect()->back()->with('msg', 'Inquiry Status Updated');
            }
        }
        if ($status == "Closed") {
            dd($status);
            $update_status_force_closed = DB::update("update tbl_customers_inquiries set status = '$status' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_force_closed) {
                return redirect()->back()->with('msg', 'Inquiry Status Updated');
            }
        }
        if ($status == "Not Resolved") {
            dd($status);
            $update_status_force_closed = DB::update("update tbl_customers_inquiries set status = '$status' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_force_closed) {
                return redirect()->back()->with('msg', 'Inquiry Status Updated');
            }
        }
    }

    public function update_complaint_status($id, Request $d)
    {
        $updated_by = session()->get('isLogin')[0]['id'];
        $status = $d->input('complaint_status');
        $complain_number = $d->input('complain_number');
        $createdby = DB::select("select created_by as created_by from tbl_customers_complains where id = '$id'");
        $created_by = $createdby[0]->created_by;
        $createdat = DB::select("select created_at as created_at from tbl_customers_complains where id = '$id'");
        $created_at = $createdat[0]->created_at;
        $complainpreviousstatus = DB::select("select status as previousstatus from tbl_customers_complains where id = '$id'");
        $previousstatus = $complainpreviousstatus[0]->previousstatus;
        // Requested for force closure
        $force_close_reason = $d->input('force_close_reason');
        $dsc = $d->input('dsc');
        $dsc_remarks = $d->input('dsc_remarks');
        $customer_satisfaction = $d->input('customer_satisfaction');
        $guilty_dealsership = $d->input('guilty_dealsership');
        // Requested for force closure
        if ($status == "Request to force close") {
            $update_status_force_closure = DB::update("update tbl_customers_complains set status = '$status', force_close_reason = '$force_close_reason' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_force_closure) {
                $sql = "
                INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `previous_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
                ('$complain_number','$status','$previousstatus', '$created_by', '$created_at', '$updated_by',  '$date')
                ";
                DB::insert($sql);
            }
            if ($update_status_force_closure) {
                return redirect()->back()->with('msg', 'Complaint Status  Updated');
            }
        }
        // Force closed
        if ($status == "Force closed") {
            $update_status_force_closure = DB::update("update tbl_customers_complains set status = '$status', force_close_reason = '$force_close_reason' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_force_closure) {
                $sql = "
                INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `previous_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
                ('$complain_number','$status','$previousstatus', '$created_by', '$created_at', '$updated_by',  '$date')
                ";
                DB::insert($sql);
            }
            if ($update_status_force_closure) {
                return redirect()->back()->with('msg', 'Complaint Status  Updated');
            }
        }
        // closed
        if ($status == "Closed") {
            $update_status_closed = DB::update("update tbl_customers_complains set status = '$status', force_close_reason = '$force_close_reason', dsc = '$dsc', dsc_remarks= '$dsc_remarks', customer_satisfaction= '$customer_satisfaction', guilty_dealsership= '$guilty_dealsership' where id = '$id'");
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            if ($update_status_closed) {
                return redirect()->back()->with('msg', 'Status updated to: ' . " " . $status);
            }
        }
        $update_status = DB::update("update tbl_customers_complains set status = '$status' where id = '$id'");
        date_default_timezone_set('Asia/Karachi');
        $date = date("Y-m-d h:i:s");
        if ($update_status) {
            $sql = "
            INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `previous_status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
            ('$complain_number','$status','$previousstatus', '$created_by', '$created_at', '$updated_by',  '$date')
            ";
            DB::insert($sql);
        }
        return redirect()->back()->with('msg', 'Complaint status Updated');
    }

    public function add_follow_up(Request $d)
    {
        $obj = new Complaint_Follow_Up();
        $obj->date = $d->input('date');
        $obj->source = $d->input('source');
        // $obj->engage_time = $d->input('engage_time');
        $obj->agent = $d->input('agent');
        $obj->complaint_status = $d->input('complaint_status');
        $obj->notes = $d->input('notes');
        $obj->complain_id = $d->input('id');
        $obj->complain_number = $d->input('complain_number');
        $obj->created_by = session()->get('isLogin')[0]['id'];
        $obj->save();
        return redirect()->back()->with('msg', 'Complaint Followed Up Successfully');
    }

    public function create_customers_inquiry($id)
    {
        $channel = DB::select("select * from inq_complaints_sources");
        $vehicles = DB::select("select * from tbl_interested_vehicles");
        $status_reason = DB::select("select * from inquiry_status_reason");
        if ($id == 'add') {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customers-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'channel' => $channel]);
        } else if ($id == 'whatsapp') {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $customers = DB::select("select * from customers where mobile = '" . session()->get('number') . "'");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customers-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'customer' => $customers, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'channel' => $channel]);
        } else {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $customers = DB::select("select * from customers where id = $id");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customers-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'customer' => $customers, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'channel' => $channel]);
        }
    }

    public function create_customers_new_inquiry($id)
    {
        $pak_vehicles = DB::select("SELECT * FROM `vehicles_in_pakistan`");
        $channel = DB::select("select * from inq_complaints_sources");
        $presale_sources  = DB::select("SELECT * FROM `presale_inq_sources`");
        $presale_inquiry_types  = DB::select("SELECT * FROM `presale_inquirytype`");
        $sales_inquiry_types  = DB::select("SELECT * FROM `sales_inquirytype`");
        $general_inquiry_types  = DB::select("SELECT * FROM `general_inquirytype`");
        $afs_inquiry_types  = DB::select("SELECT * FROM `afs_inquirytype`");
        $dealernetwork_inquiry_types  = DB::select("SELECT * FROM `dealernetwork_inquirytype`");
        $vehicles = DB::select("select * from tbl_interested_vehicles");
        $status_reason = DB::select("select * from inquiry_status_reason");
        if ($id == 'add') {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customers-new-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'channel' => $channel, 'presale_sources' => $presale_sources, 'presale_inquiry_types' => $presale_inquiry_types, 'sales_inquiry_types' => $sales_inquiry_types, 'general_inquiry_types' => $general_inquiry_types, 'afs_inquiry_types' => $afs_inquiry_types, 'dealernetwork_inquiry_types' => $dealernetwork_inquiry_types, 'pak_vehicles' => $pak_vehicles]);
        } else if ($id == 'whatsapp') {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $customers = DB::select("select * from customers where mobile = '" . session()->get('number') . "'");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customers-new-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'customer' => $customers, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'channel' => $channel, 'presale_sources' => $presale_sources]);
        } else {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $customers = DB::select("select * from customers where id = $id");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customers-new-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'customer' => $customers, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'channel' => $channel, 'presale_sources' => $presale_sources]);
        }
    }

    public function create_customer_inquiry($id)
    {
        $source = DB::select("select * from inq_complaints_sources");
        $vehicles = DB::select("select * from tbl_interested_vehicles");
        $status_reason = DB::select("select * from inquiry_status_reason");
        if ($id == 'add') {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customer-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'source' => $source]);
        } else if ($id == 'whatsapp') {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $customers = DB::select("select * from customers where mobile = '" . session()->get('number') . "'");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customer-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'customer' => $customers, 'colors' => $colors]);
        } else {
            $city = DB::select("select * from tbl_city");
            $dealer = DB::select("select * from tbl_dealers");
            $customers = DB::select("select * from customers where id = $id");
            $complain_cpt = DB::select("select * from tbl_complain_cpt");
            $complain_spg = DB::select("select * from tbl_complain_spg");
            $complain_ccc = DB::select("select * from tbl_complain_ccc");
            $colors = DB::select("select * from tbl_car_colors");
            return view('create-customer-inquiry', ['city' => $city, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'customer' => $customers, 'colors' => $colors]);
        }
    }

    // public/create-customer-inquiry/add
    public function add_customer_inquiry(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');
        $mobile = $req->input('mobile');
        $city = $req->input('city');
        $city_id = $city;
        $customer_type = $req->input('customer_type');
        $created_by = session()->get('isLogin')[0]['id'];
        date_default_timezone_set('Asia/Karachi');
        date_default_timezone_set('Asia/Karachi');
        $date = date("Y-m-d h:i:s");
        $todaydate = date("Y-m-d");
        $currentDateTime = date('d-m-Y H:i:s', strtotime('now'));
        $currentDate = date('d-m-Y');
        $currentTime = date('H:i:s');
        $cm_number = DB::select("SELECT complain_number FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
        if (!empty($cm_number)) {
            $last_cm_number = $cm_number[0]->complain_number;
            $last_four_char = substr($last_cm_number, -4);
            $complain_number = $last_four_char + 1;
        } else {
            $complain_number = 1600;
        }
        $complaint_type_gen = $req->input('complaint_type_gen');
        $gen_complain_source = $req->input('gen_complain_source');
        $gen_complain_dealership = $req->input('gen_complain_dealership');
        $gen_complain_cpt_type = $req->input('gen_complain_cpt_type');
        $gen_complain_spg_type = $req->input('gen_complain_spg_type');
        $gen_complain_ccc_type = $req->input('gen_complain_ccc_type');
        $gen_complain_voc = $req->input('gen_complain_voc');
        $gen_agent_complain_notes = $req->input('gen_agent_complain_notes');
        $gen_complaint_priority = $req->input('gen_complaint_priority');
        // --------------------------------------------------------------------
        // Pre Sale  - presale
        $complaint_type_presale = $req->input('complaint_type_presale');
        $presale_complain_source = $req->input('presale_complain_source');
        $presale_complain_dealership = $req->input('presale_complain_dealership');
        $presale_complain_cpt_type = $req->input('presale_complain_cpt_type');
        $presale_complain_spg_type = $req->input('presale_complain_spg_type');
        $presale_complain_ccc_type = $req->input('presale_complain_ccc_type');
        $presale_complain_voc = $req->input('presale_complain_voc');
        $presale_agent_complain_notes = $req->input('presale_agent_complain_notes');
        $presale_complaint_priority = $req->input('presale_complaint_priority');
        // --------------------------------------------------------------------
        // Sale VARIABLES
        $complaint_type_sale = $req->input('complaint_type_sale');
        $sale_complain_source = $req->input('sale_complain_source');
        $sale_pbo = $req->input('sale_pbo');
        $sale_sale_order_number = $req->input('sale_sale_order_number');
        $sale_customer_vehicle = $req->input('sale_customer_vehicle');
        $sale_invoice_number = $req->input('sale_invoice_number');
        $sale_invoice_date = $req->input('sale_invoice_date');
        $formatted_sale_invoice_date = date("Y-m-d", strtotime($sale_invoice_date));
        $sale_vehicle_colour = $req->input('sale_vehicle_colour');
        $sale_complain_dealership = $req->input('sale_complain_dealership');
        $sale_last_two_digits = substr($sale_complain_dealership, -2);
        $sale_complain_cpt_type = $req->input('sale_complain_cpt_type');
        $sale_complain_spg_type = $req->input('sale_complain_spg_type');
        $sale_complain_ccc_type = $req->input('sale_complain_ccc_type');
        $complaint_number = $sale_complain_cpt_type . $sale_complain_spg_type . $sale_last_two_digits . $complain_number;
        $sale_complaint_number = $sale_complain_cpt_type . $sale_complain_spg_type . $sale_last_two_digits . $complain_number;
        $sale_complaint_priority = $req->input('sale_complaint_priority');
        $sale_complain_voc = $req->input('sale_complain_voc');
        $sale_agent_complain_notes = $req->input('sale_agent_complain_notes');
        // $sale_chasis_number = $req->input('sale_chasis_number');
        // $sale_engine_number = $req->input('sale_engine_number');
        // $sale_registration_number = $req->input('sale_registration_number');
        // $sale_milage = $req->input('sale_milage');
        // --------------------------------------------------------------------
        //  After Sale VARIABLES
        $complaint_type_aftersale = $req->input('complaint_type_aftersale');
        $aftersale_complain_source = $req->input('aftersale_complain_source');
        $aftersale_customer_vehicle = $req->input('aftersale_customer_vehicle');
        $aftersale_vehicle_colour = $req->input('aftersale_vehicle_colour');
        $aftersale_complain_cpt_type = $req->input('aftersale_complain_cpt_type');
        $aftersale_complain_spg_type = $req->input('aftersale_complain_spg_type');
        $aftersale_complain_ccc_type = $req->input('aftersale_complain_ccc_type');
        $aftersale_complain_dealership = $req->input('aftersale_complain_dealership');
        $afs_last_two_digits = substr($aftersale_complain_dealership, -2);
        $complaint_number = $aftersale_complain_cpt_type . $aftersale_complain_spg_type . $afs_last_two_digits . $complain_number;
        $afs_complaint_number = $aftersale_complain_cpt_type . $aftersale_complain_spg_type . $afs_last_two_digits . $complain_number;
        $aftersale_pbo = $req->input('aftersale_pbo');
        $aftersale_complain_source = $req->input('aftersale_complain_source');
        $aftersale_chasis_number = $req->input('aftersale_chasis_number');
        $aftersale_engine_number = $req->input('aftersale_engine_number');
        $aftersale_registration_number = $req->input('aftersale_registration_number');
        $aftersale_invoice_number = $req->input('aftersale_invoice_number');
        //aftersale_invoice_date
        $aftersale_invoice_date = $req->input('aftersale_invoice_date');
        $aftersale_formatted_date = date("Y-m-d", strtotime($aftersale_invoice_date));
        // dd($aftersale_formatted_date);
        $aftersale_aftersale_order_number = $req->input('aftersale_aftersale_order_number');
        $aftersale_milage = $req->input('aftersale_milage');
        $aftersale_complain_voc = $req->input('aftersale_complain_voc');
        $aftersale_agent_complain_notes = $req->input('aftersale_agent_complain_notes');
        $aftersale_complaint_priority = $req->input('aftersale_complaint_priority');
        // attatchment
        $filename = '';
        if ($req->file('upload_docs')) {
            $file = $req->file('upload_docs');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = $file->move(public_path('assets/upload_docs'), $filename);
        }
        //COMPLAINTS FIELDS END
        // CHECK IF CUSTOMER EXISTS OR NOT
        $check_customer = DB::select("select * from `customers` where `name` = '$name' and `mobile` = '$mobile'");
        if (count($check_customer) == 1) {
            $existing_customer_id = $check_customer[0]->id;
            $existing_customer_name = $check_customer[0]->name;
            $customer_id = $existing_customer_id;
        }
        // IF CUSTOMER EXISTS
        if (count($check_customer) == 1) {
            // CREATING 4 TYPES OF COMPLAINTS - GENERAL, PRE-SALE, SALE, AFTER SALE STARTS

            // Complaint Type - General
            if ($complaint_type_gen == 'General' && $gen_complain_voc != '') {
                // generating complaint number
                $last_two_digits = substr($gen_complain_dealership, -2);
                $complaint_number = $gen_complain_cpt_type . $gen_complain_spg_type . $last_two_digits . $complain_number;
                $create_gen_complaint = DB::insert("
                            INSERT INTO `tbl_customers_complains`
                            (`id`, `created_at`, `createddate`, `createdtime`, `customer_id`, `created_by`, `source`, `complain_number`, `complain_type_cpt`, `complain_type_spg`, `complain_type_ccc`, `voc`, `dealership`, `complaint_priority`, `notes`, `status`, `complaint_type`)
                            VALUES
                            (null,'$date', '$currentDate','$currentTime', '$customer_id','$created_by', '$gen_complain_source', '$complaint_number', $gen_complain_cpt_type, '$gen_complain_spg_type', '$gen_complain_ccc_type', '$gen_complain_voc','$gen_complain_dealership','$gen_complaint_priority','$gen_agent_complain_notes', 'Open', '$complaint_type_gen')
                        ");
                //  SENDING SMS /  SMS API
                if ($create_gen_complaint) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $complaint_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                if ($create_gen_complaint) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }
                if ($create_gen_complaint) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'complaint')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $complaint_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // Mail::to($recipients)->send(new TestEmail($data));
                    // SENDING MAIL ENDS
                    return redirect('complaint-management')->with('msg', "$existing_customer_name's complaint registered with ticket # $complaint_number");
                }
            }

            // Complaint Type - Pre sale
            if ($complaint_type_presale == 'Pre-Sale' && $presale_complain_voc != '') {
                // generating complaint number
                $last_two_digits = substr($presale_complain_dealership, -2);
                $complaint_number = $presale_complain_cpt_type . $presale_complain_spg_type . $last_two_digits . $complain_number;
                $create_presale_complain = DB::insert("
                            INSERT INTO `tbl_customers_complains`
                            (`id`, `created_at`, `createddate`, `createdtime`, `customer_id`, `created_by`, `source`, `complain_number`, `complain_type_cpt`, `complain_type_spg`, `complain_type_ccc`, `voc`, `dealership`, `complaint_priority`, `notes`, `status`, `complaint_type`)
                            VALUES
                            (null, '$date', '$currentDate','$currentTime', '$customer_id', '$created_by', '$presale_complain_source', '$complaint_number', '$presale_complain_cpt_type', '$presale_complain_spg_type', '$presale_complain_ccc_type', '$presale_complain_voc', '$presale_complain_dealership', '$presale_complaint_priority', '$presale_agent_complain_notes', 'Open', '$complaint_type_presale')
                        ");
                //  SENDING SMS /  SMS API
                if ($create_presale_complain) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $complaint_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                if ($create_presale_complain) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }
                if ($create_presale_complain) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'complaint')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $complaint_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // Mail::to($recipients)->send(new TestEmail($data));
                    // SENDING MAIL ENDS
                    return redirect('complaint-management')->with('msg', "$existing_customer_name's complaint registered with ticket # $complaint_number");
                }
            }

            // Complaint Type - Sale
            if ($complaint_type_sale == 'Sale' && $sale_complain_voc != '') {
                // CITY ID
                $city_id = $city;

                // REGISTERING NEW SALE COMPLAINT'S QUERY
                $sales_data = array(
                    'id' => NULL,
                    'complaint_type' => $complaint_type_sale,
                    'complain_number' => $sale_complaint_number,
                    'created_at' => $date,
                    'createddate' => $currentDate,
                    'createdtime' => $currentTime,
                    'customer_id' => $customer_id,
                    'city_id' => $city_id,
                    'created_by' => $created_by,
                    'source' => $sale_complain_source,
                    'pbo' => $sale_pbo,
                    'sales_order_number' => $sale_sale_order_number,
                    'customer_vehicle' => $sale_customer_vehicle,
                    'invoice_number' => $sale_invoice_number,
                    'invoice_date' => $formatted_sale_invoice_date,
                    'vehicle_colour' => $sale_vehicle_colour,
                    'dealership' => $sale_complain_dealership,
                    'complain_type_cpt' => $sale_complain_cpt_type,
                    'complain_type_spg' => $sale_complain_spg_type,
                    'complain_type_ccc' => $sale_complain_ccc_type,
                    'voc' => $sale_complain_voc,
                    'complaint_priority' => $sale_complaint_priority,
                    'notes' => $sale_agent_complain_notes,
                    'status' => 'Open'
                );

                $create_sale_complain = DB::table('tbl_customers_complains')->insert($sales_data);
                // $last_id = DB::table('tbl_customers_complains')->insertGetId($sales_data);

                // SENDING SMS / SMS API
                if ($create_sale_complain) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $sale_complaint_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }

                // MAINTAINING LOGS - INSERTING IN `complain-status-log` TABLE
                if ($create_sale_complain) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$sale_complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }

                // SENDING MAIL STARTS
                if ($create_sale_complain) {
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'complaint')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $sale_complaint_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // Mail::to($recipients)->send(new TestEmail($data));
                }
                // SENDING MAIL ENDS

                // SENDING COMPLAINT INTO DMS
                if ($create_sale_complain) {
                    $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                    $complaintid = $complaintid[0]->id;
                    $this->sales_crm_to_dms($complaintid);
                }

                // REDIRECTING TO complaint-management PAGE
                if ($create_sale_complain) {
                    return redirect('complaint-management')
                        ->with('msg', "$existing_customer_name's complaint registered with ticket # $sale_complaint_number")
                        ->with('crm-to-dms', "Complaint landed in DMS with ticket # $sale_complaint_number");
                }

                // if ($create_sale_complain) {
                //     return redirect('complaint-management')->with('msg', "$existing_customer_name's complaint registered with ticket # $sale_complaint_number");
                // }
            }

            // Complaint Type - After Sale
            if ($complaint_type_aftersale == 'After Sale' && $aftersale_complain_voc != '') {
                // CITY ID
                $city_id = $city;

                // REGISTERING NEW After Sale COMPLAINT'S QUERY
                $afs_data = array(
                    'id' => NULL,
                    'created_at' => $date,
                    'createddate' => $currentDate,
                    'createdtime' => $currentTime,
                    'customer_id' => $customer_id,
                    'city_id' => $city_id,
                    'created_by' => $created_by,
                    'source' => $aftersale_complain_source,
                    'complain_number' => $afs_complaint_number,
                    'complain_type_cpt' => $aftersale_complain_cpt_type,
                    'complain_type_spg' => $aftersale_complain_spg_type,
                    'complain_type_ccc' => $aftersale_complain_ccc_type,
                    'pbo' => $aftersale_pbo,
                    'chasis_number' => $aftersale_chasis_number,
                    'engine_number' => $aftersale_engine_number,
                    'registration_number' => $aftersale_registration_number,
                    'invoice_date' => $aftersale_formatted_date,
                    'voc' => $aftersale_complain_voc,
                    'dealership' => $aftersale_complain_dealership,
                    'customer_vehicle' => $aftersale_customer_vehicle,
                    'vehicle_colour' => $aftersale_vehicle_colour,
                    'complaint_priority' => $aftersale_complaint_priority,
                    'notes' => $aftersale_agent_complain_notes,
                    'status' => 'Open',
                    'complaint_type' => $complaint_type_aftersale
                );
                $create_sale_complain = DB::table('tbl_customers_complains')->insert($afs_data);
                // $last_id = DB::table('tbl_customers_complains')->insertGetId($afs_data);

                // SENDING SMS / SMS API
                if ($create_sale_complain) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'complaint')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $afs_complaint_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }

                // MAINTAINING LOGS - INSERTING IN `complain-status-log` TABLE
                if ($create_sale_complain) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$afs_complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }

                // SENDING MAIL STARTS
                if ($create_sale_complain) {
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'complaint')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $afs_complaint_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // Mail::to($recipients)->send(new TestEmail($data));
                }
                // SENDING MAIL ENDS

                // SENDING COMPLAINT INTO DMS
                if ($create_sale_complain) {
                    $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                    $complaintid = $complaintid[0]->id;
                    $this->afs_crm_to_dms($complaintid);
                }

                // REDIRECTING TO complaint-management PAGE
                if ($create_sale_complain) {
                    return redirect('complaint-management')
                        ->with('msg', "$existing_customer_name's complaint registered with ticket # $afs_complaint_number")
                        ->with('crm-to-dms', "Complaint landed in DMS with ticket # $afs_complaint_number");
                }
            }
        } else {
            // ADDING NEW CUSTOMER
            $add_customer = DB::insert("INSERT INTO `customers`(`id`,`name`, `email`, `mobile`, `date`, `city`, customer_type) VALUES (null,'$name','$email','$mobile','$date', '$city', '$customer_type')");

            // GETTING ID (LAST ID) OF (LAST) REGISTERED CUSTOMER
            if ($add_customer) {
                $cid = DB::select("select id from customers order by id desc limit 1");
                $customer_id = $cid[0]->id;

                // CREATING 4 TYPES OF COMPLAINTS - GENERAL, PRE-SALE, SALE, AFTER SALE STARTS

                // Complaint Type - General
                if ($complaint_type_gen == 'General' && $gen_complain_voc != '') {
                    // Complaint Type - General
                    // generating complaint number
                    $last_two_digits = substr($gen_complain_dealership, -2);
                    $complaint_number = $gen_complain_cpt_type . $gen_complain_spg_type . $last_two_digits . $complain_number;
                    $create_gen_complaint = DB::insert("
                            INSERT INTO `tbl_customers_complains`
                            (`id`, `created_at`, `createddate`,`customer_id`, `created_by`, `source`, `complain_number`, `complain_type_cpt`, `complain_type_spg`, `complain_type_ccc`, `voc`, `dealership`, `complaint_priority`, `notes`, `status`, `complaint_type`)
                            VALUES
                            (null,'$date', '$todaydate','$customer_id','$created_by', '$gen_complain_source', '$complaint_number', $gen_complain_cpt_type, '$gen_complain_spg_type', '$gen_complain_ccc_type', '$gen_complain_voc','$gen_complain_dealership','$gen_complaint_priority','$gen_agent_complain_notes', 'Open', '$complaint_type_gen')
                        ");
                    // SENDING SMS / SMS API
                    if ($create_gen_complaint) {
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_url');
                        $x = $mobile;
                        $i = $complaint_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        $response = Http::post($url);
                    }
                    if ($create_gen_complaint) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`) VALUES ('$complaint_number','Open', '$created_by', '$date')";
                        DB::insert($sql);
                    }
                    if ($create_gen_complaint) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }
                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'complaint')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $complaint_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            ->bcc($bccRecipients)
                            ->send($mail);
                        // Mail::to($recipients)->send(new TestEmail($data));
                        // SENDING MAIL ENDS
                    }
                    return redirect('complaint-management')->with('msg', "New customer - $name's complaint registered with ticket # $complaint_number");
                }
                // Complaint Type - Pre sale
                if ($complaint_type_presale == 'Pre-Sale' && $presale_complain_voc != '') {
                    // generating complaint number
                    $last_two_digits = substr($presale_complain_dealership, -2);
                    $complaint_number = $presale_complain_cpt_type . $presale_complain_spg_type . $last_two_digits . $complain_number;
                    $create_presale_complain = DB::insert("
                            INSERT INTO `tbl_customers_complains`
                            (`id`, `created_at`, `createddate`, `customer_id`, `created_by`, `source`, `complain_number`, `complain_type_cpt`, `complain_type_spg`, `complain_type_ccc`, `voc`, `dealership`, `complaint_priority`, `notes`, `status`, `complaint_type`)
                            VALUES
                            (null, '$date', '$todaydate', '$customer_id', '$created_by', '$presale_complain_source', '$complaint_number', '$presale_complain_cpt_type', '$presale_complain_spg_type', '$presale_complain_ccc_type', '$presale_complain_voc', '$presale_complain_dealership', '$presale_complaint_priority', '$presale_agent_complain_notes', 'Open', '$complaint_type_presale')
                        ");
                    // SENDINS SMS / SMS API
                    if ($create_presale_complain) {
                        // $x = $mobile;
                        // $i = $complain_number;
                        // $msg = "Dear Customer, Thank you for contacting Master Changan Motors your COMPLAINT has been registered and your COMPLAINT No. is '" . $i . "' for future follow up and update";
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        // $response = Http::post($url);
                        // return $response;
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_url');
                        // dd($sms_url);
                        $x = $mobile;
                        $i = $complaint_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        // dd($url);
                        $response = Http::post($url);
                    }

                    if ($create_presale_complain) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at` ) VALUES ('$complaint_number','Open', '$created_by', '$date')";
                        DB::insert($sql);
                    }
                    if ($create_presale_complain) {

                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        $ccRecipients = [
                            "irfanahmed.qbs@gmail.com"
                        ];
                        // $bccRecipients = [
                        //     "hasan.imam@changan.com.pk"
                        // ];
                        $data = [
                            'Message' => "Dear Customer, Thank you for contacting Master Changan Motors. Your COMPLAINT has been registered and your COMPLAINT No. is " . $complain_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            // ->bcc($bccRecipients)
                            ->send($mail);
                        // Mail::to($recipients)->send(new TestEmail($data));
                        // SENDING MAIL ENDS

                        return redirect('complaint-management')->with('msg', "New customer - $name's complaint registered with ticket # $complaint_number");
                    }
                }

                // Complaint Type - Sale
                if ($complaint_type_sale == 'Sale' && $sale_complain_voc != '') {
                    // CITY ID
                    $city_id = $city;

                    // REGISTERING NEW COMPLAINT'S QUERY
                    $sales_data = array(
                        'id' => NULL,
                        'complaint_type' => $complaint_type_sale,
                        'complain_number' => $sale_complaint_number,
                        'created_at' => $date,
                        'createddate' => $currentDate,
                        'createdtime' => $currentTime,
                        'customer_id' => $customer_id,
                        'city_id' => $city_id,
                        'created_by' => $created_by,
                        'source' => $sale_complain_source,
                        'pbo' => $sale_pbo,
                        'sales_order_number' => $sale_sale_order_number,
                        'customer_vehicle' => $sale_customer_vehicle,
                        'invoice_number' => $sale_invoice_number,
                        'invoice_date' => $formatted_sale_invoice_date,
                        'vehicle_colour' => $sale_vehicle_colour,
                        'dealership' => $sale_complain_dealership,
                        'complain_type_cpt' => $sale_complain_cpt_type,
                        'complain_type_spg' => $sale_complain_spg_type,
                        'complain_type_ccc' => $sale_complain_ccc_type,
                        'voc' => $sale_complain_voc,
                        'complaint_priority' => $sale_complaint_priority,
                        'notes' => $sale_agent_complain_notes,
                        'status' => 'Open'
                    );

                    $create_sale_complain = DB::table('tbl_customers_complains')->insert($sales_data);
                    // $last_id = DB::table('tbl_customers_complains')->insertGetId($sales_data);

                    // SENDING SMS / SMS API
                    if ($create_sale_complain) {
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_url');
                        $x = $mobile;
                        $i = $sale_complaint_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        $response = Http::post($url);
                    }

                    // MAINTAINING LOGS - INSERTING IN `complain-status-log` TABLE
                    if ($create_sale_complain) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$sale_complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                        DB::insert($sql);
                    }

                    // SENDING MAIL STARTS
                    if ($create_sale_complain) {
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }
                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'complaint')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $sale_complaint_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            ->bcc($bccRecipients)
                            ->send($mail);
                        // Mail::to($recipients)->send(new TestEmail($data));
                    }
                    // SENDING MAIL ENDS

                    // SENDING COMPLAINT INTO DMS
                    // if ($create_sale_complain) {
                    //     $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                    //     $complaintid = $complaintid[0]->id;
                    //     $this->sales_crm_to_dms($complaintid);
                    // }

                    // REDIRECTING TO complaint-management PAGE
                    // if ($create_sale_complain) {
                    //     return redirect('complaint-management')
                    //         ->with('msg', "$existing_customer_name's complaint registered with ticket # $sale_complaint_number")
                    //         ->with('crm-to-dms', "Complaint landed in DMS with ticket # $sale_complaint_number");
                    // }

                    if ($create_sale_complain) {
                        return redirect('complaint-management')->with('msg', "New customer - $name's complaint registered with ticket # $sale_complaint_number");
                    }
                }

                // Complaint Type - After Sale
                if ($complaint_type_aftersale == 'After Sale' && $aftersale_complain_voc != '') {
                    // CITY ID
                    $city_id = $city;
                    // REGISTERING NEW COMPLAINT'S QUERY
                    $afs_data = array(
                        'id' => NULL,
                        'created_at' => $date,
                        'createddate' => $currentDate,
                        'createdtime' => $currentTime,
                        'customer_id' => $customer_id,
                        'city_id' => $city_id,
                        'created_by' => $created_by,
                        'source' => $aftersale_complain_source,
                        'complain_number' => $afs_complaint_number,
                        'complain_type_cpt' => $aftersale_complain_cpt_type,
                        'complain_type_spg' => $aftersale_complain_spg_type,
                        'complain_type_ccc' => $aftersale_complain_ccc_type,
                        'pbo' => $aftersale_pbo,
                        'chasis_number' => $aftersale_chasis_number,
                        'engine_number' => $aftersale_engine_number,
                        'registration_number' => $aftersale_registration_number,
                        'invoice_date' => $aftersale_formatted_date,
                        'voc' => $aftersale_complain_voc,
                        'dealership' => $aftersale_complain_dealership,
                        'customer_vehicle' => $aftersale_customer_vehicle,
                        'vehicle_colour' => $aftersale_vehicle_colour,
                        'complaint_priority' => $aftersale_complaint_priority,
                        'notes' => $aftersale_agent_complain_notes,
                        'status' => 'Open',
                        'complaint_type' => $complaint_type_aftersale
                    );
                    $create_sale_complain = DB::table('tbl_customers_complains')->insert($afs_data);
                    // $last_id = DB::table('tbl_customers_complains')->insertGetId($afs_data);

                    // if ($create_sale_complain) {
                    //     dd("COMPLAINT OF NEW CUSTOMER CREATED");
                    // }

                    // SENDING SMS / SMS API
                    if ($create_sale_complain) {
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'complaint')
                            ->value('sms_url');
                        $x = $mobile;
                        $i = $afs_complaint_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        $response = Http::post($url);
                    }

                    // MAINTAINING LOGS - INSERTING IN `complain-status-log` TABLE
                    if ($create_sale_complain) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$afs_complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                        DB::insert($sql);
                    }

                    // SENDING MAIL STARTS
                    if ($create_sale_complain) {
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }
                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'complaint')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $afs_complaint_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            ->bcc($bccRecipients)
                            ->send($mail);
                        // Mail::to($recipients)->send(new TestEmail($data));
                    }
                    // SENDING MAIL ENDS

                    // SENDING COMPLAINT INTO DMS
                    if ($create_sale_complain) {
                        $complaintid = DB::select("select id from tbl_customers_complains order by id desc limit  1");
                        $complaintid = $complaintid[0]->id;
                        $this->afs_crm_to_dms($complaintid);
                    }
                    // REDIRECTING TO complaint-management PAGE
                    if ($create_sale_complain) {
                        return redirect('complaint-management')
                            ->with('msg', "New customer - $name's complaint registered with ticket # $afs_complaint_number")
                            ->with('crm-to-dms', "Complaint landed in DMS with ticket # $afs_complaint_number");
                    }
                }
                // CREATING 4 TYPES OF COMPLAINTS - GENERAL, PRE-SALE, SALE, AFTER SALE ENDS
            }
        }
    }

    public function add_customers_inquiry(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');
        $mobile = $req->input('mobile');
        $city = $req->input('city');
        date_default_timezone_set('Asia/Karachi');
        $date = date("Y-m-d h:i:s");
        $todaydate = date("Y-m-d");
        $created_by = session()->get('isLogin')[0]['id'];
        //creating inquiry's fields variables
        $assigned_agent = $req->input('assigned_agent');
        $inquiry_details = $req->input('inquiry_details');
        $inquiry_dealership = $req->input('inquiry_dealership');
        $start_date = date('Y-m-d');
        $end_date = $req->input('end_date');
        $inquiry_type = $req->input('inquiry_type');
        $inquiry_sub_type = $req->input('inquiry_sub_type');
        $payment_mode = $req->input('payment_mode');
        $existing_vehicle = $req->input('existing_vehicle');
        $interested_vehicle = $req->input('interested_vehicle');
        $interested_color = $req->input('interested_color');
        $inquiry_source = $req->input('inquiry_source');
        $inquiry_status = $req->input('inquiry_status');
        $inquiry_status_remarks = $req->input('inquiry_status_remarks');
        $status_reason = $req->input('status_reason');
        $other_reason = $req->input('other_reason');
        $next_follow_up = $req->input('next_follow_up');
        $followup_prefered_time = $req->input('followup_prefered_time');
        $followup_remarks = $req->input('followup_remarks');
        $agent_inquiry_notes = $req->input('agent_inquiry_notes');
        $callback = $req->input('callback');
        $dealer_prefered_date = $req->input('dealer_prefered_date');
        $dealer_prefered_time = $req->input('dealer_prefered_time');
        $dealer_reason = $req->input('dealer_reason');
        // generating inquiry number
        $inq_number = DB::select("select inquiry_number from tbl_customers_inquiries ORDER BY id DESC LIMIT 1");
        if ($inq_number) {
            $array = ($inq_number);
            foreach ($array as $row) {
                $row->inquiry_number;
                $inqnum = explode("-", $row->inquiry_number);
                $num = (int)$inqnum[1];
                $serial = $inqnum[0] . '-' . sprintf("%010d", $num + 1);
            }
        } else {
            $serial = "INQ-" . sprintf("%010d", 1);
        }
        $inquiry_number = $serial;
        // inquiry's fields variables ends
        // checking, whether customer exists or not
        $check_customer = DB::select("select * from `customers` where `name` = '$name' and `mobile` = '$mobile'");
        if (count($check_customer) == 1) {
            $existing_customer_id = $check_customer[0]->id;
            $existing_customer_name = $check_customer[0]->name;
            $customer_id = $existing_customer_id;
        }
        // if customer exists
        if (count($check_customer) == 1) {
            // creating inquiry of the existing customer
            if ($inquiry_type != '' && $inquiry_details != '') {
                $add_inquiry = DB::insert("
                INSERT INTO `tbl_customers_inquiries`
                (`customer_id`, `created_by`, `assigned_agent`, `city_id`, `inquiry_details`, `inquiry_type`, `inquiry_sub_type`, `payment_mode`, `inquiry_number`, `dealership`, `source`, `interested_color`, `start_date`, `end_date`, `existing_vehicle`, `interested_vehicle`, `status`, `status_reason`, `other_reason`, `next_follow_up`, `followup_prefered_time`, `followup_remarks`, `remarks`, `agent_notes`, `callback`, `dealer_prefered_date`, `dealer_prefered_time`,`dealer_reason`)
                VALUES
                ('$customer_id','$created_by', '$assigned_agent', '$city' ,'$inquiry_details','$inquiry_type', '$inquiry_sub_type', '$payment_mode','$inquiry_number','$inquiry_dealership', '$inquiry_source', '$interested_color','$start_date','$end_date','$existing_vehicle','$interested_vehicle','$inquiry_status','$status_reason','$other_reason','$next_follow_up','$followup_prefered_time','$followup_remarks','$inquiry_status_remarks','$agent_inquiry_notes', '$callback', '$dealer_prefered_date', '$dealer_prefered_time', '$dealer_reason')
                ");
            }
            if ($add_inquiry) {

                $inquiryid = DB::select("select id from tbl_customers_inquiries order by id desc limit  1");
                // Var_dump($inquiryid);
                // die();

                $inquiryid = $inquiryid[0]->id;
                $this->save_customer($inquiryid);

                // SENDING MAIL STARTS
                // $recipients = [
                //     "irfanahmed.qbs@gmail.com"
                // ];
                // $data = ['Message' => "Dear Customer, Thank you for contacting Master Changan Motors your inquiry has been registered and your Inquiry No. is " . $inquiry_number];
                // Mail::to($recipients)->send(new TestEmail($data));


                // SENDING MAIL STARTS
                $customer_email = $email;
                $recipients = [
                    $customer_email
                ];
                $ccRecipients = [
                    "irfanahmed.qbs@gmail.com"
                ];
                // $bccRecipients = [
                //     "hasan.imam@changan.com.pk"
                // ];
                $data = [
                    'Message' => "Dear Customer, Thank you for contacting Master Changan Motors. Your INQUIRY has been registered and your INQUIRY No. is " . $inquiry_number
                ];
                $mail = new TestEmail($data);
                Mail::to($recipients)
                    ->cc($ccRecipients)
                    // ->bcc($bccRecipients)
                    ->send($mail);
                // Mail::to($recipients)->send(new TestEmail($data));
                // SENDING MAIL ENDS

                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
        } else {
            $add_customer = DB::insert("INSERT INTO `customers`(`id`,`name`, `email`, `mobile`, `date`, `city`) VALUES (null,'$name','$email','$mobile','$date', '$city')");
            if ($add_customer) {
                $cid = DB::select("select id from customers order by id desc limit 1");
                $custemail = DB::select("SELECT email FROM `customers` order by id desc limit 1;");
                // dd($custemail);
                $customer_id = $cid[0]->id;
                // dd($customer_email);
                $add_inquiry = DB::insert("INSERT INTO `tbl_customers_inquiries`
                (`id`, `customer_id`, `created_by`, `assigned_agent`, `city_id`, `inquiry_details`, `inquiry_type`, `inquiry_sub_type`, `payment_mode`, `inquiry_number`, `dealership`, `source`, `interested_color`, `start_date`, `end_date`, `existing_vehicle`, `interested_vehicle`, `status`, `status_reason`, `other_reason`, `next_follow_up`, `followup_prefered_time`, `followup_remarks`, `remarks`, `agent_notes`, `callback`, `dealer_prefered_date`, `dealer_prefered_time`,`dealer_reason`)
                VALUES
                (null, '$customer_id','$created_by','$assigned_agent', '$city', '$inquiry_details','$inquiry_type', '$inquiry_sub_type', '$payment_mode','$inquiry_number','$inquiry_dealership', '$inquiry_source', '$interested_color','$start_date','$end_date','$existing_vehicle','$interested_vehicle','$inquiry_status','$status_reason','$other_reason','$next_follow_up','$followup_prefered_time','$followup_remarks','$inquiry_status_remarks','$agent_inquiry_notes', '$callback', '$dealer_prefered_date', '$dealer_prefered_time', '$dealer_reason');
                ");
                if ($add_inquiry) {
                    $update_customer = DB::update("UPDATE `customers` SET `channel` = '$inquiry_source' WHERE id = '$$cid'");
                    $inquiryid = DB::select("select id from tbl_customers_inquiries order by id desc limit  1");
                    $inquiryid = $inquiryid[0]->id;
                    $this->save_customer($inquiryid);
                    // SENDING MAIL
                    $customer_email = $email;
                    $crm_admin = "irfanahmedkhan2811@gmail.com";
                    $recipients = [
                        $customer_email,
                        $crm_admin
                    ];
                    $data = ['Message' => "Dear Customer, Thank you for contacting Master Changan Motors your inquiry has been registered and your Inquiry No. is " . $inquiry_number];
                    Mail::to($recipients)->send(new TestEmail($data));
                    return redirect('customer-inquiries-list')->with('msg', "New Customer - $name,  inquiry created with ticket # $inquiry_number");
                }
            }
        }
    }

    public function add_customers_new_inquiry(Request $req)
    {
        $name = $req->input('name');
        $email = $req->input('email');
        $mobile = $req->input('mobile');
        $city = $req->input('city');
        date_default_timezone_set('Asia/Karachi');
        $currentDateTime = date('d-m-Y H:i:s', strtotime('now'));
        $currentDate = date('d-m-Y');
        $currentTime = date('H:i:s');
        $date = date("Y-m-d h:i:s");
        $todaydate = date("Y-m-d");
        $created_by = session()->get('isLogin')[0]['id'];
        $start_date = date('d-m-Y');
        $expected_closure = date('d-m-Y', strtotime($currentDate . ' + 7 days'));
        // $expected_closure = $req->input('expected_closure');
        // $expected_closure = date('d-m-Y', strtotime($expected_closure));

        // Pre-Sales VARIABLES
        $presales_inquiry_subtype = NULL;
        $inquiry_category_presales = $req->input('inquiry_category_presales');
        $presales_inquiry_channel = $req->input('presales_inquiry_channel');
        $presales_inquiry_source = $req->input('presales_inquiry_source');
        $presales_inquiry_type = $req->input('presales_inquiry_type');
        $presales_inquiry_subtype = $req->input('presales_inquiry_subtype');
        $presales_inquiry_dealership = $req->input('presales_inquiry_dealership');
        $presales_interested_vehicle = $req->input('presales_interested_vehicle');
        $presales_interested_color = $req->input('presales_interested_color');
        $presales_existing_vehicle = $req->input('presales_existing_vehicle');
        $presales_inquiry_details = $req->input('presales_inquiry_details');
        $presales_callback = $req->input('presales_callback');
        $presales_followup_date = $req->input('presales_followup_date');
        $presales_followup_time = $req->input('presales_followup_time');
        $presales_action = $req->input('presales_action');
        $presales_assigned_agent = $req->input('presales_assigned_agent');
        $presales_followup_remarks = $req->input('presales_followup_remarks');
        // Sales VARIABLES
        $sales_inquiry_subtype = NULL;
        $inquiry_category_sales = $req->input('inquiry_category_sales');
        $sales_inquiry_channel = $req->input('sales_inquiry_channel');
        $sales_inquiry_type = $req->input('sales_inquiry_type');
        $sales_inquiry_subtype = $req->input('sales_inquiry_subtype');
        $sales_pbo = $req->input('sales_pbo');
        $sales_so_number = $req->input('sales_so_number');
        $sales_chassis = $req->input('sales_chassis');
        $sales_vehicle = $req->input('sales_vehicle');
        $sales_vehicle_colour = $req->input('sales_vehicle_colour');
        $sales_inquiry_dealership = $req->input('sales_inquiry_dealership');
        $sales_inquiry_details = $req->input('sales_inquiry_details');
        $sales_callback = $req->input('sales_callback');
        $sales_followup_date = $req->input('sales_followup_date');
        $sales_followup_time = $req->input('sales_followup_time');
        $sales_action = $req->input('sales_action');
        $sales_followup_remarks = $req->input('sales_followup_remarks');
        $sales_assigned_agent = $req->input('sales_assigned_agent');
        // General VARIABLES
        $general_inquiry_subtype = NULL;
        $inquiry_category_general = $req->input('inquiry_category_general');
        $general_inquiry_channel = $req->input('general_inquiry_channel');
        $general_inquiry_type = $req->input('general_inquiry_type');
        $general_inquiry_subtype = $req->input('general_inquiry_subtype');
        $general_pbo = $req->input('general_pbo');
        $general_vehicle = $req->input('general_vehicle');
        $general_vehicle_colour = $req->input('general_vehicle_colour');
        $general_inquiry_dealership = $req->input('general_inquiry_dealership');
        $general_inquiry_details = $req->input('general_inquiry_details');
        $general_callback = $req->input('general_callback');
        $general_followup_date = $req->input('general_followup_date');
        $general_followup_time = $req->input('general_followup_time');
        $general_action = $req->input('general_action');
        $general_followup_remarks = $req->input('general_followup_remarks');
        $general_assigned_agent = $req->input('general_assigned_agent');
        // AFS VARIABLES
        $afs_inquiry_subtype = NULL;
        $inquiry_category_afs = $req->input('inquiry_category_afs');
        $afs_inquiry_channel = $req->input('afs_inquiry_channel');
        $afs_inquiry_type = $req->input('afs_inquiry_type');
        $afs_inquiry_subtype = $req->input('afs_inquiry_subtype');
        $afs_pbo = $req->input('afs_pbo');
        $afs_so_number = $req->input('afs_so_number');
        $afs_chassis = $req->input('afs_chassis');
        $afs_vehicle = $req->input('afs_vehicle');
        $afs_vehicle_colour = $req->input('afs_vehicle_colour');
        $afs_inquiry_dealership = $req->input('afs_inquiry_dealership');
        $afs_inquiry_details = $req->input('afs_inquiry_details');
        $afs_callback = $req->input('afs_callback');
        $afs_followup_date = $req->input('afs_followup_date');
        $afs_followup_time = $req->input('afs_followup_time');
        $afs_action = $req->input('afs_action');
        $afs_followup_remarks = $req->input('afs_followup_remarks');
        $afs_assigned_agent = $req->input('afs_assigned_agent');
        // Dealersip Network VARIABLES
        $dealernetwork_inquiry_subtype = NULL;
        $inquiry_category_dealernetwork = $req->input('inquiry_category_dealernetwork');
        $dealernetwork_inquiry_channel = $req->input('dealernetwork_inquiry_channel');
        $dealernetwork_inquiry_type = $req->input('dealernetwork_inquiry_type');
        $dealernetwork_inquiry_subtype = $req->input('dealernetwork_inquiry_subtype');
        $dealernetwork_pbo = $req->input('dealernetwork_pbo');
        $dealernetwork_vehicle = $req->input('dealernetwork_vehicle');
        $dealernetwork_vehicle_colour = $req->input('dealernetwork_vehicle_colour');
        $dealernetwork_inquiry_dealership = $req->input('dealernetwork_inquiry_dealership');
        $dealernetwork_inquiry_details = $req->input('dealernetwork_inquiry_details');
        $dealernetwork_callback = $req->input('dealernetwork_callback');
        $dealernetwork_followup_date = $req->input('dealernetwork_followup_date');
        $dealernetwork_followup_time = $req->input('dealernetwork_followup_time');
        $dealernetwork_action = $req->input('dealernetwork_action');
        $dealernetwork_followup_remarks = $req->input('dealernetwork_followup_remarks');
        $dealernetwork_assigned_agent = $req->input('dealernetwork_assigned_agent');
        // Feedback VARIABLES
        $feedback_inquiry_subtype = NULL;
        $inquiry_category_feedback = $req->input('inquiry_category_feedback');
        $feedback_inquiry_channel = $req->input('feedback_inquiry_channel');
        $feedback_inquiry_type = $req->input('feedback_inquiry_type');
        $feedback_inquiry_subtype = $req->input('feedback_inquiry_subtype');
        $feedback_pbo = $req->input('feedback_pbo');
        $feedback_so_number = $req->input('feedback_so_number');
        $feedback_chassis = $req->input('feedback_chassis');
        $feedback_vehicle = $req->input('feedback_vehicle');
        $feedback_vehicle_colour = $req->input('feedback_vehicle_colour');
        $feedback_inquiry_dealership = $req->input('feedback_inquiry_dealership');
        $feedback_inquiry_details = $req->input('feedback_inquiry_details');
        $feedback_callback = $req->input('feedback_callback');
        $feedback_followup_date = $req->input('feedback_followup_date');
        $feedback_followup_time = $req->input('feedback_followup_time');
        $feedback_inquiry_action = $req->input('feedback_inquiry_action');
        $feedback_followup_remarks = $req->input('feedback_followup_remarks');
        $feedback_assigned_agent = $req->input('feedback_assigned_agent');
        // Unsuccessful Calls VARIABLES
        $unsuccess_calls_inquiry_subtype = NULL;
        $inquiry_category_unsuccess_calls = $req->input('inquiry_category_unsuccess_calls');
        $unsuccess_calls_channel = $req->input('unsuccess_calls_channel');
        $unsuccess_calls_inquiry_type = $req->input('unsuccess_calls_inquiry_type');
        $unsuccess_calls_inquiry_subtype = $req->input('unsuccess_calls_inquiry_subtype');
        $unsuccess_calls_pbo = $req->input('unsuccess_calls_pbo');
        $unsuccess_calls_vehicle = $req->input('unsuccess_calls_vehicle');
        $unsuccess_calls_vehicle_colour = $req->input('unsuccess_calls_vehicle_colour');
        $unsuccess_calls_dealership = $req->input('unsuccess_calls_dealership');
        $unsuccess_calls_inquiry_details = $req->input('unsuccess_calls_inquiry_details');
        $unsuccess_calls_callback = $req->input('unsuccess_calls_callback');
        $unsuccess_calls_followup_date = $req->input('unsuccess_calls_followup_date');
        $unsuccess_calls_followup_time = $req->input('unsuccess_calls_followup_time');
        $unsuccess_calls_action = $req->input('unsuccess_calls_action');
        $unsuccess_calls_followup_remarks = $req->input('unsuccess_calls_followup_remarks');
        $unsuccess_calls_assigned_agent = $req->input('unsuccess_calls_assigned_agent');
        // generating inquiry number
        $inq_number = DB::select("select inquiry_number from tbl_customers_inquiries ORDER BY id DESC LIMIT 1");
        if ($inq_number) {
            $array = ($inq_number);
            foreach ($array as $row) {
                $row->inquiry_number;
                $inqnum = explode("-", $row->inquiry_number);
                $num = (int)$inqnum[1];
                $serial = $inqnum[0] . '-' . sprintf("%010d", $num + 1);
            }
        } else {
            $serial = "INQ-" . sprintf("%010d", 1);
        }
        $inquiry_number = $serial;
        // checking, whether customer exists or not
        $check_customer = DB::select("select * from `customers` where `name` = '$name' and `mobile` = '$mobile'");
        if (count($check_customer) == 1) {
            $existing_customer_id = $check_customer[0]->id;
            $existing_customer_name = $check_customer[0]->name;
            $customer_id = $existing_customer_id;
        }
        // if customer exists
        if (count($check_customer) == 1) {
            // creating inquiry of the existing customer
            // Pre-Sales
            if ($presales_inquiry_type != '' && $presales_inquiry_details != '') {
                $data = array(
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_presales,
                    'channel' => $presales_inquiry_channel,
                    'source' => $presales_inquiry_source,
                    'inquiry_type' => $presales_inquiry_type,
                    'inquiry_sub_type' => $presales_inquiry_subtype,
                    'dealership' => $presales_inquiry_dealership,
                    'interested_vehicle' => $presales_interested_vehicle,
                    'interested_color' => $presales_interested_color,
                    'existing_vehicle' => $presales_existing_vehicle,
                    'inquiry_details' => $presales_inquiry_details,
                    'callback' => $presales_callback,
                    'followup_prefered_date' => $presales_followup_date,
                    'followup_prefered_time' => $presales_followup_time,
                    'followup_remarks' => $presales_followup_remarks,
                    'action' => $presales_action,
                    'assigned_agent' => $presales_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure,
                    'status' => 'Open',
                );
                $add_inquiry = DB::table('tbl_customers_inquiries')->insert($data);
                // $last_id = DB::table('tbl_customers_inquiries')->insertGetId($data);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    // message
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
            // Sales
            if ($sales_inquiry_type != '' && $sales_inquiry_details != '') {
                $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_sales,
                    'channel' => $sales_inquiry_channel,
                    'inquiry_type' => $sales_inquiry_type,
                    'inquiry_sub_type' => $sales_inquiry_subtype,
                    'pbo' => $sales_pbo,
                    'sales_order_number' => $sales_so_number,
                    'chassis_number' => $sales_chassis,
                    'vehicle' => $sales_vehicle,
                    'vehicle_colour' => $sales_vehicle_colour,
                    'dealership' => $sales_inquiry_dealership,
                    'inquiry_details' => $sales_inquiry_details,
                    'callback' => $sales_callback,
                    'followup_prefered_date' => $sales_followup_date,
                    'followup_prefered_time' => $sales_followup_time,
                    'followup_remarks' => $sales_followup_remarks,
                    'action' => $sales_action,
                    'assigned_agent' => $sales_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure

                ]);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    // message
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
            // General
            if ($general_inquiry_type != '' && $general_inquiry_details != '') {
                $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_general,
                    'channel' => $general_inquiry_channel,
                    'inquiry_type' => $general_inquiry_type,
                    'inquiry_sub_type' => $general_inquiry_subtype,
                    'pbo' => $general_pbo,
                    'vehicle' => $general_vehicle,
                    'vehicle_colour' => $general_vehicle_colour,
                    'dealership' => $general_inquiry_dealership,
                    'inquiry_details' => $general_inquiry_details,
                    'callback' => $general_callback,
                    'followup_prefered_date' => $general_followup_date,
                    'followup_prefered_time' => $general_followup_time,
                    'followup_remarks' => $general_followup_remarks,
                    'action' => $general_action,
                    'assigned_agent' => $general_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure
                ]);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    // dd($sms_url);
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    // dd($url);
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }
                    // message
                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
            // AFS
            if ($afs_inquiry_type != '' && $afs_inquiry_details != '') {

                $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_afs,
                    'channel' => $afs_inquiry_channel,
                    'inquiry_type' => $afs_inquiry_type,
                    'inquiry_sub_type' => $afs_inquiry_subtype,
                    'pbo' => $afs_pbo,
                    'sales_order_number' => $afs_so_number,
                    'chassis_number' => $afs_chassis,
                    'vehicle' => $afs_vehicle,
                    'vehicle_colour' => $afs_vehicle_colour,
                    'dealership' => $afs_inquiry_dealership,
                    'inquiry_details' => $afs_inquiry_details,
                    'callback' => $afs_callback,
                    'followup_prefered_date' => $afs_followup_date,
                    'followup_prefered_time' => $afs_followup_time,
                    'followup_remarks' => $afs_followup_remarks,
                    'action' => $afs_action,
                    'assigned_agent' => $afs_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure
                ]);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }

                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        // ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
            // Dealership Network
            if ($dealernetwork_inquiry_type != '' && $dealernetwork_inquiry_details != '') {
                $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_dealernetwork,
                    'channel' => $dealernetwork_inquiry_channel,
                    'inquiry_type' => $dealernetwork_inquiry_type,
                    'inquiry_sub_type' => $dealernetwork_inquiry_subtype,
                    'pbo' => $dealernetwork_pbo,
                    'vehicle' => $dealernetwork_vehicle,
                    'vehicle_colour' => $dealernetwork_vehicle_colour,
                    'dealership' => $dealernetwork_inquiry_dealership,
                    'inquiry_details' => $dealernetwork_inquiry_details,
                    'callback' => $dealernetwork_callback,
                    'followup_prefered_date' => $dealernetwork_followup_date,
                    'followup_prefered_time' => $dealernetwork_followup_time,
                    'followup_remarks' => $dealernetwork_followup_remarks,
                    'action' => $dealernetwork_action,
                    'assigned_agent' => $dealernetwork_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure
                ]);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }

                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        // ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
            // Feedback
            if ($feedback_inquiry_type != '' && $feedback_inquiry_details != '') {

                $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_feedback,
                    'channel' => $feedback_inquiry_channel,
                    'inquiry_type' => $feedback_inquiry_type,
                    'inquiry_sub_type' => $feedback_inquiry_subtype,
                    'pbo' => $feedback_pbo,
                    'sales_order_number' => $feedback_so_number,
                    'chassis_number' => $feedback_chassis,
                    'vehicle' => $feedback_vehicle,
                    'vehicle_colour' => $feedback_vehicle_colour,
                    'dealership' => $feedback_inquiry_dealership,
                    'inquiry_details' => $feedback_inquiry_details,
                    'callback' => $feedback_callback,
                    'followup_prefered_date' => $feedback_followup_date,
                    'followup_prefered_time' => $feedback_followup_time,
                    'followup_remarks' => $feedback_followup_remarks,
                    'action' => $feedback_inquiry_action,
                    'assigned_agent' => $feedback_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure

                ]);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }

                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        // ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
            // Unsuccessful Call
            if ($unsuccess_calls_inquiry_type != '' && $unsuccess_calls_inquiry_details  != '') {

                $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                    'customer_id' => $customer_id,
                    'city_id' => $city,
                    'inquiry_number' => $inquiry_number,
                    'status' => "Open",
                    'inquiry_category' => $inquiry_category_unsuccess_calls,
                    'channel' => $unsuccess_calls_channel,
                    'inquiry_type' => $unsuccess_calls_inquiry_type,
                    'inquiry_sub_type' => $unsuccess_calls_inquiry_subtype,
                    'pbo' => $unsuccess_calls_pbo,
                    'vehicle' => $unsuccess_calls_vehicle,
                    'vehicle_colour' => $unsuccess_calls_vehicle_colour,
                    'dealership' => $unsuccess_calls_dealership,
                    'inquiry_details' => $unsuccess_calls_inquiry_details,
                    'callback' => $unsuccess_calls_callback,
                    'followup_prefered_date' => $unsuccess_calls_followup_date,
                    'followup_prefered_time' => $unsuccess_calls_followup_time,
                    'followup_remarks' => $unsuccess_calls_followup_remarks,
                    'action' => $unsuccess_calls_action,
                    'assigned_agent' => $unsuccess_calls_assigned_agent,
                    'created_by' => $created_by,
                    'start_date' => $currentDate,
                    'created_time' => $currentTime,
                    'expected_closure' => $expected_closure
                ]);
                // SENDING SMS
                if ($add_inquiry) {
                    $message = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_text');
                    $sms_url = DB::table('tbl_sms')
                        ->where('text_status', 1)
                        ->where('sms_category', 'inquiry')
                        ->value('sms_url');
                    $x = $mobile;
                    $i = $inquiry_number;
                    $msg = $message . " " . $i;
                    // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                    $url  = $sms_url . $x . "&Message=" . $msg;
                    $response = Http::post($url);
                }
                // SENDING MAIL
                if ($add_inquiry) {
                    // SENDING MAIL STARTS
                    $customer_email = $email;
                    $recipients = [
                        $customer_email
                    ];
                    // cc
                    $ccRecipients = [];
                    $ccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'cc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($ccRecipientsData as $recipient) {
                        $ccRecipients[] = $recipient;
                    }
                    // bcc
                    $bccRecipients = [];
                    $bccRecipientsData = DB::table('mail_recipients')
                        ->where('category', 'bcc')
                        ->where('status', 1)
                        ->pluck('recipients');
                    foreach ($bccRecipientsData as $recipient) {
                        $bccRecipients[] = $recipient;
                    }

                    $message = DB::table('mail_body')
                        ->where('text_status', 1)
                        ->where('mail_category', 'inquiry')
                        ->value('mail_text');
                    $data = [
                        'Message' => $message . " " . $inquiry_number
                    ];
                    $mail = new TestEmail($data);
                    Mail::to($recipients)
                        ->cc($ccRecipients)
                        // ->bcc($bccRecipients)
                        ->send($mail);
                    // SENDING MAIL ENDS
                }
                if ($add_inquiry) {
                    $inq_status_log = "
                    INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES
                    ('$inquiry_number','Open', '$created_by', '$date', '$currentDate', '$currentTime')
                    ";
                    DB::insert($inq_status_log);
                }
                return redirect('customer-inquiries-list')->with('msg', "$existing_customer_name, new inquiry created with ticket # $inquiry_number");
            }
        } else {
            $add_customer = DB::insert("INSERT INTO `customers`(`id`,`name`, `email`, `mobile`, `date`, `city`) VALUES (null,'$name','$email','$mobile','$date', '$city')");
            if ($add_customer) {
                $cid = DB::select("select id from customers order by id desc limit 1");
                $customer_id = $cid[0]->id;

                // Pre-Sales
                if ($presales_inquiry_type != '' && $presales_inquiry_details != '') {
                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_presales,
                        'channel' => $presales_inquiry_channel,
                        'source' => $presales_inquiry_source,
                        'inquiry_type' => $presales_inquiry_type,
                        'inquiry_sub_type' => $presales_inquiry_subtype,
                        'dealership' => $presales_inquiry_dealership,
                        'interested_vehicle' => $presales_interested_vehicle,
                        'interested_color' => $presales_interested_color,
                        'existing_vehicle' => $presales_existing_vehicle,
                        'inquiry_details' => $presales_inquiry_details,
                        'callback' => $presales_callback,
                        'followup_prefered_date' => $presales_followup_date,
                        'followup_prefered_time' => $presales_followup_time,
                        'followup_remarks' => $presales_followup_remarks,
                        'action' => $presales_action,
                        'assigned_agent' => $presales_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure,
                        'status' => 'Open',
                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_url');
                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }
                        // message
                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
                // Sales
                if ($sales_inquiry_type != '' && $sales_inquiry_details != '') {
                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_sales,
                        'channel' => $sales_inquiry_channel,
                        'inquiry_type' => $sales_inquiry_type,
                        'inquiry_sub_type' => $sales_inquiry_subtype,
                        'pbo' => $sales_pbo,
                        'sales_order_number' => $sales_so_number,
                        'chassis_number' => $sales_chassis,
                        'vehicle' => $sales_vehicle,
                        'vehicle_colour' => $sales_vehicle_colour,
                        'dealership' => $sales_inquiry_dealership,
                        'inquiry_details' => $sales_inquiry_details,
                        'callback' => $sales_callback,
                        'followup_prefered_date' => $sales_followup_date,
                        'followup_prefered_time' => $sales_followup_time,
                        'followup_remarks' => $sales_followup_remarks,
                        'action' => $sales_action,
                        'assigned_agent' => $sales_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure

                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {

                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = "Dear Customer, Thank you for contacting Master Changan Motors your INQUIRY has been registered and your INQUIRY No is '" . $i . "' for future follow up and update";
                        $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }
                        // message
                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
                // General
                if ($general_inquiry_type != '' && $general_inquiry_details != '') {
                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_general,
                        'channel' => $general_inquiry_channel,
                        'inquiry_type' => $general_inquiry_type,
                        'inquiry_sub_type' => $general_inquiry_subtype,
                        'pbo' => $general_pbo,
                        'vehicle' => $general_vehicle,
                        'vehicle_colour' => $general_vehicle_colour,
                        'dealership' => $general_inquiry_dealership,
                        'inquiry_details' => $general_inquiry_details,
                        'callback' => $general_callback,
                        'followup_prefered_date' => $general_followup_date,
                        'followup_prefered_time' => $general_followup_time,
                        'followup_remarks' => $general_followup_remarks,
                        'action' => $general_action,
                        'assigned_agent' => $general_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure
                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {

                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = "Dear Customer, Thank you for contacting Master Changan Motors your INQUIRY has been registered and your INQUIRY No is '" . $i . "' for future follow up and update";
                        $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }
                        // message
                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
                // AFS
                if ($afs_inquiry_type != '' && $afs_inquiry_details != '') {

                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_afs,
                        'channel' => $afs_inquiry_channel,
                        'inquiry_type' => $afs_inquiry_type,
                        'inquiry_sub_type' => $afs_inquiry_subtype,
                        'pbo' => $afs_pbo,
                        'sales_order_number' => $afs_so_number,
                        'chassis_number' => $afs_chassis,
                        'vehicle' => $afs_vehicle,
                        'vehicle_colour' => $afs_vehicle_colour,
                        'dealership' => $afs_inquiry_dealership,
                        'inquiry_details' => $afs_inquiry_details,
                        'callback' => $afs_callback,
                        'followup_prefered_date' => $afs_followup_date,
                        'followup_prefered_time' => $afs_followup_time,
                        'followup_remarks' => $afs_followup_remarks,
                        'action' => $afs_action,
                        'assigned_agent' => $afs_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure

                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {

                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = "Dear Customer, Thank you for contacting Master Changan Motors your INQUIRY has been registered and your INQUIRY No is '" . $i . "' for future follow up and update";
                        $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }

                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            // ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
                // Dealership Network
                if ($dealernetwork_inquiry_type != '' && $dealernetwork_inquiry_details != '') {
                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_dealernetwork,
                        'channel' => $dealernetwork_inquiry_channel,
                        'inquiry_type' => $dealernetwork_inquiry_type,
                        'inquiry_sub_type' => $dealernetwork_inquiry_subtype,
                        'pbo' => $dealernetwork_pbo,
                        'vehicle' => $dealernetwork_vehicle,
                        'vehicle_colour' => $dealernetwork_vehicle_colour,
                        'dealership' => $dealernetwork_inquiry_dealership,
                        'inquiry_details' => $dealernetwork_inquiry_details,
                        'callback' => $dealernetwork_callback,
                        'followup_prefered_date' => $dealernetwork_followup_date,
                        'followup_prefered_time' => $dealernetwork_followup_time,
                        'followup_remarks' => $dealernetwork_followup_remarks,
                        'action' => $dealernetwork_action,
                        'assigned_agent' => $dealernetwork_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure
                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {
                        // $x = $mobile;
                        // $i = $inquiry_number;
                        // $msg = "Dear Customer, Thank you for contacting Master Changan Motors your INQUIRY has been registered and your INQUIRY No is '" . $i . "' for future follow up and update";
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        // $response = Http::post($url);
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_url');
                        // dd($sms_url);
                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        // dd($url);
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }

                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            // ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
                // Feedback
                if ($feedback_inquiry_type != '' && $feedback_inquiry_details != '') {

                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_feedback,
                        'channel' => $feedback_inquiry_channel,
                        'inquiry_type' => $feedback_inquiry_type,
                        'inquiry_sub_type' => $feedback_inquiry_subtype,
                        'pbo' => $feedback_pbo,
                        'sales_order_number' => $feedback_so_number,
                        'chassis_number' => $feedback_chassis,
                        'vehicle' => $feedback_vehicle,
                        'vehicle_colour' => $feedback_vehicle_colour,
                        'dealership' => $feedback_inquiry_dealership,
                        'inquiry_details' => $feedback_inquiry_details,
                        'callback' => $feedback_callback,
                        'followup_prefered_date' => $feedback_followup_date,
                        'followup_prefered_time' => $feedback_followup_time,
                        'followup_remarks' => $feedback_followup_remarks,
                        'action' => $feedback_inquiry_action,
                        'assigned_agent' => $feedback_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure

                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {
                        // $x = $mobile;
                        // $i = $inquiry_number;
                        // $msg = "Dear Customer, Thank you for contacting Master Changan Motors your INQUIRY has been registered and your INQUIRY No is '" . $i . "' for future follow up and update";
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        // $response = Http::post($url);
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_url');
                        // dd($sms_url);
                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        // dd($url);
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }

                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            // ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
                // Unsuccessful Call
                if ($unsuccess_calls_inquiry_type != '' && $unsuccess_calls_inquiry_details  != '') {

                    $add_inquiry = DB::table('tbl_customers_inquiries')->insert([
                        'customer_id' => $customer_id,
                        'city_id' => $city,
                        'inquiry_number' => $inquiry_number,
                        'status' => "Open",
                        'inquiry_category' => $inquiry_category_unsuccess_calls,
                        'channel' => $unsuccess_calls_channel,
                        'inquiry_type' => $unsuccess_calls_inquiry_type,
                        'inquiry_sub_type' => $unsuccess_calls_inquiry_subtype,
                        'pbo' => $unsuccess_calls_pbo,
                        'vehicle' => $unsuccess_calls_vehicle,
                        'vehicle_colour' => $unsuccess_calls_vehicle_colour,
                        'dealership' => $unsuccess_calls_dealership,
                        'inquiry_details' => $unsuccess_calls_inquiry_details,
                        'callback' => $unsuccess_calls_callback,
                        'followup_prefered_date' => $unsuccess_calls_followup_date,
                        'followup_prefered_time' => $unsuccess_calls_followup_time,
                        'followup_remarks' => $unsuccess_calls_followup_remarks,
                        'action' => $unsuccess_calls_action,
                        'assigned_agent' => $unsuccess_calls_assigned_agent,
                        'created_by' => $created_by,
                        'start_date' => $start_date,
                        'expected_closure' => $expected_closure


                    ]);
                    // SENDING SMS
                    if ($add_inquiry) {
                        // $x = $mobile;
                        // $i = $inquiry_number;
                        // $msg = "Dear Customer, Thank you for contacting Master Changan Motors your INQUIRY has been registered and your INQUIRY No is '" . $i . "' for future follow up and update";
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=" . $x . "&Message='" . $msg . "'";
                        // $response = Http::post($url);
                        $message = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_text');
                        $sms_url = DB::table('tbl_sms')
                            ->where('text_status', 1)
                            ->where('sms_category', 'inquiry')
                            ->value('sms_url');
                        // dd($sms_url);
                        $x = $mobile;
                        $i = $inquiry_number;
                        $msg = $message . " " . $i;
                        // $url  = "https://connect.jazzcmt.com/sendsms_url.html?Username=03015007983&Password=Jazz@123&From=ChanganAuto&To=".$x."&Message='" . $msg . "'";
                        $url  = $sms_url . $x . "&Message=" . $msg;
                        // dd($url);
                        $response = Http::post($url);
                    }
                    // SENDING MAIL
                    if ($add_inquiry) {
                        // SENDING MAIL STARTS
                        $customer_email = $email;
                        $recipients = [
                            $customer_email
                        ];
                        // cc
                        $ccRecipients = [];
                        $ccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'cc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($ccRecipientsData as $recipient) {
                            $ccRecipients[] = $recipient;
                        }
                        // bcc
                        $bccRecipients = [];
                        $bccRecipientsData = DB::table('mail_recipients')
                            ->where('category', 'bcc')
                            ->where('status', 1)
                            ->pluck('recipients');
                        foreach ($bccRecipientsData as $recipient) {
                            $bccRecipients[] = $recipient;
                        }

                        $message = DB::table('mail_body')
                            ->where('text_status', 1)
                            ->where('mail_category', 'inquiry')
                            ->value('mail_text');
                        $data = [
                            'Message' => $message . " " . $inquiry_number
                        ];
                        $mail = new TestEmail($data);
                        Mail::to($recipients)
                            ->cc($ccRecipients)
                            // ->bcc($bccRecipients)
                            ->send($mail);
                        // SENDING MAIL ENDS
                        return redirect('customer-inquiries-list')->with('msg', "$name, new inquiry created with ticket # $inquiry_number");
                    }
                }
            }
        }
    }

    public function customer_inquiries_list(Request $req)
    {
        if (empty($req->input('inquiry_type')) && $req->input('from') && $req->input('end')) {
            $start_date = $req->input('from');
            $end_date = $req->input('end');

            $inquiry = DB::select("
            SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
            FROM tbl_customers_inquiries
            LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
            LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
            LEFT JOIN tbl_city ON tbl_city.id = customers.city
            LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
            WHERE tbl_customers_inquiries.start_date BETWEEN '$start_date' AND '$end_date'
            ");

            return view('customer-inquiries-list', ['data' => $inquiry], compact('start_date', 'end_date'));
        } else if (!empty($req->input('inquiry_type'))) {
            $inquiry_type = $req->input('inquiry_type');
            $start_date = $req->input('from');
            $end_date = $req->input('end');

            $inquiry = DB::select("SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
            FROM tbl_customers_inquiries
            LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
            LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
            LEFT JOIN tbl_city ON tbl_city.id = customers.city
            LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
            WHERE tbl_customers_inquiries.start_date BETWEEN '$start_date' AND '$end_date' AND tbl_customers_inquiries.inquiry_type = '$inquiry_type' ORDER BY id DESC");

            return view('customer-inquiries-list', ["data" => $inquiry], compact('start_date', 'end_date', 'inquiry_type'));
        } else {
            $inquiry = DB::select("SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username, inquiry_types.inquiry_type as inquiry_type
            FROM tbl_customers_inquiries
            LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
            LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
            LEFT JOIN tbl_city ON tbl_city.id = customers.city
            LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
            LEFT join inquiry_types on inquiry_types.id = tbl_customers_inquiries.inquiry_type
            ORDER BY id DESC");

            foreach ($inquiry as $row) {
                $id = $row->id;
                $status_update = null;
                $created_at = $row->start_date;
                $after3days = date('Y-m-d', strtotime($created_at . ' +3 days'));
                $currentdate = date("Y-m-d");
                $inq_reg_date = new \Carbon\Carbon($row->start_date);
                $today = $currentdate;
                $aging = $inq_reg_date->diff($today)->days;
                // UPDATING STATUS = "Closed" AND AGING TO = $aging
                if ($row->status == "Closed") {
                    if (empty($row->aging)) {
                        DB::update("UPDATE `tbl_customers_inquiries` set aging = '$aging' WHERE `id` = '$id' ");
                    }
                }

                // UPDATING INQUIRY STATUS LOG
                $complainpreviousstatus = DB::select("select status as previousstatus, inquiry_number, created_by, created_at, start_date from tbl_customers_inquiries where id = '$id'");
                $previousstatus = $complainpreviousstatus[0]->previousstatus;
                $inquiry_number = $complainpreviousstatus[0]->inquiry_number;
                $created_by = $complainpreviousstatus[0]->created_by;
                $created_at = $complainpreviousstatus[0]->created_at;
                $start_date = $complainpreviousstatus[0]->start_date;
                // dd($start_date);
                date_default_timezone_set('Asia/Karachi');
                $updated_by = session()->get('isLogin')[0]['id'];
                $inq_status_log = ""; // Initialize the variable
                // UPDATING STATUS = "Pending" - AFTER 3 DAYS
                if ($currentdate == $after3days) {
                    // dd($created_at);
                    $status_update = DB::update("UPDATE `tbl_customers_inquiries` set status = 'Pending' WHERE `id` = '$id' ");
                }
                if ($currentdate >= $after3days && $previousstatus = 'Open') {

                    $status_update = DB::update("UPDATE `tbl_customers_inquiries` set status = 'Pending' WHERE `id` = '$id' ");
                }
                if ($status_update) {
                    $sql = "INSERT INTO `inquiry-status-log`(`inquiry_number`, `current_status`, `previous_status`, `created_by`, `created_at`, `created_date`, `updated_by`, `updated_at`)
                    VALUES
                    ('$inquiry_number','Pending','$previousstatus', '$created_by', '$created_at', '$start_date', '$updated_by', Now())";
                    DB::insert($sql);
                }
            }
            return view('customer-inquiries-list', ["data" => $inquiry]);
        }
    }

    public function inquiry_mail()
    {

        $name = 'Muhammad Zamraan';
        //change this to your email.
        $from = "m.zamraan@gmail.com";
        $to = "zamran.qbs@gmail.com";
        $subject = "Dear $name,
            Inquiry Has been Send to DMS.";



        //begin of HTML message
        $message = "
        <html>
          <body>
          <img src=\"{{ asset('images/Changan-Auto-logo - black.png') }}\"  width=\"500\" height=\"600\">


        <table border='1' style='margin-left:20%;'>
          <tr>
            <th>Sensor</th>
            <th>Values</th>
          </tr>
          <tr>
            <td>PH</td>
            <td>" . '27' . "</td>
          </tr>
            <tr>
            <td>Temperature</td>
            <td>" . '27' . "</td>
          </tr>
            <tr>
            <td>Electrical Conductivity</td>
            <td>" . '27' . "</td>
          </tr>
            <tr>
            <td>Terbidity</td>
            <td>" . '27' . "</td>
          </tr>
            <tr>
            <td>Water Flow</td>
            <td>" . '27' . "</td>
          </tr>
            <tr>
            <td>TDS</td>
            <td>" . '27' . "</td>
          </tr>
        </table>

            <br/><br/>Therefore, the sample water is Drinkable
          </body>


        </html>";
        //end of message
        $headers  = "From: $from\r\n";
        $headers .= "Content-type: text/html\r\n";

        //options to send to cc+bcc
        //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]";
        //$headers .= "Bcc: [email]email@maaking.cXom[/email]";

        // now lets send the email.
        $mail = mail($to, $subject, $message, $headers);
        if ($mail) {
            return redirect()->back();
        }
    }

    public function marketing_campaign_sms()
    {
        return view('marketing-campaign-sms');
    }

    public function marketing_campaign_email()
    {
        return view('marketing-campaign-email');
    }

    public function customer_global_search()
    {
        $data = DB::select("SELECT * FROM customers");
        return view('customer-search',  ["data" => $data]);
    }

    public function customer_journey(Request $req)
    {

        $id = $req->input('cid');
        $data = DB::select("SELECT customers.*,tbl_city.city as city_name FROM customers LEFT JOIN tbl_city ON tbl_city.id = customers.city WHERE customers.id='$id'");

        // Complains list
        $complains = DB::select("SELECT tbl_customers_complains.*,tbl_dealers.dealer_name,customers.name as customer_name,customers.mobile ,tbl_users.name as username, tbl_complain_cpt.complain_type,tbl_complain_spg.complain_spg_type,tbl_complain_ccc.complain_ccc_type FROM `tbl_customers_complains`
        INNER JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
        INNER JOIN customers ON customers.id = tbl_customers_complains.customer_id
        INNER JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
        INNER JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
        INNER JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
        INNER JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
        WHERE customer_id = $id
        ORDER BY tbl_customers_complains.id DESC
        ");


        // Inquiry list
        $inquiry = DB::select("SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
        FROM tbl_customers_inquiries
        LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
        LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
        LEFT JOIN tbl_city ON tbl_city.id = customers.city
        LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
        WHERE customer_id = $id
        ORDER BY id DESC");

        $vehicles = Vehicles::where('customer_id', '=', $id)->get();

        $calccount = DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->count();
        $calccounthot = DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->where('status', '=', 'hot')->count();
        $calccountwarm = DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->where('status', '=', 'warm')->count();
        $calccountcold =  DB::table('tbl_customers_inquiries')->where('customer_id', '=', $id)->where('status', '=', 'cold')->count();
        $calccountcomplains = DB::table('tbl_customers_complains')->where('customer_id', '=', $id)->count();
        $calccountresolved = DB::table('tbl_customers_complains')->where('customer_id', '=', $id)->where('status', '=', 'resolve')->count();
        $calccountpending = DB::table('tbl_customers_complains')->where('customer_id', '=', $id)->where('status', '=', 'pending')->count();

        return view('user-details', compact('vehicles', 'id'), ["data" => $data, "total_complains" => $calccountcomplains, "total_resolvedcomplains" => $calccountresolved, "total_pendingcomplains" => $calccountpending, "total_inquires" => $calccount, "total_hotinquires" => $calccounthot, "total_coldinquires" => $calccountcold, "total_warminquires" => $calccountwarm, "complaint" => $complains, "inquiry" => $inquiry]);
    }


    //   public function complain_status_log()
    // {
    //     return view('complain-status-log');
    // }

    public function complain_status_log($cm_number)
    {
        $sql = "
        select l.*,u.name as createdbyname, ub.name as updatedbyname
        from `complain-status-log` l
        inner join tbl_users u on u.id = l.created_by
        left join tbl_users ub on ub.id = l.updated_by
        where l.`complain_number` = '$cm_number'
        ORDER BY l.`id` DESC
        ";
        $data = DB::select($sql);
        //  dd($data);
        // return view('complain-status-log');
        return view('complain-status-log', ["data" => $data]);
    }


    public function inquiry_status_log($inq_number)
    {
        $sql = "
        select l.*,u.name as createdbyname, ub.name as updatedbyname
        from `inquiry-status-log` l
        inner join tbl_users u on u.id = l.created_by
        left join tbl_users ub on ub.id = l.updated_by
        where l.`inquiry_number` = '$inq_number'
        ORDER BY l.`id` DESC
        ";
        $data = DB::select($sql);
        // dd($data);
        return view('inquiry-status-log', ["data" => $data]);
    }

    public function api_status_log($cm_number)
    {
        $sql = "
        select l.*,u.name as createdbyname
        from `api_status_log` l
        inner join tbl_users u on u.id = l.created_by
        where l.`complain_number` = '$cm_number'
        ORDER BY l.`id` DESC
        ";
        $data = DB::select($sql);
        return view('api-status-log', ["data" => $data]);
    }

    //  SUBHAN - 05052023 Surveys
    public function csi()
    {
        return view('csi');
    }
    public function csi_management()
    {
        return view('csi-management');
    }
    public function ssi_management()
    {
        return view('ssi-management');
    }
    public function miscellaneous_management()
    {
        return view('miscellaneous-management');
    }
    public function warranty_management()
    {
        return view('warranty-management');
    }
}


// GETTING DEALER'S CONTACT / MOBILE ON THE BASIS OF DEALER CODE
// $dealer_contact = '';
// $dealer_mobile = DB::select("SELECT `dealer_mobile` FROM `tbl_dealers` WHERE `dealer_code` = '1012'");
// $dealer_contact = $dealer_mobile[0]->dealer_mobile;
