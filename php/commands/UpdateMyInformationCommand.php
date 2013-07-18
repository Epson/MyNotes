
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class UpdateMyInformationCommand extends Command {
	private function updateMyInformation($user_id, $username, $email, $introduction) {
		$db = new DBManager();
		$db->excute( "UPDATE `users` SET username = '$username', email = '$email', introduction = '$introduction' WHERE user_id = '$user_id'" );
	}	

	private function updateMyAvatar($user_id, $avatar) {
		$db = new DBManager();
		$db->excute( "UPDATE `users` SET avatar = '$avatar' WHERE user_id = '$user_id'" );
	}

	function excute(CommandContext $context) {
		$user_id = $context->get("user_id");
		$username = $context->get("username");
		$email = $context->get("email");
		$avatar = $context->get("avatar");
		$introduction = $context->get("introduction");

		$this->updateMyInformation($user_id, $username, $email, $introduction);

		if( !is_null($avatar) ) {
			$this->updateMyAvatar($user_id, $avatar);
		}	
	}
}