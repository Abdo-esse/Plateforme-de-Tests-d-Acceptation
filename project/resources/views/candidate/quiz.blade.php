<x-master title="Formulaire de Tes">
    @section('main')
    <div class="bg-gray-100 font-sans p-4">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- En-tête du quiz -->
                <div class="bg-indigo-600 p-4 text-white">
                    <h2 class="text-xl font-bold">Quiz - Question {{ $question->id }}/{{ $totalQuestions }}</h2>
                </div>
    
                <!-- Contenu de la question -->
                <div class="p-6 border-b border-gray-200">
                    <p class="text-lg font-medium text-gray-800 mb-4">{{ $question->text }}</p>
    
                    <form action="{{ route('questions.next', $question->id) }}" method="POST">
                        @csrf
                        <!-- Options de réponse -->
                        <div class="space-y-3">
                            @foreach($question->reponses as $answer)
                                <label class="flex items-center p-3 rounded-lg border border-gray-200 hover:bg-gray-50 cursor-pointer transition-colors">
                                    <input type="radio" name="answer" value="{{ $answer->id }}" class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300" required>
                                    <span class="ml-3 text-gray-700">{{ $answer->contenu }}</span>
                                </label>
                            @endforeach
                        </div>
    
                        <!-- Bouton de validation -->
                        <div class="mt-6">
                            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Next question
                            </button>
                        </div>
                    </form>
    
                    <!-- Compteur de questions -->
                    <div class="mt-4 flex justify-between text-sm text-gray-500">
                        <span>Question {{ $question->id }} sur {{ $totalQuestions }}</span>
                        <span>Score actuel: {{ $score }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @endsection
</x-master>