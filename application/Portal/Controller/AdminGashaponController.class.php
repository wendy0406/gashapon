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
    
	protected $gashapons_model;
    protected $cate_model;
    protected $topic_model;

	function _initialize() {
		parent::_initialize();
		$this->gashapons_model = D("Portal/gashapon");
        $this->cate_model = D("Portal/cate");
        $this->topic_model = D("Portal/topic");
	}

	//扭蛋机列表
	public function index() {
		$gashapons=$this->gashapons_model->field('gid,gname,cate_id,price_celling')->select();
		$this->assign("gashapons",$gashapons);
	    $this->display();
	}

	//添加扭蛋机
    public function add(){
            $cate=$this->cate_model->select();
            $cate_list="";
            foreach($cate as $item){
                $cid=$item["cate_id"];
                $cname=$item["catename"];
                $cate_list.="<option value='$cid'>$cname</option>";
            }
            $topic=$this->topic_model->select();
            $topic_list="";
            foreach($topic as $item){
                $tid=$item["topic_id"];
                $tname=$item["topicname"];
                $topic_list.="<option value='$tid'>$tname</option>";
            }
            $this->assign("cate_list",$cate_list);
            $this->assign("topic_list",$topic_list);
            $this->display();

    }

       public function add_post(){
        /*
              * array(19) {
              ["cate"] => string(1) "7"
              ["topic"] => array(4) {
                    [0] => string(1) "1"
                    [1] => string(1) "2"
                    [2] => string(1) "3"
                    [3] => string(1) "4"
                  }
              ["gname"] => string(9) "多喝水"
              ["smeta"] => array(1) {
                ["thumb"] => string(33) "portal/20170929/59ce0eb7f3e01.png"
              }
              ["post"] => array(2) {
                    ["post_keywords"] => string(2) "43"
                    ["post_source"] => string(2) "40"
              }
              ["photos_url"] => array(3) {
                [0] => string(33) "portal/20170929/59ce0ec516a35.jpg"
                [1] => string(33) "portal/20170929/59ce0ec52e8b0.jpg"
                [2] => string(33) "portal/20170929/59ce0ec545823.png"
              }
              ["photos_alt"] => array(3) {
                [0] => string(6) "11.jpg"
                [1] => string(8) "timg.jpg"
                [2] => string(19) "未标题-1 (2).png"
              }
              ["ifnew"] => string(1) "1"
              ["ifhd"] => string(1) "1"
              ["iftejia"] => string(1) "1"
              ["ifxsqg"] => string(1) "1"
              ["xsqg_start_time"] => string(16) "2017-10-01 00:00"
              ["xsqg_end_time"] => string(16) "2017-10-08 00:00"
              ["ifkj"] => string(1) "1"
              ["Iftuijian"] => string(1) "1"
              ["ifys"] => string(1) "1"
              ["ys_start_time"] => string(16) "2017-09-29 17:13"
              ["ys_middle_time"] => string(16) "2017-09-30 17:13"
              ["ys_end_time"] => string(16) "2017-09-29 23:13"
        }
         *
         * */
            dump($_POST);
            if(!empty($_POST['photos_url'])){
                $data['epic']= json_encode($_POST['photos_url']);
            }
            if(!empty($_POST['ename'])){
                $data['ename']= json_encode($_POST['photos_url']);
            }
            if(!empty($_POST['smeta'])){
                $data['gpic']= $_POST['photos_url'];
            }


        }
    //编辑扭蛋机
    public function edit(){
        $id= I('get.id');
        $cate=$this->cate_model->where("id=$id")->select();
        $cate_list="";
        foreach($cate as $item){
            $cid=$item["cate_id"];
            $cname=$item["catename"];
            $cate_list.="<option value='$cid'>$cname</option>";
        }
        $topic=$this->topic_model->select();
        $topic_list="";
        foreach($topic as $item){
            $tid=$item["topic_id"];
            $tname=$item["topicname"];
            $topic_list.="<option value='$tid'>$tname</option>";
        }
        $this->assign("cate_list",$cate_list);
        $this->assign("topic_list",$topic_list);
        $this->display();

    }

    //删除扭蛋机
    public function delete(){

        $this->display();
    }



//类结束标，误删
}