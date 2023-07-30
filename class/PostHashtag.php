<?php
class PostHashtags
{
    private $id;
    private $post_id;
    private $hashtag_id;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function getHashtagId()
    {
        return $this->hashtag_id;
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

    public function setHashtagId($hashtag_id)
    {
        $this->hashtag_id = $hashtag_id;
    }
}
