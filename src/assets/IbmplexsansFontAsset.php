<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\cms\base\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class IbmplexsansFontAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/themes/unify/assets/src/fonts/ibmplexsans';

    public $css = [
        'ibmplexsans.css',
    ];


    public function registerAssetFiles($view)
    {
        return parent::registerAssetFiles($view);


        $appendTimestamp = \Yii::$app->assetManager->appendTimestamp;
        \Yii::$app->assetManager->appendTimestamp = false;


        $href = self::getAssetUrl('FTR35.woff');
        \Yii::$app->view->registerLinkTag([
            'rel'         => 'preload',
            'href'        => $href,
            'as'          => 'font',
            'type'        => 'font/woff',
            //'crossorigin' => 'crossorigin',
            "crossorigin" => "anonymous"
        ]);

        \Yii::$app->assetManager->appendTimestamp = $appendTimestamp;
    }
}
