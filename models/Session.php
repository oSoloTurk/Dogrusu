<?php 

    class Session {
        var $id;
        var $name;
        var $surname;
        var $email;
        
        function __construct($arr) {
            $this->id = $arr['_id'] ?? null;
            $this->name = $arr['name'] ?? null;
            $this->surname = $arr['surname'] ?? null;
            $this->email = $arr['email'] ?? null;
            $_SESSION['user'] = $this; 
        }

        function toJSON(){
            $arr = [];
            if($this->id != null) 
                $arr["_id"]= $this->id;
            if($this->name != null) 
                $arr["name"] = $this->name;
            if($this->surname != null) 
                $arr["surname"] = $this->surname;
            if($this->email != null) 
                $arr["email"] = $this->email;
            return $arr;
        }
    }

?>