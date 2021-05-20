<x-app-layout>

    <div class="grid grid-cols-1 gap-4 w-3/4 mx-auto my-20">
        <form action="{{ route('avatar.store' ) }}" method="post"
            class="grid bg-white rounded-lg shadow-xl  w-8/12 mx-auto" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center pt-8">
                <div class="flex">
                    <h1 class="text-gray-600 font-bold md:text-2xl text-xl">Ajout d'un nouveau avatar</h1>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
                <div class="grid grid-cols-1">
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Nom de
                        l'avatar</label>
                    <input
                        class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="nom" value="{{ old('nom') }}" placeholder="Nom de l'avatar" />
                    @error('nom')
                    @include('partials.error')
                    @enderror
                </div>
            </div>
     
            <div class="grid grid-cols-2 mt-5 mx-7">
                {{-- INPUT FILE --}}
                <div>
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Image</label>
                    <input
                        class="py-2 w-11/12 px-3 h-12 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="file" name="src" placeholder="Ton src" />

                </div>
                {{-- INPUT URL --}}
                <div>
                    <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Avatar
                        URL</label>
                    <input
                        class="py-2 w-11/12 rounded-lg h-12 border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                        type="text" name="srcURL" placeholder="URL de l'image" />
                </div>
                @error('src')
                    @include('partials.error')
                @enderror
            </div>
            <div class='flex items-center justify-center  md:gap-8 gap-4 pt-5 pb-5'>
                <button
                    class='w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2'>Add</button>
            </div>

        </form>
    </div>

</x-app-layout>
