<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Formulaire d'Inscription</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-orange-400 h-screen flex items-center justify-center p-4">
<div class="flex bg-white rounded-3xl shadow-lg overflow-hidden w-full max-w-5xl h-full">
    <!-- Formulaire à gauche -->
    <div class="w-full lg:w-1/2 p-8 ">
      <h1 class="text-2xl font-bold text-center text-gray-800 mb-8">Inscription</h1>

      <form action="/inscription" method="post" enctype="multipart/form-data">
        <!-- Nom et Prénom -->
        <div class="grid grid-cols-2 gap-4 mb-2">
          <div>
            <label for="nom" class="block text-sm font-medium text-gray-700 mb-2">Nom*</label>
            <input id="nom" name="nom" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none" required>
          </div>
          <div>
            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-2">Prénom*</label>
            <input id="prenom" name="prenom" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none" required>
          </div>
        </div>

        <!-- Adresse -->
        <div class="mb-6">
          <label for="adresse" class="block text-sm font-medium text-gray-700 mb-2">Adresse*</label>
          <input id="adresse" name="adresse" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none" required>
        </div>

        <!-- Téléphone -->
        <div class="mb-6">
          <label for="telephone" class="block text-sm font-medium text-gray-700 mb-2">Numéro de Téléphone*</label>
          <input id="telephone" name="telephone" type="tel" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none" required>
        </div>

        <!-- CNI -->
        <div class="mb-6">
          <label for="cni" class="block text-sm font-medium text-gray-700 mb-2">Numéro de CNI*</label>
          <input id="cni" name="cni" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none" required>
        </div>

        <!-- Password -->
        <div class="mb-6">
          <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password*</label>
          <input id="password" name="password" type="password" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-orange-400 focus:border-transparent outline-none" required>
        </div>

        <!-- Photos CNI -->
        <div class="mb-8">
          <label class="block text-sm font-medium text-gray-700 mb-4">Télécharger Photo CNI*</label>
          <div class="grid grid-cols-2 gap-4">
            <!-- Recto -->
            <div onclick="document.getElementById('photo-recto').click()" class="cursor-pointer border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-orange-400 transition-colors">
              <svg class="w-8 h-8 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <span id="label-recto" class="text-sm text-gray-600">Recto</span>
              <input id="photo-recto" name="photo_recto" type="file" class="hidden" accept="image/*" required>
            </div>

            <!-- Verso -->
            <div onclick="document.getElementById('photo-verso').click()" class="cursor-pointer border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-orange-400 transition-colors">
              <svg class="w-8 h-8 mx-auto  text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <span id="label-verso" class="text-sm text-gray-600">Verso</span>
              <input id="photo-verso" name="photo_verso" type="file" class="hidden" accept="image/*" required>
            </div>
          </div>
        </div>

        <!-- Bouton -->
        <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-4 px-4 -mt-12 rounded-xl transition-colors">
          Créer un compte
        </button>
        <div class="text-center text-sm text-gray-600 -mt-1">
          vous avez déjà un compte ? 
          <a href="/" class="text-orange-500 hover:text-orange-600 transition-colors">se connecter</a>
        </div>
      </form>
    </div>

    <!-- Image à droite -->
    <div class="hidden lg:flex lg:w-1/2 bg-orange-400 items-center justify-center p-8">
      <img src="images/assets/Banknote-rafiki.png" alt="Illustration" class="max-w-full max-h-full object-contain">
    </div>
  </div>

  <script>
    document.getElementById('photo-recto').addEventListener('change', function (e) {
      const label = document.getElementById('label-recto');
      const file = e.target.files[0];
      if (file) {
        label.textContent = file.name.length > 15 ? file.name.substring(0, 15) + '...' : file.name;
      }
    });

    document.getElementById('photo-verso').addEventListener('change', function (e) {
      const label = document.getElementById('label-verso');
      const file = e.target.files[0];
      if (file) {
        label.textContent = file.name.length > 15 ? file.name.substring(0, 15) + '...' : file.name;
      }
    });
  </script>
</body>
</html>