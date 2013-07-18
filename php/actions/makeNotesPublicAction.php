
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class makeNotesPublicAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "makeNotesPublic");
	    $context->addParam("note_id", $_REQUEST['note_id']);

	    $controller->process();
	}
}