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
\skeeks\assets\unify\base\UnifyHsHamburgersAsset::register($this);
\skeeks\assets\unify\base\UnifyHsMegamenuAsset::register($this);

$this->registerJs(<<<JS

// initialization of HSDropdown component
  $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
    
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
    <div class="u-header__section u-header__section--hidden u-header__section--dark">
        <? if ($this->theme->is_header_toolbar) : ?>
            <div class="g-bg-black sx-topbar g-py-7">
                <div class="container sx-container">
                    <div class="row flex-column flex-sm-row justify-content-between align-items-center text-uppercase g-font-weight-600 g-color-white g-font-size-12 g-mx-0--lg">
                        <div class="col-auto">
                            <i class="fas fa-phone g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                            <a href="tel:<?= $this->theme->phone; ?>" class="g-color-white g-color-white--hover">
                                <?= $this->theme->phone; ?>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                            <a href="mailto:<?= $this->theme->email; ?>" class="g-color-white g-color-white--hover">
                                <?= $this->theme->email; ?>
                            </a>
                        </div>
                        <div class="col-auto g-pos-rel">
                            <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                                <? if (\Yii::$app->user->isGuest) : ?>
                                    <li class="list-inline-item g-mx-4">
                                        <i class="far fa-user g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                                        <a class="g-color-white g-color-white--hover" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>">Вход</a>
                                    </li>
                                    <li class="list-inline-item g-mx-4">|</li>
                                    <li class="list-inline-item g-mx-4">
                                        <a class="g-color-white g-color-white--hover" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/register'); ?>">Регистрация</a>
                                    </li>
                                <? else : ?>
                                    <li class="list-inline-item g-mx-4">
                                        <i class="far fa-user g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                                        <a class="g-color-white g-color-white--hover" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>"><?= \Yii::$app->user->identity->displayName; ?></a>
                                    </li>
                                <? endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <div class="g-bg-white sx-header-middle-block g-hidden-xs-down">
            <div class="container sx-container g-pt-15 g-pb-15">
                <div class="row ">
                    <div class="col-sm-4 col-md-3">
                        <!-- Logo -->
                        <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand">
                            <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="col-md-6 col-sm-4">
                        <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                            <div class="sx-search-form">
                                <form action="<?= \yii\helpers\Url::to(['/cmsSearch/result/index']); ?>" method="get" style="margin-bottom: 0px;">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <!--<label for="search" class="sr-only"><? /*= Yii::t("skeeks/unify", "Search"); */ ?></label>-->
                                            <div class="input-group">
                                                <input placeholder="Поиск..." for="search" type="text" class="form-control rounded-0 form-control-md"
                                                       name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"
                                                       value="<?= \Yii::$app->cmsSearch->searchQuery; ?>"/>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-md btn-secondary sx-btn-search rounded-0"><?= Yii::t("skeeks/unify", "Find"); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <? endif; ?>
                    </div>
                    <div class="col-md-3 col-sm-4 ">
                        <div class="text-center">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="u-header__section u-header__section--dark g-py-10 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container sx-container">
                <!-- Responsive Toggle Button -->
                <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button" aria-label="Toggle navigation" aria-expanded="false"
                        aria-controls="navBar" data-toggle="collapse" data-target="#navBar">
                      <span class="hamburger hamburger--slider">

                    <span class="hamburger-box">

                      <span class="hamburger-inner"></span>
                      </span>
                      </span>
                </button>
                <!-- End Responsive Toggle Button -->

                <!-- Logo -->
                <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand d-block d-sm-none">
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

                <?= @$content; ?>


            </div>


        </nav>
    </div>
</header>
<!-- End Header -->
