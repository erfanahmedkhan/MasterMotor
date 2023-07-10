<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class DataTablesController extends Controller
{
    public function getcustomerlisting(Request $request)
    {
        
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

        $totalRecords = DB::select("SELECT COUNT(*) as count FROM `customers`");

        $totalRecordswithFilter = DB::select("SELECT COUNT(*) as searchcount FROM `customers` WHERE CONCAT(`name`,`email`,`mobile`,`customer_type`) LIKE '%$searchValue%'");
        // echo "<pre>";
        // print_r($totalRecordswithFilter);
        // die();

        // Fetch records
        $query = "
        SELECT c.*, ct.city as city_name 
        FROM customers c
        LEFT JOIN tbl_city ct ON ct.id = c.city
        ";
        if(!empty($searchValue))
        {
            $query .= " WHERE CONCAT(`name`,`email`,`mobile`,`customer_type`, ct.`city`) LIKE '%$searchValue%' ";
        }

        $query .= " ORDER BY c.id DESC LIMIT $start, $rowperpage";
        
        $records = DB::select($query);

        $data_arr = array();
        
        foreach($records as $record){

            $data_arr[] = array(
            "#" => '',
            "Profile" => "<a href='".url('user-details/'.$record->id)."' target='_blank' class='badge bg-primary shadow-sm text-white' data-toggle='tooltip' data-placement='top' title='View Customer Profile'><i class='fa fa-eye'></i></a>",
            "Customer Type" => $record->customer_type,
            "Name" => $record->name,
            "Email" => $record->email,
            "Mobile" => $record->mobile,
            "Reg Date" => $record->date,
            "Source" => $record->channel,
            "City" => $record->city_name,
            "Action" => "
                <a href='javascript:void();' class='badge bg-warning shadow shadow-warning' data-placement='top' data-id='".$record->id."' title='Edit Customer Profile' onclick='getCustomerDetailsForEdit(this)'>
                    <i class='fa fa-edit text-white'></i>
                </a>",
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords[0]->count,
            "iTotalDisplayRecords" => $totalRecordswithFilter[0]->searchcount,
            "aaData" => $data_arr
        );

        echo json_encode($response);
        
    }
    
}
