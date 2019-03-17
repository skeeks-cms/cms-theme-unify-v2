<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $model   \skeeks\cms\models\Tree */
$hasChildrens = $model->activeChildren;
$activeClass = '';
if (strpos(\Yii::$app->request->pathInfo, $model->dir) !== false)
{
    $activeClass = ' active';
}
?>
<li class="nav-item g-mx-20--lg <?= $activeClass; ?> <?= ($hasChildrens) ?' hs-has-sub-menu':''; ?>" data-animation-in="fadeIn" data-animation-out="fadeOut">
    <? if ($hasChildrens) : ?>
        <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" id="nav-link-<?= $model->id; ?>" class="nav-link px-0" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-<?= $model->id; ?>">
            <?= $model->name; ?>
        </a>

        <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-min-width-220 g-mt-18 g-mt-8--lg--scrolling" id="nav-submenu-<?= $model->id; ?>" aria-labelledby="nav-link-<?= $model->id; ?>">
        <? foreach($model->getChildren()
                       ->andWhere(['active' => $widget->active])
                       ->orderBy([$widget->orderBy => $widget->order])
                       ->all() as $childTree) : ?>
                <li class="dropdown-item">
                    <a href="<?= $childTree->url; ?>" title="<?= $childTree->name; ?>" class="nav-link"><?= $childTree->name; ?></a>
                </li>
        <? endforeach; ?>
            </ul>
    <? else: ?>
        <a href="<?= $model->url; ?>" class="nav-link px-0" title="<?= $model->name; ?>" class="nav-link"><?= $model->name; ?></a>
    <? endif; ?>
</li>