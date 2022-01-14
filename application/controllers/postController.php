<?php

class PostController extends Controller {
    
    function beforeAction () {
        $this->actionScope = 'public';
        //$this->setLayout('frontend');
        $this->setTheme(Application::getConfig('default.theme'));
    }
 
    function index(){
        $this->set('page_header', 'Posts');
        $this->set('page_description', 'Posts index post');
        $this->set('intro', 'Post');
        $this->set('content', 'Hello World');
    }

    function new(){
        //$this->doNotRenderControlSidebar = 0;
        // $this->doNotRenderContentHeader = 1;
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header', 'Add New Post');
        $this->set('page_description', 'Add a New Post');
    }
    
    function view($args) {
        $this->actionScope = 'public';
        $this->set('renderContentInline', 1);
        $this->Post->id = $args[0];
        $post = @array_shift($this->Post->select($this->Post->id));

        // print_r($post);
        $this->set('post_content', $post['content']);
        $this->set('post_title', $post['title']);
        $this->set('categories', $this->Post->query("SELECT DISTINCT category.id, category.name AS category_name 
                                                        FROM category 
                                                        LEFT JOIN post ON post.category = category.id 
                                                        ORDER BY category_name DESC LIMIT 0,20"));
    }
     
    function list() {
        // $this->doNotRenderContentHeader = 1;
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header', 'Posts');
        $this->set('page_description', 'Posts');
        $this->set('todo',$this->Post->selectAll());
    }

    function all($args) {
        $cWhere = empty($args[0]) ? '' : ' AND category.name = "' . str_replace('-',' ',strtolower($args[0])) . '"' ;

        $this->set('page_header', 'Posts');
        $this->set('page_description', 'Posts');
        $this->set('banner_title', 'Blog');
        $this->set('banner_subtitle', 'Stay informed about our news and insights.');
        $this->set('posts',$this->Post->query("SELECT post.id, post.title, post.summary, post.date, post.status, post.post_image, post.updated_on, post.category
                                                FROM post
                                                LEFT JOIN category ON post.category = category.id
                                                WHERE post.status = 1 " . $cWhere));
    
        $this->set('categories', $this->Post->query("SELECT DISTINCT category.id, category.name AS category_name 
                                                        FROM category 
                                                        LEFT JOIN post ON post.category = category.id 
                                                        ORDER BY category_name DESC LIMIT 0,20"));
    }    
     
    function add() {
        $this->doNotRenderHTML = 1;
        $content = $_POST['content'];
        $content = html_entity_decode($content);
        $content = addslashes($content);
        $values = '"'.$_POST['title'].'", "'.$content.'"';
        $result = ($this->Post->query('INSERT INTO post (title, content) VALUES ('.$values.')', 1) == true ) 
                    ? '{"result":"true", "last_id" : "' . $this->Post->getLastInsertID() . '" }' : '{"result":"false"}' ;
        //echo $content;
        echo json_encode($result);
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->Post->query('DELETE FROM post WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($args) {
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->Post->id = $args[0];
        $this->set('page_header','Edit Post');
        $post = @array_shift($this->Post->select($this->Post->id));
        $this->set('post', $post);
    }

    function update($args) {
        $this->doNotRenderHTML = 1;
        //$values = ' title = "'.$_POST['title'].'", content = "'.$_POST['content'].'"';
        $content = $_POST['content'];
        $content = html_entity_decode($content);
        $content = addslashes($content);
        $values  = ' title = "'.$_POST['title'].'", content = "'.$content.'"';
        $result  = ($this->Post->query('UPDATE post SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? '{"result":"true"}' : '{"result":"false"}' ;
        //echo('UPDATE post SET '.$values.' WHERE id = "'.$_POST['id'].'"');
        echo json_encode($result);
    }

    function upload_image(){
        $this->doNotRenderHTML = 1;
        $pic     = "data:" . $_FILES['pic']['type'] . ";base64, " . base64_encode(file_get_contents($_FILES['pic']['tmp_name']));
        $result  = $this->Post->query('UPDATE post SET post_image = "' . $pic . '" WHERE id = ' . $_POST['id'] , 1) ;
        if ($result){
            echo $pic;
        }else{
            echo '{"result":"false"}';
        }
    }

    function getNumPosts(){

    }
    
    function afterAction() {

    }
}