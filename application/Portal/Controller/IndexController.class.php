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
class IndexController extends HomebaseController
{
    protected $users_model;
    protected $qiandao_model;

    function _initialize()
    {
        parent::_initialize();
        $this->users_model = D("Portal/users");
        $this->qiandao_model = D("Portal/qiandao");
    }

    //首页 
    public function index()
    {
        //分类查询
        $cate = get_cate();
        $this->assign('cate', $cate);

        //查询专题
        $topic = get_topic();
        $this->assign('topic', $topic);

        //热搜关键词
        $hotsearch = get_hotsearch();
        $this->assign('hotsearch', $hotsearch);

        $this->display();
    }

    //签到
    public function sign()
    {

//       dump($_GET['id']) ;
        $uid = 1;
        $time = $this->qiandao_model->field('time')->where("uid=$uid")->select();
        $time = json_encode($time);
        $this->assign('time',$time);
//      dump($time);
        $this->display();
    }

    /**
     *
     */
    public function qiandao()
    {
        /*
         * 连签1-10天每天奖励0.1元蛋币，连签11-20天每天奖励0.2元蛋币，连签21-30天每天奖励0.3蛋币，连签30天赠送一张包邮券（有效期30天）
         * ，二月份只要连签28天即可领取包邮券。连签奖励只在这一个月内计算，每月1号零点自动清零上月的签到累计
        * */

        $uid = 1;
        $model= D();
        $today = date("d");//今天是几号
        $date = date("t");//这个月多少天
        $numAndCoin = $this->users_model->field('qiandao_num,coin')->where("id=$uid")->find();
        $time = $this->qiandao_model->field('time')->where("uid=$uid")->order('time DESC')->find();
//        如果今天时间和存入的时间是相同的 则返回到原来的 页面
        if ($time['time'] == $today) {
            $time = $this->qiandao_model->field('time')->where("uid=$uid")->select();
            $time = json_encode($time);
            $this->assign('time',$time);
            $this->display('sign');exit();
        }
        $num = (int)$numAndCoin['qiandao_num'];
        $coin = $numAndCoin['coin'];
        if(($num+1) != $today){//判断连续签到的次数和今天是不是相等 不相等就让连续签到的次数回归 0
            $num = 0;
        }elseif ($num > $today){//如果点击签到次数大于今天是几号 就让回退一天
        $num = (int)$today -1;
    }
        //连签1-10天每天奖励0.1元蛋币，连签11-20天每天奖励0.2元蛋币，连签21-30天每天奖励0.3蛋币
        $reward = 0;
        if ($num >= 0 && $num <= 10) {
            $reward = 0.1;
        } elseif ($num > 10 && $num <= 20) {
            $reward = 0.2;
        } elseif ($num > 20 && $num <= $date) {
            $reward = 0.3;

        }
        //连签30天赠送一张包邮券（有效期30天）
           $mail = 0;
      if ($num+1 == $date) {
          $mail = 1 ;

         }
        $newNum = ++$num;
        $this->assign('reward', $reward);//签到获取的钱
        $this->assign('mail', $mail);//是否连续签到30天的标识
        $this->assign('num', $newNum);//连续签到次数
        $data['time'] = date("d");
        $data['uid'] = $uid;
        var_dump($data);
        $newCoin = $coin + $reward;
        //事务操作
        $model->startTrans();
        $userRes = $this->users_model->where("id=$uid")->save(['qiandao_num'=>$newNum,'coin'=>$newCoin]);
         $res =     $this->qiandao_model->add($data);
        if($userRes && $res){
            $model->commit();
        }
        $model->rollback();
        $this->display('sign');

    }



}


