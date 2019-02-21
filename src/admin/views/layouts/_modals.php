<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
?>

<? if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : ?>
    <!--<div style="display: none; z-index: -100000;">-->
    <?= \skeeks\cms\backend\widgets\ModalPermissionWidget::widget([
        'id'                   => 'sx-permisson-modal',
        'controller'           => \Yii::$app->controller,
        'toggleButton'         => false,
        'standartToggleButton' => false,
    ]); ?>
    <!--</div>-->
<? endif; ?>
