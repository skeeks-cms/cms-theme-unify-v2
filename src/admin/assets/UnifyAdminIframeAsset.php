<?php
/**
 * @link https://cms.skeeks.com/
 * @copyright Copyright (c) 2010 SkeekS
 * @license https://cms.skeeks.com/license/
 * @author Semenov Alexander <semenov@skeeks.com>
 */

namespace skeeks\cms\themes\unify\admin\assets;

use skeeks\cms\backend\assets\BackendIframeAsset;

/**
 * Backward-compatible alias for legacy consumers.
 *
 * New backend code must register BackendIframeAsset directly.
 */
class UnifyAdminIframeAsset extends BackendIframeAsset
{
}
