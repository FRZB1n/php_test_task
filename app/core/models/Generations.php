<?php

namespace core\models;

use core\services\Connect;


class Generations{
    public $table_name = 'generations';
    public $id;
    public $value;
    public function __construct($id, $value=null)
    {
        $this->id = $id;
        $this->value = $value;
    }

    public function insert_one(){
        if($this->value == null)
            return false;
        
        $db = Connect::getInstanse();
        $sql = "INSERT INTO ".$this->table_name." SET id=:id, value=:value";
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->value= htmlspecialchars(strip_tags($this->value));
        $db->query($sql,
        [
            ":id"=>$this->id,
            ":value"=>$this->value
        ]);

        if(!$db)
            return false;
        else 
            return true;
    }
    public function get_by_id(){
        $db = Connect::getInstanse();
        $sql = "SELECT * FROM ".$this->table_name." WHERE id=:id";
        $one = $db->query(
            $sql,
            [':id'=>$this->id]
        );
        return $one ? $one[0]:null;
    }
    
}