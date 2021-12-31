<?php

class Term_taxonomyController extends Controller {
    
    function beforeAction () {

    }
 
    function index(){

    }

    function new(){

    }
    
    function view($id = null,$name = null) {

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

    function getRootParents(){
        $this->doNotRenderHTML = 1;
        $result = $this->Term_taxonomy->query("SELECT term.id, term.name AS term_name, term_taxonomy.id AS termtax_id, term_taxonomy.term_id
                                                FROM term
                                                INNER JOIN term_taxonomy 
                                                WHERE term.id = term_taxonomy.term_id AND term_taxonomy.parent = 2");
        return $result;
    }
    
    function afterAction() {

    }
}