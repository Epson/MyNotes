
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class removeFriendAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "removeFriend");
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $context->addParam("friend_id", $_REQUEST['friend_id']);
	    $controller->process();
	}
}