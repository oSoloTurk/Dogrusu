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
        var $point;
        var $normalized_email;
        
        function __construct($arr, $isSession = false) {
            $this->id = $arr['_id'] ?? null;
            $this->name = $arr['name'] ?? null;
            $this->username = $arr['username'] ?? null;
            $this->surname = $arr['surname'] ?? null;
            $this->email = $arr['email'] ?? null;
            $this->email_status = $arr['email_status'] ?? null;
            $this->password_hash = $arr['password_hash'] ?? null;
            $this->lockout = $arr['lockout'] ?? null;
            $this->point = $arr['point'] ?? 0;
            $this->normalized_username = $arr['normalized_username'] ?? null;
            $this->normalized_email = $arr['normalized_email'] ?? null;
            if($isSession) $_SESSION["user"] = $this->toJSON();
        }

        function toJSON(){
            $arr = [];
            $arr["_id"]= $this->id ?? null;
            $arr["name"] = $this->name ?? null;
            $arr["username"] = $this->username ?? null;
            $arr["surname"] = $this->surname ?? null;
            $arr["email"] = $this->email ?? null;
            $arr["email_status"] = $this->email_status ?? 0;
            $arr["password_hash"] = $this->password_hash ?? null;
            $arr["lockout"] = $this->lockout ?? null;
            $arr["normalized_username"] = $this->normalized_username ?? strtoupper($arr["username"]);
            $arr["normalized_email"] = $this->normalized_email ?? strtoupper($arr["email"]);
            $arr["point"] = $this->point ?? 0;
            return $arr;
        }

        function toJSONAsIdentitiy(){
            $arr = [];
            if($this->email != null) 
                $arr["email"] = $this->email;
            if($this->password_hash != null) 
                $arr["password_hash"] = $this->password_hash;
           return $arr;
        }
    }

?>