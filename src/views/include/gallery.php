<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

<? $items = \yii\helpers\ArrayHelper::map($images, "id", function (\skeeks\cms\models\StorageFile $model) {
    return [
        'src'         => $model->src,
        'preview_src' => \Yii::$app->imaging->thumbnailUrlOnRequest($model->src,
            new \skeeks\cms\components\imaging\filters\Thumbnail([
                'h' => 350,
                'w' => 525,
            ])
        ),
        'description' => $model->name,
        'title'       => $model->name,
    ];
}); ?>
<?= \skeeks\yii2\nanogalleryWidget\NanogalleryWidget::widget([
    'items' => $items,
    'clientOptions' => [
        'thumbnailHeight' => 350
    ],
]); ?>
