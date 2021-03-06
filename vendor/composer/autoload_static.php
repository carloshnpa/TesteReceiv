<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3719f837be05fbada61445d8ea36c770
{
    public static $files = array (
        'a8c5e30695d201f4d3ae61f2c2ac15f4' => __DIR__ . '/../..' . '/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3719f837be05fbada61445d8ea36c770::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3719f837be05fbada61445d8ea36c770::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
