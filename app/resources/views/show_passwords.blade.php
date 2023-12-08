<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IUT | Password manager</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="antialiased h-screen w-screen bg-slate-100 flex items-center justify-center">
<ul role="list" class="divide-y divide-gray-100">
<h1 class="text-3xl font-semibold mb-6">Mots de passe de l'utilisateur</h1>

@if($passwords->isEmpty())
    <p class="text-gray-500">Aucun mot de passe enregistré.</p>
@else
    <ul>
        @foreach($passwords as $password)
            <li class="mb-4">
                <div class="flex items-center justify-between border-b border-gray-300 py-2">
                    <div class="flex items-center">
                        <div class="h-8 w-8 flex items-center justify-center text-xl rounded-full bg-blue-500 text-white">{{ $password->initial }}</div>
                        <div class="ml-4">
                            <p class="text-sm font-semibold text-gray-800">{{ $password->url }}</p>
                            <p class="text-xs text-gray-500">{{ $password->login }}</p>
                            <a href="password_modify/{{$password->id}}" class= "text-xs text-gray-500">{{ $password->password }}</a>
                            <!-- Ajoutez d'autres champs si nécessaire -->
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@endif
</ul>

</body>
</html>
