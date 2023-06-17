<?php
require_once __DIR__ . '/../vendor/autoload.php';

// Initialisation de certaines choses
use App\Controller\ContactController;
use App\Controller\IndexController;
use App\Routing\RouteNotFoundException;
use App\Routing\Router;
use Symfony\Component\Dotenv\Dotenv;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

use App\Model\Gym;
use App\ViewModel\GymViewModel;
use App\View\GymView;
use App\Controller\GymController;
use App\Model\Classe;
use App\Model\Membership;
use App\Model\Member;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

// DB
/*
    $dsn = 'mysql:dbname=su_2023_php_mvc;host=host.docker.internal;charset=utf8mb4';
    $user = 'root';
    $password = '';*/
/*[
    'DB_HOST' => $host,
    'DB_PORT' => $port,
    'DB_NAME' => $dbname,
    'DB_CHARSET' => $charset,
    'DB_USER' => $user,
    'DB_PASSWORD' => $password
] = $_ENV;
//parse_ini_file(DIR . '/../conf/db.ini');
$dsn = "mysql:dbname = $dbname;host=$host;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $password);
    var_dump($pdo);
} catch (PDOException $e) {
    echo sprintf('Erreur lors de la connexion à la base de donnée : ', $e->getMessage());
    exit;
}

//Twig 
$loader = new FilesystemLoader(__DIR__.'/../templates/');
$twig = new Environment($loader, [
    'debug' => $_ENV['APP_ENV'] == 'dev',
    'cache' => __DIR__ . '/../var/twig/'
]);

// Appeler un routeur pour lui transférer la requête

$router = new Router($twig);
$router->addRoute(
    'homepage',
    '/',
    'GET',
    IndexController::class,
    'home'
);
$router->addRoute(
    'contact_page',
    '/contact',
    'GET',
    ContactController::class,
    'contact'
);

try {
    $router->execute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (RouteNotFoundException $ex) {
    http_response_code(404);
    echo "Page not found";
}

var_dump($router);
var_dump($_SERVER['REQUEST_URI']);
*/

$gymModel = new Gym("Fitness Center", "123 Main Street", "9:00 AM - 9:00 PM");
$gymViewModel = new GymViewModel($gymModel);
$gymView = new GymView($gymViewModel);
$gymController = new GymController($gymViewModel);

$membership1 = new Membership(true, "35$/month");
$member1 = new Member("John Doe", "jdoe@gmailcom", 34, $membership1);
$membership2 = new Membership(false, "25$/month");
$member2 = new Member("Jane Smith", "jdoe@gmailcom", 19, $membership2);

$gymController->addMember($member1);
$gymController->addMember($member2);

$class1 = new Classe("Yoga Class", "Alice Johnson", "Monday, Wednesday, Friday 6:00 PM");
$class2 = new Classe("Spin Class", "Bob Thompson", "Tuesday, Thursday 7:00 AM");

$gymController->addClass($class1);
$gymController->addClass($class2);

$gymView->displayGymInfo();
$gymView->displayMembers();
$gymView->displayClasses();
