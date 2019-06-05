<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
?>
<?
$modal = \yii\bootstrap\Modal::begin([
    'header'       => 'Заказ звонка',
    'id'           => 'sx-callback',
    'toggleButton' => false,
    'size'         => \yii\bootstrap\Modal::SIZE_DEFAULT,
]);
?>
    <?= \skeeks\modules\cms\form2\cmsWidgets\form2\FormWidget::widget([
        'form_code' => 'callback',
        'namespace' => 'FormWidget-callback',
        'viewFile'  => 'with-messages'
        //'viewFile' => '@app/views/widgets/FormWidget/fiz-connect'
    ]); ?>

<? $modal::end(); ?>