
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class addNoteAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "login");
	    $context->addParam("username", 'zhaojian');
	    $context->addParam("password", 'zhaojian');
	    $controller->process();

	    $context->addParam("action", "addNote");
	    $context->addParam("user_id", $_SESSION['user_id']);
		$context->addParam("content", $_REQUEST['content']);
        $context->addParam("associate", $_REQUEST['associate']);
		$context->addParam("is_public", $_REQUEST['is_public']);
	    $controller->process();
	}
}