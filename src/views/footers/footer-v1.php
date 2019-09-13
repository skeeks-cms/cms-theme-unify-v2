<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>

    <div id="contacts-section" class="sx-footer g-bg-secondary g-py-60">
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
                                    <i class="fa fa-vk"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->youtube) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->youtube; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-youtube"></i>
                                </a>
                            </li>
                        <? endif; ?>


                        <? if ($this->theme->instagram) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->instagram; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-instagram"></i>
                                </a>
                            </li>
                        <? endif; ?>

                        <? if ($this->theme->facebook) : ?>
                            <li class="list-inline-item g-mx-5">
                                <a class="u-icon-v1 u-icon-size--sm u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
                                   href="<?= $this->theme->facebook; ?>"
                                   target="_blank"
                                >
                                    <i class="fa fa-facebook"></i>
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

                    <?= \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget::widget([
                        'namespace'       => 'menu-footer-3',
                        'viewFile'        => '@app/views/widgets/TreeMenuCmsWidget/menu-footer',
                        'label'           => "Услуги",
                        'treeParentCode'  => 'services',
                        'enabledRunCache' => 'Y',
                        'limit'           => 6,
                    ]); ?>
                <? endif; ?>


                <!-- Footer Content -->
                <div class="col-lg-3 col-md-6">
                    <div class="u-heading-v2-3--bottom g-mb-20">
                        <h2 class="u-heading-v2__title h6 text-uppercase mb-0 g-color-black g-font-weight-600"><?= \Yii::t('skeeks/unify', 'Contacts'); ?></h2>
                    </div>
                    <? \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('footer-address-text'); ?>
                    <address class="g-bg-no-repeat g-font-size-12 mb-0">
                        <? if ($this->theme->address) : ?>
                            <!-- Location -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                                  <span class="u-icon-v3 u-icon-size--xs">
                                    <i class="fa fa-map-marker"></i>
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
                                <i class="fa fa-phone"></i>
                              </span>
                                </div>
                                <a class="g-color-black" href="tel:<?= $this->theme->phone; ?>"><?= $this->theme->phone; ?></a>
                            </div>
                            <!-- End Phone -->
                        <? endif; ?>

                        <? if ($this->theme->email) : ?>
                            <!-- Email and Website -->
                            <div class="d-flex g-mb-20">
                                <div class="g-mr-10">
                              <span class="u-icon-v3 u-icon-size--xs">
                                <i class="fa fa-globe"></i>
                              </span>
                                </div>
                                <p class="mb-0">
                                    <a class="g-color-black" href="mailto:<?= $this->theme->email; ?>"><?= $this->theme->email; ?></a>
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

    <?= $this->render('@app/views/include/footer-copyr'); ?>


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