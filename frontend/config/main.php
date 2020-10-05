<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php')
//     require(__DIR__ . '/../../common/config/params-local.php'),
//     require(__DIR__ . '/params.php'),
//     require(__DIR__ . '/params-local.php')
);

return [
    'id' => '3Wbao',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',	//'catalog/list',
	'vendorPath' => dirname ( dirname ( __DIR__ ) ) . '/vendor',
	'aliases' => [
		'@npm'   => dirname ( dirname ( __DIR__ ) ) . '/vendor/npm-asset',
		'@bower'   => dirname ( dirname ( __DIR__ ) ) . '/vendor/bower-asset',
	],
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
    		
    		'urlManager' => [
   					'class' => 'yii\web\UrlManager',
//    					'enablePrettyUrl' => true, // 对url进行美化
//    					'showScriptName' => false, // 隐藏index.php
    				//  'suffix' => '.html',//后缀
    				//  'enableStrictParsing'=>false,//不要求网址严格匹配,则不需要输入rules
    				'rules' => [
//     						'reg' => 'site/<action>',
//     						'email' => 'site/email',
//     						'train4' => 'train',
    							
    						'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    						'<controller:\w+>/<id:\d+>'=>'<controller>/view',
    						'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    				]
    		
    				// [
    				// // 'pattern' => 'posts',
    				// // 'route' => 'post/index',
    				// // 'suffix' => '.json',
    				// ],
    				// '<action:about>' => 'site/about',
    				// '<action:contact>' => '/site/<action>',
    				// '<action:list>' => '/cart/<action>',
    				// '<controller:\w+>/<id:\d+>'=>'<controller>/view',
    				// '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
    				// '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    				// 为路由指定了一个别名，以 post 的复数形式来表示 post/index 路由
    				// 'posts' => 'post/index',
    		
    				// id 是命名参数，post/100 形式的URL，其实是 post/view&id=100
    				// 'post/<id:\d+>' => 'post/view',
    		
    				// controller action 和 id 以命名参数形式出现
    				// '<controller:(post|comment)>/<id:\d+>/<action:(create|update|delete)>' => '<controller>/<action>',
    				// 'site/about' => 'site/about',
    				// 'site/concact' => 'site/concact',
    				// 'cart/list' => 'cart/list',
    		]
    		
        //'cart' => ['class' => 'yz\shoppingcart\ShoppingCart',],
    ],
    'params' => $params,
];
