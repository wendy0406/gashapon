<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 系统消息
 */
class MessageController extends HomebaseController {
	
    //消息列表页
	public function index() {

	    $this->display();
    }
	
	//消息内容页
    public function messagecontent() {
        $id=I('get.id');
        $posts=M('posts');
        $posts=$posts->find($id);
		$this->assign("posts",$posts);
        $this->display();
    }
}


