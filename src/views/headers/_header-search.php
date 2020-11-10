<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
\skeeks\assets\unify\base\UnifyIconSimpleLineAsset::register($this);
$this->registerJs(<<<JS
                    $('body').on('click','.sx-search-btn', function() {
                        if ($(this).hasClass('sx-search-form-close')){
                            $('.sx-search-form').animate({top: '-120px'});
                            $('.sx-search-btn').removeClass('sx-search-form-close');
                            return false;
                        }
                        else {
                            $('.sx-search-form').animate({top: '100%'});
                            $('.sx-search-btn').addClass('sx-search-form-close');
                            return false;
                        }
                       
                    });
JS
);
?>
<div class="sx-header-menu-item sx-search-btn-block">
    <a href="#" class="sx-search-btn sx-icon-wrapper">
        <i class="icon-magnifier"></i>
    </a>
</div>
<div class="sx-search-form sx-invisible-search-block">
    <form action="<?= \yii\helpers\Url::to(['/cmsSearch/result/index']); ?>" method="get">
        <div class="container">
            <div class="row">
                <div class="input-group">
                    <input placeholder="<?= Yii::t("skeeks/unify", "Search"); ?>..." type="text" class="form-control rounded-0"
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