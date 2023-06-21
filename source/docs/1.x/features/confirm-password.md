---
title: Confirm Password
description: Hotstream's security features are accessed by the user using the top-right user profile navigation dropdown menu. Within this dropdown, Hostream scaffolds views that allow the user to update the password associated with their account.
extends: _layouts.documentation
section: content
---

# Confirm Password

While building your application, you may occasionally have actions that should require the user to confirm their password before the action is performed. For example, Hotstream itself requires users to confirm their password before changing their two-factor authentication settings. Thankfully, Hotstream has built-in functionality to make this a cinch.

#### Password Confirmation

Password confirmation is typically used when the user needs to confirm their password before accessing an entire screen that is rendered by your application, such as a billing settings screen.

This form of password confirmation redirects the user to a dedicated password confirmation screen where they must confirm their password before being redirected to their intended destination.

![Screenshot of Password Confirmation](/assets/img/password-confirmation.png)

## Protecting Routes

To implement password confirmation via redirect to a password confirmation screen, you should ensure that the route that will render the view that requires password confirmation and any routes that perform the confirmed actions are assigned the `password.confirm` middleware.

This middleware is included with the default installation of Laravel and will ensure that the user is redirected to your application's password confirmation screen if they attempt to access the routes without confirming their password:

```php
Route::get('/billing', function () {
    // ...
})->middleware(['password.confirm']);

Route::post('/billing', function () {
    // ...
})->middleware(['password.confirm']);
```

That view that renders the Livewire stack's password confirmation screen is located at `resources/views/auth/confirm-password.blade.php`. Generally, this view should not need customization; however, you are free to make general presentational tweaks to this page based on your own application's design.

:::warning Password Confirmation Expiration

Once the user has confirmed their password, they will not be required to re-enter their password until the number of seconds defined by your application's `auth.password_timeout` configuration option has elapsed:
:::

## Customizing How Passwords Are Confirmed

Sometimes, you may wish to customize how the user's password is validated during confirmation. To do so, you may use the `Fortify::confirmPasswordsUsing` method. This method accepts a closure that receives the authenticated user instance and the `password` input field of the request. The closure should return `true` if the password is valid for the given user. Typically, this method should be called from the `boot` method of your `HotstreamServiceProvider`:

```php
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Fortify;

/**
 * Bootstrap any application services.
 */
public function boot(): void
{
    // ...

    Fortify::confirmPasswordsUsing(function (User $user, string $password) {
        return Hash::check($password, $user->password);
    });
}
```

If you prefer to encapsulate your password confirmation process within a class instead of a closure, you may pass a PHP "callable" array to the `confirmPasswordsUsing` method:

```php
use App\Actions\ConfirmPassword;
use Laravel\Fortify\Fortify;

Fortify::confirmPasswordsUsing([new ConfirmPassword, '__invoke']);
```
