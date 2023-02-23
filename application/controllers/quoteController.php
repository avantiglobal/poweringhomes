<?php


class QuoteController extends Controller {

    public $Quote;
    protected $User;
    
    function beforeAction () {
        $this->setTheme(Application::getConfig('default.theme'));
    }
 
    function index(){

    }

    function new(){
        // $this->doNotRenderContentHeader = 1;
        // $this->set('page_header', 'Add New User');
        // $this->set('page_description', 'Add a New User');        
    }
    
    function list() {
        // $this->doNotRenderContentHeader = 1;
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header', 'Quote Requests');
        // $this->set('page_description', 'Posts');
        $this->set('quotes',$this->Quote->getQuoteRequests(1000));
    }

    function view($id = null,$name = null) {
        // $this->doNotRenderContentHeader = 1;
        // $this->set('page_header', 'User profile');
        // $this->set('page_description', 'Songs');
        // $this->set('level_url', 'song/viewall');
        // $this->set('level', 'Songs');
        // $this->User->id = $id;
        // $song = @array_shift($this->User->select($this->User->id));
        // $this->set('song', $song);
        // $this->set('profile_img', file_exists('img/user/'.$user['id'].'.jpg') ? '/img/user/'.$user['id'].'.jpg'  : '/img/user/default.jpg');
    }
     
    function viewall() {
        // $this->doNotRenderContentHeader = 1;
        // $this->set('page_header', 'Songs');
        // $this->set('page_description', 'Songs');
        // $this->set('todo',$this->Song->selectAll());
        // $this->set('song','Lorem Ipsum User');
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
        // $this->doNotRenderHTML = 1;
        // echo ($this->User->query('DELETE FROM song WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
        // //echo 'DELETE FROM song WHERE id = \''.$_POST['id'].'\'';
    }

    function edit($args) {
        $this->doNotRenderFooter = 1;
        $this->set('renderContentInline', 1);
        $this->set('page_header','Edit Quote');
        $this->Quote->id = $args[0];
        $quote = $this->Quote->getQuoteDetails($this->Quote->id);
        $this->set('quote', $quote);
    }

    function update() {
        // $this->doNotRenderHTML = 1;
        // $values = 'name="'.$_POST['name'].'",lastname="'.$_POST['lastname'].'",email="'.$_POST['email'].
        //           '",phone="'.$_POST['phone'].'",address="'.$_POST['address'].'",username="'.$_POST['username'].
        //           '", password="'.hash('md5', $_POST['password']).'"';
        
        // $result = ($this->User->query('UPDATE song SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) 
        //           ? '{"result":"true"}' : '{"result":"false"}' ;
            
        // echo json_encode($result);
    }
    
    function afterAction() {

    }

    function getTotalMessages(){
        // $this->Message->getNumRows();
        // echo "[MESSAGE CONTROLLER][GET TOTAL MESSAGES]";
    }
}