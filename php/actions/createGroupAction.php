
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class createGroupAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "createGroup");
	    $context->addParam("groupName", $_REQUEST['groupName']);
	    $context->addParam("introduction", $_REQUEST['introduction']);
	    $context->addParam("creator",  $_SESSION['user_id']);
	   
	    $controller->process();
	}
}