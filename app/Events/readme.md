# Events
The Events directory, as you might expect, houses event classes. Of course, using classes to represent events is not required; however, if you choose to use them, this directory is the default location they will be created by the Artisan command line.

## Artisan
```
php artisan event:generate
```

generate code in app/Providers/EventServiceProvider.php

```php
protected $listen = [
    'App\Events\PodcastWasPurchased' => [
        'App\Listeners\EmailPurchaseConfirmation',
    ],
];
```

## Reference
* [Events@larave.com](http://laravel.com/docs/5.1/events)