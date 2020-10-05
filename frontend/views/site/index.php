<?php
use yii\web\JsExpression;
use daixianceng\echarts\ECharts;

ECharts::registerTheme ( 'dark' );
ECharts::registerTheme ( 'roma' );
ECharts::registerTheme ( 'vintage' );
// ECharts::registerTheme ( 'macarons' );
// ECharts::registerTheme ( 'infographic' );
ECharts::registerTheme ( 'shine' );

// 引用地图必须使用完整版的echarts
// ECharts::$dist = ECharts::DIST_FULL;
//ECharts::registerMap(['china', 'province/beijing']);

/* @var $this yii\web\View */
$this->title = Yii::$app->id;
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<div class="item active">
			<!-- There are 6 default theme: sky, vine, lava, gray, industrial, and social. -->
			<img data-src="holder.js/900x500?text=未来掌握在手中&bg=#777&fg=#7a7a7a"
				id='m1' alt="未来掌握在手中">
			<div class="container">
				<div class="carousel-caption">
					<h1>大数据培训</h1>
					<br>大数据速成班->大数据正式班->大数据会员班（企业班） <br>大数据预备班->大数据正式班->大数据会员班（学校班）
					<p>
						<a class="btn btn-lg btn-primary" href="train" role="button">详情</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img data-src="holder.js/900x500?text=数据驱动未来&bg=#666&fg=#6a6a6a"
				id='m2' alt="数据驱动未来">
			<div class="container">
				<div class="carousel-caption">
					<h1>数据超市</h1>
					<p>数据工厂、数据超市、数据产品、数据标准、数据设计、UDL</p>
					<p>
						<a class="btn btn-lg btn-primary" href="data" role="button">详情</a>
					</p>
				</div>
			</div>
		</div>
		<div class="item">
			<img data-src="holder.js/900x500?text=软件定义世界&bg=#555&fg=#5a5a5a"
				id='m3' alt="软件定义世界">
			<div class="container">
				<div class="carousel-caption">
					<h1>软件超市</h1>
					<p>开源软件、商业软件、自由软件、应用软件</p>
					<p>
						<a class="btn btn-lg btn-primary" href="soft" role="button">详情</a>
					</p>
				</div>
			</div>
		</div>
	</div>
	<a class="left carousel-control" href="#myCarousel" data-slide="prev"><span
		class="glyphicon glyphicon-chevron-left"></span></a> <a
		class="right carousel-control" href="#myCarousel" data-slide="next"><span
		class="glyphicon glyphicon-chevron-right"></span></a>
</div>
<!-- /.carousel -->


