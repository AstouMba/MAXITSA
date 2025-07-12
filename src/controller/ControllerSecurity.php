<?php

namespace App\Controller;

use App\Service\ConnexionService;
use App\Service\InscriptionService;
use App\Core\abstract\AbstractController;
use App\Core\Validator;
use App\Core\Session;

class ControllerSecurity extends AbstractController
{
    private ConnexionService $connexionService;
    private InscriptionService $inscriptionService;

    public function __construct()
    {
        $this->baseLayout = 'login';
        $this->connexionService = new ConnexionService();
        $this->inscriptionService = new InscriptionService();
    }

    /**
     * Page d'inscription (formulaire)
     */
    public function inscription()
    {
        $this->renderIndex('login/souscrib.html.php');
    }

    /**
     * Traitement du formulaire d'inscription
     */
 public function register()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $adresse = $_POST['adresse'] ?? '';
        $numeroTelephone = $_POST['telephone'];
        $password = $_POST['password'] ?? '';
        $numeroCNI = $_POST['cni'] ?? '';

        $solde = 0.00;
        $type = 'principal';
        $transaction = [];

        $photoRectoPath = "";
        $photoVersoPath = "";

       
        

        // Vérifie que les fichiers ont bien été envoyés
        if (
            isset($_FILES['photo_recto']) && $_FILES['photo_recto']['error'] === UPLOAD_ERR_OK &&
            isset($_FILES['photo_verso']) && $_FILES['photo_verso']['error'] === UPLOAD_ERR_OK
        ) {
            // Crée le dossier uploads s'il n'existe pas
            $uploadDir = __DIR__ . '/../../public/uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Stocke les fichiers avec noms uniques
            $photoRectoName = uniqid('recto_') . '_' . basename($_FILES['photo_recto']['name']);
            $photoVersoName = uniqid('verso_') . '_' . basename($_FILES['photo_verso']['name']);

            $photoRectoPath = 'uploads/' . $photoRectoName;
            $photoVersoPath = 'uploads/' . $photoVersoName;

            move_uploaded_file($_FILES['photo_recto']['tmp_name'], $uploadDir . $photoRectoName);
            move_uploaded_file($_FILES['photo_verso']['tmp_name'], $uploadDir . $photoVersoName);
        }
        

       
        // Vérifie que les chemins ont bien été générés
        if ($photoRectoPath && $photoVersoPath) {
            $result = $this->inscriptionService->Inscription(
                
                $nom,
                $prenom,
                $adresse,
                $numeroTelephone,
                $numeroCNI,
                $password,
                $photoRectoPath,
                $photoVersoPath
            );


            if ($result) {

               
                
                $this->renderIndex('login/login.html.php', ['success' => 'Inscription réussie, veuillez vous connecter.']);
                          

            } else {
              
                $this->renderIndex('login/souscrib.html.php', ['error' => 'Erreur lors de l\'inscription.']);
            }
                 
 
        } else {
            
            $this->renderIndex('login/souscrib.html.php', ['error' => 'Les fichiers Recto et Verso sont obligatoires.']);
        }
    } else {
        http_response_code(405);
        $this->renderIndex('login/souscrib.html.php', ['error' => 'Méthode non autorisée.']);
    }
}



    /**
     * Page de connexion
     */
    public function show()
    {
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $telephone = $_POST['telephone'] ?? '';
            $password = $_POST['password'] ?? '';

            Validator::isEmpty($telephone, 'telephone');
            Validator::isEmpty($password, 'password');

            if (Validator::isValid()) {
                $result = $this->connexionService->login($telephone, $password);

                if ($result !== null) {
                    $session = Session::getInstance();
                    $session->set('Client', $result);
                    header('Location: /accueil');
                    exit;
                } else {
                    Validator::addError('global', 'Téléphone ou mot de passe incorrect.');
                }
            }

            $errors = Validator::getError();
            $this->renderIndex('login/login.html.php', ['error' => $errors]);
        } else {
            $this->renderIndex('login/login.html.php');
        }
    }

    /**
     * Déconnexion
     */
    public function logout()
    {
        $session = Session::getInstance();
        $session->destroy();
        $this->renderIndex('login/login.html.php');
    }

    // Méthodes vides si nécessaires par héritage ou routes REST
    public function index() {}
    public function create() {}
    public function store() {}
    public function edit() {}
    public function delete() {}
}
