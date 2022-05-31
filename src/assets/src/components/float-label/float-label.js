
(function( $ ){

    /*$('div.required').each(function () {
        var label = $(this).children('label');
        var labelText = label.html();
        console.log(label.hasClass('sx-from-required'));
        if (!label.has('.sx-from-required')) {
            console.log(label);
            console.log(labelText);
            $('label.control-label').empty().append(labelText + '<span class="sx-from-required" title="Р­С‚Рѕ РїРѕР»Рµ РѕР±СЏР·Р°С‚РµР»СЊРЅРѕ РґР»СЏ Р·Р°РїРѕР»РЅРµРЅРёСЏ">&nbsp;*&nbsp;</span>');
        }
    });*/

    $("body").on("click", ".js-float-label-wrapper label", function() {
        var jWrapper = $(this).closest(".js-float-label-wrapper");
        $("input", jWrapper).focus();
    });

	$.fn.FloatLabel = function( options ){

		var defaults = {
			populatedClass : 'populated',
			focusedClass : 'focused',
			emptyClass : 'inpempty',
		},
			settings = $.extend({}, defaults, options);

		return this.each(function(){

			var element = $(this),
				label = element.find('label'),
				input = element.find('textarea, input[type=text], input[type=password],input[type=email],input[type=number], textarea, select#relatedpropertiesmodel-region');

			//console.log('type='+input.attr('type')+' id='+input.attr('id') + ' val=' + input.val());

			input.removeAttr('placeholder');

			input.parents('.form-group').addClass('js-float-label-wrapper');

			if( input.val() == '' || input.val() == 0) {

			} else 					{
				element.addClass( settings.populatedClass );
			}

			input.on( 'focus', function(){
				element.addClass( settings.focusedClass );

				if( input.val() === label.text() ){
					//input.val('');
				} else {
					element.addClass( settings.populatedClass );
				}

			});

			input.on( 'blur', function(){
				element.removeClass( settings.focusedClass );

					if( !input.val() ){
						//input.val( label.text() );
						element.removeClass( settings.populatedClass );
					}

			});

			input.on( 'keyup', function(){
				element.addClass( settings.populatedClass );
			});

		});
	};

})( jQuery );
