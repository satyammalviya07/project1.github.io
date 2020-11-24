<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'UserHome/index';
$route['404_override'] = 'CustomPages/error404';
$route['error_403'] = 'CustomPages/error403';
$route['error_500'] = 'CustomPages/error500';
$route['translate_uri_dashes'] = FALSE;

///////////// /     admin   ///////////////////
$route['adminLogin'] = 'Login/adminLogin';
$route['aDashboard'] = 'admin/Home/index';


$route['addCategory'] = 'admin/Item_details/addCategory';
$route['allCategory'] = 'admin/Item_details/allCategory';

$route['subCategory'] = 'admin/Item_details/sub_category';
$route['subCategoryAdd'] = 'admin/Item_details/sub_category_add';

$route['allUsers'] = 'admin/User_details/all_users';

$route['allMerchants'] = 'admin/Merchant_details/all_merchants';
$route['merchantOrderHistory'] = 'admin/Merchant_details/merchant_order_history';
$route['merchantPaymentD'] = 'admin/Merchant_details/merchant_payment_details';
$route['merchantPay'] = 'admin/Merchant_details/pay_amount';
$route['merchantComplain'] = 'admin/Merchant_details/merchant_complains';
$route['merchantReply'] = 'admin/Merchant_details/admin_reply_merchant';
$route['getMsgForMerchant'] = 'admin/Merchant_details/get_message_for_merchant';
$route['sendMsgMerchant'] = 'admin/Merchant_details/send_msg';
$route['complainStatus'] = 'admin/Merchant_details/complain_status';

$route['messageSeenMerchant'] = 'admin/Merchant_details/messageSeenMerchant';
$route['countMessageMerchant'] = 'admin/Merchant_details/countMessageMerchant';

$route['merchantDelete'] = 'admin/Merchant_details/merchantDelete';


//////////  user   //////////////////////
$route['userRegister'] = 'Login/userResister';
$route['userLogin'] = 'Login/userLogin';
$route['userLogout'] = 'Login/userLogout';

$route['home'] = 'UserHome/index';
$route['checkoutPage'] = 'UserHome/checkoutPage';
$route['sProduct/(:any)'] = 'UserHome/viewSingleProduct/$1';
$route['orderHistory'] = 'UserHome/orderHistory';
$route['all_machine'] = 'UserHome/all_machine';
$route['about_us'] = 'UserHome/about_us';

$route['getCity'] = 'Login/getCity';
$route['getMachine'] = 'VendorHome/getMachine';


///////////////      vendor   ///////////////////////

$route['vendorResister'] = 'Login/vendorResister';
$route['vendorLogin'] = 'Login/vendorLogin';
$route['vendorLogout'] = 'Login/logout';

$route['vDashboard'] = 'VendorHome/vDashboard';
$route['vProfile'] = 'VendorHome/profile';
$route['vChangePassword'] = 'VendorHome/changePassword';
$route['vAllMachine'] = 'VendorHome/allMachine';
$route['addMachine'] = 'VendorHome/addMachine';
$route['vBookHistory'] = 'VendorHome/vBookHistory';
$route['acceptStatus'] = 'VendorHome/acceptStatus';







