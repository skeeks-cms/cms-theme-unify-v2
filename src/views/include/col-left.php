<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

$this->registerJs(<<<JS
$(window).on('load', function () {
        // initialization of sticky blocks
setTimeout(function() { // important in this case
  $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
}, 1);
});
JS
);
$model = \Yii::$app->cms->currentTree;

$menuName = $model ? $model->name : "Меню";
$parent = $model;
if ($model) {

    if ($model->activeChildren) {
        $parent = $model;
    } elseif ($model->parent) {
        $parent = $model->parent;
    } elseif (isset($model->parents[1])) {
        $parent = $model->parents[1];
        $menuName = $parent->name;

        if (!$parent->activeChildren) {
            $parent = $model->parents[0];
        }
    } else {
        $parent = $model->parents[0];
    }


}

?>

<div class="col-md-3 order-md-1 g-py-20 g-bg-secondary">
    <div class="g-mb-20">
        <div id="stickyblock-start" class="g-pa-5 js-sticky-block" data-start-point="#stickyblock-start" data-end-point=".sx-footer">

            <? if ($parent->activeChildren) : ?>

                <div class="u-heading-v3-1 g-mb-10">
                    <h2 class="h5 u-heading-v3__title g-font-weight-600 text-uppercase g-brd-primary ">
                        <?= \Yii::t('skeeks/unify', 'Categories'); ?>
                    </h2>
                </div>

                <ul class="list-unstyled mb-0">

                    <? foreach ($parent->activeChildren as $child) : ?>

                        <li class="g-brd-bottom g-brd-gray-light-v4 g-pb-10 g-mb-12">
                            <i class="fa fa-angle-right g-color-gray-dark-v5 g-mr-5"></i>
                            <a class="<?= $child->id == $model->id ? "active g-color-primary" : "g-color-gray-dark-v1"; ?> u-link-v5 g-color-primary--hover"
                               href="<?= $child->url; ?>">
                                <?= $child->name; ?>
                                <!--<i class="fas fa-leaf float-right align-middle" style="color: gray;"></i>-->
                            </a>
                        </li>
                    <? endforeach; ?>

                </ul>

            <? endif; ?>

        </div>
    </div>

</div>
