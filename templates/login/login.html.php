<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAX IT SA - Connexion</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-orange-500 min-h-screen flex items-center justify-center">
    <div class="flex w-full max-w-6xl mx-auto">
        <!-- Formulaire de connexion -->
        <div class="flex-1 flex items-center justify-center p-8">
            <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-md">
                <!-- Logo/Titre -->
                <div class="text-center mb-8">
                    <div class="inline-block bg-gray-100 rounded-2xl px-6 py-3">
                        <h1 class="text-xl font-bold text-gray-800">MAX IT</h1>
                        <p class="text-orange-500 text-sm font-medium">SA</p>
                    </div>
                </div>

                <!-- Formulaire -->
                <form class="space-y-6">
                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            Numéro de Téléphone*
                        </label>
                        <input type="tel" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="">
                    </div>

                    <div>
                        <label class="block text-gray-700 text-sm font-medium mb-2">
                            Mot de passe*
                        </label>
                        <input type="password" class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent" placeholder="">
                    </div>

                    <div class="text-left">
                        <a href="#" class="text-gray-600 text-sm hover:text-orange-500 transition-colors">
                            Mot de passe oublié?
                        </a>
                    </div>

                    <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-xl font-semibold hover:bg-orange-600 transition-colors">
                        <a href="/accueil">
                            Connexion
                        </a>
                    </button>

                    <div class="text-center text-sm text-gray-600">
                        vous n'avez pas de compte ? 
                        <a href="/inscription" class="text-orange-500 hover:text-orange-600 transition-colors">s'inscrire</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Illustration -->
        <div class="flex-1 relative overflow-hidden">
            <div class="absolute inset-0 flex items-center justify-center">
                <!-- Votre image ici -->
                <img src="images/assets/Banknote-pana (3).png" alt="Illustration" class="w-full h-full object-cover">
            </div>
        </div>
    </div>
</body>
</html>