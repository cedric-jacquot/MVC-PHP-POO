<?php

namespace App\Utils;

// On "importe" PDO
use PDO;
use PDOException;

class Database extends PDO
{
    // Instance unique de la classe
    private static $instance;

    /**
     * Constructeur de la classe
     * Initialise la connexion à la BDD
     */
    private function __construct()
    {
        // récupère la config
        $config = Config::getConfig();

        var_dump($config);

        // DSN de connexion
        $dsn = 'mysql:dbname=' . $config['DB_USERNAME'] . ';host=' . $config['DB_HOST'];

        // On appelle le constructeur de la classe PDO
        try {
            parent::__construct($dsn, $config['DB_USERNAME'], $config['DB_PASSWORD']);

            // attributs PDO, permet entre autres de choisir le mode de fetch
            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    /**
     * Instancie la classe Database une seule fois (singleton)
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
