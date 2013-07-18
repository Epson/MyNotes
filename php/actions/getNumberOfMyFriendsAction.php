
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfMyFriendsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfMyFriends");
		$context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();
	    $numOfMyFriends = $context->get("numOfMyFriends");
	    return $numOfMyFriends->amount;
	}
}