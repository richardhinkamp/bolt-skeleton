<?php
/*
 * This file is part of the Bolt skeleton package.
 *
 * (c) Richard Hinkamp <richard@hinkamp.nl>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once( '../src/bootstrap.php' );

if (preg_match("~^/thumbs/(.*)$~", $_SERVER['REQUEST_URI'])) {
    // If it's not a prebuilt file, but it is a thumb that needs processing
    //define('OPTIPNG_ENABLED', true);
    define('FILE_CACHE_DIRECTORY', __DIR__ . '/../cache/thumbs/');
    require __DIR__ . '/../vendor/bolt/bolt/app/classes/timthumb.php';
} else {
    // Here we go!
    $app->run();
}
