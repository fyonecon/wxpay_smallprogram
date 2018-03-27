<?php
/**
 * Created by PhpStorm.
 * User: 2652335796@qq.com
 * Date: 2018/3/17
 * Time: 下午 13:26
 */

//参考 http://www.thinkphp.cn/code/3259.html

/**tp3.2 放在 ThinkPHP\Library\Vendor 下面
 *
    Vendor('Wxpay.WxPay#Api');
 *
    $input = new \WxPayUnifiedOrder();
 *  注意 Vendor('Wxpay.WxPay#Api'); 注意目录的大小写，不然部署到linux 会出错
在这做个记录
 *
 * TP5  //将附件放入根目录下的/extend
 * use think\Loader;
    Loader::import('WxPay.WxPay', EXTEND_PATH, '.Api.php');
 *
 */


/*
 * 需要配置的地方Vendor/Wxpay/WxPay.Config.php，在这里需要填写一些支付账户等相关信息
 * */

namespace Home\Controller;
use Think\Controller;

Vendor('Wxpay.WxPay#Api');


class Wxpay3Controller extends Controller{

    public function index(){
        echo '';
    }

    //发起请求并完成支付，最后返回订单信息
    public function wxpay() {

        //初始化值对象（在支付框架中填写appid、商家支付账号，初始化附件支付框架） 1/4
        $input = new \WxPayUnifiedOrder();


        //从小程序端拿（用户提交信息）2/4
        $order= $_GET['order_sn'];   //订单号
        $money=$_GET['fee']*1;       //订单额，×1数据类型转换为整数，不然会报错，单位：分
        $body = $_GET['body'];       //商品描述
        $openid = $_GET['open_id'];  //用户openid


        //服务端处理订单（收钱） 3/4
        $input->SetBody($body);                  //文档提及的参数规范：商家名称-销售商品类目
        $input->SetOut_trade_no("$order"); //订单号应该是由小程序端传给服务端的，在用户下单时即生成，demo中取值是一个生成的时间戳
        $input->SetTotal_fee("$money");    //费用应该是由小程序端传给服务端的，在用户下单时告知服务端应付金额，demo中取值是1，即1分钱
        $input->SetNotify_url("http://paysdk.weixin.qq.com/example/notify.php");
        $input->SetTrade_type("JSAPI");
        $input->SetOpenid($openid);              //由小程序端传给服务端


        //统一下单 4/4
        $order = \WxPayApi::unifiedOrder($input);        //向微信统一下单，并返回order，它是一个array数组
        header("Content-Type: application/json");  //json化返回给小程序端
        echo json_encode($order);

    }



}