@php
     $user = auth()->user();
@endphp

<div class="p-6 sm:px-20 bg-white  border-gray-200">
     <div>
          <h1 style="font-size: 24px;">  Bienvenue, {{$user->name}} </h1>
          <x-jet-application-logo class="block h-12 w-auto" />
     </div>
</div> 






