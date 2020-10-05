<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<!--[if gt IE 8]><!--> <html xmlns:wb="http://open.weibo.com/wb"> <!--<![endif]-->
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="keywords" content="大数据" />
    <meta name="description" content="大数据" />
    <link href="css/carousel.css" rel="stylesheet"> 
    <link href="css/justified-nav.css" rel="stylesheet">
    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode(  Yii::$app->id ) ?></title>
    <?php $this->head() ?>
</head>
<body>
<div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/"><?php echo Yii::$app->id ?></a>
            </div>
            <div class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="<?php ?>/home">首页</a></li>
                <li class="dropdown">
                  <a href="<?php ?>/event" class="dropdown-toggle" data-toggle="dropdown">活动 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php ?>/technology">技术聚会</a></li>
                    <li><a href="<?php ?>/salon">沙龙</a></li>
					<li><a href="<?php ?>/openclass">公开课</a></li>                    
					<li><a href="<?php ?>/book">读书会</a></li>
					<li class="divider"></li>
					<li><a href="<?php ?>/talk">夜话</a></li>
                    </ul>
                </li>
                <!----> <li class="dropdown">
                  <a href="<?php ?>/community" class="dropdown-toggle" data-toggle="dropdown">社区 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php ?>/partners">合作</a></li>
					<li><a href="<?php ?>/case">社区项目</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="<?php  ?>/train" class="dropdown-toggle" data-toggle="dropdown">培训 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php ?>/train1">速成班</a></li>
                    <li><a href="<?php ?>/train2">预备班</a></li>
                    <li><a href="<?php ?>/train3">正式班</a></li>
                    <li><a href="<?php ?>/train4">会员班</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="<?php ?>/data" class="dropdown-toggle" data-toggle="dropdown">数据超市 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php ?>/buydata">买数据</a></li>
                    <li><a href="<?php ?>/selldata">卖数据</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php ?>/consultation">咨询</a></li>
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="<?php  ?>/soft" class="dropdown-toggle" data-toggle="dropdown">软件超市 <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="<?php ?>/osoft">开源软件</a></li>
                    <li><a href="<?php ?>/bsoft">商业软件</a></li>
                    <li class="divider"></li>
                    <li><a href="<?php ?>/consultation">咨询</a></li>
                  </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-right" role="form" action="<?php ?>/email" method="post">
	            <div class="form-group">
	               <input type="text" placeholder="邮箱" name="email" size="24" class="form-control">
	            </div>
	               <button type="submit" class="btn btn-success">订阅</button>
	          	   <a class="btn btn-lg btn-primary" href="<?php ?>/reg" role="button">认证</a>
	          </form>
           </div>
        </div>
     </div>
   </div>
</div>
    
    <?= $content ?>

	<wb:comments url="auto" border="y" brandline="y" width="auto" ></wb:comments>
	<footer>
		<div style="position:relative;text-align: center">
        	<div>
	        	<div style="float:left; width:280px;">微博：<a alt="bigdataedu.org" title="bigdataedu.org" target="_blank" href="http://weibo.com/bigdataedu">@bigdataedu</a> <img alt="bigdataedu.org" title="bigdataedu.org" src="<?php  ?>" /></div>
	        	<div style="float:left; width:280px;">微信：<a alt="bigdataedu.org" title="bigdataedu.org" target="_blank" href="http://weixin.qq.com/r/m0NudvfEYaoerbMV9xaJ">bigdataedu</a> &nbsp;&nbsp; <img alt="bigdataedu.org" title="bigdataedu.org" src="<?php  ?>" /></div>
	        	<div style="float:left; width:280px;">QQ群：<a alt="bigdataedu.org" title="bigdataedu.org" target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=9b2aac3bfdefa7c9ec8a97286bb11664d2716df0f9b96468f617641650ef6a94">246972879</a>&nbsp; <img alt="bigdataedu.org" title="bigdataedu.org" src="<?php  ?>" /></div>
				<a href="#">回到顶部</a>
			</div>
			<div>
				<p class="pull-center"><?= Yii::powered() ?> @ <?= date('Y') ?></p>
			</div>
					
        </div>
    </footer>

    <?php $this->endBody() ?>
    <script src="js/bootstrap.js"></script>
    <script src="js/holder.js"></script>
 	<script src="http://tjs.sjs.sinajs.cn/open/api/js/wb.js?appkey=93780036" type="text/javascript" charset="utf-8"></script>
</body>
</html>
<?php $this->endPage() ?>
