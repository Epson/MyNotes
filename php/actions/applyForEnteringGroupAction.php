
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class applyForEnteringGroupAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "login");
	    $context->addParam("username", 'zhaojian');
	    $context->addParam("password", 'zhaojian');
	    $controller->process();

	    $context->addParam("action", "applyForEnteringGroup");
	    $context->addParam("group_id", $_REQUEST['group_id']);
	    $context->addParam("remarks", $_REQUEST['remarks']);
	    $controller->process();
	}
}