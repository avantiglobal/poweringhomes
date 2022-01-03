<?php

/* 
 * This file is for common functions on which the application depends on
 */


/** Autoload any classes that are required **/
spl_autoload_register(function($className) {
    if (file_exists(APPLICATION_PATH . '/library/' . strtolower($className) . '.class.php')) {
        require_once(APPLICATION_PATH .  '/library/' . strtolower($className) . '.class.php');
    } else if (file_exists(APPLICATION_PATH .  '/controllers/' .  lcfirst($className) . '.class.php')) {
        require_once(APPLICATION_PATH .  '/controllers/' .  lcfirst($className) . '.class.php');
    } else if (file_exists(APPLICATION_PATH .  '/controllers/' . lcfirst($className) . '.php')) {
        require_once(APPLICATION_PATH .  '/controllers/' . lcfirst($className) . '.php');
    } else if (file_exists(APPLICATION_PATH .  '/models/' . strtolower($className) . '.class.php')) {
        require_once(APPLICATION_PATH .  '/models/' . strtolower($className) . '.class.php');
    } else if (file_exists(APPLICATION_PATH .  '/models/' . strtolower($className) . '.php')) {
        require_once(APPLICATION_PATH .  '/models/' . strtolower($className) . '.php');
    } else if (file_exists(APPLICATION_PATH .  '/views/' . strtolower($className) . '.class.php')) {
        require_once(APPLICATION_PATH .  '/views/' . strtolower($className) . '.class.php');
    } else {
        /* Error Generation Code Here */
        if (file_exists(PUBLIC_PATH . '/assets/themes/404.php')) {
            include (PUBLIC_PATH . '/assets/themes/404.php');
        } else {
            echo "Impossible to load class <b>" . $className . "</b><br>";
        }
    }
});

function routeURL($url) {
    global $routing;
    
    foreach ( $routing as $pattern => $result ) {
        if ( preg_match( $pattern, $url ) ) {
            return preg_replace( $pattern, $result, $url );
        }
    }
    return ($url);
}

function includeTpl($tplName, $variables = array()) {
    extract($variables);
    include_once(TEMPLATE_PATH . $tplName . '.php');
}
function includeTpl2($tplName) {
    include_once(TEMPLATE_PATH . $tplName);
}