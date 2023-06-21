---
title: Concept Overview
description: Hotstream's architecture follows the same architecture as Laravel Jetstream, so it's a little different than other Laravel application starter kits such as Laravel Breeze.
extends: _layouts.documentation
section: content
---

# Concept Overview

Hotstream's architecture follows the same architecture as [Laravel Jetstream](https://jetstream.laravel.com/3.x/concept-overview.html), so it's a little different than other Laravel application starter kits such as [Laravel Breeze](https://github.com/laravel/breeze). In this documentation, we'll cover some of the high-level concepts that will help you understand how Hotstream is constructed.

## Laravel Fortify

Under the hood, the authentication portions of Hotstream are powered by [Laravel Fortify](https://github.com/laravel/fortify), which is a frontend agnostic, "headless" authentication backend for Laravel.

Fortify register the routes and controllers needed to implement all of Hotstream's authentication features, including login, registration, password reset, email verification, and more. After installing Fortify, you may run the `route:list` Artisan command to see the routes that Fortify has registered.

Since Fortify does not provide its own user interface, it is meant to be paired with your own user interface which makes requests to the routes it registeres. Hotstream is our first-party implementation of a user interface built on top of the Fortify authentication backend.

#### Fortify Configuration

When Hotstream is installed, a `config/fortify.php` configuration file is installed into your application. Whitin this configuration file, you can customize various aspects of Fortify's behavior, such as the authentication guard that should be used, where users should be redirected after authentication, and more.

## Actions

In contrast to [Laravel Breeze](https://laravel.com/docs/10.x/starter-kits), Hotstream does not publish controllers or routes to your application. Instead, Hotstream's functionality is customized via "Action" classes. During the installation process, actions are published to your application's `app/Actions` directory.

Action classes typically perform a single action and correspond to a single Hotstream or Fortify feature, such as creating a team or deleting a user. You are free to customize these classes if you would like to tweak the backend behavior of Hotstream. Each of the relevant actions published by Hotstream will be discussed within the feature's corresponding documentation

## Views and Pages

During installation, Hotstream will publish a variety of views and classes to your application. Views will be published to your application's `resources/views` directory.

The views published by Hotstream contain every feature supported by Hotstream and you are free to customize them as needed. Think of Hostream as a starting point for your application. Once you have installed Hostream, you are free to customize anything you like.

Perhaps the biggest difference between Hotstream and Jetstream is the fact that in Hotstream we ship with fully dedicated pages for most things. In Jetstream, you have multiple forms and panels on a single page.

The decision to have fully dedicated pages in Hotstream is not arbitrary. It comes from the mobile side. On mobile, when opening screens and forms, we don't often have multiple forms on the same screen. Instead, it's more common to show each individual form on its own screen or native modal.

This is not a _requirement_ for Hotwire. Quite the opposite, instead. With Hotwire, you can decompose a screen that is composed of different sections using Turbo Frames. Then, use Turbo Streams to update multiple parts of the screen whenever the user interacts with the app.

Then, on the mobile side, you can hide the Turbo Frames, and instead render links to those sections and forms.

## Layouts

### The Application Layout

After installing, your Hotstream application will contain two "layouts". First, Hostream creates an application layout that is used to define the layout of your application's pages that require authentication, such as your application's dashboard. This layout is defined at `resources/views/layouts/app.blade.php` and rendered by the `App\View\Components\AppLayout` class.

### The Guest Layout

In addition to the application layout, Hotstream creates a "guest" layout that is used to define the layout of Hotstream's authentication-related pages, such as your application's login, registration, and password reset pages.

## Tailwind

During installation, Hotstream will scaffold your application's integration with the Tailwind CSS framework using the [TailwindCSS Laravel](https://github.com/tonysm/tailwindcss-laravel) package. You can customize your default styles in the `tailwind.config.js` file. This file will be used to build your application's compiled CSS output. You are free to modify these files as needed for your application. Since we're using the Tailwind CLI standalone tool, we can only require Tailwind's first-party commands.

```bash
# Download the Tailwind CLI...
php artisan tailwindcss:download

# Start a watcher to compile your CSS styles as you're working on the views...
php artisan tailwindcss:watch

# Compile your CSS styles for production...
php artisan tailwindcss:build --prod
```

## Importmap

Modern browsers are already capable of loading ECMAScript modules (ESM) using [importmaps](https://developer.mozilla.org/en-US/docs/Web/HTML/Element/script/type/importmap). Hotstream ships with the [Importmap Laravel](https://github.com/tonysm/importmap-laravel) package installed and configured, which enables us to have our front-end setup that doesn't rely on Node.js or NPM.

When using importmaps, your JavaScript dependencies will be mapped in the `routes/importmap.php` file. Hotstream already has the `<x-importmap-tags />` on your layout files.

```bash
# To download an external lib...
php artisan importmap:pin alpinejs

# To build your JavaScript files for production...
php artisan importmap:optimize

# To run a security audit on your external JavaScript libs...
php artisan importmap:audit

# To check for outdated dependencies...
php artisan importmap:outdated
```

## Stimulus

Hotwired applications tend to follow a minimal JavaScript approach. [Turbo Drive](https://turbo.hotwired.dev/handbook/drive), [Turbo Frames](https://turbo.hotwired.dev/handbook/frames), and [Turbo Streams](https://turbo.hotwired.dev/handbook/streams) gets you really far until you need to write a single line of JavaScript. When we do need JavaScript, we can use [Stimulus](https://stimulus.hotwired.dev/).

Hotstream ships with [Stimulus Laravel](https://github.com/hotwired-laravel/stimulus-laravel) configured. The package makes it easy to use this modest framework with import-mapped (and also for JavaScript-bundled apps).

You can find the Stimulus setup in your application's `resources/js/libs/stimulus.js` file. You can find your Stimulus controllers at `resources/js/controllers`. Hotstream ships with a few Stimulus controllers you can use as examples.

Since we rely on [Importmap Laravel](https://github.com/tonysm/importmap-laravel), your controllers are automatically registered so you don't have to worry about that. In the `resources/js/controllers/index.js` file you can find where the automatic registration of controllers is done.

```bash
# Generate a Stimulus controller...
php artisan stimulus:make hello
```

To attach the controller to an HTML tag, you can use the `data-controller` attribute. Read the [Stimulus Handbook](https://stimulus.hotwired.dev/) for more details on Stimulus itself.

## Turbo

Hotstream comes with [Turbo Laravel](https://github.com/hotwired-laravel/turbo-laravel/) integrated. Most of the techniques in Turbo.js are back-end agnostic. It's around Turbo Streams that a tighter integration with Laravel comes to play.

It's highly recommended to read the [Turbo Laravel documentation](https://turbo-laravel.com/) to know what's available.
