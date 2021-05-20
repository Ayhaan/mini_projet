<x-app-layout>
    <div class="text-center bg-gray-50 py-5 shadow-md w-3/12 mx-auto rounded-lg">
        <h1 class="text-3xl max-w-full">Bonjour {{ Auth::user()->prenom }}</h1>
    </div>
    @include('partials.cardProfil')
</x-app-layout>
