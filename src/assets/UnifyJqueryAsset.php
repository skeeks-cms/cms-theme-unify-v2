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

    /*public $js = [
        'assets/vendor/jquery/jquery.min.js',
        'assets/vendor/jquery-migrate/jquery-migrate.min.js',
    ];*/

    public $sourcePath = '@vendor/skeeks/cms-theme-unify-v2/src/assets/src/vendor/jquery';
    public $js = [
        'jquery-3.6.0.min.js',
        'jquery-migrate-3.4.0.min.js',
        //'jquery-passive.js', //не работает прокрутка в customscroll
    ];
    public $depends = [];
}