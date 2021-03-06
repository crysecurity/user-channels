# Associate users with channels

[![Total Downloads](https://poser.pugx.org/cr4sec/user-channels/downloads)](//packagist.org/packages/cr4sec/user-channels)
[![Version](https://poser.pugx.org/cr4sec/user-channels/version)](//packagist.org/packages/cr4sec/user-channels)
[![Dependents](https://poser.pugx.org/cr4sec/user-channels/dependents)](//packagist.org/packages/cr4sec/user-channels)
[![License](https://poser.pugx.org/cr4sec/user-channels/license)](//packagist.org/packages/cr4sec/user-channels)

<p>This is a test project for working with creating your own package for Laravel</p>

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

User's subscription to channels

```php
$user->attachChannel(['afgt6d3', 'a54dhyt']);
$user->attachChannel('afg7');
$user->attachChannel(Channel::first);
```
User's unsubscription to channels

```php
$user->channels()->detach(['afgt6d3', 'a54dhyt']);
```

Blade component

```blade
<x-user-channels-list-component :channels="$channels"/>
```

