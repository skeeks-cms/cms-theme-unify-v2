<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets\jui;

use skeeks\cms\themes\unify\widgets\jui\assets\JuiSortableAsset;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\jui\Sortable;
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class JuiSortableWidget extends Sortable
{
    /**
     * Renders the widget.
     */
    public function run()
    {
        $options = $this->options;
        $tag = ArrayHelper::remove($options, 'tag', 'ul');
        $result = Html::beginTag($tag, $options) . "\n";
        $result .= $this->renderItems() . "\n";
        $result .= Html::endTag($tag) . "\n";
        /*$this->registerWidget('sortable');*/
        JuiSortableAsset::register(\Yii::$app->view);

        $id = $this->options['id'];
        $this->registerClientEvents("sortable", $id);
        $this->registerClientOptions("sortable", $id);

        return $result;
    }
}