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

    // Getters
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDateDeNaissance() {
        return $this->dateDeNaissance;
    }

    public function getVilleDeResidence() {
        return $this->villeDeResidence;
    }

    public function getEmail() {
        return $this->email;
    }

    // Setters
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setDateDeNaissance($dateDeNaissance) {
        // Ici, vous pourriez ajouter une validation pour la date
        $this->dateDeNaissance = $dateDeNaissance;
    }

    public function setVilleDeResidence($villeDeResidence) {
        $this->villeDeResidence = $villeDeResidence;
    }

    public function setEmail($email) {
        // Vous pouvez ajouter une validation d'email ici
        $this->email = $email;
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
