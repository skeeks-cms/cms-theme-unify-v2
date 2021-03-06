<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\tree\TreeCmsWidget */
/* @var $model   \skeeks\cms\models\Tree */

$hasChildrens = $model->activeChildren;
$activeClass = '';
if (strpos(\Yii::$app->request->pathInfo, $model->dir) !== false) {
    $activeClass = ' active';
}

if ($model->redirectTree && $model->redirectTree->dir && strpos(\Yii::$app->request->pathInfo, $model->redirectTree->dir)) {
    $activeClass = ' active';
}

if (!\Yii::$app->request->pathInfo && ($model->level == 0 || ($model->redirectTree && $model->redirectTree->level == 0))) {
    $activeClass = ' active';
}

?>
<li class="nav-item <?= $activeClass; ?> <?= ($hasChildrens) ? ' hs-has-sub-menu' : ''; ?>" data-animation-in="fadeIn" data-animation-out="fadeOut">
    <? if ($hasChildrens) : ?>
        <a href="<?= $model->url; ?>" title="<?= $model->name; ?>" id="nav-link-<?= $model->id; ?>" class="nav-link px-0" aria-haspopup="true" aria-expanded="false" aria-controls="nav-submenu-<?= $model->id; ?>">
            <?= $model->name; ?>
        </a>

        <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-min-width-220" id="nav-submenu-<?= $model->id; ?>" aria-labelledby="nav-link-<?= $model->id; ?>">
            <? 
            $childQuery = $model->getActiveChildren();
            $widget->initSorting($childQuery);
            foreach ($childQuery->all() as $childTree) : ?>
                <?
                $subChildsQuery = $childTree->getActiveChildren();
                $widget->initSorting($subChildsQuery);
                
                $subChilds = $subChildsQuery->all();
                ?>

                <li class="dropdown-item <?= $subChilds ? "hs-has-sub-menu" : "" ?>">
                    <a href="<?= $childTree->url; ?>" title="<?= $childTree->name; ?>" class="nav-link"><?= $childTree->name; ?></a>
                    
                                        

                    <? if ($subChilds) : ?>
                        <ul class="hs-sub-menu list-unstyled u-shadow-v11 g-brd-top g-brd-primary g-brd-top-2 g-min-width-220 g-mt-minus-2">
                            
                        <? foreach ($subChilds as $subChild) : ?>
                            <li class="dropdown-item ">
                              <a class="nav-link" href="<?= $subChild->url; ?>" title="<?= $subChild->name; ?>"><?= $subChild->name; ?></a>
                            </li>
                        <? endforeach; ?>
                        </ul>
                    <? endif; ?>
                </li>
            <? endforeach; ?>
        </ul>
    <? else: ?>
        <a href="<?= $model->url; ?>" class="nav-link px-0" title="<?= $model->name; ?>"><?= $model->name; ?></a>
    <? endif; ?>
</li>