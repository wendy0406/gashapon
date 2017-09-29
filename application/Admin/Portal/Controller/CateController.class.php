<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController; 
/**
 * 分类部分
 */
class CateController extends HomebaseController {
	
    //分类列表页
	public function index() {
        //某个分类下的多个扭蛋机
		$id=I('get.id');
        session('cate_id',$id);
        $gashapon=M('gashapon')->where("cate_id=$id")->select();
        $this->assign('gashapon',$gashapon);

		//获取分类
		$cate=get_cate();
        $this->assign('cate',$cate);

		//获取专题
		$topic=get_topic();
        $this->assign('topic',$topic);

        $this->display();
    }

    //价格
    public function jiage(){
	    $id=$_SESSION["cate_id"];
        $start=I("get.start");
	    $end=I("get.end");
        $data['price_celing'] = array('egt',$start);
        $data['price_celing'] = array('eLt',$end);
        $data['cate_id'] = array('eq',$id);
        $gashapon=M('gashapon')->where($data)->select();
        $this->assign('gashapon',$gashapon);

        $this->display("index");

    }

}


