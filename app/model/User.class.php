<?php

class User extends DbObject {
    // name of database table
    const DB_TABLE = DB_USER_TABLE;

    // database fields
    protected $id;
    protected $password;
    protected $displayname;
    protected $email;
    protected $class = 'User';

    // constructor
    public function __construct($args = array()) {

        $defaultArgs = array(
            'id' => null,
            'password' => '',
            'email' => null,
            'displayname' => null,
            );

        $args += $defaultArgs;

        $this->id = $args['id'];
        $this->password = $args['password'];
        $this->email = $args['email'];
        $this->displayname = $args['displayname'];
    }

    // save changes to object
    public function save() {
        $db = Db::instance();
        // omit id and any timestamps
        $db_properties = array(
            'password' => $this->password,
            'displayname' => $this->displayname,
			'email' => $this->email
            );
        $db->store($this, __CLASS__, self::DB_TABLE, $db_properties);
    }

    // load object by ID
    public static function loadById($id) {
        $db = Db::instance();
        $obj = $db->fetchById($id, __CLASS__, self::DB_TABLE);
        return $obj;
    }

    // load user by email
    public static function loadByEmailAndPassword($email=null,$password=null) {
        if($email === null)
            return null;

        $query = sprintf(" SELECT id FROM %s WHERE email = '%s' AND password = '%s'",
            self::DB_TABLE,
            $email,
			$password
            );
        $db = Db::instance();
        $result = $db->lookup($query);
        if(!mysqli_num_rows($result))
            return null;
		else {
            $row = mysqli_fetch_assoc($result);
            $obj = self::loadById($row['id']);
            return ($obj);
        }
    }
	
	public static function loadByEmail($email=null) {
        if($email === null)
            return null;

        $query = sprintf(" SELECT id FROM %s WHERE email = '%s'",
            self::DB_TABLE,
            $email
            );
        $db = Db::instance();
        $result = $db->lookup($query);
        if(!mysqli_num_rows($result))
            return null;
		else {
            $row = mysqli_fetch_assoc($result);
            $obj = self::loadById($row['id']);
            return ($obj);
        }
    }

    public static function JSONtoOBJECT($jsonString){
        $class = self::class;
        $array = json_decode($jsonString,true);
        $object = new $class($array);
        return ($object);
    }

    

}
