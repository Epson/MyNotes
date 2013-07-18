
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class addCommentAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "login");
	    $context->addParam("username", 'zhaojian');
	    $context->addParam("password", 'zhaojian');
	    $controller->process();

	    $context->addParam("action", "addComment");
	    $context->addParam("user_id", $_SESSION['user_id']);
		$context->addParam("content", $_REQUEST['content']);
        $context->addParam("associate", $_REQUEST['associate']);
	    $controller->process();
	}
}