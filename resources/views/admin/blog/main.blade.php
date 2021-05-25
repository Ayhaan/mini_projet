<x-app-layout>
    <div class="text-center bg-gray-50 py-5 shadow-md w-3/12 mx-auto rounded-lg">
        <h1 class="text-3xl">Blog</h1>
        <p><i>Liste d'article</i></p>
    </div>
    <div class="container mx-auto grid grid-cols-3 my-10">
        @foreach ($articles as $article)
        <div class="lg:flex w-full">
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                style="background-image: url('{{ asset('img/' . $article->src) }}')" title="Woman holding a mug">
            </div>
            <div
                class="border-r border-b border-l border-grey-light lg:border-l-0 lg:border-t lg:border-grey-light bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-black font-bold text-xl mb-2">{{ $article->titre }}</div>
                    <p class="text-grey-darker text-base">{{$article->description}}
                    </p>
                </div>
                <div class="flex items-center">
                    <img class="w-10 h-10 rounded-full mr-4" src="{{ asset('img/' . $article->src) }}"
                        alt="{{ $article->auteur }}">
                    <div class="text-sm">
                        <p class="text-black leading-none">{{ $article->auteur }}</p>
                        <p class="text-grey-dark">{{ $article->created_at->format('d-m-Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</x-app-layout>
