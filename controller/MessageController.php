<?php
class MessageController
{
    private $messageModel;

    public function __construct(MessageModel $messageModel)
    {
        $this->messageModel = $messageModel;
    }

    public function getMessage($id)
    {
        $message = $this->messageModel->getMessageById($id);
        if ($message) {
            // Générer une vue avec les informations du message...
        } else {
            // Gérer le cas où le message n'existe pas...
        }
    }

    // D'autres méthodes pour gérer les requêtes liées au message...
}
