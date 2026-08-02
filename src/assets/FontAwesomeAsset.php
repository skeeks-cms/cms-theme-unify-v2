<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\assets;

/**
 * @author Semenov Alexander <semenov@skeeks.com>
 */
class FontAwesomeAsset extends FontAwesomeCoreAsset
{
    public $depends = [
        FontAwesomeIconsAsset::class,
    ];
}
