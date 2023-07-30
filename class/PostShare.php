<?php
class PostShare
{
    private $id;
    private $post_id;
    private $user_id;
    private $share_date;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function getShareDate()
    {
        return $this->share_date;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPostId($post_id)
    {
        $this->post_id = $post_id;
    }

    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setShareDate($share_date)
    {
        $this->share_date = $share_date;
    }
}
