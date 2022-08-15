 /**
  * @link https://cms.skeeks.com/
  * @copyright Copyright (c) 2010 SkeekS
  * @license https://cms.skeeks.com/license/
  * @author Semenov Alexander <semenov@skeeks.com>
  */
 
(function(sx, $, _)
{
    sx.createNamespace('classes.filters', sx);
    /**
     * Слайдер диапазона в фильтрах
     */
    sx.classes.filters.SliderRange = sx.classes.Component.extend({
        onDomReady: function() {
            /*$(".sort-slider__input .form-group").on("click", function () {
                $('input', $(this)).removeAttr('disabled').focus();
            });*/

            if ($('.slider-range').length) {
                $('.slider-range').each(function () {
                    
                    var $range = $(this);
                        
                    var $input1 = $(this).parents('.sort-slider').find('.sx-from');
                    var $input2 = $(this).parents('.sort-slider').find('.sx-to');
                    
                    $input1Value = $input1.val();
                    $input2Value = $input2.val();
                    
                    var min = $range.data('min');
                    var max = $range.data('max');
                        
                    var track = function(e) {
                        var $this = $(this),
    
                        from = $this.data("from"),
                        to = $this.data("to");

                        var price1 = $this.parents('.sort-slider').find('.sx-from');
                        var price2 = $this.parents('.sort-slider').find('.sx-to');

                        /*console.log(price1.val());
                        console.log(price2.val());
                        console.log(from);
                        console.log(to);
                        console.log("-------");*/

                        if (min != from) {
                            price1.val(from);
                            price1.focus();
                            price1.removeAttr('disabled');
                            price1.select();
                        } else {
                            price1.attr('disabled', 'disabled');
                            price1.attr('placeholder', min);
                            price1.val("");
                        }
                        if (max != to) {
                            price2.val(to);
                            price2.focus();
                            price2.select();
                            price2.removeAttr('disabled');
                        } else {
                            price2.attr('disabled', 'disabled');
                            price2.attr('placeholder', max);
                            price2.val("");
                        }
                    };
                    
                    var step = 1;
                    if ($range.data('step')) {
                        step = $range.data('step')
                    }
                    $range.ionRangeSlider({
                        hide_min_max: true,
                        hide_from_to: true,
                        force_edges: true,
                        keyboard: true,
                        min: min,
                        max: max,
                        from: $input1Value,
                        to: $input2Value,
                        type: 'double',
                        step: step,
                        grid: false,
                        onFinish: function () {
                            $input1.change();
                        },
                    });
                    $range.on("change", track);
                    
                    var instance = $range.data("ionRangeSlider");
                    
                    $input1.on("change", function(){
                        instance.update({
                            from: $input1.val()
                        });
                    });
                    
                    $input2.on("change", function(){
                        instance.update({
                            to: $input2.val()
                        });
                    });
                });
                
                
                
            
            }
        }
    });
})(sx, sx.$, sx._);