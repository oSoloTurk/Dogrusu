<?php 

    class Setting {
        var $id;
        var $settings_name;
        var $normalized_settings_name;
        var $value;
        
        function __construct($arr) {
            $this->id = $arr['_id'] ?? null;
            $this->settings_name = $arr['settings_name'] ?? null;
            $this->normalized_settings_name = $arr['normalized_settings_name'] ?? null;
            $this->value = $arr['value'] ?? null;
        }

        function toJSON(){
            $arr = [];
            if($this->id != null) 
                $arr["_id"]= $this->id;
            if($this->settings_name != null) 
                $arr["settings_name"]= $this->settings_name;
            if($this->normalized_settings_name != null) 
                $arr["normalized_settings_name"] = $this->normalized_settings_name;
            if($this->value != null) 
                $arr["value"] = $this->value;
            return $arr;
        } 

        function toJSONAsIdentity(){
            $arr = [];
            if($this->normalized_settings_Name != null) 
                $arr["normalized_settings_Name"]= $this->normalized_settings_Name;
            return $arr;
        }
    }

?>