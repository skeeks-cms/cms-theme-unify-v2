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
    <?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?>
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
                    <div class="col-auto g-pos-rel">
                        <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                            <?php if ($socials = \Yii::$app->skeeks->site->cmsSiteSocials) : ?>
                                <?php foreach ($socials as $social) : ?>
                                    <li class="list-inline-item g-mx-5">
                                        <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                           href="<?= $social->url; ?>"
                                           target="_blank"
                                        >
                                            <i class="fab fa-<?= $social->social_type; ?>"></i>
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
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container sx-container">
                <!-- Logo -->
                <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand">
                    <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>
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
