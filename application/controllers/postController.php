<?php

class PostController extends Controller {

    public $Post;
    
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
        // $this->Post->id = $args[0];
        $post = $this->Post->getPost($args[0]);

        // print_r($post);
        $this->set('post_content', $post['content']);
        $this->set('post_title', $post['title']);
        $this->set('post_image', $post['post_image']);
        $this->set('summary', $post['summary']);
        $this->set('category', $post['category']);
        $this->set('categories', $this->Post->query("SELECT DISTINCT category.id, category.name AS category_name 
                                                        FROM category 
                                                        LEFT JOIN post ON post.category = category.id 
                                                        ORDER BY category_name DESC LIMIT 0,20"));
        //$this->set('url', strip_tags($args[0]));
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
        // error_log('[This]:' . json_encode($this));
        $userLang = getUserLang();
        $cWhere = empty($args[0]) ? '' : ' AND category.name = "' . str_replace('-',' ',strtolower($args[0])) . '" ' ;
        $cSubtitle = $userLang == "en" ? 'Stay informed about our news and insights.' : 'Manténgase informado sobre nuestras noticias y recomendaciones.';
        $this->set('page_header', 'Posts');
        $this->set('page_description', 'Posts');
        $this->set('banner_title', 'Blog');
        $this->set('banner_subtitle', $cSubtitle);
        $this->set('posts',$this->Post->query("SELECT post.id, post.title_seo, post.title, post.summary, post.date, post.status, post.post_image, post.updated_on, post.category, post.lang
                                                FROM post
                                                LEFT JOIN category ON post.category = category.id
                                                WHERE post.status = 1 " . $cWhere . " AND post.lang = 'es' ORDER BY post.updated_on DESC"));
    
        $this->set('categories', $this->Post->query("SELECT DISTINCT category.id, category.name AS category_name 
                                                        FROM category 
                                                        LEFT JOIN post ON post.category = category.id 
                                                        ORDER BY category_name DESC LIMIT 0,20"));
        error_log('[POST LIST CONTROLLER] 1' . $userLang);
    }    
     
    function add() {
        $this->doNotRenderHTML = 1;
        $content    = $_POST['content'];
        $content    = html_entity_decode($content);
        $content    = addslashes($content);
        $title_seo  = strtolower(trim(str_replace("'", "", $_POST['title'])));
        $title_seo  = preg_replace ('/[^\p{L}\p{N}]/u', '-', $title_seo);
        $title_seo  = preg_replace('/__+/', '-', $title_seo);
        $resultPost = $this->Post->insert(['title_seo', 'title', 'content'], [$title_seo, $_POST['title'], $content]);

        if ($resultPost){
            echo json_encode(['result' => $resultPost, 'last_id' => $this->Post->getLastInsertID() ]);
            exit;
        }else{
            error_log('Error saving the quote. [MYSQL ERROR] ' . $this->Post->getError);
            exit;
        }
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
        $post = $this->Post->select($this->Post->id);
        $this->set('post', $post);
        $this->set('categories', $this->Post->getCategories());
    }

    function update($args) {
        $this->doNotRenderHTML = 1;
        //$values = ' title = "'.$_POST['title'].'", content = "'.$_POST['content'].'"';
        $content    = $_POST['content'];
        $summary    = trim($_POST['summary']);
        $content    = html_entity_decode($content);
        $content    = addslashes($content);
        $category   = $_POST['category'];
        error_log('[CATEGORY] ' . $category);
        //$summary    = html_entity_decode($summary);
        //$summary    = addslashes($summary);
        $title_seo  = strtolower(trim(str_replace("'", "", $_POST['title'])));
        $title_seo  = preg_replace ('/[^\p{L}\p{N}]/u', '-', $title_seo);
        $title_seo  = preg_replace('/__+/', '-', $title_seo);
        $values     = ' title = "'.$_POST['title'].'", content = "'.$content.'"';
        $resultPost = $this->Post->update(['title_seo', 'title', 'summary', 'content', 'category', 'lang'], [$title_seo, $_POST['title'], $summary, $content, $category, $_POST['lang']], $_POST['id']);
        
        if ($resultPost){
            echo json_encode(['result' => $resultPost ]);
            exit;
        }else{
            error_log('Error saving the quote. [MYSQL ERROR] ' . $this->Post->getError);
            exit;
        }
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