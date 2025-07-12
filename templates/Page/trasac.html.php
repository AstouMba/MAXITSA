<?php

// Classe pour représenter une transaction
class Transaction {
    private $id;
    private $type;
    private $description;
    private $date;
    private $amount;
    private $color;
    
    public function __construct($id, $type, $description, $date, $amount, $color) {
        $this->id = $id;
        $this->type = $type;
        $this->description = $description;
        $this->date = $date;
        $this->amount = $amount;
        $this->color = $color;
    }
    
    // Getters
    public function getId() { return $this->id; }
    public function getType() { return $this->type; }
    public function getDescription() { return $this->description; }
    public function getDate() { return $this->date; }
    public function getAmount() { return $this->amount; }
    public function getColor() { return $this->color; }
    
    // Méthode pour obtenir l'icône SVG selon le type
    public function getIconPath() {
        switch($this->type) {
            case 'depot':
                return 'M7 14l5-5 5 5z';
            case 'retrait':
                return 'M7 10l5 5 5-5z';
            default:
                return 'M7 14l5-5 5 5z';
        }
    }
    
    // Méthode pour générer le HTML d'une transaction
    public function toHTML() {
        return '
            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-' . $this->color . '-100 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-' . $this->color . '-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="' . $this->getIconPath() . '"/>
                        </svg>
                    </div>
                    <div>
                        <p class="font-medium text-gray-800">' . htmlspecialchars($this->description) . '</p>
                        <p class="text-sm text-gray-500">' . htmlspecialchars($this->date) . '</p>
                    </div>
                </div>
                <div class="text-right">
                    <p class="font-semibold text-' . $this->color . '-600">' . htmlspecialchars($this->amount) . '</p>
                </div>
            </div>
        ';
    }
}

// Classe pour gérer un compte bancaire
class BankAccount {
    private $accountNumber;
    private $accountHolder;
    private $balance;
    private $transactions;
    
    public function __construct($accountNumber, $accountHolder, $balance) {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $balance;
        $this->transactions = [];
    }
    
    // Getters
    public function getAccountNumber() { return $this->accountNumber; }
    public function getAccountHolder() { return $this->accountHolder; }
    public function getBalance() { return $this->balance; }
    public function getTransactions() { return $this->transactions; }
    
    // Ajouter une transaction
    public function addTransaction(Transaction $transaction) {
        $this->transactions[] = $transaction;
    }
    
    // Obtenir les transactions récentes (limité)
    public function getRecentTransactions($limit = 10) {
        return array_slice($this->transactions, 0, $limit);
    }
    
    // Formater le solde
    public function getFormattedBalance() {
        return number_format($this->balance, 0, ',', ' ') . ' FCFA';
    }
}

// Classe pour gérer l'affichage de l'interface
class BankingInterface {
    private $account;
    
    public function __construct(BankAccount $account) {
        $this->account = $account;
    }
    
    // Générer le HTML de la carte de compte principal
    public function generateAccountCard() {
        return '
            <div class="bg-orange-500 text-white rounded-2xl p-8 mb-8 relative">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">Maxit</h1>
                        <p class="text-orange-100 text-lg mb-4">Compte principale</p>
                        <p class="text-orange-100 text-lg">' . $this->account->getAccountNumber() . '</p>
                    </div>
                    
                    <div class="text-center">
                        <p class="text-2xl font-bold mb-1">solde: ' . $this->account->getFormattedBalance() . '</p>
                    </div>
                    
                    <div class="flex flex-col items-end space-y-4">
                        <!-- QR Code -->
                        <div class="w-20 h-20 bg-white rounded-lg flex items-center justify-center">
                            <div class="w-16 h-16 bg-black rounded grid grid-cols-8 gap-px">
                                ' . $this->generateQRCode() . '
                            </div>
                        </div>
                        
                        <!-- Logo MAX IT -->
                        <div class="bg-white text-orange-500 rounded-xl px-4 py-2 text-center font-bold">
                            <div class="text-sm">MAX IT</div>
                            <div class="text-xs">SA</div>
                        </div>
                    </div>
                </div>
            </div>
        ';
    }
    
    // Générer un QR Code simple (simulé)
    private function generateQRCode() {
        $pattern = '';
        for ($i = 0; $i < 64; $i++) {
            $color = ($i + $i % 8) % 2 === 0 ? 'bg-white' : 'bg-black';
            $pattern .= '<div class="' . $color . '"></div>';
        }
        return $pattern;
    }
    