<!-- START THE FEATURETTES -->
<div class="container marketing">
	<hr class="featurette-divider">
	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">
				First featurette heading. <span class="text-muted">It'll blow your mind.</span>
			</h2>
			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
				Vestibulum id ligula porta felis euismod semper. Praesent commodo
				cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
				tellus ac cursus commodo.</p>
		</div>
		<!-- line bar radar polarArea doughnut pie bubble -->
		<div class="col-md-5">
			<?=ECharts::widget ( [ 'responsive' => true,'options' => [ 'style' => 'height: 400px;' ],'pluginEvents' => [ 'click' => [ new JsExpression ( 'function (params) {console.log(params)}' ),new JsExpression ( 'function (params) {console.log("ok")}' ) ],'legendselectchanged' => new JsExpression ( 'function (params) {console.log(params.selected)}' ) ],'pluginOptions' => [ 'option' => [ 'title' => [ 'text' => '' ],'tooltip' => [ 'trigger' => 'axis' ],'legend' => [ 'data' => [ '邮件营销','联盟广告','视频广告','直接访问','搜索引擎' ] ],'grid' => [ 'left' => '3%','right' => '4%','bottom' => '3%','containLabel' => true ],'toolbox' => [ 'feature' => [  ] ],'xAxis' => [ 'name' => '','type' => 'category','boundaryGap' => false,'data' => [ '周一','周二','周三','周四','周五','周六','周日' ] ],'yAxis' => [ 'type' => 'value' ],'series' => [ [ 'name' => '邮件营销','type' => 'line','stack' => '总量','data' => [ 120,132,101,134,90,230,210 ] ],[ 'name' => '联盟广告','type' => 'line','stack' => '总量','data' => [ 220,182,191,234,290,330,310 ] ],[ 'name' => '视频广告','type' => 'line','stack' => '总量','data' => [ 150,232,201,154,190,330,410 ] ],[ 'name' => '直接访问','type' => 'line','stack' => '总量','data' => [ 320,332,301,334,390,330,320 ] ],[ 'name' => '搜索引擎','type' => 'line','stack' => '总量','data' => [ 820,932,901,934,1290,1330,1320 ] ] ] ] ] ] );?>
		</div>
	</div>
	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-5">
			<?=ECharts::widget ( [ 'theme' => 'dark','responsive' => true,'options' => [ 'style' => 'height: 400px;' ],'pluginOptions' => [ 'option' => [ 'title' => [ 'text' => '' ],'tooltip' => [ 'trigger' => 'axis' ],'legend' => [ 'data' => [ '邮件营销','联盟广告','视频广告','直接访问','搜索引擎' ] ],'grid' => [ 'left' => '3%','right' => '4%','bottom' => '3%','containLabel' => true ],'toolbox' => [ 'feature' => [] ],'xAxis' => [ 'name' => '','type' => 'category','boundaryGap' => false,'data' => [ '周一','周二','周三','周四','周五','周六','周日' ] ],'yAxis' => [ 'type' => 'value' ],'series' => [ [ 'name' => '邮件营销','type' => 'line','stack' => '总量','data' => [ 120,132,101,134,90,230,210 ] ],[ 'name' => '联盟广告','type' => 'line','stack' => '总量','data' => [ 220,182,191,234,290,330,310 ] ],[ 'name' => '视频广告','type' => 'line','stack' => '总量','data' => [ 150,232,201,154,190,330,410 ] ],[ 'name' => '直接访问','type' => 'line','stack' => '总量','data' => [ 320,332,301,334,390,330,320 ] ],[ 'name' => '搜索引擎','type' => 'line','stack' => '总量','data' => [ 820,932,901,934,1290,1330,1320 ] ] ] ] ] ] );?>
		</div>

		<div class="col-md-7">
			<h2 class="featurette-heading">
				Oh yeah, it's that good. <span class="text-muted">See for yourself.</span>
			</h2>
			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
				Vestibulum id ligula porta felis euismod semper. Praesent commodo
				cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
				tellus ac cursus commodo.</p>
		</div>
	</div>
	<hr class="featurette-divider">

	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">
				First featurette heading. <span class="text-muted">It'll blow your mind.</span>
			</h2>
			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
				Vestibulum id ligula porta felis euismod semper. Praesent commodo
				cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
				tellus ac cursus commodo.</p>
		</div>
		<!-- line bar radar polarArea doughnut pie bubble -->
		<div class="col-md-5">
			<?=ECharts::widget ( [ 'theme' => 'roma','responsive' => true,'options' => [ 'style' => 'height: 400px;' ],'pluginOptions' => [ 'option' => [ 'title' => [ 'text' => '' ],'tooltip' => [ 'trigger' => 'axis' ],'legend' => [ 'data' => [ '邮件营销','联盟广告','视频广告','直接访问','搜索引擎' ] ],'grid' => [ 'left' => '3%','right' => '4%','bottom' => '3%','containLabel' => true ],'toolbox' => [ 'feature' => [] ],'xAxis' => [ 'name' => '','type' => 'category','boundaryGap' => false,'data' => [ '周一','周二','周三','周四','周五','周六','周日' ] ],'yAxis' => [ 'type' => 'value' ],'series' => [ [ 'name' => '邮件营销','type' => 'line','stack' => '总量','data' => [ 120,132,101,134,90,230,210 ] ],[ 'name' => '联盟广告','type' => 'line','stack' => '总量','data' => [ 220,182,191,234,290,330,310 ] ],[ 'name' => '视频广告','type' => 'line','stack' => '总量','data' => [ 150,232,201,154,190,330,410 ] ],[ 'name' => '直接访问','type' => 'line','stack' => '总量','data' => [ 320,332,301,334,390,330,320 ] ],[ 'name' => '搜索引擎','type' => 'line','stack' => '总量','data' => [ 820,932,901,934,1290,1330,1320 ] ] ] ] ] ] );?>
		</div>
	</div>

	<hr class="featurette-divider">
	<div class="row featurette">
		<div class="col-md-7">
			<h2 class="featurette-heading">
				And lastly, this one. <span class="text-muted">Checkmate.</span>
			</h2>
			<p class="lead">Donec ullamcorper nulla non metus auctor fringilla.
				Vestibulum id ligula porta felis euismod semper. Praesent commodo
				cursus magna, vel scelerisque nisl consectetur. Fusce dapibus,
				tellus ac cursus commodo.</p>
		</div>

		<div class="col-md-5">
			<?=ECharts::widget ( [ 'responsive' => true,'options' => [ 'style' => 'height: 400px;' ],'pluginOptions' => [ 'option' => [ 'series' => [ [ 'name' => 'China map','type' => 'map','map' => 'china','data' => [ [ 'name' => '广东','selected' => true ] ] ] ] ] ] ] );?>
		</div>
	</div>
	<hr class="featurette-divider">
</div>
