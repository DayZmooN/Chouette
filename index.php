<?php

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
//route pour recuperer tous les contacts avec on a echanger 
$router->map('GET|POST', '/messenger', 'MessageController#messenger', 'messenger');


$router->map('GET', '/get_messages/[i:receiverId]', 'MessageController#showConversation', 'get_messages/');


// last
$router->map('GET', '/last_messages', 'MessageController#lastMessage', 'last_messages');









$router->map('GET', '/messenger', 'MessengerController#messenger', 'messengerUser_id');

// $router->map('GET', '/messenger/', '', 'baseRental');
// $router->map('GET', '/article/[i:id_rental]', 'RentalController#getOne', '');

// Dans index.php
// Dans index.php


// Route de déconnexion
$router->map('GET', '/logout', 'UserController#logout', 'logout');

//messagerie priver 
// Récupérer tous les messages entre l'utilisateur connecté et un autre utilisateur
// $router->map('GET', '/messages/[i:recipientId]', 'MessageController#getMessages', 'get_messages');

// Envoyer un nouveau message à un autre utilisateur
$router->map('POST', '/messages/[i:recipientId]', 'MessageController#sendMessage', 'send_message');

$match = $router->match();

if (is_array($match)) {
    list($controller, $action) = explode('#', $match['target']);
    $obj = new $controller();

    if (is_callable(array($obj, $action))) {
        // Ajoutez cette ligne pour le débogage
        echo "Matched route: " . $match['target'];
        call_user_func_array(array($obj, $action), $match['params']);
    } else {
        echo "Method $action not found in controller $controller";
    }
} else {
    echo "No route matched";
}
