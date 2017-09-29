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

class AdminCateController extends AdminbaseController {
	public function _initialize() {
		parent::_initialize();
	}

	//扭蛋机分类列表
	public function index(){
		$cate=M('cate')->select();
		$this->assign("cate",$cate);
		$this->display();
	}
	
	//扭蛋机分类添加
	public function add(){
    	$this->display();
	}
	
	//扭蛋机分类添加提交
	public function add_post() {
		$cate=M("cate");
		if($cate->create()){
			if($cate->add()){
				$this->success("添加成功！", U("AdminCate/index"));
			}else{
				$this->error("添加失败！");
			}
		}else{
			$this->error("创建失败！");
		}


    }
	
	//扭蛋机分类编辑
	public function edit(){
		$cate_id=I("get.id");
		$cate=M('cate')->find($cate_id);
		$this->assign($cate);
		$this->display();
	}
	
	// 扭蛋机分类编辑提交
	public function edit_post(){
		$cate_id=I("post.cate_id");
		$cate=M('cate');
		$cate->catename=I("post.catename");
		if($cate->where("cate_id=$cate_id")->save()){
			$this->success("修改成功！", U("AdminCate/index"));
		}else{
			$this->error("修改失败！");
		}
	}
	
	// 扭蛋机分类删除
	public function delete(){
		$cate_id = I("get.id");
		$cate=M('cate');
		if($cate->where("cate_id=$cate_id")->delete()){
			$this->success("修改成功！", U("AdminCate/index"));
		}else{
			$this->error("修改失败！");
		}
		
	}


//类结束标，误删
}

