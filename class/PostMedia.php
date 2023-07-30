<?php

class PostMedia
{
    private $id;
    private $post_id;
    private $media;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getPostId()
    {
        return $this->post_id;
    }

    public function getMedia()
    {
        return $this->media;
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

    public function setMedia($media)
    {
        $this->media = $media;
    }
}
