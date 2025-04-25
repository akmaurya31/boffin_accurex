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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'Login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



/* ==================== Custom Routes =======================*/
$route['OTP']                           = 'Login/otp';
$route['Dashboard']                     = "Dashboard/index";
$route['password-recovery']             = "Login/password_recovery";
$route['verify-email']                  = "Login/verify_email";
$route['forget-otp']                    = 'Login/verify_otp_forget_password';
$route['change-password']               = 'Settings/change_password';
$route['read-notification/(:num)']      = 'Activities/read_notification/$1';
$route['create-notification']           = 'Activities/create_notification';
$route['create-user']                   = "User/create";
$route['save-user']                     = "User/store";
$route['send-notification'] 	        = "Activities/send_notification";

// clients portal
$route['ClientDashboard']               = 'Clients/dashboard';
$route['ClientForgetPassword']          = 'Clients/ClientForgetPassword';
$route['ClientsSetNewPassword']			= 'Clients/ClientsSetNewPassword';
$route['ClientsOTPVerification']		= 'Clients/ClientsOTPVerification';
$route['ClientsAddNewJobs']				= 'Clients/ClientsAddNewJobs';
$route['ClientsAddNewJobs_POST']		= 'Clients/ClientsAddNewJobs_POST';

$route['ClientsJobsList']				= 'Clients/ClientsJobsList';
$route['ClientsNotification']			= 'Notifications/ClientsNotification';
$route['clientProfileInformation']		= 'Clients/clientProfileInformation';






