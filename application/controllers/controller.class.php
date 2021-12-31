<?php

/* 
 *  This class is the base class for all our controllers, our Model class which 
 *  will be used as base class for all our models. It is used for all 
 *  communication between the controller, the model and the view 
 *  (template class). It creates an object for the model class and an object 
 *  for template class. The object for model class has the same name as the 
 *  model itself
 */
class Controller {

    protected $model;
    protected $_controller;
    protected $_action;
    protected $_template;

    public $auth = true;
    public $doNotRenderHeader = 0;
    public $doNotRenderSidebar = 0;
    public $doNotRenderContentHeader = 0;
    public $doNotRenderFooter = 0;
    public $doNotRenderControlSidebar = 1;
    public $doNotRenderHTML = 0;
    public $render;
    public $controllerScope = 'private';
    public $actionScope = 'private';
    public $actionShowsWhenLoggedOut = false;
    public $theme;
            
    function __construct($model, $controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->model = $model;
        $model = ucfirst($model);
        
        $this->doNotRenderHeader = 0;
        $this->render = 1;
        if (isset($model) && $model != '') $this->$model = new $model;
        $this->_template = new Template($controller, $action);
    }
    
    function set($name,$value) {
        $this->_template->set($name,$value);
    }

    function get($name) {
        return $this->$name;
    }

    function setTheme($theme){
        $this->theme = $theme;
    }

    function getSideMenu($elements = null){
        return $this->_template->getSideMenu($elements);
    }

    function loadController($controller) {
        $controllerName = ucfirst($controller).'Controller';
        $model = rtrim($controller, 's');
        $action = "";
        $controller = new $controllerName($model, $controller, $action);
        $controller->render = 0;
        return $controller;
    }
    
    function __destruct() {
        if ($this->render) {
            if ($this->controllerScope == 'public') {
                # all actions will be rendered
                # no login will be required
                $this->_template->render($this->theme, $this->doNotRenderHeader, $this->doNotRenderHTML, 
                                        $this->doNotRenderSidebar, $this->doNotRenderContentHeader, 
                                        $this->doNotRenderFooter, $this->doNotRenderControlSidebar);
            }elseif ($this->controllerScope == 'private') {
                # Actions require login
                # Notice: Some actions might be public 
                if (!session_id()) {@session_start();}
                if (!isset($_SESSION['id']) && $this->actionScope == 'private'){
                    if ($this->_action == 'login'){
                        $this->_template->render($this->theme, $this->doNotRenderHeader, $this->doNotRenderHTML, 
                                                $this->doNotRenderSidebar, $this->doNotRenderContentHeader, 
                                                $this->doNotRenderFooter, $this->doNotRenderControlSidebar);
                    }else{
                        header('Location: /login');
                    }
                } elseif (isset($_SESSION['id']) && $this->actionShowsWhenLoggedOut == true){
                    header('Location: /');
                }else{
                    $this->_template->render($this->theme, $this->doNotRenderHeader, $this->doNotRenderHTML, 
                                             $this->doNotRenderSidebar, $this->doNotRenderContentHeader, 
                                             $this->doNotRenderFooter, $this->doNotRenderControlSidebar);
                }
            }
                
        }
    }
}