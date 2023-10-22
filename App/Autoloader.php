<?php

namespace App;

/**
 * Classe permettant de charger automatiquement les requires
 */
class Autoloader
{
    /**
     * Lance la méthode php native spl_autoload_register
     */
    static function register()
    {
        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    /**
     * Créé le chemin vers la classe et appelle le fichier de classe
     */
    static function autoload($class)
    {
        // On récupère dans $class la totalité du namespace de la classe concernée (App\Client\Compte)
        // On retire App\ (Client\Compte)
        $class = str_replace(__NAMESPACE__ . '\\', '', $class);

        // On remplace les \ par des /
        $class = str_replace('\\', '/', $class);

        // construit le chemin complet vers le fichier de la classe
        $file = __DIR__ . '/' . $class . '.php';
        // On vérifie si le fichier existe
        if (file_exists($file)) {
            require_once $file;
        } else {
            http_response_code(404);
            echo 'La classe ' . $file . 'n\'existe pas.';
            exit;
        }
    }
}
