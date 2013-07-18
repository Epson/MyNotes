<?php 

require_once('Action.php');
require_once(dirname(__FILE__) . '/../Controller.php');

class getHotPapersAction extends Action {
	public function takeAction() {
		$controller = new Controller();
		$context = $controller->getContext();

	    $context->addParam("action", "getHotPapers");
	    $controller->process();
	    $hot_papers = $context->get("hot_papers");

	    $hot_papers_array = array();
	    for( $i = 0 ; $i < count($hot_papers); $i ++ ) {
	    	$hot_paper_message = array();
	    	$hot_paper_message["target_id"] = $hot_papers[$i]->target_id;
	    	$hot_paper_message["image"] = $hot_papers[$i]->image;
	    	$hot_paper_message["target_name"] = $hot_papers[$i]->target_name;
	    	$hot_paper_message["author"] = $hot_papers[$i]->author;

	    	$hot_papers_array[$i] = $hot_paper_message;
	    }

	    return json_encode($hot_papers_array);
	}
}