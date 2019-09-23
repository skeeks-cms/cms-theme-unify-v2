 /**
  * @link https://cms.skeeks.com/
  * @copyright Copyright (c) 2010 SkeekS
  * @license https://cms.skeeks.com/license/
  * @author Semenov Alexander <semenov@skeeks.com>
  */
(function(sx, $, _)
{
    sx.classes.Filters = sx.classes.Component.extend({

        _onDomReady: function()
        {
            var jHiddenWrapper = $('.sx-hidden-filters');
            $("input", jHiddenWrapper).on('change', function () {
                $(this).closest('form').submit();

            });
            $('body').on("click", ".sx-btn-filter", function() {
                $('.sx-filters-block').animate({left: '0'});
                return false;
            });

            $('body').on("click", ".sx-mobile-filters-hide", function() {
                $('.sx-filters-block').animate({left: '-100%'});
                return false;
            });

            $('body').on("click", ".sx-btn-sort", function () {
                $('.sorting').fadeToggle();
                return false;
            });
        }
    });
})(sx, sx.$, sx._);