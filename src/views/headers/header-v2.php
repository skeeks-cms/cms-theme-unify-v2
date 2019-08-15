<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
\skeeks\assets\unify\base\UnifyHsHeaderAsset::register($this);
//$this->theme->bodyCssClass = $this->theme->bodyCssClass . " g-mt-80";

$this->registerJs(<<<JS
$(window).on('load', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });
    
    $('#dropdown-megamenu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 767
    });
    
});
JS
);
?>
<!-- Header -->
<!--<header id="js-header" class="u-header u-header--static u-header--show-hide u-header--change-appearance" data-header-fix-moment="500" data-header-fix-effect="slide">-->
<header id="js-header" class="sx-no-print u-header <?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?>  u-header--show-hide   u-header--change-appearance" data-header-fix-moment="300" data-header-fix-effect="slide">
    <!--u-header u-header--static u-header--show-hide u-header--change-appearance u-header--untransitioned-->
    <!--g-bg-primary-gradient-opacity-v1-->
    <div class="u-header__section g-bg-black u-header__section--dark g-transition-0_3 g-py-10 sx-brd--bottom sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <!-- Responsive Toggle Button -->
            <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                      <span class="hamburger hamburger--slider">

                    <span class="hamburger-box">

                      <span class="hamburger-inner"></span>
                      </span>
                      </span>
            </button>
            <!-- End Responsive Toggle Button -->
            <!-- Logo -->
            <a href="<?= \yii\helpers\Url::home(); ?>" class="navbar-brand" title="<?= $this->theme->title; ?>">
                <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                <? if ($this->theme->logo_text) : ?>
                    <span class="sx-logo-text">
                        <?= $this->theme->logo_text; ?>
                    </span>
                <? endif; ?>
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40" id="navBar">

                <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                    'namespace'       => 'menu-top',
                    'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/menu-top',
                    'label'           => 'Верхнее меню',
                    'level'           => '1',
                    'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
                ]); ?>
            </div>
            <!-- End Navigation -->

            <?= @$content; ?>
            
            <!-- Search -->

            <div class="sx-header-auth g-pos-abs g-top-18 g-right-65 g-pos-rel--lg g-top-0--lg g-right-0--lg g-pt-3--lg g-ml-30 g-ml-0--lg">

                <? if (\Yii::$app->user->isGuest) : ?>
                    <a class="d-block u-link-v5 g-color-white-opacity-0_8 g-font-weight-600" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>"><i class="fa fa-sign-in"></i> Вход</a>
                <? else : ?>

                    <!-- Top User -->
                    <a class="d-block u-link-v5 g-color-white-opacity-0_8 g-font-weight-600 " href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>">
                        <span class="g-pos-rel">
                            <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                            <img class="g-width-30 g-width-30--md g-height-30 g-height-30--md rounded-circle" src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                        </span>
                        <span class="g-pos-rel g-top-2">
                            <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->displayName; ?></span>
                        </span>
                    </a>
                <? endif; ?>
            </div>
            <!-- End Search -->
        </nav>
        
    </div>
</header>
<!-- End Header -->