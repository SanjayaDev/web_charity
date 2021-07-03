<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/view_404_page';
$route['translate_uri_dashes'] = FALSE;

$route["login"] = "Auth/view_login_page";
$route["validation_login"] = "Auth/process_validation_login";

$route["dashboard"] = "Admin/view_dashboard_page";
$route["logout"] = "Auth/process_logout";
$route["forbidden"] = "Auth/view_forbidden";

// Admin Management
$route["admin_management"] = "Admin/view_admin_management";
$route["get_admin"] = "Admin/get_admin_listed";
$route["add_admin"] = "Admin/validate_admin_add";
$route["admin_detail"] = "Admin/view_admin_detail";
$route["edit_admin"] = "Admin/process_admin_edit";

// Student Management
$route["student_management"] = "Student/view_student_management";
$route["view_student_detail"] = "Student/view_student_detail";
$route["view_student_add"] = "Student/view_student_add";
$route["student_detail"] = "Student/view_admin_detail";
$route["process_student_add"] = "Student/process_student_add";

// Category Management
$route["category_management"] = "Category/view_category_management";
$route["view_category_add"] = "Category/view_category_add";
$route["view_category_edit"] = "Category/view_category_edit";
$route["process_category_add"] = "Category/process_category_add";
$route["process_category_edit"] = "Category/process_category_edit";
$route["process_category_delete"] = "Category/process_category_delete";
