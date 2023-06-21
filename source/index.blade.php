@extends('_layouts.master')

@section('body')
<section class="container max-w-6xl px-6 py-10 mx-auto md:py-12">
    <div class="flex flex-col-reverse mb-10 lg:flex-row lg:mb-24">
        <div class="mt-8">
            <h1 id="intro-docs-template">{{ $page->siteName }}</h1>

            <h2 id="intro-powered-by-jigsaw" class="mt-4 font-light">{{ $page->siteDescription }}</h2>

            <p class="text-lg">Laravel, Importmaps, Turbo, Tailwind, and Stimulus.</p>

            <div class="flex my-10">
                <a href="/docs/1.x/getting-started" title="{{ $page->siteName }} getting started" class="px-6 py-2 mr-4 font-normal text-white bg-blue-500 rounded hover:bg-blue-600 hover:text-white">Get Started</a>

                <a href="https://github.com/hotwired-laravel/hotstream" title="Jigsaw by Tighten" class="px-6 py-2 font-normal text-blue-900 bg-gray-400 rounded hover:bg-gray-600 hover:text-white">View on GitHub</a>
            </div>
        </div>
    </div>

    <hr class="block my-8 border lg:hidden">

    <div class="-mx-4 md:flex">
        <div class="px-2 mx-3 mb-8 md:w-1/3">
            <img src="/assets/img/icon-window.svg" class="w-12 h-12" alt="window icon">

            <h3 id="intro-laravel" class="mb-0 text-2xl text-blue-900">Importmaps Laravel & TailwindCSS Laravel</h3>

            <p>By default, Hotstream ships with a Node-less front-end setup.</p>
        </div>

        <div class="px-2 mx-3 mb-8 md:w-1/3">
            <img src="/assets/img/icon-terminal.svg" class="w-12 h-12" alt="terminal icon">

            <h3 id="intro-markdown" class="mb-0 text-2xl text-blue-900">Stimulus Laravel</h3>

            <p>Hotwired enables writing modern web apps with minimal JavaScript. When JS is needed, Stimulus is there.</p>
        </div>

        <div class="px-2 mx-3 md:w-1/3">
            <img src="/assets/img/icon-stack.svg" class="w-12 h-12" alt="stack icon">

            <h3 id="intro-mix" class="mb-0 text-2xl text-blue-900">Turbo Native Wrapper (soon)</h3>

            <p>Hotwired apps allows us to create Native wrappers around our web application. Hotstream comes with a demo mobile client.</p>
        </div>
    </div>
</section>
@endsection
