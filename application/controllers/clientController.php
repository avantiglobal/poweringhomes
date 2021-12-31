<?php

class ClientController extends Controller {
    
    function beforeAction () {

    }
 
    function index(){
        $this->set('page_header', 'Clients');
        $this->set('page_description', 'Clients index page');
        $this->set('intro', 'Client');
        $this->set('content', 'Hello World');
    }

    function new(){
        $this->set('page_header', 'Add New Client');
        $this->set('page_description', 'Add a New Client');
        $this->set('countries', explode(',',Application::getConfig('country.list')));
    }
    
    function view($id = null,$name = null) {
        $this->set('page_header', 'Client profile');
        $this->set('page_description', 'Clients');
        $this->set('level_url', 'client/viewall');
        $this->set('level', 'Clients');
        $this->set('profile_img', 
            (file_exists(Application::getConfig('path.public-img').Application::getConfig('path.public-client-img').'/'.$id.'.jpg') 
            ? '/'.Application::getConfig('path.public-img').Application::getConfig('path.public-client-img').'/'.$id.'.jpg' 
            : '/'.Application::getConfig('path.public-img').Application::getConfig('path.public-client-img').'/default.jpg'));
        $this->Client->id = $id;
        $client = @array_shift($this->Client->select($this->Client->id));
        $this->set('client', $client);
    }
     
    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Clients');
        $this->set('page_description', 'Clients');
        $this->set('todo',$this->Client->selectAll());
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        $website = (empty($_POST['intended_domain'])) ? $_POST['website'] : '';
        $webhost_company = (empty($_POST['intended_domain'])) ? $_POST['webhost_company'] : '';
        $values = '"'.$_POST['name'].'","'.$_POST['lastname'].'","'.$_POST['email'].'","'.$_POST['phone'].'","'.
                      $_POST['address'].'","'.$_POST['country'].'","'.$_POST['company_name'].'","'.$_POST['company_about'].'","'.
                      $_POST['budget'].'","'.$_POST['target_audience'].'","'.$website.'","'.$webhost_company.'","'.
                      $_POST['use_existing_website_content'].'","'.$_POST['intended_domain'].'"';

        $result = ($this->Client->query('INSERT INTO client (name, lastname, email, phone, address, country, company_name, company_about, budget, target_audience, website, webhost_company, use_existing_website_content, intended_domain) VALUES ('.$values.')', 1) == true ) 
                  ? '{"result":"true"}' : '{"result":"false"}' ;
        
        if ($_POST['modal_source'] == 'true' && $result == '{"result":"true"}'){
            $result = '{"result":"true", "client_id":"'.$this->Client->getLastInsertID().'", "client_name":"'.$_POST['name'].' '.$_POST['lastname'].'"}';
        }
        echo json_encode($result);
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->Client->query('DELETE FROM client WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($id = null) {
        $this->Client->id = $id;
        $this->set('page_header','Edit Client');
        $this->set('countries', explode(',',Application::getConfig('country.list')));
        $client = @array_shift($this->Client->select($this->Client->id));
        $this->set('client', $client);
    }

    function update($id = null) {
        $this->doNotRenderHTML = 1;
        $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
                  '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",country="'.$_POST['country'].
                  '",company_name="'.$_POST['company_name'].'",company_about="'.$_POST['company_about'].
                  '",budget="'.$_POST['budget'].'",target_audience="'.$_POST['target_audience'].
                  '",website="'.$_POST['website'].'",webhost_company="'.$_POST['webhost_company'].
                  '",use_existing_website_content="'.$_POST['use_existing_website_content'].'",intended_domain="'.$_POST['intended_domain'].'"';
        
        $result = ($this->Client->query('UPDATE client SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? 'true' : 'false' ;
        //echo('UPDATE client SET '.$values.' WHERE id = "'.$_POST['id'].'"');
        echo $result;
    }

    function getNumClients(){
        $this->Client->selectAll();
        return '13';
    }
    
    function afterAction() {

    }
}