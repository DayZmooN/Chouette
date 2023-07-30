<?php
class User
{
    private $id;
    private $pseudo;
    private $email;
    private $mot_de_passe;
    private $is_connected;

    // Getters
    public function getId()
    {
        return $this->id;
    }

    public function getPseudo()
    {
        return $this->pseudo;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getMotDePasse()
    {
        return $this->mot_de_passe;
    }

    public function getIsConnected()
    {
        return $this->is_connected;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setMotDePasse($mot_de_passe)
    {
        $this->mot_de_passe = $mot_de_passe;
    }

    public function setIsConnected($is_connected)
    {
        $this->is_connected = $is_connected;
    }
}
