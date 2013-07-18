
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNumberOfMyNotesAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNumberOfMyNotes");
		$context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();
	    $numOfMyNotes = $context->get("numOfMyNotes");
	    return $numOfMyNotes->amount;
	}
}