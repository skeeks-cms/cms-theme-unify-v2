<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
\skeeks\assets\unify\base\UnifyIconSimpleLineAsset::register($this);
?>
<div class="sx-header-menu-item sx-header-auth">
    <? if (\Yii::$app->user->isGuest) : ?>
        <a class="g-text-underline--none--hover sx-icon-wrapper" href="<?= \skeeks\cms\helpers\UrlHelper::construct('/cms/auth/login'); ?>">
            <i class="icon-user"></i>
            <span class="">
                <span class="g-hidden-sm-down"></span>
            </span>
        </a>
    <? else : ?>

        <!-- Top User -->
        <a class="g-text-underline--none--hover sx-icon-wrapper sx-user-mobile-menu-trigger" href="<?= \Yii::$app->cms->afterAuthUrl; ?>">
            <i class="icon-user"></i>
            <span class="">
                <span class="g-hidden-sm-down"></span>
            </span>
        </a>
    <? endif; ?>
</div>