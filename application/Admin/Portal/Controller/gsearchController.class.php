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
        $usersearch=M("usersearch")->order("us_id desc")->limit(0,10)->select();
        $this->assign("usersearch",$usersearch);

        $this->display();
    }

    //搜索结果列表
    public function gsearchlist(){
        //关键词查询
        $keywords=I('keywords');
		
        $data['gname'] = array('like', "%$keywords%");
        $gashapon=M('gashapon')->where($data)->select();
        $this->assign("gashapon",$gashapon);
		$this->assign("keywords","qwe");

        //分类查询
        $cate=get_cate();
        $this->assign('cate',$cate);

        //查询专题
        $topic=get_topic();
        $this->assign('topic',$topic);
        $this->display();
    }

}


