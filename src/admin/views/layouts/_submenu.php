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

$levelName = 'second';
if ($level == 3) {
    $levelName = 'third';
}
if ($level == 4) {
    $levelName = 'fourth';
}
?>
<? if ($items) : ?>
    <ul id="subMenuLevels<?= $parent->id; ?>" class="u-sidebar-navigation-v1-menu u-side-nav--<?= $levelName; ?>-level-menu mb-0" <?= $parent->isActive ? "style='display:block;' " : ""; ?>>
        <? foreach ($items as $item) : ?>
            <? if ($item->isVisible) : ?>
                <li class="u-sidebar-navigation-v1-menu-item u-side-nav--<?= $levelName; ?>-level-menu-item
<?= $item->items && $item->isActive ? "u-side-nav-opened has-active" : ""; ?>
">
                    <a class="media u-side-nav--<?= $levelName; ?>-level-menu-link g-px-15 g-py-5 <?= $item->isActive ? "active" : ""; ?>"
                       href="<?= $item->url; ?>"
                        <?= $item->items ? "data-hssm-target='#subMenuLevels{$item->id}'" : "" ?>
                    >

                        <? if ($item->icon) : ?>
                            <span class="align-self-center g-mr-5 g-mt-minus-1 sx-icon-wrapper">
                            <i class="<?= $item->icon; ?>"></i>
                        </span>

                        <? elseif ($item->image) : ?>
                            <span class="align-self-center g-mr-5 g-mt-minus-1 sx-icon-wrapper">
                            <img src="<?= $item->image; ?>" style="max-width: 19px; max-height: 19px; width: 100%;"/>
                        </span>
                        <? else : ?>
                            <span class="align-self-center g-mr-5 g-mt-minus-1 sx-icon-wrapper">
                              <i class="far fa-dot-circle"></i>
                        </span>
                        <? endif; ?>

                        <span class="media-body align-self-center"><?= $item->name; ?></span>

                        <? if ($item->items) : ?>
                            <span class="align-self-center u-side-nav--control-icon">
                          <i class="hs-admin-angle-down"></i>
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

