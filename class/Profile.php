<?php
class Profile
{
    private $user_id;
    private $photo;
    private $bio;
    private $location;

    // Getters
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function getBio()
    {
        return $this->bio;
    }

    public function getLocation()
    {
        return $this->location;
    }

    // Setters
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function setBio($bio)
    {
        $this->bio = $bio;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }
}
