<?php

define('ROOT_DIRECTORY', __DIR__ . '/..');
define('ROOT_APP_DIRECTORY', ROOT_DIRECTORY . '/app');
define('ROOT_VIEW_DIRECTORY', ROOT_APP_DIRECTORY . '/Views');

define('ROOT_APP_FILE', ROOT_APP_DIRECTORY . '/Core/App.php');

define('ROOT_FRONT', ROOT_DIRECTORY . '/../public');
define('ROOT_JS', ROOT_FRONT . '/js');
define('ROOT_CSS', ROOT_FRONT . '/css');

define('SITE_HOST', 'http://');
define('SITE_DOMAIN', 'dyplomka.loc');
define('SITE_PORT', ':8080');

define('SITE_FULL', SITE_HOST . SITE_DOMAIN . SITE_PORT . '/public');