---
title: Browser Sessions
description: Hotstream's security features are accessed by the user using the top-right user profile navigation dropdown menu. Within this menu, the user can find a link to the "Devices & Sessions" screen.
extends: _layouts.documentation
section: content
---

# Browser Sessions

Hotstream's security features are accessed by the user using the top-right user profile navigation dropdown menu. Within this menu, the user can find a link to the "Devices & Sessions" screen. Hotstream scaffolds views that allow the user to view the browser sessions associated with their account. In addition, the user may "logout" browser sessions other than the one being used by the device they are currently using.

This feature utilizes Laravel's built-in `Illuminate\Session\Middleware\AuthenticateSession` middleware to safely log out other browser sessions that are authenticated as the current user.

![Screenshot of Browser Sessions](/assets/img/browser-sessions.png)

:::warning Session Driver

To utilize browser session management within Hotstream, ensure that your session configuration's `driver` (or `SESSION_DRIVER` environment variable) is set to 'database'.
:::

## Actions

Most Hotstream features can be customized via action classes. However, for security, Hotstream's browser session services are encapsulated within Hotstream and should not require customization.

## Views

Typically, the browser session feature's corresponding views and pages should not require customization as they are already feature-complete. However, their locations are described below in case you need to make small presentation adjustments to these pages.

The browser session management view is displayed using the `resources/views/device-sessions/index.blade.php` Blade template. The confirmation screen for loging out of other browser sessions is displayed using the `resources/views/deleted-device-sessions/edit.blade.php` Blade template.
