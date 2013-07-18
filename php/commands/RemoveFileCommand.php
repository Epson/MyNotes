
<?php

require_once('Command.php');
require_once(dirname(__FILE__) . '/../DBManager.php');

class RemoveFileCommand extends Command {
	function excute(CommandContext $context) {
		$delete_file_name = $context->get("delete_file_name");
		$name = $context->get("name");
		
		$tempname = explode('.',$name);					//将文件名以'.'分割得到后缀名,得到一个数组
		$file_name = dirname(__FILE__) . "/../../upload/" . $delete_file_name . "." . $tempname[1] ;

		if( file_exists($file_name) ) {
			unlink($file_name);
		}

		return true;
	}
}