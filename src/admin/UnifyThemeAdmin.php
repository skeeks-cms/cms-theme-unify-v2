<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin;

use skeeks\cms\backend\widgets\filters\Bootstrap4ActiveField;
use skeeks\cms\backend\widgets\filters\Bootstrap4InlineActiveField;
use skeeks\cms\modules\admin\widgets\form\ActiveFormUseTab;
use skeeks\cms\themes\unify\admin\assets\UnifyAdminAppAsset;
use skeeks\cms\themes\unify\assets\UnifyBootstrapAsset;
use skeeks\cms\themes\unify\assets\UnifyBootstrapPluginAsset;
use skeeks\cms\themes\unify\assets\UnifyJqueryAsset;
use skeeks\cms\themes\unify\widgets\jui\JuiSortableWidget;
use yii\base\Theme;
use yii\helpers\Url;
use yii\jui\Sortable;

/**
 * @property string|null $logoSrc путь к лого, если передать null, то будет лого по умолчанию
 * @property string|null $logoHref Url с логотипа
 *
 * @property string $slideNavClasses read-only
 * @property string $headerClasses read-only
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyThemeAdmin extends Theme
{
    public $pathMap = [
        '@app/views' => [
            '@skeeks/cms/themes/unify/admin/views',
        ],
    ];

    /**
     * Цветовая схема шаблона light dark multi
     * @var string
     */
    public $color_scheme = "multi";

    /**
     * Название рядом с логотипом
     * @var string
     */
    public $logoTitle = "SkeekS.com";

    /**
     * @var null
     */
    protected $_logoSrc = null;

    /**
     * @var null
     */
    protected $_logoHref = null;

  

    /**
     * @return string
     */
    public function getLogoSrc()
    {
        if ($this->_logoSrc === null) {
            $this->_logoSrc = UnifyAdminAppAsset::getAssetUrl('img/logos/logo-no-bg-title.png');
        }

        return (string) $this->_logoSrc;
    }

    /**
     * @param string|null $src
     * @return $this
     */
    public function setLogoSrc($src)
    {
        $this->_logoSrc = $src;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogoHref()
    {
        if (!$this->_logoHref) {
            $this->_logoHref = Url::home();
        }

        return (string) $this->_logoHref;
    }

    /**
     * @param string $href
     * @return $this
     */
    public function setLogoHref($href)
    {
        $this->_logoHref = $href;
        return $this;
    }

    /**
     * @return string
     */
    public function getHeaderClasses()
    {
        $headerClasses = "u-header__section u-header__section--admin-light u-shadow-v22 g-min-height-65";

        if ($this->color_scheme == 'dark') {
            $headerClasses = "u-header__section u-header__section--admin-dark g-min-height-65";
        }
        if ($this->color_scheme == 'multi') {
            $headerClasses = "u-header__section u-header__section--admin-dark g-min-height-65";
        }

        return $headerClasses;
    }

    /**
     * @return string
     */
    public function getSlideNavClasses()
    {
        $slideNavClasses = "col-auto sx-sidebar u-sidebar-navigation--light sx-bg-secondary";

        if ($this->color_scheme == 'dark') {
            $slideNavClasses = "col-auto sx-sidebar u-sidebar-navigation--dark";
        }
        if ($this->color_scheme == 'multi') {
            $slideNavClasses = "col-auto sx-sidebar u-sidebar-navigation--light sx-bg-secondary";
        }

        return $slideNavClasses;
    }

    /**
     *
     */
    static public function initBeforeRender()
    {
        /**
         * Для виджетов выбора времени
         */
        //\Yii::$app->params['bsVersion'] = "4";

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
                Sortable::class           => [
                    'class' => JuiSortableWidget::class,
                ],
                \yii\bootstrap\ActiveForm::class            => [
                    'class' => \yii\bootstrap4\ActiveForm::class,
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

                /*\skeeks\cms\backend\widgets\FiltersWidget::class => [
                    'defaultActiveForm' => [
                        'class'       => '\yii\bootstrap4\ActiveForm',
                        'fieldClass'  => Bootstrap4InlineActiveField::class,
                        'layout'      => 'inline',
                        'options'     => [
                            'class'     => 'sx-backend-filters-form',
                            'data-pjax' => 1,
                        ],
                        'method'      => 'get',
                    ],
                ],*/


            ]
        ));

    }
}