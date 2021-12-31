<?php

class ProductController extends Controller {
    
    function beforeAction () {
        
    }
 
    function index(){

    }

    function new(){
        $Term_taxonomy = $this->loadController('Term_taxonomy');
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Add New Product');
        $this->set('page_description', 'Add a New Product');
        $this->set('categories', $Term_taxonomy->getRootParents());
    }
    
    function view($id = null,$name = null) {
        $Term_taxonomy = $this->loadController('Term_taxonomy');
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header','Edit Product');
        $this->Product->id = $id;
        $product = @array_shift($this->Product->select($this->Product->id));
        $this->set('product', $product);
        $this->set('categories', $Term_taxonomy->getRootParents());
        $this->set('category_id', $product['category_ids']);
    }
     
    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Products');
        $this->set('todo',$this->Product->selectAll());
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        $slug = $this->slugify($_POST['name'], true); 
        $result = $this->Product->query('SELECT name, COUNT(slug) AS "slug_num" FROM product WHERE name = "'.$_POST['name'].'"');
        $slug_count = array_shift($result);
        
        if ($slug_count['slug_num'] == 0){
            $values = '"'.$_POST['name'].'", "'.$slug.'", "'.$_POST['product_description'].'","'.$_POST['short_description'].
                        '","'.$_POST['price'].'","'.$_POST['regular_price'].'","'.$_POST['sale_price'].'","'.$_POST['category'].'"';
                        //'","{\"category_id\":'.$_POST['category'].'}"';

            $result = ($this->Product->query('INSERT INTO product (name, slug, description, short_description, price, regular_price, sale_price, category_ids) VALUES ('.$values.')', 1) == true ) 
                      ? '{"result":"true", "last_id" : "' . $this->Product->getLastInsertID() . '" }' : '{"result":"false"}' ;
            echo json_encode($result);
        }else{
            $result = '{"result":"slug_already_exists"}';
            echo json_encode($result);
        }
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->Product->query('DELETE FROM product WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($id = null) {
        $Term_taxonomy = $this->loadController('Term_taxonomy');
        $this->doNotRenderContentHeader = 1;
        $this->Product->id = $id;
        $this->set('page_header','Edit Product');
        $product = @array_shift($this->Product->select($this->Product->id));
        $this->set('product', $product);
        $this->set('categories', $Term_taxonomy->getRootParents());
        $this->set('category_id', json_decode($product['category_ids'],true)['category_id']);
    }

    function update($id = null) {
        $this->doNotRenderHTML = 1;
        $slug = $this->slugify($_POST['name'], true);
        $slug_count = 0;
        if ($_POST['name'] !== $_POST['saved_name']){
            $result = $this->Product->query('SELECT name, COUNT(slug) AS "slug_num" FROM product WHERE name = "'.$_POST['name'].'"');
            $slug_count = array_shift($result);
            $slug_count = $slug_count['slug_num'];
        }

        if ($slug_count == 0){
            $values = 'name = "'.$_POST['name'].'", slug = "'.$slug.'", description = "'.$_POST['product_description'].'", short_description = "'.$_POST['short_description'].'", price = "'.$_POST['price'].'", regular_price ="'.$_POST['regular_price'].'", sale_price = "'.$_POST['sale_price'].'", status = "'.$_POST['active'].'", category_ids = "'.$_POST['category'].'"';
            
            $result = ($this->Product->query('UPDATE product SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? '{"result":"true"}' : '{"result":"false"}' ;
            //echo('UPDATE Product SET '.$values.' WHERE id = "'.$_POST['id'].'"');
            echo json_encode($result);
        }else{
            $result = '{"result":"slug_already_exists"}';
            echo json_encode($result);
        }
        //echo $slug_count;
    }

    function compare($slug = null){
        $category_id = 2;
        //$this->doNotRenderContentHeader = 1;
        //$this->doNotRenderHeader = 1;
        //$this->doNotRenderHTML = 1;
        //Setting Hero options
        $result = $this->Product->query('SELECT term.id, term.name, term_taxonomy.parent, term_taxonomy.title, 
                                             term_taxonomy.term_id, term_taxonomy.icon
                                        FROM term
                                        INNER JOIN term_taxonomy ON term.id = term_taxonomy.term_id
                                        WHERE term_taxonomy.parent = ' . $category_id);
        $this->set('hero', $result);
        $this->set('renderContentInline', 1);
        $this->actionScope = 'public';
        $this->setLayout('frontend');
        $result = $this->Product->query('SELECT name AS prod_name, description FROM product WHERE slug = "' .$slug.'"' );
        $product = array_shift($result);
        $this->set('product', $product);
        $this->set('test', 'test');
    }

    function getNumProducts(){
        $this->Product->selectAll();
        //return '13';
    }
    
    function afterAction() {

    }

    /* TODO: put this function in the HTML Helper */
    function slugify($text,$strict = false) {
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        // replace non letter or digits by -
        $text = preg_replace('~[^\\pL\d.]+~u', '-', $text);

        // trim
        $text = trim($text, '-');
        setlocale(LC_CTYPE, 'en_GB.utf8');
        // transliterate
        if (function_exists('iconv')) {
           $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
        }

        // lowercase
        $text = strtolower($text);
        // remove unwanted characters
        $text = preg_replace('~[^-\w.]+~', '', $text);
        if (empty($text)) {
           return 'empty_$';
        }
        if ($strict) {
            $text = str_replace(".", "_", $text);
        }
        return $text;
    }
}