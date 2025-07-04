<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>EDICs.eu</title>

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Fathom - beautiful, simple website analytics -->
        <script src="https://cdn.usefathom.com/script.js" data-site="YFWZDOOZ" defer></script>

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="min-h-screen">
        <header class="w-full bg-blue-900 text-white">
            <div class="flex items-center justify-between max-w-6xl mx-auto px-4 py-2">
                <div class="text-lg font-light"><span class="font-bold">EDICs</span>.eu</div>
            </div>
        </header>

        <div class="max-w-6xl mx-2 md:mx-auto grid grid-cols-1 md:grid-cols-3 gap-2 md:gap-6 mt-6 text-sm md:text-base">

            <div class="md:border border-stone-700 p-4 rounded-lg col-span-2">
                <h1 class="text-2xl font-semibold text-blue-800 mb-4">What are EDICs?</h1>
                <p class="mb-2">
                    <span class="font-semibold">European Digital Infrastructure Consortiums (EDICs)</span> are legal instruments
                    designed to support and facilitate the implementation of multi-country digital projects.
                    Their key features include:
                </p>

                <ul class="list-disc pl-4">
                    <li>Focus on <span class="font-semibold">deployment and scaling</span> up rather than just research</li>
                    <li>Member states in the driving seat (maintaining at least 51% of votes)</li>
                    <li>Flexible governance structure (only assembly of members and director are mandatory)</li>
                    <li><span class="font-semibold">Long-term sustainability</span> beyond typical project durations (24-48 months)</li>
                    <li>Linked to <a class="underline decoration-blue-800 hover:bg-blue-50" target="_blank" href="https://digital-strategy.ec.europa.eu/en/library/digital-decade-policy-programme-2030">Digital Decade Policy Program</a> objectives</li>
                    <li>Enable <span class="font-semibold">pooling of resources</span> (financial, data, expertise) across countries</li>

                </ul>
             </div>

            <div class="border border-stone-100 bg-stone-100 -mx-2 p-4 md:rounded-lg">
                <h2 class="text-2xl font-semibold text-stone-400 mb-4">Disclosure</h2>
                <p>
                    This is <span class="font-semibold">not an official website</span> of the European Commission or any other EU institution.<br/>
                    It is a <span class="font-semibold">community-driven initiative</span> to provide information about EDICs.<br/><br/>
                </p>
                <h3 class="font-semibold text-sm">Need official information?</h3>
                <p>Visit the <a class="underline decoration-blue-800 hover:bg-blue-50" target="_blank" href="https://digital-strategy.ec.europa.eu/en/policies/edic"> EDICs page</a> on the EU website.</p>

                <h3 class="mt-4 font-semibold text-sm">Spotted a mistake? Have a suggestion?</h3>
                <p>Mail us at <a class="underline decoration-blue-800 hover:bg-blue-50" href="mailto:info@edics.eu">info@edics.eu</a></p>
            </div>
        </div>

        <div class="max-w-6xl mx-2 md:mx-auto mt-6 grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-6">

            @foreach($established as $edic)
                <div class="relative border border-blue-800 p-4 rounded-lg hover:border-2 transition-colors duration-200">
                    <div class="absolute right-2 top-2 text-xs">{{ $edic->status }}</div>
                    <h2 class="font-semibold text-lg">
                        {{$edic->acronym}}
                    </h2>
                    <h2 class="">
                        {{$edic->name}}
                    </h2>

                    <div class="flex justify-end">
                        {{-- Add a button with a right caret that opens the website (url property) in a new window. Background of button should be stone-200 --}}
                        <a href="{{ $edic->url }}" target="_blank" class="inline-block mt-2 px-4 py-2 bg-stone-100 rounded text-blue-800 hover:bg-stone-200 transition-colors duration-200">
                            Visit Website
                            <span class="ml-1">&#8594;</span>
                        </a>
                    </div>

                </div>
            @endforeach

        </div>
        <div class="max-w-6xl mx-2 md:mx-auto mt-6 grid grid-cols-2 md:grid-cols-3 gap-6">

            @foreach($preparing as $edic)
                <div class="relative border border-blue-800 p-4 rounded-lg hover:bg-blue-50 transition-colors duration-200">
                    <div class="absolute right-2 top-2 text-xs">{{ $edic->status }}</div>
                    <h2 class="font-semibold text-lg">
                        {{$edic->acronym}}
                    </h2>
                    <h2 class="">
                        {{$edic->name}}
                    </h2>


                </div>
            @endforeach


        {{--
            <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Dashboard
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        --}}

        @if (Route::has('login'))
            <div class="h-14.5 hidden lg:block"></div>
        @endif
    </body>
</html>
