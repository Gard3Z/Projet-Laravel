<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>IUT | Password manager</title>

        <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    </head>
    <body class="antialiased h-screen w-screen">

    <div class="bg-white">
        <div class="relative isolate px-6 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
            </div>

            <div class="mx-auto max-w-3xl py-32 sm:py-48 lg:py-56">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">{{__('content-page.welcome.title')}}</h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600">{{__('content-page.welcome.subtitle')}}</p>

                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @auth
                            <p>{{ auth()->user()->name }}</p>
                            <p>|</p>
                            <a href="{{ route('dashboard') }}" class="rounded-md bg-slate-950 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-950">{{__('content-page.welcome.dashboard')}}</a>
                        @else
                            <a href="{{ route('login') }}">{{__('content-page.welcome.login')}}</a>
                            <p>|</p>
                            <a href="{{ route('register') }}">{{__('content-page.welcome.register')}}</a>
                        @endauth
                    </div>

                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @auth
                        <a href="{{ route('passwords.create') }}" class="rounded-md bg-slate-950 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-950">{{__('content-page.welcome.add-password')}}</a>
                            <a href="{{ route('passwords.index') }}" class="text-sm font-semibold leading-6 text-gray-900">{{__('content-page.welcome.see-all-passwords')}} <span aria-hidden="true">→</span></a>
                        @endauth
                    </div>


                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @auth
                            <a href="{{ route('team.create') }}" class="rounded-md bg-slate-950 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-950">{{__('content-page.welcome.add-team')}}</a>
                            <a href="{{ route('team.index') }}" class="text-sm font-semibold leading-6 text-gray-900">{{__('content-page.welcome.see-all-teams')}} <span aria-hidden="true">→</span></a>
                        @endauth
                    </div>

                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        @auth
                            <a href="{{ route('team.invite') }}" class="rounded-md bg-slate-950 px-3.5 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-slate-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-slate-950">{{__('content-page.welcome.add-member')}}</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    </body>
</html>
