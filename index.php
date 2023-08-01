<?php
// session_start();
// require_once __DIR__ . '/vendor/autoload.php';
// require_once './vendor/altorouter/altorouter/AltoRouter.php';
// $router = new AltoRouter();
// $router->setBasePath('/chouette');

// // Définir vos routes ici

// // HOMEPAGE
// $router->map('GET', '/', 'HomeController#home', 'home');

// // Route d'inscription
// $router->map('GET', '/inscription', 'InscriptionController#signup', 'inscription');
// $router->map('GET', '/signin', 'UserController#signin', 'signin');
// // Ajouter cette ligne à vos autres routes
// $router->map('POST', '/handleFormSubmission', 'UserController#handleFormSubmission', 'handleFormSubmission');


// $match = $router->match();
// var_dump($match);

// if (is_array($match)) {
//     list($controller, $action) = explode('#', $match['target']);

//     if ($controller === 'UserController') {
//         $pdo = Model::getDb();
//         $userModel = new UserModel($pdo);
//         $obj = new $controller($userModel);
//     } else {
//         $obj = new $controller();
//     }

//     if (is_callable(array($obj, $action))) {
//         call_user_func_array(array($obj, $action), $match['params']);
//     } else {
//         $errorController = new ErrorController();
//         $errorController->handle404();
//     }
// } else {
//     $errorController = new ErrorController();
//     $errorController->handle404();
// }


session_start();
require_once __DIR__ . '/vendor/autoload.php';
require_once './vendor/altorouter/altorouter/AltoRouter.php';
$router = new AltoRouter();
$router->setBasePath('/chouette');

// Définir vos routes ici

// HOMEPAGE
$router->map('GET', '/', 'HomeController#home', 'home');

// Route d'inscription
$router->map('POST', '/register', 'UserController#register', 'register');

// Route de connexion
$router->map('POST', '/signin', 'UserController#login', 'signin');

// Route de déconnexion
$router->map('GET', '/logout', 'UserController#logout', 'logout');

$match = $router->match();

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if (is_callable(array($obj, $action))) {
        call_user_func_array(array($obj, $action), $match['params']);
    } else {
        echo "Method $action not found in controller $controller";
    }
} else {
    echo "No route matched";
}
