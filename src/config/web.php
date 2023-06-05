<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [
    'components' => [
        /*'unifyThemeSettings' => [
            'class' => \skeeks\cms\themes\unify\components\UnifyThemeSettings::class,
        ],*/

        'mobileDetect' => [
            'class' => '\skeeks\yii2\mobiledetect\MobileDetect'
        ],

        'upaBackend' => [

            'on beforeRun' => function ($e) {
    
                $theme = \Yii::$app->view->theme;

                $theme->pathMap['@app/views'] = \yii\helpers\ArrayHelper::merge([
                    '@skeeks/cms/themes/unify/views/upa'
                ], $theme->pathMap['@app/views']);
            },
        ],
        
        'view' => [
            'themes' => [
                "unify" => [
                    'class' => \skeeks\cms\themes\unify\UnifyTheme::class
                ],
            ]
        ],
        
    ],
];