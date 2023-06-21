---
title: Getting Started
description: Hotstream is an application starter kit for Laravel. It's heavily inspired by Laravel Jetstream, but modified for a better experience when building Hotwired Laravel applications. For a better integration with Turbo, Hotstream ships with Turbo Laravel integrated.
extends: _layouts.documentation
section: content
---

# Introduction

Hotstream is an application starter kit for Laravel. It's heavily inspired by [Laravel Jetstream](https://jetstream.laravel.com/), but modified for a better experience when building [Hotwired](https://hotwired.dev/) Laravel applications. For a better integration with [Turbo](https://turbo.hotwired.dev/), Hotstream ships with [Turbo Laravel](https://github.com/hotwired-laravel/turbo-laravel/) integrated.

![Hotstream Application Preview](/assets/img/introduction-hotstream.png)

Just like Jetstream, Hotstream provides the implementation for your application's login, registration, email verification, two-factor authentication, session management, API with [Laravel Sanctum](https://github.com/laravel/sanctum), and optional team management features.

Hotstream is designed using [Tailwind CSS](https://tailwindcss.com/) around the [TailwindCSS Laravel](https://github.com/tonysm/tailwindcss-laravel) package. It also ships by default with [Importmap Laravel](https://github.com/tonysm/importmap-laravel) configured for a Node-free frontend setup.

Hotwired apps tend to follow a minimal JavaScript approach to building web applications. [Turbo Drive](https://turbo.hotwired.dev/handbook/drive), [Turbo Frames](https://turbo.hotwired.dev/handbook/frames), and [Turbo Streams](https://turbo.hotwired.dev/handbook/streams) can get you really far until you need to write a single line of JavaScript yourself. And when you do need to write JavaScript, [Stimulus](https://stimulus.hotwired.dev/) is there for you. To complete front-end story, Hotstream ships with [Stimulus Laravel](https://github.com/hotwired-laravel/stimulus-laravel).

Turbo Native is a key component of Hotwired apps. With its [Turbo Native for iOS](https://github.com/hotwired/turbo-ios) and [Turbo Native for Android](https://github.com/hotwired/turbo-android) bridges, you can build wrappers around your responsive Hotwired app and decide per-URL when to implement native screens. To serve as an example of what is possible here, Hotstream ships with a demo Android application wrapper (_soon_).

Since Hotstream is heavily inspired by Laravel Jetstream, some parts of this documentation were taken straight from Jetstream's docs.
