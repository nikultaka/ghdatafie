<?php

define('USER_EMAIL', env('MAIL_USERNAME', 'noreply@ghdatafie.com'));
define('ADMIN', '__admin');
define('ADMIN_LOGOUT', ADMIN . '/logout');
define('ADMIN_DASHBOARD', ADMIN . '/dashboard');
define('ASSET', 'public/');


define('USER_NAME', 'GHDatafie');
define('USER_SUBJECT', 'inquiry');


define('NEWS', 1);
define('REPORTS', 2);
define('INFOGRAPHICS', 3);

define('DEFAULT_INFOGRAPHICS', 10);
define('DEFAULT_NEWS', 19);

define('NO_IMAGE_AVAILABLE', 'No_Image_Available.jpg');

define('FREE_ACOOUNT_ID', 1);

define('DELETED', -1);
define('INACTIVE', 0);
define('ACTIVE', 1);

define('USER_ROLE', 0);
define('ADMIN_ROLE', 1);
define('CONTRIBUTOR_ROLE', 2);

define('PENDING', 0);
define('APPROVE', 1);
define('REJECT', 2);
