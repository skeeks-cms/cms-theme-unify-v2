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
$(window).on('load', function () {
    $.HSCore.components.HSHeader.init($('#js-header'));
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });
});
JS
);
?>

<!-- Header -->
<!--u-header--sticky-top-->
<header id="js-header" class="<?= $this->theme->header_shadow; ?> u-header u-header--toggle-section u-header--change-appearance"
        data-header-fix-moment="100" data-header-fix-effect="slide">
    <!-- Top Bar -->
    <!--u-header__section--hidden -->
    <div class="u-header__section u-header__section--hidden d-none d-sm-block g-bg-white sx-header-middle-block" style="padding-bottom: 7px; padding-top: 7px;">
        <div class="container sx-container">
            <div class="row flex-column flex-sm-row justify-content-between align-items-center text-uppercase g-font-weight-600 g-color-white g-font-size-12 g-mx-0--lg">
                <div class="col-auto">
                    <!-- Logo -->
                    <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="sx-main-logo">
                        <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
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
                    <? if (\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                        <a href="tel:<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>" target="_blank" title="Телефон для связи" class="g-mr-10">
                            <?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>
                        </a>
                        <br/>
                    <? endif; ?>

                    <? if (\Yii::$app->skeeks->site->cmsSiteEmail) : ?>

                        <a href="mailto:<?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>" target="_blank" title="Email для связи">
                            <?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>
                        </a>
                    <? endif; ?>


                </div>
                <div class="col-auto g-pos-rel sx-social-headerk">
                    <ul class="list-inline">
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
                                <li class="list-inline-item g-mx-5">
                                    <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
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
    <!-- End Top Bar -->

    <div class="u-header__section sx-main-menu-wrapper sx-header-not-scrolled"
         data-header-fix-moment-exclude="sx-header-not-scrolled"
         data-header-fix-moment-classes="sx-header-not-scrolled"
    >
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container sx-container">
                <!-- Logo -->
                <!--<a href="<?/*= \yii\helpers\Url::home(); */?>" title="<?/*= $this->theme->title; */?>" class="navbar-brand">
                    <img src="<?/*= $this->theme->logo; */?>" alt="<?/*= $this->theme->title; */?>">
                </a>-->
                <!-- End Logo -->
                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center" id="navBar">
                    <?php
                    $widget = \skeeks\cms\cmsWidgets\tree\TreeCmsWidget::beginWidget('menu-top');
                    $widget->descriptor->name = 'Главное верхнее меню';
                    $widget->viewFile = '@app/views/widgets/TreeMenuCmsWidget/menu-top';
                    $widget::end();
                    ?>
                </div>
                <div class="sx-header-menu-right">
                    <!-- End Navigation -->
                    <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                        <?php echo $this->render("@app/views/headers/_header-search"); ?>
                    <? endif; ?>
                    <?= @$content; ?>
                    <? if ($this->theme->is_header_auth) : ?>
                        <?php echo $this->render("@app/views/headers/_header-auth"); ?>
                    <? endif; ?>
                </div>
            </div>
        </nav>
    </div>
</header>
<!-- End Header -->