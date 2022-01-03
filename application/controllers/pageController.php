<?php

class PageController extends Controller {
    
    function beforeAction () {
        $this->actionScope = 'public';
        $this->setTheme(Application::getConfig('default.theme'));
        // $this->setLayout(Application::getConfig('default.layout'));
        // $category_id = 2;
        // //$this->doNotRenderHeader = 1;
        // //Setting Hero options
        // $result = $this->Page->query('SELECT term.id, term.name, term_taxonomy.parent, term_taxonomy.title, 
        //                                      term_taxonomy.term_id, term_taxonomy.icon
        //                                 FROM term
        //                                 INNER JOIN term_taxonomy ON term.id = term_taxonomy.term_id
        //                                 WHERE term_taxonomy.parent = ' . $category_id);
        // $this->set('hero', $result);
        //var_dump($result);
    } 
 
    function home(){
        // $this->set('doNotRenderHeader', 1);
        //$this->set('renderContentInline', 1);
    } 

    function compare(){
        //$this->set('doNotRenderContentHeader', 1);
        $this->set('renderContentInline', 1);
        $this->set('text', 'this is a test');
    }
    
    function view($id = null,$name = null) {
        //$this->set('doNotRenderContentHeader', 1);
        //$this->set('renderContentInline', 1);
        $this->Page->id = $id;
        //$this->set('page_header','Edit Page');
        $page = @array_shift($this->Page->select($this->Page->id));
        $this->set('content', $page['content']);
        $this->set('page_title', $page['title']);
    }

    function update_hero(){
        // $this->doNotRenderHTML = 1;
        // $option = isset($_POST['option']) ? $_POST['option'] : 'restricted' ;
        // $result = $this->Page->query('SELECT term_taxonomy.title, term_taxonomy.description
        //                                 FROM term_taxonomy WHERE term_taxonomy.id = ' . $option);
        // $heading = array_shift($result);
        // $result = $this->Page->query('SELECT product.slug, product.name FROM product WHERE product.category_ids = ' . $option);
        // $heading['products'] = $result;
        
        // $heading = json_encode($heading);

        // echo $heading;
    }

    function new(){

    }

    function viewall() {

    }
     
    function add() {

    }
     
    function delete() {

    }

    function edit($id = null) {

    }

    function update($id = null) {

    }

    function getNumPages(){
        /*$this->Page->selectAll();
        return '13';*/
    }

    function thankyou(){
        echo "Thank You";
    }
    
    function contact(){
        $this->set('banner_title', 'Contact');
        $this->set('banner_subtitle', 'Let\'s keep in touch.');
    }

    function areas_served(){
        $this->set('banner_title', 'Areas Served');
        $this->set('banner_subtitle', 'This Is Where We Work.');
    }

    function faqs(){
        $this->set('banner_title', 'FAQ\'s');
        $this->set('banner_subtitle', 'Do you have questions? We hope you can your answers here.');
    }

    function afterAction() {

    }

}