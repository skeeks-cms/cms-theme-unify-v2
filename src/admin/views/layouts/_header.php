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
            <!-- Messages/Notifications/Top Search Bar/Top User -->
            <div class="col-auto d-flex g-py-12 g-pl-40--lg ml-auto">
                <!-- Top Messages -->
                <div class="sx-now-hide g-pos-rel g-hidden-sm-down g-mr-5">
                    <a id="messagesInvoker" class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="messagesMenu" aria-haspopup="true"
                       aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#messagesMenu"
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
                    <a id="notificationsInvoker" class="d-block text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="notificationsMenu"
                       aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
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
                <a id="searchInvoker" class="sx-now-hide g-hidden-sm-up text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="searchMenu"
                   aria-haspopup="true" aria-expanded="false" data-is-mobile-only="true" data-dropdown-event="click"
                   data-dropdown-target="#searchMenu" data-dropdown-type="css-animation" data-dropdown-duration="300" data-dropdown-animation-in="fadeIn" data-dropdown-animation-out="fadeOut">
                    <i class="hs-admin-search g-absolute-centered"></i>
                </a>
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
                                      <i class="hs-admin-rocket"></i>
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
            <!-- Top Activity Toggler -->
            <a id="activityInvoker" class="sx-now-hide text-uppercase u-header-icon-v1 g-pos-rel g-width-40 g-height-40 rounded-circle g-font-size-20" href="#!" aria-controls="activityMenu" aria-haspopup="true"
               aria-expanded="false" data-dropdown-event="click" data-dropdown-target="#activityMenu"
               data-dropdown-type="css-animation" data-dropdown-animation-in="fadeInRight" data-dropdown-animation-out="fadeOutRight" data-dropdown-duration="300">
                <i class="hs-admin-align-right g-absolute-centered"></i>
            </a>
            <!-- End Top Activity Toggler -->
        </nav>

        <!-- Top Activity Panel -->
        <div id="activityMenu" class="js-custom-scroll u-header-sidebar g-pos-fix g-top-0 g-left-auto g-right-0 g-z-index-4 g-width-300 g-width-400--sm g-height-100vh" aria-labelledby="activityInvoker">
            <div class="u-header-dropdown-bordered-v1 g-pa-20">
                <a id="activityInvokerClose" class="pull-right g-color-lightblue-v2" href="#!" aria-controls="activityMenu" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
                   data-dropdown-target="#activityMenu" data-dropdown-type="css-animation"
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
                                            <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)"
                                                     points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
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
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)"
                             points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
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
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)"
                             points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
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
                    <polygon transform="translate(18.000000, 10.000000) scale(1, -1) translate(-18.000000, -10.000000)"
                             points="18 20 12 13.9709049 12.5768289 13.3911999 17.5920587 18.430615 17.5920587 0 18.4079413 0 18.4079413 18.430615 23.4223552 13.3911999 24 13.9709049"></polygon>
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