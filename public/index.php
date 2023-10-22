<?php

use App\Core\Main;
use App\Autoloader;
use App\Utils\Debug;
use App\Utils\Config;

// On définit une constante contenant le dossier racine du projet
const ROOT = __DIR__;

// On importe l'autoloader
require_once '../App/Autoloader.php';
Autoloader::register();

// affiche les erreurs php en dev
Config::showErrors();

Debug::dump(Config::getConfig());

// On instancie Main (notre routeur)
$app = new Main();

// On démarre l'application
$app->start();
