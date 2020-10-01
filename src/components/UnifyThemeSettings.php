<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\components;

use skeeks\assets\unify\base\UnifyComponentsAsset;
use skeeks\assets\unify\base\UnifyGlobalsAsset;
use skeeks\assets\unify\base\UnifyIconEtlineAsset;
use skeeks\assets\unify\base\UnifyIconHsAsset;
use skeeks\assets\unify\base\UnifyIconLineProAsset;
use skeeks\assets\unify\base\UnifyIconMaterialAsset;
use skeeks\assets\unify\base\UnifyIconSimpleLineAsset;
use skeeks\cms\backend\widgets\ActiveFormBackend;
use skeeks\cms\backend\widgets\SelectModelDialogStorageFileSrcWidget;
use skeeks\cms\backend\widgets\SelectModelDialogWidget;
use skeeks\cms\base\Component;
use skeeks\cms\models\CmsStorageFile;
use skeeks\cms\modules\admin\widgets\BlockTitleWidget;
use skeeks\cms\modules\admin\widgets\formInputs\OneImage;
use skeeks\cms\themes\unify\assets\components\UnifyGoToAsset;
use skeeks\cms\themes\unify\assets\components\UnifyThemeGoToAsset;
use skeeks\cms\themes\unify\assets\FontAwesomeAsset;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
use skeeks\cms\themes\unify\UnifyTheme;
use skeeks\cms\widgets\ColorInput;
use skeeks\yii2\form\fields\BoolField;
use skeeks\yii2\form\fields\FieldSet;
use skeeks\yii2\form\fields\HtmlBlock;
use skeeks\yii2\form\fields\SelectField;
use skeeks\yii2\form\fields\TextareaField;
use skeeks\yii2\form\fields\WidgetField;
use yii\helpers\ArrayHelper;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeSettings extends Component
{
    /**
     * @var string
     */
    public $logo = 'https://skeeks.com/img/logo/logo-no-bg-title-138.png';

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
    public $is_show_home_slider = 0;

    /**
     * @var string
     */
    public $font_css = "//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik&display=swap";

    /**
     * @var string Шрифт заголовков
     */
    public $font_headers = "Open Sans";

    /**
     * @var string Шрифт текста
     */
    public $font_texts = "Open Sans";


    /**
     * @var string
     */
    public $title = 'Веб-студия SkeekS.com';


    /**
     * @var string
     */
    public $yandex_map = '';


    /**
     * @var string
     */
    public $header = 'v1';

    /**
     * @var bool
     */
    public $is_show_search_block = false;

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
    public $is_show_loader = false;

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
    public $footer_color = '#000';
    public $text_color = '#555';

    /**
     * @var string
     */
    public $footer_copyright_bg_color = '#fafafa';
    public $footer_copyright_color = '#000';


    /**
     * @var string
     */
    public $main_theme_color1 = '#0185c8';

    /**
     * @var string
     */
    public $main_theme_color2 = '#e1082c';


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


    /**
     * @var string
     */
    public $menu_color1 = '#0185c8';

    /**
     * @var string
     */
    public $menu_align = 'left';

    /**
     * @var bool
     */
    public $is_center_logo = false;

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
    public $css_code = '';

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
    public $upa_container = UnifyTheme::UPA_CONTAINER_FULL;
    /**
     * @var string
     */
    public $body_outer = '';

    /**
     * @var string
     */
    public $home_view_file = 'default';

    /**
     * @var bool
     */
    public $isShowBottomBlock = true;

    /**
     * @var string
     */
    public $news_list_view = 'news';

    /**
     * @var string
     */
    public $news_list_count_columns = 3;


    /**
     * @var int Включить заглушку?
     */
    public $is_cap = 0;
    /**
     * @var int Заглушка показывается только гостям?
     */
    public $is_cap_only_guests = 1;

    /**
     * @var int
     */
    public $is_min_assets = 0;

    public $col_left_width = 285;
    /**
     * @var int
     */
    public $sx_container_width = 0;

    public $include_assets = [

    ];


    /**
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name'  => 'Настройки шаблона Unify',
            'image' => [
                UnifyThemeAsset::class,
                'img/template-preview.png',
            ],
        ]);
    }


    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [
                [
                    'logo',
                    'footer_logo',
                    'logo_text',
                    'mobile_logo',
                    'title',
                    'yandex_map',

                    'news_list_view',

                    'main_theme_color1',
                    'main_theme_color2',

                    'menu_color1',
                    'menu_color2',
                    'menu_font_color',
                    'menu_font_size',


                    'header',
                    'header_shadow',


                    'footer',
                    'footer_bg_color',
                    'footer_color',
                    'text_color',
                    'footer_copyright_bg_color',
                    'footer_copyright_color',

                    'body_bg_image',
                    'container',
                    'upa_container',
                    'body_outer',

                    'css_code',
                    'home_view_file',

                    'body_begin_no_image',

                    'tree_content_layout',
                    'element_content_layout',

                    'font_headers',
                    'font_texts',
                    'font_css',
                    'sx_container_width',
                ],
                'string',
            ],

            [
                [
                    'isShowBottomBlock',
                    'is_image_body_begin',
                    'is_show_loader',
                    'is_header_sticky_margin',
                    'is_header_sticky',
                    'is_show_home_slider',
                    'is_cap',
                    'is_cap_only_guests',
                    'is_min_assets',
                ],
                'boolean',
            ],


            [
                [
                    'is_header_toolbar',
                    'is_header_auth',
                    'is_header_show_hide',
                    'is_header_toggle_sections',
                    'is_center_logo',
                ],
                'boolean',
            ],
            [
                [
                    'is_show_search_block',
                    'body_begin_image_height_tree',
                    'body_begin_image_height_element',
                    'news_list_count_columns',
                    'col_left_width',
                ],
                'integer',
            ],
            [
                [
                    'include_assets',
                ],
                'safe',
            ],
            [
                [
                    'menu_align',
                ],
                'string',
            ],

        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'is_cap'             => "Включить заглушку?",
            'is_cap_only_guests' => "Показывать заглушку только неавторизованным пользователям?",
            'is_min_assets'      => "Загружать минимум css и js",
            'logo'               => "Логотип",
            'footer_logo'        => "Логотип для футера",
            'logo_text'          => "Текст для логотипа",
            'mobile_logo'        => "Логотип для мобильного телефона",

            'title'      => "Короткое название сайта",
            'yandex_map' => "Код яндекс карт",

            'main_theme_color1' => "Цвет темы 1",
            'main_theme_color2' => "Цвет темы 2",

            'font_css'     => "Подключаемые шрифты",
            'font_headers' => "Шрифт заголовков",
            'font_texts'   => "Шрифт текста",

            'home_view_file' => "Шаблон главной страницы",

            'is_center_logo'  => "Показывать лого по центру?",
            'menu_align'      => "Выравнивание меню",
            'menu_color1'     => "Цвет меню 1",
            'menu_color2'     => "Цвет меню 2",
            'menu_font_color' => "Цвет текста в меню",
            'menu_font_size'  => "Размер текста в меню",

            'header'                  => "Вариант отображения шапки",
            'header_shadow'           => "Тень шапки",
            'is_show_search_block'    => "Добавить поисковый блок в шапку",
            'is_header_sticky'        => "Зафиксировать шапку к верху экрана?",
            'is_header_sticky_margin' => "Если шапка фиксирована, добавлять отступ?",


            'footer'                    => "Вариант отображения футера",
            'footer_bg_color'           => "Цвет фона футера",
            'footer_color'              => "Цвет текста в футере футера",
            'text_color'                => "Цвет текста по умолчанию",
            'footer_copyright_bg_color' => "Цвет фона под футером",
            'footer_copyright_color'    => "Цвет текста под футером",

            'body_bg_image' => "Фоновая картинка сайта",
            'container'     => "Сайт во всю ширину или центрированный?",
            'body_outer'    => "Отступ вокруг контейнера сайта",

            'upa_container' => "Личный кабинет",

            'isShowBottomBlock' => "Показывать блок с телефоном и email на всех страницах?",

            'is_show_loader'                  => "Показывать индикатор загрузки перед загрузкой страницы?",
            'is_image_body_begin'             => "Показывать в начале страницы картинку из анонса?",
            'body_begin_image_height_tree'    => "Высота блока с картинкой в разделах",
            'body_begin_image_height_element' => "Высота блока с картинкой в новостях",
            'body_begin_no_image'             => "Если картинка не задана в анонсе показывать эту",

            'tree_content_layout'    => 'Вариант отображения раздела',
            'element_content_layout' => 'Вариант отображения страницы одной новости',

            'news_list_view'          => 'Вариант отображения списка новостей',
            'news_list_count_columns' => 'Количество колонок в новостях',

            'is_show_home_slider' => "Показывать слайдер на главной",
            'include_assets'      => "Дополнительные компоненты",
            'col_left_width'      => "Ширина левой колонки, px",

            'is_header_toolbar'         => "Показывать панельку перед меню",
            'is_header_auth'            => "Показывать ссылки на авторизацию",
            'is_header_show_hide'       => "Прятать при прокрутки страницы?",
            'is_header_toggle_sections' => "Сокращать при прокрутке? Скрывать тулбар",
            'sx_container_width'        => "Максимальная ширина контейнера",
        ]);
    }


    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            'menu_color1'          => 'Если задан один цвет, меню будет одного цвета',
            'menu_color2'          => 'Если задан второй цвет, меню будет окрашено градиентом из первого цвета в второй',
            'footer'               => "Нижняя часть сайта",
            'logo'                 => "Если не будет задан логотип, то логотип возьмется из описания сайта",
            'footer_logo'          => "Если логотип не будет задан, то возьмется фото основного логотипа",
            'mobile_logo'          => "Если логотип не будет задан, то возьмется фото основного логотипа",
            'header_shadow'        => "Тень под шапкой стоит задавать только если выбран вариант отображения шапки во всю ширину",
            'body_outer'           => "Задается для центрированных сайтов",
            'is_header_sticky'     => "Фиксированная шапка будет растянута на весь экран",
            'is_show_search_block' => 'При выборе "Да", в шапке будет выведен поисковый блок',
            'is_show_loader'       => 'Показывать индикатор загрузки?',
            'include_assets'       => 'Выбирите дополнительные компоненты, которые будут подключены на всех страницах шаблона.',
            'col_left_width'       => 'Указывается в px',
            'sx_container_width'   => 'Можно вказать в px или %. Например 100%',
            'is_center_logo'       => 'Работает в стандартной шапке',
            'font_headers'         => 'Впишите название шрифта. Например: Open Sans, Playfair Display, Roboto, Raleway, Spectral, Rubik',
            'font_texts'           => 'Впишите название шрифта. Например: Open Sans, Playfair Display, Roboto, Raleway, Spectral, Rubik',
            'font_css'             => 'Получите и настройте ссылку на ваши шрифты в сервисе: https://fonts.google.com/ https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i|Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap&subset=cyrillic',
            'text_color'           => 'Цвет текста заданный по умолчанию для всего сайта.',
            'yandex_map'           => 'Если код не указан, то карта будет построена через апи',
        ]);
    }

    /**
     * @return ActiveForm
     */
    public function beginConfigForm()
    {
        return ActiveFormBackend::begin();
    }

    /**
     * @return array
     */
    public function getConfigFormFields()
    {
        return [

            'main' => [
                'class'  => FieldSet::class,
                'name'   => 'Данные',
                'fields' => [
                    'title',

                    'yandex_map' => [
                        'class' => TextareaField::class,
                    ],

                    /*'logo'        => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],*/

                    'logo'        => [
                        'class'       => WidgetField::class,
                        'widgetClass' => SelectModelDialogStorageFileSrcWidget::class,
                        /*'widgetConfig' => [
                            'modelPk' => 'src'
                        ]*/
                    ],

                    'logo_text',
                    'footer_logo' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],
                    'mobile_logo' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],
                ],
            ],

            'design' => [
                'class'  => FieldSet::class,
                'name'   => 'Дизайн',
                'fields' => [
                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Шрифт']),
                    ],

                    'font_css',
                    'font_headers' => [
                        /*'class' => SelectField::class,
                        'items' => [
                            'Open Sans'        => 'Open Sans',
                            'Playfair Display' => 'Playfair Display',
                            'Roboto'           => 'Roboto',
                            'Raleway'          => 'Raleway',
                            'Spectral'         => 'Spectral',
                            'Rubik'            => 'Rubik',
                        ],*/
                    ],
                    'font_texts'   => [
                        /*'class' => SelectField::class,
                        'items' => [
                            'Open Sans'        => 'Open Sans',
                            'Playfair Display' => 'Playfair Display',
                            'Roboto'           => 'Roboto',
                            'Raleway'          => 'Raleway',
                            'Spectral'         => 'Spectral',
                            'Rubik'            => 'Rubik',
                        ],*/
                    ],


                    'text_color' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],

                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Глобальные настройки']),
                    ],


                    'container'  => [
                        'class' => SelectField::class,
                        'items' => [
                            'full'      => 'Во всю ширину',
                            'boxed'     => 'Центрированный',
                            'semiboxed' => 'Широко центрированный',
                        ],
                    ],
                    'sx_container_width',
                    'body_outer' => [
                        'class' => SelectField::class,
                        'items' => [
                            ''                 => 'Нет',
                            'u-outer-space-v1' => 'Небольшой отступ',
                            'u-outer-space-v2' => 'Большой отступ',
                        ],
                    ],


                    'main_theme_color1' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],
                    'main_theme_color2' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],
                    'body_bg_image'     => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],


                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Настройки шапки']),
                    ],


                    'header' => [
                        'class' => SelectField::class,
                        'items' => [
                            'v1' => 'Вариант 1 (меню и высокий тулбар)',
                            'v2' => 'Вариант 2 (стандартная шапка)',
                            'v4' => 'Вариант 4 (большая шапка с поисковой формой)',
                        ],
                    ],


                    'header_shadow' => [
                        'class' => SelectField::class,
                        'items' => [
                            'u-shadow-v1-1' => 'Вариант 1.1',
                            'u-shadow-v1-2' => 'Вариант 1.2',
                            'u-shadow-v1-3' => 'Вариант 1.3',
                            'u-shadow-v1-4' => 'Вариант 1.4',
                            'u-shadow-v1-5' => 'Вариант 1.5',
                            'u-shadow-v1-6' => 'Вариант 1.6',
                            'u-shadow-v1-7' => 'Вариант 1.7',
                            'u-shadow-v2'   => 'Вариант 2',
                            'u-shadow-v3'   => 'Вариант 3',
                            'u-shadow-v5'   => 'Вариант 5',
                            'u-shadow-v6'   => 'Вариант 6',
                            'u-shadow-v7'   => 'Вариант 7',
                            'u-shadow-v8'   => 'Вариант 8',
                            'u-shadow-v9'   => 'Вариант 9',
                            'u-shadow-v10'  => 'Вариант 10',
                            'u-shadow-v11'  => 'Вариант 11',
                            'u-shadow-v12'  => 'Вариант 12',
                            'u-shadow-v13'  => 'Вариант 13',
                            'u-shadow-v14'  => 'Вариант 14',
                            'u-shadow-v15'  => 'Вариант 15',
                            'u-shadow-v16'  => 'Вариант 16',
                            'u-shadow-v17'  => 'Вариант 17',
                            'u-shadow-v18'  => 'Вариант 18',
                            'u-shadow-v19'  => 'Вариант 19',
                            'u-shadow-v20'  => 'Вариант 20',
                            'u-shadow-v21'  => 'Вариант 21',
                            'u-shadow-v22'  => 'Вариант 22',
                            'u-shadow-v23'  => 'Вариант 23',
                            'u-shadow-v24'  => 'Вариант 24',
                            'u-shadow-v25'  => 'Вариант 25',
                            'u-shadow-v26'  => 'Вариант 26',
                            'u-shadow-v27'  => 'Вариант 27',
                            'u-shadow-v28'  => 'Вариант 28',
                            'u-shadow-v29'  => 'Вариант 29',
                            'u-shadow-v30'  => 'Вариант 30',
                            'u-shadow-v31'  => 'Вариант 31',
                            'u-shadow-v32'  => 'Вариант 32',
                            'u-shadow-v33'  => 'Вариант 33',
                            'u-shadow-v34'  => 'Вариант 34',
                            'u-shadow-v35'  => 'Вариант 35',
                            'u-shadow-v36'  => 'Вариант 36',
                            'u-shadow-v37'  => 'Вариант 37',
                            'u-shadow-v38'  => 'Вариант 38',
                            'u-shadow-v39'  => 'Вариант 39',
                            'u-shadow-v40'  => 'Вариант 40',
                            'u-shadow-v41'  => 'Вариант 41',
                        ],
                    ],

                    'is_header_toolbar' => [
                        'class' => BoolField::class,
                    ],

                    'is_header_auth' => [
                        'class' => BoolField::class,
                    ],

                    'is_header_auth' => [
                        'class' => BoolField::class,
                    ],

                    'is_header_toggle_sections' => [
                        'class' => BoolField::class,
                    ],


                    'is_header_show_hide' => [
                        'class' => BoolField::class,
                    ],


                    'is_show_search_block' => [
                        'class' => BoolField::class,
                    ],


                    'is_header_sticky' => [
                        'class' => BoolField::class,
                    ],

                    'is_header_sticky_margin' => [
                        'class' => BoolField::class,
                    ],


                    'menu_color1' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],
                    'menu_color2' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],

                    'menu_font_color' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],

                    'menu_font_size' => [
                        'class' => SelectField::class,
                        'items' => [
                            '13px' => "13px",
                            '14px' => "14px",
                            '15px' => "15px",
                            '16px' => "16px",
                            '17px' => "17px",
                            '18px' => "18px",
                            '19px' => "19px",
                            '20px' => "20px",
                        ],
                    ],
                    'menu_align'     => [
                        'class' => SelectField::class,
                        'items' => [
                            'left'   => "Слева",
                            'right'  => "Справа",
                            'center' => "По центру",
                        ],
                    ],

                    'is_center_logo' => [
                        'class' => BoolField::class,
                    ],


                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Контентная часть (верх сайта)']),
                    ],


                    'is_image_body_begin' => [
                        'class' => BoolField::class,
                    ],

                    'body_begin_no_image'             => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],
                    'body_begin_image_height_tree'    => [
                        'class' => SelectField::class,
                        'items' => [
                            '100' => "100 px",
                            '200' => "200 px",
                            '300' => "300 px",
                            '400' => "400 px",
                            '500' => "500 px",
                            '600' => "600 px",
                        ],
                    ],
                    'body_begin_image_height_element' => [
                        'class' => SelectField::class,
                        'items' => [
                            '100' => "100 px",
                            '200' => "200 px",
                            '300' => "300 px",
                            '400' => "400 px",
                            '500' => "500 px",
                            '600' => "600 px",
                        ],
                    ],

                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Контентная часть']),
                    ],

                    'tree_content_layout' => [
                        'class' => SelectField::class,
                        'items' => [
                            'no-col'         => "Без колонок",
                            'col-left'       => "Есть колонка слева",
                            'col-right'      => "Есть колонка справа",
                            'col-left-right' => "Есть колонка слева и справа",
                        ],
                    ],


                    'element_content_layout' => [
                        'class' => SelectField::class,
                        'items' => [
                            'no-col'         => "Без колонок",
                            'col-left'       => "Есть колонка слева",
                            'col-right'      => "Есть колонка справа",
                            'col-left-right' => "Есть колонка слева и справа",
                        ],
                    ],

                    'col_left_width',

                    'home_view_file' => [
                        'class' => SelectField::class,
                        'items' => [
                            'default' => "По умолчанию",
                            'news'    => "Новости",
                            'company' => "Страница компании (слайдер, услуги, преимущества, акции и т.д.)",
                        ],
                    ],

                    'news_list_view' => [
                        'class' => SelectField::class,
                        'items' => [
                            'news'         => "По умолчанию",
                            'news-masonry' => "Новости с фоновой картинкой",
                        ],
                    ],

                    'news_list_count_columns' => [
                        'class' => SelectField::class,
                        'items' => [
                            '2' => "2",
                            '3' => "3",
                            '4' => "4",
                        ],
                    ],


                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Футер']),
                    ],


                    'footer' => [
                        'class' => SelectField::class,
                        'items' => [
                            'v1' => 'Футер с меню',
                            'v2' => 'Футер с авторизацией',
                            'v3' => 'Футер лого и соц. сети',
                            'v4' => 'Пустой футер',
                        ],
                    ],

                    'footer_bg_color' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],
                    'footer_color'    => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],

                    'footer_copyright_bg_color' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],
                    'footer_copyright_color'    => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],


                    [
                        'class'   => HtmlBlock::class,
                        'content' => BlockTitleWidget::widget(['content' => 'Дополнительно']),
                    ],

                    'isShowBottomBlock' => [
                        'class' => BoolField::class,
                    ],

                    'is_show_loader' => [
                        'class' => BoolField::class,
                    ],


                    'css_code' => [
                        'class' => TextareaField::class,
                    ],

                    'is_show_home_slider' => [
                        'class'       => BoolField::class,
                        'allowNull'   => false,
                        'formElement' => BoolField::ELEMENT_RADIO_LIST,
                    ],
                ],
            ],

            'dev' => [
                'class'  => FieldSet::class,
                'name'   => 'Разработка',
                'fields' => [
                    'is_cap'             => [
                        'class' => BoolField::class,
                    ],
                    'is_cap_only_guests' => [
                        'class' => BoolField::class,
                    ],
                    'is_min_assets'      => [
                        'class' => BoolField::class,
                    ],
                    'include_assets'     => [
                        'class'    => SelectField::class,
                        'items'    => [
                            UnifyIconSimpleLineAsset::class => 'Иконки (SimpleLine)',
                            UnifyIconMaterialAsset::class   => 'Иконки (Material)',
                            UnifyIconLineProAsset::class    => 'Иконки (LinePro)',
                            UnifyIconEtlineAsset::class     => 'Иконки (Etline)',
                            UnifyIconHsAsset::class         => 'Иконки (HsIcon) — стандартные иконки, тонкие стрелочки',
                            FontAwesomeAsset::class         => 'Иконки (FontAwesome) — самые распространенные иконки',
                            UnifyThemeGoToAsset::class      => 'Кнопка наверх',
                            UnifyComponentsAsset::class     => 'Все компоненты шаблона',
                            UnifyGlobalsAsset::class        => 'Стили globals.css (большой файл)',
                        ],
                        'multiple' => true,
                    ],
                ],
            ],

            'upa' => [
                'class'  => FieldSet::class,
                'name'   => 'Личный кабинет',
                'fields' => [

                    'upa_container' => [
                        'class' => SelectField::class,
                        'items' => [
                            UnifyTheme::UPA_CONTAINER_FULL        => 'Во всю ширину',
                            UnifyTheme::UPA_CONTAINER_STANDART    => 'Стандартная ширина контейнера',
                            UnifyTheme::UPA_CONTAINER_NO_STANDART => 'Широкий контейнер',
                        ],
                    ],
                ],
            ],
        ];
    }

}