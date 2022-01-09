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
            return "Impossible to load class <b>" . $className . "</b><br>";
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
// function includeTpl2($tplName) {
//     include_once(TEMPLATE_PATH . $tplName);
// }

function timeAgo($date){
    return get_time_ago(strtotime($date));
}

function get_time_ago($time) {
    // Calculate difference between current
    // time and given timestamp in seconds
    $diff     = time() - $time;
    // Time difference in seconds
    $sec     = $diff;
    // Convert time difference in minutes
    $min     = round($diff / 60 );
    // Convert time difference in hours
    $hrs     = round($diff / 3600);
    // Convert time difference in days
    $days     = round($diff / 86400 );
    // Convert time difference in weeks
    $weeks     = round($diff / 604800);
    // Convert time difference in months
    $mnths     = round($diff / 2600640 );
    // Convert time difference in years
    $yrs     = round($diff / 31207680 );
    // Check for seconds
    if($sec <= 60) {
        return "$sec seconds ago";
    }

    // Check for minutes
    else if($min <= 60) {
        if($min==1) {
            return "one minute ago";
        }
        else {
            return "$min minutes ago";
        }
    }

    // Check for hours
    else if($hrs <= 24) {
        if($hrs == 1) { 
            return "an hour ago";
        }
        else {
            return "$hrs hours ago";
        }
    }

    // Check for days
    else if($days <= 7) {
        if($days == 1) {
            return "Yesterday";
        }
        else {
            return "$days days ago";
        }
    }

    // Check for weeks
    else if($weeks <= 4.3) {
        if($weeks == 1) {
            return "a week ago";
        }
        else {
            return "$weeks weeks ago";
        }
    }

    // Check for months
    else if($mnths <= 12) {
        if($mnths == 1) {
            return "a month ago";
        }
        else {
            return "$mnths months ago";
        }
    }

    // Check for years
    else {
        if($yrs == 1) {
            return "one year ago";
        }
        else {
            return "$yrs years ago";
        }
    }
}