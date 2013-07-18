
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfUsersAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfUsers");
	    $controller->process();
	    $numOfUsers = $context->get("numOfUsers");

	    return $numOfUsers->amount;
	}
}