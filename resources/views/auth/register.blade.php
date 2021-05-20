<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <img src="{{ asset('img/anonyme.png') }}" class="mx-auto h-20 rounded-full imgProfil" />
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mt-4">
                <x-label for="nom" :value="__('nom')" />

                <x-input id="nom" class="block mt-1 w-full" type="text" name="nom" :value="old('nom')" required autofocus />
            </div>
            <!-- prenom -->
            <div class="mt-4">
                <x-label for="prenom" :value="__('prenom')" />

                <x-input id="prenom" class="block mt-1 w-full" type="text" name="prenom" :value="old('prenom')" required autofocus />
            </div>
            <!-- age -->
            <div class="mt-4">
                <x-label for="age" :value="__('age')" />

                <x-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>
            <div class="mt-4">
                <label for="avatar_id" class="block text-sm font-medium text-gray-700">Choix de l'avatar</label>
                <select  id="avatar_id" name="avatar_id" onchange="afficher(this)" onclick="afficher(this)" autocomplete="avatar_id"
                    class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm selectAvatar">
                    @foreach ($avatars as $avatar)
                        <option class="selectAvatar" value="{{ $avatar->id }}" id="{{ $avatar->src }}">{{ $avatar->nom }}</option>
                    @endforeach
                </select>
                @error('role_id')
                    <p class="text-red-400 text-center">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-5">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>



<script type="text/javascript">
    let img = document.querySelector('.imgProfil');
    function afficher(x ) {
        i = x.selectedIndex;
        // if (i == 0) { 
        //     img.src = 'http://127.0.0.1:8000/img/' + x.options[i].id
        // }
        img.src = 'http://127.0.0.1:8000/img/' + x.options[i].id
    }
</script>