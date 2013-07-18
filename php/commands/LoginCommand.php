
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class LoginCommand extends Command {
	private function login($username, $password) {
		$db = new DBManager();

		$result = $db->query( "SELECT * FROM `users` WHERE username='$username' AND password='$password'" );

		if( empty($result) ) {
			return null;
		} else {
			$_SESSION['user_id'] = $result[0]->user_id;
			return $result[0];
		}
	}

	function excute(CommandContext $context) {
		$username = $context->get('username');
		$password = $context->get('password');

		define('SALT', $username);
		$encrypted_password = md5(SALT . $password);

		$user_obj = $this->login($username, $encrypted_password);

		if( is_null($user_obj) ) {
			$context->addParam("message", "0");

			return true;
		} else {
			$context->addParam("message", "1");

			return true;
		}	
	}
}

?>
