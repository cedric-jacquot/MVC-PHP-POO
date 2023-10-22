<?php

namespace App\Utils;

use App\Utils\Config;

/**
 * Pour le debug de l'application
 */
class Debug
{
    /**
     * dump les données avec les balises <pre></pre>
     */
    public static function dump(mixed $data)
    {
        if (Config::isDevMode()) {
            echo '<pre>';
            var_dump($data);
            echo '</pre>';
        }
    }
}
