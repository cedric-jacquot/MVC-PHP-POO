<?php

namespace App\Utils;

use App\Utils\Debug;

/**
 * Class utilitaire pour récupérer la config de l'App
 */
class Config
{
    /**
     * Parse le fichier config.ini
     * @return array 
     */
    public static function getConfig(): array
    {
        return parse_ini_file(__DIR__ . '/../config.ini');
    }

    /**
     * Dev mode
     * @return `true` si oui
     */
    public static function isDevMode(): bool
    {
        $config = self::getConfig();
        return $config['DEV'];
    }

    /**
     * Affiche les erreurs PHP
     */
    public static function showErrors()
    {
        if (self::isDevMode()) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
}
