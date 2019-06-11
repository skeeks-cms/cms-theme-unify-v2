<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 25.05.2015
 */
/* @var $this   yii\web\View */
/* @var $widget \skeeks\cms\cmsWidgets\treeMenu\TreeMenuCmsWidget */
/* @var $trees  \skeeks\cms\models\Tree[] */
$trees = $widget->dataProvider->query->all();

\skeeks\assets\unify\base\UnifyRevolutionAsset::register($this);
\skeeks\assets\unify\base\revolution\UnifyRevolutionActionsAsset::register($this);
$this->registerJs(<<<JS
var tpj = jQuery;

    var revapi41;
    tpj(document).ready(function () {
      if (tpj('#rev_slider_41_1').revolution == undefined) {
        revslider_showDoubleJqueryError('#rev_slider_41_1');
      } else {
        revapi41 = tpj('#rev_slider_41_1').show().revolution({
          
          //jsFileLocation: 'revolution/js/',
          sliderLayout: 'fullscreen',
          dottedOverlay: 'none',
          delay: 5000,
          navigation: {
            arrows: {
                enable: true,
                style: 'hesperiden',
            }
          },
          visibilityLevels: [1240, 1024, 778, 480],
          gridwidth: 600,
          gridheight: 600,
          lazyType: 'none',
          shadow: 0,
          spinner: 'off',
          stopLoop: 'on',
          stopAfterLoops: 0,
          stopAtSlide: 1,
          shuffle: 'off',
          autoHeight: 'on',
          disableProgressBar: 'on',
          hideThumbsOnMobile: 'off',
          hideSliderAtLimit: 0,
          hideCaptionAtLimit: 0,
          hideAllCaptionAtLilmit: 0,
          debugMode: false,
          fallbacks: {
            simplifyAll: 'off',
            nextSlideOnWindowFocus: 'off',
            disableFocusListener: false
          }
        });
        }
    });
JS
);
?>
<? if ($trees) : ?>
    <div id="rev_slider_41_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="background: #eef0f1; padding: 0; margin: 0 auto;"
         data-alias="food-carousel26"
         data-source="gallery">
        <div id="rev_slider_41_1" class="rev_slider fullwidthabanner" style="display: none;"
             data-version="5.4.1">
            <ul>
                <? if ($trees) : ?>
                    <? foreach ($trees as $key => $tree) : ?>
                        <li data-index="rs-<?= $tree->id; ?>"
                            data-slotamount="7"
                            data-hideafterloop="0"
                            data-hideslideonmobile="off"
                            data-masterspeed="300"
                            data-thumb="<?= $tree->image->src; ?>"
                            data-title="<?= $tree->name; ?>"
                            data-transition="slidingoverlayup"

                            style="background-color: #F6F6F6;
                                    background-image: url(<?= $tree->image->src; ?>);
                                    background-position-y: 37px;background-size: cover;">

                            <? if ($customContent = $tree->relatedPropertiesModel->getAttribute('customContent')) : ?>
                                <div style="padding-top: 26%;">
                                    <?= $customContent; ?>
                                </div>
                            <? endif; ?>
                        </li>

                    <? endforeach; ?>
                <? endif; ?>

            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
<? endif; ?>
