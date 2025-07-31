<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $models  \skeeks\cms\models\Tree[] */
?>
<? if ($models = $widget->activeQuery->all()) : ?>
    <?php \skeeks\cms\themes\unify\assets\components\UnifyThemeSubcatalogAsset::register($this); ?>
    <section id="sx-promo-1" class="g-py-60 g-bg-white">
        <div class="container sx-container">
            <div class="shop-item-list row list-inline nomargin">
                <? foreach ($models as $model) : ?>
                    <?= $this->render("_one-home-subcatalog", [
                        "widget" => $widget,
                        "model"  => $model,
                    ]); ?>
                <? endforeach; ?>
            </div>
        </div>
    </section>
<? endif; ?>