<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\assets\unify\base\UnifyAsset;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class UnifyJqueryAsset extends UnifyAsset
{
    public $css = [];
    public $js = [
        'assets/vendor/jquery/jquery.min.js',
    ];
    public $depends = [];
}