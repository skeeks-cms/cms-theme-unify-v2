<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets\jui\assets;

use yii\web\AssetBundle;
/**
 *
 * Этот класс используется для того чтобы не пересекаться с bootstrap tooltip
 *
 * @see https://api.jqueryui.com/sortable/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class JuiSmoothnessAsset extends AssetBundle
{
    public $sourcePath = '@bower/jquery-ui';

    public $css = [
        'themes/smoothness/jquery-ui.min.css',
    ];
}