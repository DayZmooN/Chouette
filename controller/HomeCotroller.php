<?php

class HomeController extends Controller
{
    public function home()
    {
        $postModel = new PostModel();

        $messageModel = new MessageModel();
        $userModel = new UserModel();
        $userAll = $userModel->getAllUsers();
        // var_dump($userAll);

        // Récupérer tous les messages avec les utilisateurs correspondants
        // $usersWithMessages = $messageModel->getUsersWithMessages();

        // Récupérer tous les posts
        $posts = $postModel->getAllPosts();

        // Afficher la vue HomePage.html.twig en passant les variables $posts et $usersWithMessages
        echo self::getRender('HomePage.html.twig', ['posts' => $posts, 'userAll' => $userAll]);
    }



    // public function messenger()
    // {
    //     $MessageModel = new MessageModel;
    //     $postMessage = $MessageModel->getUsersWithMessages();

    //     // This method will render the 'messenger.html.twig' view
    //     echo self::getRender('messenger.html.twig', ['postMessage' => $postMessage]);
    // }
}
