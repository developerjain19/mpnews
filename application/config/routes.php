<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --------------Admin Route ------------------
$route['admin'] = 'Admin/index';
$route['logout'] = 'Admin/logout';
$route['dashboard'] = 'Admin_Dashboard';
$route['post-format'] = 'POSTController/post_format';
$route['add-post'] = 'POSTController/addPost';
$route['view-posts'] = 'POSTController/viewposts';
$route['categories'] = 'Admin_Dashboard/categories';
$route['add-category'] = 'Admin_Dashboard/add_category';
$route['edit-category/(:any)'] = 'Admin_Dashboard/edit_category/$1';
$route['subcategories'] = 'Admin_Dashboard/subcategories';
$route['add-subcategory'] = 'Admin_Dashboard/add_subcategory';
$route['edit-subcategory/(:any)'] = 'Admin_Dashboard/edit_subcategory/$1';
$route['edit-post/(:any)'] = 'POSTController/editPost/$1';
$route['general-settings'] = 'Admin_Dashboard/general_settings';
$route['settings'] = 'Admin_Dashboard/settings';

$route['comments'] = 'Admin_Dashboard/comments';
$route['contact-query'] = 'Admin_Dashboard/contact_query';
$route['scheduled-posts'] = 'Admin_Dashboard/scheduled_posts';
$route['drafts'] = 'Admin_Dashboard/drafts';
$route['user-posts/(:any)'] = 'POSTController/user_posts/$1';


$route['user-list'] = 'Admin_Dashboard/user_list';
$route['user-post/(:any)'] = 'POSTController/user_posts/$1';

// --------------Website------------------ //

$route['contact'] = 'Home/contact';
$route['register'] = 'Home/register';
$route['profile/(:any)/(:any)'] = 'Home/profile/$1/$2';
$route['social-accounts'] = 'Home/socialAccounts';
$route['terms-conditions'] = 'Home/policy/1';
$route['news/(:any)'] = 'Home/category/$1';
$route['profile/(:any)/(:any)'] = 'Home/profile/$1/$2';
$route['tags/(:any)'] = 'Home/tags/$1';
$route['change-password'] = 'Home/changepassword';
$route['new_password/(:any)'] = 'Home/new_password/$1';
$route['forgot-password'] = 'Home/forgot_password';
$route['profileSetting/(:any)'] = 'Home/profileSetting/$1';
$route['(:any)'] = 'Home/news_details/$1';
