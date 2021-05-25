<x-app-layout>
    <div class="text-center bg-gray-50 py-5 shadow-md w-3/12 mx-auto rounded-lg">
        <h1 class="text-3xl">Blog | Article</h1>
        <p class="mb-7"><i>count :{{ count($articles) }} article(s) dispo</i></p>
        <a href="{{ route('article.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Add a new article</a>

    </div>
    @include('layouts.flash')
    <div class="container my-10">
        <table
            class='mx-auto w-10/12  whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden'>
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Auteur
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Titre
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Description
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4 text-center">
                        Action
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">

                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach ($articles as $article)
                <tr>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <p class="">{{ $article->auteur }}</p>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <p class="">{{ $article->titre }}</p>
                    </td>
                    <td class="px-6 py-4 text-center">
                        <p class="">{{ $article->description }}</p>
                    </td>
                    <td class="flex justify-center">
                        <a href="{{ route('article.edit', $article->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full">Edit</a>
                        <form action="{{ route('article.destroy', $article->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

</x-app-layout>

