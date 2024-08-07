<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit227d3ba82a50414f0310eef68ce52e0a
{
    public static $prefixLengthsPsr4 = array (
        'G' => 
        array (
            'GAC\\Model\\' => 10,
            'GAC\\Core\\' => 9,
            'GAC\\Controleurs\\' => 16,
            'GAC\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'GAC\\Model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/model',
        ),
        'GAC\\Core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/core',
        ),
        'GAC\\Controleurs\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/controleurs',
        ),
        'GAC\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit227d3ba82a50414f0310eef68ce52e0a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit227d3ba82a50414f0310eef68ce52e0a::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit227d3ba82a50414f0310eef68ce52e0a::$classMap;

        }, null, ClassLoader::class);
    }
}
