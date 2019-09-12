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
            $('.sx-btn-filter').click(function () {
                $('.sx-filters-block').animate({right: '0'});
                return false;
            });
            
            $('.sx-mobile-filters-hide').click(function () {
                $('.sx-filters-block').animate({right: '-100%'});
                return false;
            })
        }
    });
})(sx, sx.$, sx._);