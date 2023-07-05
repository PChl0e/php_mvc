<?php
require_once __DIR__ . '/../vendor/autoload.php';

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
use App\Model\ClasseModel;
use App\Model\GymModel;
use App\Model\Membership;
use App\Model\Member;
use App\Model\MemberModel;
use App\Model\MembershipModel;
use App\View\FormView;
use App\ViewModel\FormViewModel;

$dotenv = new Dotenv();
$dotenv->loadEnv(__DIR__ . '/../.env');

// DB
[
    'DB_HOST' => $host,
    'DB_PORT' => $port,
    'DB_NAME' => $dbname,
    'DB_CHARSET' => $charset,
    'DB_USER' => $user,
    'DB_PASSWORD' => $password
] = $_ENV;
//parse_ini_file(DIR . '/../conf/db.ini');
$dsn = "mysql:dbname=$dbname;host=$host;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo sprintf('Erreur lors de la connexion à la base de donnée : ', $e->getMessage());
    exit;
}

//Twig 
$loader = new FilesystemLoader(__DIR__ . '/../templates/');
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

try {
    $router->execute($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} catch (RouteNotFoundException $ex) {
    http_response_code(404);
    echo "Page not found";
}


$gymViewModel = new GymViewModel($pdo);

/**Sauvegarde de la salle de sport */
/*
$gym = new Gym("Fitness Center", "123 Main Street", "9:00 AM - 9:00 PM");
$idGym = $gymViewModel->registerGym($gym);
*/

/**Sauvegarde des cours */
/*
$class1 = new Classe("Yoga Class", "Alice Johnson", "Monday, Wednesday, Friday 6:00 PM");
$class2 = new Classe("Spin Class", "Bob Thompson", "Tuesday, Thursday 7:00 AM");
$gymViewModel->registerClass($class1, $idGym);
$gymViewModel->registerClass($class2, $idGym);
*/

/**Affichage et traitement du formulaire */
$formViewModel = new FormViewModel([]);
$formView = new FormView();

$formView->renderForm();
$values = $formViewModel->processForm();

/**Ajout d'un membre */
if (!empty($values)) {
    $membershipNew = new Membership(true, $values['subscription'] . "$/month");
    $idMembership = $gymViewModel->registerMembership($membershipNew, 1);

    $memberNew = new Member($values['name'], $values['email'], $values['age']);
    $gymViewModel->registerMember($memberNew, $idMembership);
}

/**Affichage des données */
$gymView = new GymView($gymViewModel);
$gymView->displayGymInfo();
$gymView->displayMembers();
$gymView->displayClasses();
