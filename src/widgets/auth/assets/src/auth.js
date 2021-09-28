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
                self.runAction(data);
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
            $(".sx-phone-code-trigger", self.getJWrapper()).on("click", function () {

                var jWrapper = $(this).closest(".sx-auth-action");
                var phone = $(".sx-phone", jWrapper).val();

                var ajaxQuery = sx.ajax.preparePostQuery(self.get("url-generate-phone-code"), {
                    'phone' : phone
                });

                var Blocker = new sx.classes.Blocker(jWrapper);

                var handler = new sx.classes.AjaxHandlerStandartRespose(ajaxQuery, {
                    'blocker' : Blocker,
                    'enableBlocker' : true,
                });

                handler.on("success", function(e, data) {

                    $("[data-action=auth-by-phone-sms-code] .sx-phone", self.getJWrapper()).val(phone);

                    self.getJWrapper().trigger("action", {
                        'action': "auth-by-phone-sms-code",
                        'left-time': data.data['left-repeat']
                    });

                    /*if (data.data['left-repeat']) {
                        self.set("leftPhone", data.data['left-repeat']);
                        self.runPhoneLeftTime();
                    }*/
                });

                ajaxQuery.execute();



                return false;
            });


            //Отправка Email кода
            $(".sx-email-code-trigger", self.getJWrapper()).on("click", function () {

                var jWrapper = $(this).closest(".sx-auth-action");
                var email = $(".sx-email", jWrapper).val();

                var ajaxQuery = sx.ajax.preparePostQuery(self.get("url-generate-email-code"), {
                    'email' : email
                });

                var Blocker = new sx.classes.Blocker(jWrapper);

                var handler = new sx.classes.AjaxHandlerStandartRespose(ajaxQuery, {
                    'blocker' : Blocker,
                    'enableBlocker' : true,
                });

                handler.on("success", function(e, data) {

                    $("[data-action=auth-by-email-code] .sx-email", self.getJWrapper()).val(email);

                    self.getJWrapper().trigger("action", {
                        'action': "auth-by-email-code",
                        'left-time': data.data['left-repeat'],
                    });

                    /*if (data.data['left-repeat']) {
                        self.set("leftEmail", data.data['left-repeat']);
                        self.runEmailLeftTime();
                    }*/
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

        stopEmailLeftTime() {
            var self = this;
            var waitJwrappper = $(".sx-email-trigger-wrapper");

            $(".sx-email-code-wait", waitJwrappper).hide();
            $(".sx-email-code-trigger", waitJwrappper).show();

            clearInterval(this.emailTimer);
            this.emailTimer = null
        },

        stopPhoneLeftTime() {
            var self = this;
            var waitJwrappper = $(".sx-phone-trigger-wrapper");

            $(".sx-phone-code-wait", waitJwrappper).hide();
            $(".sx-phone-code-trigger", waitJwrappper).show();

            clearInterval(this.phoneTimer);
            this.phoneTimer = null
        },

        runEmailLeftTime() {
            var self = this;
            var waitJwrappper = $(".sx-email-trigger-wrapper");

            $(".sx-left-time", waitJwrappper).empty().append(self.get("leftEmail"));

            $(".sx-email-code-wait", waitJwrappper).show();
            $(".sx-email-code-trigger", waitJwrappper).hide();

            if (!this.emailTimer) {
                this.emailTimer = setInterval(function() {

                    var leftTime = self.get("leftEmail") - 1;
                    self.set("leftEmail", leftTime);
                    if (leftTime <= 0) {
                        self.stopEmailLeftTime();
                    }

                    $(".sx-left-time", waitJwrappper).empty().append(self.get("leftEmail"));

                }, 1000);
            }
        },

        runPhoneLeftTime() {
            var self = this;
            var waitJwrappper = $(".sx-phone-trigger-wrapper");

            $(".sx-left-time", waitJwrappper).empty().append(self.get("leftPhone"));

            $(".sx-phone-code-wait", waitJwrappper).show();
            $(".sx-phone-code-trigger", waitJwrappper).hide();

            if (!this.phoneTimer) {
                this.phoneTimer = setInterval(function() {

                    var leftTime = self.get("leftPhone") - 1;
                    self.set("leftPhone", leftTime);
                    if (leftTime <= 0) {
                        self.stopPhoneLeftTime();
                    }

                    $(".sx-left-time", waitJwrappper).empty().append(self.get("leftPhone"));

                }, 1000);
            }
        },

        getJWrapper() {
            return $("#" + this.get('id'));
        },

        runAction: function (data) {
            var self = this;
            var action = data.action;

            $(".sx-auth-action").hide();
            $(".sx-auth-action[data-action=" + action + "]").show();

            console.log(data);
            if (action == 'auth-by-email-code' && data['left-time']) {
                self.set("leftEmail", data['left-time']);
                self.runEmailLeftTime();
            }
            if (action == 'auth-by-phone-sms-code' && data['left-time']) {
                self.set("leftPhone", data['left-time']);
                self.runPhoneLeftTime();
            }
        }
    });
})(sx, sx.$, sx._);