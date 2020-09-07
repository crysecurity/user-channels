# Associate users with channels

This is a test project for working with creating your own package for Laravel

## Installation in Laravel

- This package can be used with Laravel 5.8 or higher.
- This package publishes a config/cr4sec/channels.php file.
- You can install the package via composer:
    
```bash
$ composer require cr4sec/user-channels
```

- Optional: The service provider will automatically get registered. Or you may manually add the service provider in your config/app.php file:

```php
'providers' => [
    // ...
    Cr4Sec\UserChannels\ChannelsServiceProvider::class,
];
````
- You should publish the migration, component and the channels.php config file with:

```bash
$ php artisan vendor:publish --provider="Cr4Sec\UserChannels\ChannelsServiceProvider"
```

- You should publish the migration and the config/cr4sec/channels.php config file with:

```bash
$ php artisan migrate
```

- Add the "HasChannels" trait to your User model.

```php
class User extends Authenticatable
{
    // ...
    use Cr4Sec\UserChannels\Traits\HasChannels;
```

## Usage

Get user channels

```php
$user->channels;
```

Blade component

```blade
<x-user-channels-list-component :channels="$channels"/>
```
