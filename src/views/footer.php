<?
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */
/* @var $this yii\web\View */
?>
<? if ($this->theme->footer === 'custom') : ?>
    <?= $this->theme->footer_custom_html; ?>
<? else : ?>
    <?= $this->render('@app/views/footers/footer-' . $this->theme->footer); ?>
<? endif; ?>
