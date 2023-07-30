<?php

class Notifications
{
    private $id;
    private $user_id;
    private $content;
    private $read_status;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getReadStatus()
    {
        return $this->read_status;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setReadStatus($read_status)
    {
        $this->read_status = $read_status;
    }
}
