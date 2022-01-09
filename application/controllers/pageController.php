<?php

class PageController extends Controller {
    
    function beforeAction () {
        // $this->actionScope = 'public';
        $this->setTheme(Application::getConfig('default.theme'));
    } 
 
    function home(){
        $this->actionScope = 'public';
    } 

    function compare(){
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

    function update_hero(){
        // $this->doNotRenderHTML = 1;
        // $option = isset($_PAGE['option']) ? $_PAGE['option'] : 'restricted' ;
        // $result = $this->Page->query('SELECT term_taxonomy.title, term_taxonomy.description
        //                                 FROM term_taxonomy WHERE term_taxonomy.id = ' . $option);
        // $heading = array_shift($result);
        // $result = $this->Page->query('SELECT product.slug, product.name FROM product WHERE product.category_ids = ' . $option);
        // $heading['products'] = $result;
        
        // $heading = json_encode($heading);

        // echo $heading;
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
        $this->set('banner_subtitle', 'Let\'s keep in touch.');
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

    function afterAction() {

    }

}