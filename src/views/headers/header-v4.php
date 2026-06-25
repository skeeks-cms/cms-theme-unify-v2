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
.sx-header-social-list li {
    margin-left: 0.3125rem;
    margin-right: 0.3125rem;
}
.sx-header-social-list a {
    box-shadow: rgba(0, 0, 0, 0.1) 0 0.375rem 0.9375rem -0.375rem;
    height: 2rem;
    width: 2rem;
    font-size: 2rem;
    line-height: 2rem;
    display: inline-block;
    text-decoration: none;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
    /*background: white;*/
    color: var(--primary-color);
}
.sx-header-social-list a:hover {
    text-decoration: none;
}
.sx-header-social-list a i {
    position: relative;
    top: 50%;
    display: block;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 2;
}
.sx-header-social-list a i.fa-max {
    -webkit-transform: translateY(-50%) scale(1.25);
    -ms-transform: translateY(-50%) scale(1.25);
    transform: translateY(-50%) scale(1.25);
}
.sx-header-v4-row {
    display: flex;
    align-items: center;
    width: 100%;
    gap: 30px;
}
.sx-header-v4-logo {
    flex: 0 0 auto;
}
.sx-header-v4-search {
    flex: 1 1 auto;
    min-width: 240px;
}
.sx-header-v4-search .sx-search-form form {
    margin-bottom: 0;
}
.sx-header-v4-search .sx-search-form .row,
.sx-header-v4-search .sx-search-form .col-sm-12 {
    display: block;
    margin-left: 0;
    margin-right: 0;
    padding-left: 0;
    padding-right: 0;
    width: 100%;
}
.sx-header-v4-phone {
    display: flex;
    align-items: center;
    flex: 0 0 auto;
}
.sx-header-v4-phone-text {
    margin-left: 5px;
}
.sx-header-v4-phone > .d-flex {
    align-items: center;
}
.sx-header-v4-phone-link {
    font-size: 20px;
    line-height: 20px;
}
.sx-header-v4-socials {
    display: flex;
    justify-content: flex-end;
    flex: 0 0 auto;
    margin-left: auto;
}
.sx-header-v4-socials .sx-header-social-list {
    margin-bottom: 0;
    white-space: nowrap;
}
.sx-header-v4-socials > .d-flex {
    align-items: center;
    justify-content: flex-end;
}
.sx-header-phone-address {
    font-size: 12px;
    text-align: left;
    line-height: 12px;
    max-width: 170px;
}
@media (max-width: 1199.98px) {
    .sx-header-v4-row {
        gap: 20px;
    }
    .sx-header-v4-phone-link {
        font-size: 18px;
    }
}
@media (max-width: 991.98px) {
    .sx-header-v4-row {
        flex-wrap: wrap;
    }
    .sx-header-v4-search {
        order: 4;
        flex-basis: 100%;
    }
    .sx-header-v4-socials {
        margin-left: 0;
    }
}
#js-header .sx-main-menu-wrapper .container {
    display: flex;
    align-items: center;
}
#js-header .sx-main-menu-wrapper .navbar-collapse {
    flex: 1 1 auto;
}
#js-header .sx-main-menu-wrapper .sx-header-menu-right {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    flex: 0 0 auto;
    margin-left: auto;
}
CSS
);

?>
<header id="js-header" class="
    u-header
    <?= $this->theme->is_header_toggle_sections ? "u-header--toggle-section" : ""; ?>
    <?= $this->theme->header_shadow; ?>
    u-header--change-appearance
 "
        data-header-fix-moment="50"
        data-header-fix-effect="slide"
