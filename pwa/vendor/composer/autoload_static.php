<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit342af7f5f56368b477dc46c28b606068
{
    public static $prefixLengthsPsr4 = array (
        'e' => 
        array (
            'eminmuhammadi\\hidemyass\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'eminmuhammadi\\hidemyass\\' => 
        array (
            0 => __DIR__ . '/..' . '/eminmuhammadi/hidemyass/src',
        ),
    );

    public static $classMap = array (
        'eminmuhammadi\\HideMyAss\\HideMyAss' => __DIR__ . '/..' . '/eminmuhammadi/hidemyass/src/hidemyass.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit342af7f5f56368b477dc46c28b606068::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit342af7f5f56368b477dc46c28b606068::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit342af7f5f56368b477dc46c28b606068::$classMap;

        }, null, ClassLoader::class);
    }
}
