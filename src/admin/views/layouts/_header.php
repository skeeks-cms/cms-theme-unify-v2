<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
/**
 * @var $theme \skeeks\cms\themes\unify\admin\UnifyThemeAdmin;
 */
$theme = $this->theme;
?>

<!-- Header -->
<header id="js-header" class="u-header u-header--sticky-top">
    <div class="<?= $theme->headerClasses; ?>">
        <nav class="navbar no-gutters g-pa-0">
            <div class="col-auto d-flex flex-nowrap u-header-logo-toggler g-py-12">
                <!-- Logo -->
                <a href="<?= $theme->logoHref; ?>" class="navbar-brand d-flex align-self-center g-hidden-xs-down py-0">
                    <? if ($theme->logoSrc) : ?>
                        <img class="default-logo" src="<?= $theme->logoSrc; ?>" alt="<?= $theme->logoTitle; ?>">
                    <? endif; ?>
                    <?= $theme->logoTitle; ?>
                </a>
                <!-- End Logo -->
                <!-- Sidebar Toggler -->
                <a class="js-side-nav u-header__nav-toggler d-flex align-self-center ml-auto" href="#!" data-hssm-class="u-side-nav--mini u-sidebar-navigation-v1--mini" data-hssm-body-class="u-side-nav-mini"
                   data-hssm-is-close-all-except-this="true" data-hssm-target="#sideNav">
                    <i class="hs-admin-align-left"></i>
                </a>
                <!-- End Sidebar Toggler -->
            </div>

            <div class="col-auto d-flex g-py-12 g-ml-20 sx-breadcrumbs-wrapper">
                <?= $this->render("@app/views/layouts/_breadcrumbs"); ?>
            </div>


            <div class="col-auto d-flex g-py-12 g-pl-40--lg ml-auto">

                <!-- End Top Search Bar (Mobi) -->

                <!-- Top User -->
                <div class="col-auto d-flex g-pt-5 g-pt-0--sm g-pl-10 g-pl-20--sm">
                    <div class="g-pos-rel g-px-10--lg sx-header-user-profile">
                        <a id="profileMenuInvoker" class="d-block" href="#!" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#profileMenu"
                           data-dropdown-type="css-animation" data-dropdown-duration="300"
                           data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                <span class="g-pos-rel">
        <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle g-mr-10--sm sx-avatar"
                     src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                </span>
                            <span class="g-pos-rel g-top-2">
        <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->shortDisplayName; ?></span>
                <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10"></i>
                </span>
                        </a>

                        <!-- Top User Menu -->
                        <ul id="profileMenu" class="g-pos-abs g-left-0 g-width-100x--lg g-nowrap g-font-size-14 g-py-20 g-mt-17 rounded" aria-labelledby="profileMenuInvoker">

                            <li class="g-mb-10">
                                <a class="media g-py-5 g-px-20" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']); ?>">
                                                <span class="d-flex align-self-center g-mr-12">
                                      <i class="hs-admin-user"></i>
                                    </span>
                                    <span class="media-body align-self-center">Мой профиль</span>
                                </a>
                            </li>

                            <li class="g-mb-10">
                                <a class="media g-py-5 g-px-20" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/change-password']); ?>">
                                        <span class="d-flex align-self-center g-mr-12">
                                      <i class="fas fa-key"></i>
                                    </span>
                                    <span class="media-body align-self-center">Смена пароля</span>
                                </a>
                            </li>

                            <li class="mb-0">
                                <a class="media g-py-5 g-px-20" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
                    <span class="d-flex align-self-center g-mr-12">
          <i class="hs-admin-shift-right"></i>
        </span>
                                    <span class="media-body align-self-center">Выход</span>
                                </a>
                            </li>
                        </ul>
                        <!-- End Top User Menu -->
                    </div>
                </div>
                <!-- End Top User -->
            </div>
            <!-- End Messages/Notifications/Top Search Bar/Top User -->
        </nav>

    </div>
</header>
<!-- End Header -->