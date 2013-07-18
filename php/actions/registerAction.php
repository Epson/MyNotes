
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class registerAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "register");
	    $context->addParam("username", $_REQUEST['username']);
	    $context->addParam("password", $_REQUEST['password']);
	    $context->addParam("avatar", "upload/avatar/1.jpg");
	    $controller->process();
	}
}