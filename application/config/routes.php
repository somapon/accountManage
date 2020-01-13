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


$route['default_controller'] = 'Auth';
$route['404_override'] = '';

$modules_path = APPPATH.'modules/';
$modules = scandir($modules_path);

foreach($modules as $module)
{
    if($module === '.' || $module === '..') continue;
    if(is_dir($modules_path) . '/' . $module)
    {
        $routes_path = $modules_path . $module . '/config/routes.php';
        if(file_exists($routes_path))
        {
            require($routes_path);
        }
        else
        {
            continue;
        }
    }
}



$route['translate_uri_dashes'] = FALSE;

$route['Auth/group'] = 'Auth/groups';
$route['Auth/group/add'] = 'Auth/create_group';
$route['Auth/group/edit/(:num)'] = 'Auth/edit_group/$1';
$route['Auth/group/delete/(:num)'] = 'Auth/delete_group/$1';

$route['Auth/user'] = 'Auth/users';
$route['Auth/user/add'] = 'Auth/create_user';
$route['Auth/user/edit/(:num)'] = 'Auth/edit_user/$1';
$route['Auth/user/delete/(:num)'] = 'Auth/delete_user/$1';
$route['Auth/user/update/(:num)'] = 'Auth/edit_user_profile/$1';
$route['Auth/user/image/(:num)'] = 'Auth/edit_profile_image/$1';
$route['Auth/user/view/(:num)'] = 'Auth/view_user/$1';
$route['Auth/user/profile'] = 'Auth/user_profile';
$route['Auth/user/password'] = 'Auth/change_password';

$route['School/list'] = 'School/school_list';
$route['School/add'] = 'School/school_add';
$route['School/edit/(:num)'] = 'School/school_edit/$1';
$route['School/view/(:num)'] = 'School/school_view/$1';
$route['School/delete/(:num)'] = 'School/school_delete/$1';

$route['Teacher/list'] = 'Teacher/teacher_list';
$route['Teacher/add'] = 'Teacher/teacher_add';
$route['Teacher/edit/(:num)'] = 'Teacher/teacher_edit/$1';
$route['Teacher/view/(:num)'] = 'Teacher/teacher_view/$1';
$route['Teacher/delete/(:num)'] = 'Teacher/teacher_delete/$1';

$route['Student/list'] = 'Student/student_list';
$route['Student/add'] = 'Student/student_add';
$route['Student/edit/(:num)'] = 'Student/student_edit/$1';
$route['Student/view/(:num)'] = 'Student/student_view/$1';
$route['Student/delete/(:num)'] = 'Student/student_delete/$1';

$route['Setting/division/list'] = 'Setting/division_list';
$route['Setting/division/add'] = 'Setting/division_add';
$route['Setting/division/edit/(:num)'] = 'Setting/division_edit/$1';
$route['Setting/division/delete/(:num)'] = 'Setting/division_delete/$1';

$route['Setting/district/list'] = 'Setting/district_list';
$route['Setting/district/add'] = 'Setting/district_add';
$route['Setting/district/edit/(:num)'] = 'Setting/district_edit/$1';
$route['Setting/district/delete/(:num)'] = 'Setting/district_delete/$1';

$route['Setting/upazila/list'] = 'Setting/upazila_list';
$route['Setting/upazila/add'] = 'Setting/upazila_add';
$route['Setting/upazila/edit/(:num)'] = 'Setting/upazila_edit/$1';
$route['Setting/upazila/delete/(:num)'] = 'Setting/upazila_delete/$1';

$route['Setting/union/list'] = 'Setting/union_list';
$route['Setting/union/add'] = 'Setting/union_add';
$route['Setting/union/edit/(:num)'] = 'Setting/union_edit/$1';
$route['Setting/union/delete/(:num)'] = 'Setting/union_delete/$1';

$route['Setting/village/list'] = 'Setting/village_list';
$route['Setting/village/add'] = 'Setting/village_add';
$route['Setting/village/edit/(:num)'] = 'Setting/village_edit/$1';
$route['Setting/village/delete/(:num)'] = 'Setting/village_delete/$1';

$route['Setting/word/list'] = 'Setting/word_list';
$route['Setting/word/add'] = 'Setting/word_add';
$route['Setting/word/edit/(:num)'] = 'Setting/word_edit/$1';
$route['Setting/word/delete/(:num)'] = 'Setting/word_delete/$1';

