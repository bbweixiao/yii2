<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    /**
     * @inheritdoc
     */
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD,   // 这是设置所有js放置的位置
    ];
    public static function register($view)
    {
        return $view->registerAssetBundle(get_called_class());
    }
    public $css = [
        'css/base.css',
        'css/bootstrap3-wysihtml5.min.css',
        'css/dataTables.bootstrap.css',
        'css/morris.css',
    ];
    public $js = [
        'js/morris.min.js',
        'js/raphael.min.js',

    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
