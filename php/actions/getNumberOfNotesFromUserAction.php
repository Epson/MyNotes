
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfNotesFromUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfNotesFromUser");
		$context->addParam("user_id", $_REQUEST['user_id']);
	    $controller->process();
	    $numOfNotesFromUser = $context->get("numOfNotesFromUser");
	    return $numOfNotesFromUser->amount;
	}
}