$route['Setting/class'] = 'Setting/class_list';
$route['Setting/class_add'] = 'Setting/class_add';
$route['Setting/class_edit/(:num)'] = 'Setting/class_edit/$1';
$route['Setting/class_delete/(:num)'] = 'Setting/class_delete/$1';

$route['Setting/section'] = 'Setting/section_list';
$route['Setting/section_add'] = 'Setting/section_add';
$route['Setting/section_edit/(:num)'] = 'Setting/section_edit/$1';
$route['Setting/section_delete/(:num)'] = 'Setting/section_delete/$1';

$route['Setting/group'] = 'Setting/group_list';
$route['Setting/group_add'] = 'Setting/group_add';
$route['Setting/group_edit/(:num)'] = 'Setting/group_edit/$1';
$route['Setting/group_delete/(:num)'] = 'Setting/group_delete/$1';

$route['Setting/education_level'] = 'Setting/education_level_list';
$route['Setting/education_level_add'] = 'Setting/education_level_add';
$route['Setting/education_level_edit/(:num)'] = 'Setting/education_level_edit/$1';
$route['Setting/education_level_delete/(:num)'] = 'Setting/education_level_delete/$1';

$route['Setting/institute_type'] = 'Setting/institute_type_list';
$route['Setting/institute_type_add'] = 'Setting/institute_type_add';
$route['Setting/institute_type_edit/(:num)'] = 'Setting/institute_type_edit/$1';
$route['Setting/institute_type_delete/(:num)'] = 'Setting/institute_type_delete/$1';

$route['Setting/rule'] = 'Setting/rule_list';
$route['Setting/rule_add'] = 'Setting/rule_add';
$route['Setting/rule_edit/(:num)'] = 'Setting/rule_edit/$1';
$route['Setting/rule_delete/(:num)'] = 'Setting/rule_delete/$1';

$route['Setting/profession'] = 'Setting/profession_list';
$route['Setting/profession_add'] = 'Setting/profession_add';
$route['Setting/profession_edit/(:num)'] = 'Setting/profession_edit/$1';
$route['Setting/profession_delete/(:num)'] = 'Setting/profession_delete/$1';

$route['Setting/designation'] = 'Setting/designation_list';
$route['Setting/designation_add'] = 'Setting/designation_add';
$route['Setting/designation_edit/(:num)'] = 'Setting/designation_edit/$1';
$route['Setting/designation_delete/(:num)'] = 'Setting/designation_delete/$1';

$route['Setting/stipend_level'] = 'Setting/stipend_level_list';
$route['Setting/stipend_level_add'] = 'Setting/stipend_level_add';
$route['Setting/stipend_level_edit/(:num)'] = 'Setting/stipend_level_edit/$1';
$route['Setting/stipend_level_delete/(:num)'] = 'Setting/stipend_level_delete/$1';

$route['Setting/religion'] = 'Setting/religion_list';
$route['Setting/religion_add'] = 'Setting/religion_add';
$route['Setting/religion_edit/(:num)'] = 'Setting/religion_edit/$1';
$route['Setting/religion_delete/(:num)'] = 'Setting/religion_delete/$1';

$route['Setting/income_range'] = 'Setting/income_range_list';
$route['Setting/income_range_add'] = 'Setting/income_range_add';
$route['Setting/income_range_edit/(:num)'] = 'Setting/income_range_edit/$1';
$route['Setting/income_range_delete/(:num)'] = 'Setting/income_range_delete/$1';

$route['Setting/economic_status'] = 'Setting/economic_status_list';
$route['Setting/economic_status_add'] = 'Setting/economic_status_add';
$route['Setting/economic_status_edit/(:num)'] = 'Setting/economic_status_edit/$1';
$route['Setting/economic_status_delete/(:num)'] = 'Setting/economic_status_delete/$1';

$route['Setting/risk_of_early_marriage'] = 'Setting/risk_of_early_marriage_list';
$route['Setting/risk_of_early_marriage_add'] = 'Setting/risk_of_early_marriage_add';
$route['Setting/risk_of_early_marriage_edit/(:num)'] = 'Setting/risk_of_early_marriage_edit/$1';
$route['Setting/risk_of_early_marriage_delete/(:num)'] = 'Setting/risk_of_early_marriage_delete/$1';

