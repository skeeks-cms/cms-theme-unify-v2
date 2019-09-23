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
                    'class' : 'fa fa-times',
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
                    'class' : 'fa fa-times',
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
if (\Yii::$app->mobileDetect->isMobile) {
    $this->registerJs(<<<JS
        $('.sx-sorting-block').append($('.sorting'));
JS
);
}
$widget = $this->context;
?>
<!--<div id="stickyblock-start" class="js-scrollbar h-100 g-bg-white g-pa-5 js-sticky-block" data-start-point="#stickyblock-start" data-end-point=".sx-footer" data-has-sticky-header="true">-->
<!--js-scrollbar g-height-280-->
<div class="sx-filters-block">
    <div>
        <a href="#" class="sx-mobile-filters-hide"><i class="fa fa-close g-font-weight-100 g-font-size-12"></i></a>
        <h2 class="h5 u-heading-v3__title g-font-weight-600 text-uppercase g-brd-primary ">
            Фильтры
        </h2>
    </div>
    <!--<div class="h-100">-->

    <? $form = \yii\widgets\ActiveForm::begin([
        'method'  => 'post',
        //'action' => "/" . \Yii::$app->request->pathInfo,
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



<?


$this->registerJs(<<<JS
$(window).on('load', function () {
        // initialization of sticky blocks
setTimeout(function() { // important in this case
  $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
}, 1);
});
JS
);


$this->registerJs(<<<JS



$('.filter--group').each(function(){
    var group = $(this),
        groupHeader = group.find('.filter--group--header'),
        classOpen = 'opened',
        showMore = group.find('.filter--show-more a'),
        showMoreTxt = showMore.find('.txt'),
        hiddenCont = group.find('.filter--hidden');

    groupHeader.click(function(){
        if (!group.hasClass(classOpen)) {
            group.addClass(classOpen);
        } else {
            group.removeClass(classOpen);
        }
    });

    showMore.click(function(e){
        e.preventDefault();

        if (hiddenCont.is(':hidden')) {
            hiddenCont.show();
            showMoreTxt.text('Скрыть');
        } else {
            hiddenCont.hide();
            showMoreTxt.text('Показать еще');
        }
    });
});
$("#sx-filters-form").fadeIn();
$('.sx-filters-checkbox-options').each(function () {
    var jContainer = $(this);
    var checkboxes = $('.checkbox', $(this));
    if (checkboxes.length > 4) {
        
        var last = 4;
        var counter = 0;
        checkboxes.each(function (){ 
            counter = counter + 1;
            if ($('input', $(this)).is(":checked")) {
                last = counter;
            }
        });
        
        counter = 0;
        var hiddenCount = 0;
        checkboxes.each(function (){ 
            counter = counter + 1;
            if (counter > last) {
                hiddenCount = hiddenCount + 1;
                $(this).addClass('sx-filter-option-hidden');
            }
        });
        var jLink = $("<a>", {'href' : '#', 'class' : 'dashed-link'}).append('<span class="txt">Показать еще</span> ' + hiddenCount); 
        var jLinkHide = $("<a>", {'href' : '#', 'class' : 'dashed-link'}).append('<span class="txt">Скрыть</span> ' + hiddenCount);
        jLinkHide.hide();
        
        $(this).append(
            $('<div>', {'class' : 'filter--show-more show_all_property'}).append(jLink).append(jLinkHide)
        );
        
        jLink.on('click', function () {
            $('.sx-filter-option-hidden', jContainer).addClass('sx-filter-option-visible');
            jLink.hide();
            jLinkHide.show();
            return false;
        });
        
        jLinkHide.on('click', function () {
            $('.sx-filter-option-visible', jContainer).removeClass('sx-filter-option-visible');
            jLink.show();
            jLinkHide.hide();
            return false;
        });
    }
});
JS
);
?>
