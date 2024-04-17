<?php class Utilisateur {
    // Propriétés privées
    private $nom;
    private $prenom;
    private $dateDeNaissance;
    private $villeDeResidence;
    private $email;

    // Constructeur
    public function __construct($nom, $prenom, $dateDeNaissance, $villeDeResidence, $email) {
        $this->setNom($nom);
        $this->setPrenom($prenom);
        $this->setDateDeNaissance($dateDeNaissance);
        $this->setVilleDeResidence($villeDeResidence);
        $this->setEmail($email);
    }
    
    // Magic Getter

    public function __get($propriete){
        if(property_exists($this, $propriete)){
            return $this->$propriete;
        }
    }

    // Magic Setter

    public function __set($propriete, $valeur){
        if(property_exists($this, $propriete)){
            return $this->$propriete = $valeur;
        }
    }

    // Méthode pour afficher les informations de l'utilisateur
    public function afficherInformations() {
        echo "Nom: " . $this->getNom() . "\n";
        echo "Prénom: " . $this->getPrenom() . "\n";
        echo "Date de naissance: " . $this->getDateDeNaissance() . "\n";
        echo "Ville de résidence: " . $this->getVilleDeResidence() . "\n";
        echo "Email: " . $this->getEmail() . "\n";
    }
}

?>
