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
use yii\base\Theme;

/**
 * @property string      $favicon путь к фавиконке
 * @property string|null $logoSrc путь к лого, если передать null, то будет лого по умолчанию
 * @property string|null $logoHref Url с логотипа
 *
 * @property string      $slideNavClasses read-only
 * @property string      $headerClasses read-only
 *
 * @property string        $bodyCssClass
 * @property string        $htmlCssClass
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyTheme extends Theme
{
    public $pathMap = [
        '@app/views' => [
            '@skeeks/cms/themes/unify/views',
        ],
    ];

    /**
     *
     */
    static public function initBeforeRender()
    {
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
                \yii\bootstrap\ActiveField::class           => [
                    'class' => \yii\bootstrap4\ActiveField::class,
                ],
                \yii\bootstrap\Alert::class                 => [
                    'class' => \yii\bootstrap4\Alert::class,
                ],
                \yii\bootstrap\Modal::class                 => [
                    'class' => \skeeks\bootstrap4\Modal::class,
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

                \skeeks\cms\backend\widgets\FiltersWidget::class => [
                    //'viewFile' => 'asd',
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
                ],


            ]
        ));

        if (isset(\Yii::$app->unifyThemeSettings)) {
            foreach (\Yii::$app->unifyThemeSettings->toArray() as $key => $value) {
                if (\Yii::$app->view->theme->hasProperty($key) && \Yii::$app->view->theme->canSetProperty($key)) {
                    \Yii::$app->view->theme->{$key} = $value;
                }
            }
        }

        $content = file_get_contents(\Yii::getAlias("@skeeks/cms/themes/unify/assets/src/css/unify-default-template.css"));
        $content = str_replace("#72c02c", \Yii::$app->view->theme->main_theme_color1, $content);
        \Yii::$app->view->registerCss($content);



        $content = file_get_contents(\Yii::getAlias("@skeeks/cms/themes/unify/assets/src/css/unify-theme-template.css"));
        $content = str_replace("#0185c8", \Yii::$app->view->theme->main_theme_color1, $content);
        $content = str_replace("#e1082c", \Yii::$app->view->theme->main_theme_color2, $content);
        \Yii::$app->view->registerCss($content);

        if (\Yii::$app->view->theme->body_bg_image) {
            $bgImage = \Yii::$app->view->theme->body_bg_image;
            \Yii::$app->view->registerCss(<<<CSS
        body {
            background: url('{$bgImage}') fixed;
            background-size: cover;
        }
CSS
            );
        }

        if (\Yii::$app->view->theme->footer_bg_color) {
            $bgColor = \Yii::$app->view->theme->footer_bg_color;
            \Yii::$app->view->registerCss(<<<CSS
        .sx-footer {
            background-color: {$bgColor} !important;
        }
CSS
            );
        }
        if (\Yii::$app->view->theme->footer_copyright_bg_color) {
            $bgColor = \Yii::$app->view->theme->footer_copyright_bg_color;
            \Yii::$app->view->registerCss(<<<CSS
        .sx-footer-copyright {
            background-color: {$bgColor} !important;
        }
CSS
            );
        }


        if (\Yii::$app->view->theme->menu_color1) {
            $bgColor1 = \Yii::$app->view->theme->menu_color1;
            $bgColor2 = \Yii::$app->view->theme->menu_color2;
            \Yii::$app->view->registerCss(<<<CSS
                .sx-main-menu-wrapper {
            background: linear-gradient(to right, {$bgColor1} 12%, {$bgColor2}) !important;
        }
CSS
            );
        }


    }

    /**
     * @var string
     */
    public $themeAssetClass = 'skeeks\cms\themes\unify\assets\UnifyThemeAsset';

    /**
     * @var string
     */
    public $favicon = '/favicon.ico';

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
    public $logo_text = '';

    /**
     * @var string
     */
    public $address = 'Адрес';

    /**
     * @var string
     */
    public $title = 'Название сайта';

    /**
     * @var string
     */
    public $phone = '+7 (495) 777-77-77';

    /**
     * @var string
     */
    public $email = 'info@skeeks.com';

    /**
     * @var string
     */
    public $work_time = 'Понедельник - Пятница: 10:00 - 19:00';

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
    public $footer_copyright_bg_color = '#fafafa';


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
    public $home_view_file = 'default';

    /**
     * @var string
     */
    public $news_list_view = 'news';
    /**
     * @var string
     */
    public $news_list_count_columns = 3;


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
    public $isShowLoader = false;

    /**
     * @var bool
     */
    public $isShowBottomBlock = true;



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
                $this->_bodyCssClass = $this->_bodyCssClass . " sx-header-sticky-margin";
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