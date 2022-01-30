<?php

class Post extends Model {
    
    protected $abstract = true;
    
    public function numRows(){
        return count($this->selectAll());
    }
    
    public function add($arrKeys){
        // Must name the inputs in the contact form like the field names in the table
        $arrValues = array();
        foreach ($arrKeys as $key => $value) {
            array_push($arrValues, $_REQUEST[$value]);
        }

        $strQuery = "INSERT INTO ".$this->_table." (".implode(',', $arrKeys).") VALUES (\"".implode("\",\"", $arrValues)."\")";
        return $this->query($strQuery, true);
    }

    public function getPost($id){
        $strQuery = "SELECT post.id, post.title_seo, post.title, post.summary, post.content, post.post_image, category.name AS category FROM ".$this->_table." 
                    LEFT JOIN category ON ".$this->_table.".category = category.id WHERE (post.id = '".$id."' OR title_seo = '".$id."') ";
        return $this->query($strQuery, true);
    }

    public function getCategories(){
        return $this->query("SELECT * FROM category");
    }

}