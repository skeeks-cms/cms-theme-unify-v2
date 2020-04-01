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
$trees = $widget->dataProvider->query->orderBy([$widget->orderBy => $widget->order])->all();
?>

<? if ($trees) : ?>

<?
$arrows = 0;
if (count($trees) > 1) {
    $arrows = "true";
}


?>
<?
\skeeks\assets\unify\base\revolution\UnifyRevolutionAllAsset::register($this);
//\skeeks\assets\unify\base\UnifyRevolutionAsset::register($this);
//\skeeks\assets\unify\base\revolution\UnifyRevolutionActionsAsset::register($this);
$this->registerJs(<<<JS
var tpj = jQuery;

    var revapi1014;
      tpj(document).ready(function () {
        if (tpj("#rev_slider_1014_1").revolution == undefined) {
          revslider_showDoubleJqueryError("#rev_slider_1014_1");
        } else {
          revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
            sliderType: "standard",
            /*jsFileLocation: "revolution/js/",*/
            /*sliderLayout: "fullscreen",*/
            dottedOverlay: "none",
            delay: 9000,
            navigation: {
              keyboardNavigation: "off",
              keyboard_direction: "horizontal",
              mouseScrollNavigation: "off",
              mouseScrollReverse: "default",
              onHoverStop: "off",
              touch: {
                touchenabled: "on",
                swipe_threshold: 75,
                swipe_min_touches: 1,
                swipe_direction: "horizontal",
                drag_block_vertical: false
              }, 
              arrows: {
                style: "uranus",
                enable: {$arrows},
                hide_onmobile: true,
                hide_under: 768,
                hide_onleave: false,
                tmp: '',
                left: {
                  h_align: "left",
                  v_align: "center",
                  h_offset: 20,
                  v_offset: 0
                },
                right: {
                  h_align: "right",
                  v_align: "center",
                  h_offset: 20,
                  v_offset: 0
                }
              }
            },
              
            responsiveLevels: [1240, 1024, 778, 480],
            visibilityLevels: [1240, 1024, 778, 480],
            gridwidth: [1240, 1024, 778, 480],
            gridheight: [500, 500, 500, 500],
            lazyType: "none",
            shadow: 0,
            spinner: "off",
            stopLoop: "on",
            stopAfterLoops: 0,
            stopAtSlide: 1,
            shuffle: "off",
            autoHeight: "off",
            fullScreenAutoWidth: "off",
            fullScreenAlignForce: "off",
            fullScreenOffsetContainer: "#js-header",
            fullScreenOffset: "",
            disableProgressBar: "on",
            hideThumbsOnMobile: "off",
            hideSliderAtLimit: 0,
            hideCaptionAtLimit: 0,
            hideAllCaptionAtLilmit: 0,
            debugMode: false,
            fallbacks: {
              simplifyAll: "off",
              nextSlideOnWindowFocus: "off",
              disableFocusListener: false
            }
          });
        }

        //RsTypewriterAddOn(tpj, revapi1014);
        });
JS
);
?>


