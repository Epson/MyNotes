
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class removeUserFromGroupAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "removeUserFromGroup");
	    $context->addParam("user_id", $_REQUEST['user_id']);
	    $context->addParam("group_id", $_REQUEST['group_id']);
	    $controller->process();
	}
}