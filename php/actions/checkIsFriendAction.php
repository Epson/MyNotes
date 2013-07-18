
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class checkIsFriendAction extends Action {
	public function takeAction() {
	    $controller = new Controller();
	    $context = $controller->getContext();

		$context->addParam("action", "checkIsFriend");
	    $context->addParam("friend_id", $_REQUEST['friend_id']);
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();

	    $checkResult = $context->get('checkResult');

	    return $checkResult;
	}
}