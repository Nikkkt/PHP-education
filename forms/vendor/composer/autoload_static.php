<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7aa19a26c1231e6e28f5d26f0fa85403
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nikit\\Forms\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nikit\\Forms\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7aa19a26c1231e6e28f5d26f0fa85403::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7aa19a26c1231e6e28f5d26f0fa85403::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7aa19a26c1231e6e28f5d26f0fa85403::$classMap;

        }, null, ClassLoader::class);
    }
}
