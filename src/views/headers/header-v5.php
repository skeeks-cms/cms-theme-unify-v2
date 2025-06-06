<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/* @see https://htmlstream.com/public/preview/unify-v2.6.1/unify-main/shortcodes/headers/classic-header--topbar-1.html */


\skeeks\assets\unify\base\UnifyHsHeaderAsset::register($this);
\skeeks\assets\unify\base\UnifyHsMegamenuAsset::register($this);
$this->registerJs(<<<JS
/*window.addEventListener('load', function() {
    alert(3);
});*/
//$(window).on('load', function () {
    $.HSCore.components.HSHeader.init($('#js-header'));
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });
    
//});

JS
);
$this->registerCss(<<<CSS
.sx-header-top {

}
.sx-header-top:before {
    position: absolute;
    right: 0;
    bottom: 0;
    left: 0;
    height: 1px;
    background: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgb(240 135 31) 50%, rgba(255, 255, 255, 0) 100%);
    content: "";
}
.js-header-change-moment .sx-header-second {
    /*display: none;*/
}
.sx-main-menu-wrapper {
    background-color: linear-gradient(180deg, rgba(0, 0, 0, 0.5) 0%, rgba(0, 0, 0, 0) 100%);
    /*background-color: rgba(46, 40, 38, 0.8);;*/
    transition: all 200ms ease;
    /*-webkit-backdrop-filter: blur(5px);
    backdrop-filter: blur(5px);*/
}
.sx-header-transparent .sx-main-menu-wrapper.js-header-change-moment {
    -webkit-backdrop-filter: blur(5px);
    backdrop-filter: blur(5px);
}
CSS
);

if ($this->theme->is_center_logo) {
    $this->registerCss(<<<CSS
@media (min-width: 768px) {
    .navbar-brand img {
        height: 81px;
    }

    .js-header-change-moment .navbar-brand img {
        height: 40px;
    }

    .sx-search-btn-block, .u-basket {
        z-index: 999;
    }

    .navbar-brand {
        position: absolute;
        text-align: center;
        width: 300px;
        left: -webkit-calc(50% - 150px);
        left: -moz-calc(50% - 150px);
        left: calc(50% - 150px);
        padding: 0;
        margin: 0;
    }
}


CSS
    );
}
?>

<!-- Header -->
<!--u-header--sticky-top-->
<? /*= $this->theme->is_header_toggle_sections ? "u-header--toggle-section" : ""; */ ?>
<header id="js-header" class="
    u-header
    <?= $this->theme->is_header_show_hide ? "u-header--show-hide" : ""; ?>
    <?= $this->theme->header_shadow; ?>
    u-header--change-appearance
 "
        data-header-fix-moment="50"
        data-header-fix-effect="slide"
