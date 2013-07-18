
<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getNewsFromFriendsAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

		$context->addParam("action", "getNewsFromFriends");
		$context->addParam("user_id", $_SESSION['user_id']);
		$controller->process();
		$news = $context->get("news");

		$users_id = array();
		for( $i = 0; $i < count($news); $i ++ ) {
			$users_id[] = $news[$i]["user_id"];
		}

		$context->addParam("action", "getUsersByTheirId");
	    $context->addParam("users_id", $users_id);
	    $controller->process();
	    $users_mes = $context->get("users_mes");

	    $targets_id = array();
	    for( $i = 0; $i < count($news); $i ++ ) {
	    	$targets_id[] = $news[$i]["associate"];
	    }

	    $context->addParam("action", "getTargetsByTheirId");
	    $context->addParam("targets_id", $targets_id);
	    $controller->process();
	    $targets_mes = $context->get("targets_mes");


	    $news_array = array();
	    for( $i = 0 ; $i < count($news); $i ++ ) {
	    	$news_message = array();
	    	$news_message["user_id"] = $news[$i]["user_id"];
	    	$news_message["username"] = $users_mes[$i]->username;
	    	$news_message["avatar"] = $users_mes[$i]->avatar;
	    	$news_message["target_id"] = $news[$i]["associate"];
	    	$news_message["target_name"] = $targets_mes[$i]->target_name;
	    	$news_message["content"] = $news[$i]["content"];
	    	$news_message["create_time"] = $news[$i]["create_time"];
	    	if( isset($news[$i]["comment_id"]) ) {
	    		// echo "comment";
	    		$news_message["type"] = "comment";
	    	} else if( isset($news[$i]["note_id"]) ) {
	    		// echo "note";
	    		$news_message["type"] = "note";
	    	} else if( isset($news[$i]["tag_id"]) ) {
	    		// echo "tag";
	    		$news_message["type"] = "tag";
	    	}

	    	$news_array[$i] = $news_message;
	    }

		return json_encode($news_array);
	}
}