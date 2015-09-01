<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\modules\test\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TestAsset extends AssetBundle{

    public $sourcePath = '@app/modules/test/assets';

    public $css = [
        'css/test.css',
    ];

    public $js = [
        'js/test.js',
    ];
}
