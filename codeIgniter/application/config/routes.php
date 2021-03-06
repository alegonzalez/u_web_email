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
|	http://codeigniter.com/user_guide/general/routing.html
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
$route['login'] = 'User_controller/index';
$route['create_account'] = 'User_controller/viewCreateAccount';
$route['Email']="User_controller/email";
$route['getEmail']="User_controller/btnSeeEmail";
$route['Enviados']="User_controller/correosEnviados";
$route['send'] = 'User_controller/sendMailGmail';
$route['create'] = 'User_controller/checkMail';
$route['see/(:num)'] = 'User_controller/descriptionEmail/$valor';
$route['verification'] = 'User_controller/verificationRandom';
$route['editUser'] = 'User_controller/editUser';
$route['editLoadUser'] = 'User_controller/loadDate';
$route['accion']="User_controller/accion";
$route['destination'] = 'User_controller/emailDestination';
$route['edit']="User_controller/btnUpdate";
$route['redact']="User_controller/redact";
$route['closeSession']="User_controller/closeSession";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
