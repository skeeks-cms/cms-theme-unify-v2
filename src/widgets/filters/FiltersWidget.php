<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets\filters;

use skeeks\yii2\queryfilter\QueryFilterShortUrlWidget;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FiltersWidget extends QueryFilterShortUrlWidget
{
    public $viewFile = "@app/views/filters/filters";

    public function init()
    {
        \Yii::$app->seo->canurl->ADDimportant_pname($this->filtersParamName);
        parent::init();
    }
}