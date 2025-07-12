<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Maxit - Interface Bancaire</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    body {
      font-family: 'Inter', sans-serif;
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
          <div class="bg-orange-500 text-white px-4 py-2 rounded-lg font-medium">Astou Mbow</div>
          <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
            <svg class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
            </svg>
          </div>
        </div>
      </div>
    </header>

    <!-- Contenu principal (scrollable si besoin) -->
    <main class="flex-1 p-6 overflow-y-auto">
      <main class="flex-1 p-6">
                <!-- Carte compte principal -->
                <div class="bg-orange-500 text-white rounded-2xl p-8 mb-8 relative">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-4xl font-bold mb-2">Maxit</h1>
                            <p class="text-orange-100 text-lg mb-4">Compte principale</p>
                            <p class="text-orange-100 text-lg">77 199 28 43</p>
                        </div>
                        
                        <div class="text-center">
                            <p class="text-2xl font-bold mb-1">solde: 120500 fcfa</p>
                        </div>
                        
                        <div class="flex flex-col items-end space-y-4">
                            <!-- QR Code -->
                            <div class="w-20 h-20 bg-white rounded-lg flex items-center justify-center">
                                <div class="w-16 h-16 bg-black rounded grid grid-cols-8 gap-px">
                                    <div class="bg-white col-span-3 row-span-3"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
                                    <div class="bg-white"></div>
                                    <div class="bg-black"></div>
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
                
                <!-- Boutons d'action -->
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
                        <!-- Transaction 1 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Dépôt</p>
                                    <p class="text-sm text-gray-500">11 Juil 2025 - 14:30</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-green-600">+25,000 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 2 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Paiement - Boutique Orange</p>
                                    <p class="text-sm text-gray-500">10 Juil 2025 - 16:45</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-blue-600">-5,500 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 3 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 10l5 5 5-5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Retrait DAB</p>
                                    <p class="text-sm text-gray-500">09 Juil 2025 - 12:15</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-red-600">-15,000 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 4 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Virement reçu - Mamadou Fall</p>
                                    <p class="text-sm text-gray-500">08 Juil 2025 - 09:20</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-green-600">+50,000 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 5 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Facture SENELEC</p>
                                    <p class="text-sm text-gray-500">07 Juil 2025 - 14:00</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-blue-600">-18,750 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 6 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-red-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 10l5 5 5-5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Retrait guichet</p>
                                    <p class="text-sm text-gray-500">06 Juil 2025 - 10:30</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-red-600">-20,000 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 7 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Salaire - Entreprise ABC</p>
                                    <p class="text-sm text-gray-500">05 Juil 2025 - 08:00</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-green-600">+150,000 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 8 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Achat supermarché</p>
                                    <p class="text-sm text-gray-500">04 Juil 2025 - 18:20</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-blue-600">-12,500 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 9 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Transport - Rapide</p>
                                    <p class="text-sm text-gray-500">03 Juil 2025 - 07:45</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-blue-600">-2,000 FCFA</p>
                            </div>
                        </div>
                        
                        <!-- Transaction 10 -->
                        <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M7 14l5-5 5 5z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-medium text-gray-800">Remboursement - Ami</p>
                                    <p class="text-sm text-gray-500">02 Juil 2025 - 15:10</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-semibold text-green-600">+10,000 FCFA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
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
        // Données complètes des transactions
        const allTransactions = [
            { type: 'depot', description: 'Dépôt', date: '11 Juil 2025 - 14:30', amount: '+25,000 FCFA', color: 'green' },
            { type: 'paiement', description: 'Paiement - Boutique Orange', date: '10 Juil 2025 - 16:45', amount: '-5,500 FCFA', color: 'blue' },
            { type: 'retrait', description: 'Retrait DAB', date: '09 Juil 2025 - 12:15', amount: '-15,000 FCFA', color: 'red' },
            { type: 'depot', description: 'Virement reçu - Mamadou Fall', date: '08 Juil 2025 - 09:20', amount: '+50,000 FCFA', color: 'green' },
            { type: 'paiement', description: 'Facture SENELEC', date: '07 Juil 2025 - 14:00', amount: '-18,750 FCFA', color: 'blue' },
            { type: 'retrait', description: 'Retrait guichet', date: '06 Juil 2025 - 10:30', amount: '-20,000 FCFA', color: 'red' },
            { type: 'depot', description: 'Salaire - Entreprise ABC', date: '05 Juil 2025 - 08:00', amount: '+150,000 FCFA', color: 'green' },
            { type: 'paiement', description: 'Achat supermarché', date: '04 Juil 2025 - 18:20', amount: '-12,500 FCFA', color: 'blue' },
            { type: 'paiement', description: 'Transport - Rapide', date: '03 Juil 2025 - 07:45', amount: '-2,000 FCFA', color: 'blue' },
            { type: 'depot', description: 'Remboursement - Ami', date: '02 Juil 2025 - 15:10', amount: '+10,000 FCFA', color: 'green' },
            { type: 'paiement', description: 'Facture téléphone', date: '01 Juil 2025 - 11:30', amount: '-8,500 FCFA', color: 'blue' },
            { type: 'retrait', description: 'Retrait distributeur', date: '30 Juin 2025 - 19:00', amount: '-25,000 FCFA', color: 'red' },
            { type: 'depot', description: 'Virement - Famille', date: '29 Juin 2025 - 13:45', amount: '+30,000 FCFA', color: 'green' },
            { type: 'paiement', description: 'Restaurant - Chez Fatou', date: '28 Juin 2025 - 20:15', amount: '-6,750 FCFA', color: 'blue' },
            { type: 'paiement', description: 'Pharmacie du coin', date: '27 Juin 2025 - 16:30', amount: '-4,200 FCFA', color: 'blue' }
        ];
        
        // Fonction pour créer une transaction HTML
        function createTransactionHTML(transaction) {
            const iconPath = transaction.type === 'depot' ? 'M7 14l5-5 5 5z' : 
                           transaction.type === 'retrait' ? 'M7 10l5 5 5-5z' : 'M7 14l5-5 5 5z';
            
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
        const modal = document.getElementById('transactionsModal');
        const voirPlusBtn = document.getElementById('voirPlusBtn');
        const closeModal = document.getElementById('closeModal');
        const allTransactionsList = document.getElementById('allTransactionsList');
        
        voirPlusBtn.addEventListener('click', () => {
            // Remplir le modal avec toutes les transactions
            allTransactionsList.innerHTML = allTransactions.map(createTransactionHTML).join('');
            modal.classList.remove('hidden');
        });
        
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });
        
        // Fermer le modal en cliquant en dehors
        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.classList.add('hidden');
            }
        });
    </script>


    </main>
  </div>
</body>
</html>
