<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TestAccept - Formulaire de Test</title>
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
      @theme {
        --color-clifford: #da373d;
      }
    </style></head>
<body class="bg-gray-50">
  <!-- Form Section -->
    <section class="pt-32 pb-16 px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto max-w-3xl">
            <div class="bg-white rounded-lg shadow-md p-6 sm:p-8">
                <div class="mb-8 text-center">
                    <h1 class="text-2xl font-bold text-gray-800">Informations du candidat</h1>
                    <p class="text-gray-600 mt-2">Veuillez compléter le formulaire ci-dessous avant de commencer votre test</p>
                </div>
                
                <form action="#" method="POST" enctype="multipart/form-data">
                    <!-- Nom et Prénom -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="nom" class="block text-sm font-medium text-gray-700 mb-1">Nom</label>
                            <input type="text" id="nom" name="nom" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="prenom" class="block text-sm font-medium text-gray-700 mb-1">Prénom</label>
                            <input type="text" id="prenom" name="prenom" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <!-- Email et Date de naissance -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" id="email" name="email" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="date_naissance" class="block text-sm font-medium text-gray-700 mb-1">Date de naissance</label>
                            <input type="date" id="date_naissance" name="date_naissance" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <!-- Téléphone -->
                    <div class="mb-6">
                        <label for="telephone" class="block text-sm font-medium text-gray-700 mb-1">Numéro de téléphone</label>
                        <input type="tel" id="telephone" name="telephone" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    
                    <!-- Adresse -->
                    <div class="mb-6">
                        <label for="adresse" class="block text-sm font-medium text-gray-700 mb-1">Adresse</label>
                        <textarea id="adresse" name="adresse" rows="3" required 
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>
                    
                    <!-- Ville et Code postal -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="ville" class="block text-sm font-medium text-gray-700 mb-1">Ville</label>
                            <input type="text" id="ville" name="ville" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label for="code_postal" class="block text-sm font-medium text-gray-700 mb-1">Code postal</label>
                            <input type="text" id="code_postal" name="code_postal" required 
                                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <!-- Upload d'image -->
                    <div class="mb-6">
                        <label for="photo" class="block text-sm font-medium text-gray-700 mb-1">Photo d'identité</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                        <span>Télécharger un fichier</span>
                                        <input id="file-upload" name="photo" type="file" class="sr-only" accept="image/*">
                                    </label>
                                    <p class="pl-1">ou glisser-déposer</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF jusqu'à 10MB</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Conditions générales -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="terms" name="terms" type="checkbox" required
                                    class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="terms" class="font-medium text-gray-700">J'accepte les conditions générales</label>
                                <p class="text-gray-500">En soumettant ce formulaire, j'accepte que mes informations soient utilisées pour le test d'acceptation.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Boutons -->
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="px-6 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Soumettre
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>