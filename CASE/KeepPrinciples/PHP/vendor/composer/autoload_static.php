<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit94475c23e838f681f4a4507e674c50fb
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit94475c23e838f681f4a4507e674c50fb::$fallbackDirsPsr4;

        }, null, ClassLoader::class);
    }
}
