<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

class ComplaintsController extends Controller
{
    //  complaints-management   -----   IRFAN
    public function complaints_list()
    {
        $data = DB::select("SELECT
        tbl_customers_complains.*,
        tbl_dealers.dealer_name,
        customers.name AS customer_name,
        customers.mobile,
        tbl_users.name AS username,
        tbl_complain_cpt.complain_type,
        tbl_complain_spg.complain_spg_type,
        tbl_complain_ccc.complain_ccc_type
    FROM
        `tbl_customers_complains`
    LEFT JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
    LEFT JOIN customers ON customers.id = tbl_customers_complains.customer_id
    LEFT JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
    LEFT JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
    LEFT JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
    LEFT JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
    ORDER BY tbl_customers_complains.id DESC");
        $complain_cpt = DB::select("SELECT * FROM `tbl_complain_cpt`");
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
            // UPDATING AGING IN DB WHEN COMPLAINT IS CLOSED OR FORCE CLOSED
            if ($row->status == "Closed" || $row->status == "Force closed") {
                if (empty($row->aging)) {
                    DB::update("UPDATE `tbl_customers_complains` SET `aging` = '$aging' WHERE `id` = '$id'");
                }
            }
            // STATUS AS previousstatus FOR MAINTAINING COMPLAINT STATUS LOG
            $complainpreviousstatus = DB::select("SELECT `status` AS previousstatus, complain_number, created_by, created_at
            FROM
                `tbl_customers_complains`
            WHERE
                id= '$id'");
            $previousstatus = $complainpreviousstatus[0]->previousstatus;
            $complain_number = $complainpreviousstatus[0]->complain_number;
            $created_by = $complainpreviousstatus[0]->created_by;
            $created_at = $complainpreviousstatus[0]->created_at;
            date_default_timezone_set('Asia/Karachi');
            $date = date("Y-m-d h:i:s");
            $updated_by = session()->get('isLogin')[0]['id'];
            if ($currentdate == $after3days && ($row->status != "Pending" && $row->status != "Force closed" && $row->status != "Request to force close" && $row->status != "Closed")) {
                $status_update = DB::update("UPDATE `tbl_customers_complains` SET `status` = 'Pending' WHERE `id` = '$id'");
            }
            if ($status_update) {
                $sql = "INSERT INTO `complain-status-log`(
                    `complain_number`,
                    `current_status`,
                    `previous_status`,
                    `created_by`,
                    `created_at`,
                    `updated_by`,
                    `updated_at`)
                VALUES(
                    '$complain_number',
                    'Pending',
                    '$previousstatus',
                    '$created_by',
                    '$created_at',
                    '$updated_by',
                    NOW()
                    )";
                DB::insert($sql);
            }
            if ($currentdate >= $after3days && ($row->status != "Pending" && $row->status != "Force closed" && $row->status != "Request to force close" && $row->status != "Closed")) {
                $status_update = DB::update("UPDATE `tbl_customers_complains` SET `status` = 'Pending' WHERE `id` = '$id'");
            }
            if ($status_update) {
                $sql = "INSERT INTO `complain-status-log`(
                    `complain_number`,
                    `current_status`,
                    `previous_status`,
                    `created_by`,
                    `created_at`,
                    `updated_by`,
                    `updated_at`
                )
                VALUES(
                    '$complain_number',
                    'Pending',
                    '$previousstatus',
                    '$created_by',
                    '$created_at',
                    '$updated_by',
                    NOW()
                    )";
                DB::insert($sql);
            }
        }
        return view('complaints-management', ["list" => $data, 'complain_cpt' => $complain_cpt]);
    }

    // create-customers-complaints/new  -----   IRFAN
    public function create_customers_complaints($id)
    {
        $customer_type = DB::select("SELECT * FROM `customer_types`");
        $source = DB::select("SELECT * FROM `inq_complaints_sources`");
        $vehicles = DB::select("SELECT * FROM `tbl_interested_vehicles`");
        $status_reason = DB::select("SELECT * FROM `inquiry_status_reason`");
        if ($id == 'new') {
            $city = DB::select("SELECT * FROM `tbl_city`");
            $dealer = DB::select("SELECT * FROM `tbl_dealers`");
            $complain_cpt = DB::select("SELECT * FROM `tbl_complain_cpt`");
            $complain_spg = DB::select("SELECT * FROM `tbl_complain_spg`");
            $complain_ccc = DB::select("SELECT * FROM `tbl_complain_ccc`");
            $colors = DB::select("SELECT * FROM `tbl_car_colors`");
            // return view('create-customers-complaints', ['city' => $city, 'customer_type' => $customer_type, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'source' => $source]);
            $data = compact('city', 'customer_type', 'dealer', 'complain_cpt', 'complain_spg', 'complain_ccc', 'colors', 'vehicles', 'status_reason', 'source');
            return view('create-customers-complaints')->with($data);
        }
        if ($id == 'add') {
            $city = DB::select("SELECT * FROM `tbl_city`");
            $dealer = DB::select("SELECT * FROM `tbl_dealers`");
            $complain_cpt = DB::select("SELECT * FROM `tbl_complain_cpt`");
            $complain_spg = DB::select("SELECT * FROM `tbl_complain_spg`");
            $complain_ccc = DB::select("SELECT * FROM `tbl_complain_ccc`");
            $colors = DB::select("SELECT * FROM `tbl_car_colors`");
            // return view('create-customers-complaints', ['city' => $city, 'customer_type' => $customer_type, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'source' => $source]);
            $data = compact('city', 'customer_type', 'dealer', 'complain_cpt', 'complain_spg', 'complain_ccc', 'colors', 'vehicles', 'status_reason', 'source');
            return view('create-customers-complaints')->with($data);
        } else if ($id == 'whatsapp') {
            $customers = DB::select("select * from customers where mobile = '" . session()->get('number') . "'");
            $city = DB::select("SELECT * FROM `tbl_city`");
            $dealer = DB::select("SELECT * FROM `tbl_dealers`");
            $complain_cpt = DB::select("SELECT * FROM `tbl_complain_cpt`");
            $complain_spg = DB::select("SELECT * FROM `tbl_complain_spg`");
            $complain_ccc = DB::select("SELECT * FROM `tbl_complain_ccc`");
            $colors = DB::select("SELECT * FROM `tbl_car_colors`");
            // return view('create-customers-complaints', ['customer' => $customers, 'city' => $city, 'customer_type' => $customer_type, 'dealers' => $dealer, 'complain_cpt' => $complain_cpt, 'complain_spg' => $complain_spg, 'complain_ccc' => $complain_ccc, 'colors' => $colors, 'vehicles' => $vehicles, 'status_reason' => $status_reason, 'source' => $source]);
            $data = compact('customers', 'city', 'customer_type', 'dealer', 'complain_cpt', 'complain_spg', 'complain_ccc', 'colors', 'vehicles', 'status_reason', 'source');
            return view('create-customers-complaints')->with($data);
        } else {
            return view('not-found');
        }
    }

    // MAIL FUNCTION    -----   sendComplaintEmail
    function sendComplaintEmail($cust_email, $complaint_number)
    {
        // customer_email
        $customer_email = $cust_email;
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
        $sending_Mail = Mail::to($recipients)
            ->cc($ccRecipients)
            ->bcc($bccRecipients)
            ->send($mail);
        // Mail::to($recipients)->send(new TestEmail($data));
        if ($sending_Mail) {
            return true;
        }
    }

    // SMS FUNCTION    -   sendComplaintSMS
    function sendComplaintSMS($mobile, $complaint_number)
    {
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

    // SALE API
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

    // AFS (AFTER SALE) API
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
        $complain_type = "AFS";
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
        }
    }

    //  add-customer-complaint -----   IRFAN
    public function add_customer_complaint(Request $req)
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
        // --------------------------------------------------------------------
        // General
        $complaint_type_gen = $req->input('complaint_type_gen');
        $gen_complain_source = $req->input('gen_complain_source');
        $gen_complain_dealership = $req->input('gen_complain_dealership');
        $gen_complain_cpt_type = $req->input('gen_complain_cpt_type');
        $gen_complain_spg_type = $req->input('gen_complain_spg_type');
        $gen_complain_ccc_type = $req->input('gen_complain_ccc_type');
        $gen_complain_voc = $req->input('gen_complain_voc');
        $gen_agent_complain_notes = $req->input('gen_agent_complain_notes');
        $gen_complaint_priority = $req->input('gen_complaint_priority');
        // Pre-Sale
        $complaint_type_presale = $req->input('complaint_type_presale');
        $presale_complain_source = $req->input('presale_complain_source');
        $presale_complain_dealership = $req->input('presale_complain_dealership');
        $presale_complain_cpt_type = $req->input('presale_complain_cpt_type');
        $presale_complain_spg_type = $req->input('presale_complain_spg_type');
        $presale_complain_ccc_type = $req->input('presale_complain_ccc_type');
        $presale_complain_voc = $req->input('presale_complain_voc');
        $presale_agent_complain_notes = $req->input('presale_agent_complain_notes');
        $presale_complaint_priority = $req->input('presale_complaint_priority');
        // Sale
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
        $sale_complain_cpt_type = $req->input('sale_complain_cpt_type');
        $sale_complain_spg_type = $req->input('sale_complain_spg_type');
        $sale_complain_ccc_type = $req->input('sale_complain_ccc_type');
        $sale_complaint_priority = $req->input('sale_complaint_priority');
        $sale_complain_voc = $req->input('sale_complain_voc');
        $sale_agent_complain_notes = $req->input('sale_agent_complain_notes');
        // After Sale
        $complaint_type_aftersale = $req->input('complaint_type_aftersale');
        $aftersale_complain_source = $req->input('aftersale_complain_source');
        $aftersale_customer_vehicle = $req->input('aftersale_customer_vehicle');
        $aftersale_vehicle_colour = $req->input('aftersale_vehicle_colour');
        $aftersale_complain_cpt_type = $req->input('aftersale_complain_cpt_type');
        $aftersale_complain_spg_type = $req->input('aftersale_complain_spg_type');
        $aftersale_complain_ccc_type = $req->input('aftersale_complain_ccc_type');
        $aftersale_complain_dealership = $req->input('aftersale_complain_dealership');
        $aftersale_pbo = $req->input('aftersale_pbo');
        $aftersale_complain_source = $req->input('aftersale_complain_source');
        $aftersale_chasis_number = $req->input('aftersale_chasis_number');
        $aftersale_engine_number = $req->input('aftersale_engine_number');
        $aftersale_registration_number = $req->input('aftersale_registration_number');
        $aftersale_invoice_date = $req->input('aftersale_invoice_date');
        $aftersale_formatted_date = date("Y-m-d", strtotime($aftersale_invoice_date));
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
        // CHECKING IF CUSTOMER EXISTS OR NOT
        $check_customer = DB::select("select * from `customers` where `name` = '$name' and `mobile` = '$mobile'");
        if (count($check_customer) == 1) {
            $existing_customer_id = $check_customer[0]->id;
            $existing_customer_name = $check_customer[0]->name;
            $customer_id = $existing_customer_id;
        }
        // IF CUSTOMER EXISTS
        if (count($check_customer) == 1) {
            // Complaint Type - General
            if ($complaint_type_gen == 'General' && $gen_complain_voc != '') {
                // GENERATING COMPLAINT NUMBER
                $last_two_digits = substr($gen_complain_dealership, -2);
                $complaint_number = $gen_complain_cpt_type . $gen_complain_spg_type . $last_two_digits . $complain_number;
                //   General COMPLAINT'S QUERY
                $gen_complaint_data = array(
                    'id' => NULL,
                    'created_at' => $date,
                    'createddate' => $currentDate,
                    'createdtime' => $currentTime,
                    'customer_id' => $customer_id,
                    'city_id' => $city_id,
                    'created_by' => $created_by,
                    'source' => $gen_complain_source,
                    'complain_number' => $complaint_number,
                    'complain_type_cpt' => $gen_complain_cpt_type,
                    'complain_type_spg' => $gen_complain_spg_type,
                    'complain_type_ccc' => $gen_complain_ccc_type,
                    'voc' => $gen_complain_voc,
                    'dealership' => $gen_complain_dealership,
                    'complaint_priority' => $gen_complaint_priority,
                    'notes' => $gen_agent_complain_notes,
                    'complaint_type'  => $complaint_type_gen,
                    'status' => 'Open',
                    'csrf_token' => $req->input('_token')
                );
                //
                $create_gen_complaint = DB::table('tbl_customers_complains')->insert($gen_complaint_data);
                //
                if ($create_gen_complaint) {
                    $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                    // $cust_name = $last_ticket[0]->customer_name;
                    $cust_email = $last_ticket[0]->email;
                    $complaint_number = $last_ticket[0]->complain_number;
                }
                //
                //  CALLING SMS (sendComplaintSMS) FUNCTION
                $this->sendComplaintSMS($mobile, $complaint_number);
                //
                // MAINTAINING COMPLAINT'S STATUS LOG   -----   INSERT INTO `complain-status-log`
                if ($create_gen_complaint) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }
                //
                // CALLING MAIL (sendComplaintEmail) FUNCTION
                $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                if ($mailfuncation === true) {
                    return redirect('complaints-management')->with('msg', "$existing_customer_name's complaint registered with ticket # $complaint_number");
                }
            }
            // Complaint Type - Pre sale
            if ($complaint_type_presale == 'Pre-Sale' && $presale_complain_voc != '') {
                // GENERATING COMPLAINT NUMBER
                $last_two_digits = substr($presale_complain_dealership, -2);
                $complaint_number = $presale_complain_cpt_type . $presale_complain_spg_type . $last_two_digits . $complain_number;
                //  Pre-Sale COMPLAINT'S QUERY
                $presale_complaint_data = array(
                    'id' => NULL,
                    'created_at' => $date,
                    'createddate' => $currentDate,
                    'createdtime' => $currentTime,
                    'customer_id' => $customer_id,
                    'city_id' => $city_id,
                    'created_by' => $created_by,
                    'source' => $presale_complain_source,
                    'complain_number' => $complaint_number,
                    'complain_type_cpt' => $presale_complain_cpt_type,
                    'complain_type_spg' => $presale_complain_spg_type,
                    'complain_type_ccc' => $presale_complain_ccc_type,
                    'voc' => $presale_complain_voc,
                    'dealership' => $presale_complain_dealership,
                    'complaint_priority' => $presale_complaint_priority,
                    'notes' => $presale_agent_complain_notes,
                    'complaint_type'  => $complaint_type_presale,
                    'status' => 'Open',
                    'csrf_token' => $req->input('_token')
                );
                $create_presale_complain = DB::table('tbl_customers_complains')->insert($presale_complaint_data);
                //
                if ($create_presale_complain) {
                    $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                    // $cust_name = $last_ticket[0]->customer_name;
                    $cust_email = $last_ticket[0]->email;
                    $complaint_number = $last_ticket[0]->complain_number;
                }
                //
                //  CALLING SMS (sendComplaintSMS) FUNCTION
                $this->sendComplaintSMS($mobile, $complaint_number);
                //
                // INSERT INTO `complain-status-log`
                if ($create_presale_complain) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }
                //
                // CALLING MAIL (sendComplaintEmail) FUNCTION
                $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                if ($mailfuncation === true) {
                    return redirect('complaints-management')->with('msg', "$existing_customer_name's complaint registered with ticket # $complaint_number");
                }
            }
            // Complaint Type - Sale
            if ($complaint_type_sale == 'Sale' && $sale_complain_voc != '') {
                // GENERATING COMPLAINT NUMBER
                $sale_last_two_digits = substr($sale_complain_dealership, -2);
                $complaint_number = $sale_complain_cpt_type . $sale_complain_spg_type . $sale_last_two_digits . $complain_number;
                //  Sale COMPLAINT'S QUERY
                $sales_data = array(
                    'id' => NULL,
                    'complaint_type' => $complaint_type_sale,
                    'complain_number' => $complaint_number,
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
                    'status' => 'Open',
                    'csrf_token' => $req->input('_token')
                );
                $create_sale_complain = DB::table('tbl_customers_complains')->insert($sales_data);
                //
                if ($create_sale_complain) {
                    $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                    // $cust_name = $last_ticket[0]->customer_name;
                    $cust_email = $last_ticket[0]->email;
                    $complaint_number = $last_ticket[0]->complain_number;
                }
                //
                //  CALLING SMS (sendComplaintSMS) FUNCTION
                $this->sendComplaintSMS($mobile, $complaint_number);
                //
                // INSERT INTO `complain-status-log`
                if ($create_sale_complain) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }
                //
                // CALLING MAIL (sendComplaintEmail) FUNCTION
                $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                // if ($mailfuncation === true) {
                // SENDING COMPLAINT INTO DMS
                if ($create_sale_complain) {
                    $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                    $complaintid = $complaintid[0]->id;
                    $this->sales_crm_to_dms($complaintid);
                }

                // REDIRECTING TO complaint-management PAGE
                if ($create_sale_complain) {
                    return redirect('complaints-management')
                        ->with('msg', "$existing_customer_name's complaint registered with ticket # $complaint_number")
                        ->with('crm-to-dms', "Complaint landed in DMS with ticket # $complaint_number");
                }
            }
            // Complaint Type - After Sale
            if ($complaint_type_aftersale == 'After Sale' && $aftersale_complain_voc != '') {
                $afs_last_two_digits = substr($aftersale_complain_dealership, -2);
                $complaint_number = $aftersale_complain_cpt_type . $aftersale_complain_spg_type . $afs_last_two_digits . $complain_number;
                //  After Sale COMPLAINT'S QUERY
                $afs_data = array(
                    'id' => NULL,
                    'created_at' => $date,
                    'createddate' => $currentDate,
                    'createdtime' => $currentTime,
                    'customer_id' => $customer_id,
                    'city_id' => $city_id,
                    'created_by' => $created_by,
                    'source' => $aftersale_complain_source,
                    'complain_number' => $complaint_number,
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
                    'complaint_type' => $complaint_type_aftersale,
                    'status' => 'Open',
                    'csrf_token' => $req->input('_token')
                );
                $create_afs_complain = DB::table('tbl_customers_complains')->insert($afs_data);
                // $last_id = DB::table('tbl_customers_complains')->insertGetId($afs_data);
                //
                if ($create_afs_complain) {
                    $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                    // $cust_name = $last_ticket[0]->customer_name;
                    $cust_email = $last_ticket[0]->email;
                    $complaint_number = $last_ticket[0]->complain_number;
                }
                //
                //  CALLING SMS (sendComplaintSMS) FUNCTION
                $this->sendComplaintSMS($mobile, $complaint_number);
                //
                // INSERT INTO `complain-status-log`
                if ($create_afs_complain) {
                    $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                    DB::insert($sql);
                }
                //
                // CALLING MAIL (sendComplaintEmail) FUNCTION
                $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                // SENDING COMPLAINT INTO DMS
                if ($create_afs_complain) {
                    $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                    $complaintid = $complaintid[0]->id;
                    $this->afs_crm_to_dms($complaintid);
                }
                // REDIRECTING TO complaints-management PAGE
                if ($create_afs_complain) {
                    return redirect('complaints-management')
                        ->with('msg', "$existing_customer_name's complaint registered with ticket # $complaint_number")
                        ->with('crm-to-dms', "Complaint landed in DMS with ticket # $complaint_number");
                }
            }
        } else {
            // ADDING NEW CUSTOMER
            $add_customer = DB::insert("INSERT INTO `customers`(`id`,`name`, `email`, `mobile`, `date`, `city`, customer_type) VALUES (null,'$name','$email','$mobile','$date', '$city', '$customer_type')");

            // GETTING ID (LAST ID) OF (LAST) REGISTERED CUSTOMER
            if ($add_customer) {
                $cid = DB::select("select id from customers order by id desc limit 1");
                $customer_id = $cid[0]->id;
                //
                // Complaint Type - General
                if ($complaint_type_gen == 'General' && $gen_complain_voc != '') {
                    // GENERATING COMPLAINT NUMBER
                    $last_two_digits = substr($gen_complain_dealership, -2);
                    $complaint_number = $gen_complain_cpt_type . $gen_complain_spg_type . $last_two_digits . $complain_number;
                    //   General COMPLAINT'S QUERY
                    $gen_complaint_data = array(
                        'id' => NULL,
                        'created_at' => $date,
                        'createddate' => $currentDate,
                        'createdtime' => $currentTime,
                        'customer_id' => $customer_id,
                        'city_id' => $city_id,
                        'created_by' => $created_by,
                        'source' => $gen_complain_source,
                        'complain_number' => $complaint_number,
                        'complain_type_cpt' => $gen_complain_cpt_type,
                        'complain_type_spg' => $gen_complain_spg_type,
                        'complain_type_ccc' => $gen_complain_ccc_type,
                        'voc' => $gen_complain_voc,
                        'dealership' => $gen_complain_dealership,
                        'complaint_priority' => $gen_complaint_priority,
                        'notes' => $gen_agent_complain_notes,
                        'complaint_type'  => $complaint_type_gen,
                        'status' => 'Open',
                        'csrf_token' => $req->input('_token')
                    );
                    //
                    $create_gen_complaint = DB::table('tbl_customers_complains')->insert($gen_complaint_data);
                    //
                    if ($create_gen_complaint) {
                        $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                        // $cust_name = $last_ticket[0]->customer_name;
                        $cust_email = $last_ticket[0]->email;
                        $complaint_number = $last_ticket[0]->complain_number;
                    }
                    //
                    //  CALLING SMS (sendComplaintSMS) FUNCTION
                    $this->sendComplaintSMS($mobile, $complaint_number);
                    //
                    // MAINTAINING COMPLAINT'S STATUS LOG   -----   INSERT INTO `complain-status-log`
                    if ($create_gen_complaint) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                        DB::insert($sql);
                    }
                    //
                    // CALLING MAIL (sendComplaintEmail) FUNCTION
                    $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                    if ($mailfuncation === true) {
                        return redirect('complaints-management')->with('msg', "$name's complaint registered with ticket # $complaint_number");
                    }
                }
                // Complaint Type - Pre sale
                if ($complaint_type_presale == 'Pre-Sale' && $presale_complain_voc != '') {
                    // GENERATING COMPLAINT NUMBER
                    $last_two_digits = substr($presale_complain_dealership, -2);
                    $complaint_number = $presale_complain_cpt_type . $presale_complain_spg_type . $last_two_digits . $complain_number;
                    //  Pre-Sale COMPLAINT'S QUERY
                    $presale_complaint_data = array(
                        'id' => NULL,
                        'created_at' => $date,
                        'createddate' => $currentDate,
                        'createdtime' => $currentTime,
                        'customer_id' => $customer_id,
                        'city_id' => $city_id,
                        'created_by' => $created_by,
                        'source' => $presale_complain_source,
                        'complain_number' => $complaint_number,
                        'complain_type_cpt' => $presale_complain_cpt_type,
                        'complain_type_spg' => $presale_complain_spg_type,
                        'complain_type_ccc' => $presale_complain_ccc_type,
                        'voc' => $presale_complain_voc,
                        'dealership' => $presale_complain_dealership,
                        'complaint_priority' => $presale_complaint_priority,
                        'notes' => $presale_agent_complain_notes,
                        'complaint_type'  => $complaint_type_presale,
                        'status' => 'Open',
                        'csrf_token' => $req->input('_token')
                    );
                    $create_presale_complain = DB::table('tbl_customers_complains')->insert($presale_complaint_data);
                    //
                    if ($create_presale_complain) {
                        $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                        // $cust_name = $last_ticket[0]->customer_name;
                        $cust_email = $last_ticket[0]->email;
                        $complaint_number = $last_ticket[0]->complain_number;
                    }
                    //
                    //  CALLING SMS (sendComplaintSMS) FUNCTION
                    $this->sendComplaintSMS($mobile, $complaint_number);
                    //
                    // INSERT INTO `complain-status-log`
                    if ($create_presale_complain) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                        DB::insert($sql);
                    }
                    //
                    // CALLING MAIL (sendComplaintEmail) FUNCTION
                    $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                    if ($mailfuncation === true) {
                        return redirect('complaints-management')->with('msg', "$name's complaint registered with ticket # $complaint_number");
                    }
                }
                // Complaint Type - Sale
                if ($complaint_type_sale == 'Sale' && $sale_complain_voc != '') {
                    // GENERATING COMPLAINT NUMBER
                    $sale_last_two_digits = substr($sale_complain_dealership, -2);
                    $complaint_number = $sale_complain_cpt_type . $sale_complain_spg_type . $sale_last_two_digits . $complain_number;
                    //  Sale COMPLAINT'S QUERY
                    $sales_data = array(
                        'id' => NULL,
                        'complaint_type' => $complaint_type_sale,
                        'complain_number' => $complaint_number,
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
                        'status' => 'Open',
                        'csrf_token' => $req->input('_token')
                    );
                    $create_sale_complain = DB::table('tbl_customers_complains')->insert($sales_data);
                    //
                    if ($create_sale_complain) {
                        $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                        // $cust_name = $last_ticket[0]->customer_name;
                        $cust_email = $last_ticket[0]->email;
                        $complaint_number = $last_ticket[0]->complain_number;
                    }
                    //
                    //  CALLING SMS (sendComplaintSMS) FUNCTION
                    $this->sendComplaintSMS($mobile, $complaint_number);
                    //
                    // INSERT INTO `complain-status-log`
                    if ($create_sale_complain) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                        DB::insert($sql);
                    }
                    //
                    // CALLING MAIL (sendComplaintEmail) FUNCTION
                    $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                    // if ($mailfuncation === true) {
                    // SENDING COMPLAINT INTO DMS
                    if ($create_sale_complain) {
                        $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                        $complaintid = $complaintid[0]->id;
                        $this->sales_crm_to_dms($complaintid);
                    }

                    // REDIRECTING TO complaint-management PAGE
                    if ($create_sale_complain) {
                        return redirect('complaints-management')
                            ->with('msg', "$name's complaint registered with ticket # $complaint_number")
                            ->with('crm-to-dms', "Complaint landed in DMS with ticket # $complaint_number");
                    }
                }
                // Complaint Type - After Sale
                if ($complaint_type_aftersale == 'After Sale' && $aftersale_complain_voc != '') {
                    $afs_last_two_digits = substr($aftersale_complain_dealership, -2);
                    $complaint_number = $aftersale_complain_cpt_type . $aftersale_complain_spg_type . $afs_last_two_digits . $complain_number;
                    //  After Sale COMPLAINT'S QUERY
                    $afs_data = array(
                        'id' => NULL,
                        'created_at' => $date,
                        'createddate' => $currentDate,
                        'createdtime' => $currentTime,
                        'customer_id' => $customer_id,
                        'city_id' => $city_id,
                        'created_by' => $created_by,
                        'source' => $aftersale_complain_source,
                        'complain_number' => $complaint_number,
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
                        'complaint_type' => $complaint_type_aftersale,
                        'status' => 'Open',
                        'csrf_token' => $req->input('_token')
                    );
                    $create_afs_complain = DB::table('tbl_customers_complains')->insert($afs_data);
                    // $last_id = DB::table('tbl_customers_complains')->insertGetId($afs_data);
                    //
                    if ($create_afs_complain) {
                        $last_ticket = DB::select("SELECT tbl_customers_complains.id, `customer_id`, `complain_number`, customers.email AS email, customers.name AS customer_name FROM  `tbl_customers_complains` LEFT JOIN customers ON customers.id = tbl_customers_complains.`customer_id` ORDER BY id DESC LIMIT 1");
                        // $cust_name = $last_ticket[0]->customer_name;
                        $cust_email = $last_ticket[0]->email;
                        $complaint_number = $last_ticket[0]->complain_number;
                    }
                    //
                    //  CALLING SMS (sendComplaintSMS) FUNCTION
                    $this->sendComplaintSMS($mobile, $complaint_number);
                    //
                    // INSERT INTO `complain-status-log`
                    if ($create_afs_complain) {
                        $sql = "INSERT INTO `complain-status-log`(`complain_number`, `current_status`, `created_by`, `created_at`, `created_date`, `created_time`) VALUES ('$complaint_number','Open', '$created_by', '$date', '$currentDate','$currentTime')";
                        DB::insert($sql);
                    }
                    //
                    // CALLING MAIL (sendComplaintEmail) FUNCTION
                    $mailfuncation = $this->sendComplaintEmail($cust_email, $complaint_number);
                    // SENDING COMPLAINT INTO DMS
                    if ($create_afs_complain) {
                        $complaintid = DB::select("SELECT id FROM tbl_customers_complains ORDER BY id DESC LIMIT 1");
                        $complaintid = $complaintid[0]->id;
                        $this->afs_crm_to_dms($complaintid);
                    }
                    // REDIRECTING TO complaints-management PAGE
                    if ($create_afs_complain) {
                        return redirect('complaints-management')
                            ->with('msg', "$name's complaint registered with ticket # $complaint_number")
                            ->with('crm-to-dms', "Complaint landed in DMS with ticket # $complaint_number");
                    }
                }
            }
        }
    }

    // api-status-log/526001680
    public function complaints_api_status_logs()
    {
        $data = DB::select("SELECT api_status_log.*, tbl_users.name AS USER
    FROM
        `api_status_log`
    LEFT JOIN tbl_users ON tbl_users.id = api_status_log.created_by
    ORDER BY api_status_log.id DESC");
        return view('complaints-api-logs', ["list" => $data]);
    }

    // complaint-details/1 -----   IRFAN
    public function complaint_details($id)
    {
        $row = DB::select("SELECT tbl_customers_complains.*,
        tbl_dealers.dealer_name,
        customers.name AS customer_name,
        customers.mobile AS mobile,
        customers.email AS email,
        tbl_users.name AS username,
        tbl_city.city AS city,
        tbl_complain_cpt.complain_type AS cpt,
        tbl_complain_spg.complain_spg_type AS spg,
        tbl_complain_ccc.complain_ccc_type AS ccc
        FROM
        `tbl_customers_complains`
    LEFT JOIN tbl_dealers ON tbl_dealers.dealer_code = tbl_customers_complains.dealership
    LEFT JOIN customers ON customers.id = tbl_customers_complains.customer_id
    LEFT JOIN tbl_users ON tbl_users.id = tbl_customers_complains.created_by
    LEFT JOIN tbl_city ON tbl_city.id = customers.city
    LEFT JOIN tbl_complain_cpt ON tbl_complain_cpt.complain_id = tbl_customers_complains.complain_type_cpt
    LEFT JOIN tbl_complain_spg ON tbl_complain_spg.complain_spg_id = tbl_customers_complains.complain_type_spg
    LEFT JOIN tbl_complain_ccc ON tbl_complain_ccc.complain_ccc_id = tbl_customers_complains.complain_type_ccc
    WHERE
        tbl_customers_complains.id = $id ");
        $source = DB::select("SELECT * FROM `inq_complaints_sources`");
        $followup = DB::select("SELECT * FROM `tbl_follow_up` where complain_id = '$id' order by id desc");
        $dealership = DB::select("SELECT * FROM `tbl_dealers`");
        return view('complaint-details', compact('id', 'followup'), ['rows' => $row, 'dealership' => $dealership, 'source' => $source]);
    }

    // update-complaint-status/{id}
    public function update_complaint_status($id, Request $d)
    {
        $updated_by = session()->get('isLogin')[0]['id'];
        $status = $d->input('complaint_status');
        $complain_number = $d->input('complain_number');
        $createdby = DB::select("SELECT created_by as created_by FROM `tbl_customers_complains` WHERE id = '$id'");
        $created_by = $createdby[0]->created_by;
        $createdat = DB::select("SELECT created_at as created_at FROM `tbl_customers_complains` WHERE id = '$id'");
        $created_at = $createdat[0]->created_at;
        //
        // STATUS AS previousstatus FOR MAINTAINING COMPLAINT STATUS LOG
        $complainpreviousstatus = DB::select("SELECT `status` as previousstatus FROM `tbl_customers_complains` WHERE id = '$id'");
        $previousstatus = $complainpreviousstatus[0]->previousstatus;
        // Reason For Force Close ----- ON STATUS = Request to force close
        $force_close_reason = $d->input('force_close_reason');
        // DSC ----- ON STATUS = CLOSED
        $dsc = $d->input('dsc');
        // DSC REMARKS ----- ON STATUS = CLOSED
        $dsc_remarks = $d->input('dsc_remarks');
        // Customer Satisfaction ----- ON STATUS = CLOSED
        $customer_satisfaction = $d->input('customer_satisfaction');
        // Dealership Guilty ----- ON STATUS = CLOSED
        $guilty_dealsership = $d->input('guilty_dealsership');
        //
        // status == "Request to force close"
        if ($status == "Request to force close") {
            $update_status_force_closure = DB::update("UPDATE `tbl_customers_complains` SET `status` = '$status', `force_close_reason` = '$force_close_reason' where id = '$id'");
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
}
