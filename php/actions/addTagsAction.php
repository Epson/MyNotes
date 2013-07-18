
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class addTagsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "addTags");
		$context->addParam("tag", $_REQUEST['tag']);
        $context->addParam("associate", $_REQUEST['target_id']);
        $context->addParam("user_id", $_SESSION['user_id']);
	    $controller->process();
	}
}