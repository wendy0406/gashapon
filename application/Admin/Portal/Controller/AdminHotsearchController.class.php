<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Tuolaji <479923197@qq.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;

use Common\Controller\AdminbaseController;

class AdminHotsearchController extends AdminbaseController {
    public function _initialize() {
        parent::_initialize();
    }

    //热门搜索列表
    public function index(){
        $hotsearch=M('hotsearch')->select();
        $this->assign("hotsearch",$hotsearch);
        $this->display();
    }



    //热门搜索编辑
    public function edit(){
        $hs_id=I("get.id");
        $hotsearch=M('hotsearch')->find($hs_id);
        $this->assign($hotsearch);
        $this->display();
    }

    // 热门搜索编辑提交
    public function edit_post(){
        $hs_id=I("post.hs_id");
        $hotsearch=M('hotsearch');
        $hotsearch->hotword=I("post.hotword");
        $hotsearch->hsnum=I("post.hsnum");
        if($hotsearch->where("hs_id=$hs_id")->save()){
            $this->success("修改成功！", U("AdminHotsearch/index"));
        }else{
            $this->error("修改失败！");
        }
    }

    // 热门搜索删除
    public function delete(){
        $hs_id = I("get.id");
        $hotsearch=M('hotsearch');
        if($hotsearch->where("hs_id=$hs_id")->delete()){
            $this->success("删除成功！", U("AdminHotsearch/index"));
        }else{
            $this->error("删除失败！");
        }

    }


//类结束标，误删
}

