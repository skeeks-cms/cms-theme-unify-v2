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
        <div class="container sx-container">
            <div class="row">
                <!-- Footer Content -->
                <div class="col-sm-12 col-lg g-mb-30 g-mb-0--lg text-center">
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