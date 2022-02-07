<?php
//echo "Template Class";
class Template {

    protected $variables = array();
    protected $_controller;
    protected $_action;
    protected $_layout;
    protected $_content;
    protected $_user_language;

    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        $this->_user_language = $this->getUserLang();
    }

    function getUserLang(){
        if (Application::getConfig('default.user_lang_mgmt') == "auto"){
            $tplLangs = Application::getConfig('template.languages');
            $userLang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            if (strpos($tplLangs, $userLang)){
                return $userLang;
            }else{
                return Application::getConfig('default.user_language');
            }
        }else{
            // To Do: user lang manual logic
            return Application::getConfig('default.user_language');
        }
    }

    // Set Variables
    function set($name, $value) {
        //echo "TEMPLATE: set(".$name.",".$value.")";
        $this->variables[$name] = $value;
    }

    // Display Template
    function render($theme = 'poweringhomes', $doNotRenderHeader = 0, $doNotRenderHTML = 0, $doNotRenderSidebar = 0, 
                    $doNotRenderContentHeader = 0, $doNotRenderFooter = 0, $doNotRenderControlSidebar = 1) {//TODO: Improve this by getting an array
        
        // HTML helpers
        //$html = new HTML;
        $isUnderConstruction = Application::getConfig('app.under_construction');
        $maintenance         = Application::getConfig('app.maintenance');
        $themePath           = Application::getConfig('path.public-themes');

        if ($isUnderConstruction){
            if (file_exists(PUBLIC_PATH . $themePath.$theme.'/under-construction.php')) {
                include (PUBLIC_PATH . $themePath.$theme.'/under-construction.php');
            }else{
                echo "Website Under Construction";
            }
            return;
        }

        if ($maintenance){
            echo "Website on Maintenance";
            return;
        }
        
        //$renderContentInline           = 0;
        $_content                      = 'Default content';
        // $control_side_open             = ($doNotRenderControlSidebar == 0) ? 'control-side-open' : '';
        // $control_sidebar_toggle_button = ($doNotRenderControlSidebar == 0) ? '' : 'style="display: none;"' ;
        // $control_sidebar_trigger       = ($doNotRenderControlSidebar == 0) ? '<script>$("#sidebar-toggle-button").controlSidebar("Slide")</script>' : '' ;

        extract($this->variables);
        //var_dump($this->variables);

        if ($doNotRenderHTML == 0) {

            if (file_exists(PUBLIC_PATH . $themePath . $theme .'/head.php')) {
                include (PUBLIC_PATH . $themePath . $theme .'/head.php');
            }

            if ($doNotRenderHeader == 0) {
                
                if (file_exists(PUBLIC_PATH . $themePath . $theme .'/'. strtolower($this->_controller) .'/'.$this->_user_language. '/header.php')) {
                    include (PUBLIC_PATH . $themePath . $theme . '/' . strtolower($this->_controller) .'/'. $this->_user_language. '/header.php');
                } else {
                    @include (PUBLIC_PATH . $themePath . $theme .'/'.$this->_user_language.'/header.php');
                }
            }

            // if ($doNotRenderSidebar == 0) {
            //     if (file_exists(PUBLIC_PATH . $themePath.$theme.'/sidebar-menu.php')) {
            //         include (PUBLIC_PATH . $themePath.$theme.'/sidebar-menu.php');
            //     }
            // }

            // Main Content    
            if (file_exists(APPLICATION_PATH.'/views/'.strtolower($this->_controller).'/'.$this->_user_language.'/'.$this->_action.'.php')) {
                include (APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_user_language.'/'.$this->_action.'.php');
            }else{
                echo "<p><br/>&nbsp;The application is trying to show the content of the following file " . 
                        "<b>" .APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_user_language.'/'.$this->_action.'.php</b>' . ", but this file does not exist.</p>";
            }

            if ($doNotRenderFooter == 0) {
                if (file_exists(PUBLIC_PATH . $themePath . $theme .'/'. strtolower($this->_controller) . '/' .$this->_user_language. '/footer.php')) {
                    include (PUBLIC_PATH . $themePath . $theme .'/'.strtolower($this->_controller) . '/' .$this->_user_language. '/footer.php');
                } else {
                    @include (PUBLIC_PATH . $themePath . $theme .'/'.$this->_user_language.'/footer.php');
                }
            }

            if ($doNotRenderControlSidebar == 0) {
                if (file_exists(PUBLIC_PATH . $themePath . $theme.'/control-sidebar.php')) {
                    include (PUBLIC_PATH . $themePath . $theme.'/control-sidebar.php');
                }
            }

            if (file_exists(PUBLIC_PATH . $themePath . $theme.'/foot.php')) {
                include (PUBLIC_PATH . $themePath . $theme.'/foot.php');
            }
        }else{
            
        }
    }//end render()

     //If content is set to render inside 'content-wrapper.php'
    // function renderContentInline(){
    //     if (file_exists(APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_action.'.php')){
    //         extract($this->variables);
    //         include(APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_action.'.php');
    //     }else{
    //         echo "<p><br/>&nbsp;The application is trying to show the content of the following file " . 
    //              "<b>" .APPLICATION_PATH . '/views/' .strtolower($this->_controller).'/'.$this->_action.'.php</b>' . ", but this file does not exist.</p>";
    //     }
    // }

    function getSideMenu($elements){
        $menu = '<ul class="sidebar-menu tree" data-widget="tree" data-spy="affix" data-offset-top="0">
                    <li class="header">LABELS</li>';
        foreach ($elements as $element) {
            $menu .= '<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>'.$element.'</span></a></li>';
        }
        $menu .= '</ul>';
        return $menu;
    }
}