<?php
class PostController
{
    private $postModel;

    public function __construct(PostModel $postModel)
    {
        $this->postModel = $postModel;
    }

    public function getPost($id)
    {
        $post = $this->postModel->getPostById($id);
        if ($post) {
            // Générer une vue avec les informations du post...
        } else {
            // Gérer le cas où le post n'existe pas...
        }
    }

    // D'autres méthodes pour gérer les requêtes liées au post...
}
