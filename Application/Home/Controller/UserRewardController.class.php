<?php
/**
 * Created by PhpStorm.
 * User: 2652335796@qq.com
 * Date: 2018/3/9
 * Time: 下午 14:03
 */

namespace Home\Controller;
use Think\Controller;
class UserRewardController extends Controller {
    public function index(){

        echo "打赏统计";
    }

    //接收微信端的api，返回用户openid
    public function wx_api(){

        //在此填写小程序信息
        $app_id = ''; //更换新小程序时，应该把小程序开发工具（用appid登录的小程序）+后台服务这边的appid都要更新一下
        $secret = '';
        $js_code = $_GET['js_code']; //小程序前端随机生成

        //微信api
        $url="https://api.weixin.qq.com/sns/jscode2session?appid=".$app_id."&secret=".$secret."&js_code=".$js_code."&grant_type=authorization_code";

        $ch=curl_init();
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_USERAGENT,$_SERVER['HTTP_USER_AGENT']);
        $resp=curl_exec($ch);
        curl_close($ch);
        $resp=json_decode($resp,true);
        echo json_encode(array('status'=>1, 'wx_info'=>$resp));


    }


    //用户打赏支付录入
    public function add_user_reward(){



        $user_reward = D('user_reward');//寻找数据库表


        // 接收POST
        $data['openid'] = $_REQUEST['open_id'];
        $data['appid'] = $_REQUEST['appid'];
        $data['body'] = $_REQUEST['body'];
        $data['order_sn'] = $_REQUEST['order_sn'];
        $data['reward_fee'] = $_REQUEST['reward_fee'];

        $data['reward_time'] = time();

        $result = $user_reward->add($data);


        if ($result){
            // 返回给前端的提示信息和操作状态
            echo json_encode(array('status'=>1, 'arr'=>$result));
            exit();
        }else{
            // 返回给前端的错误后返回错误的操作状态和提示信息
            echo json_encode(array('status'=>0, 'err'=>'失败'.__LINE__));
            exit();
        }

    }




}