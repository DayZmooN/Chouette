<?php
class MessageController extends Controller
{

    // c'est valider
    public function messenger()
    {
        $MessageModel = new MessageModel;
        $postMessage = $MessageModel->getUsersWithMessages();

        // This method will render the 'messenger.html.twig' view
        echo self::getRender('messenger.html.twig', ['postMessage' => $postMessage]);
    }


    // public function showConversation($receiverId)
    // {
    //     $messageModel = new MessageModel;
    //     $userModel = new UserModel;
    //     $senderId = $_SESSION['id'];
    //     $messages = $messageModel->getMessagesBetweenUsers($senderId, $receiverId);
    //     $user = $userModel->findBypseudo($senderId);

    //     echo self::getRender('messenger.html.twig', ['user' => $user, 'messages' => $messages]);
    public function showConversation($receiverId)
    {
        $messageModel = new MessageModel;
        $userModel = new UserModel;
        $senderId = $_SESSION['id'];
        $user = $userModel->findBypseudo($senderId);
        $messages = $messageModel->getMessagesBetweenUsers($senderId, $receiverId);

        header('Content-Type: application/json');
        echo json_encode(['user' => $user, 'messages' => $messages]);
    }








    // public function getMessages($recipientId)
    // {
    //     $MessageModel = new MessageModel;

    //     // Assumons que vous ayez $_SESSION['id'] comme l'ID de l'utilisateur connecté
    //     $userId = $_SESSION['id'];

    //     // Obtenez les messages entre l'utilisateur actuellement connecté et l'utilisateur sélectionné
    //     $messages = $MessageModel->getMessagesBetweenUsers($userId, $recipientId);

    //     // Retournez les messages au format JSON
    //     header('Content-Type: application/json');
    //     echo json_encode($messages);
    // }






    //

    // public function showConversation($receiverId)
    // {
    //     $messageModel = new MessageModel;
    //     $userModel = new UserModel;
    //     $senderId = $_SESSION['id'];
    //     $messages = $messageModel->getConversation($senderId, $receiverId);
    //     $user = $userModel->getUserById($senderId);

    //     echo self::getRender('conversation.html.twig', ['user' => $user, 'messages' => $messages]);
    // }









    // public function getMessages($recipientId)
    // {
    //     // Récupérez l'ID de l'utilisateur connecté à partir de la session
    //     $senderId = $_SESSION['id'];

    //     // Récupérez tous les messages entre l'utilisateur connecté et l'utilisateur destinataire
    //     $messages = $this->messageModel->getMessagesBetweenUsers($senderId, $recipientId);

    //     // Affichez les messages (cette méthode dépend de la façon dont vous avez configuré votre moteur de template)
    //     echo self::getRender('messages.html.twig', ['messages' => $messages]);
    // }

    // public function sendMessage($recipientId)
    // {
    //     // Récupérez l'ID de l'utilisateur connecté à partir de la session
    //     $senderId = $_SESSION['id'];

    //     // Récupérez le contenu du message à partir de la requête POST
    //     $messageContent = $_POST['message'];

    //     // Créez un nouveau message et envoyez-le
    //     $this->messageModel->saveMessage($senderId, $recipientId, $messageContent);

    //     // Redirigez l'utilisateur vers la page de la conversation
    //     global $router;
    //     header('Location: ' . $router->generate('get_messages', ['recipientId' => $recipientId]));
    //     if (!isset($_SESSION['id'])) {
    //         // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    //         header('Location: ' . $router->generate('login'));
    //         exit;
    //     }
    // }


    // public function showConversations($otherUserId)
    // {
    //     // Assurez-vous que l'utilisateur est connecté
    //     if (!isset($_SESSION['id'])) {
    //         // L'utilisateur n'est pas connecté, redirigez-le vers la page de connexion
    //         global $router;
    //         header('Location: ' . $router->generate('login'));
    //         exit;
    //     }

    //     $userId = $_SESSION['id'];
    //     // Récupérez les conversations entre l'utilisateur connecté et l'autre utilisateur
    //     $correspondents = $this->messageModel->getMessagesBetweenUsers($userId, $otherUserId);

    //     // Passez la liste des correspondants à votre vue
    //     echo self::getRender('messenger.html.twig', ['correspondents' => $correspondents, 'recipientId' => $otherUserId]);
    // }
}
