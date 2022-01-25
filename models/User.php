<?php 
    use Purekid\Mongodm\Model;

    class User extends Model {
        public static $config = "indeed";
        public static $collection = "user";

        protected static $attrs = array(
            
            '_id' => array('type'=>'objectid'),
            'name' => array('type'=>'string'),
            'surname' => array('type'=>'string'),
            'email' => array('type'=>'string'),
            'email_status' => array('type'=>'string'),
            'password_hash' => array('type'=>'string'),
            'lockout' => array('type'=>'date'),
            'normalized_username' => array('type'=>'string'),
            'normalized_email' => array('type'=>'string')
            
        );
    }

?>