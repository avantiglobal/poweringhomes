<?php
//echo "<br />Entra en userController.php <br />";

class UserController extends Controller {
    
    function beforeAction () {
        $this->actionScope = 'public';
        //$this->setLayout('frontend');
        $this->setTheme('poweringhomes');
        $this->set('user_img','/img/user/default.jpg');
        // $this->set('user_name', 'John Doe');
        //$this->set('sidebar_menu', '      ');
    }

    function index(){
        $this->set('page_header', 'Users');
        $this->set('page_description', 'Users index page');
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
        $this->set('page_description', 'Users');
        $this->set('level_url', 'user/viewall');
        $this->set('level', 'Users');
        $this->User->id = $id;
        $user = @array_shift($this->User->select($this->User->id));
        $this->set('user', $user);
        $this->set('profile_img', file_exists('img/user/'.$user['id'].'.jpg') ? '/img/user/'.$user['id'].'.jpg'  : '/img/user/default.jpg');
    }

    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Users');
        $this->set('page_description', 'Users');
        $this->set('todo',$this->User->selectAll());
        $this->set('user','Lorem Ipsum User');
    }

    function add() {
        $this->doNotRenderHTML = 1;
        $values = '"'.$_REQUEST['name'].'","'.$_REQUEST['lastname'].'","'.$_REQUEST['email'].'","'.$_REQUEST['phone'].'","'.
                      $_REQUEST['address'].'","'.$_REQUEST['username'].'","'.hash('md5', $_REQUEST['password']).'"';
        //$values = $this->User->_link->real_escape_string($values);
        $result = ($this->User->query('INSERT INTO user (name, lastname, email, phone, address, username, password) VALUES ('.$values.')', 1) == true ) 
                  ? '{"result":"true", "last_id" : "' . $this->User->getLastInsertID() . '" }' : '{"result":"false"}' ;
        echo json_encode($result);
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->User->query('DELETE FROM user WHERE id = \''.$_REQUEST['id'].'\'', 1)) ? 'true' : 'false';
        //echo 'DELETE FROM user WHERE id = \''.$_REQUEST['id'].'\'';
    }

    function edit($id = null) {
        $this->doNotRenderContentHeader = 1;
        $this->User->id = $id;
        $this->set('page_header','Edit User');
        $user = @array_shift($this->User->select($this->User->id));
        $this->set('user', $user);
    }

    function update() {
        $this->doNotRenderHTML = 1;
        $values = 'name="'.$_REQUEST['name'].'",lastname="'.$_REQUEST['lastname'].'",email="'.$_REQUEST['email'].
                  '",phone="'.$_REQUEST['phone'].'",address="'.$_REQUEST['address'].'",username="'.$_REQUEST['username'].
                  '", password="'.hash('md5', $_REQUEST['password']).'"';
        
        $result = ($this->User->query('UPDATE user SET '.$values.' WHERE id = "'.$_REQUEST['id'].'"', 1) == true ) 
                    ? '{"result":"true"}' : '{"result":"false"}' ;
            
        echo json_encode($result);
    }

    function login(){
        $this->actionShowsWhenLoggedOut = true; // We only show this action if the user is not logged in
        //$this->set('renderContentInline', 1);
        // $this->doNotRenderSidebar = 1;
        // $this->doNotRenderHeader = 1;
        // $this->doNotRenderFooter = 1;
        // $this->doNotRenderContentHeader = 1;
    }

    function signup(){
        $this->actionScope = 'public';
        $this->actionShowsWhenLoggedOut = true;
        $this->set('renderContentInline', 1);
    }

    function submitSignupForm(){
        $this->actionScope = 'public';
        $this->doNotRenderHTML = 1;
        //Validate the email
        $emailExists  = $this->User->emailExists($_REQUEST['email']);
        
        if (!$emailExists){
            $arrKeys      = array('name', 'lastname', 'email', 'password', 'recruiter', 'company', 'linkedin'); // Must name the form inputs like the field names in the table
            $userResponse = $this->User->signup($arrKeys);
            if ($userResponse){
                $this->auth();
            }
            echo $userResponse;
        }else{
            echo 'invalidEmail';
        }
    }

    function auth(){
        $this->doNotRenderHTML = 1;
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : '';
        $password = hash('md5',$_REQUEST['password']);
        $result   = ($this->User->query('SELECT * FROM user WHERE (username = "'.$username.'" OR email="'.$username.'") AND password = "'.$password.'"'));
        

        if (count($result) > 0){            
            session_start();
            error_log(json_encode($result));
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['fullname'] = $result[0]['name'] . ' ' . $result[0]['lastname'];
            $_SESSION['username'] = $username;
            $_SESSION['datein'] = $result[0]['date_in'];
            $_SESSION['email'] = $result[0]['email'];
            $_SESSION['type'] = $result[0]['type'];
            $_SESSION['side_menu'] = $this->getMenu('master');
            $_SESSION['profile_img'] = file_exists(Application::getConfig('path.public-img') . Application::getConfig('path.public-user-img') . '/' . $_SESSION["id"].'.jpg') 
                ? '/'.Application::getConfig('path.public-img') . Application::getConfig('path.public-user-img') . '/' . $_SESSION["id"].'.jpg' 
                : '/'.Application::getConfig('path.public-img') . Application::getConfig('path.public-user-img') . '/' . Application::getConfig('default.profile_image') ;

            echo "true";
        }else{
            echo "false";
        };
    }

    function logout(){
        if (!session_id()){
            session_start();
            $_SESSION = array();
            session_destroy();
            echo 'true';
        }
    }

    function dashboard(){
        $this->set('page_header', 'Dashboard 1');
        $this->doNotRenderFooter = 1;
        // $this->set('renderContentInline', 1);
        
        // $this->User->selectAll();
        // $this->set('num_users',$this->User->getNumRows());
        // $Client = $this->loadController('Client');
        // $this->set('num_clients',$Client->Client->numRows());
        $Message = $this->loadController('Message');
        $this->set('messages_total',$Message->Message->numRows());
        // $Proposal = $this->loadController('Proposal');
        // $this->set('num_proposals',$Proposal->Proposal->numRows());
    }

    function getMenu($userType = 'master'){
        $this->doNotRenderHTML = 1;
        $this->actionScope = 'public';
        $Site = $this->loadController('Site');
        $user_roles = $Site->getUserRoles();
        $menu = $user_roles[$userType]['menu'];
        return $menu;
    }

    function submitContactForm(){
        $this->doNotRenderHTML = 1;

        $Message     = $this->loadController('Message');
        $arrKeys     = array('name', 'email', 'subject', 'message'); // Must name the inputs in the form like the field names in the table
        $msgResponse = $Message->Message->add($arrKeys);

        $to      = Application::getConfig('company.email');
        $subject = "Message from " . Application::getConfig('company.name') . " website";

        $message = "
                    <html>
                        <head>
                            <title>" . Application::getConfig('company.name') . " - New Message</title>
                        </head>
                        <body>
                            <p>You've got a new message from</p>
                            <table>
                                <tr>
                                    <td>".$_REQUEST["name"]."</td>
                                </tr>
                                <tr>
                                    <td>".$_REQUEST["email"]."</td>
                                </tr>
                                <tr>
                                    <td>Subject: ".$_REQUEST["subject"]."</td>
                                </tr>
                                <tr>
                                    <td>".$_REQUEST["message"]."</td>
                                </tr>
                            </table>
                        </body>
                    </html>
                    ";

        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <'.Application::getConfig('company.email').'>' . "\r\n";
        $headers .= 'Cc: avantiglobals@gmail.com' . "\r\n";

        $mailResponse = mail($to,$subject,$message,$headers);
        $response = ($msgResponse && $mailResponse) ? '1' : '0';
        echo $response;
        // error_log("SUBMIT CONTACT FORM . Response: " . $response);
    }

    
    
    function afterAction() {

    }
}