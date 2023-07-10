<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AjaxController extends Controller
{
    // 19-01-2023
    public function view_crmlogs_details(Request $Request)
    {
        $crmlogs_id = $Request->Id;
        $view_crmlogs = DB::select("SELECT tbl_logs.*, tbl_users.name as agentname
        from tbl_logs
        LEFT join tbl_users on tbl_users.id = tbl_logs.created_by
        WHERE tbl_logs.id = $crmlogs_id;
        ");
        $ReturnData['ReturnData'] = $view_crmlogs;
        return json_encode($ReturnData);
    }
    public function social_media_whatsapp()
    {
        return view('social-media-whatsapp');
    }
    public function social_media_instagram()
    {
        return view('social-media-instagram');
    }
    public function social_media_facebook()
    {
        return view('social-media-facebook');
    }
    // 02062023
    public function getinquirytypes(Request $Request)
    {
        $inquirytypes = $Request->inquirytypes;
        $cpt = DB::select("SELECT * FROM `inquiry_types` WHERE `inquiryfor` = '$inquirytypes'");
        echo json_encode($cpt);
    }
    public function getinquirytype(Request $Request)
    {
        $getinquirytype = $Request->inquirytype;
        $inquirytype = DB::select("SELECT * FROM `inquiry_types` WHERE `inquiryfor` = '$getinquirytype'");
        echo json_encode($inquirytype);
    }
    public function InqSubTypeRequest(Request $Request)
    {
        $inq_id = $Request->Id;
        $sub_inq_type = DB::select("SELECT * FROM `inquiry_subtypes` WHERE `inquiry_type_id` = $inq_id");
        $ReturnData['ReturnData'] = $sub_inq_type;
        return json_encode($ReturnData);
    }
    public function getcomplaincpt(Request $Request)
    {
        $complaintype = $Request->complaintype;
        $cpt = DB::select("select * from tbl_complain_cpt where complainfor = '$complaintype'");
        echo json_encode($cpt);
    }
    public function get_cpt_options(Request $Request)
    {
        $cpt_id = $Request->Id;
        $spg = DB::select("select * from tbl_complain_spg where complain_id = $cpt_id");
        $ReturnData['ReturnData'] = $spg;
        return json_encode($ReturnData);
    }
    public function get_spg_options(Request $Request)
    {
        $spg_id = $Request->spg_Id;
        //echo $spg_id;
        $ccc = DB::select("select * from tbl_complain_ccc where spg_id = $spg_id");
        $ReturnData['ReturnData'] = $ccc;
        return json_encode($ReturnData);
    }
    public function view_inquiry_details(Request $Request)
    {
        $inquiry_id = $Request->Id;
        // echo $inquiry_id;
        $view_inquiry = DB::select("
        SELECT tbl_customers_inquiries.*, customers.id as cid,customers.name as cname, customers.channel as source ,customers.mobile,tbl_dealers.dealer_name,tbl_city.city AS city_name, tbl_users.name as username
        FROM tbl_customers_inquiries
        LEFT JOIN tbl_dealers ON tbl_customers_inquiries.dealership = tbl_dealers.dealer_code
        LEFT JOIN customers ON tbl_customers_inquiries.customer_id = customers.id
        LEFT JOIN tbl_city ON tbl_city.id = customers.city
        LEFT join tbl_users on tbl_users.id = tbl_customers_inquiries.created_by
        WHERE tbl_customers_inquiries.id = $inquiry_id;
        ");
        $ReturnData['ReturnData'] = $view_inquiry;
        return json_encode($ReturnData);
    }
    public function edit_followup(Request $Request)
    {
        $followup_id = $Request->Id;
        // echo $inquiry_id;
        $data = DB::select("select * from tbl_follow_up where id = $followup_id");
        $ReturnData['ReturnData'] = $data;
        return json_encode($ReturnData);
    }
    public function city_dealership(Request $Request)
    {
        $city_id = $Request->city_id;
        // echo $city_id;
        $data = DB::select("select * from tbl_dealers WHERE dealer_city_id = '$city_id' AND is_active = 1");
        $ReturnData['ReturnData'] = $data;
        return json_encode($ReturnData);
    }
    public function get_all_dealership(Request $Request)
    {
        $data = DB::select("select * from tbl_dealers");
        $ReturnData['ReturnData'] = $data;
        return json_encode($ReturnData);
    }
    public function get_all_customers(Request $request)
    {
        ## Read value
        $draw = $request->get('draw');
        $start = $request->get("start");
        $rowperpage = $request->get("length"); // Rows display per page
        $columnIndex_arr = $request->get('order');
        $columnName_arr = $request->get('columns');
        $order_arr = $request->get('order');
        $search_arr = $request->get('search');
        $columnIndex = $columnIndex_arr[0]['column']; // Column index
        $columnName = $columnName_arr[$columnIndex]['data']; // Column name
        $columnSortOrder = $order_arr[0]['dir']; // asc or desc
        $searchValue = $search_arr['value']; // Search value
        // Total records
        $totalRecords = DB::select("SELECT COUNT(id) from customers");
        $totalRecordswithFilter = DB::select("SELECT COUNT(id) from customers where name like '%$searchValue%'");
        // Fetch records
        $records = DB::select("SELECT id,name,email,mobile from customers");
        $data_arr = array();
        foreach ($records as $record) {
            $id = $record->id;
            $name = $record->name;
            $email = $record->email;
            $mobile = $record->mobile;
            $data_arr[] = array(
                "id" => $id,
                "name" => $name,
                "email" => $email,
                "mobile" => $mobile,
            );
        }
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
            "data" => $data_arr
        );
        echo json_encode($response);
        exit;
    }
    public function edit_followup_record(Request $req)
    {
        $followup_id = $req->input('edit_id');
        $followup_date = $req->input('date');
        $followup_source = $req->input('source');
        $followup_engage_time = $req->input('edit_engage_time');
        $followup_agent = $req->input('agent');
        $followup_complain_status = $req->input('complaint_status');
        $followup_notes = $req->input('notes');
        $created_by = session()->get('isLogin')[0]['id'];
        // echo $followup_id." ".$followup_date." ".$followup_source." ".$followup_engage_time." ".$followup_agent." ".$followup_complain_status." ".$followup_notes." ".$created_by;
        // die();
        $followup_update = DB::update("
        UPDATE `tbl_follow_up` SET `date`='$followup_date', `source`='$followup_source', `engage_time`='$followup_engage_time', `complaint_status`='$followup_complain_status', `notes`='$followup_notes' WHERE id = '$followup_id'
        ");
        if ($followup_update) {
            return redirect()->back()->with('msg', 'Follow up record updated successfully');
        } else {
            return redirect()->back()->with('error', 'Follow up record not updated');
        }
    }
    //zamran
    public function getcustomerforinquiry(Request $req)
    {
        $num = $req->number;
        $query = "
        select c.*, ct.id as cityid from `customers` c
        left join tbl_city ct on ct.id = c.city
        where c.mobile = '$num' order by id desc limit 1
        ";
        $getcustomer = DB::select($query);
        echo json_encode($getcustomer);
    }
    // sale pbo - IRFAN
    public function getpboforinquiry(Request $req)
    {
        $pbo = $req->pbonumber;
        $so = $req->saleorderno;
        $sale_packey = array(
            'pbono' => $pbo,
            'saleorderno' => $so,
        );
        // var_dump($sale_packey);
        // die();
        // $pbo = json_encode($$sale_packey);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dms-test01.mastermotors.pk/dmssalesapi/complain.php?param=getsalesinfo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_POSTFIELDS =>  json_encode($sale_packey),
            CURLOPT_HTTPHEADER =>  array(
                'X-Token: 1256token3478',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //  Var_dump($response);
        //  var_dump($status);
        // var_dump(json_decode($response));
        // $decode_response = json_decode($response);
        echo $response;
    }
    // after sale pbo - IRFAN
    public function getpboforaftersale(Request $req)
    {
        $pbo = $req->pbonumber;
        $chassis = $req->chasisnumber;
        $registration = $req->reg_num;
        $item = $req->item;
        $sale_packey = array(
            'pbono' => $pbo,
            'chassisno' => $chassis,
            'regno' => $registration,
            'item' => $item
        );
        // $pbo = json_encode($pbo);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://dms-test01.mastermotors.pk/dmssalesapi/complainservice.php?param=getserviceinfo",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_POSTFIELDS =>  json_encode($sale_packey),
            CURLOPT_HTTPHEADER =>  array(
                'X-Token: 1256token3478',
                'Content-Type: application/json'
            ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        //  Var_dump($response);
        //  die();
        //  Var_dump($status);
        //  die();
        // var_dump(json_decode($response));
        // $decode_response = json_decode($response);
        echo $response;
    }
}