>
    

    <!-- Top Bar -->
    <!--u-header__section--hidden -->
    <div class="u-header__section u-header__section--hidden u-header__section--dark">
        <? if ($this->theme->is_header_toolbar) : ?>
            <div class="sx-topbar">
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
                                <? if (\Yii::$app->user->isGuest) : ?>
                                    <li class="list-inline-item g-mx-4">
                                        <i class="far fa-user g-font-size-18 g-valign-middle g-mr-10 g-mt-minus-2"></i>
                                        <a class="" href="<?= \skeeks\cms\helpers\UrlHelper::construct('/cms/auth/login'); ?>">Вход</a>
                                    </li>
                                    <li class="list-inline-item g-mx-4">|</li>
                                    <li class="list-inline-item g-mx-4">
                                        <a class="" href="<?= \skeeks\cms\helpers\UrlHelper::construct('/cms/auth/register'); ?>">Регистрация</a>
                                    </li>
                                <? else : ?>
                                    <li class="list-inline-item g-mx-4">
                                        <i class="far fa-user g-font-size-18 g-valign-middle g-mr-10 g-mt-minus-2"></i>
                                        <a class="" href="<?= \Yii::$app->cms->afterAuthUrl; ?>"><?= \Yii::$app->user->identity->displayName; ?></a>
                                    </li>
                                <? endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <? endif; ?>
        <div class="sx-header-middle-block">
            <div class="container sx-container sx-header-center-container">
                <div class="sx-header-v4-row">
                    <div class="sx-header-v4-logo">
                        <!-- Logo -->
                        <a href="<?= \yii\helpers\Url::home(); ?>" aria-label="<?= \Yii::$app->skeeks->site->name; ?>" title="<?= \Yii::$app->skeeks->site->name; ?>" class="navbar-brand">
                            <img src="<?= $this->theme->logo; ?>" alt="<?= \Yii::$app->skeeks->site->name; ?>">
                        </a>
                        <!-- End Logo -->
                    </div>
                    <div class="sx-header-v4-search">
                        <? if (\Yii::$app->view->theme->is_show_search_block) : ?>
                            <div class="sx-search-form">
                                <form action="<?= \yii\helpers\Url::to(['/cmsSearch/result/index']); ?>" method="get">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="input-group">
                                                <input placeholder="Поиск..." for="search" type="text" class="form-control"
                                                       name="<?= \Yii::$app->cmsSearch->searchQueryParamName; ?>"
                                                       value="<?= \Yii::$app->cmsSearch->searchQuery; ?>"/>
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-md btn-primary sx-btn-search rounded-0"><?= Yii::t("skeeks/unify", "Find"); ?></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <? endif; ?>
                    </div>
                    <div class="sx-header-v4-phone">
                        <div class="d-flex">
                            <? if (\Yii::$app->skeeks->site->cmsSitePhone) : ?>
                                <div class="sx-header-phone-wrapper g-color-primary">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="sx-header-v4-phone-text">
                                    <a href="tel:<?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>" target="_blank" title="Телефон для связи"
                                       class="g-mr-10 sx-main-text-color g-color-primary--hover g-text-underline--none--hover sx-header-v4-phone-link">
                                        <?= \Yii::$app->skeeks->site->cmsSitePhone->value; ?>
                                    </a>
                                    <?php if (\Yii::$app->skeeks->site->cmsSitePhone->name) : ?>
                                        <div class="sx-header-phone-address">
                                            <?php echo \Yii::$app->skeeks->site->cmsSitePhone->name; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <!--<br/>-->
                            <? endif; ?>
                            <? /* if (\Yii::$app->skeeks->site->cmsSiteEmail) : */ ?><!--
                                <a href="mailto:<? /*= \Yii::$app->skeeks->site->cmsSiteEmail->value; */ ?>" target="_blank" title="Email для связи">
                                    <? /*= \Yii::$app->skeeks->site->cmsSiteEmail->value; */ ?>
                                </a>
                            --><? /* endif; */ ?>
                        </div>
                    </div>
                    <div class="sx-header-v4-socials">
                        <div class="d-flex">
                            <ul class="list-inline sx-header-social-list">
                                <?php if ($socials = \Yii::$app->skeeks->site->cmsSiteSocials) : ?>
                                    <?php foreach ($socials as $social) : ?>
                                        <li class="list-inline-item">
                                            <a class="rounded-circle"
                                               href="<?= $social->url; ?>"
                                               aria-label="<?= $social->social_type; ?>"
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
        </div>
    </div>

    <div class="u-header__section sx-main-menu-wrapper sx-header-not-scrolled"
         data-header-fix-moment-exclude="sx-header-not-scrolled"
         data-header-fix-moment-classes="sx-header-not-scrolled"
    >
        <nav class="js-mega-menu navbar navbar-expand-lg hs-menu-initialized hs-menu-horizontal">
            <div class="container sx-container">
                <div class="collapse navbar-collapse align-items-center" id="navBar">
                    <?php
                    $widget = \skeeks\cms\cmsWidgets\tree\TreeCmsWidget::beginWidget('menu-top');
                    $widget->descriptor->name = 'Главное верхнее меню';
                    $widget->viewFile = '@app/views/widgets/TreeMenuCmsWidget/menu-top';
                    $widget::end();
                    ?>
                </div>
                <div class="sx-header-menu-right">
                    <?= @$content; ?>
                    <? if ($this->theme->is_header_auth) : ?>
                        <?php echo $this->render("@app/views/headers/_header-auth"); ?>
                    <? endif; ?>
                </div>
            </div>
        </nav>
    </div>
</header>
