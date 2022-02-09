<?php 
    
    class Suggestion{
        var $_id;
        var $suggester;
        var $word;
        var $normalized_word;
        var $description;
        var $time;
        var $status;
        var $votes;
        var $root;

        function __construct($arr) {
            $this->id = $arr['_id'] ?? null;
            $this->suggester = $arr['suggester'] ?? null;
            $this->word = $arr['word'] ?? null;
            $this->description = $arr['description'] ?? null;
            $this->normalized_word = $arr['normalized_word'] ?? null;
            $this->status = $arr['status'] ?? null;
            $this->time = $arr['time'] ?? null;
            $this->root = $arr['root'] ?? null;
            $this->votes = $arr['votes'] ?? null;
        }

        function toJSON(){
            $arr = [];
            if($this->id != null) 
                $arr["_id"]= $this->id;
            if($this->suggester != null) 
                $arr["suggester"] = $this->suggester;
            if($this->word != null) 
                $arr["word"] = $this->word;
            if($this->normalized_word != null) 
                $arr["normalized_word"] = $this->normalized_word;
            if($this->description != null) 
                $arr["description"] = $this->description;
            if($this->status != null) 
                $arr["status"] = $this->status;
            if($this->time != null) 
                $arr["time"] = $this->time;
            $arr["votes"] = $this->votes ?? [];
            $arr["root"] = $this->root;
            return $arr;
        }

        
        function toJSONAsIdentity(){
            $arr = [];
            if($this->normalized_word != null) 
                $arr["normalized_word"] = $this->normalized_word;
            return $arr;
        }
    }

?>