
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfPublicNotesFromUserAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfPublicNotesFromUser");
		$context->addParam("user_id", $_REQUEST['user_id']);
	    $controller->process();
	    $numOfPublicNotesFromUser = $context->get("numOfPublicNotesFromUser");
	    return $numOfPublicNotesFromUser->amount;
	}
}