    // Générer la liste des transactions récentes
    public function generateRecentTransactions($limit = 10) {
        $transactions = $this->account->getRecentTransactions($limit);
        $html = '';
        
        foreach ($transactions as $transaction) {
            $html .= $transaction->toHTML();
        }
        
        return $html;
    }
    
    // Générer toutes les transactions pour le modal
    public function generateAllTransactionsJSON() {
        $transactions = $this->account->getTransactions();
        $data = [];
        
        foreach ($transactions as $transaction) {
            $data[] = [
                'id' => $transaction->getId(),
                'type' => $transaction->getType(),
                'description' => $transaction->getDescription(),
                'date' => $transaction->getDate(),
                'amount' => $transaction->getAmount(),
                'color' => $transaction->getColor()
            ];
        }
        
        return json_encode($data);
    }
    
    // Générer l'interface complète
    public function generateInterface() {
        return '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Maxit - Interface Bancaire</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap");
        body {
            font-family: "Inter", sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Sidebar fixée -->
    <div class="w-64 bg-orange-500 text-white p-6 flex flex-col justify-between h-screen fixed">
        <!-- Logo -->
        <div>
            <div class="bg-white text-orange-500 rounded-xl px-4 py-2 text-center font-bold mb-8">
                <div class="text-sm">MAX IT</div>
                <div class="text-xs">SA</div>
            </div>

            <!-- Navigation -->
            <nav class="space-y-6">
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-medium">Accueil</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-medium">Transactions</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 3H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.11 0 2-.9 2-2V5c0-1.1-.89-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-medium">Mes comptes</span>
                </div>
            </nav>
        </div>

        <!-- Déconnexion -->
        <div class="mt-10">
            <div class="flex items-center space-x-3">
                <div class="w-6 h-6">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.59L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                    </svg>
                </div>
                <span class="text-lg font-medium">Déconnexion</span>
            </div>
        </div>
    </div>

    <!-- Contenu principal -->
    <div class="ml-64 min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-white shadow-sm px-6 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center bg-gray-100 rounded-lg px-4 py-2 w-96">
                    <svg class="w-5 h-5 text-gray-400 mr-3" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                    </svg>
                    <input type="text" placeholder="Recherche" class="bg-transparent outline-none text-gray-700 w-full">
                </div>
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                    <div class="bg-orange-500 text-white px-4 py-2 rounded-lg font-medium">' . htmlspecialchars($this->account->getAccountHolder()) . '</div>
                    <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                        <svg class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </header>

        <!-- Contenu principal -->
        <main class="flex-1 p-6 overflow-y-auto">
            <!-- Carte compte principal -->
            ' . $this->generateAccountCard() . '
            
            <!-- Boutons d\'action -->
            <div class="flex space-x-4 mb-8">
                <button class="bg-white border-2 border-orange-500 text-orange-500 px-6 py-3 rounded-full font-medium hover:bg-orange-50 transition-colors flex items-center space-x-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                    </svg>
                    <span>créer un compte secondaire</span>
                </button>
                
                <button class="bg-white border-2 border-orange-500 text-orange-500 px-6 py-3 rounded-full font-medium hover:bg-orange-50 transition-colors flex items-center space-x-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <span>changer de compte</span>
                </button>
                
                <button class="bg-orange-500 text-white px-6 py-3 rounded-full font-medium hover:bg-orange-600 transition-colors flex items-center space-x-2">
                    <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M7 4V2C7 1.45 7.45 1 8 1S9 1.55 9 2V4H15V2C15 1.45 15.45 1 16 1S17 1.55 17 2V4H18C19.1 4 20 4.9 20 6V20C20 21.1 19.1 22 18 22H6C4.9 22 4 21.1 4 20V6C4 4.9 4.9 4 6 4H7ZM18 8H6V20H18V8Z"/>
                    </svg>
                    <span>effectuer une transaction</span>
                </button>
            </div>
            
            <!-- Section transactions récentes -->
            <div class="bg-white rounded-2xl p-6 shadow-sm">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-semibold text-gray-800">Transactions récentes</h2>
                    <button id="voirPlusBtn" class="text-orange-500 hover:text-orange-600 font-medium text-sm">
                        Voir plus
                    </button>
                </div>
                
                <div id="transactionsList" class="space-y-4">
                    ' . $this->generateRecentTransactions() . '
                </div>
            </div>
        </main>
    </div>

    <!-- Modal pour toutes les transactions -->
    <div id="transactionsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div class="bg-white rounded-2xl p-6 w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Toutes les transactions</h2>
                    <button id="closeModal" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                        </svg>
                    </button>
                </div>
                
                <div class="space-y-4" id="allTransactionsList">
                    <!-- Toutes les transactions seront affichées ici -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Données des transactions depuis PHP
        const allTransactions = ' . $this->generateAllTransactionsJSON() . ';
        
        // Fonction pour créer une transaction HTML
        function createTransactionHTML(transaction) {
            const iconPath = transaction.type === "depot" ? "M7 14l5-5 5 5z" : 
                           transaction.type === "retrait" ? "M7 10l5 5 5-5z" : "M7 14l5-5 5 5z";
            
            return `
                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                    <div class="flex items-center space-x-4">
                        <div class="w-10 h-10 bg-${transaction.color}-100 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-${transaction.color}-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="${iconPath}"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-medium text-gray-800">${transaction.description}</p>
                            <p class="text-sm text-gray-500">${transaction.date}</p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="font-semibold text-${transaction.color}-600">${transaction.amount}</p>
                    </div>
                </div>
            `;
        }
        
        // Gestion du modal
        const modal = document.getElementById("transactionsModal");
        const voirPlusBtn = document.getElementById("voirPlusBtn");
        const closeModal = document.getElementById("closeModal");
        const allTransactionsList = document.getElementById("allTransactionsList");
        
        voirPlusBtn.addEventListener("click", () => {
            // Remplir le modal avec toutes les transactions
            allTransactionsList.innerHTML = allTransactions.map(createTransactionHTML).join("");
            modal.classList.remove("hidden");
        });
        
        closeModal.addEventListener("click", () => {
            modal.classList.add("hidden");
        });
        
        // Fermer le modal en cliquant en dehors
        modal.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.classList.add("hidden");
            }
        });
    </script>
