<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 06.03.2015
 */
use skeeks\crm\themes\unifyAdmin\assets\AppAsset;

use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */
\skeeks\cms\themes\unify\admin\assets\UnifyAdminAppAsset::register($this);
\skeeks\cms\widgets\user\UserOnlineTriggerWidget::widget();
$theme = 'dark';
$theme = 'light';
$theme = 'multi';

//light
$headerClasses = "u-header__section u-header__section--admin-light u-shadow-v22 g-min-height-65";
$slideNavClasses = "col-auto u-sidebar-navigation-v1 u-sidebar-navigation--light g-bg-gray-light-v8";

if ($theme == 'dark') {
    $headerClasses = "u-header__section u-header__section--admin-dark g-min-height-65";
    $slideNavClasses = "col-auto u-sidebar-navigation-v1 u-sidebar-navigation--dark";
}
if ($theme == 'multi') {
    $headerClasses = "u-header__section u-header__section--admin-dark g-min-height-65";
    $slideNavClasses = "col-auto u-sidebar-navigation-v1 u-sidebar-navigation--light g-bg-gray-light-v8";
}

if (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'crmBackend') {
    \Yii::$app->crm->favicon = \skeeks\crm\themes\unifyAdmin\assets\AppAsset::getAssetUrl('img/crm-favicon.ico');
}

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" prefix="og: http://ogp.me/ns#">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="icon" href="<?= \Yii::$app->crm->favicon ? \Yii::$app->crm->favicon : AppAsset::getAssetUrl('favicon.ico'); ?>" type="image/x-icon"/>
        <?php $this->head() ?>
    </head>
    <body class="<?= \skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isEmptyLayout ? "sx-empty" : ""; ?>">
    <?php $this->beginBody() ?>


    <!-- Header -->
    <header id="js-header" class="u-header u-header--sticky-top">
        <div class="<?= $headerClasses; ?>">
            <nav class="navbar no-gutters g-pa-0">
                <div class="col-auto d-flex flex-nowrap u-header-logo-toggler g-py-12">
                    <!-- Logo -->

                    <a href="<?= \yii\helpers\Url::home(); ?>" class="navbar-brand d-flex align-self-center g-hidden-xs-down py-0 g-mt-5">

                        <img class="default-logo" src="<?= AppAsset::getAssetUrl('img/logos/logo-no-bg-title.png'); ?>" alt="Студия SkeekS"> SkeekS.com
                    </a>
                    <!-- End Logo -->

                    <!-- Sidebar Toggler -->
                    <a class="js-side-nav u-header__nav-toggler d-flex align-self-center ml-auto" href="#!" data-hssm-class="u-side-nav--mini u-sidebar-navigation-v1--mini" data-hssm-body-class="u-side-nav-mini" data-hssm-is-close-all-except-this="true" data-hssm-target="#sideNav">
                        <i class="hs-admin-align-left"></i>
                    </a>
                    <!-- End Sidebar Toggler -->
                </div>

                <!-- Top Search Bar -->
                <!--<form id="searchMenu" class="u-header--search col-sm g-py-12 g-ml-15--sm g-ml-20--md g-mr-10--sm" aria-labelledby="searchInvoker" action="#!">
                    <div class="input-group g-max-width-450">
                        <input class="form-control form-control-md g-rounded-4" type="text" placeholder="Enter search keywords">
                        <button type="submit" class="btn u-btn-outline-primary g-brd-none g-bg-transparent--hover g-pos-abs g-top-0 g-right-0 d-flex g-width-40 h-100 align-items-center justify-content-center g-font-size-18 g-z-index-2">
                            <i class="hs-admin-search"></i>
                        </button>
                    </div>
                </form>-->
                <!-- End Top Search Bar -->

                <!-- Messages/Notifications/Top Search Bar/Top User -->
                <div class="col-auto d-flex g-py-12 g-pl-40--lg ml-auto">
                    <!-- Top Messages -->
                    <div class="sx-now-hide g-pos-rel g-hidden-sm-down g-mr-5">
                        <a id="messagesInvoker" class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="messagesMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#messagesMenu"
                           data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                            <span class="u-badge-v1 g-top-7 g-right-7 g-width-18 g-height-18 g-bg-primary g-font-size-10 g-color-white rounded-circle p-0">7</span>
                            <i class="hs-admin-comment-alt g-absolute-centered"></i>
                        </a>

                        <!-- Top Messages List -->
                        <div id="messagesMenu" class="g-absolute-centered--x g-width-340 g-max-width-400 g-mt-17 rounded" aria-labelledby="messagesInvoker">
                            <div class="media u-header-dropdown-bordered-v1 g-pa-20">
                                <h4 class="d-flex align-self-center text-uppercase g-font-size-default g-letter-spacing-0_5 g-mr-20 g-mb-0">3 new messages</h4>
                                <div class="media-body align-self-center text-right">
                                    <a class="g-color-secondary" href="#!">View All</a>
                                </div>
                            </div>

                            <ul class="p-0 mb-0">
                                <!-- Top Messages List Item -->
                                <li class="media g-pos-rel u-header-dropdown-item-v1 g-pa-20">
                                    <div class="d-flex g-mr-15">
                                        <!--<img class="g-width-40 g-height-40 rounded-circle" src="../../assets/img-temp/100x100/img5.jpg" alt="Image Description">-->
                                    </div>

                                    <div class="media-body">
                                        <h5 class="g-font-size-16 g-font-weight-400 g-mb-5"><a href="#!">Verna Swanson</a></h5>
                                        <p class="g-mb-10">Not so many years businesses used to grunt at using</p>

                                        <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-lightblue-v2">
                                            <i class="hs-admin-time icon-clock g-mr-5"></i>
                                            <small>5 Min ago</small>
                                        </em>
                                    </div>
                                    <a class="u-link-v2" href="#!">Read</a>
                                </li>
                                <!-- End Top Messages List Item -->

                                <!-- Top Messages List Item -->
                                <li class="media g-pos-rel u-header-dropdown-item-v1 g-pa-20">
                                    <div class="d-flex g-mr-15">
                                        <!--<img class="g-width-40 g-height-40 rounded-circle" src="../../assets/img-temp/100x100/img6.jpg" alt="Image Description">-->
                                    </div>

                                    <div class="media-body">
                                        <h5 class="g-font-size-16 g-font-weight-400 g-mb-5"><a href="#!">Eddie Hayes</a></h5>
                                        <p class="g-mb-10">But today and influence of is growing right along illustration</p>

                                        <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-lightblue-v2">
                                            <i class="hs-admin-time icon-clock g-mr-5"></i>
                                            <small>22 Min ago</small>
                                        </em>
                                    </div>
                                    <a class="u-link-v2" href="#!">Read</a>
                                </li>
                                <!-- End Top Messages List Item -->

                                <!-- Top Messages List Item -->
                                <li class="media g-pos-rel u-header-dropdown-item-v1 g-pa-20">
                                    <div class="d-flex g-mr-15">
                                        <!--<img class="g-width-40 g-height-40 rounded-circle" src="../../assets/img-temp/100x100/img7.jpg" alt="Image Description">-->
                                    </div>

                                    <div class="media-body">
                                        <h5 class="g-font-size-16 g-font-weight-400 g-mb-5"><a href="#!">Herbert Castro</a></h5>
                                        <p class="g-mb-10">But today, the use and influence of illustrations is growing right along</p>

                                        <em class="d-flex align-self-center align-items-center g-font-style-normal g-color-lightblue-v2">
                                            <i class="hs-admin-time icon-clock g-mr-5"></i>
                                            <small>15 Min ago</small>
                                        </em>
                                    </div>
                                    <a class="u-link-v2" href="#!">Read</a>
                                </li>
                                <!-- End Top Messages List Item -->
                            </ul>
                        </div>
                        <!-- End Top Messages List -->
                    </div>
                    <!-- End Top Messages -->

                    <!-- Top Notifications -->
                    <div class="sx-now-hide g-pos-rel g-hidden-sm-down">
                        <a id="notificationsInvoker" class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="notificationsMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
                           data-dropdown-target="#notificationsMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                            <i class="hs-admin-bell g-absolute-centered"></i>
                        </a>

                        <!-- Top Notifications List -->
                        <div id="notificationsMenu" class="js-custom-scroll g-absolute-centered--x g-width-340 g-max-width-400 g-height-400 g-mt-17 rounded" aria-labelledby="notificationsInvoker">
                            <div class="media text-uppercase u-header-dropdown-bordered-v1 g-pa-20">
                                <h4 class="d-flex align-self-center g-font-size-default g-letter-spacing-0_5 g-mr-20 g-mb-0">Notifications</h4>
                            </div>

                            <ul class="p-0 mb-0">
                                <!-- Top Notifications List Item -->
                                <li class="media u-header-dropdown-item-v1 g-parent g-px-20 g-py-15">
                                    <div class="d-flex align-self-center u-header-dropdown-icon-v1 g-pos-rel g-width-55 g-height-55 g-font-size-22 rounded-circle g-mr-15">
                                        <i class="hs-admin-bookmark-alt g-absolute-centered"></i>
                                    </div>

                                    <div class="media-body align-self-center">
                                        <p class="mb-0">A Pocket PC is a handheld computer features</p>
                                    </div>

                                    <a class="d-flex g-color-lightblue-v2 g-font-size-12 opacity-0 g-opacity-1--parent-hover g-transition--ease-in g-transition-0_2" href="#!">
                                        <i class="hs-admin-close"></i>
                                    </a>
                                </li>
                                <!-- End Top Notifications List Item -->

                                <!-- Top Notifications List Item -->
                                <li class="media u-header-dropdown-item-v1 g-parent g-px-20 g-py-15">
                                    <div class="d-flex align-self-center u-header-dropdown-icon-v1 g-pos-rel g-width-55 g-height-55 g-font-size-22 rounded-circle g-mr-15">
                                        <i class="hs-admin-blackboard g-absolute-centered"></i>
                                    </div>

                                    <div class="media-body align-self-center">
                                        <p class="mb-0">The first is a non technical method which requires</p>
                                    </div>

                                    <a class="d-flex g-color-lightblue-v2 g-font-size-12 opacity-0 g-opacity-1--parent-hover g-transition--ease-in g-transition-0_2" href="#!">
                                        <i class="hs-admin-close"></i>
                                    </a>
                                </li>
                                <!-- End Top Notifications List Item -->

                                <!-- Top Notifications List Item -->
                                <li class="media u-header-dropdown-item-v1 g-parent g-px-20 g-py-15">
                                    <div class="d-flex align-self-center u-header-dropdown-icon-v1 g-pos-rel g-width-55 g-height-55 g-font-size-22 rounded-circle g-mr-15">
                                        <i class="hs-admin-calendar g-absolute-centered"></i>
                                    </div>

                                    <div class="media-body align-self-center">
                                        <p class="mb-0">Stu Unger is of the biggest superstarsis</p>
                                    </div>

                                    <a class="d-flex g-color-lightblue-v2 g-font-size-12 opacity-0 g-opacity-1--parent-hover g-transition--ease-in g-transition-0_2" href="#!">
                                        <i class="hs-admin-close"></i>
                                    </a>
                                </li>
                                <!-- End Top Notifications List Item -->

                                <!-- Top Notifications List Item -->
                                <li class="media u-header-dropdown-item-v1 g-parent g-px-20 g-py-15">
                                    <div class="d-flex align-self-center u-header-dropdown-icon-v1 g-pos-rel g-width-55 g-height-55 g-font-size-22 rounded-circle g-mr-15">
                                        <i class="hs-admin-pie-chart g-absolute-centered"></i>
                                    </div>

                                    <div class="media-body align-self-center">
                                        <p class="mb-0">Sony laptops are among the most well known laptops</p>
                                    </div>

                                    <a class="d-flex g-color-lightblue-v2 g-font-size-12 opacity-0 g-opacity-1--parent-hover g-transition--ease-in g-transition-0_2" href="#!">
                                        <i class="hs-admin-close"></i>
                                    </a>
                                </li>
                                <!-- End Top Notifications List Item -->
                                <!-- Top Notifications List Item -->
                                <li class="media u-header-dropdown-item-v1 g-parent g-px-20 g-py-15">
                                    <div class="d-flex align-self-center u-header-dropdown-icon-v1 g-pos-rel g-width-55 g-height-55 g-font-size-22 rounded-circle g-mr-15">
                                        <i class="hs-admin-bookmark-alt g-absolute-centered"></i>
                                    </div>

                                    <div class="media-body align-self-center">
                                        <p class="mb-0">A Pocket PC is a handheld computer features</p>
                                    </div>

                                    <a class="d-flex g-color-lightblue-v2 g-font-size-12 opacity-0 g-opacity-1--parent-hover g-transition--ease-in g-transition-0_2" href="#!">
                                        <i class="hs-admin-close"></i>
                                    </a>
                                </li>
                                <!-- End Top Notifications List Item -->

                                <!-- Top Notifications List Item -->
                                <li class="media u-header-dropdown-item-v1 g-parent g-px-20 g-py-15">
                                    <div class="d-flex align-self-center u-header-dropdown-icon-v1 g-pos-rel g-width-55 g-height-55 g-font-size-22 rounded-circle g-mr-15">
                                        <i class="hs-admin-blackboard g-absolute-centered"></i>
                                    </div>

                                    <div class="media-body align-self-center">
                                        <p class="mb-0">The first is a non technical method which requires</p>
                                    </div>

                                    <a class="d-flex g-color-lightblue-v2 g-font-size-12 opacity-0 g-opacity-1--parent-hover g-transition--ease-in g-transition-0_2" href="#!">
                                        <i class="hs-admin-close"></i>
                                    </a>
                                </li>
                                <!-- End Top Notifications List Item -->
                            </ul>
                        </div>
                        <!-- End Top Notifications List -->
                    </div>
                    <!-- End Top Notifications -->

                    <!-- Top Search Bar (Mobi) -->
                    <a id="searchInvoker" class="sx-now-hide g-hidden-sm-up text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="searchMenu" aria-haspopup="true" aria-expanded="false" data-is-mobile-only="true" data-dropdown-event="click"
                       data-dropdown-target="#searchMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                        <i class="hs-admin-search g-absolute-centered"></i>
                    </a>
                    <!-- End Top Search Bar (Mobi) -->

                    <!-- Top User -->
                    <div class="col-auto d-flex g-pt-5 g-pt-0--sm g-pl-10 g-pl-20--sm">
                        <div class="g-pos-rel g-px-10--lg">
                            <a id="profileMenuInvoker" class="d-block" href="#!" aria-controls="profileMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#profileMenu" data-dropdown-type="css-animation" data-dropdown-duration="300"
                               data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                <span class="g-pos-rel">
        <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                <img class="g-width-30 g-width-40--md g-height-30 g-height-40--md rounded-circle g-mr-10--sm" src="<?= \Yii::$app->user->identity->avatarSrc; ?>" alt="Image description">
                </span>
                                <span class="g-pos-rel g-top-2">
        <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->displayName; ?></span>
                <i class="hs-admin-angle-down g-pos-rel g-top-2 g-ml-10"></i>
                </span>
                            </a>

                            <!-- Top User Menu -->
                            <ul id="profileMenu" class="g-pos-abs g-left-0 g-width-100x--lg g-nowrap g-font-size-14 g-py-20 g-mt-17 rounded" aria-labelledby="profileMenuInvoker">

                                <li class="g-mb-10">
                                    <a class="media g-color-primary--hover g-py-5 g-px-20" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']); ?>">
                                                <span class="d-flex align-self-center g-mr-12">
                                      <i class="hs-admin-user"></i>
                                    </span>
                                        <span class="media-body align-self-center">Мой профиль</span>
                                    </a>
                                </li>

                                <li class="g-mb-10">
                                    <a class="media g-color-primary--hover g-py-5 g-px-20" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/change-password']); ?>">
                                        <span class="d-flex align-self-center g-mr-12">
                                      <i class="hs-admin-rocket"></i>
                                    </span>
                                        <span class="media-body align-self-center">Смена пароля</span>
                                    </a>
                                </li>

                                <li class="mb-0">
                                    <a class="media g-color-primary--hover g-py-5 g-px-20" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
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


                <!-- Top Activity Toggler -->
                <a id="activityInvoker" class="sx-now-hide text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="activityMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#activityMenu"
                   data-dropdown-type="css-animation" data-dropdown-animation-in="fadeInRight" data-dropdown-animation-out="fadeOutRight" data-dropdown-duration="300">
                    <i class="hs-admin-align-right g-absolute-centered"></i>
                </a>
                <!-- End Top Activity Toggler -->
            </nav>

            <!-- Top Activity Panel -->
            <div id="activityMenu" class="js-custom-scroll u-header-sidebar g-pos-fix g-top-0 g-left-auto g-right-0 g-z-index-4 g-width-300 g-width-400--sm g-height-100vh" aria-labelledby="activityInvoker">
                <div class="u-header-dropdown-bordered-v1 g-pa-20">
                    <a id="activityInvokerClose" class="pull-right g-color-lightblue-v2" href="#!" aria-controls="activityMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#activityMenu" data-dropdown-type="css-animation"
                       data-dropdown-animation-in="fadeInRight" data-dropdown-animation-out="fadeOutRight" data-dropdown-duration="300">
                        <i class="hs-admin-close"></i>
                    </a>
                    <h4 class="text-uppercase g-font-size-default g-letter-spacing-0_5 g-mr-20 g-mb-0">Activity</h4>
                </div>

                <!-- Activity Short Stat. -->
                <section class="g-pa-20">
                    <div class="media align-items-center u-link-v5">
                        <div class="media-body align-self-center g-line-height-1_3 g-font-weight-300 g-font-size-40">
                            624 <span class="g-font-size-16">+3%</span>
                        </div>

                        <div class="d-flex align-self-center g-font-size-25 g-line-height-1 g-color-secondary ml-auto">$49,000</div>

                        <div class="d-flex align-self-center g-ml-8">
                            <svg class="g-fill-gray-dark-v9" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(-21.000000, -751.000000)">
                                    <g transform="translate(0.000000, 64.000000)">
                                        <g transform="translate(20.000000, 619.000000)">
                                            <g transform="translate(1.000000, 68.000000)">
                                                <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <svg class="g-fill-lightblue-v3" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
                                <g transform="translate(-33.000000, -751.000000)">
                                    <g transform="translate(0.000000, 64.000000)">
                                        <g transform="translate(20.000000, 619.000000)">
                                            <g transform="translate(1.000000, 68.000000)">
                                                <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>
                    </div>

                    <span class="g-font-size-16">Transactions</span>
                </section>
                <!-- End Activity Short Stat. -->

                <!-- Activity Bars -->
                <section class="g-pa-20 g-mb-10">
                    <!-- Advertising Income -->
                    <div class="g-mb-30">
                        <div class="media u-link-v5  g-mb-10">
                            <span class="media-body align-self-center">Advertising Income</span>

                            <span class="d-flex align-self-center">
          <svg class="g-fill-gray-dark-v9" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(-21.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
          <svg class="g-fill-lightblue-v3" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(-33.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </span>
                        </div>

                        <div class="progress g-height-4 g-bg-gray-light-v8 g-rounded-2">
                            <div class="progress-bar g-bg-teal-v2 g-rounded-2" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- End Advertising Income -->

                    <!-- Projects Income -->
                    <div class="g-mb-30">
                        <div class="media u-link-v5  g-mb-10">
                            <span class="media-body align-self-center">Projects Income</span>
                            <span class="d-flex align-self-center">
          <svg class="g-fill-red" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(-21.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
          <svg class="g-fill-gray-dark-v9" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(-33.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </span>
                        </div>

                        <div class="progress g-height-4 g-bg-gray-light-v8 g-rounded-2">
                            <div class="progress-bar g-bg-lightblue-v3 g-rounded-2" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- End Projects Income -->

                    <!-- Template Sales -->
                    <div>
                        <div class="media u-link-v5  g-mb-10">
                            <span class="media-body align-self-center">Template Sales</span>
                            <span class="d-flex align-self-center">
          <svg class="g-fill-gray-dark-v9" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(-21.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon points="6 20 0 13.9709049 0.576828937 13.3911999 5.59205874 18.430615 5.59205874 0 6.40794126 0 6.40794126 18.430615 11.4223552 13.3911999 12 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
          <svg class="g-fill-lightblue-v3" width="12px" height="20px" viewBox="0 0 12 20" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <g transform="translate(-33.000000, -751.000000)">
              <g transform="translate(0.000000, 64.000000)">
                <g transform="translate(20.000000, 619.000000)">
                  <g transform="translate(1.000000, 68.000000)">
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)" points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
                  </g>
                </g>
              </g>
            </g>
          </svg>
        </span>
                        </div>

                        <div class="progress g-height-4 g-bg-gray-light-v8 g-rounded-2">
                            <div class="progress-bar g-bg-darkblue-v2 g-rounded-2" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- End Template Sales -->
                </section>
                <!-- End Activity Bars -->

                <!-- Activity Accounts -->
                <section class="g-pa-20">
                    <h5 class="text-uppercase g-font-size-default g-letter-spacing-0_5 g-mb-10">My accounts</h5>

                    <div class="media u-header-dropdown-bordered-v2 g-py-10">
                        <div class="d-flex align-self-center g-mr-12">
                            <span class="u-badge-v2--sm g-pos-stc g-transform-origin--top-left g-bg-teal-v2"></span>
                        </div>

                        <div class="media-body align-self-center">Credit Card</div>

                        <div class="d-flex text-right">$12.240</div>
                    </div>

                    <div class="media u-header-dropdown-bordered-v2 g-py-10">
                        <div class="d-flex align-self-center g-mr-12">
                            <span class="u-badge-v2--sm g-pos-stc g-transform-origin--top-left g-bg-lightblue-v3"></span>
                        </div>

                        <div class="media-body align-self-center">Debit Card</div>

                        <div class="d-flex text-right">$228.110</div>
                    </div>

                    <div class="media g-py-10">
                        <div class="d-flex align-self-center g-mr-12">
                            <span class="u-badge-v2--sm g-pos-stc g-transform-origin--top-left g-bg-darkblue-v2"></span>
                        </div>

                        <div class="media-body align-self-center">Savings Account</div>

                        <div class="d-flex text-right">$128.248.000</div>
                    </div>
                </section>
                <!-- End Activity Accounts -->

                <!-- Activity Transactions -->
                <section class="g-pa-20">
                    <h5 class="text-uppercase g-font-size-default g-letter-spacing-0_5 g-mb-10">Transactions</h5>

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-plus g-color-lightblue-v3"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$240.00</strong>
                                <p class="mb-0 g-mt-5">Addiction When Gambling Becomes</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i>
                                <small>5 Min ago</small>
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-minus g-color-red"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$126.00</strong>
                                <p class="mb-0 g-mt-5">Make Myspace Your</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i>
                                <small>25 Nov 2017</small>
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-plus g-color-lightblue-v3"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$560.00</strong>
                                <p class="mb-0 g-mt-5">Writing A Good Headline</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i>
                                <small>22 Nov 2017</small>
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-plus g-color-lightblue-v3"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$6.00</strong>
                                <p class="mb-0 g-mt-5">Buying Used Electronic Equipment</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i>
                                <small>13 Oct 2017</small>
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-plus g-color-lightblue-v3"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$320.00</strong>
                                <p class="mb-0 g-mt-5">Gambling Becomes A Problem</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i>
                                <small>27 Jul 2017</small>
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-minus g-color-red"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$28.00</strong>
                                <p class="mb-0 g-mt-5">Baby Monitor Technology</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i>
                                <small>05 Mar 2017</small>
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-plus g-color-lightblue-v3"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$490.00</strong>
                                <p class="mb-0 g-mt-5">Adwords Keyword Research For Beginners</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 text-uppercase g-font-size-11 g-letter-spacing-0_5 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i> 09 Feb 2017
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->

                    <!-- Transaction Item -->
                    <div class="u-header-dropdown-bordered-v2 g-py-20">
                        <div class="media g-pos-rel">
                            <div class="d-flex align-self-start g-pt-3 g-mr-12">
                                <i class="hs-admin-minus g-color-red"></i>
                            </div>

                            <div class="media-body align-self-start">
                                <strong class="d-block g-font-size-17 g-font-weight-400 g-line-height-1">$14.20</strong>
                                <p class="mb-0 g-mt-5">A Good Autoresponder</p>
                            </div>

                            <em class="d-flex align-items-center g-pos-abs g-top-0 g-right-0 text-uppercase g-font-size-11 g-letter-spacing-0_5 g-font-style-normal g-color-lightblue-v2">
                                <i class="hs-admin-time icon-clock g-font-size-default g-mr-8"></i> 09 Feb 2017
                            </em>
                        </div>
                    </div>
                    <!-- End Transaction Item -->
                </section>
                <!-- End Activity Transactions -->
            </div>
            <!-- End Top Activity Panel -->

        </div>
    </header>
    <!-- End Header -->


    <main class="container-fluid px-0 g-pt-65">


        <? if (\skeeks\cms\backend\BackendComponent::getCurrent() instanceof \skeeks\hosting\backend\HostingVpsBackend) : ?>

            <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-bg-gray-light-v4">

                <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu mb-0">
                    <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item
                    ">
                        <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 sx-menu-link-pink"
                           href="<?= \yii\helpers\Url::to(['/hosting/upa-hosting/index']) ?>"
                        >
                    <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                    <i class="fas fa-arrow-left"></i>
                    </span>
                            <span class="media-body align-self-center">Все VPS аккаунты</span>
                        </a>
                    </li>
                </ul>

                <?
                \skeeks\hosting\assets\Vps2Asset::register($this);
                $vpsJs = \yii\helpers\Json::encode([
                    'id'           => \Yii::$app->hostingVpsBackend->vps->id,
                    'backendStart' => \yii\helpers\Url::to(['/hosting/hosting-vps/start']),
                    'backendStop'  => \yii\helpers\Url::to(['/hosting/hosting-vps/stop']),
                ]);
                $this->registerJs(<<<JS
(function(sx, $, _)
{
    sx.Vps = new sx.classes.Vps({$vpsJs});
})(sx, sx.$, sx._);
JS
                );
                ?>


                <? if (\Yii::$app->hostingVpsBackend->vps->status == \skeeks\hosting\models\HostingVps::STATUS_RUNNING) : ?>
                    <div class="text-center" style="
    /*background: #cdffcd;*/
    padding: 10px;
">

                        <?= \yii\helpers\Html::button('<i class="fa fa-power-off"></i> Выключить VPS', [
                            'class'   => 'btn btn-sm u-btn-inset u-btn-inset--rounded u-btn-primary g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10',
                            'onclick' => 'sx.Vps.stop(); return false;',
                        ]); ?>
                    </div>
                <? else : ?>
                    <div class="text-center" style="
                            /*margin-bottom: 20px;
    background: #ff00004f;*/
    padding: 10px;">

                        <?= \yii\helpers\Html::button('<i class="fa fa-play"></i> Включить VPS', [
                            'class'   => 'btn btn-sm u-btn-inset u-btn-inset--rounded u-btn-teal g-font-weight-600 g-letter-spacing-0_5 text-uppercase g-brd-2 g-rounded-50 g-mr-10',
                            'onclick' => 'sx.Vps.start(); return false;',
                        ]); ?>
                    </div>
                <? endif; ?>

            </div>

        <? elseif (\skeeks\cms\backend\BackendComponent::getCurrent()->id != 'upaBackend') : ?>
            <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-bg-gray-light-v4 sx-hide-on-empty">
                <ul id="sideNavMenu" class="u-sidebar-navigation-v1-menu u-side-nav--top-level-menu mb-0">
                    <li class="u-sidebar-navigation-v1-menu-item u-side-nav--top-level-menu-item
                    ">
                        <a class="media u-side-nav--top-level-menu-link u-side-nav--hide-on-hidden g-px-15 g-py-12 sx-menu-link-pink"
                           href="<?= \yii\helpers\Url::to(['/upa-home']) ?>"
                        >
                    <span class="d-flex align-self-center g-pos-rel g-font-size-18 g-mr-18">
                    <i class="fas fa-arrow-left"></i>
                    </span>
                            <span class="media-body align-self-center">Личный кабинет</span>
                        </a>
                    </li>
                </ul>
            </div>
        <? endif; ?>

        <div class="row no-gutters g-pos-rel g-overflow-x-hidden g-min-height-100vh">
            <!-- Sidebar Nav -->
            <div id="sideNav" class="<?= $slideNavClasses; ?>">


                <?= $this->render("@app/views/layouts/_admin-menu"); ?>


                <? if (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'crmBackend') : ?>

                    <div class="text-center g-mt-20 g-mb-20 sx-schedule-left-block">
                        <?= \skeeks\crm\widgets\ScheduleBtnWidget::widget(); ?>
                    </div>

                    <? if (\Yii::$app->user->identity->isWorkNow) : ?>

                        <? if (\Yii::$app->user->identity->crmTaskInWork) : ?>
                            <div class="text-center g-mt-20 g-mb-20 g-pt-10 g-pl-10 g-pr-10 g-pb-10 sx-schedule-left-block g-bg-in-work" style="
    overflow: hidden;
    line-height: 21px;
    text-align: left !important;">
                                <? /*= Html::a(\Yii::$app->user->identity->crmTaskInWork->asText, \Yii::$app->user->identity->crmTaskInWork->url); */ ?><!--
                                --><? /*= \skeeks\crm\widgets\TaskStatusWidget::widget(['task' => \Yii::$app->user->identity->crmTaskInWork]); */ ?>
                                <?= \skeeks\crm\widgets\TaskViewWidget::widget(['task' => \Yii::$app->user->identity->crmTaskInWork]); ?>
                            </div>
                        <? else : ?>
                            <div class="text-center g-mt-20 g-mb-20 g-pt-10 g-pl-10 g-pr-10 g-pb-10 sx-schedule-left-block g-bg-darkred">
                                <?= Html::a("Включите задачу!", \yii\helpers\Url::to(['/crm/work-crm-task']), ['style' => 'color: white;']); ?>
                            </div>
                        <? endif; ?>

                    <? endif; ?>




                    <div class="sx-left-block-workers">

                        <? $this->registerJs(<<<JS
                        $("body").on('click', ".sx-show-workers", function() {
                            $('.sx-left-block-workers-list-hide').toggle();
                            $(this).tooltip('hide');
                            $(this).hide();
                            return false;
                        });
JS
                        ); ?>

                        <? $userIds = []; ?>
                        <? if ($users = \common\models\User::findByAuthAssignments(\Yii::$app->crm->employee_auth_assignment)
                            //->joinWith("notEndCrmScheduleByDate as notEndCrmScheduleByDate")
                            ->joinWith("crmSchedulesByDate as crmSchedulesByDate")
                            ->andWhere(["is not", "crmSchedulesByDate.id", null])
                            ->all()
                        ) : ?>
                            <div class="sx-left-block-workers-list col-md-12 g-color-gray-dark-v6">
                                <h6><a href="<?= \yii\helpers\Url::to(['/crm/crm-user']); ?>">Сотрудники</a></h6>
                                <? foreach ($users as $user) : ?>
                                    <div class="card g-pa-10 g-mb-5">
                                        <? $userIds[] = $user->id; ?>
                                        <?= \skeeks\crm\widgets\WorkerViewWidget::widget(['user' => $user]); ?>
                                    </div>
                                <? endforeach; ?>
                            </div>
                        <? endif; ?>



                        <?/*
                        if ($users = \common\models\User::findByAuthAssignments('work')
                            ->andWhere(["not in", \common\models\User::tableName().".id", $userIds])
                            ->all()
                        ) : */?><!--
                            <div class="text-center">
                                <a href="#" class="sx-show-workers" data-toggle="tooltip" data-placement="right">Показать всех</a>
                            </div>

                            <div class="sx-left-block-workers-list sx-left-block-workers-list-hide col-md-12">
                                <?/* foreach ($users as $user) : */?>
                                    <div class="card g-pa-10 g-mb-5">
                                        <?/*= \skeeks\crm\widgets\WorkerViewWidget::widget(['user' => $user]); */?>
                                    </div>
                                <?/* endforeach; */?>
                            </div>
                        --><?/* endif; */?>



                        <?
                        $subquery = \skeeks\crm\models\CrmTaskSchedule::find()
                            ->select([
                                \skeeks\crm\models\CrmTaskSchedule::tableName().".*",
                                "crmTask.crm_project_id as crm_project_id",
                            ])
                            ->joinWith("crmTask as crmTask")
                            ->orderBy([\skeeks\crm\models\CrmTaskSchedule::tableName().".created_at" => SORT_DESC]);

                        $projects = \skeeks\crm\models\CrmProject::find()
                            ->joinWith('crmTasks as crmTasks')
                            //->joinWith('crmTasks.crmTaskSchedules as crmTaskSchedules')
                            ->leftJoin(['crmTaskSchedules' => $subquery], ['crmTaskSchedules.crm_project_id' => new \yii\db\Expression(\skeeks\crm\models\CrmProject::tableName().".id")])
                            ->where(['crmTaskSchedules.cms_user_id' => \Yii::$app->user->id])
                            ->orderBy([
                                'crmTaskSchedules.date'       => SORT_DESC,
                                'crmTaskSchedules.start_time' => SORT_DESC,
                            ])
                            ->groupBy(\skeeks\crm\models\CrmProject::tableName().".id")
                            ->limit(6)
                            ->all();
                        /*print_r($projects->createCommand()->rawSql);die;*/

                        ?>
                        <? if ($projects) : ?>
                            <div class="sx-left-block-workers g-color-gray-dark-v6">
                                <div class="sx-left-block-workers-list col-md-12">
                                    <h6><a href="<?= \yii\helpers\Url::to(['/crm/crm-project']); ?>">Последние проекты</a></h6>
                                    <? foreach ($projects as $project) : ?>
                                        <div class="card g-pa-10 g-mb-5">
                                            <?= \skeeks\crm\widgets\ProjectViewWidget::widget(['project' => $project]); ?>
                                        </div>
                                    <? endforeach; ?>
                                </div>
                            </div>
                        <? endif; ?>


                    </div>
                <? endif; ?>


            </div>
            <!-- End Sidebar Nav -->


            <div class="col g-ml-45 g-ml-0--lg g-pb-65--md sx-main-col">
                <!-- Breadcrumb-v1 -->
                <div class="g-hidden-sm-down g-bg-gray-light-v8 g-pa-20 sx-hide-on-empty">
                    <!--<div class="row">-->
                    <? $controller = \Yii::$app->controller; ?>
                    <? if ($controller && $controller instanceof \skeeks\cms\backend\IHasBreadcrumbs && $controller->breadcrumbsData) : ?>
                        <ul class="u-list-inline g-color-gray-dark-v6">

                            <li class="list-inline-item g-mr-10">
                                <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\Url::to(['/upa-home']) ?>">Рабочий стол</a>
                                <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                            </li>

                            <? if (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'hostingVpsBackend') : ?>
                                <li class="list-inline-item g-mr-10">
                                    <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\Url::to(['/hosting/upa-hosting/index']) ?>">Мои VPS</a>
                                    <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                </li>
                                <li class="list-inline-item g-mr-10">
                                    <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="
                                    <?= \yii\helpers\Url::to(['/hosting/hosting-vps/index']) ?>">VPS <?= \Yii::$app->hostingVpsBackend->vps->id; ?></a>
                                    <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                </li>
                            <? elseif (\skeeks\cms\backend\BackendComponent::getCurrent()->id == 'crmBackend') : ?>
                                <li class="list-inline-item g-mr-10">
                                    <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\Url::to(['/work/crm-portal']) ?>">Кабинет сотрудника</a>
                                    <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                </li>
                            <? endif; ?>

                            <? $total = count($controller->breadcrumbsData); ?>
                            <? $counter = 0; ?>
                            <? foreach ($controller->breadcrumbsData as $row) : ?>
                                <? $counter++; ?>
                                <? if ($counter == $total) : ?>
                                    <li class="list-inline-item g-mr-10">
                                        <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\ArrayHelper::getValue($row,
                                            'url'); ?>"><?= \yii\helpers\ArrayHelper::getValue($row, 'label'); ?></a>
                                    </li>
                                <? else : ?>
                                    <li class="list-inline-item g-mr-10">
                                        <a class="u-link-v5 g-color-gray-dark-v6 g-color-secondary--hover g-valign-middle" href="<?= \yii\helpers\ArrayHelper::getValue($row,
                                            'url'); ?>"><?= \yii\helpers\ArrayHelper::getValue($row, 'label'); ?></a>
                                        <i class="hs-admin-angle-right g-font-size-12 g-color-gray-light-v6 g-valign-middle g-ml-10"></i>
                                    </li>
                                <? endif; ?>

                            <? endforeach; ?>
                        </ul>
                    <? endif; ?>


                    <!-- <div class="col-sm-2">
                            <? /* if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : */ ?>
                                <? /*= \skeeks\cms\backend\widgets\ModalPermissionWidget::widget([
                                    'controller' => \Yii::$app->controller,
                                ]); */ ?>
                            <? /* endif; */ ?>
                        </div>
                        </div>-->


                </div>
                <!-- End Breadcrumb-v1 -->


                <!--<div class="g-bg-lightblue-v10-opacity-0_5 g-pa-20">
                    <div class="row">-->

                <!-- Statistic Card -->
                <div class="g-pa-20">
                    <!-- Statistic Card -->
                    <!--<div class="card g-brd-gray-light-v7 u-card-v1 g-pa-15 g-pa-25-30--md g-mb-30">-->
                    <!--<div class="card g-brd-gray-light-v7 g-pa-15 g-pa-25-30--md g-mb-30">-->
                    <!--<header class="media g-mb-30">
                        <h3 class="d-flex align-self-center text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Project statistics</h3>

                        <div class="media-body d-flex justify-content-end">
                            <a class="d-flex align-items-center hs-admin-panel u-link-v5 g-font-size-20 g-color-gray-light-v3 g-color-secondary--hover g-ml-5 g-ml-30--md" href="#!"></a>
                        </div>
                    </header>-->


                    <div class="sx-empty-layout-hidden-no">
                        <? if (!\skeeks\cms\backend\helpers\BackendUrlHelper::createByParams()->setBackendParamsByCurrentRequest()->isNoActions) : ?>
                            <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\IHasInfoActions
                                && \Yii::$app->controller->actions) : ?>
                                <?
                                echo \skeeks\cms\backend\widgets\ControllerActionsWidget::currentWidget([
                                    'options'            => [
                                        //'class' => 'nav justify-content-center u-nav-v4-1 u-nav-primary sx-main-page-nav',
                                        'class' => 'nav u-nav-v7-1 u-nav-primary sx-main-page-nav',
                                        'style' => 'font-size: 16px;',
                                    ],
                                    'itemWrapperOptions' => [
                                        'class' => 'nav-item',
                                    ],
                                    'itemOptions'        => [
                                        'class' => 'nav-link',
                                    ],
                                ]);
                                ?>
                            <? endif; ?>
                        <? endif; ?>
                    </div>

                    <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\controllers\IBackendModelController
                        && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>
                        <div class="">
                            <div class="panel-content-before panel-content-before-second">
                                <? if (\Yii::$app->controller && \Yii::$app->controller instanceof \skeeks\cms\backend\controllers\IBackendModelController
                                    && \Yii::$app->controller->modelActions && count(\Yii::$app->controller->modelActions) > 1) : ?>


                                    <div class="sx-model-title" title="<?= \Yii::$app->controller->modelShowName; ?>">
                                        <?= \Yii::$app->controller->modelHeader; ?>
                                    </div>

                                    <?
                                    echo \skeeks\cms\backend\widgets\ControllerActionsWidget::widget([
                                        'actions'            => \Yii::$app->controller->modelActions,
                                        'activeId'           => \Yii::$app->controller->action->id,
                                        'options'            => [
                                            'class' => 'nav nav-tabs sx-nav-with-bg sx-mgr-6 sx-nav-model',
                                        ],
                                        'itemWrapperOptions' => [
                                            'class' => 'nav-item',
                                        ],
                                        'itemOptions'        => [
                                            'class' => 'nav-link',
                                        ],
                                    ]);
                                    ?>


                                <? endif; ?>
                            </div>
                        </div>
                        <div class="tab-content">
                            <section>
                                <?= $content; ?>
                            </section>
                        </div>
                    <? else : ?>
                        <section>
                            <?= $content; ?>
                        </section>
                    <? endif; ?>


                    <!--</div>-->
                    <!-- End Statistic Card -->
                </div>
                <!-- End Statistic Card -->
                <!--</div>
            </div>-->

                <!-- Footer -->
                <footer id="footer" class="u-footer--bottom-sticky g-bg-white g-color-gray-dark-v6 g-brd-top g-brd-gray-light-v7 g-pa-20">
                    <div class="row align-items-center">
                        <!-- Footer Nav -->
                        <div class="col-md-4 g-mb-10 g-mb-0--md">
                            <ul class="list-inline text-center text-md-left mb-0">
                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="<?= \yii\helpers\Url::home(); ?>">Главная</a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="g-color-gray-dark-v6">|</span>
                                </li>

                                <li class="list-inline-item">
                                    <a class="g-color-gray-dark-v6 g-color-secondary--hover" href="<?= \yii\helpers\Url::to(['/cms/tree/view', 'dir' => 'about']); ?>">
                                        О компании
                                    </a>
                                </li>

                            </ul>
                        </div>
                        <!-- End Footer Nav -->

                        <!-- Footer Socials -->
                        <div class="col-md-4 g-mb-10 g-mb-0--md">
                            <ul class="list-inline g-font-size-16 text-center mb-0">
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://www.facebook.com/skeekscom" class="g-color-facebook g-color-secondary--hover">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://www.youtube.com/channel/UC26fcOT8EK0Rr80WSM44mEA" class="g-color-youtube g-color-secondary--hover">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://github.com/skeeks-cms/cms" class="g-color-black g-color-secondary--hover">
                                        <i class="fa fa-github"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item g-mx-10">
                                    <a href="https://vk.com/skeeks_com" class="g-color-vk g-color-secondary--hover">
                                        <i class="fa fa-vk"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Footer Socials -->

                        <!-- Footer Copyrights -->
                        <div class="col-md-4 text-center text-md-right">


                            <? if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : ?>
                                <a class="text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#sx-permisson-modal" data-toggle="modal">
                                    <i class="fa fa-exclamation-circle"></i>
                                    <!--<i class="hs-admin-align-right g-absolute-centered"></i>-->
                                </a>
                            <? endif; ?>

                            <small class="d-block g-font-size-default">&copy; 2018 Skeeks.com</small>

                        </div>
                        <!-- End Footer Copyrights -->
                    </div>
                </footer>
                <!-- End Footer -->
            </div>
        </div>
    </main>


    <? if (\Yii::$app->user->can('rbac/admin-permission') && \Yii::$app->controller instanceof \skeeks\cms\IHasPermissions) : ?>
        <!--<div style="display: none; z-index: -100000;">-->
        <?= \skeeks\cms\backend\widgets\ModalPermissionWidget::widget([
            'id'                   => 'sx-permisson-modal',
            'controller'           => \Yii::$app->controller,
            'toggleButton'         => false,
            'standartToggleButton' => false,
        ]); ?>
        <!--</div>-->
    <? endif; ?>


    <!-- Yandex.Metrika counter -->
    <script type="text/javascript"> (function (d, w, c) {
            (w[c] = w[c] || []).push(function () {
                try {
                    w.yaCounter35310795 = new Ya.Metrika({id: 35310795, clickmap: true, trackLinks: true, accurateTrackBounce: true, webvisor: true, trackHash: true});
                } catch (e) {
                }
            });
            var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () {
                n.parentNode.insertBefore(s, n);
            };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";
            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else {
                f();
            }
        })(document, window, "yandex_metrika_callbacks"); </script>
    <noscript>
        <div><img src="https://mc.yandex.ru/watch/35310795" style="position:absolute; left:-9999px;" alt=""/></div>
    </noscript> <!-- /Yandex.Metrika counter -->

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>