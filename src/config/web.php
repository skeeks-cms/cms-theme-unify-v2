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
                $backend = $e->sender;

                // A storefront on the Unify theme shows the customer cabinet
                // inside the site design unless the theme settings select the
                // standalone cabinet. A project that configured its own cabinet
                // theme in code keeps it; only the default shell is replaced.
                if ($backend->canGetProperty('themeClass')) {
                    if (!$theme instanceof \skeeks\cms\themes\unify\UnifyTheme
                        || $theme->upa_layout !== \skeeks\cms\themes\unify\UnifyTheme::UPA_LAYOUT_SITE
                        || $backend->themeClass !== \skeeks\cms\backend\themes\BackendTheme::class
                    ) {
                        return;
                    }
                    $backend->themeClass = null;
                }

                $theme->pathMap['@app/views'] = \yii\helpers\ArrayHelper::merge([
                    '@skeeks/cms/themes/unify/views/upa'
                ], (array) \yii\helpers\ArrayHelper::getValue($theme->pathMap, '@app/views', []));
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