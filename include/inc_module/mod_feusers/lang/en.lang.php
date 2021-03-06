<?php
/**
 * phpwcms content management system
 *
 * @author Oliver Georgi <og@phpwcms.org>
 * @copyright Copyright (c) 2002-2017, Oliver Georgi
 * @license http://opensource.org/licenses/GPL-2.0 GNU GPL-2
 * @link http://www.phpwcms.org
 *
 **/

// first define main language vars
// first define main language vars
$BLM['backend_menu'] = 'Frontend User Permit';

$BLM['listing_title'] = 'Manage authentication of frontend users';
$BLM['setup_error_title'] = 'Inital setup of Frontend User Permit';
$BLM['setup_error'] = 'The inital setup failed. The database field <strong>feuserpermit_structlevels</strong> could not be created inside table <strong>'.DB_PREPEND.'phpwcms_userdetail</strong>.';
$BLM['incompatible_error'] = 'Your version of phpwcms is incompatible with this module. phpwcms released on or after 2017-03-07 is required. Please update!';
$BLM['create_new'] = 'Add user';
$BLM['florist_entry'] = 'Account data';
$BLM['florist_title'] = 'Title';
$BLM['delete_entry'] = 'Delete account:';
$BLM['listview'] = 'List view';
$BLM['max_words'] = 'max. words';
$BLM['no_entry'] = 'No item found';

$BLM['detail_title'] = 'Salutation';
$BLM['detail_firstname'] = 'First name';
$BLM['detail_lastname'] = 'Name';
$BLM['detail_company'] = 'Company';
$BLM['detail_street'] = 'Street';
$BLM['detail_city'] = 'City';
$BLM['detail_zip'] = 'Zip code';
$BLM['detail_region'] = 'Region';
$BLM['detail_country'] = 'Country';
$BLM['detail_fon'] = 'Phone';
$BLM['detail_fax'] = 'Fax';
$BLM['detail_mobile'] = 'Mobile';
$BLM['detail_signature'] = 'Signature';
$BLM['detail_aktiv'] = 'Active';
$BLM['detail_newsletter'] = 'Newsletter';
$BLM['detail_website'] = 'Website';
$BLM['detail_int1'] = 'Go here after login';
$BLM['detail_varchar1'] = 'Customer ID';
$BLM['detail_email'] = 'Email';
$BLM['detail_login'] = 'Login';
$BLM['detail_password'] = 'Password';
$BLM['feuserpermit_structlevels'] = 'Assigned structure level(s)';

$BLM['forminfo'] = 'Password must be at least 5 chars long. Do not fill in any string as long it should not be updated.';

$BLM['error_password']  = 'Password field is mandatory.';
$BLM['error_password_short'] = 'Password must be at least 5 characters long.';
$BLM['error_login'] = 'Login is not unique. Choose another login.';
$BLM['error_email'] = 'A valid email is mandatory.';
$BLM['error_int1']  = 'Select any site level different from root level.';
