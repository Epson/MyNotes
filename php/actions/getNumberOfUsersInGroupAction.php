
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfUsersInGroupAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfUsersInGroup");
		$context->addParam("group_id", $_REQUEST['group_id']);
	    $controller->process();
	    $numOfUsersInGroup = $context->get("numOfUsersInGroup");

	    return $numOfUsersInGroup->amount;
	}
}