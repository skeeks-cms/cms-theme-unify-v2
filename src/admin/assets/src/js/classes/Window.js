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

            var name = this.getName();
            /*var currentHref = window.location.href;*/

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
                            /*window.history.replaceState(null, 'title', currentHref);*/
                        },
                        'afterShow': function () {
                            /*window.history.replaceState(null, 'title', self._src);*/

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