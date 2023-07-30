<?php
class UserFriends
{
    private $id;
    private $user_id;
    private $friend_id;
    private $status;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getFriendId()
    {
        return $this->friend_id;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function setFriendId($friend_id)
    {
        $this->friend_id = $friend_id;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }
}
