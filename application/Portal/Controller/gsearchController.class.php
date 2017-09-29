<?php
namespace Portal\Controller;
use Common\Controller\HomebaseController;
/**
 * 首页搜索部分
 */
class GsearchController extends HomebaseController {

    //搜索页
    public function index() {
        //查询热门搜索关键词
        $hotsearch=M("hotsearch")->order("hsnum desc")->limit(0,10)->select();
        $this->assign("hotsearch",$hotsearch);
        //查询历史搜索关键词
        $usersearch=M("usersearch")->where("uid=3")->order("ustime desc")->limit(0,10)->select();
        $this->assign("usersearch",$usersearch);

        $this->display();
    }

    //搜索结果列表
    public function gsearchlist(){
        //关键词查询
        $keywords=I('keywords');
		//var_dump($keywords);exit();

        $data['gname'] = array('like', "%$keywords%");
        $gashapon=M('gashapon')->where($data)->select();
        $this->assign("gashapon",$gashapon);
		$this->assign("keywords",$keywords);

        //将关键词插入数据库
        $usersearch=M('usersearch');
        $us_id=$usersearch->where("historyword='$keywords'")->getField("us_id");

        if($us_id){
            $data['ustime']=time();
            $usersearch->where("us_id=$us_id")->setInc("usnum",1);
            $usersearch->where("us_id=$us_id")->data($data)->save();
        }else{
            $data['uid']=3;
            $data['historyword']=$keywords;
            $data['ustime']=time();
            $usersearch->add($data);
        }
        //分类查询
        $cate=get_cate();
        $this->assign('cate',$cate);

        //查询专题
        $topic=get_topic();
        $this->assign('topic',$topic);
        $this->display();
    }

}


