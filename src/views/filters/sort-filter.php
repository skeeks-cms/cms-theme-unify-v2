<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */
/* @var $this yii\web\View */
/* @var $handler \skeeks\cms\shop\queryFilter\SortFiltersHandler */
/* @var $form \yii\widgets\ActiveForm */
/* @var $code string */
$widget = $this->context;
$id = \yii\helpers\Html::getInputId($handler, 'value');

$this->registerJs(<<<JS
            
$('.sx-filter-action').on('click', function()
{
    $("[data-value=sx-sort]").val($(this).data('filter-value'));
    $("[data-value=sx-sort]").change();
    return false;
});

JS
);
?>
<a href="#" class="sx-filter-action g-color-primary--hover <?= $handler->value == '-popular' ? "active g-color-primary g-font-weight-600" : "" ; ?>" data-filter="productfilters-sort" data-filter-value="-popular"><?= \Yii::t("skeeks/unify", "Pupular"); ?></a>
<a href="#" class="sx-filter-action g-color-primary--hover <?= $handler->value == '-new' ? "active g-color-primary g-font-weight-600" : "" ; ?>" data-filter="productfilters-sort" data-filter-value="-new"><?= \Yii::t("skeeks/unify", "New"); ?></a>
