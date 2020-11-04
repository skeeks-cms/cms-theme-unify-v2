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

(function(sx, $, _)
{
    sx.classes.FiltersForm = sx.classes.Component.extend({

        _onDomReady: function()
        {
            var self = this;
            this.JqueryForm = $("#sx-filters-form");
            this.jFilterFormWrapper = $(".sx-filters-form");
            
            if ($(".form-group", this.JqueryForm).length > 0)
            {
                $("button", self.JqueryForm).fadeIn();
            }

            $("input, checkbox, select", this.JqueryForm).on("change", function()
            {
                if ($(this).data('no-submit'))
                {
                    return false;
                }

                self.JqueryForm.submit();
            });
            
            
            var jSelectedWrapper = $(".sx-filters-selected-wrapper");
            
            $("input[type=checkbox]:checked", this.jFilterFormWrapper).each(function() {
                
                var jOption = $(this); 
                var text = $(this).closest('div').find('label').text(); 
                
                var jRemoveBtn = $("<i>", {
                    'class' : 'hs-icon hs-icon-close',
                    'title' : 'Отменить выбранную опцию',
                });
                
                var jBtn = $("<button>", {
                    'href' : '#', 
                    'class' : 'btn btn-default btn-sm g-mr-10 g-mb-10',
                    'title' : jOption.closest(".filter--group").find('header').text(),
                })
                    .append(text)
                    .append(" ")
                    .append(jRemoveBtn)
                ;
                
                jSelectedWrapper.append(jBtn);
                
                jRemoveBtn.on('click', function() {
                    jOption.click(); 
                    jBtn.fadeOut();
                    jBtn.remove();
                    return false;
                });
            });
            
            $(".sx-filter-selected .range-slider", this.jFilterFormWrapper).each(function() {
                var From = $(this).data('from');
                var To = $(this).data('to');
                var Min = $(this).data('min');
                var Max = $(this).data('max');
                
                
                var jOption = $(this); 
                var text = "от " + new Intl.NumberFormat('ru-RU').format(From) + " до " + new Intl.NumberFormat('ru-RU').format(To) + $(this).data('postfix'); 
                
                var jRemoveBtn = $("<i>", {
                    'class' : 'fas fa-times',
                    'title' : 'Отменить выбранную опцию',
                });
                
                var jBtn = $("<button>", {
                    'href' : '#', 
                    'class' : 'btn btn-default btn-sm g-mr-10 g-mb-10',
                    'title' : jOption.closest(".filter--group").find('header').text(),
                })
                    .append(text)
                    .append(" ")
                    .append(jRemoveBtn)
                ;
                
                jSelectedWrapper.append(jBtn);
                
                jRemoveBtn.on('click', function() {
                    jOption.click(); 
                    jBtn.fadeOut();
                    jBtn.remove();
                    return false;
                });
                
            });
        }
    });

    new sx.classes.FiltersForm();
})(sx, sx.$, sx._);

JS
);

$widget = $this->context;
?>
<!--<div id="stickyblock-start" class="js-scrollbar h-100 g-bg-white g-pa-5 js-sticky-block" data-start-point="#stickyblock-start" data-end-point=".sx-footer" data-has-sticky-header="true">-->
<!--js-scrollbar g-height-280-->
<div class="sx-filters-block">
    <div class="sx-filters-block-header">
        <a href="#" class="sx-mobile-filters-hide">&#65794;</a>
        <div class="h5 u-heading-v3__title sx-col-left-title g-brd-primary">
            <?= Yii::t('skeeks/unify', 'Filters'); ?>
        </div>
    </div>
    <!--<div class="h-100">-->

    <? $form = \yii\widgets\ActiveForm::begin([
        'method'  => 'post',
        'action' => null,
        'options' => [
            'id'    => 'sx-filters-form',
            'class' => 'sx-filters-form',
            'data'  => [
                'pjax' => 1,
            ],
        ],
    ]); ?>
    <? foreach ($widget->handlers as $filtersHandler) : ?>
        <?= $filtersHandler->render($form); ?>
    <? endforeach; ?>

    <? if (\Yii::$app->request->get(\Yii::$app->cmsSearch->searchQueryParamName)) : ?>
        <input type="text" value="<?= \Yii::$app->cmsSearch->searchQuery; ?>" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"/>
    <? endif; ?>
    <div style="display: none;">
        <button type="submit" class="btn btn-default">Применить</button>
    </div>
    <? \yii\widgets\ActiveForm::end(); ?>
    <!--</div>-->
</div>

