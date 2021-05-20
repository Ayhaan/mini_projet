<x-app-layout>
    <div class="text-center bg-gray-50 py-5 shadow-md w-3/12 mx-auto rounded-lg">
        <h1 class="text-3xl">Avatars disponibles </h1>
        <p class="text-2xl my-3"> count {{ count($avatars) }}/5</p> 
        @if (count($avatars) < 5)
            <a class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-full mb-20" href="{{ route('avatar.create') }}">Ajouter</a>
        @else 
            <p class="text-red-600 font-bold text-1xl">Maximum atteint</p>
        @endif
        @include('layouts.flash')
    </div>
    
    <div class="grid grid-cols-3 gap-4 w-3/4 mx-auto my-20">
        @foreach ($avatars as $avatar)
        <div class="bg-gray-50 border-gray-600  dark:bg-gray-800 bg-opacity-95 border-opacity-60 | p-4 border-solid rounded-3xl border-2 | flex justify-around ">
            <img class="w-16 h-16 object-cover" src="{{ asset('img/'. $avatar->src) }}" alt="" />
            <div class="flex flex-col justify-center">
              <p class="text-gray-900 dark:text-gray-300 font-semibold">{{ $avatar->nom }}</p>
              <form action="{{ route('avatar.destroy', $avatar->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Delete</button>
              </form>
            </div>
          </div>
        @endforeach
    </div>
      
</x-app-layout>
