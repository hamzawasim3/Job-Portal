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
$route['default_controller'] = 'home/landing';
$route['about'] = 'home/about';
$route['contact'] = 'home/contact';
$route['login'] = 'loginsystem/login';
$route['register'] = 'loginsystem/register';
$route['recruiter'] = 'recruiter/dashboard';
$route['recruiter/add_job'] = 'recruiter/add_job';
$route['recruiter/view_applicants'] = 'recruiter/view_applicants';
$route['recruiter/view_jobs'] = 'recruiter/view_jobs';
$route['recruiter/view_job/(:any)'] = 'recruiter/view_job/$1';
$route['recruiter/view_job_applicants/(:any)'] = 'recruiter/view_job_applicants/$1';
$route['recruiter/view_application/(:any)'] = 'recruiter/view_application/$1';
$route['recruiter/reject_application/(:any)'] = 'recruiter/reject_application/$1';
$route['recruiter/edit_profile'] = 'recruiter/edit_profile';
$route['candidate'] = 'candidate/dashboard';
$route['candidate/apply/(:any)'] = 'candidate/apply_job/$1';
$route['candidate/disapply/(:any)'] = 'candidate/disapply_job/$1';
$route['candidate/preferred_job'] = 'candidate/preferred_job';
$route['candidate/search_job'] = 'candidate/view_search_page';
$route['candidate/view_applied_jobs'] = 'candidate/view_applied_jobs';
$route['candidate/edit_profile'] = 'candidate/edit_profile';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
