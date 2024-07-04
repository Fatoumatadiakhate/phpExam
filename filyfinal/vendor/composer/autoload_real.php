<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit227d3ba82a50414f0310eef68ce52e0a
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit227d3ba82a50414f0310eef68ce52e0a', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit227d3ba82a50414f0310eef68ce52e0a', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit227d3ba82a50414f0310eef68ce52e0a::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
