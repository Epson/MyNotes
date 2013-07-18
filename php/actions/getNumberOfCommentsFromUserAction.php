
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfCommentsFromUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfCommentsFromUser");
		$context->addParam("user_id", $_REQUEST['user_id']);
	    $controller->process();
	    $numOfCommentsFromUser = $context->get("numOfCommentsFromUser");
	    return $numOfCommentsFromUser->amount;
	}
}