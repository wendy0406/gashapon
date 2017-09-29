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

class AdminTopicController extends AdminbaseController {
	public function _initialize() {
		parent::_initialize();
	}

	//扭蛋机专题列表
	public function index(){
		$topic=M('topic')->select();
		$this->assign("topic",$topic);
		$this->display();
	}
	
	//扭蛋机专题添加
	public function add(){
    	$this->display();
	}
	
	//扭蛋机专题添加提交
    public function add_post() {
		$topic=M("topic");
    	if (IS_POST) {
    		if ($topic->create()!==false) {
    			if ($topic->add()!==false) {
    				$this->success("添加成功！", U("AdminTopic/index"));
    			} else {
    				$this->error("添加失败！");
    			}
    		} else {
    			$this->error("创建失败");
    		}
    	}
    }
	
	//扭蛋机专题编辑
	public function edit(){
		$topic_id=I("get.id");
		$topic=M('topic')->find($topic_id);
		$this->assign($topic);
		$this->display();
	}
	
	// 专题编辑提交
	public function edit_post(){
		if(IS_POST){
			$topic=M("topic");
			if ($topic->create()!==false) {
				if ($topic->save()!==false) {
					$this->success("保存成功！", U("AdminTopic/index"));
				} else {
					$this->error("保存失败！");
				}
			} else {
				$this->error($topic->getError());
			}
				
		}
	}
	
	// 扭蛋机专题删除
	public function delete(){
		$topic_id = I("get.id");
		$topic=M('topic');
		if($topic->where("topic_id=$topic_id")->delete()){
			$this->success("修改成功！", U("AdminTopic/index"));
		}else{
			$this->error("修改失败！");
		}
		
	}


//类结束标，误删
}

