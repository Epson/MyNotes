
<?php

class CommandNotFoundException extends Exception {

}

class CommandFactory {
	private static $dir = "commands";

	static function getCommand($action = "Default") {
		// if( preg_match('/\w/', $action) ) {
		// 	throw new Exception("illegal characters in action");
		// }
		
		$class = ucfirst($action)."Command";
		$file = self::$dir . DIRECTORY_SEPARATOR . $class . ".php";

		if( !file_exists(dirname(__FILE__) . DIRECTORY_SEPARATOR . $file) ) {
			throw new CommandNotFoundException("Could not find '$file'");
		}

		require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . $file);
		
		// if( !class_exists($file) ) {
		// 	throw new CommandNotFoundException("No '$class class located");
		// }

		$cmd = new $class();
		return $cmd;
	}
}	

?>