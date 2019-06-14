<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\components;

use skeeks\cms\base\Component;
use skeeks\cms\modules\admin\widgets\formInputs\OneImage;
use skeeks\cms\widgets\ColorInput;
use skeeks\yii2\form\fields\BoolField;
use skeeks\yii2\form\fields\FieldSet;
use skeeks\yii2\form\fields\HtmlBlock;
use skeeks\yii2\form\fields\SelectField;
use skeeks\yii2\form\fields\TextareaField;
use skeeks\yii2\form\fields\WidgetField;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

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
    public $logo_text = '';

    /**
     * @var string
     */
    public $favicon = '/favicon.ico';


    /**
     * @var string
     */
    public $title = 'Веб-студия SkeekS.com';

    /**
     * @var string
     */
    public $address = 'Россия, Москва, Зеленоград, 2005-29';

    /**
     * @var string
     */
    public $phone = '(+7 495) 005-79-26';

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
    public $yandex_map = '<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A3c54488d4f32ae571f2430a060822efc953527a3b093179c979cefdc898476ad&amp;width=100%25&amp;height=500&amp;lang=ru_RU&amp;scroll=false"></script>';


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
     * @var string
     */
    public $header = 'v1';

    /**
     * @var string
     */
    public $header_shadow = 'u-shadow-v19';

    /**
     * @var string
     */
    public $fixed_header_margin = 'g-mt-80';




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
     * Можно задать название и описание компонента
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name' => 'Настройки шаблона Unify',
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
                    'favicon',
                    'address',
                    'title',
                    'phone',
                    'email',
                    'work_time',
                    'yandex_map',

                    'vk',
                    'instagram',
                    'youtube',
                    'facebook',

                    'news_list_view',

                    'main_theme_color1',
                    'main_theme_color2',

                    'menu_color1',
                    'menu_color2',


                    'header',
                    'header_shadow',
                    'fixed_header_margin',


                    'footer',
                    'footer_bg_color',
                    'footer_copyright_bg_color',

                    'body_bg_image',
                    'container',
                    'body_outer',

                    'css_code',
                    'home_view_file',

                    'body_begin_no_image',

                    'tree_content_layout',
                    'element_content_layout',
                ],
                'string',
            ],

            [
                [
                    'isShowBottomBlock',
                    'is_image_body_begin',
                ],
                'boolean',
            ],
            [
                [
                    'body_begin_image_height_tree',
                    'body_begin_image_height_element',
                    'news_list_count_columns',
                ],
                'integer',
            ],

        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'logo'        => "Логотип",
            'footer_logo' => "Логотип для футера",
            'logo_text'   => "Текст для логотипа",
            'favicon'     => "Фавикон",

            'title'      => "Короткое название сайта",
            'phone'      => "Телефон",
            'email'      => "Email",
            'address'    => "Адрес",
            'work_time'  => "Рабочее время",
            'yandex_map' => "Код яндекс карт",

            'vk'        => "Ссылка на страницу VK",
            'instagram' => "Ссылка на страницу Instagram",
            'youtube'   => "Ссылка на страницу Youtube",
            'facebook'  => "Ссылка на страницу facebook",

            'main_theme_color1' => "Цвет темы 1",
            'main_theme_color2' => "Цвет темы 2",

            'home_view_file' => "Шаблон главной страницы",

            'menu_color1' => "Цвет меню 1",
            'menu_color2' => "Цвет меню 2",

            'header'        => "Вариант отображения шапки",
            'header_shadow' => "Тень шапки",
            'fixed_header_margin' => "Если шапка фиксирована, добавлять отступ",

            'footer'                    => "Вариант отображения футера",
            'footer_bg_color'           => "Цвет фона футера",
            'footer_copyright_bg_color' => "Цвет фона под футером",

            'body_bg_image' => "Фоновая картинка сайта",
            'container'     => "Сайт во всю ширину или центрированный?",
            'body_outer'    => "Отступ вокруг контейнера сайта",

            'isShowBottomBlock' => "Показывать блок с телефоном и email на всех страницах?",

            'is_image_body_begin'             => "Показывать в начале страницы картинку из анонса?",
            'body_begin_image_height_tree'    => "Высота блока с картинкой в разделах",
            'body_begin_image_height_element' => "Высота блока с картинкой в новостях",
            'body_begin_no_image'             => "Если картинка не задана в анонсе показывать эту",

            'tree_content_layout' => 'Вариант отображения раздела',
            'element_content_layout' => 'Вариант отображения страницы одной новости',

            'news_list_view' => 'Вариант отображения списка новостей',
            'news_list_count_columns' => 'Количество колонок в новостях',
        ]);
    }


    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            'footer'        => "Нижняя часть сайта",
            'footer_logo'   => "Если логотип не будет задан, то возьмется фото основного логотипа",
            'header_shadow' => "Тень под шапкой стоит задавать только если выбран вариант отображения шапки во всю ширину",
        ]);
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

                    'phone',
                    'email',
                    'address',
                    'work_time',

                    'yandex_map' => [
                        'class' => TextareaField::class,
                    ],

                    'favicon'     => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],
                    'logo'        => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],
                    'logo_text',
                    'footer_logo' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],


                    'vk',
                    'instagram',
                    'youtube',
                    'facebook',
                ],
            ],

            'design' => [
                'class'  => FieldSet::class,
                'name'   => 'Дизайн',
                'fields' => [
                    [
                        'class'   => HtmlBlock::class,
                        'content' => Html::tag('h2', 'Общие настройки'),
                    ],

                    'container'         => [
                        'class' => SelectField::class,
                        'items' => [
                            'full'      => 'Во всю ширину',
                            'boxed'     => 'Центрированный',
                            'semiboxed' => 'Широко центрированный',
                        ],
                    ],
                    'body_outer'        => [
                        'class' => SelectField::class,
                        'items' => [
                            ''                 => 'Нет',
                            'u-outer-space-v1' => 'Небольшой отступ',
                            'u-outer-space-v2' => 'Большой отступ',
                        ],
                    ],
                    'isShowBottomBlock' => [
                        'class' => BoolField::class,
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
                        'content' => Html::tag('h2', 'Настройки шапки'),
                    ],

                    'header' => [
                        'class' => SelectField::class,
                        'items' => [
                            'v1' => 'Вариант 1 (лого, обратный звонок, телефоны, меню)',
                            'v2' => 'Вариант 2 (лого, меню, авторизация, прижат к верху)',
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




                    'fixed_header_margin' => [
                        'class' => SelectField::class,
                        'items' => [
                            'g-mt-80' => 'Стандартный отступ на высоту шапки (80px)',
                        ],
                    ],


                    'menu_color1' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],
                    'menu_color2' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],




                    [
                        'class'   => HtmlBlock::class,
                        'content' => Html::tag('h2', 'Контентная часть (верх сайта)'),
                    ],


                    'is_image_body_begin' => [
                        'class' => BoolField::class
                    ],
                    'body_begin_no_image' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => OneImage::class,
                    ],
                    'body_begin_image_height_tree' => [
                        'class' => SelectField::class,
                        'items' => [
                            '100' => "100 px",
                            '200' => "200 px",
                            '300' => "300 px",
                            '400' => "400 px",
                            '500' => "500 px",
                            '600' => "600 px",
                        ]
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
                        ]
                    ],


                    [
                        'class'   => HtmlBlock::class,
                        'content' => Html::tag('h2', 'Контентная часть'),
                    ],

                    'tree_content_layout' => [
                        'class' => SelectField::class,
                        'items' => [
                            'no-col' => "Без колонок",
                            'col-left' => "Есть колонка слева",
                            'col-right' => "Есть колонка справа",
                            'col-left-right' => "Есть колонка слева и справа",
                        ]
                    ],

                    'element_content_layout' => [
                        'class' => SelectField::class,
                        'items' => [
                            'no-col' => "Без колонок",
                            'col-left' => "Есть колонка слева",
                            'col-right' => "Есть колонка справа",
                            'col-left-right' => "Есть колонка слева и справа",
                        ]
                    ],

                    'home_view_file' => [
                        'class' => SelectField::class,
                        'items' => [
                            'default' => "По умолчанию",
                            'news' => "Новости",
                        ]
                    ],

                    'news_list_view' => [
                        'class' => SelectField::class,
                        'items' => [
                            'news' => "По умолчанию",
                            'news-masonry' => "Новости с фоновой картинкой",
                        ]
                    ],

                    'news_list_count_columns' => [
                        'class' => SelectField::class,
                        'items' => [
                            '2' => "2",
                            '3' => "3",
                            '4' => "4",
                        ]
                    ],



                    [
                        'class'   => HtmlBlock::class,
                        'content' => Html::tag('h2', 'Настройки футера'),
                    ],

                    'footer' => [
                        'class' => SelectField::class,
                        'items' => [
                            'v1' => 'Футер с меню',
                            'v2' => 'Футер с авторизацией',
                        ],
                    ],

                    'footer_bg_color' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],

                    'footer_copyright_bg_color' => [
                        'class'       => WidgetField::class,
                        'widgetClass' => ColorInput::class,
                    ],

                    [
                        'class'   => HtmlBlock::class,
                        'content' => Html::tag('h2', 'Дополнительно'),
                    ],


                    'css_code' => [
                        'class' => TextareaField::class,
                    ],
                ],
            ],


        ];
    }

}