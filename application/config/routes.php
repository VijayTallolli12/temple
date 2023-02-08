<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'home';
$route['404_override'] = 'Error404';
$route['translate_uri_dashes'] = FALSE;

//About Us
$route['aboutus/shiroor-history'] = "Aboutus/history";
$route['aboutus/activities'] = "Aboutus/activities";
$route['aboutus/daily-worshiped-deities'] = "Aboutus/daily_worship";
$route['aboutus/our-branches'] = "Aboutus/branches";
$route['aboutus/educational-institutes'] = "Aboutus/education";
$route['aboutus/about_us'] = "Aboutus/about_us";

//Parampara
$route['parampara'] = "Parampara/parampara";
$route['parampara/sparampara/(:num)'] = "Parampara/sparampara/$1";

//Sevas
$route['seva/e-seva'] = "seva/e_seva";
$route['seva/e-seva_list'] = "seva/e_seva_list";
$route['seva/seva_payment'] = "seva/seva_payment";

$route['seva/daily-seva'] = "seva/daily_seva";
$route['seva/kanike'] = "seva/kanike";
$route['seva/rooms'] = "seva/rooms";


// $route['gallery/photos'] = "home/get_photos";

//terms and condition
$route['privacy_policy'] = "home/privacy_policy";
$route['terms_and_condition'] = "home/terms_and_condition";

//events
$route['events/(:num)/(:any)'] = "events/event_details/$1/$2";
$route['events/category/(:any)'] = "events/category/$1";
$route['events/archieve/(:any)/(:any)'] = "events/archieve/$1/$2";

//upcoming Events
$route['upcoming_events/(:num)/(:any)'] = "events/upcoming_event_details/$1/$2";
