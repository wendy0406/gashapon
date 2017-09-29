<?php
// +----------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013-2014 http://www.thinkcmf.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +----------------------------------------------------------------------
namespace Portal\Controller;

use Common\Controller\HomebaseController;

/**
 * 首页
 */
class CronController extends HomebaseController
{
    protected $users_model;
    protected $qiandao_model;

    function _initialize()
    {
        parent::_initialize();
        $this->users_model = D("Portal/users");
        $this->qiandao_model = D("Portal/qiandao");
    }

    //计划任务删除表数据
    public function  cronSign(){
//        $arr = M('qiandao');
//       $res= $arr->query('TRUNCATE table cmf_qiandao');
//
       $sql='TRUNCATE  cmf_qiandao';
        $res=M()->execute($sql);
        if(!$res){
           echo '数据清理完毕';
        }

//
    }

}


