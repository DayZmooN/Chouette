<?php
class UserSettings
{
    private $id;
    private $user_id;
    private $language;
    private $is_private;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getLanguage()
    {
        return $this->language;
    }

    public function getIsPrivate()
    {
        return $this->is_private;
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

    public function setLanguage($language)
    {
        $this->language = $language;
    }

    public function setIsPrivate($is_private)
    {
        $this->is_private = $is_private;
    }
}
