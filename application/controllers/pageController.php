<?php

class PageController extends Controller {
    
    function beforeAction () {
        // $this->actionScope = 'public';
        $this->setTheme(Application::getConfig('default.theme'));
    } 
 
    function home(){
        $this->actionScope = 'public';
        $Blog              = $this->loadController('Post');
        $blog_feed         = $Blog->Post->query("SELECT post.id, post.title, post_image, post.updated_on, category.name AS category_name 
                                                    FROM post 
                                                    LEFT JOIN category ON post.category = category.id 
                                                    ORDER BY post.updated_on 
                                                    DESC LIMIT 0,3");
        $this->set('blog_feed', $blog_feed);
    } 

    function compare(){
        // $this->actionScope = 'public';
        $this->set('renderContentInline', 1);
        $this->set('text', 'this is a test');
    }
    
    function view($id = null,$name = null) {
        $this->actionScope = 'public';
        $this->Page->id = $id;
        //$this->set('page_header','Edit Page');
        $page = @array_shift($this->Page->select($this->Page->id));
        $this->set('content', $page['content']);
        $this->set('page_title', $page['title']);
    }

    function new(){
        $this->set('page_header', 'Add New Page');
    }

    function list() {
        // $this->doNotRenderContentHeader = 1;
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header', 'Pages');
        $this->set('page_description', 'Pages');
        $this->set('pages',$this->Page->selectAll());
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        $content = $_POST['content'];
        $content = html_entity_decode($content);
        $content = addslashes($content);
        $values  = '"'.$_POST['title'].'", "'.$content.'"';
        $result  = ( $this->Page->query('INSERT INTO page (title, content) VALUES ('.$values.')', 1) == true ) 
                   ? '{"result":"true", "last_id" : "' . $this->Page->getLastInsertID() . '" }' : '{"result":"false"}' ;
        //echo $content;
        echo json_encode($result);
    }
     
    function delete() {

    }

    function edit($id = null) {
        $this->doNotRenderFooter = 1;
        $this->Page->id = $id;
        $this->set('page_header','Edit Page');
        $page = @array_shift($this->Page->select($this->Page->id));
        $this->set('page', $page);
    }

    function update($id = null) {
        $this->doNotRenderHTML = 1;
        //$values = ' title = "'.$_POST['title'].'", content = "'.$_POST['content'].'"';
        $content = $_POST['content'];
        $content = html_entity_decode($content);
        $content = addslashes($content);
        $values = ' title = "'.$_POST['title'].'", content = "'.$content.'"';
        $result = ($this->Page->query('UPDATE page SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? '{"result":"true"}' : '{"result":"false"}' ;
        //echo('UPDATE post SET '.$values.' WHERE id = "'.$_POST['id'].'"');
        echo json_encode($result);
    }

    function getNumPages(){
        /*$this->Page->selectAll();
        return '13';*/
    }

    function thankyou(){
        $this->actionScope = 'public';
        echo "Thank You";
    }
    
    function contact(){
        $this->actionScope = 'public';
        $this->set('banner_title', 'Contact');
        $this->set('banner_subtitle', 'Get in touch.');
    }

    function areas_served(){
        $this->actionScope = 'public';
        $this->set('banner_title', 'Areas Served');
        $this->set('banner_subtitle', 'This Is Where We Work.');
    }

    function faqs(){
        $this->actionScope = 'public';
        $this->set('banner_title', 'FAQ\'s');
        $this->set('banner_subtitle', 'Do you have questions? We hope you can your answers here.');
    }

    function submit_quote(){
        $this->actionScope = 'public';
        $this->doNotRenderHTML = 1;
        $values = '"'.$_POST['name'].'", "'.$_POST['lastname'].'", "'.$_POST['address'].'", "'.$_POST['unit'].'", ' .
                    '"'.$_POST['city'].'", "'.$_POST['state'].'", "'.$_POST['zipcode'].'", "'.$_POST['phone'].'", ' .
                    '"'.$_POST['email'].'"';
        // $content = $_POST['content'];
        // $content = html_entity_decode($content);
        // $content = addslashes($content);
        $Client  = $this->loadController('Client');
        $result  = ($Client->Client->query('INSERT INTO client (name, lastname, address, unit, city, state, zipcode, phone, email) 
                                            VALUES (' . $values . ')', 1) == true ) 
                                            ? '{"result":"true"}' 
                                            : '{"result":"false"}' ;
        
        echo json_encode($result);
    }
    function submitContactForm(){
        $this->actionScope = 'public';
        $this->doNotRenderHTML = 1;
        
        $values   = '"'.$_POST['first_name'].'", "'.$_POST['last_name'].'", "'.$_POST['phone'].'", "'.$_POST['email'].'"';
        $Client   = $this->loadController('Client');
        // $clientID = $Client->Client->clientExists($_POST['email'], $_POST['phone']);

        // if ($clientID == false){
            $result  = $Client->Client->query('INSERT INTO client (name, lastname, phone, email) VALUES (' . $values . ')', 1)  ;
            echo json_encode($result);
            exit;
        // }
        // else{
        //     $result  = ($Client->Client->query('UPDATE client SET name = "'.$_POST['first_name'].'", lastname = "'.$_POST['last_name'].'" WHERE id = ' . $clientID, 1) == true ) 
        //                                         ? '{"result":"true"}' 
        //                                         : '{"result":"false"}';
        //     echo json_encode($result);
        // }
    }
    

    function afterAction() {

    }

}