<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 专题部分
 */
class TopicController extends HomebaseController {
	
    //专题列表页
	public function index() {
        //专题id
		$id=I('get.id');
        //专题下的扭蛋机
		$gashapon=M('gashapon')->where("gid in (select gashapon_id from cmf_topic_gashapon where topic_id=$id)")->select();
		$this->assign('gashapon',$gashapon);

		//获取分类
        $cate=get_cate();
        $this->assign('cate',$cate);

        //获取专题
        $topic=get_topic();
        $this->assign('topic',$topic);
        $this->display();
    }

}


