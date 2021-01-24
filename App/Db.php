<?php 
namespace App;
/**
 * @author Earl Sabalo
 * 
 * This Class Handles The Connection to the database
 * 
 * @throws PDOException
 */

class Db {


    /**
     * @var string $dbname Database name.
     */
    private $dbname = 'test';

    /**
     * @var string $host Database Host.
     */
    private $host = 'localhost';

     /**
     * @var string $user Database User.
     */
    private $user = 'root';
    
     /**
     * @var string $pass Database Password.
     */
    private $pass = '';

    /**
     * @var string $charset Database Character Set
     */
    private $charset = 'utf8mb4';
    
    function __construct(){
        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset={$this->charset}";
        
        $options = [
            \PDO::ATTR_ERRMODE               =>  \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE    =>  \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES      =>  false,
        ];

        try {
            $connection = new \PDO($dsn, $this->user, $this->pass, $options);
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}
