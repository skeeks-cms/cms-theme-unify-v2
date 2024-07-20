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

            var baseCssClass = 'sx-fancy-container';
            if (self.get('size')) {
                var baseCssClass = 'sx-fancy-container sx-fancy-size-' + self.get('size');
            }

            var jq = $;

            if (this.getMainWindow()) {
                jq = this.getMainWindow().$;
            }

            if (self.get('size') !== 'small') {
                var maxWidth = 1300;
                maxWidth = maxWidth - (this.getFancyWindowInstances().length * 15);
            }



            this.onDomReady(function () {
                jq.fancybox.open({
                    src: self._src,
                    'type': 'iframe',
                    'opts': {
                        toolbar: false,
                        smallBtn: true,
                        //slideClass: "sx-slide-class",
                        baseClass: baseCssClass,

                        /*buttons: [
                            "close"
                        ],*/

                        beforeClose: function () {
                            self.trigger('beforeClose');
                            if (!self.isAllowClose) {
                                return false;
                            }
                        },

                        'afterClose': function (instance, current) {
                            self.closeFancyWindow(instance);
                            self.trigger('close');
                            //console.log(self.getFancyWindowInstances());
                            /*window.history.replaceState(null, 'title', currentHref);*/
                        },
                        'afterShow': function (instance, current) {
                            /*window.history.replaceState(null, 'title', self._src);*/
                            self.addFancyWindow(instance);
                            /*console.log(self.getFancyWindowInstances());
                            console.log(current);*/

                            var iframe = current.$iframe[0];
                            var iframeWindow = current.$iframe[0].contentWindow;


                            iframeWindow.sx.Window._openerWindowWidget = self;

                            iframe.addEventListener("load", function(event) {
                                //console.log(iframeWindow.sx.Window);
                                iframeWindow.sx.Window._openerWindowWidget = self;
                            });


                            /*iframeWindow.addEventListener("load", function(event) {
                                console.log("iframeWindow load");


                            });*/

                            //console.log(current.$iframe[0].contentWindow.$);
                            //current.$iframe[0].contentWindow.sx.Window._openerSx = sx;
                            self._openedWindow = iframeWindow;

                            //current.$iframe[0].contentWindow.opener = window;
                            //self._openedWindow = current.$iframe[0].contentWindow.opener

                            self.trigger('afterOpen');

                            //document.getElementsByTagName("iframe")[0].contentWindow;

                        },

                        'beforeShow': function (instance, current) {
                            //console.log(instance);
                            /*console.log(instance);
                            console.log(current);
                            current.opts.iframe.css = {
                                'max-width': '500px'
                            };*/
                            /*window.history.replaceState(null, 'title', self._src);*/
                        },
                        iframe: {
                            tpl: '<iframe id="fancybox-frame{rnd}" name="' + name + '" class="fancybox-iframe" allowfullscreen allow="autoplay; fullscreen" src=""></iframe>',
                            preload: false,
                            css: {
                                width: '100%',
                                height: '100%',
                                'max-width': maxWidth + 'px'
                            }
                        },
                        animationDuration: 350,
                        animationEffect: 'slide-in-out',
                    }
                });
            });

            return this;
        },

        /**
         * В этом окне будут открываться все вложенные
         * @returns {sx.classes.CurrentWindow|*}
         */
        getMainWindow: function () {
            if (sx.Window.openerWindow()) {
                return sx.Window.openerWindow();
            }

            return window;
        },

        /**
         * @returns {void|*|Function|sx.classes.CurrentWindow|null}
         */
        getMainSxWindow: function () {
            return this.getMainWindow().sx.Window;
        },

        /**
         * @param instance
         */
        addFancyWindow: function (instance) {

            if (typeof this.getMainSxWindow().fancyWindows == "undefined") {
                this.getMainSxWindow().fancyWindows = [];
            }

            this.getMainSxWindow().fancyWindows.push(instance);
        },

        /**
         * @returns {[]}
         */
        getFancyWindowInstances: function () {

            if (typeof this.getMainSxWindow().fancyWindows == "undefined") {
                this.getMainSxWindow().fancyWindows = [];
            }

            return this.getMainSxWindow().fancyWindows;
        },

        /**
         * @param instance
         * @returns {sx.classes.Window}
         */
        closeFancyWindow: function (instance) {

            if (typeof this.getMainSxWindow().fancyWindows == "undefined") {
                this.getMainSxWindow().fancyWindows = [];
            }

            this.getMainSxWindow().fancyWindows = this.getMainSxWindow().fancyWindows.filter(function (item) {
                return item.id == instance.id
            });

            return this;
        },

        close: function () {
            var jq = $;

            if (this.getMainWindow()) {
                jq = this.getMainWindow().$;
            }
            jq.fancybox.close();
        }
    });


})(sx, sx.$, sx._);