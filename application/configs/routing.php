<?php
global $routing;

/* ROUTING EXAMPLE: 
 * URL: '/items/' => 'items/view/1'
 * Mean: when user types '/items'  the application will execute 'items/view/1' 
 * where 'items' is the controller, 'view' is the action and '1' is the queryString 
 */
$routing = array(
    '/login/' => 'user/login',
    '/thankyou/' => 'page/thankyou',
    '/contact/' => 'page/contact',
    '/areas-served/' => 'page/areas_served',
    '/faqs/' => 'page/faqs',
    '/blog/' => 'post/all',
    '/terms-and-conditions/' => 'page/terms_and_conditions',
    '/privacy/' => 'page/privacy',
    //'/api/' => 'api'
    // '/(.*)/' => 'post/view/\1_',
    // More Examples
    //'/admin\/(.*?)\/(.*?)\/(.*)/' => 'admin/\1_\2/\3',
    
    //'/items/' => 'items/view/2',
    // '/signup/' => 'user/signup',
    //'\/' => 'page',
    //'/template\/(.*?)/' => '/protemplate\/(.*?)/'
    // '/dashboard/' => '/user\/dashboard/',
    /*'/user\/(.*?)\/edit/' => 'user/edit/1_'*/
);