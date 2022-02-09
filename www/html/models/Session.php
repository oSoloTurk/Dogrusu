<?php 

    class Session {
        var $id;
        var $userId;
        var $name;
        var $point;
        var $surname;
        var $email;
        
        function __construct($arr) {
            $this->id = $arr['_id'] ?? null;
            $this->userId = $arr['userId'] ?? null;
            $this->name = $arr['name'] ?? null;
            $this->point = $arr['point'] ?? 0;
            $this->surname = $arr['surname'] ?? null;
            $this->email = $arr['email'] ?? null;
            $_SESSION['user'] = $this; 
        }

        function toJSON(){
            $arr = [];
            if($this->id != null) 
                $arr["_id"]= $this->id;
            if($this->userId != null) 
                $arr["userId"]= $this->userId;
            if($this->name != null) 
                $arr["name"] = $this->name;
            if($this->surname != null) 
                $arr["surname"] = $this->surname;
            if($this->email != null) 
                $arr["email"] = $this->email;
            $arr["point"] = $this->point;
            return $arr;
        } 

        function toJSONAsIdentity(){
            $arr = [];
            if($this->id != null) 
                $arr["_id"]= $this->id;
            return $arr;
        }
    }

?>