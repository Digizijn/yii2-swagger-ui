<?php
/**
 * @license MIT
 */

namespace machour\yii2\swagger\ui;

use yii\web\AssetBundle;

/**
 * @author Mehdi Achour <machour@gmail.com>
 * @since 1.0
 */
class SwaggerUiAsset extends AssetBundle
{
    public $sourcePath = '@bower/swagger-ui/dist';

    public $js = [
//        'lib/object-assign-pollyfill.js',
//		'lib/jquery-1.8.0.min.js',
//        'lib/jquery.slideto.min.js',
//        'lib/jquery.wiggle.min.js',
//        'lib/jquery.ba-bbq.min.js',
//        'lib/handlebars-4.0.5.js',
//        'lib/lodash.min.js',
//        'lib/backbone-min.js',
//        'swagger-ui.js',
//        'lib/highlight.9.1.0.pack.js',
//		'lib/highlight.9.1.0.pack_extended.js',
//		'lib/jsoneditor.min.js',
//        'lib/marked.js',
//        'lib/swagger-oauth.js',
        'swagger-ui-bundle.js',
        'swagger-ui-standalone-preset.js',
    ];

    public $css = [
    	'swagger-ui.css',
//        'css/typography.css', // media='screen' rel='stylesheet' type='text/css'/>
//        'css/reset.css', // media='screen' rel='stylesheet' type='text/css'/>
//        'css/screen.css', // media='screen' rel='stylesheet' type='text/css'/>
       // 'css/reset.css', // media='print' rel='stylesheet' type='text/css'/>
       // 'css/print.css', // media='print' rel='stylesheet' type='text/css'/>
    ];
}
