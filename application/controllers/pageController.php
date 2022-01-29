<?php

class PageController extends Controller {
    
    function beforeAction () {
        // $this->actionScope = 'public';
        $this->setTheme(Application::getConfig('default.theme'));
    } 
 
    function home(){
        $this->actionScope = 'public';
        $Blog              = $this->loadController('Post');
        $blog_feed         = $Blog->Post->query("SELECT post.id, post.title_seo, post.title, post_image, post.updated_on, category.name AS category_name 
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
        $fields = ['name', 'lastname', 'address', 'unit', 'city','state','zipcode','phone', 'email'];
        $values = [$_POST['name'], $_POST['lastname'], $_POST['address'], $_POST['unit'], $_POST['city'], 
                   $_POST['state'], $_POST['zipcode'], $_POST['phone'], $_POST['email']];
        
        $Client       = $this->loadController('Client');
        $Quote        = $this->loadController('Quote');
        $isClient     = $Client->Client->clientExists($_POST['email'], $_POST['phone']);
        $resultClient = false;
        $client_id    = "";
        $billAmount   = $_POST["quote-bill-amount"];

        if (count($isClient) > 0){   
            // Client exists. We update the client and save the quote.
            // TODO: Update Address
            $client_id    = $isClient["id"];
            $resultClient = $Client->Client->update(['name', 'lastname'], [$_POST['name'], $_POST['lastname']], $client_id);
        }else{
            // Client does not exist. We save the client.
            $resultClient = $Client->Client->insert($fields, $values);
            if ($resultClient){
                $client_id = $Client->Client->getLastInsertID();
            }else{
                error_log('Error saving the new client. [MYSQL ERROR] ' . $Client->Client->getError);
                exit;
            }
        }
        if ($resultClient){
            $resultQuote = $Quote->Quote->insert(['client_id', 'bill_amount'], [$client_id, $billAmount]);
            if ($resultQuote){
                echo json_encode(['result' => $resultQuote]);
                exit;
            }else{
                error_log('Error saving the quote. [MYSQL ERROR] ' . $Quote->Quote->getError);
                exit;
            }
        }
        exit;
    }

    function submitContactForm(){
        $this->actionScope = 'public';
        $this->doNotRenderHTML = 1;
        // TODO: Security warning. I need to scape special chars in string vars by using  => mysqli_real_escape_string($string)
        $values       = '"'.$_POST['first_name'].'", "'.$_POST['last_name'].'", "'.$_POST['phone'].'", "'.$_POST['email'].'"';
        $Client       = $this->loadController('Client');
        $Message      = $this->loadController('Message');
        $isClient     = $Client->Client->clientExists($_POST['email'], $_POST['phone']);
        $resultClient = false;
        $client_id    = "";

        if (count($isClient) > 0){   
            // Client exists. We update the client and save the message.
            $client_id    = $isClient["id"];
            $resultClient = $Client->Client->update(['name', 'lastname'], [$_POST['first_name'], $_POST['last_name']], $client_id);
        }else{
            // Client does not exist. We save the client.
            $resultClient = $Client->Client->insert(['name', 'lastname', 'phone', 'email'], [$_POST['first_name'], $_POST['last_name'], $_POST['phone'], $_POST['email']]);
            if ($resultClient){
                $client_id = $Client->Client->getLastInsertID();
            }else{
                error_log('Error saving the new client. [MYSQL ERROR] ' . $Client->Client->getError);
                exit;
            }
        }
        if ($resultClient){
            $resultMessage = $Message->Message->insert(['message', 'client_id'], [$_POST['message'], $client_id]);
            if ($resultMessage){
                echo json_encode(['result' => $resultMessage]);
                exit;
            }else{
                error_log('Error saving the message. [MYSQL ERROR] ' . $Client->Client->getError);
                exit;
            }
            //error_log('[RESULT MESSAGE] :: ' . json_encode($resultMessage));
        }
        exit;
    }
    

    function afterAction() {

    }

}