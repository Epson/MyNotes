
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class makeNotesPrivateAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "makeNotesPrivate");
	    $context->addParam("note_id", $_REQUEST['note_id']);

	    $controller->process();
	}
}