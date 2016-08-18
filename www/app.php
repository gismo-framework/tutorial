<?php
/**
 * Created by PhpStorm.
 * User: matthes
 * Date: 05.08.16
 * Time: 23:31
 */

namespace App;

use Gismo\Component\Config\ConfigLoader;

require __DIR__ . "/../vendor/autoload.php";
require __DIR__ . "/../../gismo/vendor/autoload.php";



ini_set("display_errors", 1);

ConfigLoader::FromFile("/etc/app.ini", ConfigLoader::PRODUCTION, $config = new AppConfig());
$request = \Gismo\Component\HttpFoundation\Request\RequestFactory::BuildFromEnv($config);

$app = new \Gismo\Tutorial\App\TutorialApp();
$app->run($request);