<?php

namespace Owip;

class Setup
{
    const OWIP_NAMESPACE = "Owip";

    public static function load($autoload, $basedir)
    {
        $src = scandir($basedir);

        foreach ($src as $k => $v) {
            if (!is_dir($basedir . DIRECTORY_SEPARATOR . $v) ||
                $v == "." || $v == ".." ||
                $v == self::OWIP_NAMESPACE)
                continue;
            // "My.Namespace.Sample" -> "My\Namespace\Sample\"
            $namespace = str_replace('.', '\\', $v) . '\\';
            $autoload->addPsr4($namespace, $basedir . DIRECTORY_SEPARATOR . $v);
        }
    }
}