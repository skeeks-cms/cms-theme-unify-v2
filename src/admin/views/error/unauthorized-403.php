<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 05.03.2015
 */
?>

<?php
/**
 * auth
 *
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 26.02.2015
 */
/* @var $this \yii\web\View */
use yii\helpers\Html;
use \skeeks\cms\modules\admin\widgets\ActiveForm;

$this->registerJs(<<<JS
    (function(sx, $, _)
    {
        sx.createNamespace('classes', sx);

        sx.classes.Auth = sx.classes.Component.extend({


        });

        sx.auth = new sx.classes.Auth({});
    })(sx, sx.$, sx._);
JS
);
?>

<div class="main sx-auth sx-content-block sx-windowReady-fadeIn">
    <div class="col-lg-4"></div>

    <div class="col-lg-4">
        <div class="sx-surface sx-surface--raised sx-surface--padded">

            <div class="sx-act-reset-password">
                <?= $message; ?>
            </div>
        </div>

    </div><!-- End .col-lg-12  -->

    <div class="col-lg-4"></div>
</div>

