<?php
class Message
{
    private $id;
    private $senderId;
    private $receiverId;
    private $content;

    // Getter et setter pour 'id'
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    // Getter et setter pour 'senderId'
    public function getSenderId()
    {
        return $this->senderId;
    }

    public function setSenderId($senderId)
    {
        $this->senderId = $senderId;
    }

    // Getter et setter pour 'receiverId'
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;
    }

    // Getter et setter pour 'content'
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }


    // Et ainsi de suite pour les autres attributs...
}
