<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\EmailController;
use App\Mail\TestEmail;
//zamran code
use App\Http\Controllers\DataTablesController;
use App\Http\Controllers\SurveyController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['Loginrestrict']], function () {
    //zamran code
    Route::get('/', [CustomerController::class, 'home']);

    // 19-01-2023
    Route::get('crm-logs', [CustomerController::class, 'crm_logs']);
    Route::post('viewcrmlogsdetails', [AjaxController::class, 'view_crmlogs_details'])->name('viewcrmlogsdetails.post');
    // 18-01-2023
    Route::get('customer-search', [CustomerController::class, 'customer_global_search']);
    Route::get('customer-journey', [CustomerController::class, 'customer_journey']);
    // 17-01-2023
    Route::get('inquiry-details/{id}', [CustomerController::class, 'customer_journey_inquiry']);
    Route::get('getcustomerlisting', [DataTablesController::class, 'getcustomerlisting']);
    Route::get('customer-journey-inquiry/{id}', [CustomerController::class, 'customer_journey_inquiry']);
    Route::post('updatecustomerjourneyinquiry/{id}',  [CustomerController::class, 'updatecustomerjourneyinquiry']);
    Route::get('dashboard', [SocialController::class, 'supervisor_dashboard']);
    Route::get('facebook-chats', [SocialController::class, 'facebook_chats']);
    Route::get('index', [SocialController::class, 'agent_dashboard']);
    Route::get('admin', [SocialController::class, 'admin']);
    // Route::get('supervisor-dashboard', [SocialController::class, 'supervisor_dashboard']);
    Route::get('facebook-notification', [SocialController::class, 'facebook_notification']);
    Route::get('facebook-posts', [SocialController::class, 'facebook_posts']);
    Route::get('instagram-posts', [SocialController::class, 'instagram_posts']);
    Route::get('instagram-notifications', [SocialController::class, 'instagram_notifications']);
    Route::get('instagram-chats', [SocialController::class, 'instagram_chats']);
    Route::get('call-logs', [SocialController::class, 'call_logs']);
    Route::get('/Dailer', [SocialController::class, 'call_dailer'])->name('Dailer');
    // Route::get('crm-logs', [SocialController::class, 'crm_logs']);
    // Route::get('crm-logs', [CustomerController::class, 'crm_logs']);
    // Route::get('user-details', [SocialController::class, 'user_details']);
    Route::get('user-details/{id}', [CustomerController::class, 'user_journey']);
    Route::get('call-receive-details', [SocialController::class, 'call_receive_details']);
    Route::get('users', [UserController::class, 'users']);
    Route::get('customers', [CustomerController::class, 'customer'])->name('customers.post');
    Route::get('customer-details/{id}', [CustomerController::class, 'customer_details']);
    Route::get('create-complain/{id}', [CustomerController::class, 'create_complain']);
    Route::get('complain-history/{id}', [CustomerController::class, 'complain_history']);
    Route::get('create-inquiry/{id}', [CustomerController::class, 'create_inquiry']);
    Route::get('inquiry-history/{id}', [CustomerController::class, 'inquiry_history']);
    Route::get('complaint-management', [CustomerController::class, 'complaint_list']);
    Route::get('complaints-api-logs', [CustomerController::class, 'complaints_api_status_logs']);
    Route::get('complain-details/{id}', [CustomerController::class, 'complain_details']);
    Route::get('vehicles-list/{id}', [CustomerController::class, 'vehicles_list']);
    Route::get('call-center-call', [CustomerController::class, 'call_center_call']);
    Route::get('call-center-customer-details', [CustomerController::class, 'call_center_call_details']);
    //zamran code
    Route::get('survey', [SurveyController::class, 'survey']);
    Route::get('csi', [SurveyController::class, 'csi']);
    Route::get('ssi', [SurveyController::class, 'ssi']);
    Route::get('warranty', [SurveyController::class, 'warranty']);
    Route::get('miscellaneous', [SurveyController::class, 'miscellaneous']);
    Route::post('getcomplaincpt', [AjaxController::class, 'getcomplaincpt']);
    Route::post('getinquirytype', [AjaxController::class, 'getinquirytype']);
    Route::post('InqTypeRequest', [AjaxController::class, 'InqSubTypeRequest']);
    // Route::post('getinquirytypes', [AjaxController::class, 'getinquirytypes']);
    Route::get('create-customer-inquiry/{id}', [CustomerController::class, 'create_customer_inquiry']);
    Route::get('create-customers-inquiry/{id}', [CustomerController::class, 'create_customers_inquiry']);
    // Route::get('create-customer-complaint/{id}', [CustomerController::class, 'create_customer_complaint']); del
    // Route::get('create-customer-complain/{id}', [CustomerController::class, 'create_customer_complain']); del
    Route::get('customer-inquiries-list', [CustomerController::class, 'customer_inquiries_list']);
});
Route::get('login', [UserController::class, 'login']);
Route::post('login-post', [UserController::class, 'login_post']);
Route::get('logout', [UserController::class, 'logout']);
//Route::post('get-cpt-options', [CustomerController::class, 'get_cpt_options']);
// Ajax routes
Route::post('cptRequest', [AjaxController::class, 'get_cpt_options'])->name('cptRequest.post');
Route::post('spgRequest', [AjaxController::class, 'get_spg_options'])->name('spgRequest.post');
Route::post('viewInquiryDetails', [AjaxController::class, 'view_inquiry_details'])->name('viewInquiryDetails.post');
Route::post('editfollowup', [AjaxController::class, 'edit_followup'])->name('editfollowup.post');
Route::post('city-dealership', [AjaxController::class, 'city_dealership'])->name('city-dealership.post');
Route::post('getalldealership', [AjaxController::class, 'get_all_dealership'])->name('getalldealership.post');
Route::get('get-customers', [AjaxController::class, 'get_all_customers'])->name('get-customers.post');
Route::post('editfollowuprecord', [AjaxController::class, 'edit_followup_record'])->name('editfollowuprecord.post');
Route::post('getcustomerforinquiry', [AjaxController::class, 'getcustomerforinquiry'])->name('getcustomerforinquiry.post');
Route::post('getpboforinquiry', [AjaxController::class, 'getpboforinquiry']);
Route::post('getpboforaftersale', [AjaxController::class, 'getpboforaftersale']);
Route::post('getsalepboforinquiry', [AjaxController::class, 'getsalepboforinquiry']);
//social routes
Route::get('whatsapp-chats', [SocialController::class, 'whatsapp_chats']);
Route::get('social-media-whatsapp', [SocialController::class, 'whatsapp']);
Route::get('social-media-facebook', [SocialController::class, 'social_media_facebook']);
Route::get('social-media-instagram', [SocialController::class, 'social_media_instagram']);
Route::get('whatsapp', [SocialController::class, 'whatsapp']);
Route::post('get-contacts', [SocialController::class, 'get_contacts']);
Route::post('getAllChats', [SocialController::class, 'get_all_chats'])->name('getAllChats.post');
Route::post('get_FaceBook_chats', [SocialController::class, 'get_FaceBook_chats'])->name('get_FaceBook_chats.post');
Route::post('get-chats', [SocialController::class, 'get_chats'])->name('get-chats.post');
Route::post('search-contacts', [SocialController::class, 'search_contacts'])->name('search-contacts.post');
Route::post('search-chat', [SocialController::class, 'search_chat'])->name('search-chat.post');
Route::post('send-msg', [SocialController::class, 'send_wp_msg'])->name('send-msg.post');
Route::post('send-msg-fb', [SocialController::class, 'send_fb_msg'])->name('send-msg-fb');
Route::post('add-whatsapp-contact', [SocialController::class, 'add_whatsapp_contact']);
Route::post('adduser', [UserController::class, 'useradd']);
Route::post('add-crm-user', [UserController::class, 'add_crm_user']);
Route::get('crm-user-signup', [UserController::class, 'create_crm_user']);
Route::get('send-mail', [CustomerController::class, 'inquiry_mail']);
Route::post('addcustomer', [CustomerController::class, 'customeradd']);
//route created by zamran
Route::post('getCustomerDetailsForEdit', [CustomerController::class, 'getCustomerDetailsForEdit']);
Route::post('editcustomer', [CustomerController::class, 'customeredit']);
Route::post('deletecustomer/{id}', [CustomerController::class, 'customerdelete']);
Route::post('add-vehicle', [CustomerController::class, 'addvehicles']);
Route::post('edit-vehicle/{id}', [CustomerController::class, 'editvehicles']);
Route::post('add-complain', [CustomerController::class, 'add_complain']);
Route::post('add-inquiry', [CustomerController::class, 'add_inquiry']);
Route::post('update-complaint-status/{id}', [CustomerController::class, 'update_complaint_status']);
Route::post('update-inquiry-status/{id}', [CustomerController::class, 'update_inquiry_status']);
Route::post('add-follow-up', [CustomerController::class, 'add_follow_up']);
Route::post('add-complain-follow-ups', [CustomerController::class, 'add_complain_follow_ups']);
Route::post('add-customer-inquiry', [CustomerController::class, 'add_customer_inquiry']);
Route::post('add-customers-inquiry', [CustomerController::class, 'add_customers_inquiry']);
Route::post('add-customers-new-inquiry', [CustomerController::class, 'add_customers_new_inquiry']);
// Route::post('add-customer-complaint', [CustomerController::class, 'add_customer_complaint']); del
Route::post('add-customer-complain', [CustomerController::class, 'add_customer_complain']);
// marketing-campaign
Route::get('marketing-campaign-sms', [CustomerController::class, 'marketing_campaign_sms']);
Route::get('marketing-campaign-email', [CustomerController::class, 'marketing_campaign_email']);
//Rehman Code whatsApp apis
Route::get('/webbhook/incoming',  [UserController::class, 'receiveWebHook']);
Route::post('/webbhook/incoming', [UserController::class, 'processWebhook']);
//Rehman Code FB apis
Route::any('/webhook/fb_incoming', [UserController::class, 'verify_token']);
Route::post('/webhook/fb_incoming', [UserController::class, 'Handle_Response']);

