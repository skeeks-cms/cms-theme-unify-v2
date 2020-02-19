<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
?>
<?= $this->render('@skeeks/cms/themes/unify/views/headers/header-v2', [
    'content' => \skeeks\cms\shop\widgets\cart\ShopCartWidget::widget([
        'namespace' => 'ShopCartWidget-small-top',
        'viewFile'  => '@app/views/widgets/ShopCartWidget/small-top',
    ]),
]); ?>
