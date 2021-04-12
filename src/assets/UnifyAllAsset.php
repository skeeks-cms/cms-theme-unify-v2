<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyOnscrollAnimationAsset;
use skeeks\assets\unify\base\UnifyPopperAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAllAsset extends UnifyAsset
{
    public $css = [
        '//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik&display=swap',
        //'https://use.fontawesome.com/releases/v5.5.0/css/all.css',
        //'@vendor/fortawesome/font-awesome/css/all.min.css',

        'assets/vendor/icon-awesome/css/font-awesome.min.css',
        'assets/vendor/icon-hs/style.css',
        'assets/vendor/icon-awesome/css/font-awesome.min.css',
        'assets/vendor/icon-line/css/simple-line-icons.css',
        'assets/vendor/icon-etlinefont/style.css',
        'assets/vendor/icon-line-pro/style.css',
        'assets/vendor/icon-hs/style.css',

        'assets/vendor/animate.css',
        'assets/vendor/typedjs/typed.css',

        'assets/css/unify-core.css',
        'assets/css/unify-components.css',
        'assets/css/unify-globals.css',
    ];

    public $js = [

    ];

    public $depends = [
        YiiAsset::class,
        Custom::class,
        UnifyPopperAsset::class,
        BootstrapPluginAsset::class,
        FontAwesomeAsset::class,
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $appendTimestamp = \Yii::$app->assetManager->appendTimestamp;
        \Yii::$app->assetManager->appendTimestamp = false;

        $href = self::getAssetUrl('assets/vendor/icon-hs/fonts/hs-icons.ttf?xa77py');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/ttf',
            //'crossorigin' => 'crossorigin',
        ]);
        $href = self::getAssetUrl('assets/vendor/icon-awesome/fonts/fontawesome-webfont.woff2?v=4.7.0');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff2',
            //'crossorigin' => 'crossorigin',
        ]);

        $href = self::getAssetUrl('assets/vendor/icon-line/fonts/Simple-Line-Icons.woff2?v=2.4.0');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff2',
            //'crossorigin' => 'crossorigin',
        ]);
        $href = self::getAssetUrl('assets/vendor/icon-line-pro/finance/webfont/fonts/finance.woff');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff',
            //'crossorigin' => 'crossorigin',
        ]);

        \Yii::$app->assetManager->appendTimestamp = $appendTimestamp;
    }
}