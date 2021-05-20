<x-app-layout>
    <div class="text-center bg-gray-50 py-5 shadow-md w-3/12 mx-auto rounded-lg">
        <h1 class="text-3xl">Gallerie photo </h1>
    </div>
    <div class="container mx-auto px-4">

        <section class="py-8 px-4">
            <div class="flex flex-wrap -mx-4 -mb-8">
                @foreach ($images as $image)
                <div class="p-4 md:w-1/3 md:mb-0 mb-6 flex flex-col justify-center items-center max-w-sm mx-auto">
                    <div class="bg-gray-300 h-56 w-full rounded-lg shadow-md bg-cover bg-center"
                        style="background-image: url({{ asset('img/'. $image->src) }})">
                    </div>
        
                    <div class=" w-full bg-white -mt-10 shadow-lg rounded-lg p-5 text-center">
                        <p class="title-post font-medium">Titre de l'image : {{ $image->nom }}</p>
        
                        <p class="summary-post text-base  ">Categorie : {{ $image->categorie->nom }}</p>
                        <a class="bg-blue-100 text-blue-500 mt-4 block rounded p-2 text-sm  mx-auto" href="{{ route('gallerie.download', $image->id) }}">Download</a>
        
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </div>

</x-app-layout>
