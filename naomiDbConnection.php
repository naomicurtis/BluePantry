<?php
	require_once ('../app_config.php');
	require_once (APP_ROOT . APP_FOLDER_NAME . '/scripts/errorDisplay.php');
class Database {
	private $db;
	public function __construct($dsn, $userName, $passwd, $myJSFile, $myCSSFile) {
		//create PDO 
		try {
			$this -> db = new PDO($dsn, $userName, $passwd);
		} catch (Exception $e) {
			echoError ($e -> getMessage(), $myJSFile, $myCSSFile);
			exit(1);
		}//catch
	}//constructor

	public function getDB() {
		return ($this -> db);
	}
}//class

?>