<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!-- Container principal -->
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-orange-500 text-white p-6">
            <!-- Logo -->
            <div class="mb-8">
                <div class="bg-white text-orange-500 rounded-xl px-4 py-2 text-center font-bold">
                    <div class="text-sm">MAX IT</div>
                    <div class="text-xs">SA</div>
                </div> 
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
                    <span class="text-lg font-medium">mes comptes</span>
                </div>
            </nav>
            
            <!-- Déconnexion -->
            <div class="absolute bottom-6 left-6">
                <div class="flex items-center space-x-3">
                    <div class="w-6 h-6">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.59L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/>
                        </svg>
                    </div>
                    <span class="text-lg font-medium">Deconnexion</span>
                </div>
            </div>
        </div>
        
        <!-- Contenu principal -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="bg-white shadow-sm px-6 py-4">
                <div class="flex items-center justify-between">
                    <!-- Barre de recherche -->
                    <div class="flex items-center bg-gray-100 rounded-lg px-4 py-2 w-96">
                        <svg class="w-5 h-5 text-gray-400 mr-3" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                        </svg>
                        <input type="text" placeholder="recherche" class="bg-transparent outline-none text-gray-700 w-full">
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Avatar utilisateur -->
                        <div class="w-10 h-10 bg-gray-300 rounded-full"></div>
                        <!-- Nom utilisateur -->
                        <div class="bg-orange-500 text-white px-4 py-2 rounded-lg font-medium">
                            Astou Mbow
                        </div>
                        <!-- Notification -->
                        <div class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center">
                            <svg class="w-5 h-5 text-gray-600" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>
            
            <!-- Contenu principal -->
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
                <div class="flex space-x-4">
                    <button class="bg-white border-2 border-orange-500 text-orange-500 px-6 py-3 rounded-full font-medium hover:bg-orange-50 transition-colors flex items-center space-x-2">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M9 11H7v2h2v-2zm4 0h-2v2h2v-2zm4 0h-2v2h2v-2zm2-7h-1V2h-2v2H8V2H6v2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H5V8h14v12z"/>
                        </svg>
                        <span>consulter mes transaction</span>
                    </button>
                    
                    <button class="bg-white border-2 border-orange-500 text-orange-500 px-6 py-3 rounded-full font-medium hover:bg-orange-50 transition-colors flex items-center space-x-2">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                        </svg>
                        <span>creer un compte secondaire</span>
                    </button>
                    
                    <button class="bg-white border-2 border-orange-500 text-orange-500 px-6 py-3 rounded-full font-medium hover:bg-orange-50 transition-colors flex items-center space-x-2">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                        <span>changer de compte</span>
                    </button>
                    
                    <button class="bg-white border-2 border-orange-500 text-orange-500 px-6 py-3 rounded-full font-medium hover:bg-orange-50 transition-colors flex items-center space-x-2">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/>
                        </svg>
                        <span>consulter solde de mon compte</span>
                    </button>
                </div>
            </main>
        </div>
    </div>
</body>
</html>