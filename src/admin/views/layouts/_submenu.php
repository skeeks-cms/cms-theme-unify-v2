<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @var $items \skeeks\cms\backend\BackendMenuItem[] */
/* @var $level integer */
/* @var $parent \skeeks\cms\backend\BackendMenuItem */
$level = $level + 1;

?>
<? if ($items) : ?>
    <ul id="subMenuLevels<?= $parent->id; ?>" class="sx-shell-menu sx-shell-menu--level-<?= $level ?>">
        <? foreach ($items as $item) : ?>
            <? if ($item->isVisible) : ?>
                <li class="sx-shell-menu__item sx-shell-menu__item--level-<?= $level ?>
<?= $item->items ? "sx-shell-menu__item--has-children" : ""; ?>
<?= $item->items && $item->isActive ? "sx-shell-menu__item--open sx-shell-menu__item--active" : ""; ?>
">
                    <a class="sx-shell-menu__link sx-shell-menu__link--level-<?= $level ?> <?= $item->isActive ? "sx-shell-menu__link--active" : ""; ?>"
                       href="<?= $item->url; ?>"
                        <?= $item->items ? "data-sx-shell-menu-target='#subMenuLevels{$item->id}' aria-expanded='".($item->isActive ? 'true' : 'false')."' aria-controls='subMenuLevels{$item->id}'" : "" ?>
                    >

                        <? if ($item->image) : ?>
                            <span class="sx-shell-menu__icon sx-shell-menu__icon--nested">
                                <img src="<?= $item->image; ?>"/>
                            </span>
                        <? elseif ($item->icon) : ?>
                            <span class="sx-shell-menu__icon sx-shell-menu__icon--nested">
                                <i class="<?= $item->icon; ?>"></i>
                            </span>
                        <? else : ?>
                            <span class="sx-shell-menu__icon sx-shell-menu__icon--nested">
                                <img src="<?= \skeeks\cms\assets\CmsAsset::getAssetUrl('images/icons/admin-menu/more.svg'); ?>"/>
                            </span>
                        <? endif; ?>

                        <span class="sx-shell-menu__label"><?= $item->name; ?></span>

                        <? if ($item->items) : ?>
                            <span class="sx-shell-menu__control">
                          <?= \skeeks\cms\backend\helpers\BackendIcon::render('chevron-right', ['size' => 14]); ?>
                        </span>
                        <? endif; ?>
                    </a>


                    <? if ($item->items) : ?>
                        <?= $this->render("@app/views/layouts/_submenu", [
                            'items'  => $item->items,
                            'level'  => $level,
                            'parent' => $item,
                        ]); ?>
                    <? endif; ?>

                </li>
            <? endif; ?>

        <? endforeach; ?>
    </ul>
<? endif; ?>

