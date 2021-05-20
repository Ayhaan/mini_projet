<x-app-layout>
    <div class="text-center bg-gray-50 py-5 shadow-md w-3/12 mx-auto rounded-lg">
        <h1 class="text-3xl mb-1">Toutes les images </h1>
        <a href="{{ route('image.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full my-20">Ajouter</a>
        @include('layouts.flash')
    </div>
    <div class="flex flex-wrap ">
        @foreach ($images as $image)
        <div class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
            <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center"
                style="background-image: url({{ asset('img/'. $image->src) }})">
            </div>

            <div class=" w-full bg-white -mt-10 shadow-lg rounded-lg p-5 text-center">
                <p class="title-post font-medium">Titre de l'image : {{ $image->nom }}</p>

                <p class="summary-post text-base  ">Categorie : {{ $image->categorie->nom }}</p>

                <form action="{{ route('image.destroy', $image->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>



</x-app-layout>
