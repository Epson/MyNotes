
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfMyCommentsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfMyComments");
		$context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();
	    $numOfMyComments = $context->get("numOfMyComments");
	    return $numOfMyComments->amount;
	}
}