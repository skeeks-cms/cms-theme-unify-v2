<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\themes\unify\widgets\filters\FiltersWidget */
\skeeks\cms\themes\unify\widgets\filters\assets\FiltersWidgetAsset::register($this);
$this->registerCss(<<<CSS
#sx-filters-form {
    display: none;
}
CSS
);
$this->registerJs(<<<JS
new sx.classes.Filters();
new sx.classes.filters.SliderRange();
new sx.classes.FiltersForm();
JS
);

$widget = $this->context;
?>
<!--<div id="stickyblock-start" class="js-scrollbar h-100 g-bg-white g-pa-5 js-sticky-block" data-start-point="#stickyblock-start" data-end-point=".sx-footer" data-has-sticky-header="true">-->
<!--js-scrollbar g-height-280-->
<div class="sx-filters-block">
    <div class="sx-filters-block-header">
        <a href="#" class="sx-mobile-filters-hide sx-main-text-color">
            <i class="hs-icon hs-icon-close"></i>
        </a>
        <div class="h5 u-heading-v3__title sx-col-left-title g-brd-primary">
            <?= Yii::t('skeeks/unify', 'Filters'); ?>
        </div>
    </div>
    <!--<div class="h-100">-->

    <?
    $widget->activeFormConfig = \yii\helpers\ArrayHelper::merge($widget->activeFormConfig, [
        'options' => [
            'id'    => 'sx-filters-form',
            'class' => 'sx-filters-form',
            'data'  => [
                'pjax' => new \yii\helpers\UnsetArrayValue(),
            ],
        ],
    ]);

    $form = \yii\widgets\ActiveForm::begin($widget->activeFormConfig); ?>
    <? foreach ($widget->handlers as $filtersHandler) : ?>
        <?= $filtersHandler->render($form); ?>
    <? endforeach; ?>

    <? if (\Yii::$app->request->get(\Yii::$app->cmsSearch->searchQueryParamName)) : ?>
        <input type="hidden" value="<?= \Yii::$app->cmsSearch->searchQuery; ?>" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"/>
    <? endif; ?>
    <div style="display: none;">
        <?php if($catalogView = \Yii::$app->request->get('sx-catalog-view')) : ?>
            <input type="hidden" value="<?= $catalogView; ?>" name="sx-catalog-view"/>
        <?php endif; ?>

        <button type="submit" class="btn btn-default">Применить</button>
    </div>
    <? \yii\widgets\ActiveForm::end(); ?>
    <!--</div>-->
</div>

