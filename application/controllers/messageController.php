<?php


class MessageController extends Controller {
    
    function beforeAction () {
        //$this->setLayout('frontend');
        $this->set('user_img','/img/user/default.jpg');
        $this->set('user_name', 'John Doe');
        $this->setTheme(Application::getConfig('default.theme'));
    }
 
    function index(){
        $this->set('page_header', 'Songs');
        $this->set('page_description', 'Songs index page');
        $this->set('intro', 'User');
        $this->set('content', 'Hello World');
    }

    function new(){
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Add New User');
        $this->set('page_description', 'Add a New User');        
    }
    
    function view($id = null,$name = null) {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'User profile');
        $this->set('page_description', 'Songs');
        $this->set('level_url', 'song/viewall');
        $this->set('level', 'Songs');
        $this->User->id = $id;
        $song = @array_shift($this->User->select($this->User->id));
        $this->set('song', $song);
        $this->set('profile_img', file_exists('img/user/'.$user['id'].'.jpg') ? '/img/user/'.$user['id'].'.jpg'  : '/img/user/default.jpg');
    }
     
    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Songs');
        $this->set('page_description', 'Songs');
        $this->set('todo',$this->Song->selectAll());
        $this->set('song','Lorem Ipsum User');
    }

    function list() {
        // $this->doNotRenderContentHeader = 1;
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header', 'Messages');
        $this->set('messages',$this->Message->getMessages(1000));
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        $values = '"'.$_POST['name'].'","'.$_POST['lastname'].'","'.$_POST['email'].'","'.$_POST['phone'].'","'.
                      $_POST['address'].'","'.$_POST['username'].'","'.hash('md5', $_POST['password']).'"';
        //$values = $this->User->_link->real_escape_string($values);
        $result = ($this->User->query('INSERT INTO song (name, lastname, email, phone, address, username, password) VALUES ('.$values.')', 1) == true ) 
                  ? '{"result":"true", "last_id" : "' . $this->User->getLastInsertID() . '" }' : '{"result":"false"}' ;
        echo json_encode($result);
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->User->query('DELETE FROM song WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($args) {
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header','Message Details');
        $this->Message->id = $args[0];
        $this->set('message_id',$args[0]);
        $message = $this->Message->getMessageDetails($this->Message->id);
        $this->set('message', $message);
    }

    function update() {
        $this->doNotRenderHTML = 1;
        $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
                    '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",username="'.$_POST['username'].
                    '", password="'.hash('md5', $_POST['password']).'"';
        
        $result = ($this->User->query('UPDATE song SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) 
                    ? '{"result":"true"}' : '{"result":"false"}' ;
            
        echo json_encode($result);
    }

    function setMessageRead($id){
         $this->Message->update(['subject', 'message_read'], ['-','1'], $_POST['id']);
    }
    
    function afterAction() {

    }

    function getTotalMessages(){
        $this->Message->getNumRows();
        echo "[MESSAGE CONTROLLER][GET TOTAL MESSAGES]";
    }
}