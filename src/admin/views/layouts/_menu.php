<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
$level = 1;
?>

<? if ($items = \skeeks\cms\backend\BackendComponent::getCurrent()->menu->items) : ?>
    <!--g-min-height-100vh-->
    <ul id="sideNavMenu" class="u-side-nav--top-level-menu">
        <? foreach ($items as $adminMenuItem) : ?>
            <? if ($adminMenuItem->isVisible) : ?>
                <li class="u-side-nav--top-level-menu-item
                <?= $adminMenuItem->items ? "u-side-nav--has-sub-menu" : ""; ?>
                <?= $adminMenuItem->items && $adminMenuItem->isActive ? "u-side-nav-opened has-active" : ""; ?>
">

                    <a class="media u-side-nav--top-level-menu-link <?= $adminMenuItem->isActive ? "active" : ""; ?>" href="<?= $adminMenuItem->url; ?>"
                        <?= $adminMenuItem->items ? "data-hssm-target='#subMenuLevels{$adminMenuItem->id}'" : "" ?>
                    >
                      <span class="d-flex align-self-center g-pos-rel u-side-nav--top-level-menu-icon">
                          <? if ($adminMenuItem->icon) : ?>
                              <i class="<?= $adminMenuItem->icon; ?>"></i>
                          <? elseif ($adminMenuItem->image) : ?>
                              <img src="<?= $adminMenuItem->image; ?>" style="max-width: 20px;max-height: 20px;"/>
                          <? else : ?>
                              <i class="far fa-dot-circle"></i>
                          <? endif; ?>

                        </span>
                        <span class="media-body align-self-center"><?= $adminMenuItem->name; ?></span>

                        <? if ($adminMenuItem->items) : ?>
                            <span class="d-flex align-self-center u-side-nav--control-icon">
                              <i class="hs-admin-angle-right"></i>
                            </span>
                            <span class="u-side-nav--has-sub-menu__indicator"></span>
                        <? endif; ?>
                    </a>

                    <? if ($adminMenuItem->items && $adminMenuItem->isActive) : ?>
                        <?= $this->render("@app/views/layouts/_submenu", [
                            'items'  => $adminMenuItem->items,
                            'level'  => $level,
                            'parent' => $adminMenuItem,
                        ]); ?>
                    <? endif; ?>
                </li>
            <? endif; ?>
        <? endforeach; ?>
    </ul>
<? endif; ?>