>

    <? if ($this->theme->is_header_toolbar) : ?>
        <div class="u-header__section u-header__section--hidden u-header__section--dark sx-topbar">
            <div class="container sx-container">
                <div class="row flex-column flex-sm-row justify-content-between align-items-center g-mx-0--lg">
                    <div class="col-auto">
                        <?php if (\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                            <i class="fas fa-phone g-font-size-18 g-valign-middle g-mr-10 g-mt-minus-2"></i>
                            <a href="tel:<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>" class="">
                                <?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto">
                        <?php if (\Yii::$app->skeeks->site->cmsSiteEmail) : ?>
                            <i class="fas fa-envelope g-font-size-18 g-valign-middle g-mr-10 g-mt-minus-2"></i>
                            <a href="mailto:<?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>" class="">
                                <?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto g-pos-rel sx-social-header">
                        <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                            <?php if ($socials = \Yii::$app->skeeks->site->cmsSiteSocials) : ?>


                            <?php


$this->registerCss(<<<CSS

.u-icon-v1, .u-icon-v1 .u-icon__elem-regular, .u-icon-v1 .u-icon__elem-hover {
    width: 2.57143rem;
    height: 2.57143rem;
    font-size: 1.42857rem;
}
.u-icon-v1, .u-icon-v2, .u-icon-v3, .u-icon-v4 {
    position: relative;
    display: inline-block;
    text-align: center;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}


.sx-social-header li {
    margin-left: 5px;
    margin-right: 5px;
}
.u-icon-v1.u-icon-size--sm, .u-icon-v1.u-icon-size--sm .u-icon__elem-regular, .u-icon-v1.u-icon-size--sm .u-icon__elem-hover {
    width: 2.28571rem;
    height: 2.28571rem;
    font-size: 1.28571rem;
}
.u-icon-v1 > i, .u-icon-v2 > i, .u-icon-v3 > i, .u-icon-v4 > span > i {
    position: relative;
    top: 50%;
    display: block;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 2;
}

.rounded-circle {
    border-radius: 50%!important;
}


.g-color-white--hover:hover i {
  color: #fff !important;
}

CSS
);
?>

                                <?php foreach ($socials as $social) : ?>
                                    <li class="list-inline-item">
                                        <a class="u-icon-v1 u-icon-size--sm g-color-primary u-shadow-v32 g-text-underline--none--hover  g-color-white--hover g-bg-white rounded-circle"
                                           href="<?= $social->url; ?>"
                                           target="_blank"
                                        >
                                            <i class="<?= $social->iconCode; ?>"></i>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    <? endif; ?>


    <div class="u-header__section sx-main-menu-wrapper sx-header-not-scrolled"
         data-header-fix-moment-exclude="sx-header-not-scrolled"
         data-header-fix-moment-classes="sx-header-not-scrolled"
    >
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal" style="flex-direction: column;">
            <div class="container sx-container sx-header-top">
                <div class="row" style="width: 100%;">
                    <div class="col my-auto">
                        <div class="sx-phone" style="margin-right: 2rem;">
                            <a href="#sx-callback" data-toggle="modal" data-target="#sx-feedback" style="margin-right: 0.5rem;"><i class="icon-earphones-alt"></i></a>
                            <a href="#sx-callback" data-toggle="modal" data-target="#sx-feedback">8 800 302-71-73</a>
                        </div>
                    </div>
                    <div class="col text-center my-auto">
                        <a href="<?= \yii\helpers\Url::home(); ?>" aria-label="<?= \Yii::$app->skeeks->site->name; ?>" title="<?= \Yii::$app->skeeks->site->name; ?>" class="navbar-brand">
                            <img src="<?= $this->theme->logo; ?>" alt="<?= \Yii::$app->skeeks->site->name; ?>">
                        </a>
                    </div>
                    <div class="col text-center my-auto">
                        <div class="sx-header-menu-right float-right d-flex">
                            <!-- End Navigation -->
                            <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                                <?php echo $this->render("@app/views/headers/_header-search"); ?>
                            <? endif; ?>
                            <?/*= @$content; */?>
                            <?= $this->render("@app/views/headers/_header_shop"); ?>

                            <? if ($this->theme->is_header_auth) : ?>
                                <?php echo $this->render("@app/views/headers/_header-auth"); ?>
                            <? endif; ?>
                        </div>
                    </div>
                </div>
                <!-- Logo -->

                <!-- End Logo -->
                <!-- Navigation -->
                <!--<div class="collapse navbar-collapse align-items-center" id="navBar">
                    <?php
/*                    $widget = \skeeks\cms\cmsWidgets\tree\TreeCmsWidget::beginWidget('menu-top');
                    $widget->descriptor->name = 'Главное верхнее меню';
                    $widget->viewFile = '@app/views/widgets/TreeMenuCmsWidget/menu-top';
                    $widget::end();
                    */?>
                </div>-->



            </div>
            <div class="container sx-container sx-header-second">

                <div class="collapse navbar-collapse align-items-center" id="navBar">
                    <?php
                    $widget = \skeeks\cms\cmsWidgets\tree\TreeCmsWidget::beginWidget('menu-top');
                    $widget->descriptor->name = 'Главное верхнее меню';
                    $widget->viewFile = '@app/views/widgets/TreeMenuCmsWidget/menu-top';
                    $widget::end();
                    ?>
                </div>

            </div>
        </nav>
    </div>
</header>
<!-- End Header -->
