<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:site_name" content="{{ $page->siteName }}"/>
        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}"/>
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:image" content="/assets/img/logo.png"/>
        <meta property="og:type" content="website"/>

        <meta name="twitter:image:alt" content="{{ $page->siteName }}">
        <meta name="twitter:card" content="summary_large_image">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <meta name="generator" content="tighten_jigsaw_doc">
        @endif

        <title>{{ $page->siteName }}{{ $page->title ? ' | ' . $page->title : '' }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="shortcut icon" href="/favicon.ico">
        <meta name="description" content="A Hotwired Application Starter Kit for Laravel">
        <meta name="theme-color" content="#ffffff">

        @stack('meta')

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

        @if ($page->docsearchApiKey && $page->docsearchIndexName)
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" />
        @endif
    </head>

    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-gray-100">
        <header class="flex items-center h-24 py-4 mb-8 bg-white border-b shadow" role="banner">
            <div class="container flex items-center px-4 mx-auto max-w-8xl lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <svg class="h-8 mr-3 md:h-10" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path class="dark:hidden" d="M48 24C48 30.3652 45.4714 36.4697 40.9706 40.9706C36.4697 45.4714 30.3652 48 24 48C18.4726 48 13.1419 46.0933 8.88706 42.6441C9.42805 42.2511 17.2368 36.5796 21.2191 33.7413C25.8385 30.4493 35.0964 23.9797 35.0964 23.9797H27.8214L39.2755 5.48888C39.8623 5.9731 40.4281 6.48694 40.9706 7.02944C45.4714 11.5303 48 17.6348 48 24Z" fill="#3784ff"/>
                            <path class="dark:hidden" d="M39.2207 5.44377C34.9483 1.93911 29.5741 0 24 0C17.6348 0 11.5303 2.52856 7.02944 7.02944C2.52856 11.5303 0 17.6348 0 24C0 30.3652 2.52856 36.4697 7.02944 40.9706C7.61856 41.5597 8.23515 42.115 8.8762 42.6353L20.4075 24.0204H13.1325C13.1325 24.0204 22.3904 17.5513 27.0099 14.2588C30.8073 11.5524 38.0854 6.26835 39.2207 5.44377Z" fill="#3784ff"/>
                            <path class="hidden dark:inline" d="M48 24C48 30.3652 45.4714 36.4697 40.9706 40.9706C36.4697 45.4714 30.3652 48 24 48C18.4726 48 13.1419 46.0933 8.88706 42.6441C9.42805 42.2511 17.2368 36.5796 21.2191 33.7413C25.8385 30.4493 35.0964 23.9797 35.0964 23.9797H27.8214L39.2755 5.48888C39.8623 5.9731 40.4281 6.48694 40.9706 7.02944C45.4714 11.5303 48 17.6348 48 24Z" fill="#ffe801"/>
                            <path class="hidden dark:inline" d="M39.2207 5.44377C34.9483 1.93911 29.5741 0 24 0C17.6348 0 11.5303 2.52856 7.02944 7.02944C2.52856 11.5303 0 17.6348 0 24C0 30.3652 2.52856 36.4697 7.02944 40.9706C7.61856 41.5597 8.23515 42.115 8.8762 42.6353L20.4075 24.0204H13.1325C13.1325 24.0204 22.3904 17.5513 27.0099 14.2588C30.8073 11.5524 38.0854 6.26835 39.2207 5.44377Z" fill="#ffe801"/>
                        </svg>

                        <h1 class="pr-4 my-0 text-lg font-semibold text-blue-900 md:text-2xl hover:text-blue-600">{{ $page->siteName }}</h1>
                    </a>
                </div>

                <div class="flex items-center justify-end flex-1 text-right md:pl-10">
                    @if ($page->docsearchApiKey && $page->docsearchIndexName)
                        @include('_nav.search-input')
                    @endif
                </div>
            </div>

            @yield('nav-toggle')
        </header>

        <main role="main" class="flex-auto w-full">
            @yield('body')
        </main>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <footer class="py-4 mt-12 text-sm text-center bg-white" role="contentinfo">
            <ul class="flex flex-col justify-center md:flex-row">
                <li>
                    Built with <a href="http://jigsaw.tighten.co" title="Jigsaw by Tighten">Jigsaw</a>
                    and <a href="https://tailwindcss.com" title="Tailwind CSS, a utility-first CSS framework">Tailwind CSS</a>.
                </li>
            </ul>
        </footer>
    </body>
</html>
