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
$this->registerCss(<<<CSS
.sx-main-menu ul {
    margin-left: 0 !important;
}
CSS
);

$this->registerJs(<<<JS

    // initialization of HSDropdown component
    $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
    afterOpen: function(){
      $(this).find('input[type="search"]').focus();
    }
    });

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

JS
);
?>

<!-- Header -->
<!--u-header--sticky-top-->
<header id="js-header" class="<?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?> <?= $this->theme->header_shadow; ?> u-header u-header--toggle-section u-header--change-appearance" data-header-fix-moment="100" data-header-fix-effect="slide">
    <!-- Top Bar -->
    <!--u-header__section--hidden -->
    <div class="u-header__section u-header__section--hidden g-py-7 d-none d-sm-block g-bg-white">
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

                <div class="col-auto"  itemscope itemtype="http://schema.org/Organization">
                    <meta itemprop="name" content="<?=$this->theme->title; ?>">
                    <meta itemprop="telephone" content="<?=$this->theme->phone; ?>">
                    <meta itemprop="address" content="<?=$this->theme->address; ?>">
                    <meta itemprop="email" content="<?=$this->theme->email; ?>">
                    <!-- Logo -->
                    <a href="<?=\yii\helpers\Url::base(true);?>" title="<?= $this->theme->title; ?>" class="sx-main-logo" itemprop="url">
                        <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>" itemprop="logo">
                        <? if ($this->theme->logo_text) : ?>
                            <span class="sx-logo-text">
                                <?= $this->theme->logo_text; ?>
                            </span>
                        <? endif; ?>

                    </a>
                    <!-- End Logo -->
                </div>
                <div class="col-auto g-pos-rel g-color-black g-font-size-18 h1 g-font-weight-700">
                    <?= $this->theme->title; ?>
                </div>
                <div class="col-auto">
                    <a href="#sx-callback" data-toggle="modal" class="btn btn-lg btn-primary u-btn-primary g-rounded-50 g-font-size-14">Обратный звонок</a>
                </div>


                <div class="col-auto g-pos-rel g-color-black sx-parners">
                    <? if ($this->theme->phone) : ?>
                        <a href="tel:<?= $this->theme->phone; ?>" target="_blank" title="Телефон для связи" class="g-mr-10">
                            <?= $this->theme->phone; ?>
                        </a>
                        <br/>
                    <? endif; ?>

                    <? if ($this->theme->email) : ?>

                        <a href="mailto:<?= $this->theme->email; ?>" target="_blank" title="Email для связи">
                            <?= $this->theme->email; ?>
                        </a>
                    <? endif; ?>


                </div>
                <div class="col-auto g-pos-rel g-color-black">
                    <ul class="list-inline">
                        <? if ($this->theme->vk) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->vk; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-vk"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->youtube) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->youtube; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <? endif; ?>


                        <? if ($this->theme->instagram) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->instagram; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->facebook) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->facebook; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <? endif; ?>

                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="u-header__section u-header__section--dark g-py-0 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
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
                <a href="<?=\yii\helpers\Url::base(true);?>" title="<?= $this->theme->title; ?>" class="navbar-brand d-block d-sm-none">
                    <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--sm sx-main-menu" id="navBar">

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