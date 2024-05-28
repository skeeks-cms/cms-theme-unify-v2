/*!
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.02.2015
 */
(function(sx, $, _)
{
    sx.createNamespace('classes', sx);

    /**
     * Настройка блокировщика для админки по умолчанию. Глобальное перекрытие
     * @type {void|*|Function}
     */
    sx.classes.Blocker  = sx.classes.BlockerJqueyUi.extend({

        _init: function()
        {
            this.imageLoader = sx.Config.get('imageLoader');

            if (sx.App)
            {
                //this.imageLoader = sx.App.get('BlockerImageLoader');
            }
            this.defaultOpts({
                /*message: "<div style=''><img src='" + this.imageLoader + "' /></div>",*/
                message: "<div style=''></div>",
                overlayCSS: {
                    /*background: 'linear-gradient(100deg, #eceff180 30%, #f6f7f870 50%, #eceff182 70%)',*/
                    opacity:         1,
                    cursor:          'wait'
                },
                css: {
                    border: 'none',
                    /*padding: '15px',*/
                    backgroundColor: 'none;',
                    /*'-webkit-border-radiloaderus': '10px',
                    '-moz-border-radius': '10px',*/
                    opacity: .5,
                    /*color: '#fff'*/
                }
            });

            this.applyParentMethod(sx.classes.BlockerJqueyUi, '_init', []);
        },
    });

})(sx, sx.$, sx._);