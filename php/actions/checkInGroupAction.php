
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class checkInGroupAction extends Action {
	public function takeAction() {
	    $controller = new Controller();
	    $context = $controller->getContext();

		$context->addParam("action", "checkInGroup");
	    $context->addParam("group_id", $_REQUEST['group_id']);
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();

	    $checkResult = $context->get('checkResult');

	    return $checkResult;
	}
}