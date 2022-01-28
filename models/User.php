<?php 


    class User {
        var $id;
        var $name;
        var $surname;
        var $email;
        var $email_status;
        var $password_hash;
        var $lockout;
        var $normalized_username;
        var $normalized_email;
        
        function __construct($arr) {
            $this->id = $arr['_id'] ?? null;
            $this->name = $arr['name'] ?? null;
            $this->username = $arr['username'] ?? null;
            $this->surname = $arr['surname'] ?? null;
            $this->email = $arr['email'] ?? null;
            $this->email_status = $arr['email_status'] ?? null;
            $this->password_hash = $arr['password_hash'] ?? null;
            $this->lockout = $arr['lockout'] ?? null;
            $this->normalized_username = $arr['normalized_username'] ?? null;
            $this->normalized_email = $arr['normalized_email'] ?? null;
        }

        function toJSON(){
            $arr = [];
            if($this->id != null) 
                $arr["_id"]= $this->id;
            if($this->name != null) 
                $arr["name"] = $this->name;
            if($this->username != null) 
                $arr["username"] = $this->username;
            if($this->surname != null) 
                $arr["surname"] = $this->surname;
            if($this->email != null) 
                $arr["email"] = $this->email;
            if($this->email_status != null) 
                $arr["email_status"] = $this->email_status;
            if($this->password_hash != null) 
                $arr["password_hash"] = $this->password_hash;
            if($this->lockout != null) 
                $arr["lockout"] = $this->lockout;
            if($this->normalized_username != null) 
                $arr["normalized_username"] = $this->normalized_username;
            if($this->normalized_email != null) 
                $arr["normalized_email"] = $this->normalized_email;
            return $arr;
        }

        function toJSONAsIdentitiy(){
            $arr = [];
            if($this->normalized_email != null) 
                $arr["normalized_email"] = $this->normalized_email;
            if($this->password_hash != null) 
                $arr["password_hash"] = $this->password_hash;
           return $arr;
        }
    }

?>