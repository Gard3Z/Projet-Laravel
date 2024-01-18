<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IUT | Password manager</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="antialiased h-screen w-screen bg-slate-100 flex items-center justify-center">
    
<div class="absolute top-5 left-50 mt-1 mr-1 text-sm font-semibold leading-4 text-gray-900">
        <a href="{{ route('/') }}" ><img class="w-10" src="./maison.png" alt=""></a>
</div>

<ul role="list" class="divide-y divide-gray-100">

<div class="text-center">
    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl ">{{__('content-page.show-passwords.title')}}</h1>
</div>

@if($passwords->isEmpty())
    <p class="text-gray-500">{{__('content-page.show-passwords.no-password')}}</p>
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
