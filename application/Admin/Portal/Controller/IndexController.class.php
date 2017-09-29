<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 首页
 */
class IndexController extends HomebaseController {
	
    //首页 
	public function index() {
    	 //分类查询
	    $cate=get_cate();
        $this->assign('cate',$cate);
		
		//查询专题
	    $topic=get_topic();
        $this->assign('topic',$topic);
		
		//热搜关键词
	    $hotsearch=get_hotsearch();
        $this->assign('hotsearch',$hotsearch);		
		
		$this->display();
    }
	
	//签到
	public function sign() {
		
		$this->display();
	}

}


