
======
 
 1. 微信小程序支付模块（Thinkphp3.2后端）。
 
 2. 因为要在Nginx里面，所以主动兼容，开启了URL兼容模式；另外，还要注意大小写问题，虽然TP里面开启了不区分大小写。

======

数据库连接 Application/Conmmon/Conf/config.php

配置商户信息 Vendor/Wxpay/WxPay.Config.php

获取小程序用户openid，填写小程序配置  Home/Controller/UserRewardController.class.php

处理商品订单（发起订单）  Home/Controller/Wxpay3Controller.class.php

======

小程序代码请参考 https://github.com/fyonecon/wxbless-front/tree/master/pages/reward

小程序已经开源： https://github.com/fyonecon/wxbless-front

======

小程序前端、后端都是我写的，遵从非核心代码开源，希望你喜欢。

qq 2652335796 ，本人目前在湖南省长沙市天心区，同市的朋友或者公司可以随时联系我。




