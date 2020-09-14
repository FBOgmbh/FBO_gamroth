<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Filesystem extends BaseController
{
    public static function normalizePath($path)
    {
        return $path.(is_dir($path) && !preg_match('@/$@', $path) ? '/' : '');
    }

    public static function rscandir($dir, $sort = SCANDIR_SORT_ASCENDING)
    {
        $results = array();

        if (!is_dir($dir)) {
            return $results;
        }

        $dir = self::normalizePath($dir);

        $objects = scandir($dir, $sort);

        foreach ($objects as $object) {
            if ($object != '.' && $object != '..') {
                if (is_dir($dir.$object)) {
                    $results = array_merge($results, self::rscandir($dir.$object, $sort));
                } else {
                    array_push($results, $dir.$object);
                }
            }
        }

        array_push($results, $dir);

        return $results;
    }

    public static function rcopy($source, $dest, $destmode = null)
    {
        $files = self::rscandir($source);

        if (empty($files)) {
            return;
        }

        if (!file_exists($dest)) {
            mkdir($dest, is_int($destmode) ? $destmode : fileperms($source), true);
        }

        $source = self::normalizePath(realpath($source));
        $dest = self::normalizePath(realpath($dest));

        foreach ($files as $file) {
            $file_dest = str_replace($source, $dest, $file);

            if (is_dir($file)) {
                if (!file_exists($file_dest)) {
                    mkdir($file_dest, is_int($destmode) ? $destmode : fileperms($file), true);
                }
            } else {
                copy($file, $file_dest);
            }
        }
    }
}
