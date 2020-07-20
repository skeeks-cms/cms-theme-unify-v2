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
<header id="js-header" class="u-shadow-v19 u-header 
<?= $this->theme->is_header_sticky ? "u-header--sticky-top" : ""; ?>  
<?= $this->theme->is_header_toggle_sections ? "u-header--toggle-section" : ""; ?>  
<?= $this->theme->is_header_show_hide ? "u-header--show-hide" : ""; ?>  
 u-header--change-appearance" data-header-fix-moment="50"
        data-header-fix-effect="slide">

    <? if ($this->theme->is_header_toolbar) : ?>
        <div class="u-header__section u-header__section--hidden u-header__section--dark g-py-7 sx-topbar">
            <div class="container sx-container">
                <div class="row flex-column flex-sm-row justify-content-between align-items-center g-mx-0--lg">
                    <div class="col-auto">
                        <?php if(\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                            <i class="fas fa-phone g-font-size-18 g-valign-middle g-mr-10 g-mt-minus-2"></i>
                            <a href="tel:<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>" class="">
                                <?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto">
                        <?php if(\Yii::$app->skeeks->site->cmsSiteEmail) : ?>
                            <i class="fas fa-envelope g-font-size-18 g-valign-middle g-mr-10 g-mt-minus-2"></i>
                            <a href="mailto:<?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>" class="">
                                <?= \Yii::$app->skeeks->site->cmsSiteEmail->value; ?>
                            </a>
                        <?php endif; ?>
                    </div>
                    <div class="col-auto g-pos-rel">
                        <ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                            <?php if($socials = \Yii::$app->skeeks->site->cmsSiteSocials) : ?>
                            <?php foreach($socials as $social) : ?>
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

                        <!--<ul class="list-inline g-overflow-hidden g-pt-1 g-mx-minus-4 mb-0">
                            <? /* if (\Yii::$app->user->isGuest) : */ ?>
                                <li class="list-inline-item g-mx-4">
                                    <i class="far fa-user g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                                    <a class="g-color-white g-color-white--hover" href="<? /*= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); */ ?>">Вход</a>
                                </li>
                                <li class="list-inline-item g-mx-4">|</li>
                                <li class="list-inline-item g-mx-4">
                                    <a class="g-color-white g-color-white--hover" href="<? /*= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/register'); */ ?>">Регистрация</a>
                                </li>
                            <? /* else : */ ?>
                                <li class="list-inline-item g-mx-4">
                                    <i class="far fa-user g-font-size-18 g-valign-middle g-color-white g-mr-10 g-mt-minus-2"></i>
                                    <a class="g-color-white g-color-white--hover" href="<? /*= \yii\helpers\Url::to(['/cms/upa-personal/update']) */ ?>"><? /*= \Yii::$app->user->identity->displayName; */ ?></a>
                                </li>
                            <? /* endif; */ ?>

                        </ul>-->
                    </div>
                </div>
            </div>
        </div>
    <? endif; ?>


    <div class="u-header__section u-header__section--light g-bg-white-opacity-0_8 g-py-10 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-bg-white-opacity-0_8 g-py-10"
         data-header-fix-moment-classes="g-bg-white u-shadow-v18 g-py-0">
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
                <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand">
                    <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>
                <!-- End Logo -->
                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg" id="navBar">
                    <?php
                        $widget = \skeeks\cms\cmsWidgets\tree\TreeCmsWidget::beginWidget('menu-top');
                        $widget->descriptor->name = 'Главное верхнее меню';
                        $widget->viewFile = '@app/views/widgets/TreeMenuCmsWidget/menu-top';
                        $widget::end();
                    ?>
                </div>
                <!-- End Navigation -->
                <? if (\Yii::$app->view->theme->is_show_search_block) :
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
                    <div class="d-inline-block g-valign-middle g-mr-15 sx-search-btn-block">
                        <a href="#" class="sx-search-btn"><i class="fas fa-search" aria-hidden="true"></i></a>
                    </div>
                    <div class="sx-search-form g-mt-8 sx-invisible-search-block">
                        <form action="<?= \yii\helpers\Url::to(['/cmsSearch/result/index']); ?>" method="get" class="g-mb-0">
                            <div class="container">
                                <div class="row">
                                    <div class="input-group">
                                        <input placeholder="<?= Yii::t("skeeks/unify", "Search"); ?>..." type="text" class="form-control rounded-0 form-control-md" name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"
                                               value="<?= \Yii::$app->cmsSearch->searchQuery; ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-md btn-secondary rounded-0 sx-btn-search" type="submit"><?= Yii::t("skeeks/unify", "Find"); ?></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                <? endif; ?>
                <?= @$content; ?>

                <? if ($this->theme->is_header_auth) : ?>
                    <div class="sx-header-auth g-pos-abs g-top-18 g-right-65 g-pos-rel--lg g-top-0--lg g-right-0--lg g-pt-3--lg g-ml-30 g-ml-0--lg">

                        <? if (\Yii::$app->user->isGuest) : ?>
                            <a class="sx-login-block d-block u-link-v5 g-color-white-opacity-0_8 g-font-weight-600" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>"><i class="fas fa-user"></i></a>
                        <? else : ?>

                            <!-- Top User -->
                            <a class="d-block u-link-v5 g-color-white-opacity-0_8 g-font-weight-600 " href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>">
                                <span class="g-pos-rel">
                                    <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                                    <img class="g-width-30 g-width-30--md g-height-30 g-height-30--md rounded-circle"
                                         src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                                </span>
                                <span class="g-pos-rel g-top-2">
                                    <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->displayName; ?></span>
                                </span>
                            </a>
                        <? endif; ?>
                    </div>
                <? endif; ?>

            </div>
        </nav>
    </div>
</header>
<!-- End Header -->
