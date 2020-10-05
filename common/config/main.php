<?php

// if (YII_ENV){
// $config['modules']['gii'] = ['class' => 'yii\gii\Module','allowedIPs' => ['127.0.0.1','::1']];
// }
return [
		'vendorPath' => dirname ( dirname ( __DIR__ ) ) . '/vendor',
		// 'layout' => 'main',
		'components' => [ 
				'cache' => [ 
						'class' => 'yii\caching\FileCache' 
				]
				// 'assetManager' => [
				// 'class' => 'yii\web\AssetManager',
				// 'bundles' => [
				// 'daixianceng\echarts\EChartsAsset' => [
				// 'sourcePath' => null,
				// 'baseUrl' => '//cdn.bootcss.com/echarts/3.0.0'
				// ]
				// ]
				// ],
		
			//urlMangage  
				
		]
];
