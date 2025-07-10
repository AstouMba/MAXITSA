<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'Inscription</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-400 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl shadow-lg p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Inscription</h1>
        
        <form>
            <!-- Nom et Prénom -->
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Nom*</label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Prénom*</label>
                    <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none">
                </div>
            </div>
            
            <!-- Adresse -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Adresse*</label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none">
            </div>
            
            <!-- Numéro de Téléphone -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de Téléphone*</label>
                <input type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none">
            </div>
            
            <!-- Numéro de CNI -->
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Numéro de CNI*</label>
                <input type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none">
            </div>
            
            <!-- Télécharger Photo CNI -->
            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-4">Télécharger Photo CNI*</label>
                <div class="grid grid-cols-2 gap-4">
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-orange-400 transition-colors">
                        <svg class="w-8 h-8 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-sm text-gray-600">Recto</span>
                    </div>
                    <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-orange-400 transition-colors">
                        <svg class="w-8 h-8 mx-auto mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span class="text-sm text-gray-600">Verso</span>
                    </div>
                </div>
            </div>
            
            <!-- Bouton Créer un compte -->
            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-6 rounded-xl transition-colors">
                Créer un compte
            </button>
        </form>
    </div>
</body>
</html>