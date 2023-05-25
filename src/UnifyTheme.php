<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify;

use skeeks\assets\unify\base\UnifyComponentsAsset;
use skeeks\assets\unify\base\UnifyGlobalsAsset;
use skeeks\assets\unify\base\UnifyIconEtlineAsset;
use skeeks\assets\unify\base\UnifyIconHsAsset;
use skeeks\assets\unify\base\UnifyIconLineProAsset;
use skeeks\assets\unify\base\UnifyIconMaterialAsset;
use skeeks\assets\unify\base\UnifyIconSimpleLineAsset;
use skeeks\cms\backend\widgets\SelectModelDialogStorageFileSrcWidget;
use skeeks\cms\base\Theme;
use skeeks\cms\themes\unify\assets\components\UnifyGoToAsset;
use skeeks\cms\themes\unify\assets\components\UnifyThemeGoToAsset;
use skeeks\cms\themes\unify\assets\FontAwesomeAsset;
use skeeks\cms\themes\unify\assets\FuturaFontAsset;
use skeeks\cms\themes\unify\assets\UnifyBootstrapAsset;
use skeeks\cms\themes\unify\assets\UnifyBootstrapPluginAsset;
use skeeks\cms\themes\unify\assets\UnifyJqueryAsset;
use skeeks\cms\themes\unify\assets\UnifyThemeAsset;
use skeeks\cms\themes\unify\widgets\jui\JuiSortableWidget;
use skeeks\cms\widgets\ColorInput;
use skeeks\widget\codemirror\CodemirrorWidget;
use skeeks\yii2\form\fields\BoolField;
use skeeks\yii2\form\fields\FieldSet;
use skeeks\yii2\form\fields\HtmlBlock;
use skeeks\yii2\form\fields\SelectField;
use skeeks\yii2\form\fields\TextareaField;
use skeeks\yii2\form\fields\TextField;
use skeeks\yii2\form\fields\WidgetField;
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

    /**
     * @return array
     */
    public function _getDefaultTreeViews()
    {
        return ArrayHelper::merge(parent::_getDefaultTreeViews(), [
            'contacts-list' => [
                'name'        => 'Страница контактов (несколько адресов)',
                'description' => 'Страница с картой, временем работы и контактами, подходит для нескольких адресов',
            ],
        ]);
    }

    /**
     * @return array
     */
    static public function descriptorConfig()
    {
        return array_merge(parent::descriptorConfig(), [
            'name'        => "Unify",
            'description' => <<<HTML
<p>Базовая популярная тема! Не содержит шаблонов для магазина.</p>
<p>Подходит для одностраничного и многостраничного сайта, например для сайта о компании.</p>
HTML
            ,
            'image'       => [UnifyThemeAsset::class, 'img/template-preview.png'],
        ]);
    }


    public function getConfigFormModelData()
    {
        $fontDescription = '';
        foreach ($this->getAvailbaleFontsDescription() as $id => $description) {
            $fontDescription .= <<<HTML
<div class="sx-font-desc sx-font-{$id}" style="display:none;">{$description}</div>
HTML;
        }

        \Yii::$app->view->registerJs(<<<JS
$("#f-include_font_assets").on("change", function() {
    sx.updateFontDescription($(this).val());
    return false;
});
sx.updateFontDescription = function (fonts) {
    $(".sx-font-desc").hide();
    fonts.forEach(function(value) {
        $(".sx-font-" + value).show();
    });
};
sx.updateFontDescription($("#f-include_font_assets").val());
JS
        );

        return [
            'fields'          => [

                'main' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Общие данные',
                    'fields' => [
                        'title',
                        'yandex_map'  => [
                            'class' => TextareaField::class,
                        ],
                        'logo'        => [
                            'class'       => WidgetField::class,
                            'widgetClass' => SelectModelDialogStorageFileSrcWidget::class,
                        ],
                        'logo_text',
                        'footer_logo' => [
                            'class'       => WidgetField::class,
                            'widgetClass' => SelectModelDialogStorageFileSrcWidget::class,
                        ],
                        'mobile_logo' => [
                            'class'       => WidgetField::class,
                            'widgetClass' => SelectModelDialogStorageFileSrcWidget::class,
                        ],
                    ],
                ],

                'font' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Шрифт',
                    'fields' => [

                        'include_font_assets' => [
                            'class'    => SelectField::class,
                            'items'    => $this->getAvailbaleFontsForSelect(),
                            'multiple' => true,
                        ],
                        [
                            'class'   => HtmlBlock::class,
                            'content' => <<<HTML
<div class="sx-font-description">
<div class="col-12">
    {$fontDescription}
</div>
</div>
HTML,

                        ],

                        'font_css',
                        'font_headers'        => [
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
                        'font_texts'          => [
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
                    ],
                ],

                'global' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Глобальные настройки',
                    'fields' => [
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


                        

                        'second_theme_bg_color'   => [
                            'class'       => WidgetField::class,
                            'widgetClass' => ColorInput::class,
                        ],
                        'second_theme_text_color' => [
                            'class'       => WidgetField::class,
                            'widgetClass' => ColorInput::class,
                        ],


                        'body_bg_image' => [
                            'class'       => WidgetField::class,
                            'widgetClass' => SelectModelDialogStorageFileSrcWidget::class,
                        ],
                        'bg_color'   => [
                            'class'       => WidgetField::class,
                            'widgetClass' => ColorInput::class,
                        ],

                        'second_bg_color' => [
                            'class'       => WidgetField::class,
                            'widgetClass' => ColorInput::class,
                        ],

                        'base_padding' => [
                            'class'       => TextField::class,
                        ],
                        'base_radius' => [
                            'class'       => TextField::class,
                        ],
                    ],
                ],

                'header' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Настройки шапки',
                    'fields' => [
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
                    ],
                ],


                'body_header' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Блок перед контентом',
                    'fields' => [
                        'is_image_body_begin' => [
                            'class' => BoolField::class,
                        ],

                        'body_begin_no_image'             => [
                            'class'       => WidgetField::class,
                            'widgetClass' => SelectModelDialogStorageFileSrcWidget::class,
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
                    ],
                ],

                'body' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Контентная часть',
                    'fields' => [
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
                    ],
                ],

                'footer' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Футер',
                    'fields' => [
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
                    ],
                ],


                'additional' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Дополнительно',
                    'fields' => [
                        'isShowBottomBlock' => [
                            'class' => BoolField::class,
                        ],

                        'is_show_loader' => [
                            'class' => BoolField::class,
                        ],


                        'css_code' => [
                            'class'        => WidgetField::class,
                            'widgetClass'  => CodemirrorWidget::class,
                            'widgetConfig' => [
                                'preset'        => 'htmlmixed',
                                'assets'        =>
                                    [
                                        \skeeks\widget\codemirror\CodemirrorAsset::THEME_NIGHT,
                                    ],
                                'clientOptions' =>
                                    [
                                        'theme' => 'night',
                                    ],
                            ],
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

                'mobile' => [
                    'class'  => FieldSet::class,
                    'name'   => 'Мобильная версия',
                    'fields' => [

                        'include_mobile_assets' => [
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

                /*'upa' => [
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
                ],*/
            ],
            'attributeHints'  => [
                'base_radius'  => 'Базовая настройка скругления углов у кнопок и различных блоков',
                'base_padding' => 'Базовые отступы',

                'menu_color1'           => 'Если задан один цвет, меню будет одного цвета',
                'menu_color2'           => 'Если задан второй цвет, меню будет окрашено градиентом из первого цвета в второй',
                'footer'                => "Нижняя часть сайта",
                'logo'                  => "Если не будет задан логотип, то логотип возьмется из описания сайта",
                'footer_logo'           => "Если логотип не будет задан, то возьмется фото основного логотипа",
                'mobile_logo'           => "Если логотип не будет задан, то возьмется фото основного логотипа",
                'header_shadow'         => "Тень под шапкой стоит задавать только если выбран вариант отображения шапки во всю ширину",
                'body_outer'            => "Задается для центрированных сайтов",
                'is_header_sticky'      => "Фиксированная шапка будет растянута на весь экран",
                'is_show_search_block'  => 'При выборе "Да", в шапке будет выведен поисковый блок',
                'is_show_loader'        => 'Показывать индикатор загрузки?',
                'include_assets'        => 'Выбирите дополнительные компоненты, которые будут подключены на всех страницах шаблона.',
                'include_mobile_assets' => 'Выбирите дополнительные компоненты, которые будут подключены на всех страницах шаблона. В мобильной версии.',
                'include_font_assets'   => 'Подключаемые шрифты',

                'col_left_width'     => 'Указывается в px',
                'sx_container_width' => 'Можно вказать в px или %. Например 100%',
                'is_center_logo'     => 'Работает в стандартной шапке',
                'font_headers'       => 'Впишите название шрифта. Например: Open Sans, Playfair Display, Roboto, Raleway, Spectral, Rubik',
                'font_texts'         => 'Впишите название шрифта. Например: Open Sans, Playfair Display, Roboto, Raleway, Spectral, Rubik',
                'font_css'           => 'Получите и настройте ссылку на ваши шрифты в сервисе: https://fonts.google.com/ https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Playfair+Display:400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i|Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Rubik:300,300i,400,400i,500,500i,700,700i,900,900i|Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i&display=swap&subset=cyrillic',
                'text_color'         => 'Цвет текста заданный по умолчанию для всего сайта.',
                'second_bg_color'    => 'Цвет фона блоков',
                'yandex_map'         => 'Если код не указан, то карта будет построена через апи',

                'main_theme_color1' => 'Это основной цвет темы! Является фоном основных кнопок + ссылок',
                'main_theme_color2' => 'Чтобы на кнопках был градиент задайте второй основной цвет',
                
                'bg_color'   => 'Цвет фона сайта',

                'second_theme_bg_color'   => 'Основной цвет фона второстепенных кнопок',
                'second_theme_text_color' => 'Основной цвет текста второстепенных кнопок',

            ],
            'attributeLabels' => [
                'base_radius'  => 'Скругление углов',
                'base_padding' => 'Базовые отступы',

                'css_code'           => "CSS код",
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

                'second_theme_bg_color'   => "Цвет фона второстепенных кнопок",
                'second_theme_text_color' => "Цвет текста второстепенных кнопок",
                'second_bg_color'         => "Цвет фона блока с фильтрами, и различных второстепенных блоков",

                'bg_color'   => 'Цвет фона сайта',
                
                'font_css'     => "Подключаемые внешние шрифты",
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

                'is_show_home_slider'   => "Показывать слайдер на главной",
                'include_assets'        => "Дополнительные компоненты",
                'include_mobile_assets' => "Дополнительные компоненты",
                'include_font_assets'   => "Набор предустановленынх шрифтов",
                'col_left_width'        => "Ширина левой колонки, px",

                'is_header_toolbar'         => "Показывать панельку перед меню",
                'is_header_auth'            => "Показывать ссылки на авторизацию",
                'is_header_show_hide'       => "Прятать при прокрутки страницы?",
                'is_header_toggle_sections' => "Сокращать при прокрутке? Скрывать тулбар",
                'sx_container_width'        => "Максимальная ширина контейнера",
            ],
            'rules'           => [
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
                        'second_theme_bg_color',
                        'second_theme_text_color',

                        'menu_color1',
                        'menu_color2',
                        'menu_font_color',
                        'menu_font_size',


                        'header',
                        'header_shadow',


                        'footer',
                        'footer_bg_color',
                        'bg_color',
                        'footer_color',
                        'text_color',
                        'second_bg_color',
                        'bg_color',
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

                        'base_radius',
                        'base_padding',
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
                        'include_mobile_assets',
                        'include_font_assets',
                    ],
                    'safe',
                ],
                [
                    [
                        'menu_align',
                    ],
                    'string',
                ],

            ],
        ];
    }


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

        /*if (isset(\Yii::$app->unifyThemeSettings)) {
            foreach (\Yii::$app->unifyThemeSettings->toArray() as $key => $value) {
                if ($this->hasProperty($key) && $this->canSetProperty($key)) {
                    $this->{$key} = $value;
                }
            }
        }*/
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

        //Предустановленные шрифты
        if (\Yii::$app->view->theme->include_font_assets) {
            foreach ((array)\Yii::$app->view->theme->include_font_assets as $id) {
                $assetClass = ArrayHelper::getValue((array)\Yii::$app->view->theme->available_font_assets, [$id, 'class']);
                if (class_exists($assetClass)) {
                    $assetClass::register(\Yii::$app->view);
                } else {
                    \Yii::error('Ошибка, класс: '.$assetClass." не существует или удален!");
                }
            }
        }

        if (!\Yii::$app->mobileDetect->isMobile) {
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
        } else {
            //Дополнительные компоненты верстки
            if (\Yii::$app->view->theme->include_mobile_assets) {
                foreach ((array)\Yii::$app->view->theme->include_mobile_assets as $assetClass) {
                    if (class_exists($assetClass)) {
                        $assetClass::register(\Yii::$app->view);
                    } else {
                        \Yii::error('Ошибка, класс: '.$assetClass." не существует или удален!");
                    }
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


        $content = str_replace("{second_theme_bg_color}", \Yii::$app->view->theme->second_theme_bg_color, $content);
        $content = str_replace("{second_theme_text_color}", \Yii::$app->view->theme->second_theme_text_color, $content);

        $content = str_replace("{base_padding}", \Yii::$app->view->theme->base_padding, $content);
        $content = str_replace("{base_radius}", \Yii::$app->view->theme->base_radius, $content);

        $content = str_replace("#0185c8", \Yii::$app->view->theme->main_theme_color1, $content);
        $content = str_replace("#e1082c", \Yii::$app->view->theme->main_theme_color2, $content);
        $content = str_replace("{font_headers}", \Yii::$app->view->theme->font_headers, $content);
        $content = str_replace("{font_texts}", \Yii::$app->view->theme->font_texts, $content);
        $content = str_replace("{text_color}", \Yii::$app->view->theme->text_color, $content);

        $content = str_replace("{second_bg_color}", \Yii::$app->view->theme->second_bg_color, $content);
        $content = str_replace("{bg_color}", \Yii::$app->view->theme->bg_color, $content);
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


        $cache = md5(serialize(ArrayHelper::toArray(\Yii::$app->view->theme)))."-v18";

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
                    //\Yii::$app->view->theme->themeAssetClass
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
                Sortable::class                             => [
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
     * @var array
     */
    public $include_mobile_assets = [];

    /**
     * @var array
     */
    public $include_font_assets = [];

    /**
     * @var array
     */
    public $available_font_assets = [
        'futura' => [
            'class'       => FuturaFontAsset::class,
            'label'       => 'Futura',
            'description' => 'font-family: futura35;<br />font-family: futura45;<br />font-family: futura55;<br /> font-family: futura65;',
        ],
    ];

    /**
     * @return array
     */
    public function getAvailbaleFontsForSelect()
    {
        $result = [];

        foreach ($this->available_font_assets as $id => $data) {
            $result[$id] = ArrayHelper::getValue($data, 'label');
        }

        return $result;
    }
    /**
     * @return array
     */
    public function getAvailbaleFontsDescription()
    {
        $result = [];

        foreach ($this->available_font_assets as $id => $data) {
            $result[$id] = ArrayHelper::getValue($data, 'description');
        }

        return $result;
    }

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
     * @var string Фон блоков
     */
    public $second_bg_color = "#fafafa";

    /**
     * @var string Фон блоков
     */
    public $bg_color = "#ffffff";

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
    public $second_theme_bg_color = '#6c757d';
    /**
     * @var string
     */
    public $second_theme_text_color = '#ffffff';


    /**
     * @var string
     */
    public $base_padding = '5rem';
    /**
     * @var string
     */
    public $base_radius = '1rem';

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