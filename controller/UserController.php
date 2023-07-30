<?php
class UserController extends Controller
{
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getUser($id)
    {
        $user = $this->userModel->getUserById($id);
        if ($user) {
            // Générer une vue avec les informations de l'utilisateur...
        } else {
            // Gérer le cas où l'utilisateur n'existe pas...
        }
    }


    public function signin()
    {
        echo self::getRender('signin.html.twig', []);
    }


    // D'autres méthodes pour gérer les requêtes liées à l'utilisateur...
}
