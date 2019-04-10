<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
return [
    'components' => [
        'i18n' => [
            'translations' => [
                'skeeks/unify' => [
                    'class'    => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@skeeks/cms/themes/unify/messages',
                    'fileMap'  => [
                        'skeeks/unify' => 'main.php',
                    ],
                ],
            ],
        ],
    ],
];