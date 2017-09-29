<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController;
/**
 * 分类部分
 */
class CateController extends HomebaseController {
	
    //分类列表页
	public function index() {
        session(null);
	    //某个分类下的多个扭蛋机
        $id=I('get.id');
        $catename=I('get.catename');
        session('cate_id',$id);
        session('catename',$catename);
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

    //联查
    public function liancha(){
	    $cate_id=I("get.cate_id");
        $start=I("get.start");
        $end=I("get.end");
        if($cate_id!=""){
            session("cate_id",$cate_id);
        }else{
            $cate_id=$_SESSION['cate_id'];
        }

        if($start!=""){
            session("start",$start);
        }else{
            $start=$_SESSION['start'];
        }

        if($end!=""){
            session("end",$end);
        }else{
            $end=$_SESSION['end'];
        }

        if($cate_id!="" && $cate_id!=0){
            $data['cate_id']=array('eq',$cate_id);
        }

        if($start!="" && $end!=""){
            $data['price_celling'] = array(array('gt',$start),array('lt',$end)) ;
        }

        $gashapon=M('gashapon')->where($data)->select();
        //var_dump(M('gashapon')->_sql());exit();
        $this->assign('gashapon',$gashapon);

        //获取分类
        $cate=get_cate();
        $this->assign('cate',$cate);

        //获取专题
        $topic=get_topic();
        $this->assign('topic',$topic);


        $this->display("index");

    }

}


