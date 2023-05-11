<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\widgets;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class ScrollAndSpPager extends \skeeks\yii2\ajaxpager\ScrollAndSpPager
{
    public $triggerTemplate = '<div class="sx-scroll-and-pager ias-trigger col-12" style="margin-bottom: 15px;">
        <button class="btn btn-primary btn-xl btn-block">{text}</button>
    </div>';

    public $triggerText = 'Показать еще';
    public $noneLeftText = '';

    public $spClientOptions = [
        'prevText' => '',
        'nextText' => '',
        'edges'    => '2',
    ];
    
    public $spClientMobileOptions = [
        'prevText'       => '',
        'nextText'       => '',
        'displayedPages' => '2',
    ];

    public function init()
    {
        if (!$this->eventOnPageChange) {
            $id = $this->id;
            $this->eventOnPageChange = new \yii\web\JsExpression(<<<JS
function(pageNum, scrollOffset, url) {
    var getCurrentPage = jQuery('#{$id}').pagination('getCurrentPage');
    var result = getCurrentPage + 1;
    jQuery('#{$id}').pagination('drawPage', result);
}
JS
        );
        }
        if (!$this->eventOnRendered) {
            $id = $this->id;
            $this->eventOnRendered = new \yii\web\JsExpression(<<<JS
function() {
    $(document).trigger("scrollAndPagerRendered");
}
JS
        );
        }
        parent::init();

    }
}