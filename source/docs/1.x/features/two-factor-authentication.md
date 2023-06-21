---
title: Two Factor Authentication
description: Hotstream automatically scaffolds the login, two-factor login, registration, password reset, and email verification features for your project, allowing you to start building the features you care about the most instead of worrying about the nitty-gritty details of user authentication.
extends: _layouts.documentation
section: content
---

# Two Factor Authentication

Hotstream automatically scaffolds two-factor authentication support for all Hotstream applications. Hotstream's security features are accessed by the user using the top-right user profile navigation dropdown menu. Within this menu, the user can find the "Two Factor Authentication" screen. Hotstream scaffolds views that allow the user to enable and manage two-factor authentication for their account.

**When a user enables two-factor authentication for their account, they should scan the given QR code using a free TOTP authenticator application such as Google Authenticator. In addition, they should store the listed recovery codes in a secure password manager such as [1Password](https://1password.com).**

If the user loses access to their mobile device, the Hotstream login page will allow them to authenticate using one of their recovery codes instead of the temporary token provided by their mobile device's authenticator application.

![Screenshot of Security](/assets/img/two-factor.png)

## Actions

Most Hotstream features can be customized via action classes. However, for security, Hotstream's two-factor authentication services are encapsulated within Hotstream and should not require customization.

## Views

Typically, the two-factor authentication feature's corresponding views and pages should not require customization as they are already feature-complete. However, their locations are described below in case you need to make small presentation adjustments to these pages.

The two-factor authentication management view is displayed using the `resources/views/two-factor-authentication/index.blade.php` Blade template. The form to confirm two-factor authentication is displayed using the `resources/views/confirmed-two-factor-authentication/create.blade.php` Blade template. The recovery codes are displayed using the `resources/views/recovery-codes/index.blade.php` Blade template and injected in the `resources/views/two-factor-authentication/index.blade.php` Blade template using a Turbo Frame.

## Disabling Two-Factor Authentication

If you would like, you may disable support for two-factor authentication by removing the feature from the `features` array of your application's `config/fortify.php` configuration file:

```php
use Laravel\Fortify\Features;

'features' => [
    Features::registration(),
    Features::resetPasswords(),
    Features::emailVerification(),
    Features::updateProfileInformation(),
    Features::updatePasswords(),
    // Features::twoFactorAuthentication([
    //     'confirmPassword' => true,
    // ]),
],
```
