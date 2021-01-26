<?php 
/**
 * @author Earl Sabalo
 * 
 * This is the base Middleware Class
 * 
 * This is where you add logics and flow to your middleware validations.
 * 
 * @throws App\Exceptions\MiddlewareException;
 * 
 * @return bool true if the token matches with the tokens stored in 
 *              the database.
 */
namespace App;
use App\Db;
use App\Exceptions\MiddlewareException;

class Middleware {
	function __construct() {
		$this->token = $_SERVER['PHP_AUTH_DIGEST'];
		return $this->validate($this->token);
	}

    /**
     * This function compares/validates the token from the header and database
     * 
     * @param string $token can be get from Authentication Header.
     * 
     * @return bool
     */
	private function validate($token) {
		$db = new Db();
		$db->prepare('SELECT * FROM tokens WHERE token = ?');
		$db->execute([$this->token]);
		$db_token = $db->fetch();

		if(!empty($db_token)) {
			if($db_token['token'] === $this->token){
				return true;
			}
		}
		return false;
	}
}