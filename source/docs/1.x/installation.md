---
title: Installation
description: Hotstream may be installed using Composer into your **new** Laravel project
extends: _layouts.documentation
section: content
---

# Installation

You may use Composer to install Hotstream into your **new** Laravel project:

```bash
composer create-project laravel/laravel example-app

cd example-app

composer require hotwired-laravel/hotstream
```

After installing the Hotstream package, you may execute the `hotstream:install` Artisan command. You may use the `--teams` flag to enable team support.

The `hotstream:install` command will also install a suite of feature tests that provide test coverage for the features provided by Hotstream. By default, it ships with a [Pest PHP](https://pestphp.com/) test suite.

**You are highly encouraged to read through the Hotwire Handbooks for [Turbo](https://turbo.hotwired.dev/) and [Stimulus](https://stimulus.hotwired.dev/), as well as the [Turbo Laravel](https://turbo-laravel.com/) documentation before beginning your Hotwired project**

### Finalize the Importmap Laravel setup

After installing Hotstream itself, you will need to create the Storage symlinks so your JavaScript files are served by the browser by running:

```bash
php artisan storage:link
```

If you're on sail, run that inside the Sail container.

### Finalize the TailwindCSS Laravel setup

To build your TailwindCSS styles, you'll need to download the Tailwind CLI for your system and then compile the assets:

```bash
php artisan tailwindcss:download
php artisan tailwindcss:build
```

If you want to keep a watcher running to recompile the styles whenever you change your views, run the `tailwind:watch` command instead of the `tailwindcss:build`:

```bash
php artisan tailwindcss:watch
```

### Finalize the Hotstream setup

Finally, you may migrate your application:

```bash
php artisan migrate
```

After that, you should be able to open your application in the browser.

## Application Logo

After installing Hotstream, you may have noticed that the Hotstream logo is utilized on Hotstream's authentication pages as well as your application's top navigation bar. You may easily customize the logo by modifying a few Blade components:

* `resources/views/components/application-logo.blade.php`
* `resources/views/components/application-mark.blade.php`
* `resources/views/components/authentication-card-logo.blade.php`
