<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace yii\web;

use common\components\unify\TemplateUnify;
use skeeks\cms\themes\unify\components\UnifyThemeSettings;
use skeeks\cms\themes\unify\UnifyTheme;
use skeeks\yii2\mobiledetect\MobileDetect;
use yii\base\Theme;


/**
 * @property View|PView         $view
 * @property UnifyThemeSettings $unifyThemeSettings
 * @property MobileDetect       $mobileDetect
 *
 * Class Application
 * @package yii\web
 */
class Application
{
}


/**
 * @property Theme|UnifyTheme $theme
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class View extends PView
{
}
/**
 * @property Theme|UnifyTheme $theme
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class PView
{
}