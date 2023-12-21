<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

use skeeks\cms\base\AssetBundle;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class VanillaLazyLoadAsset extends AssetBundle
{
    public $sourcePath = '@bower/vanilla-lazyload/dist';

    public $js = [
        'lazyload.min.js',
    ];

    public $css = [
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);

        \Yii::$app->view->registerJs(<<<JS
        sx.LazyLoadInstance = new LazyLoad({
            //use_native: true,
            //elements_selector: ".lazy"
            // ... more custom settings?
            unobserve_entered: true, // <- Avoid executing the function multiple times
            callback_enter: function (element) {
              var lazyFunctionName = element.getAttribute("data-lazy-function");
              if (lazyFunctionName) {
                  var lazyFunction = window.lazyFunctions[lazyFunctionName];
                  if (!lazyFunction) return;
                  lazyFunction(element);
              }
              
            } // Assigning the function defined above
            
        });

        $(document).on('pjax:complete', function (e) {
            setTimeout(function() {
                /*sx.LazyLoadInstance = new LazyLoad({});*/
                sx.LazyLoadInstance.update();
            }, 200);
        });
        
        $(document).on('ajaxComplete', function() {
              setTimeout(function() {
                  /*sx.LazyLoadInstance = new LazyLoad({});*/
                  sx.LazyLoadInstance.update();
              }, 400);
              
              setTimeout(function() {
                  /*sx.LazyLoadInstance = new LazyLoad({});*/
                  sx.LazyLoadInstance.update();
              }, 1000);
        });
JS
        );
    }
}
