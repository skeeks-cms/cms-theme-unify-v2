<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use yii\web\AssetBundle;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FontAwesomeAsset extends \skeeks\cms\base\AssetBundle
{
    public $sourcePath = '@vendor/fortawesome/font-awesome/';
    public $css = [
        'css/all.min.css',
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        $appendTimestamp = \Yii::$app->assetManager->appendTimestamp;
        \Yii::$app->assetManager->appendTimestamp = false;


        $href = self::getAssetUrl('webfonts/fa-brands-400.woff2');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff2',
            /*'crossorigin' => 'crossorigin',*/
        ]);

        $href = self::getAssetUrl('webfonts/fa-regular-400.woff2');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff2',
            /*'crossorigin' => 'crossorigin',*/
        ]);

        $href = self::getAssetUrl('webfonts/fa-solid-900.woff2');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff2',
            /*'crossorigin' => 'crossorigin',*/
        ]);



        \Yii::$app->assetManager->appendTimestamp = $appendTimestamp;
    }

    public $depends = [
        FontAwesomeIconsAsset::class,
    ];
}