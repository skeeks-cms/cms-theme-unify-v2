/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

(function (sx, $, _) {
    sx.classes.Auth = sx.classes.Component.extend({

        _onDomReady: function () {

            var self = this;

            //Событие видежта action
            self.getJWrapper().on("action", function (e, data) {
                self.runAction(data.action);
            });


            //Триггер для вызова нужного action
            $(".sx-trigger-action", self.getJWrapper()).on("click", function () {
                var action = $(this).data("action");

                self.getJWrapper().trigger("action", {
                    'action': action
                });

                return false;
            });

            //Отправка SMS кода
            $(".sx-send-phone-code", self.getJWrapper()).on("click", function () {

                var jWrapper = $(this).closest(".sx-auth-action");
                var phone = $(".sx-phone", jWrapper).val();

                var ajaxQuery = sx.ajax.preparePostQuery(self.get("url-generate-phone-code"), {
                    'phone' : phone
                });
                var handler = new sx.classes.AjaxHandlerStandartRespose(ajaxQuery);

                handler.on("success", function() {

                    $("[data-action=auth-by-phone-sms-code] .sx-phone", self.getJWrapper()).val(phone);

                    self.getJWrapper().trigger("action", {
                        'action': "auth-by-phone-sms-code"
                    });
                });

                ajaxQuery.execute();



                return false;
            });

            //Действие по умолчанию
            self.getJWrapper().trigger("action", {
                'action': this.get('action')
            });

            $(".sx-phone", self.getJWrapper()).mask("+7 999 999-99-99");
        },

        getJWrapper() {
            return $("#" + this.get('id'));
        },

        runAction: function (action) {
            $(".sx-auth-action").hide();
            $(".sx-auth-action[data-action=" + action + "]").show();
        }
    });
})(sx, sx.$, sx._);