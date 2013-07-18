
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfGroupsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfGroups");
	    $controller->process();
	    $numOfGroups = $context->get("numOfGroups");
	    return $numOfGroups->amount;
	}
}