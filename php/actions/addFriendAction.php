
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class addFriendAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "addFriend");
	    $context->addParam("friend_id", $_REQUEST['friend_id']);
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();

	    return $_REQUEST['friend_id'] . " " . $_SESSION['user_id'];
	}
}