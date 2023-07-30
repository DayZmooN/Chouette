<?php
class ProfileController
{
    private $profileModel;

    public function __construct(ProfileModel $profileModel)
    {
        $this->profileModel = $profileModel;
    }

    public function getProfile($userId)
    {
        $profile = $this->profileModel->getProfileByUserId($userId);
        if ($profile) {
            // Générer une vue avec les informations du profile...
        } else {
            // Gérer le cas où le profile n'existe pas...
        }
    }

    // D'autres méthodes pour gérer les requêtes liées au profile...
}
