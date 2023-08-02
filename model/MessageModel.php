<?php

class MessageModel extends Model
{
    // public function getMessagesBetweenUsers($userId1, $userId2)
    // {
    //     $db = $this->getDb();
    //     $sql = "SELECT * FROM messages WHERE (sender_id = :user_id1 AND recipient_id = :user_id2) OR (sender_id = :user_id2 AND recipient_id = :user_id1) ORDER BY created_at DESC";
    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(':user_id1', $userId1);
    //     $stmt->bindParam(':user_id2', $userId2);
    //     $stmt->execute();
    //     return $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }


    public function getMessagesBetweenUsers($userId, $recipientId)
    {
        $stmt = $this->getDb()->prepare("SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY sent_at ASC");
        $stmt->execute([$userId, $recipientId, $recipientId, $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }



    //

    // public function saveMessage($senderId, $recipientId, $messageContent)
    // {
    //     $db = $this->getDb();
    //     $sql = "INSERT INTO messages (sender_id, recipient_id, message) VALUES (:sender_id, :recipient_id, :message)";
    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(':sender_id', $senderId);
    //     $stmt->bindParam(':recipient_id', $recipientId);
    //     $stmt->bindParam(':message', $messageContent);
    //     $stmt->execute();
    // }

    // public function getConversation($loggedInUserId, $id)
    // {
    //     $db = $this->getDb();
    //     $sql = "SELECT * FROM messages WHERE (sender_id = :logged_in_user_id AND recipient_id = :id) OR (sender_id = :id AND recipient_id = :logged_in_user_id) ORDER BY created_at DESC";
    //     $stmt = $db->prepare($sql);
    //     $stmt->bindParam(':logged_in_user_id', $loggedInUserId);
    //     $stmt->bindParam(':id', $id);
    //     $stmt->execute();
    //     return $stmt->fetch();
    // }

    // public function getConversationByUserId($userId)
    // {
    //     $db = $this->getDb();

    //     $query = $db->prepare("SELECT * FROM messages WHERE sender_id = :userId OR recipient_id = :userId ORDER BY created_at ASC");
    //     $query->bindParam(':userId', $userId, PDO::PARAM_INT);
    //     $query->execute();

    //     return $query->fetchAll(PDO::FETCH_ASSOC);
    // }

    //  elle recuper tous le conversation qu'un utilisateur a eu 
    public function getUsersWithMessages()
    {
        $stmt = $this->getDb()->prepare("
            SELECT DISTINCT users.id, users.pseudo, messages.message, messages.sent_at
            FROM users 
            INNER JOIN messages ON users.id = messages.sender_id OR users.id = messages.receiver_id
            WHERE ((messages.sender_id = ? AND users.id != ?) OR (messages.receiver_id = ? AND users.id != ?));
        ");
        $stmt->execute([$_SESSION['id'], $_SESSION['id'], $_SESSION['id'], $_SESSION['id']]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
