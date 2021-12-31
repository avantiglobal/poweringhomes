<?php

class TermController extends Controller {
    
    function beforeAction () {

    }
 
    function index(){

    }

    function new(){
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Add New Term');
    }
    
    function view($id = null,$name = null) {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Edit Term');
        $this->Term->id = $id;
        $term = @array_shift($this->Term->select($this->Term->id));
        $this->set('term', $term);
    }
     
    function viewall() {
        $this->doNotRenderContentHeader = 1;
        $this->set('page_header', 'Terms');
        $this->set('page_description', 'Terms');
        $this->set('todo',$this->Term->selectAll());
    }
     
    function add() {
        $this->doNotRenderHTML = 1;
        
        $result = $this->Term->query('SELECT COUNT(id) AS "term_count" FROM term WHERE name = "'.$_POST['name'].'"');
        $term = array_shift($result);
        
        if ($term['term_count'] == 0){
            $values = '"'.$_POST['name'].'"';
            $result = ($this->Term->query('INSERT INTO term (name) VALUES ('.$values.')', 1) == true ) 
                      ? '{"result":"true", "last_id" : "' . $this->Term->getLastInsertID() . '" }' : '{"result":"false"}' ;
            echo json_encode($result);
        }else{
            $result = '{"result":"term_already_exists"}';
            echo json_encode($result);
        }
    }
     
    function delete() {
        $this->doNotRenderHTML = 1;
        echo ($this->Term->query('DELETE FROM term WHERE id = \''.$_POST['id'].'\'', 1)) ? 'true' : 'false';
    }

    function edit($id = null) {
        $this->doNotRenderContentHeader = 1;
        $this->Term->id = $id;
        $this->set('page_header','Edit Term');
        $term = @array_shift($this->Term->select($this->Term->id));
        $this->set('term', $term);
    }

    function update($id = null) {
        $this->doNotRenderHTML = 1;
        $term_count = 0;
        if ($_POST['name'] !== $_POST['saved_name']){
            $result = $this->Term->query('SELECT COUNT(id) AS "term_count" FROM term WHERE name = "'.$_POST['name'].'"');
            $term_count = array_shift($result);
            $term_count = $term_count['term_count'];
        }
        //echo $term_count;

        if ($term_count == 0){
            $name = $_POST['name'];
            $name = html_entity_decode($name);
            $name = addslashes($name);

            $values = 'name = "'.$name.'", status = "'.$_POST['active'].'"';
            
            $result = ($this->Term->query('UPDATE term SET '.$values.' WHERE id = "'.$_POST['id'].'"', 1) == true ) ? '{"result":"true"}' : '{"result":"false"}' ;
            //echo('UPDATE rerm SET '.$values.' WHERE id = "'.$_POST['id'].'"');
            echo json_encode($result);
        }else{
            $result = '{"result":"term_already_exists"}';
            echo json_encode($result);
        }
    }

    function getNumTerms(){
        $this->Term->selectAll();
        return '13';
    }
    
    function afterAction() {

    }
}