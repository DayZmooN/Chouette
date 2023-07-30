<?php
class CommentController
{
    private $commentModel;

    public function __construct(CommentModel $commentModel)
    {
        $this->commentModel = $commentModel;
    }

    public function getComment($id)
    {
        $comment = $this->commentModel->getCommentById($id);
        if ($comment) {
            // Générer une vue avec les informations du commentaire...
        } else {
            // Gérer le cas où le commentaire n'existe pas...
        }
    }

    // D'autres méthodes pour gérer les requêtes liées au commentaire...
}
