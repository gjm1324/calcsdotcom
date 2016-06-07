<?php

class DbObject {
	protected $modified = false;
    protected $class = 'DbObject';
	
	public function getModified() {
		return $this->modified;
	}
	
	public function setModified($modified=false) {
		$this->modified = $modified;
	}
    
    public function get($field=null) {
        if($field == null)
            return null;
        
        return ($this->$field);
    }
    
    public function getId() {
        return ($this->id);   
    }
    
    public function set($field=null, $val=null) {
        if($field == null)
            return null;
        
        $this->$field = $val;
        $this->modified = true;
    }
    
    public function setId($val) {
        $this->id = $val;
        $this->modified = true;
    }

    public function toJSON(){
        return json_encode(get_object_vars($this));
    }

    public static function JSONtoOBJECT($jsonString){
        $class = self::class;
        $object = new $class(json_decode($jsonString));
        return ($object);
    }
}