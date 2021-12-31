<?php

// Define path to root directory
defined('ROOT_PATH') || define('ROOT_PATH', realpath(dirname(__FILE__) . '/..' ));
// Define path to application directory
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
// Define path to public directory
defined('PUBLIC_PATH') || define('PUBLIC_PATH', realpath(dirname(__FILE__) . '/../public' ));
// Define application environment
/*defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV'): 'development'));*/
// Define templates directory
defined('TEMPLATE_PATH') || define('TEMPLATE_PATH', APPLICATION_PATH. '/views/templates' );
// Define templates directory
defined('LIBRARY_PATH') || define('LIBRARY_PATH', '/application/library' );
// Application
require_once APPLICATION_PATH . '/application.php';
// Create application and run
$application = new Application();
$application->run();

//echo('<pre>');
// print_r($_SERVER);
// echo('</pre>');
