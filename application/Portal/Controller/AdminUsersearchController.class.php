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

class AdminUsersearchController extends AdminbaseController {
    public function _initialize() {
        parent::_initialize();
    }

    //用户历史搜索列表
    public function index(){
        $usersearch=M('usersearch')->select();
        $this->assign("usersearch",$usersearch);
        $this->display();
    }



    //热门搜索编辑
    public function edit(){
        $us_id=I("get.id");
        $usersearch=M('usersearch')->find($us_id);
        $this->assign($usersearch);
        $this->display();
    }

    // 热门搜索编辑提交
    public function edit_post(){
        $us_id=I("post.us_id");
        $usersearch=M('usersearch');
        $usersearch->historyword=I("post.historyword");
        if($usersearch->where("us_id=$us_id")->save()){
            $this->success("修改成功！", U("AdminUsersearch/index"));
        }else{
            $this->error("修改失败！");
        }
    }

    // 历史搜索删除
    public function delete(){
        $us_id = I("get.id");
        $usersearch=M('usersearch');
        if($usersearch->where("us_id=$us_id")->delete()){
            $this->success("删除成功！", U("AdminUsersearch/index"));
        }else{
            $this->error("删除失败！");
        }

    }


//类结束标，勿删
}

