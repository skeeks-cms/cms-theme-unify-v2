/*!
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 07.04.2015
 */
(function (sx, $, _) {

    sx.createNamespace('classes', sx);

    /**
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

            var name = this.getName();

            this.onDomReady(function () {
                $.fancybox.open({
                    src: self._src,
                    'type': 'iframe',
                    'opts': {
                        toolbar  : false,
	                    smallBtn : true,
                        /*buttons: [
                            "close"
                        ],*/

                        'afterClose': function () {
                            self.trigger('close');
                        },
                        iframe: {
                            tpl: '<iframe id="fancybox-frame{rnd}" name="' + name + '" class="fancybox-iframe" allowfullscreen allow="autoplay; fullscreen" src=""></iframe>',
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
            });

            return this;
        },

        close: function() {
            $.fancybox.close();
        }
    });


})(sx, sx.$, sx._);