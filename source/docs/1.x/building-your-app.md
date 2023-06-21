---
title: Building Your App
description: After installing Hotstream, you may wonder how to actually start building your application.
extends: _layouts.documentation
section: content
---

# Building Your App

After installing Hotstream, you may wonder how to actually start building your application. Thankfully, since Hotstream handles the configuration of all of the initial authentication and application scaffolding, you can get started right away!

After installing Hotstream, the code is yours. The templates belong to your application and can be modified as you see fit. Hotstream is just a starting point. You do not need to worry about keeping your user interface "compatible" with future Hotstream releases because each Hotstream release is simply an entirely new iteration of the starter kit. In other words, Hotstream is not a package or administration dashboard that you will "update" in the future. It is a starter kit scaffolding for Laravel and, after it is installed, the templates are entirely yours to maintain.

## Application Dashboard

After authenticating with your application, you will be redirected to the `/dashboard` route. This route is the home / dashboard screen of your application. This page is rendered by the `resources/views/dashboard.blade.php` Blade template.

If you open the dashboard template for your application, you will see that it extends the application's primary "layout" component. This layout defines the overall look and feel of the interior of your application. This layout is defined by the `resources/views/layouts/app.blade.php` template and rendered via the `App\View\Components\AppLayout` component class.

Once you have familiarized yourself with the dashboard and application layout templates, feel free to start editing them. For example, you will probably want to remove the "welcome" component that is rendered on your application dashboard. To do so, you may delete it from your dashboard template. Next, you're free to write the HTML needed to build your application. Remember, Hotstream uses the powerful Tailwind CSS framework, so be sure to learn more about Tailwind by consulting the [Tailwind documentation](https://tailwindcss.com/docs/installation).

### Adding Additional Pages

By default, Hotstream's top navigation menu includes a link to the application dashboard. Of course, you are free to edit this navigation menu to add links to other pages that will be available within your application. The navigation menu is defined by the `resources/views/navigation-menu.blade.php` Blade template.

## User Profile

When building a Hotstream application, it's likely that you will need to add your own settings forms and panels. By default, we have dedicated pages for each settings feature, so a page to update the user's contact information, another one for updating password, another one for managing their two-factor authentication settings, and so on. However, you're free to add your own additional settings pages.

The main settings menu has its own page and is rendered inside a dropdown component on the web. On the mobile wrapper, this will render on its own modal screen. The main settings menu is defined by the `resources/views/accounts/index.blade.php` Blade template.

## Team Management

You may also need to add additional forms and pages to the team management screens rendered by Hotstream. These include the "team settings" screen for managing existing teams as well as the "create team" screen that is rendered when a user is creating a new team.

### Creating Team Screen

When team support is enabled, Hotstream includes a screen that allows users to create new teams. You are free to add additional form fields to the form contained within this screen. Any additional form fields you add will be passed into Hotstreams's `App\Actions\Hotstream\CreateTeam` action via the $input argument.

The team creation screen is defined by the `resources/views/teams/create.blade.php` Blade template.

### Team Settings Screen

When team support is enabled, Hotstream includes screens that allows users to manage their settings for their existing teams, such as changing the team name or inviting additional team members.

You're free to add your own additional screens for team settings. The team settings menu has its own page. You can add new menu items to this menu in the `resources/views/teams/show.blade.php` Blade template.

## Flash Messages

Hostream includes a way to show flash messages, which are displayed at the top of your application's UI.

Your application will contain a `resources/views/components/notifications.blade.php` Blade template, which is the wrapper of the notifications, and a `resources/views/layouts/_notification.blade.php` Blade template, which represents each individual flash message.

To instruct Hotstream to display the flash message, you must flash a `status` message to the session:

```php
$request->session()->flash('status', 'Yay it works!');

return redirect('/');
```

If you're returning Turbo Streams instead of redirecting, you may also use the `turbo_stream()->flash()` macro to compose the flash messages:

```php
if (request()->wantsTurboStream()) {
    return turbo_stream([
        $chirp,
        turbo_stream()->flash('Yay it works!'),
    ]);
}
```

The `flash()` macro is defined at your application's `App\Providers\HotstreamServiceProvider` class.
