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
use skeeks\cms\widgets\formInputs\StorageImage;
use skeeks\cms\widgets\StorageFileManager;
use skeeks\yii2\form\fields\BoolField;
use skeeks\yii2\form\fields\TextareaField;
use skeeks\yii2\form\fields\WidgetField;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeSettings extends Component
{
    /**
     * @var string
     */
    public $logo = '/favicon.ico';

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
    public $vk = '';

    /**
     * @var string
     */
    public $instagram = '';

    /**
     * @var string
     */
    public $youtube = '';

    /**
     * @var string
     */
    public $facebook = '';


    /**
     * @var string
     */
    public $css_code = '';


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

                    'css_code',
                ],
                'string',
            ],

        ]);
    }

    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'logo'    => "Логотип",
            'favicon' => "Фавикон",

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
        ]);
    }


    public function attributeHints()
    {
        return ArrayHelper::merge(parent::attributeHints(), [
            /*'css'               => "CSS код подключаемый к вашему сайту",
            'js'                => "JS код подключаемый к вашему сайту, в этом поле, можно например вставить счетчики",
            'bg_image'          => "Фоновое изображение",
            'no_image'          => "заполните, если хотите изменить изображение по умолчанию,",
            'header_image'      => "Картинка в шапке",*/
        ]);
    }

    /**
     * @return array
     */
    public function getConfigFormFields()
    {
        return [
            'title',

            'phone',
            'email',
            'address',
            'work_time',

            'favicon'  => [
                'class'       => WidgetField::class,
                'widgetClass' => OneImage::class,
            ],
            'logo'     => [
                'class'       => WidgetField::class,
                'widgetClass' => OneImage::class,
            ],

            'vk',
            'instagram',
            'youtube',
            'facebook',

            'yandex_map'      => [
                'class' => TextareaField::class,
            ],

            'css_code' => [
                'class' => TextareaField::class,
            ],
        ];
    }

}