
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class findUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "findUser");
	    $context->addParam("username", $_REQUEST['username']);
	    $controller->process();
	}
}