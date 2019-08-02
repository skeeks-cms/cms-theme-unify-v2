<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [
    'components' => [
        'unifyThemeSettings' => [
            'class' => \skeeks\cms\themes\unify\components\UnifyThemeSettings::class,
        ],

        'mobileDetect' => [
            'class' => '\skeeks\yii2\mobiledetect\MobileDetect'
        ],

        'upaBackend' => [

            'on beforeRun' => function ($e) {
                $theme = new \skeeks\cms\themes\unify\admin\UnifyThemeAdmin();

                if (isset(\Yii::$app->view->theme->favicon)) {
                    $theme->favicon = \Yii::$app->view->theme->favicon;
                }

                if (isset(\Yii::$app->view->theme->logo)) {
                    $theme->logoSrc = \Yii::$app->view->theme->logo;
                }

                if (isset(\Yii::$app->view->theme->logo_text)) {
                    $theme->logoTitle = \Yii::$app->view->theme->logo_text;
                }

                \skeeks\cms\themes\unify\admin\UnifyThemeAdmin::initBeforeRender();
                \Yii::$app->view->theme = $theme;
            },
        ],
    ],
];