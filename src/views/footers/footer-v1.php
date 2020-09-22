<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */

$this->registerCss(<<<CSS
.sx-social-list {
    
}
.sx-social-list a {
    box-shadow:rgba(0, 0, 0, 0.1) 0px 6px 15px -6px;
    height:32px;
    width:32px;
    font-size:18px;
    line-height:29px;
    display: inline-block;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}
.sx-social-list a i {
    position: relative;
    top: 50%;
    display: block;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 2;
}
.sx-contact-icon i {
    position: relative;
    top: 50%;
    display: block;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    z-index: 2;
}
.sx-contact-icon {
    width: 30px;
    height: 30px;
    font-size: 13px;
    background-color: #eee;
    position: relative;
    display: inline-block;
    text-align: center;
    -webkit-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out;
}

.u-heading-v2-3--bottom::after {
    margin-top: 1.07143rem;
}
.u-heading-v2-3--bottom::after, .u-heading-v2-3--top::before {
    width: 5rem;
    border-top-width: 1px;
}

.u-heading-v2-3--bottom::after {
    content: "";
    display: inline-block;
    border-top-style: solid;
    border-color: inherit;
}
CSS
);
?>

    <div id="contacts-section" class="sx-footer g-py-60">
        <!-- Footer Content -->
        <div class="container sx-container">
            <div class="row">
                <!-- Footer Content -->
                <div class="col-sm-6 col-lg g-mb-30 g-mb-0--lg text-center">
                    <a class="d-block g-width-200 mx-auto g-mb-30" href="<?= \yii\helpers\Url::home(); ?>" title="<?= $this->theme->title; ?>">
                        <img class="img-fluid" src="<?= $this->theme->footer_logo ? $this->theme->footer_logo : $this->theme->logo; ?>" alt="<?= $this->theme->title; ?>">
                    </a>
                    <ul class="list-inline sx-social-list g-mb-20">
                        <?php if ($socials = \Yii::$app->skeeks->site->cmsSiteSocials) : ?>
                            <?php foreach ($socials as $social) : ?>
                                <li class="list-inline-item g-mx-5">
                                    <a class="g-color-primary g-text-underline--none--hover g-color-white--hover g-bg-white g-bg-primary--hover rounded-circle"
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
                        <div class="u-heading-v2__title sx-footer-title h6 mb-0"><?= \Yii::t('skeeks/unify', 'Contacts'); ?></div>
                    </div>
                    <?
                    $widget = \skeeks\cms\cmsWidgets\text\TextCmsWidget::beginWidget('footer-address-text');
                    $widget->descriptor->name = 'Блок с адресом';
                    ?>
                    <address class="g-bg-no-repeat g-font-size-12 mb-0">

                        <?php if ($addresses = \Yii::$app->skeeks->site->cmsSiteAddresses) : ?>
                            <? foreach ($addresses as $address) : ?>
                                <div class="d-flex g-mb-20">
                                    <div class="g-mr-10">
                                  <span class="sx-contact-icon">
                                    <i class="fas fa-map-marker"></i>
                                  </span>
                                    </div>
                                    <p class="mb-0"><?= $address->value; ?></p>
                                </div>
                            <? endforeach; ?>
                        <?php endif; ?>


                        <?php if ($phones = \Yii::$app->skeeks->site->cmsSitePhones) : ?>
                            <? foreach ($phones as $phone) : ?>
                                <!-- Phone -->
                                <div class="d-flex g-mb-20">
                                    <div class="g-mr-10">
                                  <span class="sx-contact-icon">
                                    <i class="fas fa-phone"></i>
                                  </span>
                                    </div>
                                    <a class="" href="tel:<?= $phone->value; ?>"><?= $phone->value; ?></a>
                                </div>
                                <!-- End Phone -->
                            <? endforeach; ?>
                        <?php endif; ?>


                        <?php if ($emails = \Yii::$app->skeeks->site->cmsSiteEmails) : ?>
                            <? foreach ($emails as $email) : ?>
                                <div class="d-flex g-mb-20">
                                    <div class="g-mr-10">
                                      <span class="sx-contact-icon">
                                        <i class="fas fa-globe"></i>
                                      </span>
                                    </div>
                                    <p class="mb-0">
                                        <a class="" href="mailto:<?= $email->value; ?>"><?= $email->value; ?></a>
                                    </p>
                                </div>
                            <? endforeach; ?>
                        <?php endif; ?>
                    </address>
                    <? $widget::end(); ?>
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