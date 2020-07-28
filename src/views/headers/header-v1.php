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
                <div class="col-auto g-pos-rel g-color-black">
                    <ul class="list-inline">
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

                </div>

            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="u-header__section u-header__section--dark g-py-0 sx-main-menu-wrapper" data-header-fix-moment-exclude="g-py-10" data-header-fix-moment-classes="g-py-0">
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container sx-container">
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
                <a href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>" class="navbar-brand d-block d-sm-none">
                    <img src="<?= $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                </a>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="collapse navbar-collapse align-items-center flex-sm-row g-pt-10 g-pt-5--lg g-mr-40--sm sx-main-menu" id="navBar">
                    <?php
                        $widget = \skeeks\cms\cmsWidgets\tree\TreeCmsWidget::beginWidget('menu-top');
                        $widget->descriptor->name = 'Главное верхнее меню';
                        $widget->viewFile = '@app/views/widgets/TreeMenuCmsWidget/menu-top';
                        $widget::end();
                    ?>
                </div>
                <!-- End Navigation -->
                <!-- End Navigation -->
                <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                    <? $this->registerJs(<<<JS
                    $('body').on('click','.sx-search-btn', function() {
                        if ($(this).hasClass('sx-search-form-close')){
                            $('.sx-search-form').animate({top: '-150px'});
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
); ?>
                    <div class="d-inline-block g-valign-middle g-mr-15 sx-search-btn-block">
                        <a href="#" class="sx-search-btn"><i class="fas fa-search" aria-hidden="true"></i></a>
                    </div>
                    <div class="sx-search-form g-mt-15 sx-invisible-search-block">
                        <form action="<?= \yii\helpers\Url::to(['/cmsSearch/result/index']); ?>" method="get"class="g-mb-0">
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

            </div>


        </nav>
    </div>
</header>
<!-- End Header -->