<?php 
    
    namespace oSoloTurk\Indeed\Model;

    use Purekid\Mongodm\Model;

    class Suggestion extends Model {
        public static $config = "indeed";
        public static $collection = "suggestions";

        protected static $attrs = array(
            
            '_id' => array('type'=>'objectid'),
            'suggester' => array('model'=>'oSoloTurk\Indeed\Model\User','type'=>'reference'),
            'word' => array('type'=>'string'),
            'normalized_word' => array('type'=>'string'),
            'root' => array('model'=>'oSoloTurk\Indeed\Model\Suggestion','type'=>'reference')
            
        );
    }

?>