$route['Setting/financial_support'] = 'Setting/financial_support_list';
$route['Setting/financial_support_add'] = 'Setting/financial_support_add';
$route['Setting/financial_support_edit/(:num)'] = 'Setting/financial_support_edit/$1';
$route['Setting/financial_support_delete/(:num)'] = 'Setting/financial_support_delete/$1';

$route['Setting/disability'] = 'Setting/disability_list';
$route['Setting/disability_add'] = 'Setting/disability_add';
$route['Setting/disability_edit/(:num)'] = 'Setting/disability_edit/$1';
$route['Setting/disability_delete/(:num)'] = 'Setting/disability_delete/$1';

$route['Addressbook/categories'] = 'Addressbook/category_list';
$route['Addressbook/category_add'] = 'Addressbook/category_add';
$route['Addressbook/category_edit/(:num)'] = 'Addressbook/category_edit/$1';
$route['Addressbook/category_delete/(:num)'] = 'Addressbook/category_delete/$1';

$route['Addressbook/groups'] = 'Addressbook/group_list';
$route['Addressbook/group_add'] = 'Addressbook/group_add';
$route['Addressbook/group_edit/(:num)'] = 'Addressbook/group_edit/$1';
$route['Addressbook/group_delete/(:num)'] = 'Addressbook/group_delete/$1';

$route['Addressbook/peoples'] = 'Addressbook/people_list';
$route['Addressbook/people_add'] = 'Addressbook/people_add';
$route['Addressbook/people_edit/(:num)'] = 'Addressbook/people_edit/$1';
$route['Addressbook/people_delete/(:num)'] = 'Addressbook/people_delete/$1';

$route['Attendance/index'] = 'Attendance/index';
$route['Attendance/update'] = 'Attendance/update';

$route['Notification/categories'] = 'Notification/category_list';
$route['Notification/category/add'] = 'Notification/category_add';
$route['Notification/category/edit/(:num)'] = 'Notification/category_edit/$1';
$route['Notification/category/delete/(:num)'] = 'Notification/category_delete/$1';

$route['Notification/ngroups'] = 'Notification/ngroup_list';
$route['Notification/ngroup/add'] = 'Notification/ngroup_add';
$route['Notification/ngroup/edit/(:num)'] = 'Notification/ngroup_edit/$1';
$route['Notification/ngroup/delete/(:num)'] = 'Notification/ngroup_delete/$1';

$route['Notification/contents'] = 'Notification/content_list';
$route['Notification/content/add'] = 'Notification/content_add';
$route['Notification/content/edit/(:num)'] = 'Notification/content_edit/$1';
$route['Notification/content/delete/(:num)'] = 'Notification/content_delete/$1';

$route['Notification/emails'] = 'Notification/email_list';
$route['Notification/send_email'] = 'Notification/email_add';
$route['Notification/email/edit/(:num)'] = 'Notification/email_edit/$1';
$route['Notification/email/delete/(:num)'] = 'Notification/email_delete/$1';

$route['Notification/sms'] = 'Notification/sms_list';
$route['Notification/message'] = 'Notification/sms_add';
$route['Notification/sms_edit/(:num)'] = 'Notification/sms_edit/$1';
$route['Notification/sms_delete/(:num)'] = 'Notification/sms_delete/$1';

$route['Notification/vms'] = 'Notification/vms_list';
$route['Notification/vms/add'] = 'Notification/vms_add';
$route['Notification/vms/edit/(:num)'] = 'Notification/vms_edit/$1';
$route['Notification/vms/delete/(:num)'] = 'Notification/vms_delete/$1';

$route['SSNM/services'] = 'SSNM/service_list';
$route['SSNM/service/add'] = 'SSNM/service_add';
$route['SSNM/service/edit/(:num)'] = 'SSNM/service_edit/$1';
$route['SSNM/service/delete/(:num)'] = 'SSNM/service_delete/$1';

$route['AppUser/applications'] = 'AppUser/application_list';
$route['AppUser/view_user'] = 'AppUser/view_user';
$route['AppUser/enable_disable_user'] = 'AppUser/enable_disable_user';
$route['AppUser/level_making'] = 'AppUser/level_making';
$route['AppUser/user_access_form'] = 'AppUser/user_access_form';
$route['SSNM/application/edit/(:num)'] = 'SSNM/application_edit/$1';
$route['SSNM/application/delete/(:num)'] = 'SSNM/application_delete/$1';

