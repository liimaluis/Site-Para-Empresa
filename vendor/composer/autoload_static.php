<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit122f50ba649a586d80e3b3d850fd3560
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Core\\' => 5,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit122f50ba649a586d80e3b3d850fd3560::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit122f50ba649a586d80e3b3d850fd3560::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit122f50ba649a586d80e3b3d850fd3560::$classMap;

        }, null, ClassLoader::class);
    }
}
