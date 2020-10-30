<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

?>

<? $controller = \Yii::$app->controller; ?>
<? if ($controller && $controller instanceof \skeeks\cms\backend\IHasBreadcrumbs && $controller->breadcrumbsData) : ?>
    <ul class="u-list-inline g-hidden-sm-down">

        <li class="list-inline-item sx-breadcrumbs-item">
            <a class="g-valign-middle" href="<?= $this->theme->logoHref; ?>">Главная</a>
            <i class="hs-admin-angle-right g-valign-middle"></i>
        </li>

        <? if (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'hostingVpsBackend') : ?>
            <li class="list-inline-item sx-breadcrumbs-item">
                <a class="g-valign-middle" href="<?= \yii\helpers\Url::to(['/hosting/upa-hosting/index']) ?>">Мои VPS</a>
                <i class="hs-admin-angle-right g-valign-middle"></i>
            </li>
            <li class="list-inline-item sx-breadcrumbs-item">
                <a class="g-valign-middle" href="
                                    <?= \yii\helpers\Url::to(['/hosting/hosting-vps/index']) ?>">VPS <?= \Yii::$app->hostingVpsBackend->vps->id; ?></a>
                <i class="hs-admin-angle-right g-valign-middle"></i>
            </li>
        <? elseif (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'crmBackend') : ?>
            <li class="list-inline-item sx-breadcrumbs-item">
                <a class="g-valign-middle" href="<?= \yii\helpers\Url::to(['/crm/crm-main']) ?>">Кабинет сотрудника</a>
                <i class="hs-admin-angle-right g-valign-middle"></i>
            </li>
        <? endif; ?>

        <? $total = count($controller->breadcrumbsData); ?>
        <? $counter = 0; ?>
        <? foreach ($controller->breadcrumbsData as $row) : ?>
            <? $counter++; ?>
            <? if ($counter == $total) : ?>
                <li class="list-inline-item sx-breadcrumbs-item">
                    <a class="g-valign-middle" href="<?= \yii\helpers\ArrayHelper::getValue($row,
                        'url'); ?>"><?= \yii\helpers\ArrayHelper::getValue($row, 'label'); ?></a>
                </li>
            <? else : ?>
                <li class="list-inline-item sx-breadcrumbs-item">
                    <a class="g-valign-middle" href="<?= \yii\helpers\ArrayHelper::getValue($row,
                        'url'); ?>"><?= \yii\helpers\ArrayHelper::getValue($row, 'label'); ?></a>
                    <i class="hs-admin-angle-right g-valign-middle"></i>
                </li>
            <? endif; ?>

        <? endforeach; ?>
    </ul>
<? endif; ?>