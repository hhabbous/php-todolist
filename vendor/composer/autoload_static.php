<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit794fcfbf5aae4ee8bd4274012fdaaf58
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TODO\\' => 5,
        ),
        'D' => 
        array (
            'Dotenv\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TODO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Dotenv\\' => 
        array (
            0 => __DIR__ . '/..' . '/vlucas/phpdotenv/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit794fcfbf5aae4ee8bd4274012fdaaf58::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit794fcfbf5aae4ee8bd4274012fdaaf58::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
