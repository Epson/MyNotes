
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class RegisterCommand extends Command {
	private function register($username, $password, $avatar, $email, $introduction) {

		$db = new DBManager();
		$db->excute( "INSERT INTO `users` VALUES (NULL, '$username', '$password', '$avatar', '$email', '$introduction', false)" );
		$user = $db->query( "SELECT user_id FROM `users` WHERE username = '$username'" );

		if( empty($user) ) {
			return null;
		} else {
			$user_id = $user[0]->user_id;
			$_SESSION['user_id'] = $user_id;

			return $user[0];
		}
	}

	function excute(CommandContext $context) {
		$username = $context->get('username');
		$password = $context->get('password');
		$avatar = $context->get('avatar');
		$email = $context->get('email');
		$introduction = $context->get('introduction');

		define('SALT', $username);
		$encrypted_password = md5(SALT . $password);

		$user_obj = $this->register($username, $encrypted_password, $avatar, $email, $introduction);

		if( is_null($user_obj) ) {
			return false;
		} else {
			$context->addParam("user", $user_obj);

			return true;
		}
	}
}

?>