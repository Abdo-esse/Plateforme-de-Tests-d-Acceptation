<x-master title="Formulaire de Tes">
    @section('main')
    <div class="bg-gray-100 font-sans p-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- En-tête du quiz -->
                <div class="bg-indigo-600 p-4 text-white">
                    <h2 class="text-xl font-bold">Quiz - Répondez à toutes les questions</h2>
                </div>
    
                <!-- Contenu de la question -->
                <div class="p-6 border-b border-gray-200">
    
                    <!-- Formulaire de soumission -->
                    <form action="{{route('questions.store')}}" method="POST">
                        @csrf
    
                        <!-- Affichage des questions -->
                        @foreach($questions as $index => $question)
                            <div class="mb-6">
                                <p class="text-lg font-medium text-gray-800 mb-4">{{ $question->contenu }}</p>
    
                                <!-- Options de réponse -->
                                <div class="space-y-3">
                                    @if($question->is_multiple) <!-- Pour les questions à choix multiples -->
                                        @forelse($question->reponses as $answer)
                                            <label class="flex items-center p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                                                <input type="checkbox" name="answers[{{ $question->id }}][]" value="{{ $answer->id }}" class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300">
                                                <span class="ml-3 text-gray-700">{{ $answer->contenu }}</span>
                                            </label>
                                            @empty <p>NOT reponse</p>
                                        @endforelse
                                    @else <!-- Pour les questions à choix unique -->
                                        @forelse($question->reponses as $answer)
                                            <label class="flex items-center p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                                                <input type="radio"  name="answers[{{ $question->id }}]" value="{{ $answer->id }}" class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300" >
                                                <span class="ml-3 text-gray-700">{{ $answer->contenu }}</span>
                                            </label>
                                            @empty <p>NOT reponse</p>
                                        @endforelse
                                    @endif
                                </div>
                            </div>
                        @endforeach
    
                        <!-- Bouton de validation -->
                        <div class="mt-6">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Valider mes réponses
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
</x-master>

