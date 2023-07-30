<?php
class Hashtags
{
    private $id;
    private $hashtag;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getHashtag()
    {
        return $this->hashtag;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setHashtag($hashtag)
    {
        $this->hashtag = $hashtag;
    }
}
