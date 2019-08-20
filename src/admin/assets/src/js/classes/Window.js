/*!
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 07.04.2015
 */
(function (sx, $, _) {
    sx.createNamespace('classes', sx);
    /**
     * Настройка блокировщика для админки по умолчанию. Глобальное перекрытие
     * @type {void|*|Function}
     */
    sx.classes.Window = sx.classes._Window.extend({

        /**
         * @returns {Window}
         */
        open: function () {
            var self = this;

            this.trigger('beforeOpen');
            //строка параметров, собираем из массива
            var paramsSting = "";
            if (this.getOpts()) {
                _.each(this.getOpts(), function (value, key) {
                    if (paramsSting) {
                        paramsSting = paramsSting + ',';
                    }
                    paramsSting = paramsSting + String(key) + "=" + String(value);
                });
            }

            this.onDomReady(function () {
                $.fancybox.open({
                    src: self._src,
                    'type': 'iframe',
                    'opts': {
                        'afterClose': function () {
                            self.trigger('close');
                        },
                        iframe: {
                            preload: false,
                            css: {
                                width: '100%',
                                height: '100%'
                            }
                        },
                        animationDuration : 350,
                        animationEffect   : 'slide-in-out',
                    }
                });

                /*var options = _.extend({

                    'height'	: '100%',
                    'autoSize'  : false,
                    'width'		: '100%'
                }, self.toArray());

                $("<a>", {
                    'style' : 'display: none;',
                    'href' : self._src,
                    'data-type' : 'iframe',
                }).appendTo('body').fancybox(options).click();*/
            });

            return this;
        }
    });

})(sx, sx.$, sx._);