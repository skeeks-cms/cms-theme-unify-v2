<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\assets\unify\base\UnifyAsset;
use skeeks\assets\unify\base\UnifyHsScrollbarAsset;
use skeeks\assets\unify\base\UnifyPopperAsset;
use skeeks\cms\assets\FancyboxAssets;
use skeeks\cms\themes\unify\assets\FontAwesomeAsset;
use skeeks\sx\assets\Custom;
use yii\bootstrap\BootstrapPluginAsset;
use yii\web\YiiAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyAdminIconsAsset extends UnifyAsset
{
    public $css = [
        
        //'//fonts.googleapis.com/css?family=Open+Sans%3A400%2C300%2C500%2C600%2C700%7CPlayfair+Display%7CRoboto%7CRaleway%7CSpectral%7CRubik&display=swap',
        'admin-template/assets/vendor/hs-admin-icons/hs-admin-icons.css',
        //'assets/vendor/animate.css',
        //'admin-template/assets/css/unify-admin.min.css',
    ];
    public $js = [
        //'assets/vendor/cookiejs/jquery.cookie.js',
        //'admin-template/assets/js/components/hs.side-nav.js',
        //'assets/js/components/hs.dropdown.js',
    ];

}