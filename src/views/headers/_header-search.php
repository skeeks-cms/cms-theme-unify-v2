<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
\skeeks\assets\unify\base\UnifyIconSimpleLineAsset::register($this);
$this->registerJs(<<<JS
    $('body').on('submit', '.sx-search-form', function() {
        //alert('111');
        sx.block($("body"));
    });

    var searchSelector = '.sx-search-form';
    var searchBtnSelector = '.sx-search-btn';

    $(searchSelector).each(function() {
        var \$searchForm = $(this);
        var isMobileHeaderSearch = \$searchForm.closest('.sx-top-search-in-mobile').length > 0;
        var headerHeight = $(".u-header").height();
        var searchHeight = \$searchForm.innerHeight();

        if (searchHeight > headerHeight) {
            headerHeight = searchHeight;
        }

        var hiddenTop = isMobileHeaderSearch ? '-' + headerHeight + 'px' : '-120px';
        \$searchForm.data('sx-search-hidden-top', hiddenTop);

        if (isMobileHeaderSearch && $(window).width() <= 768) {
            \$searchForm.css({top: '100%', display: 'none'});
        } else {
            \$searchForm.css({top: hiddenTop});
        }
    });
    
    $('body').on('click', searchBtnSelector, function() {
        var \$searchBtn = $(this);
        var \$searchForm = \$searchBtn.closest('.sx-search-btn-block').next(searchSelector);
        if (!\$searchForm.length) {
            \$searchForm = $(searchSelector).first();
        }
        var hiddenTop = \$searchForm.data('sx-search-hidden-top') || '-120px';
        var isMobileHeaderSearch = \$searchForm.closest('.sx-top-search-in-mobile').length > 0;
        var isMobileSearch = isMobileHeaderSearch && $(window).width() <= 768;
        if (\$searchBtn.hasClass('sx-search-form-close')){
            if (isMobileSearch) {
                \$searchForm.stop(true, true).slideUp(150);
            } else {
                \$searchForm.animate({top: hiddenTop});
            }
            \$searchBtn.removeClass('sx-search-form-close');
            return false;
        }
        else {
            if (isMobileSearch) {
                \$searchForm.stop(true, true).css({top: '100%'}).slideDown(150);
            } else {
                \$searchForm.animate({top: '100%'});
            }
            \$searchForm.find('input').focus();
            \$searchBtn.addClass('sx-search-form-close');
            return false;
        }
    });
JS
);
?>
<div class="sx-header-menu-item sx-search-btn-block">
    <a href="#" class="sx-search-btn sx-icon-wrapper g-text-underline--none--hover" aria-label="Поиск" title="Поиск">
        <i class="icon-magnifier"></i>
    </a>
</div>
<div class="sx-header-menu-item sx-search-form sx-invisible-search-block">
    <form action="<?= \yii\helpers\Url::to(['/cmsSearch/result/index']); ?>" method="get">
        <div class="container">
            <div class="row">
                <div class="input-group">
                    <input autocomplete="off" placeholder="<?= Yii::t("skeeks/unify", "Search"); ?>..." type="text" class="form-control rounded-0"
                           name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"
                           value="<?= \Yii::$app->cmsSearch->searchQuery; ?>">
                    <div class="input-group-append">
                        <button class="btn btn-md btn-secondary rounded-0 sx-btn-search" type="submit"><?= Yii::t("skeeks/unify", "Find"); ?></button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>
