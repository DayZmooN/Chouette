<?php

class HomeController extends Controller
{
    public function home()
    {
        // Supposons que vous ayez un template Twig appelé 'homePage.twig' dans votre dossier de vues
        echo self::getRender('HomePage.html.twig', []);
    }
}
