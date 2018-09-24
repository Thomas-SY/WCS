<?php


class Personne
{
    // Attributs privés

    // Déclaration des propriétés
    private $nom = 'Nom';
    private $prenom = 'Prénom';
    private $adresse = 'Adresse';
    private $dateDeNaissance = '01/02/2018';

    // Méthodes Magic

    // Déclaration du Constructeur
    public function __construct($nom, $prenom, $adresse, $dateDeNaissance)
    {
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->adresse = $adresse;
        $this->dateDeNaissance = $dateDeNaissance;
    }

    // Déclaration de la méthode Infos
    public function __toString()
    {
        return 'Nom:' . " " . $this->nom . '<br/>' . 'Prénom:' . " " . $this->prenom .'<br/>' . 'Adresse:' . " " . $this->adresse. '<br/>' . 'Date de naissance:' . " " . $this->dateDeNaissance. '<br/>';
    }

    // Méthodes perso

    // Déclaration de la méthode Age
    public function calculAge()
    {
        $am = explode('/', $this->dateDeNaissance);
        $an = explode('/', date('d/m/Y'));

        if(($am[1] < $an[1]) || (($am[1] == $an[1]) && ($am[0] <= $an[0])))
            return $an[2] - $am[2];

        return $an[2] - $am[2] - 1;
    }

    // Getters / Setters

    // Déclaration de la méthode d'affichage de l'adresse
    public function getAdress()
    {
       return $this->adresse;
    }

    // Déclaration de la méthode de modification de l'adresse
    public function setAdress($adresse)
    {
        $this->adresse = $adresse;
    }

}

$moi = new Personne("SY", "Thomas", "La Madeleine", "02/06/1981");

echo $moi -> __toString();

$moi -> setAdress("Lille");

echo 'Adresse modifié: ' . $moi -> getAdress(). '<br/>';

echo 'Age: ' . $moi -> calculAge(). '<br/>';




