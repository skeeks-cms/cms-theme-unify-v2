<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 */

namespace skeeks\cms\themes\unify\admin;

use skeeks\cms\backend\themes\BackendTheme;
use skeeks\cms\themes\unify\admin\assets\UnifyAdminAppAsset;
use skeeks\cms\themes\unify\admin\assets\UnifyAdminHeaderAsset;
use skeeks\cms\themes\unify\admin\assets\UnifyAdminLeftMenuAsset;
use yii\helpers\ArrayHelper;

/**
 * Backward-compatible Unify administration theme.
 *
 * Shared providers, theme mode and shell contracts are inherited from
 * BackendTheme. This subclass retains only Unify assets, logo defaults and
 * its historical select-field mapping.
 */
class UnifyThemeAdmin extends BackendTheme
{
    public $appAssetClass = UnifyAdminAppAsset::class;

    public $headerAssetClass = UnifyAdminHeaderAsset::class;

    public $leftMenuAssetClass = UnifyAdminLeftMenuAsset::class;

    public $pathMap = [
        '@app/views' => [
            '@skeeks/cms/backend/views',
            '@skeeks/cms/themes/unify/admin/views',
        ],
    ];

    public $logoTitle = 'SkeekS.com';

    protected function getDefaultLogoSrc()
    {
        return UnifyAdminAppAsset::getAssetUrl('img/logos/logo-no-bg-title.png');
    }

    public function getHeaderClasses()
    {
        return 'sx-shell-header__surface--admin';
    }

    public function getSlideNavClasses()
    {
        return 'sx-shell-sidebar--default';
    }

    public static function initBeforeRender()
    {
        parent::initBeforeRender();

        \Yii::$container->setDefinitions(ArrayHelper::merge(
            \Yii::$container->definitions,
            [
                \skeeks\yii2\form\fields\SelectField::class => [
                    'class' => \skeeks\cms\admin\form\fields\AdminSelectField::class,
                ],
            ]
        ));
    }
}
