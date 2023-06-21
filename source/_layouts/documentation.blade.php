@extends('_layouts.master')

@section('nav-toggle')
    @include('_nav.menu-toggle')
@endsection

@section('body')
<section class="container px-6 py-4 mx-auto max-w-8xl md:px-8">
    <div class="flex flex-col lg:flex-row">
        <nav id="js-nav-menu" class="hidden nav-menu lg:block">
            @include('_nav.menu', ['items' => $page->navigation])
        </nav>

        <div class="w-full pb-16 break-words docs-content DocSearch-content lg:w-3/5 lg:pl-4" v-pre>
            @yield('content')
        </div>
    </div>
</section>
@endsection
