
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class createTargetAction extends Action {
	public function takeAction() {
	    $controller = new Controller();
	    $context = $controller->getContext();

		$context->addParam("action", "uploadFile");
	    $context->addParam("file_name", "frontImage/" . iconv("UTF-8", "GB2312", $_REQUEST['target_name']));
	    $context->addParam("type", $_FILES['image']['type']);
	    $context->addParam("size", $_FILES['image']['size']);
	    $context->addParam("error", $_FILES['image']['error']);
	    $context->addParam("name", $_FILES['image']['name']);
	    $context->addParam("tmp_name", $_FILES['image']['tmp_name']);
	    $controller->process();

	    $context->addParam("action", "createTarget");
	    $context->addParam("targetName", $_REQUEST['target_name']);
	    $context->addParam("author", $_SESSION['user_id']);    
        $context->addParam("category", $_REQUEST['category']);
        $context->addParam("image", $context->get("filepath"));
		$context->addParam("introduction", $_REQUEST['introduction']);
	    $controller->process();

	    $target_id = $context->get("target_id");

	    $context->addParam("action", "addTags");
	    $context->addParam("associate", $target_id);
	    $context->addParam("tags", $_REQUEST['tags']);  
	    $context->addParam("user_id", $_SESSION['user_id']);      
	    $controller->process();

	    return $target_id;
	}
}