<?php
/**
 * This will be the main server configuration file.
 * Where to begin??
 * By following the mindmap mutall seems to be the root of all objects.
 * 
 * ###QUERIES###
 * What is it that the mutall object contains? properties? methods? inquire more
 * There is this pattern where if you create a php object there is a corresponding 
 * object in javascript. Inqure more on this 
 * 
 * 
 */

/**
 * Create a class mutall.
 * This will be the parent of all other objects.
 * Properties and methods are not yet known.  
 */
class Mutall {

    public function __construct() {
        
    }

}

/**
 * Create a class dbase that extends mutall 
 * This class mai task will be to create a coonnection to the database
 */
//require the config file
require "config/config.php";
class Dbase extends Mutall {
//declare my variables
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $dbname = DB_NAME;
    private $conn;
    private $statement;
    private $error;
    
    public function __construct() {
        parent::__construct();

        // Set DSN
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        // Create PDO instance
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    /**
     * method for checking an sql. Thro an error if it is invalid otherwise 
     * return it
     * @param String $sql Description
     */
    public function chk_sql($sql) {
        return $sql;
    }
    
    /**
     * method for querying and sql.
     * The sql should be checked first 
     * @param String $sql Description
     */
    public function query($sql) {
        $sql = $this->chk_sql($sql);
        $this->statement = $this->conn->query($sql);
    }
    
    //dump the resultset. FOr testing
    public function result() {
        $this->statement->execute();
        return $this->statement->fetchAll();
    }
 }
 
 /**
  * Create a page class where all other objects will inherit from
  * From my understanding a page class represents a webpage 
  */
class Page extends Dbase{
    public function functionName() {
        parent::__construct();
    }
}

/**
 * Invoice class 
 */
class Invoice extends Page{
    public function __construct() {
        parent::__construct();
    }
}