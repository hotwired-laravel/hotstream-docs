---
title: Profile Management
description: Hotstream's profile management features are accessed by the user using the top-right user profile navigation dropdown menu. Hotstream scaffolds views and actions that allow the user to update their name, email address, and, optionally, their profile photo.
extends: _layouts.documentation
section: content
---

# Profile Management

Hotstream's profile management features are accessed by the user using the top-right user profile navigation dropdown menu. Hotstream scaffolds views and actions that allow the user to update their name, email address, and, optionally, their profile photo.

![Screenshot of Profile Management](/assets/img/edit-profile-screen.png)

## Actions

As typical of most Hotstream features, the logic executed to satisfy profile update requests can be found in an action class within your application. Specifically, the `App\Actions\Fortify\UpdateUserProfileInformation` class will be invoked when the user updates their profile. This action is responsible for validating the input and updating the user's profile information.

Therefore, any customizations you wish to make to your application's management of this information should be made in this class. When invoked, the action receives the currently authenticated `$user` and an array of `$input` that contains all of the input from the incoming request, including the updated profile photo if applicable.

:::tip Managing Additional Information

If you need to manage additional information about the user, you are not restricted to just amending the provided "Profile Information" card. You can add as many additional UI elements and forms as you need within the user's profile dashboard.
:::

## Views

The user's edit profile information form is displayed using the `resources/views/profile/edit.blade.php` Blade template.

The template will receive the entire authenticated user object so that you can add additional fields to the form as necessary. Any additional inputs added to the forms will be included in the `$input` array that is passed to your `UpdateUserProfileInformation` action.

## Profile Photos

### Enabling Profile Photos

If you wish to allow users to upload custom profile photos, you must enable the feature in your application's `config/hotstream.php` configuration file. To enable the feature, simply uncomment the corresponding feature entry from the `features` configuration item within this file:

```php
use HotwiredLaravel\Hotstream\Features;

'features' => [
    Features::profilePhotos(),
    Features::api(),
    Features::teams(),
],
```

After enabling the profile photo feature, you should execute the `storage:link` Artisan command. This command will create a symbolic link in your application's `public` directory that will allow your user's images to be served by your application. For information regarding this command, please consult the [Laravel filesystem documentation](https://laravel.com/docs/filesystem#the-public-disk).:

```bash
php artisan storage:link
```

If you're using [Laravel Sail](https://github.com/laravel/sail), remember to run this command inside the Sail container.

### Managing Profile Photos

Hotstream's profile photo functionality is supported by the `HotwiredLaravel\Hotstream\HasProfilePhoto` trait that is automatically attached to your `App\Models\User` class during Hotstream's installation.

This trait contains methods such as `updateProfilePhoto`, `getProfilePhotoUrlAttribute`, `defaultProfilePhotoUrl`, and `profilePhotoDisk` which may all be overwritten by your own `App\Models\User` class if you need to customize their behavior. You are encouraged to read through the source code of this trait so that you have a full understanding of the features it is providing to your application.

The `updateProfilePhoto` method is the primary method used to store profile photos and is called by your application's `App\Actions\Hotstream\UpdateUserPicture` action class, which is in turn called by the `App\Actions\Fortify\UpdateUserProfileInformation` action class. The uploading feature has its own action because you may want handle the profile image separately than the user upload.

:::tip Laravel Vapor

By default, the `s3` disk will be used to store profile photos when your Hotstream application is running within [Laravel Vapor](https://vapor.laravel.com).
:::

## Account Deletion

As part of the profile management, Hotstream includes a screen that allows the user to delete their application account. When the user chooses to delete their account, the `App\Actions\Hotstream\DeleteUser` action class will be invoked. You are free to customize your application's account deletion logic within this class.

The account deletion feature may be disabled by removing the feature from your application's `config/hotstream.php` configuration file:

```php
use HotwiredLaravel\Hotstream\Features;

'features' => [
    Features::termsAndPrivacyPolicy(),
    Features::profilePhotos(),
    Features::api(),
    Features::teams(),
    // Features::accountDeletion(),
],
```
