<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @see https://htmlstream.com/public/preview/unify-v2.6.1/unify-main/shortcodes/headers/classic-header--topbar-1.html */

\skeeks\assets\unify\base\UnifyHsDropdownAsset::register($this);
\skeeks\assets\unify\base\UnifyHsHeaderAsset::register($this);

$this->registerJs(<<<JS

// initialization of HSDropdown component
  $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
    afterOpen: function(){
      $(this).find('input[type="search"]').focus();
    }
  });

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
<!--u-header--sticky-top-->
<header id="js-header" class="u-shadow-v19 u-header <?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?> u-header--toggle-section u-header--change-appearance" data-header-fix-moment="0">
    <!-- Top Bar -->
    <!--u-header__section--hidden -->
    <div class="u-header__section u-header__section--hidden u-header__section--dark g-bg-black g-py-7 sx-topbar">
        <div class="container">
            <div class="row flex-column flex-sm-row justify-content-between align-items-center text-uppercase g-font-weight-600 g-color-white g-font-size-12 g-mx-0--lg">
                <!--<div class="col-auto">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a href="#!" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-tumblr"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="g-color-white g-color-primary--hover g-pa-3">
                                <i class="fa fa-google"></i>
                            </a>
                        </li>
                    </ul>
                </div>-->

                <div class="col-auto">
                    <i class="fa fa-phone g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                    <a href="tel:<?= $this->theme->phone; ?>" class="g-color-white g-color-white--hover">
                        <?= $this->theme->phone; ?>
                    </a>
                </div>

                <div class="col-auto">
                    <i class="fa fa-envelope g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                    <a href="mailto:<?= $this->theme->email; ?>" class="g-color-white g-color-white--hover">
                        <?= $this->theme->email; ?>
                    </a>
                </div>

                <div class="col-auto g-pos-rel">
                    <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                        <? if (\Yii::$app->user->isGuest) : ?>
                            <li class="list-inline-item g-mx-4">
                                <i class="fa fa-user g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                                <a class="g-color-white g-color-white--hover" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>">Вход</a>
                            </li>
                            <li class="list-inline-item g-mx-4">|</li>
                            <li class="list-inline-item g-mx-4">
                                <a class="g-color-white g-color-white--hover" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/register'); ?>">Регистрация</a>
                            </li>
                        <? else : ?>
                            <li class="list-inline-item g-mx-4">
                                <i class="fa fa-user g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                                <a class="g-color-white g-color-white--hover" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>"><?= \Yii::$app->user->identity->displayName; ?></a>
                            </li>
                        <? endif; ?>

                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="u-header__section u-header__section--light g-bg-white-opacity-0_8 g-py-10 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-bg-white-opacity-0_8 g-py-10" data-header-fix-moment-classes="g-bg-white u-shadow-v18 g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container">
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
                <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand">
                    <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">

                    <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                        'namespace'       => 'menu-top',
                        'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/menu-top',
                        'label'           => 'Верхнее меню',
                        'level'           => '1',
                        'enabledRunCache' => \skeeks\cms\components\Cms::BOOL_N,
                    ]); ?>

                </div>
                <!-- End Navigation -->


            </div>


        </nav>
    </div>
</header>
<!-- End Header -->
