<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 13.11.2017
 */
/* @var $this yii\web\View */
/* @var $handler \skeeks\cms\queryFilters\EavFiltersHandler */
/* @var $widget \skeeks\cms\eavqueryfilter\CmsEavQueryFilterHandler */
/* @var $form \yii\widgets\ActiveForm */
/* @var $code string */
$widget = $this->context;
?>
<? foreach ($handler->toArray() as $code => $value) : ?>

    <?
    /**
     * @var $rp \skeeks\cms\relatedProperties\models\RelatedPropertyModel
     */
    $rp = $handler->getRPByCode($code);
    ?>
    <? if ($rp && in_array($rp->property_type, [
            \skeeks\cms\relatedProperties\PropertyType::CODE_NUMBER,
            \skeeks\cms\relatedProperties\PropertyType::CODE_RANGE,
        ])) : ?>
        <?
        $min = $handler->getMinValue($rp);
        $max = $handler->getMaxValue($rp);

        $val1Name = $handler->getAttributeNameRangeFrom($rp->id);
        $val1 = $handler->{$val1Name} ? $handler->{$val1Name} : $min;

        $val2Name = $handler->getAttributeNameRangeTo($rp->id);
        $val2 = $handler->{$val2Name} ? $handler->{$val2Name} : $max;

        $fromId = \yii\helpers\Html::getInputId($handler, $handler->getAttributeNameRangeFrom($rp->id));
        $toId = \yii\helpers\Html::getInputId($handler, $handler->getAttributeNameRangeTo($rp->id));
        $id = \yii\helpers\Html::getInputId($handler, $handler->getAttributeName($rp->id));

        $selectedValue = "";
        if ($val1 != $min) {
            $selectedValue .= "от ".\Yii::$app->formatter->asInteger($val1);
        }
        if ($val2 != $max) {
            $selectedValue .= " до ".\Yii::$app->formatter->asInteger($val2);
        }
        
        if ($selectedValue && $rp->cmsMeasure) {
            $selectedValue .= " " . $rp->cmsMeasure->symbol;
        }
        

        ?>
        <? if ($min != $max
            //&& $max > 0
        ) : ?>
        <div class="dropdown sx-inline-filter <?= ($val1 != $min || $val2 != $max) ? "opened sx-filter-selected" : "" ?>">
            <button class="dropdown-toggle btn btn-default" data-toggle="dropdown">
                <?= $rp->name; ?>
                <? if ($val1 != $min || $val2 != $max) : ?>
                    <small>(<?= $selectedValue; ?>)</small>
                <? endif; ?>
                    
                <? if ($rp->hint) : ?>
                    <i class="far fa-question-circle" data-toggle="tooltip" title="<?= $rp->hint; ?>"></i>
                <? endif; ?>
            </button>
            <div class="dropdown-menu sort-slider" aria-labelledby="dropdownMenuButton">
                <section class="filter--group">
                    <div class="filter--group--body sort-slider sx-project-slider-skin">
                        <div class="filter--group--inner">
                            <div class="sort-slider__row">
                                <div class="sort-slider__input my-auto">
                                    <?= $form->field($handler, $handler->getAttributeNameRangeFrom($rp->id))->textInput([
                                        'id'          => $id.'-from',
                                        'value'       => $val1 == $min ? "" : $val1,
                                        'placeholder' => $val1 == $min ? $val1 : "",
                                        'class'       => 'sx-from form-control',
                                    ])->label(false); ?>
                                </div>
                                <span class="sort-slider__devide my-auto">—</span>
                                <div class="sort-slider__input my-auto">
                                    <?= $form->field($handler, $handler->getAttributeNameRangeTo($rp->id))->textInput([
                                        'id'          => $id.'-to',
                                        'value'       => $val2 == $max ? "" : $val2,
                                        'placeholder' => $val2 == $max ? $val2 : "",
                                        'class'       => 'sx-to form-control',
                                    ])->label(false); ?>
                                </div>
                                <?php if ($rp->cmsMeasure) : ?>
                                    <span class="sort-slider__measure my-auto"><?php echo $rp->cmsMeasure->symbol; ?></span>
                                <?php endif; ?>
                            </div>

                            <input type="text"
                                   id="<?= $id ?>"
                                   class="slider-range"
                                   data-no-submit="true"
                                   data-type="double"
                                   data-min="<?= $min ?>"
                                   data-max="<?= $max ?>"
                                   data-from="<?= $val1; ?>"
                                   data-to="<?= $val2; ?>"
                                   data-postfix=""/>

                        </div>
                </section>
            </div>
        </div>

        <? endif; ?>
    <? elseif ($rp && in_array($rp->property_type, [
            \skeeks\cms\relatedProperties\PropertyType::CODE_ELEMENT,
            \skeeks\cms\relatedProperties\PropertyType::CODE_LIST,
        ]))
        : ?>

        <? if ($options = $handler->getOprionsByRp($rp)) : ?>
            <? if (count($options) > 1) : ?>

                <?
                foreach ($options as $id => $val) {
                    $options[$id] = \Yii::t('app', $val);
                }
                $code = $handler->getAttributeName($rp->id);
                $values = $handler->{$code};
                $class = '';
                if (in_array($rp->id, (array)$handler->openedPropertyIds)) {
                    $class = 'opened';
                }

                if ($values) {
                    $class = 'opened sx-filter-selected';

                    $newOptions = [];
                    foreach ($values as $value) {
                        $newOptions[$value] = $options[$value];
                        unset($options[$value]);
                    }
                    if ($newOptions) {
                        $options = \yii\helpers\ArrayHelper::merge($newOptions, $options);
                    }
                }

                $info = '';
                if ($rp->hint) {
                    $info = "<i class='far fa-question-circle' data-toggle='tooltip' title='{$rp->hint}'></i>";
                }

                $searchOptions = "";
                if (count($options) > 3) {
                    $searchOptions = <<<HTML
<div class="filter-search__input js-filter-search-hide" style="display: none;">
    <input type="text" class="form-control" placeholder="Введите название">
</div>
HTML;

                }

                ?>

                <?
                $rp->name = \Yii::t('app', $rp->name);
                if ($values) {

                    //$rp->name = \Yii::t('app', $rp->name) . " (" . count($values) . ")";
                    $rp->name = $rp->name." <small>(".count($values).")</small>";
                }
                ?>




                <?= $form->field($handler, $code, [
                    'options'  => [
                        'class' => 'dropdown sx-inline-filter '.$class,
                        'tag'   => 'div',
                    ],
                    'template' => <<<HTML
<a href="#" class="dropdown-toggle btn btn-default" data-toggle="dropdown">{$rp->name} {$info}</a>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <div class="filter--group">
        <div class="filter--group--body">
            {$searchOptions}
            <div class="js-scrollbar" style="max-height: 280px;">
            {input}
            </div>
        </div>
    </div>
</div>
HTML
                    ,
                ])->checkboxList(
                    $options
                    , [
                    'class' => 'sx-filters-checkbox-options filter--group--inner',
                    'item'  => function ($index, $label, $name, $checked, $value) use ($rp) {
                        $input = \yii\helpers\Html::checkbox($name, $checked, [
                            'id'    => 'filter-check-'.$rp->id."-".$index,
                            'value' => $value,
                        ]);
                        return <<<HTML
<div class="checkbox">
{$input}
<label for="filter-check-{$rp->id}-{$index}">{$label}</label>
</div>
HTML;

                    },
                ]); ?>


            <? endif; ?>
        <? endif; ?>


    <? endif; ?>

<? endforeach; ?>

