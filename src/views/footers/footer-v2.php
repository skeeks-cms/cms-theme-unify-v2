<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

    <div id="contacts-section" class="sx-footer g-py-60">
        <!-- Footer Content -->
        <div class="container">
            <div class="row">
                <!-- Footer Content -->
                <div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg text-center">
                    <a class="d-block g-width-100 mx-auto g-mb-30" href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>">
                        <img class="img-fluid" src="<?= $this->theme->footer_logo ? $this->theme->footer_logo : $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                    </a>
                    <ul class="list-inline g-mb-20">
                        <? if ($this->theme->vk) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->vk; ?>"
                                   target="_blank"
                                >
                                    <i class="fab fa-vk"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->youtube) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->youtube; ?>"
                                   target="_blank"
                                >
                                    <i class="fab fa-youtube"></i>
                                </a>
                            </li>
                        <? endif; ?>


                        <? if ($this->theme->instagram) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->instagram; ?>"
                                   target="_blank"
                                >
                                    <i class="fab fa-instagram"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->facebook) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->facebook; ?>"
                                   target="_blank"
                                >
                                    <i class="fab fa-facebook"></i>
                                </a>
                            </li>
                        <? endif; ?>

                    </ul>
                </div>
                <!-- End Footer Content -->
                <!-- Footer Content -->
                <? if (\Yii::$app->mobileDetect->isDesktop) : ?>
                    <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                        'namespace'       => 'menu-footer-2',
                        'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/menu-footer',
                        'label'           => \Yii::t('skeeks/unify', 'Menu'),
                        'level'           => '1',
                        'enabledRunCache' => 'Y',
                    ]); ?>
                <? endif; ?>

                <div class="col-sm-6 col-lg">
                    <? if (\Yii::$app->user->isGuest) : ?>
                        <div class="u-heading-v2-3--bottom g-mb-20">
                            <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Authorization'); ?></h2>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="g-mb-8">
                                <a class="g-color-black" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/login'); ?>" title="<?= \Yii::t('skeeks/unify', 'Sign in'); ?>">
                                    <i class="fas fa-sign-in"></i> <?= \Yii::t('skeeks/unify', 'Sign in'); ?>
                                </a>
                            </li>
                            <li class="g-mb-8">
                                <a class="g-color-black" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/register'); ?>" title="<?= \Yii::t('skeeks/unify', 'Sign up'); ?>">
                                    <i class="fas fa-user-plus"></i> <?= \Yii::t('skeeks/unify', 'Sign up'); ?>
                                </a>
                            </li>
                        </ul>
                    <? else : ?>
                        <div class="u-heading-v2-3--bottom g-mb-20">
                            <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Personal data'); ?></h2>
                        </div>
                        <ul class="list-unstyled mb-0">
                            <li class="g-mb-8">
                                <!-- Top User -->
                                <a class="" href="<?= \yii\helpers\Url::to(['/cms/upa-personal/update']) ?>">
                                <span class="g-pos-rel">
                                    <span class="u-badge-v2--xs u-badge--top-right g-hidden-sm-up g-bg-secondary g-mr-5"></span>
                                    <img class="g-width-30 g-width-30--md g-height-30 g-height-30--md rounded-circle" src="<?= \Yii::$app->user->identity->avatarSrc ? \Yii::$app->user->identity->avatarSrc : \skeeks\cms\helpers\Image::getCapSrc(); ?>" alt="Image description">
                                </span>
                                    <span class="g-pos-rel g-top-2">
                                    <span class="g-hidden-sm-down"><?= \Yii::$app->user->identity->displayName; ?></span>
                                </span>
                                </a>
                            </li>
                            <li class="g-mb-8">
                                <!-- Top User -->
                                <a class="" href="<?= \skeeks\cms\helpers\UrlHelper::construct('cms/auth/logout')->setCurrentRef(); ?>" data-method="post">
                                    <i class="fas fa-sign-out-alt"></i> <?= \Yii::t('skeeks/unify', 'Logout'); ?>
                                </a>
                            </li>
                        </ul>
                        <!-- End Top User -->
                    <? endif; ?>
                </div>
                <!-- End Footer Content -->
                <!-- Footer Content -->
                <div class="col-lg-3 col-md-6">
                    <div class="u-heading-v2-3--bottom g-mb-20">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Contacts'); ?></h2>
                    </div>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('footer-address-text'); ?>
                    <address class="g-bg-no-repeat g-font-size-12 mb-0">
                        <? if ($this->theme->address) : ?>
                            <!-- Location -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs">
                                    <i class="fas fa-map-marker"></i>
                                  </span>
                                </div>
                                <p class="mb-0"><?= $this->theme->address; ?></p>
                            </div>
                            <!-- End Location -->
                        <? endif; ?>

                        <? if ($this->theme->phone) : ?>
                            <!-- Phone -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fas fa-phone"></i>
                              </span>
                                </div>
                                <a class="" href="tel:<?= $this->theme->phone; ?>"><?= $this->theme->phone; ?></a>
                            </div>
                            <!-- End Phone -->
                        <? endif; ?>
                        
                        <? if ($this->theme->phone_second) : ?>
                            <!-- Phone -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fas fa-phone"></i>
                              </span>
                                </div>
                                <a class="" href="tel:<?= $this->theme->phone_second; ?>"><?= $this->theme->phone_second; ?></a>
                                
                            </div>
                            <!-- End Phone -->
                        <? endif; ?>

                        <? if ($this->theme->phone_third) : ?>
                            <!-- Phone -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fas fa-phone"></i>
                              </span>
                                </div>
                                <a class="" href="tel:<?= $this->theme->phone_third; ?>"><?= $this->theme->phone_third; ?></a>
                                
                            </div>
                            <!-- End Phone -->
                        <? endif; ?>

                        <? if ($this->theme->email) : ?>
                            <!-- Email and Website -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fas fa-globe"></i>
                              </span>
                                </div>
                                <p class="mb-0">
                                    <a class="" href="mailto:<?= $this->theme->email; ?>"><?= $this->theme->email; ?></a>
                                </p>
                            </div>
                            <!-- End Email and Website -->
                        <? endif; ?>
                    </address>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::end(); ?>
                </div>
                <!-- End Footer Content -->

            </div>
        </div>
        <!-- End Footer Content -->

    </div>

    <?= $this->render('@app/views/include/footer-copyright'); ?>

    <!-- End Footer -->
    <a class="js-go-to u-go-to-v1" href="#!" data-type="fixed" data-position='{
             "bottom": 15,
             "right": 15
           }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
        <i class="hs-icon hs-icon-arrow-top"></i>
    </a>
    <div class="u-outer-spaces-helper"></div>

<?
\skeeks\assets\unify\base\UnifyHsGoToAsset::register($this);
$this->registerJs(<<<JS
// initialization of go to
$.HSCore.components.HSGoTo.init('.js-go-to');
JS
);
?>