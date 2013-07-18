
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class updateMyInformationAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		if( !empty($_FILES) ) {

			$context->addParam("action", "getMyInformation");
		    $context->addParam("user_id", $_SESSION['user_id']);
		    $controller->process();
		    $user = $context->get("user");
		    $num;
		    $delete_file_name;

		    $tempname = explode('_', $user->avatar);
		    if( count($tempname) == 1 ) {
		    	$num = 0;
		    } else {
		    	$delete_file_name = "avatar/" . iconv("UTF-8","GB2312", $_REQUEST['username']);
		    	$context->addParam("action", "removeFile");
		    	$context->addParam("delete_file_name", $delete_file_name);
		    	$context->addParam("name", $_FILES['avatar']['name']);
		    	$controller->process();

		    	if( $tempname[1][0] == "0" ) {
		    		$num = 1;
		    		$delete_file_name = "avatar/" . iconv("UTF-8","GB2312", $_REQUEST['username']) . "_0";
		    	} else {
		    		$delete_file_name = "avatar/" . iconv("UTF-8","GB2312", $_REQUEST['username']) . "_1";
		    		$num = 0;
		    	}
		    }

		    $context->addParam("action", "removeFile");
		    $context->addParam("delete_file_name", $delete_file_name);
		    $context->addParam("name", $_FILES['avatar']['name']);
		    $controller->process();

			$context->addParam("action", "uploadFile");
		    $context->addParam("file_name", "avatar/" . iconv("UTF-8","GB2312", $_REQUEST['username']) . "_" . $num);
		    $context->addParam("type", $_FILES['avatar']['type']);
		    $context->addParam("size", $_FILES['avatar']['size']);
		    $context->addParam("error", $_FILES['avatar']['error']);
		    $context->addParam("name", $_FILES['avatar']['name']);
		    $context->addParam("tmp_name", $_FILES['avatar']['tmp_name']);
		    $controller->process();
		    $context->addParam("avatar", $context->get("filepath"));
		    $avatar = $context->get("filepath");
	   	
	  		echo $avatar;
		}
	
	    $context->addParam("action", "updateMyInformation");
	    $context->addParam("user_id", $_SESSION['user_id']);
	    $context->addParam("username", $_REQUEST['username']);
	    $context->addParam("email", $_REQUEST['email']);
	    $context->addParam("introduction", $_REQUEST['introduction']);
	    $controller->process();
	}
}