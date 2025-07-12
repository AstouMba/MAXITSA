<?php

// Fichier de démarrage de l'application MaxitSA
require_once __DIR__ . '/vendor/autoload.php';

// Chargement des variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Chargement des classes
require_once __DIR__ . '/app/config/helpers.php';
require_once __DIR__ . '/app/config/env.php';

use App\Core\App;

// Configuration de l'application
App::configure();

// Chargement des routes
require_once __DIR__ . '/routes/route.web.php';

// Exemple d'utilisation des dépendances comme vous l'avez demandé
try {
    // Récupération du Router
    $router = App::getDependency("router");
    echo "Router récupéré avec succès\n";
    
    // Récupération de la Database
    $database = App::getDependency("database");
    echo "Database récupérée avec succès\n";
    
    // Récupération de la Session
    $session = App::getDependency("session");
    echo "Session récupérée avec succès\n";
    
    // Ou utilisation des raccourcis
    $router = App::router();
    $database = App::database();
    $session = App::session();
    
    echo "Raccourcis fonctionnels\n";
    
} catch (Exception $e) {
    echo "Erreur lors de la récupération des dépendances: " . $e->getMessage() . "\n";
    exit(1);
}

// Exemple d'utilisation complète du système de connexion
function exempleConnexion() {
    // Simulation de données de connexion
    $donnees = [
        'email' => 'utilisateur@maxitsa.com',
        'password' => 'MotDePasse123!',
        'remember' => true
    ];
    
    // Validation des données
    $validator = App::validator($donnees);
    $resultat = $validator->validateLogin();
    
    if ($resultat['success']) {
        echo " Validation réussie pour: " . $resultat['data']['email'] . "\n";
        
        // Simulation d'une connexion réussie
        $utilisateur = [
            'id' => 1,
            'email' => $resultat['data']['email'],
            'name' => 'Utilisateur Test',
            'role' => 'user'
        ];
        
        // Démarrage de la session et connexion
        $session = App::session();
        $session->login($utilisateur);
        
        echo " Utilisateur connecté avec succès\n";
        echo "   - ID: " . $session->getUserId() . "\n";
        echo "   - Email: " . $session->getUser()['email'] . "\n";
        echo "   - Rôle: " . $session->getUser()['role'] . "\n";
        
        // Test du token CSRF
        $csrfToken = $session->getCsrfToken();
        echo " Token CSRF généré: " . substr($csrfToken, 0, 10) . "...\n";
        
        // Test de la vérification du token
        $tokenValide = $session->verifyCsrfToken($csrfToken);
        echo " Vérification token CSRF: " . ($tokenValide ? "VALIDE" : "INVALIDE") . "\n";
        
        // Test des messages flash
        $session->setFlash('success', 'Connexion réussie!');
        $session->setFlash('info', 'Bienvenue sur MaxitSA');
        
        $messagesSuccess = $session->getFlash('success');
        $messagesInfo = $session->getFlash('info');
        
        echo " Messages flash récupérés:\n";
        foreach ($messagesSuccess as $message) {
            echo "   - Success: $message\n";
        }
        foreach ($messagesInfo as $message) {
            echo "   - Info: $message\n";
        }
        
        // Test de la déconnexion
        echo " Déconnexion...\n";
        $session->logout();
        
        $estConnecte = $session->isLoggedIn();
        echo " État après déconnexion: " . ($estConnecte ? "CONNECTÉ" : "DÉCONNECTÉ") . "\n";
        
    } else {
        echo " Erreurs de validation:\n";
        foreach ($resultat['errors'] as $champ => $erreurs) {
            foreach ($erreurs as $erreur) {
                echo "   - $champ: $erreur\n";
            }
        }
    }
}

// Exemple de test de validation avec des données invalides
function exempleValidationInvalide() {
    echo "\n=== Test de validation avec données invalides ===\n";
    
    $donneesInvalides = [
        'email' => 'email-invalide',
        'password' => '123', // Trop court
    ];
    
    $validator = App::validator($donneesInvalides);
    $resultat = $validator->validateLogin();
    
    if (!$resultat['success']) {
        echo " Erreurs de validation détectées (attendu):\n";
        foreach ($resultat['errors'] as $champ => $erreurs) {
            foreach ($erreurs as $erreur) {
                echo "   - $champ: $erreur\n";
            }
        }
    }
}

// Exemple d'utilisation du middleware
function exempleMiddleware() {
    echo "\n=== Test du middleware d'authentification ===\n";
    
    $auth = new App\Core\Middlewares\Auth();
    
    // Test avec utilisateur non connecté
    echo "Test avec utilisateur non connecté:\n";
    $estConnecte = App\Core\Middlewares\Auth::check();
    echo "   - État: " . ($estConnecte ? "CONNECTÉ" : "NON CONNECTÉ") . "\n";
    
    // Simulation d'une connexion pour les tests suivants
    $session = App::session();
    $session->login([
        'id' => 1,
        'email' => 'test@maxitsa.com',
        'name' => 'Test User',
        'role' => 'admin'
    ]);
    
    echo "Après connexion:\n";
    $estConnecte = App\Core\Middlewares\Auth::check();
    echo "   - État: " . ($estConnecte ? "CONNECTÉ" : "NON CONNECTÉ") . "\n";
    
    $utilisateur = App\Core\Middlewares\Auth::user();
    echo "   - Utilisateur: " . ($utilisateur ? $utilisateur['name'] : "AUCUN") . "\n";
    
    $estAdmin = App\Core\Middlewares\Auth::hasRole('admin');
    echo "   - Est admin: " . ($estAdmin ? "OUI" : "NON") . "\n";
    
    $estUser = App\Core\Middlewares\Auth::hasRole('user');
    echo "   - Est user: " . ($estUser ? "OUI" : "NON") . "\n";
    
    // Nettoyage
    $session->logout();
}

// Exécution des exemples si le script est appelé directement
if (php_sapi_name() === 'cli') {
    echo "=== Démarrage des tests MaxitSA ===\n\n";
    
    exempleConnexion();
    exempleValidationInvalide();
    exempleMiddleware();
    
    echo "\n=== Tous les tests terminés ===\n";
} else {
    // Démarrage de l'application web
    App::run();
}