// 19122022
Route::get('social-media-webwhatsapp', [CustomerController::class, 'social_media_webwhatsapp']);
Route::get('social-media-meta-facebook', [CustomerController::class, 'social_media_meta_facebook']);
Route::get('social-media-meta-instagram', [CustomerController::class, 'social_media_meta_instagram']);
//complain-status-log
// Route::get('complain-status-log', [CustomerController::class, 'complain_status_log']);
// 02052023
//complain-status-log
Route::get('complain-status-log/{complain_number}', [CustomerController::class, 'complain_status_log']);
//api-status-log
Route::get('api-status-log/{complain_number}', [CustomerController::class, 'api_status_log']);
//inquiry-status-log
Route::get('inquiry-status-log/{inquiry_number}', [CustomerController::class, 'inquiry_status_log']);
//  SUBHAN - 05052023
Route::get('community-management', [SocialController::class, 'community_management']);
//  SUBHAN - 05052023
Route::get('csi', [CustomerController::class, 'csi_management']);
Route::get('csi-management', [CustomerController::class, 'csi_management']);
Route::get('ssi-management', [CustomerController::class, 'ssi_management']);
Route::get('miscellaneous-management', [CustomerController::class, 'miscellaneous_management']);
Route::get('warranty-management', [CustomerController::class, 'warranty_management']);
// Route::get('send-email', [EmailController::class, 'send_mail']);
Route::get('send-email', [EmailController::class, 'send_mail']);
Route::get('create-customers-new-inquiry/{id}', [CustomerController::class, 'create_customers_new_inquiry']);
