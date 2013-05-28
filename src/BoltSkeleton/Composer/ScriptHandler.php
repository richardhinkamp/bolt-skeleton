<?php
/**
 * Based on Sensio\Bundle\DistributionBundle\Composer\ScriptHandler
 * @see https://github.com/sensio/SensioDistributionBundle/blob/master/Composer/ScriptHandler.php
 */

namespace BoltSkeleton\Composer;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class ScriptHandler
{
    public static function installConfig($event)
    {
        $root = __DIR__.'/../../../';
        $boltConfigDir = $root.'vendor/bolt/bolt/config';
        $targetDir = $root.'config/';

        $filesystem = new Filesystem();
        if(!$filesystem->exists($targetDir)) {
            $filesystem->mkdir($targetDir, 0755);
        }
        foreach(Finder::create()->in($boltConfigDir)->name('*.yml.dist') as $file) {
            $filesystem->copy($boltConfigDir.$file->getFilename(),$targetDir.$file->getFilename());
        }
    }
}
