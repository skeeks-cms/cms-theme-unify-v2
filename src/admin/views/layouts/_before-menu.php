<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<?php if (\Yii::$app->mobileDetect->isMobile) : ?>
    <div class="sx-mobile-schedule-sidebar">
        <?= \skeeks\cms\widgets\admin\CmsUserScheduleBtnWidget::widget([
            'pjaxId' => 'sx-schedule-pjax-mobile-sidebar',
            'layout' => 'mobile-sidebar',
        ]); ?>
    </div>
<?php endif; ?>