$route['Others/users_feedback'] = 'Others/users_feedback';
$route['Others/notifications'] = 'Others/notifications';

$route['Dropout/categories'] = 'Dropout/category_list';
$route['Dropout/category/add'] = 'Dropout/category_add';
$route['Dropout/category/edit/(:num)'] = 'Dropout/category_edit/$1';
$route['Dropout/category/delete/(:num)'] = 'Dropout/category_delete/$1';

$route['Dropout/students'] = 'Dropout/student_list';
$route['Dropout/student/add'] = 'Dropout/student_add';
$route['Dropout/student/edit/(:num)'] = 'Dropout/student_edit/$1';
$route['Dropout/student/delete/(:num)'] = 'Dropout/student_delete/$1';

$route['Promotion/student_promotion'] = 'Promotion/student_promotion';
$route['Promotion/promotion_history'] = 'Promotion/promotion_history';
$route['Promotion/pending_history'] = 'Promotion/pending_student_list';

//Sombor Works

//Route for Holiday
$route['Setting/holiday'] = 'Setting/holiday_list';
$route['Setting/holiday_add'] = 'Setting/holiday_add';
$route['Setting/holiday_edit/(:num)'] = 'Setting/holiday_edit/$1';
$route['Setting/holiday_delete/(:num)'] = 'Setting/holiday_delete/$1';

//Route for early marrige risk report
$route['EarlyMarrige/risk_list'] = 'EarlyMarrige/risk_list';
$route['EarlyMarrige/stakeholder_assign_list'] = 'EarlyMarrige/stakeholder_assign_list';
$route['EarlyMarrige/stakeholder_action_execution_list'] = 'EarlyMarrige/stakeholder_action_execution_list';
$route['EarlyMarrige/result_after_getting_support'] = 'EarlyMarrige/result_after_getting_support';
$route['EarlyMarrige/recovery_list'] = 'EarlyMarrige/recovery_list';

$route['SSNM/action_assign_form'] = 'SSNM/action_assign_form';
$route['SSNM/execution_form_for_specific_org'] = 'SSNM/execution_form_for_specific_org';
$route['SSNM/security_action_taken_for_applied_help'] = 'SSNM/security_action_taken_for_applied_help';
$route['SSNM/feedback_report'] = 'SSNM/feedback_report';


//Route for Absent
$route['Attendance/absent_list'] = 'Attendance/absent_list';

//Route for City Corporation

$route['Setting/thana/thana_list'] = 'Setting/thana_list';
$route['Setting/thana/add'] = 'Setting/thana_add';
$route['Setting/thana/thana_edit/(:num)'] = 'Setting/thana_edit/$1';
$route['Setting/thana/thana_delete/(:num)'] = 'Setting/thana_delete/$1';


//Route for School Info
$route['School/schoolinfo_list'] = 'School/schoolinfo_list';
$route['Setting/thana/add'] = 'Setting/thana_add';
$route['Setting/thana/thana_edit/(:num)'] = 'Setting/thana_edit/$1';
$route['Setting/thana/thana_delete/(:num)'] = 'Setting/thana_delete/$1';
//-----------


$route['Setting/corporation/list'] = 'Setting/corporation_list';
$route['Setting/corporation/add'] = 'Setting/corporation_add';
$route['Setting/corporation/edit/(:num)'] = 'Setting/corporation_edit/$1';
$route['Setting/corporation/delete/(:num)'] = 'Setting/corporation_delete/$1';



//Route for Paurasabha

$route['Setting/paurasabha/list'] = 'Setting/paurasabha_list';
$route['Setting/paurasabha/add'] = 'Setting/paurasabha_add';
$route['Setting/paurasabha/edit/(:num)'] = 'Setting/paurasabha_edit/$1';
$route['Setting/paurasabha/delete/(:num)'] = 'Setting/paurasabha_delete/$1';

//Route for Organization
$route['Setting/organization_list'] = 'Setting/organization_list';


//Route for Solution
$route['Setting/solution'] = 'Setting/solution_list';