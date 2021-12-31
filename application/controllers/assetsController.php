<?php

class AssetsController extends Controller {
    
    function beforeAction () {

    }
   
    function view($id = null,$name = null) {
        /*$this->set('page_header', 'Site profile');
        $this->set('page_description', 'Sites');
        $this->set('level_url', 'site/viewall');
        $this->set('level', 'Sites');
        $this->set('profile_img', 
            (file_exists(Application::getConfig('path.public-img').Application::getConfig('path.public-site-img').'/'.$id.'.jpg') 
            ? '/'.Application::getConfig('path.public-img').Application::getConfig('path.public-site-img').'/'.$id.'.jpg' 
            : '/'.Application::getConfig('path.public-img').Application::getConfig('path.public-site-img').'/default.jpg'));
        $this->Site->id = $id;
        $site = @array_shift($this->Site->select($this->Site->id));
        $this->set('site', $site);*/
        // $this->getUserRoles();
    }

    function edit($id = null) {
        $this->Site->id = $id;
        $this->set('page_header','Edit Site');
        $this->set('countries', explode(',',Application::getConfig('country.list')));
        $site = @array_shift($this->Site->select($this->Site->id));
        $this->set('site', $site);
    }

    function update($id = null) {
        // $this->doNotRenderHTML = 1;
        // $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
        //           '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",country="'.$_POST['country'].
        //           '",company_name="'.$_POST['company_name'].'",company_about="'.$_POST['company_about'].
        //           '",budget="'.$_POST['budget'].'",target_audience="'.$_POST['target_audience'].
        //           '",website="'.$_POST['website'].'",webhost_company="'.$_POST['webhost_company'].
        //           '",use_existing_website_content="'.$_POST['use_existing_website_content'].'",intended_domain="'.$_POST['intended_domain'].'"';
        
        // $result = ($this->Site->query('UPDATE site SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? 'true' : 'false' ;
        // //echo('UPDATE site SET '.$values.' WHERE id = "'.$_POST['id'].'"');
        // echo $result;
    }

    function getUserRoles(){
        $this->doNotRenderHTML = 1;
        $this->actionScope = 'public';
        $site = @array_shift($this->Site->select(1));
        return unserialize($site['user_roles'], ['allowed_classes' => false]);
    }
    
    function afterAction() {

    }
}