<!-- Revolution Slider -->
<div class="g-overflow-hidden">
    <div id="rev_slider_1014_1_wrapper" class="rev_slider_wrapper " data-source="gallery" style="background-color:transparent;padding:0px;">
        <!-- START REVOLUTION SLIDER 5.4.1 fullscreen mode -->
        <div id="rev_slider_1014_1" class="rev_slider" style="display:none;" data-version="5.4.1">
            <ul>

                <? if ($trees) : ?>
                    <? foreach ($trees as $key => $tree) : ?>


                        <!-- SLIDE  -->
                        <!--data-transition="slidingoverlayhorizontal" -->
                        <li data-index="rs-<?= $tree->id; ?>"

                            data-slotamount="default"
                            data-hideafterloop="0" data-hideslideonmobile="off" data-easein="default" data-easeout="default" data-masterspeed="default"
                            data-thumb="<?= $tree->image->src; ?>" data-rotate="0" data-saveperformance="off"
                            data-title="<?= $tree->relatedPropertiesModel->getAttribute('slide_title'); ?>"

                        >
                            <!-- MAIN IMAGE -->
                            <img src="<?= \Yii::$app->imaging->thumbnailUrlOnRequest($tree->image ? $tree->image->src : null,
                                new \skeeks\cms\components\imaging\filters\Thumbnail([
                                    'w' => 1920,
                                    'h' => 500,
                                ]), $tree->code
                            ) ?>" alt="" data-bgposition="center center" class="rev-slidebg"
                                 data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0"
                            >
                            <!-- LAYERS -->
                            <!-- LAYER NR. 1 -->
                            <? if ($tree->relatedPropertiesModel->getAttribute('slide_title')) : ?>
                                <div class="tp-caption tp-shape tp-shapewrapper"
                                     id="slide-<?= $tree->id; ?>-layer-7"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                                     data-width="full"
                                     data-height="full"
                                     data-whitespace="nowrap"

                                     data-type="shape"
                                     data-basealign="slide"
                                     data-responsive_offset="off"
                                     data-responsive="off"
                                     data-frames='[{"from":"opacity:0;","speed":500,"to":"o:1;","delay":0,"ease":"Power4.easeOut"},{"speed":5000,"to":"opacity:0;","ease":"Power4.easeInOut"}]'
                                     data-textAlign="['left','left','left','left']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 5;background-color:rgba(0, 0, 0, 0.<?= $tree->relatedPropertiesModel->getAttribute('slide_opacity'); ?>);border-color:rgba(0, 0, 0, 0);border-width:0px;"></div>
                            <? endif; ?>



                            <? if ($tree->relatedPropertiesModel->getAttribute('slide_title')) : ?>
                                <!-- LAYER NR. 2 -->
                                <div class="tp-caption  h1 tp-resizeme"
                                     id="slide-<?= $tree->id; ?>-layer-1"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['-140','-140','-130','-140']"
                                     data-fontsize="['80','60','50','30']"
                                     data-lineheight="['80','60','50','30']"
                                     data-width="none"
                                     data-height="none"

                                     data-type="text"
                                     data-responsive_offset="on"

                                     data-frames='[{"from":"y:50px;sX:1;sY:1;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 6;font-weight: 700; color: rgba(255, 255, 255, 1.00);border-width:0px;">
                                    <?= $tree->relatedPropertiesModel->getAttribute('slide_title'); ?>
                                </div>
                            <? endif; ?>


                            <? if ($tree->relatedPropertiesModel->getAttribute('slide_title2')) : ?>
                                <!-- LAYER NR. 4 -->
                                <div class="tp-caption   tp-resizeme"
                                     id="slide-<?= $tree->id; ?>-layer-2"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['0','0','-8','-32']"
                                     data-fontsize="['40','40','30','30']"
                                     data-width="[1200, 600, 600, 420]"
                                     data-height="none"
                                     data-whitespace="['normal','normal','normal','normal']"

                                     data-type="text"
                                     data-typewriter='{"lines":"Special%20Offer:%20Free%20Shipping%20Today,%20Shop%20with%20Unify","enabled":"on","speed":"70","delays":"1%7C100","looped":"on","cursorType":"one","blinking":"on","word_delay":"off","sequenced":"on","hide_cursor":"off","start_delay":"1500","newline_delay":"1000","deletion_speed":"20","deletion_delay":"1000","blinking_speed":"500","linebreak_delay":"60","cursor_type":"two","background":"off"}'
                                     data-responsive_offset="on"

                                     data-frames='[{"from":"y:50px;sX:1;sY:1;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[0,0,0,0]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[0,0,0,0]"

                                     style="z-index: 8; min-width: 640px; max-width: 640px; white-space: nowrap; font-size: 40px; line-height: 40px; font-weight: 400; color: rgba(255, 255, 255, 1.00);border-width:0px;">
                                    <?= $tree->relatedPropertiesModel->getAttribute('slide_title2'); ?>
                                </div>
                            <? endif; ?>

                            <? if ($tree->relatedPropertiesModel->getAttribute('slide_btn')) : ?>
                                <!-- LAYER NR. 5 -->
                                <div class="tp-caption rev-btn  tp-resizeme"
                                     id="slide-<?= $tree->id; ?>-layer-4"
                                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                     data-y="['middle','middle','middle','middle']" data-voffset="['140','140','100','83']"
                                     data-width="none"
                                     data-height="none"
                                     data-whitespace="nowrap"

                                     data-type="button"
                                     data-actions='[{"event":"click","action":"scrollbelow","offset":"px","delay":""}]'
                                     data-responsive_offset="on"

                                     data-frames='[{"from":"x:-50px;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"},{"frame":"hover","speed":"150","ease":"Power2.easeInOut","to":"o:1;rX:0;rY:0;rZ:0;z:0;","style":"c:rgba(0, 0, 0, 1.00);bg:rgba(255, 255, 255, 1.00);bc:rgba(255, 255, 255, 0);bw:2px 2px 2px 2px;"}]'
                                     data-textAlign="['center','center','center','center']"
                                     data-paddingtop="[0,0,0,0]"
                                     data-paddingright="[50,50,50,50]"
                                     data-paddingbottom="[0,0,0,0]"
                                     data-paddingleft="[50,50,50,50]"

                                     style="z-index: 9; white-space: nowrap; font-size: 15px; line-height: 46px; font-weight: 700; color: rgba(255, 255, 255, 1.00);background-color:rgba(0, 0, 0, 0);border-color:rgba(255, 255, 255, 0.25);border-style:solid;border-width:2px;border-radius:4px 4px 4px 4px;outline:none;box-shadow:none;box-sizing:border-box;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;letter-spacing:5px;cursor:pointer;">
                                    <?= $tree->relatedPropertiesModel->getAttribute('slide_btn'); ?>
                                </div>

                            <? endif; ?>

                        </li>
                        <!-- END SLIDE  -->


                        <!--<li data-index="rs-<? /*= $tree->id; */ ?>"
                            data-slotamount="7"
                            data-hideafterloop="0"
                            data-hideslideonmobile="off"
                            data-masterspeed="300"
                            data-thumb="<? /*= $tree->image->src; */ ?>"
                            data-title="<? /*= $tree->name; */ ?>"
                            data-transition="slidingoverlayup"

                            style="background-color: #F6F6F6;
                                    background-image: url(<? /*= $tree->image->src; */ ?>);
                                    background-position-y: 37px;background-size: cover;">

                            <? /* if ($customContent = $tree->relatedPropertiesModel->getAttribute('customContent')) : */ ?>
                                <div style="padding-top: 26%;">
                                    <? /*= $customContent; */ ?>
                                </div>
                            <? /* endif; */ ?>
                        </li>-->

                    <? endforeach; ?>
                <? endif; ?>

            </ul>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div>
    <? endif; ?>
