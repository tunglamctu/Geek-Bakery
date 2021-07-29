<?php

    defined("ROOT") ? : define("ROOT", dirname(dirname(__DIR__)));
    defined("DS") ?: define("DS", DIRECTORY_SEPARATOR);

    //App directory
    defined("APP") ?: define("APP", ROOT . DS . "App");
    defined("CONF") ?: define("CONF", APP . DS . "Configs");
    defined("CONT") ?: define("CONT", APP . DS . "Controllers");
    defined("CORE") ?: define("CORE", APP . DS . "Core");
    defined("MODEL") ?: define("MODEL", APP . DS . "Models");
    defined("VIEW") ?: define("VIEW", APP . DS . "Views");

    //Database
    $db = require_once CONF . DS . "Database.php";
    defined("SERVERNAME") ?: define("SERVERNAME", $db["servername"]);
    defined("USERNAME") ?: define("USERNAME", $db["username"]);
    defined("PASSWORD") ?: define("PASSWORD", $db["password"]);
    defined("DATABASENAME") ?: define("DATABASENAME", $db["databasename"]);
    
    //public directory
    defined("URL_PUBLIC") ?: define("URL_PUBLIC", "http://".$_SERVER["SERVER_NAME"].":81"."/public");
    defined("URL_CSS") ?: define("URL_CSS", URL_PUBLIC. "/css/");
    defined("URL_ICON") ?: define("URL_ICON", URL_PUBLIC. "/icon/");
    defined("URL_CAKE") ?: define("URL_CAKE", URL_PUBLIC. "/img/cakes/");
    defined("URL_CATEGORY") ?: define("URL_CATEGORY", URL_PUBLIC. "/img/categories/");

    require_once CORE.DS."App.php";
    require_once CORE.DS."Controller.php";
    require_once CORE.DS."Database.php";
?>