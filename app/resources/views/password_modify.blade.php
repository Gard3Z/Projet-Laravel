<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>IUT | Password manager</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
</head>
<body class="antialiased h-screen w-screen bg-slate-100 flex items-center justify-center">
    <form action="{{route('password.modify', $id)}}" method="POST"  class="space-y-8 w-1/2">
        @csrf

        <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{__('content-page.modify-password.title')}}</h1>
        </div>

        <div>
            <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{__('content-page.modify-password.password')}}</label>
            <div class="relative mt-2 rounded-md shadow-sm">
                <input type="password" name="password" id="password"
                       class="block w-full rounded-md border-0 py-1.5 pr-10 @error('password') text-red-900 placeholder:text-red-300 ring-red-300 focus:ring-red-500 @enderror ring-1 ring-inset focus:ring-2 focus:ring-inset sm:text-sm sm:leading-6"
                       aria-invalid="true" aria-describedby="password-error" placeholder="{{__('content-page.modify-password.password')}}">
                @error('password')
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3">
                    <svg class="h-5 w-5 text-red-500" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-5a.75.75 0 01.75.75v4.5a.75.75 0 01-1.5 0v-4.5A.75.75 0 0110 5zm0 10a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                    </svg>
                </div>
                @enderror
            </div>
            @error('password')
            <p class="mt-2 text-sm text-red-600" id="password-error">{{ $message }}</p>
            @enderror
        </div>



        <button type="submit" class="w-full rounded-md bg-slate-950 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700">{{__('content-page.modify-password.save')}}</button>
    </form>
</body>
</html>
