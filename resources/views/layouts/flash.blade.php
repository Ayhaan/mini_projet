@if ($message = Session::get('success'))
      <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="font-bold text-center">{{$message}}</p>
      </div>
@endif
@if ($message = Session::get('warning'))
      <div class="bg-yellow-100 border-t border-b border-yellow-500 text-yellow-700 px-4 py-3" role="alert">
        <p class="font-bold text-center">{{$message}}</p>
      </div>
@endif


{{-- MESSAGE ERRORS  (à choisir entre ce message sous forme de liste ou les messages d'erreurs en dessous de l'input)
@if ($errors->any())
    <div  class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{  $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}