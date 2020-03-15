<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//-------------------------------------ADMIN ROUTE-----------------------------------------------------------------------------

$route['admin']                           = "admin/Home";

$route['bid_rate']                        = "admin/Bid_rate";
$route['add_bid_rate']                    = "admin/Bid_rate/Add_bid_rate";

$route['package_bid'] 					  = "admin/Package_bid";
$route['add_bids']						  = "admin/Package_bid/Add_bids";

$route['user']                            = "admin/User";

$route['main_category']                   = "admin/Main_category";
$route['add_main_category']				  = "admin/Main_category/add_category";
$route['main_update/(:any)']			  = "admin/Main_category/update_cateogry";
$route['updated_cateogry']                = "admin/Main_category/updated_cateogry";
$route['main_delete/(:any)']			  = "admin/Main_category/delete_cateogry";

$route['sub_update/(:any)']			  	  = "admin/Sub_category/update_cateogry";
$route['sub_updated_cateogry']            = "admin/Sub_category/updated_cateogry";
$route['sub_delete/(:any)']			      = "admin/Sub_category/delete_cateogry";
$route['sub_category']                    = "admin/Sub_category";
$route['add_sub_category']				  = "admin/Sub_category/add_category";

$route['add_product']                     = "admin/Add_product";
$route['get_category']                    = "admin/Add_product/get_category";
$route['addproduct']					  = "admin/Add_product/addproduct";

$route['product']						  = "admin/Product";
$route['product_update/(:num)']           = "admin/Product/update_product";
$route['product_delete/(:num)']           = "admin/Product/delete_product";    

$route['bid_product'] 					  = "admin/Bid_product";
$route['bid_winner']					  = "admin/Bid_product/winner";

$route['banner']                          = "admin/Banner";
$route['add_banner']                      = "admin/Banner/add_banner";
$route['ban_delete/(:num)']               = "admin/Banner/delete_banner";

$route['news']							  = "admin/News";
$route['add_news']						  = "admin/News/add_news";
$route['news_delete/(:num)']              = "admin/News/delete_news";

$route['aboutus']                         = "admin/Aboutus";
$route['add_aboutus']					  = "admin/Aboutus/add_aboutus";

$route['how_it_work']                     = "admin/How_it_work";
$route['add_how_it_work']				  = "admin/How_it_work/add_how_it_work";

$route['p_policy']                        = "admin/P_policy";
$route['add_p_policy']                    = "admin/P_policy/add_p_policy";

$route['t_and_c']                         = "admin/T_and_c";
$route['add_t_and_c']                     = "admin/T_and_c/add_t_and_c";

$route['bid_lists']                       = "admin/Bid_product/bidlist";

$route['auction_winner']                  = "admin/Auction_winner";

$route['login']                           = "admin/Login/logging";
//-------------------------------------FRONT ROUTE-----------------------------------------------------------------------------


$route['register/member']                 = "Register/new_member";

$route['logout']						  = "Login/logout";

$route['member/login']					  = "Login/member";

$route['membership']					  = "Membership";

$route['stripe/payment']                  = "Payment/pay";

$route['product_detail/(:num)']           = "Product_detail";

$route['my_account']                      = "My_account";
$route['update_profile']                  = "My_account/update_profile";

$route['product/bid']                     = "Product_detail/bid";
$route['product/letest_bid']              = "Product_detail/letest_bid";
$route['product/all_bids']                = "Product_detail/all_bids";

$route['live_product'] 			          = "Live_product";
$route['live_product/(:num)'] 			  = "Live_product";

$route['category/(:num)/(:num)'] 		  = "Category";
$route['category/(:num)/(:num)/(:num)']   = "Category";

$route['search']                          = "Search";

$route['how_it_works']					  = "How_it_works";

$route['about_us']						  = "About_us";
$route['aboutus/newsletter']              = "About_us/news_letter";

$route['contact_us']                      = "Contact_us";
$route['contact/add_contact']             = "Contact_us/add_contact";

$route['simple_product'] 			      = "Simple_product";
$route['simple_product/(:num)'] 		  = "Simple_product";

$route['all_product'] 			          = "All_product";
$route['all_product/(:num)'] 			  = "All_product";

$route['user_history']                    = "User_history";
$route['user_history/(:num)'] 			  = "User_history";
$route['bid_list']                        = "User_history/bidlist";

$route['p_policys']                        = "Privacy_policy";
$route['t_and_cs']                         = "Termsandconditions";