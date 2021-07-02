<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify;

use skeeks\cms\backend\widgets\filters\Bootstrap4ActiveField;
use skeeks\cms\themes\unify\assets\UnifyBootstrapAsset;
use skeeks\cms\themes\unify\assets\UnifyBootstrapPluginAsset;
use skeeks\cms\themes\unify\assets\UnifyJqueryAsset;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
use skeeks\cms\themes\unify\widgets\jui\JuiSortableWidget;
use yii\base\Theme;
use yii\helpers\ArrayHelper;
use yii\helpers\FileHelper;
use yii\jui\Sortable;
use yii\web\View;

/**
 * @property string|null $logoSrc путь к лого, если передать null, то будет лого по умолчанию
 * @property string|null $logoHref Url с логотипа
 *
 * @property string      $slideNavClasses read-only
 * @property string      $headerClasses read-only
 *
 * @property string      $bodyCssClass
 * @property string      $htmlCssClass
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyTheme extends Theme
{
    const UPA_CONTAINER_FULL = 'container-full-width';
    const UPA_CONTAINER_STANDART = 'container-standart';
    const UPA_CONTAINER_NO_STANDART = 'container-no-standart';

    public $pathMap = [
        '@app/views' => [
            '@skeeks/cms/themes/unify/views',
        ],
    ];

    public static $is_ready = false;
    /**
     * @return bool
     */
    static public function isInitBeforeRender()
    {

        if (\skeeks\cms\backend\BackendComponent::getCurrent()) {
            return false;
        }

        if (\Yii::$app->controller && \Yii::$app->controller->module && in_array(\Yii::$app->controller->module->id, ['debug', 'gii'])) {
            return false;
        }

        if (\Yii::$app->view->theme instanceof self) {
            return true;
        }

        return false;
    }

    public function init()
    {
        parent::init();

        if (isset(\Yii::$app->unifyThemeSettings)) {
            foreach (\Yii::$app->unifyThemeSettings->toArray() as $key => $value) {
                if ($this->hasProperty($key) && $this->canSetProperty($key)) {
                    $this->{$key} = $value;
                }
            }
        }
    }
    /**
     *
     */
    static public function initThemeSettings()
    {
        //Показывать заглушку?
        if (\Yii::$app->view->theme->is_cap) {
            $enableCap = true;
            if (\Yii::$app->view->theme->is_cap_only_guests) {
                $enableCap = false;
                if (\Yii::$app->user->isGuest) {
                    $enableCap = true;
                }
            }

            if ($enableCap) {
                \Yii::$app->layout = "main-cap";
            }
        }

        if (\Yii::$app->request->isPjax || \Yii::$app->request->isAjax) {
            return false;
        }

        //Дополнительные компоненты верстки
        if (\Yii::$app->view->theme->include_assets) {
            foreach ((array)\Yii::$app->view->theme->include_assets as $assetClass) {
                if (class_exists($assetClass)) {
                    $assetClass::register(\Yii::$app->view);
                } else {
                    \Yii::error('Ошибка, класс: '.$assetClass." не существует или удален!");
                }
            }
        }

        $content = file_get_contents(\Yii::getAlias("@skeeks/cms/themes/unify/assets/src/css/unify-default-template.css"));
        $content = str_replace("#72c02c", \Yii::$app->view->theme->main_theme_color1, $content);
        $content = str_replace("114, 192, 44, 0.8", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.8)), $content);
        $content = str_replace("114, 192, 44, 0.6", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.6)), $content);
        $content = str_replace("114, 192, 44, 0.4", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.4)), $content);
        $content = str_replace("114, 192, 44, 0.2", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.2)), $content);
        $content = str_replace("114, 192, 44, 0.9", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.9)), $content);
        $content = str_replace("114, 192, 44, 0.3", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.3)), $content);
        $content = str_replace("114, 192, 44, 0.95", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.95)), $content);
        $content = str_replace("114, 192, 44, 0.5", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.5)), $content);
        $content = str_replace("114, 192, 44, 0.1", implode(", ", self::hexToRgb(\Yii::$app->view->theme->main_theme_color1, 0.1)), $content);

        $content = str_replace("{footer_bg_color}", \Yii::$app->view->theme->footer_bg_color, $content);
        $content = str_replace("{footer_color}", \Yii::$app->view->theme->footer_color, $content);
        $content = str_replace("{footer_copyright_bg_color}", \Yii::$app->view->theme->footer_copyright_bg_color, $content);
        $content = str_replace("{footer_copyright_color}", \Yii::$app->view->theme->footer_copyright_color, $content);


        
        $content = str_replace("#0185c8", \Yii::$app->view->theme->main_theme_color1, $content);
        $content = str_replace("#e1082c", \Yii::$app->view->theme->main_theme_color2, $content);
        $content = str_replace("{font_headers}", \Yii::$app->view->theme->font_headers, $content);
        $content = str_replace("{font_texts}", \Yii::$app->view->theme->font_texts, $content);
        $content = str_replace("{text_color}", \Yii::$app->view->theme->text_color, $content);
        //\Yii::$app->view->registerCss($content);

        if (\Yii::$app->view->theme->menu_color1) {
            $bgColor1 = \Yii::$app->view->theme->menu_color1;
            $bgColor2 = \Yii::$app->view->theme->menu_color2;
            $content = str_replace("{menuBgColor1}", $bgColor1, $content);
            $content = str_replace("{menuBgColor2}", $bgColor2, $content);
        }

        $color = \Yii::$app->view->theme->menu_font_color;
        $fz = \Yii::$app->view->theme->menu_font_size;

        $content = str_replace("{menuColor}", $color, $content);
        $content = str_replace("{menuFz}", $fz, $content);
        
        
        


        $css_content = '';

        if (\Yii::$app->view->theme->sx_container_width) {
            $maxWidth = \Yii::$app->view->theme->sx_container_width;
            $css_content .= <<<CSS
    .sx-container {
        max-width: {$maxWidth};
    }
CSS;

        }

        if (\Yii::$app->view->theme->menu_align == 'left') {
            $css_content .= <<<CSS
    ul.sx-menu-top {
        margin-left: 0 !important;
    }
    .sx-menu-top li:first-child {
        margin-left: 0 !important;
    }
CSS;

        }
        if (\Yii::$app->view->theme->menu_align == 'right') {
            $css_content .= <<<CSS
    ul.sx-menu-top {
        margin-left: auto !important;
    }
CSS;

        }
        if (\Yii::$app->view->theme->menu_align == 'center') {
            $css_content .= <<<CSS
    ul.sx-menu-top {
        margin-left: auto !important;
        margin-right: auto !important;
    }
CSS;

        }
        if (\Yii::$app->view->theme->body_bg_image) {
            $bgImage = \Yii::$app->view->theme->body_bg_image;
            $css_content .= <<<CSS
        body {
            background: url('{$bgImage}') fixed;
            background-size: cover;
        }
CSS;
        }


        if (\Yii::$app->view->theme->col_left_width) {
            $leftCol = \Yii::$app->view->theme->col_left_width;
            $css_content .= <<<CSS
@media (min-width: 768px) {
                .sx-content-col-main {
                    width: calc(100% - {$leftCol}px);
                }
                .sx-content-col-left {
                    width: {$leftCol}px;
                    position: static;
                    top: auto;
                    z-index: auto;
                }
            }
CSS;
        }
        
        
        $content = str_replace("{css_content}", $css_content, $content);


        $cache = md5(serialize(ArrayHelper::toArray(\Yii::$app->view->theme))) . "-v8";

        $newDir = \Yii::getAlias("@webroot/assets/unify");
        $newFile = \Yii::getAlias("@webroot/assets/unify/unify-default-template-".$cache.".css");
        $newFilePublic = \Yii::getAlias("@web/assets/unify/unify-default-template-".$cache.".css");

        if (!file_exists($newFile)) {
            FileHelper::createDirectory($newDir);

            $fp = fopen($newFile, 'w+');
            fwrite($fp, $content);
            fclose($fp);
        }

        if (!\Yii::$app->view->theme->logo) {
            if (\Yii::$app->skeeks->site->image) {
                \Yii::$app->view->theme->logo = \Yii::$app->skeeks->site->image->src;
            }
        }

        if (!\Yii::$app->view->theme->footer_logo && \Yii::$app->view->theme->logo) {
            \Yii::$app->view->theme->footer_logo = \Yii::$app->view->theme->logo;
        }

        if (!\Yii::$app->view->theme->mobile_logo && \Yii::$app->view->theme->logo) {
            \Yii::$app->view->theme->mobile_logo = \Yii::$app->view->theme->logo;
        }

        \Yii::$app->view->on(View::EVENT_BEGIN_PAGE, function () use ($newFilePublic) {
            if (\Yii::$app->request->isPjax) {
                return false;
            }

            if (\Yii::$app->view->theme->font_css) {
                \Yii::$app->view->registerCssFile(\Yii::$app->view->theme->font_css);
            }

            \Yii::$app->view->registerCssFile($newFilePublic, [
                'depends' => [
                    UnifyThemeAsset::class,
                ],
            ]);
        });
        
        
        if (\Yii::$app->view->theme->css_code && !\Yii::$app->request->isPjax) {
            \Yii::$app->view->registerCss(\Yii::$app->view->theme->css_code);
        }
        
        
        
        $assetClass = \Yii::$app->view->theme->themeAssetClass;
        \Yii::$app->view->on(View::EVENT_END_BODY, function () use ($assetClass) {
            if (\Yii::$app->request->isPjax) {
                return false;
            }
            $assetClass::register(\Yii::$app->view);
        });
        
    }

    static public function initBeforeRender()
    {
        if (self::$is_ready === true) {
            return true;
        }

        self::$is_ready = true;
        /**
         * Для виджетов выбора времени
         */
        \Yii::$app->params['bsVersion'] = "4";

        //Переопределние стандартных Assets
        \Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
            'class' => UnifyJqueryAsset::class,
        ];

        \Yii::$app->assetManager->bundles[\yii\bootstrap\BootstrapAsset::class] = [
            'class' => UnifyBootstrapAsset::class,
        ];

        \Yii::$app->assetManager->bundles[\yii\bootstrap\BootstrapPluginAsset::class] = [
            'class' => UnifyBootstrapPluginAsset::class,
        ];


        \Yii::$app->assetManager->bundles[\yii\bootstrap4\BootstrapPluginAsset::class] = [
            'class' => UnifyBootstrapPluginAsset::class,
        ];

        \Yii::$app->assetManager->bundles[\yii\bootstrap4\BootstrapAsset::class] = [
            'class' => UnifyBootstrapAsset::class,
        ];

        //Переопределение стандартных классов
        \Yii::$container->setDefinitions(\yii\helpers\ArrayHelper::merge(
            \Yii::$container->definitions,
            [
                \skeeks\yii2\form\fields\SelectField::class => [
                    'class' => \skeeks\cms\admin\form\fields\AdminSelectField::class,
                ],
                \yii\bootstrap\ActiveForm::class            => [
                    'class'   => \yii\bootstrap4\ActiveForm::class,
                    'options' => [
                        'class' => 'sx-bootstrap4-form',
                    ],
                ],
                Sortable::class           => [
                    'class' => JuiSortableWidget::class,
                ],
                \yii\bootstrap\ActiveField::class           => [
                    'class' => \yii\bootstrap4\ActiveField::class,
                ],
                \yii\bootstrap\Alert::class                 => [
                    'class' => \yii\bootstrap4\Alert::class,
                ],
                \yii\bootstrap\Modal::class                 => [
                    'class' => \skeeks\bootstrap4\Modal::class,
                ],
                \yii\bootstrap\Tabs::class                  => [
                    'class' => \yii\bootstrap4\Tabs::class,
                ],
                \yii\widgets\LinkPager::class               => [
                    'linkOptions'                   => [
                        'class' => 'page-link',
                    ],
                    'linkContainerOptions'          => [
                        'class' => 'page-item',
                    ],
                    'disabledListItemSubTagOptions' => [
                        'class' => 'page-link',
                    ],
                ],

                /*\skeeks\cms\backend\widgets\FiltersWidget::class => [
                    'defaultActiveForm' => [
                        'class'       => '\yii\bootstrap4\ActiveForm',
                        'fieldClass'  => Bootstrap4ActiveField::class,
                        'layout'      => 'horizontal',
                        'fieldConfig' => [
                            'template'      => "{label}\n{beginWrapper}\n<div class='sx-filter-wrapper'>{input}</div>\n{hint}\n{error}\n{endWrapper}{controlls}",
                            'checkTemplate' => "{label}\n{beginWrapper}\n<div class='sx-filter-wrapper'>{input}</div>\n{hint}\n{error}\n{endWrapper}{controlls}",
                        ],
                        'options'     => [
                            'class'     => 'sx-backend-filters-form col-sm-12',
                            'data-pjax' => 1,
                        ],
                        'method'      => 'get',
                    ],
                ],*/


            ]
        ));

        static::initThemeSettings();


    }

    /**
     * @param      $hex
     * @param bool $alpha
     * @return mixed
     */
    static public function hexToRgb($hex, $alpha = false)
    {
        $hex = str_replace('#', '', $hex);
        $length = strlen($hex);
        $rgb['r'] = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
        $rgb['g'] = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
        $rgb['b'] = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));
        if ($alpha) {
            $rgb['a'] = $alpha;
        }
        return $rgb;
    }

    /**
     * @var bool
     */
    public $is_min_assets = 0;

    public $font_css = '//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik&display=swap';

    /**
     * @var string
     */
    public $upa_container = self::UPA_CONTAINER_FULL;

    /**
     * @var array
     */
    public $include_assets = [];

    /**
     * @var int
     */
    public $is_cap = 0;

    /**
     * @var bool
     */
    public $is_center_logo = false;
    /**
     * @var int
     */
    public $is_cap_only_guests = 1;

    /**
     * @var string Шрифт заголовков
     */
    public $font_headers = "Open Sans";

    /**
     * @var string Шрифт текста
     */
    public $font_texts = "Open Sans";

    /**
     * @var string Шрифт текста
     */
    public $text_color = "#555";

    /**
     * @var string
     */
    public $menu_align = "left";


    /**
     * Показывать копирайты?
     * @var bool
     */
    public $is_show_copyright = true;

    /**
     * @var string
     */
    public $themeAssetClass = 'skeeks\cms\themes\unify\assets\UnifyThemeAsset';


    /**
     * @var string
     */
    public $logo = 'https://skeeks.com/assets/5107fcb3/img/logos/logo-no-bg-title-138.png?v=1492117123';

    /**
     * @var string
     */
    public $footer_logo = '';

    /**
     * @var string
     */
    public $mobile_logo = '';

    /**
     * @var string
     */
    public $logo_text = '';

    /**
     * @var int
     */
    public $is_show_home_slider = 1;


    /**
     * @var string
     */
    public $title = 'Название сайта';

    /**
     * @var string
     */
    public $yandex_map = '<script type="text/javascript" charset="utf-8" src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad0c531662526b93dbdf5073562662972971277522ac0bdad700a1d3736e09828&amp;width=100%25&amp;height=400&amp;lang=ru_RU&amp;scroll=false"></script>';


    /**
     * @var string
     */
    public $header = 'v1';

    /**
     * @var string
     */
    public $header_shadow = 'u-shadow-v19';

    /**
     * @var bool
     */
    public $is_header_sticky = false;

    /**
     * @var bool
     */
    public $is_header_sticky_margin = true;


    /**
     * @var bool
     */
    public $is_image_body_begin = false;
    /**
     * @var int
     */
    public $body_begin_image_height_tree = 300;

    /**
     * @var int
     */
    public $body_begin_image_height_element = 500;
    /**
     * @var string
     */
    public $body_begin_no_image = "";


    /**
     * @var string
     */
    public $tree_content_layout = "col-left";

    /**
     * @var string
     */
    public $element_content_layout = "col-left";


    /**
     * @var string
     */
    public $footer = 'v1';

    /**
     * @var string
     */
    public $footer_bg_color = '#fafafa';

    /**
     * @var string
     */
    public $footer_color = '#000';

    /**
     * @var string
     */
    public $footer_copyright_bg_color = '#fafafa';
    /**
     * @var string
     */
    public $footer_copyright_color = '#000';


    /**
     * @var string
     */
    public $body_bg_image = '';

    /**
     * @var string
     */
    public $container = 'full'; //full or boxed

    /**
     * @var string
     */
    public $body_outer = ''; //v1 or v2


    /**
     * @var string
     */
    public $main_theme_color1 = '#0185c8';

    /**
     * @var string
     */
    public $main_theme_color2 = '#e1082c';


    /**
     * @var string
     */
    public $menu_color1 = '#0185c8';

    /**
     * @var string
     */
    public $menu_color2 = '#e1082c';

    /**
     * @var string
     */
    public $menu_font_color = '#ffffffcc';

    /**
     * @var string
     */
    public $menu_font_size = '13px';


    /**
     * @var string
     */
    public $home_view_file = 'default';

    /**
     * @var string
     */
    public $css_code = '';

    /**
     * @var string
     */
    public $news_list_view = 'news';
    /**
     * @var string
     */
    public $news_list_count_columns = 3;

    /**
     * @var int
     */
    public $col_left_width = 285;


    /**
     * @var string
     */
    public $vk = 'https://vk.com/skeeks_com';
    /**
     * @var string
     */
    public $instagram = 'https://www.instagram.com/skeeks_com/';
    /**
     * @var string
     */
    public $youtube = 'https://www.youtube.com/c/skeeks';
    /**
     * @var string
     */
    public $facebook = 'https://www.facebook.com/skeekscom';

    /**
     * @var bool
     */
    public $is_show_loader = false;

    /**
     * @var bool
     */
    public $isShowBottomBlock = true;

    /**
     * @var bool
     */
    public $is_show_search_block = false;

    /**
     * @var int
     */
    public $sx_container_width = 0;

    /**
     * @var bool
     */
    public $is_header_toolbar = true;

    /**
     * @var bool
     */
    public $is_header_auth = true;

    /**
     * @var bool
     */
    public $is_header_show_hide = true;

    /**
     * @var bool
     */
    public $is_header_toggle_sections = true;

    protected $_bodyCssClass = null;
    /**
     * @return bool
     */
    public function getBodyCssClass()
    {
        if ($this->_bodyCssClass === null) {
            if ($this->container == "boxed") {
                $this->_bodyCssClass = 'g-layout-boxed';
            } elseif ($this->container == "semiboxed") {
                $this->_bodyCssClass = 'g-layout-semiboxed';
            }

            if ($this->is_header_sticky && $this->is_header_sticky_margin) {
                $this->_bodyCssClass = $this->_bodyCssClass." sx-header-sticky-margin";
            }
        }

        return $this->_bodyCssClass;
    }

    /**
     * @param $css
     * @return $this
     */
    public function setBodyCssClass($css)
    {
        $this->_bodyCssClass = $css;
        return $this;
    }

    /**
     * @return bool
     */
    public function getHtmlCssClass()
    {
        if ($this->body_outer) {
            return $this->body_outer;
        }

        return '';
    }


}