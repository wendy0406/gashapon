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

class AdminGashaponController extends AdminbaseController {
    
	protected $posts_model;
	
	function _initialize() {
		parent::_initialize();
	}

	//扭蛋机列表
	public function index() {
		$gashapons=M("gashapon")->select();
		$this->assign("gashapons",$gashapons);
	    $this->display();
	}

	//添加扭蛋机
    public function add(){

	    $this->display();
    }

    //编辑扭蛋机
    public function edit(){

        $this->display();
    }

    //删除扭蛋机
    public function delete(){

        $this->display();
    }

//类结束标，误删
}