</body>
</html>
        ';
    }
}

// Classe pour la gestion des données (simulation d'une base de données)
class TransactionManager {
    public static function getSampleTransactions() {
        return [
            new Transaction(1, 'depot', 'Dépôt', '11 Juil 2025 - 14:30', '+25,000 FCFA', 'green'),
            new Transaction(2, 'paiement', 'Paiement - Boutique Orange', '10 Juil 2025 - 16:45', '-5,500 FCFA', 'blue'),
            new Transaction(3, 'retrait', 'Retrait DAB', '09 Juil 2025 - 12:15', '-15,000 FCFA', 'red'),
            new Transaction(4, 'depot', 'Virement reçu - Mamadou Fall', '08 Juil 2025 - 09:20', '+50,000 FCFA', 'green'),
            new Transaction(5, 'paiement', 'Facture SENELEC', '07 Juil 2025 - 14:00', '-18,750 FCFA', 'blue'),
            new Transaction(6, 'retrait', 'Retrait guichet', '06 Juil 2025 - 10:30', '-20,000 FCFA', 'red'),
            new Transaction(7, 'depot', 'Salaire - Entreprise ABC', '05 Juil 2025 - 08:00', '+150,000 FCFA', 'green'),
            new Transaction(8, 'paiement', 'Achat supermarché', '04 Juil 2025 - 18:20', '-12,500 FCFA', 'blue'),
            new Transaction(9, 'paiement', 'Transport - Rapide', '03 Juil 2025 - 07:45', '-2,000 FCFA', 'blue'),
            new Transaction(10, 'depot', 'Remboursement - Ami', '02 Juil 2025 - 15:10', '+10,000 FCFA', 'green'),
            new Transaction(11, 'paiement', 'Facture téléphone', '01 Juil 2025 - 11:30', '-8,500 FCFA', 'blue'),
            new Transaction(12, 'retrait', 'Retrait distributeur', '30 Juin 2025 - 19:00', '-25,000 FCFA', 'red'),
            new Transaction(13, 'depot', 'Virement - Famille', '29 Juin 2025 - 13:45', '+30,000 FCFA', 'green'),
            new Transaction(14, 'paiement', 'Restaurant - Chez Fatou', '28 Juin 2025 - 20:15', '-6,750 FCFA', 'blue'),
            new Transaction(15, 'paiement', 'Pharmacie du coin', '27 Juin 2025 - 16:30', '-4,200 FCFA', 'blue')
        ];
    }
}

// Utilisation du code
try {
    // Créer un compte
    $account = new BankAccount('77 199 28 43', 'Astou Mbow', 120500);
    
    // Ajouter les transactions
    $transactions = TransactionManager::getSampleTransactions();
    foreach ($transactions as $transaction) {
        $account->addTransaction($transaction);
    }
    
    // Créer l'interface
    $interface = new BankingInterface($account);
    
    // Afficher l'interface
    echo $interface->generateInterface();
    
} catch (Exception $e) {
    echo "Erreur : " . $e->getMessage();
}

?>