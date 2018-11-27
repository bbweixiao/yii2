<?php
use yii\helpers\Html;
use dmstr\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */


if (Yii::$app->controller->action->id === 'login') { 
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {

    if (class_exists('backend\assets\AppAsset')) {
        backend\assets\AppAsset::register($this);
    } else {
        app\assets\AppAsset::register($this);
    }

    dmstr\web\AdminLteAsset::register($this);

    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte/dist');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <?php $this->beginBody() ?>
    <style>
        .cpyfw_menu{width: 686px;padding:10px;position: absolute;top:50px;border:none}
        .cpyfw_menu li{width:146px;padding:10px 0;margin:0 10px;display: block;float: left;}
        .cpyfw_menu li a{font-size: 12px;padding: 5px 15px 5px 18px;}
        .cpyfw_menu span{margin: 3px 0 6px;color: #000;float: none;display: block;}
        .cpyfw_menu span .iconfont{font-size: 14px;margin-right: 5px;line-height: 20px;}
        .cpyfw_menu .cpyfw_li a{display:block;line-height: 28px;margin-bottom: 2px;color: #333;font-size: 12px;padding:0}

         .nav .open > a {
            background-color: #fff;
            color: #333;
        }

    </style>
    <div class="wrapper">
        <header class="main-header">
            <?= Html::a('<span class="logo-mini"><i class="fa fa-fw fa-newspaper-o"></i></span><span class="logo-lg" style="font-size: 14px">管理控制平台</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

            <nav class="navbar navbar-static-top " role="navigation">
                <div style="float:left;width:120px;height:30px;margin-top: -5px;padding-top: 1px;/*border:1px #fff solid;*/">
                   <!--  <span  >管理控制平台</span>-->
                    <ul class="nav navbar-nav">
                        <li class="dropdown messages-menu hidden-xs">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span >产品与服务&nbsp<span class="caret"></span></span>
                            </a>
                            <ul class="dropdown-menu  hidden-xs cpyfw_menu" id="cpyfw_ul" style="height: 722px;width: 686px;">
                                <li>
                                    <span><i class="iconfont"></i>店铺管理</span>
                                    <a href="/storecas/employee">员工管理</a>
                                    <a href="/storecas/group">员工角色管理</a>
                                    <a href="/storecas/unsigned">非签约店铺管理</a>
                                    <a href="/storecas/category">店铺分类管理</a>
                                    <a href="/storecas/storelist">店铺管理</a>
                                    <a href="/storecas/invite">邀请码管理</a>
                                </li>
                                <li>
                                    <span><i class="iconfont"></i>系统管理</span>
                                    <a href="/trendstore/release">版本发布管理</a>
                                    <a href="/trendstore/white">白名单维护</a>
                                    <a href="/trendstore/set">其他参数值配置</a>
                                    <a href="/trendstore/region">地区管理</a>
                                    <a href="/trendstore/gtype">推广维护</a>
                                    <a href="/goodsstore/write/index_log">推广统计</a>
                                    <a href="/goodsstore/user">店铺绑定统计</a>
                                    <a href="/trendstore/set/index_set">设置用户显示距离</a>
                                    <a href="/trendstore/set/index_coupon">设置优惠券开关</a>
                                    <a href="/trendstore/set/index_search">热门搜索显示量设置</a>
                                    <a href="/trendstore/set/index_coupon_xcx">小程序使用优惠券开关</a>
                                    <a href="/trendstore/set/index_bianmin">便民服务开关</a>
                                    <a href="/trendstore/set/index_laowu">劳务付款开关</a>
                                </li>
                                <li>
                                    <span><i class="iconfont"></i>后台评价管理</span>
                                    <a href="/comment/index/index_plat">评价管理列表</a>
                                    <a href="/comment/trash">评价回收站</a>
                                    <a href="/bbsstore/report">举报查看</a>
                                </li>
                                <li>
                                    <span><i class="iconfont"></i>单页管理</span>
                                    <a href="/pagestore">单页列表管理</a>
                                    <a href="/pagestore/group">单页分组管理</a>
                                    <a href="/pagestore/setting">单页设置</a>
                                </li>
                                <li style="position: absolute; left: 342px; top: 140px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>文章管理</span>
                                    <a href="/article/category">文章分类管理</a>
                                    <a href="/article/index/index_plat">文章列表管理</a>
                                </li>
                                <li style="position: absolute; left: 508px; top: 140px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>便民服务管理</span>
                                    <a href="/servicestore">便民服务管理</a>
                                    <a href="/servicestore/category">便民服务类别</a>
                                    <a href="/servicestore/comment">便民服务评论管理</a>
                                </li>
                                <li style="position: absolute; left: 10px; top: 221px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>商品管理</span>
                                    <a href="/goodsstore">商品列表管理</a>
                                    <a href="/goodsstore/category">商品分类管理</a>
                                    <a href="/goodsstore/audit">商品审核管理</a>
                                    <a href="/goodsstore/rankgoods">商品首页显示审核</a>
                                    <a href="/goodsstore/index/index_store">平台商品所在店铺统计</a>
                                    <a href="/goodsstore/unit">计量单位管理</a>
                                    <a href="/goodsstore/write">录入统计</a>
                                </li>
                                <li style="position: absolute; left: 342px; top: 243px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>促销管理</span>
                                    <a href="/salestore/couponbase">基础优惠券维护</a>
                                    <a href="/salestore/couponaccaudit/index_audit">活动资金审批</a>
                                    <a href="/salestore/couponaccount">活动资金明细</a>
                                    <a href="/salestore/couponaccaudit">活动资金管理</a>
                                    <a href="/salestore/type">活动类型</a>
                                    <a href="/salestore/couponactivity">优惠券活动管理</a>
                                    <a href="/salestore/couponactivity/index_audit">优惠券活动审核</a>
                                    <a href="/salestore/coupon/log_store">店铺消费促销统计</a>
                                    <a href="/salestore/coupon/index_count">优惠券统计</a>
                                    <a href="/salestore/basetype">优惠券类型</a>
                                </li>
                                <li style="position: absolute; left: 508px; top: 270px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>订单管理</span>
                                    <a href="/btsstore/order">订单管理</a>
                                    <a href="/btsstore/order/index_show">订单实时跟踪</a>
                                </li>
                                <li style="position: absolute; left: 508px; top: 373px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>会员管理</span>
                                    <a href="/casstore">会员列表管理</a>
                                </li>
                                <li style="position: absolute; left: 176px; top: 410px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>消息管理</span>
                                    <a href="/trendstore/notice">业务消息</a>
                                    <a href="/trendstore/notice/sysnotice">系统通知</a>
                                    <a href="/storecas/msg">热门搜索</a>
                                    <a href="/storecas/faq">意见反馈</a>
                                </li>
                                <li style="position: absolute; left: 508px; top: 449px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>资金管理</span>
                                    <a href="/moneystore/pay">在线支付</a>
                                    <a href="/moneystore/moneystore">商户提现</a>
                                </li>
                                <li style="position: absolute; left: 10px; top: 459px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>统计报表</span>
                                    <a href="/btsstore/orderStat">订单统计</a>
                                    <a href="/goodsstore/stat">商品统计</a>
                                    <a href="/casstore/stat">客户订货统计</a>
                                </li>
                                <li style="position: absolute; left: 508px; top: 552px; border-top: 1px solid rgb(242, 242, 242);">
                                    <span><i class="iconfont"></i>广告管理</span>
                                    <a href="/advertstore">广告管理</a>
                                    <a href="/advert/board">广告位管理</a>
                                    <a href="/advert/page">广告页管理</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                             <!--   <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>-->
                                <span class="hidden-xs">开放注册</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">您有 4 条消息</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                                         alt="User Image"/>
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                         alt="user image"/>
                                                </div>
                                                <h4>
                                                    AdminLTE Design Team
                                                    <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                         alt="user image"/>
                                                </div>
                                                <h4>
                                                    Developers
                                                    <small><i class="fa fa-clock-o"></i> Today</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= $directoryAsset ?>/img/user3-128x128.jpg" class="img-circle"
                                                         alt="user image"/>
                                                </div>
                                                <h4>
                                                    Sales Department
                                                    <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <div class="pull-left">
                                                    <img src="<?= $directoryAsset ?>/img/user4-128x128.jpg" class="img-circle"
                                                         alt="user image"/>
                                                </div>
                                                <h4>
                                                    Reviewers
                                                    <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">您有 10 条通知</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-yellow"></i> Very long description here that may
                                                not fit into the page and may cause design problems
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-red"></i> 5 new members joined
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-red"></i> You changed your username
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-flag-o"></i>
                                <span class="label label-danger">9</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">您有 9 个 任务</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Design some buttons
                                                    <small class="pull-right">20%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                         role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <span class="sr-only">20% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Create a nice theme
                                                    <small class="pull-right">40%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-green" style="width: 40%"
                                                         role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <span class="sr-only">40% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Some task I need to do
                                                    <small class="pull-right">60%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-red" style="width: 60%"
                                                         role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <span class="sr-only">60% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                            <a href="#">
                                                <h3>
                                                    Make beautiful transitions
                                                    <small class="pull-right">80%</small>
                                                </h3>
                                                <div class="progress xs">
                                                    <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                         role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                         aria-valuemax="100">
                                                        <span class="sr-only">80% Complete</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <!-- end task item -->
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all tasks</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                                <span class="hidden-xs"><?= Yii::$app->user->identity->username ?></span>
                            </a>
                            <ul class="dropdown-menu " style="width: auto" >
                                <li><a href="#">账号安全</a></li>
                                <li class="divider"></li>
                                <li><a href="#">我的账号</a></li>
                                <li class="divider"></li>
                                <li><a href="#">注销</a></li>
                            </ul>
                        </li>
                   <!--     <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>-->
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="main-sidebar">
            <section class="sidebar">
            <!--左菜单-->
                <ul class="sidebar-menu" data-widget="tree">
                  <!--  <li class="header">HEADER</li>-->
                    <!-- Optionally, you can add icons to the links -->

                    <li class="treeview">
                        <a href="#"><i class="fa fa-fw fa-black-tie"></i> <span>店铺管理</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                        </a>
                        <ul class="treeview-menu" >
                            <li  >
                                <a href="/admin/route/index">
                                    <i class="fa fa-fa fa-circle-o"></i>
                                    <span>员工管理</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fa fa-circle-o"></i>
                                    <span>员工角色管理</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-fw fa-expeditedssl"></i> <span>系统管理</span>
                            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                        </a>
                        <ul class="treeview-menu">
                            <li  ><a href="/admin/route/index">
                                    <i class="fa fa-fa fa-circle-o"></i>
                                    <span> 白名单维护</span>
                                </a></li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fa fa-circle-o"></i>
                                    <span>推广维护</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-fw fa-cc-discover"></i> <span>商品管理</span>
                            <span class="pull-right-container">
                             <i class="fa fa-angle-left pull-right"></i>
                      </span>
                        </a>
                        <ul class="treeview-menu">
                            <li >
                                <a href="/admin/route/index">
                                    <i class="fa fa-fa fa-circle-o"></i>
                                    <span> 商品列表管理</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fa fa-fa fa-circle-o"></i>
                                    <span>  分类列表管理 </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </section>

        </aside>
        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset]
        ) ?>
      <!--  <div class="content-wrapper">
            <section class="content">
                <?/*= Alert::widget() */?>
                <?/*= $content */?>
            </section>
        </div>-->

    </div>
    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
