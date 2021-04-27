<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8a1278ce5f630080527b63be69640e31
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Facebook\\' => 9,
        ),
        'E' => 
        array (
            'EspressoDev\\InstagramBasicDisplay\\' => 34,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Facebook\\' => 
        array (
            0 => __DIR__ . '/..' . '/facebook/graph-sdk/src/Facebook',
        ),
        'EspressoDev\\InstagramBasicDisplay\\' => 
        array (
            0 => __DIR__ . '/..' . '/espresso-dev/instagram-basic-display-php/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8a1278ce5f630080527b63be69640e31::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8a1278ce5f630080527b63be69640e31::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8a1278ce5f630080527b63be69640e31::$classMap;

        }, null, ClassLoader::class);
    }
}
