<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit110d1261c21144702721d9f9bb0cb53a
{
    public static $files = array (
        '06f5f32a6edcbd18661c24705435ceb1' => __DIR__ . '/..' . '/freemius/wordpress-sdk/start.php',
        '85571c4a3ee62b52f6ed9a76dd37c50c' => __DIR__ . '/../..' . '/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'E' => 
        array (
            'ERROPiX\\AdvancedScripts\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'ERROPiX\\AdvancedScripts\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $prefixesPsr0 = array (
        'L' => 
        array (
            'Less' => 
            array (
                0 => __DIR__ . '/..' . '/wikimedia/less.php/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'lessc' => __DIR__ . '/..' . '/wikimedia/less.php/lessc.inc.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit110d1261c21144702721d9f9bb0cb53a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit110d1261c21144702721d9f9bb0cb53a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit110d1261c21144702721d9f9bb0cb53a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit110d1261c21144702721d9f9bb0cb53a::$classMap;

        }, null, ClassLoader::class);
    }
}