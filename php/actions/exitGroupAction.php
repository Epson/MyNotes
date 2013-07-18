
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class exitGroupAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();
	
	    $context->addParam("action", "exitGroup");
	    $context->addParam("group_id", $_REQUEST['group_id']);
	    $context->addParam("user_id", $_SESSION['user_id']);
	    
	    $controller->process();
	}
}